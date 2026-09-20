import { useState, useEffect, useCallback, useRef } from 'react';
import AdminLayout from '../../layouts/AdminLayout';
import {
    getAdminBooks,
    getAdminBookDetail,
    createAdminBook,
    updateAdminBook,
    deleteAdminBook,
    getCategoriesList,
    getPublishersList,
    getAuthorsList,
} from '../../services/adminBookService';
import { openCloudinaryUploadWidget } from '../../utils/cloudinary';

/* ── helpers ── */
const fmtPrice = (n) =>
    new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(Number(n) || 0);

const STATUS_META = {
    active:   { label: 'Đang bán', tone: 'green' },
    inactive: { label: 'Ngừng bán', tone: 'gray' },
};
const STATUS_OPTIONS = Object.entries(STATUS_META).map(([value, m]) => ({ value, label: m.label }));

const EMPTY_FORM = {
    category_id: '', publisher_id: '', isbn: '', title: '', slug: '', image: '',
    description: '', price: '', discount_price: '', stock_quantity: 0,
    page_count: '', publish_year: '', language: '', weight: '', dimensions: '', cover_type: '',
    status: 'active', author_ids: [], images: [],
};

/* ── STATUS DROPDOWN NHANH TRONG BẢNG ── */
function InlineBookStatusSelect({ book, onUpdated }) {
    const [open, setOpen] = useState(false);
    const [saving, setSaving] = useState(false);
    const ref = useRef(null);
    const meta = STATUS_META[book.status] || { label: book.status, tone: 'gray' };

    useEffect(() => {
        if (!open) return;
        const handler = (e) => { if (ref.current && !ref.current.contains(e.target)) setOpen(false); };
        document.addEventListener('mousedown', handler);
        return () => document.removeEventListener('mousedown', handler);
    }, [open]);

    const handlePick = async (newStatus) => {
        setOpen(false);
        if (newStatus === book.status) return;
        setSaving(true);
        try {
            const res = await updateAdminBook(book.book_id, { ...book, status: newStatus });
            onUpdated(res.data);
        } catch { /* im lặng — bảng vẫn giữ trạng thái cũ nếu lỗi */ }
        finally { setSaving(false); }
    };

    return (
        <div className="admin-status-select" ref={ref}>
            <button type="button" className={`admin-badge admin-badge--${meta.tone} admin-badge--btn`}
                onClick={() => !saving && setOpen(p => !p)} disabled={saving}>
                {saving ? 'Đang lưu...' : meta.label}
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="3">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </button>
            {open && (
                <div className="admin-status-select__menu">
                    {STATUS_OPTIONS.map(o => (
                        <button key={o.value} type="button"
                            className={`admin-status-select__option${o.value === book.status ? ' current' : ''}`}
                            onClick={() => handlePick(o.value)}>
                            <span className={`admin-badge admin-badge--${STATUS_META[o.value].tone}`}>{o.label}</span>
                        </button>
                    ))}
                </div>
            )}
        </div>
    );
}

/* ── FORM THÊM / SỬA SÁCH ── */
function BookFormDrawer({ bookId, categories, publishers, authors, onClose, onSaved }) {
    const [form, setForm] = useState(EMPTY_FORM);
    const [loadingDetail, setLoadingDetail] = useState(!!bookId);
    const [saving, setSaving] = useState(false);
    const [error, setError] = useState('');
    const [uploadingCover, setUploadingCover] = useState(false);
    const [uploadingGallery, setUploadingGallery] = useState(false);

    useEffect(() => {
        if (!bookId) return;
        let alive = true;
        getAdminBookDetail(bookId).then(res => {
            if (!alive) return;
            const b = res.data;
            setForm({
                category_id: b.category_id ?? '',
                publisher_id: b.publisher_id ?? '',
                isbn: b.isbn ?? '',
                title: b.title ?? '',
                slug: b.slug ?? '',
                image: b.image ?? '',
                description: b.description ?? '',
                price: b.price ?? '',
                discount_price: b.discount_price ?? '',
                stock_quantity: b.stock_quantity ?? 0,
                page_count: b.page_count ?? '',
                publish_year: b.publish_year ?? '',
                language: b.language ?? '',
                weight: b.weight ?? '',
                dimensions: b.dimensions ?? '',
                cover_type: b.cover_type ?? '',
                status: b.status ?? 'active',
                author_ids: (b.authors || []).map(a => a.author_id),
                images: (b.images || []).map(im => ({ image_path: im.image_path, sort_order: im.sort_order ?? 0 })),
            });
        }).catch(() => setError('Không tải được thông tin sách.'))
          .finally(() => alive && setLoadingDetail(false));
        return () => { alive = false; };
    }, [bookId]);

    const set = (key, value) => setForm(prev => ({ ...prev, [key]: value }));

    const toggleAuthor = (authorId) => {
        setForm(prev => ({
            ...prev,
            author_ids: prev.author_ids.includes(authorId)
                ? prev.author_ids.filter(id => id !== authorId)
                : [...prev.author_ids, authorId],
        }));
    };

    const updateImage = (idx, key, value) => {
        setForm(prev => {
            const images = [...prev.images];
            images[idx] = { ...images[idx], [key]: value };
            return { ...prev, images };
        });
    };
    const addImageRow = () => setForm(prev => ({ ...prev, images: [...prev.images, { image_path: '', sort_order: prev.images.length }] }));
    const removeImageRow = (idx) => setForm(prev => ({ ...prev, images: prev.images.filter((_, i) => i !== idx) }));

    const handleUploadCover = async () => {
        setUploadingCover(true);
        try {
            const url = await openCloudinaryUploadWidget();
            if (url) set('image', url);
        } catch (err) {
            setError(err.message || 'Upload ảnh thất bại.');
        } finally {
            setUploadingCover(false);
        }
    };

    const handleUploadGalleryImage = async () => {
        setUploadingGallery(true);
        try {
            const url = await openCloudinaryUploadWidget();
            if (url) {
                setForm(prev => ({ ...prev, images: [...prev.images, { image_path: url, sort_order: prev.images.length }] }));
            }
        } catch (err) {
            setError(err.message || 'Upload ảnh thất bại.');
        } finally {
            setUploadingGallery(false);
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (!form.title.trim() || !form.category_id || form.price === '' || form.stock_quantity === '') {
            setError('Vui lòng điền đủ: tên sách, danh mục, giá bán, tồn kho.');
            return;
        }
        setSaving(true);
        setError('');
        try {
            if (bookId) {
                await updateAdminBook(bookId, form);
            } else {
                await createAdminBook(form);
            }
            onSaved();
        } catch (err) {
            setError(err.response?.data?.message || 'Lưu sách thất bại. Kiểm tra lại thông tin.');
        } finally {
            setSaving(false);
        }
    };

    return (
        <div className="admin-drawer-overlay" onClick={onClose}>
            <div className="admin-drawer admin-drawer--wide" onClick={e => e.stopPropagation()}>
                <div className="admin-drawer__header">
                    <h2>{bookId ? 'Sửa thông tin sách' : 'Thêm sách mới'}</h2>
                    <button type="button" className="admin-drawer__close" onClick={onClose} aria-label="Đóng">✕</button>
                </div>

                {loadingDetail ? (
                    <div className="admin-drawer__loading">Đang tải...</div>
                ) : (
                    <form className="admin-drawer__body admin-book-form" onSubmit={handleSubmit}>
                        <section className="admin-drawer__section">
                            <h3>Thông tin cơ bản</h3>
                            <div className="admin-form-grid">
                                <label className="admin-field admin-field--full">
                                    <span>Tên sách *</span>
                                    <input value={form.title} onChange={e => set('title', e.target.value)} required />
                                </label>
                                <label className="admin-field">
                                    <span>Danh mục *</span>
                                    <select value={form.category_id} onChange={e => set('category_id', e.target.value)} required>
                                        <option value="">-- Chọn danh mục --</option>
                                        {categories.map(c => (
                                            <option key={c.category_id} value={c.category_id}>{c.category_name}</option>
                                        ))}
                                    </select>
                                </label>
                                <label className="admin-field">
                                    <span>Nhà xuất bản</span>
                                    <select value={form.publisher_id} onChange={e => set('publisher_id', e.target.value)}>
                                        <option value="">-- Không chọn --</option>
                                        {publishers.map(p => (
                                            <option key={p.publisher_id} value={p.publisher_id}>{p.publisher_name}</option>
                                        ))}
                                    </select>
                                </label>
                                <label className="admin-field">
                                    <span>ISBN</span>
                                    <input value={form.isbn} onChange={e => set('isbn', e.target.value)} />
                                </label>
                                <label className="admin-field">
                                    <span>Slug (để trống sẽ tự tạo)</span>
                                    <input value={form.slug} onChange={e => set('slug', e.target.value)} />
                                </label>
                                <label className="admin-field">
                                    <span>Trạng thái</span>
                                    <select value={form.status} onChange={e => set('status', e.target.value)}>
                                        {STATUS_OPTIONS.map(o => <option key={o.value} value={o.value}>{o.label}</option>)}
                                    </select>
                                </label>
                            </div>

                            <label className="admin-field admin-field--full" style={{ marginTop: 10 }}>
                                <span>Tác giả (chọn 1 hoặc nhiều)</span>
                                <div className="admin-author-picker">
                                    {authors.length === 0 && <span className="admin-table__muted">Chưa có tác giả nào.</span>}
                                    {authors.map(a => (
                                        <label key={a.author_id} className="admin-author-picker__item">
                                            <input
                                                type="checkbox"
                                                checked={form.author_ids.includes(a.author_id)}
                                                onChange={() => toggleAuthor(a.author_id)}
                                            />
                                            {a.author_name}
                                        </label>
                                    ))}
                                </div>
                            </label>
                        </section>

                        <section className="admin-drawer__section">
                            <h3>Giá & Tồn kho</h3>
                            <div className="admin-form-grid admin-form-grid--3col">
                                <label className="admin-field">
                                    <span>Giá bán (₫) *</span>
                                    <input type="number" min="0" value={form.price} onChange={e => set('price', e.target.value)} required />
                                </label>
                                <label className="admin-field">
                                    <span>Giá khuyến mãi (₫)</span>
                                    <input type="number" min="0" value={form.discount_price} onChange={e => set('discount_price', e.target.value)} />
                                </label>
                                <label className="admin-field">
                                    <span>Tồn kho *</span>
                                    <input type="number" min="0" value={form.stock_quantity} onChange={e => set('stock_quantity', e.target.value)} required />
                                </label>
                            </div>
                        </section>

                        <section className="admin-drawer__section">
                            <h3>Chi tiết sách</h3>
                            <div className="admin-form-grid admin-form-grid--3col">
                                <label className="admin-field">
                                    <span>Số trang</span>
                                    <input type="number" min="1" value={form.page_count} onChange={e => set('page_count', e.target.value)} />
                                </label>
                                <label className="admin-field">
                                    <span>Năm xuất bản</span>
                                    <input type="number" value={form.publish_year} onChange={e => set('publish_year', e.target.value)} />
                                </label>
                                <label className="admin-field">
                                    <span>Ngôn ngữ</span>
                                    <input value={form.language} onChange={e => set('language', e.target.value)} placeholder="Tiếng Việt" />
                                </label>
                                <label className="admin-field">
                                    <span>Khối lượng (gram)</span>
                                    <input type="number" min="0" value={form.weight} onChange={e => set('weight', e.target.value)} />
                                </label>
                                <label className="admin-field">
                                    <span>Kích thước (VD: 14x20 cm)</span>
                                    <input value={form.dimensions} onChange={e => set('dimensions', e.target.value)} />
                                </label>
                                <label className="admin-field">
                                    <span>Loại bìa</span>
                                    <input value={form.cover_type} onChange={e => set('cover_type', e.target.value)} placeholder="Bìa mềm / Bìa cứng" />
                                </label>
                            </div>
                        </section>

                        <section className="admin-drawer__section">
                            <h3>Ảnh & mô tả</h3>
                            <label className="admin-field admin-field--full">
                                <span>Ảnh bìa</span>
                                <div className="admin-upload-row">
                                    <input value={form.image} onChange={e => set('image', e.target.value)} placeholder="Dán URL hoặc bấm Tải ảnh lên" />
                                    <button type="button" className="admin-btn" onClick={handleUploadCover} disabled={uploadingCover}>
                                        {uploadingCover ? 'Đang tải...' : '⬆ Tải ảnh lên'}
                                    </button>
                                </div>
                            </label>
                            {form.image && (
                                <img src={form.image} alt="preview" className="admin-book-form__cover-preview" />
                            )}

                            <div className="admin-field admin-field--full" style={{ marginTop: 12 }}>
                                <span>Ảnh phụ (gallery)</span>
                                {form.images.map((img, idx) => (
                                    <div key={idx} className="admin-image-row">
                                        <input
                                            placeholder="URL ảnh phụ"
                                            value={img.image_path}
                                            onChange={e => updateImage(idx, 'image_path', e.target.value)}
                                        />
                                        <input
                                            type="number" min="0" className="admin-image-row__order"
                                            value={img.sort_order}
                                            onChange={e => updateImage(idx, 'sort_order', e.target.value)}
                                            title="Thứ tự hiển thị"
                                        />
                                        <button type="button" className="admin-btn admin-btn--ghost" onClick={() => removeImageRow(idx)}>✕</button>
                                    </div>
                                ))}
                                <button type="button" className="admin-btn" onClick={addImageRow} style={{ marginTop: 6 }}>
                                    + Dán URL ảnh phụ
                                </button>
                                <button type="button" className="admin-btn" onClick={handleUploadGalleryImage} disabled={uploadingGallery} style={{ marginTop: 6, marginLeft: 8 }}>
                                    {uploadingGallery ? 'Đang tải...' : '⬆ Tải ảnh phụ lên'}
                                </button>
                            </div>

                            <label className="admin-field admin-field--full" style={{ marginTop: 12 }}>
                                <span>Mô tả</span>
                                <textarea rows={5} value={form.description} onChange={e => set('description', e.target.value)} />
                            </label>
                        </section>

                        {error && <p className="admin-drawer__error">{error}</p>}

                        <div className="admin-book-form__actions">
                            <button type="button" className="admin-btn" onClick={onClose}>Hủy</button>
                            <button type="submit" className="admin-btn admin-btn--primary" disabled={saving}>
                                {saving ? 'Đang lưu...' : bookId ? 'Lưu thay đổi' : 'Thêm sách'}
                            </button>
                        </div>
                    </form>
                )}
            </div>
        </div>
    );
}

/* ── MAIN PAGE ── */
export default function AdminBooksPage() {
    const [books, setBooks] = useState([]);
    const [meta, setMeta] = useState({ total: 0, current_page: 1, last_page: 1 });
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    const [categories, setCategories] = useState([]);
    const [publishers, setPublishers] = useState([]);
    const [authors, setAuthors] = useState([]);

    const [categoryFilter, setCategoryFilter] = useState('all');
    const [statusFilter, setStatusFilter] = useState('all');
    const [searchInput, setSearchInput] = useState('');
    const [search, setSearch] = useState('');
    const [page, setPage] = useState(1);

    const [formOpen, setFormOpen] = useState(false);
    const [editingId, setEditingId] = useState(null);
    const [deletingId, setDeletingId] = useState(null);
    const [deleteError, setDeleteError] = useState('');

    const debounceRef = useRef(null);

    useEffect(() => {
        if (debounceRef.current) clearTimeout(debounceRef.current);
        debounceRef.current = setTimeout(() => { setSearch(searchInput.trim()); setPage(1); }, 400);
        return () => clearTimeout(debounceRef.current);
    }, [searchInput]);

    useEffect(() => {
        Promise.all([getCategoriesList(), getPublishersList(), getAuthorsList()])
            .then(([c, p, a]) => {
                setCategories(c.data || c || []);
                setPublishers(p.data || p || []);
                setAuthors(a.data || a || []);
            })
            .catch(() => { /* dropdown rỗng nếu lỗi, không chặn trang chính */ });
    }, []);

    const loadBooks = useCallback(async () => {
        setLoading(true);
        setError('');
        try {
            const res = await getAdminBooks({
                category_id: categoryFilter !== 'all' ? categoryFilter : undefined,
                status: statusFilter,
                search: search || undefined,
                page,
                per_page: 10,
            });
            setBooks(res.data || []);
            setMeta(res.meta || { total: 0, current_page: 1, last_page: 1 });
        } catch {
            setError('Không tải được danh sách sách.');
        } finally {
            setLoading(false);
        }
    }, [categoryFilter, statusFilter, search, page]);

    useEffect(() => { loadBooks(); }, [loadBooks]);

    const handleStatusUpdated = (updated) => {
        setBooks(prev => prev.map(b => b.book_id === updated.book_id ? { ...b, status: updated.status } : b));
    };

    const handleDelete = async (book) => {
        const ok = window.confirm(`Xóa sách "${book.title}"? Hành động này không thể hoàn tác.`);
        if (!ok) return;
        setDeletingId(book.book_id);
        setDeleteError('');
        try {
            await deleteAdminBook(book.book_id);
            loadBooks();
        } catch (err) {
            setDeleteError(err.response?.data?.message || 'Xóa sách thất bại.');
            setTimeout(() => setDeleteError(''), 5000);
        } finally {
            setDeletingId(null);
        }
    };

    return (
        <AdminLayout title="Quản lý sách" subtitle="Thêm mới, chỉnh sửa và quản lý toàn bộ sách trong cửa hàng">
            <div className="admin-panel">
                <div className="admin-toolbar">
                    <div className="admin-toolbar__filters">
                        <select value={categoryFilter} onChange={e => { setCategoryFilter(e.target.value); setPage(1); }}>
                            <option value="all">Tất cả danh mục</option>
                            {categories.map(c => (
                                <option key={c.category_id} value={c.category_id}>{c.category_name}</option>
                            ))}
                        </select>
                        <select value={statusFilter} onChange={e => { setStatusFilter(e.target.value); setPage(1); }}>
                            <option value="all">Tất cả trạng thái</option>
                            {STATUS_OPTIONS.map(o => <option key={o.value} value={o.value}>{o.label}</option>)}
                        </select>
                        <input
                            type="text"
                            placeholder="Tìm theo tên sách hoặc ISBN..."
                            value={searchInput}
                            onChange={e => setSearchInput(e.target.value)}
                        />
                    </div>
                    <button type="button" className="admin-btn admin-btn--primary" onClick={() => { setEditingId(null); setFormOpen(true); }}>
                        + Thêm sách mới
                    </button>
                </div>

                {deleteError && <p className="admin-drawer__error" style={{ marginBottom: 10 }}>{deleteError}</p>}

                {loading ? (
                    <div className="admin-empty">Đang tải danh sách sách...</div>
                ) : error ? (
                    <div className="admin-empty admin-empty--error">{error}</div>
                ) : books.length === 0 ? (
                    <div className="admin-empty">
                        <div className="admin-empty__icon">📚</div>
                        <p>Không có sách nào khớp với bộ lọc hiện tại.</p>
                    </div>
                ) : (
                    <>
                        <div className="admin-table-wrap">
                            <table className="admin-table">
                                <thead>
                                    <tr>
                                        <th>Sách</th>
                                        <th>Danh mục</th>
                                        <th>Giá</th>
                                        <th>Tồn kho</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {books.map(book => (
                                        <tr key={book.book_id}>
                                            <td>
                                                <div className="admin-book-cell">
                                                    {book.image && <img src={book.image} alt={book.title} />}
                                                    <div>
                                                        <div className="admin-book-cell__title">{book.title}</div>
                                                        <span className="admin-table__muted">
                                                            {(book.authors || []).map(a => a.author_name).join(', ') || 'Chưa có tác giả'}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{book.category?.category_name || '—'}</td>
                                            <td className="admin-table__price">
                                                {book.discount_price ? (
                                                    <>
                                                        <div>{fmtPrice(book.discount_price)}</div>
                                                        <span className="admin-table__muted" style={{ textDecoration: 'line-through' }}>
                                                            {fmtPrice(book.price)}
                                                        </span>
                                                    </>
                                                ) : fmtPrice(book.price)}
                                            </td>
                                            <td style={{ color: Number(book.stock_quantity) === 0 ? '#b91c1c' : undefined }}>
                                                {book.stock_quantity}
                                            </td>
                                            <td><InlineBookStatusSelect book={book} onUpdated={handleStatusUpdated} /></td>
                                            <td>
                                                <div style={{ display: 'flex', gap: 6 }}>
                                                    <button type="button" className="admin-btn admin-btn--ghost"
                                                        onClick={() => { setEditingId(book.book_id); setFormOpen(true); }}>
                                                        Sửa
                                                    </button>
                                                    <button type="button" className="admin-btn admin-btn--ghost admin-btn--danger"
                                                        disabled={deletingId === book.book_id}
                                                        onClick={() => handleDelete(book)}>
                                                        {deletingId === book.book_id ? '...' : 'Xóa'}
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>

                        {meta.last_page > 1 && (
                            <div className="admin-pagination">
                                <button type="button" disabled={meta.current_page <= 1} onClick={() => setPage(p => Math.max(1, p - 1))}>‹ Trước</button>
                                <span>Trang {meta.current_page} / {meta.last_page} — {meta.total} sách</span>
                                <button type="button" disabled={meta.current_page >= meta.last_page} onClick={() => setPage(p => Math.min(meta.last_page, p + 1))}>Sau ›</button>
                            </div>
                        )}
                    </>
                )}
            </div>

            {formOpen && (
                <BookFormDrawer
                    bookId={editingId}
                    categories={categories}
                    publishers={publishers}
                    authors={authors}
                    onClose={() => setFormOpen(false)}
                    onSaved={() => { setFormOpen(false); loadBooks(); }}
                />
            )}
        </AdminLayout>
    );
}