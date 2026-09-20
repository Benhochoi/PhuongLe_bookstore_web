import { useState, useEffect, useCallback } from 'react';
import AdminLayout from '../../layouts/AdminLayout';
import api from '../../services/api';

/* ─── Helpers ────────────────────────────────────────────────── */
const fmtPrice = (n) =>
    new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(Number(n) || 0);

const fmtDate = (str) =>
    str ? new Date(str).toLocaleDateString('vi-VN', { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit' }) : '—';

/* ─── Empty import form ──────────────────────────────────────── */
const EMPTY_FORM = {
    supplier_name: '',
    note: '',
    items: [{ book_id: '', book_title: '', quantity: 1, unit_cost: 0 }],
};

/* ═══════════════════════════════════════════════════════════════
   MAIN COMPONENT
   ═══════════════════════════════════════════════════════════════ */
export default function AdminStockImportPage() {
    /* ── list state ── */
    const [imports, setImports]     = useState([]);
    const [meta, setMeta]           = useState({ total: 0, current_page: 1, last_page: 1 });
    const [loading, setLoading]     = useState(true);
    const [search, setSearch]       = useState('');
    const [fromDate, setFromDate]   = useState('');
    const [toDate, setToDate]       = useState('');

    /* ── detail modal ── */
    const [detailImport, setDetailImport] = useState(null);

    /* ── create form ── */
    const [showForm, setShowForm]   = useState(false);
    const [form, setForm]           = useState(EMPTY_FORM);
    const [bookSearch, setBookSearch] = useState('');
    const [bookResults, setBookResults] = useState([]);
    const [activeItemIdx, setActiveItemIdx] = useState(null);
    const [saving, setSaving]       = useState(false);
    const [saveError, setSaveError] = useState('');

    /* ── supplier autocomplete ── */
    const [supplierSearch, setSupplierSearch] = useState('');
    const [supplierResults, setSupplierResults] = useState([]);
    const [showSupplierDrop, setShowSupplierDrop] = useState(false);

    /* ── fetch list ── */
    const fetchImports = useCallback((page = 1) => {
        setLoading(true);
        const params = { page, per_page: 15 };
        if (search) params.search = search;
        if (fromDate) params.from_date = fromDate;
        if (toDate) params.to_date = toDate;
        api.get('/admin/stock-imports', { params })
            .then(res => {
                setImports(res.data.data || []);
                setMeta(res.data.meta || {});
            })
            .catch(() => setImports([]))
            .finally(() => setLoading(false));
    }, [search, fromDate, toDate]);

    useEffect(() => { fetchImports(1); }, [fetchImports]);

    /* ── book search (for form) ── */
    useEffect(() => {
        if (!bookSearch.trim()) { setBookResults([]); return; }
        const timer = setTimeout(() => {
            api.get('/admin/books', { params: { search: bookSearch, per_page: 10 } })
                .then(res => {
                    const list = res.data?.data || res.data || [];
                    setBookResults(Array.isArray(list) ? list : []);
                })
                .catch(() => setBookResults([]));
        }, 300);
        return () => clearTimeout(timer);
    }, [bookSearch]);

    /* ── supplier search (for form) ── */
    useEffect(() => {
        if (!supplierSearch.trim()) { setSupplierResults([]); return; }
        const timer = setTimeout(() => {
            api.get('/admin/publishers', { params: { search: supplierSearch, per_page: 10 } })
                .then(res => {
                    const list = res.data?.data || res.data || [];
                    setSupplierResults(Array.isArray(list) ? list : []);
                })
                .catch(() => setSupplierResults([]));
        }, 200);
        return () => clearTimeout(timer);
    }, [supplierSearch]);

    /* ── form helpers ── */
    const addItem = () =>
        setForm(f => ({ ...f, items: [...f.items, { book_id: '', book_title: '', quantity: 1, unit_cost: 0 }] }));

    const removeItem = (idx) =>
        setForm(f => ({ ...f, items: f.items.filter((_, i) => i !== idx) }));

    const updateItem = (idx, field, value) =>
        setForm(f => {
            const items = [...f.items];
            items[idx] = { ...items[idx], [field]: value };
            return { ...f, items };
        });

    const selectBook = (idx, book) => {
        updateItem(idx, 'book_id', book.book_id);
        updateItem(idx, 'book_title', book.title);
        setBookSearch('');
        setBookResults([]);
        setActiveItemIdx(null);
    };

    const totalImportCost = form.items.reduce(
        (sum, item) => sum + (Number(item.quantity) || 0) * (Number(item.unit_cost) || 0), 0
    );

    /* ── save ── */
    const handleSave = async () => {
        setSaveError('');
        // Validate: phải có book_id, quantity > 0, unit_cost > 0
        const validItems = form.items.filter(i => i.book_id && i.quantity > 0);
        if (!validItems.length) {
            setSaveError('Vui lòng thêm ít nhất 1 sách hợp lệ.');
            return;
        }
        const zeroCostItems = validItems.filter(i => !i.unit_cost || Number(i.unit_cost) <= 0);
        if (zeroCostItems.length > 0) {
            setSaveError(`${zeroCostItems.length} sách chưa nhập đơn giá. Vui lòng điền đơn giá nhập (> 0) cho tất cả sách.`);
            return;
        }
        setSaving(true);
        try {
            await api.post('/admin/stock-imports', {
                supplier_name: form.supplier_name || null,
                note: form.note || null,
                items: validItems.map(i => ({
                    book_id: Number(i.book_id),
                    quantity: Number(i.quantity),
                    unit_cost: Number(i.unit_cost) || 0,
                })),
            });
            setShowForm(false);
            setForm(EMPTY_FORM);
            fetchImports(1);
        } catch (err) {
            setSaveError(err.response?.data?.message || 'Lỗi khi tạo phiếu nhập.');
        } finally {
            setSaving(false);
        }
    };

    /* ── detail ── */
    const openDetail = (imp) => setDetailImport(imp);

    /* ═══════════════════════ RENDER ═══════════════════════════ */
    return (
        <AdminLayout title="Nhập Kho" subtitle="Quản lý phiếu nhập sách vào kho">

            {/* ── Toolbar ── */}
            <div style={{ display: 'flex', gap: 12, flexWrap: 'wrap', marginBottom: 20, alignItems: 'flex-end' }}>
                <div style={{ flex: 1, minWidth: 180 }}>
                    <input
                        type="text"
                        className="admin-input"
                        placeholder="Tìm mã phiếu, nhà cung cấp..."
                        value={search}
                        onChange={e => setSearch(e.target.value)}
                    />
                </div>
                <div>
                    <label style={{ fontSize: 12, display: 'block', marginBottom: 3 }}>Từ ngày</label>
                    <input type="date" className="admin-input" value={fromDate} onChange={e => setFromDate(e.target.value)} style={{ width: 140 }} />
                </div>
                <div>
                    <label style={{ fontSize: 12, display: 'block', marginBottom: 3 }}>Đến ngày</label>
                    <input type="date" className="admin-input" value={toDate} onChange={e => setToDate(e.target.value)} style={{ width: 140 }} />
                </div>
                <button className="admin-btn admin-btn--primary" onClick={() => {
                    setForm(EMPTY_FORM);
                    setSupplierSearch('');
                    setSupplierResults([]);
                    setShowSupplierDrop(false);
                    setShowForm(true);
                }}>
                    + Tạo Phiếu Nhập
                </button>
            </div>

            {/* ── CREATE FORM ── */}
            {showForm && (
                <div style={{
                    background: 'var(--color-surface)',
                    border: '1px solid var(--color-border)',
                    borderRadius: 12,
                    padding: 24,
                    marginBottom: 28,
                }}>
                    <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: 20 }}>
                        <h3 style={{ margin: 0, fontSize: 17 }}>🏭 Tạo Phiếu Nhập Kho Mới</h3>
                        <button className="admin-btn" onClick={() => setShowForm(false)} style={{ padding: '4px 12px' }}>✕ Đóng</button>
                    </div>

                    <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 16, marginBottom: 20 }}>
                        <div style={{ position: 'relative' }}>
                            <label className="admin-label">Nhà cung cấp</label>
                            <input
                                type="text"
                                className="admin-input"
                                placeholder="Gõ để tìm nhà cung cấp..."
                                value={form.supplier_name}
                                autoComplete="off"
                                onFocus={() => setShowSupplierDrop(true)}
                                onBlur={() => setTimeout(() => setShowSupplierDrop(false), 150)}
                                onChange={e => {
                                    setForm(f => ({ ...f, supplier_name: e.target.value }));
                                    setSupplierSearch(e.target.value);
                                    setShowSupplierDrop(true);
                                }}
                            />
                            {showSupplierDrop && supplierResults.length > 0 && (
                                <div style={{
                                    position: 'absolute',
                                    zIndex: 200,
                                    background: '#fff',
                                    border: '1px solid var(--color-border)',
                                    borderRadius: 8,
                                    boxShadow: '0 4px 16px rgba(0,0,0,.12)',
                                    maxHeight: 200,
                                    overflowY: 'auto',
                                    width: '100%',
                                    top: '100%',
                                    left: 0,
                                }}>
                                    {supplierResults.map(pub => (
                                        <div
                                            key={pub.publisher_id}
                                            onMouseDown={() => {
                                                setForm(f => ({ ...f, supplier_name: pub.publisher_name }));
                                                setSupplierSearch('');
                                                setSupplierResults([]);
                                                setShowSupplierDrop(false);
                                            }}
                                            style={{
                                                padding: '8px 14px',
                                                cursor: 'pointer',
                                                fontSize: 13,
                                                borderBottom: '1px solid #f0f0f0',
                                            }}
                                            onMouseEnter={e => e.currentTarget.style.background = '#f5f5f5'}
                                            onMouseLeave={e => e.currentTarget.style.background = ''}
                                        >
                                            {pub.publisher_name}
                                        </div>
                                    ))}
                                </div>
                            )}
                        </div>
                        <div>
                            <label className="admin-label">Ghi chú</label>
                            <input
                                type="text"
                                className="admin-input"
                                placeholder="Ghi chú thêm (không bắt buộc)"
                                value={form.note}
                                onChange={e => setForm(f => ({ ...f, note: e.target.value }))}
                            />
                        </div>
                    </div>

                    {/* Items table */}
                    <div style={{ marginBottom: 12 }}>
                        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: 10 }}>
                            <label className="admin-label" style={{ marginBottom: 0 }}>Danh sách sách nhập</label>
                            <button className="admin-btn" onClick={addItem} style={{ padding: '4px 14px', fontSize: 13 }}>+ Thêm sách</button>
                        </div>
                        <div style={{ overflowX: 'auto' }}>
                            <table className="admin-table" style={{ minWidth: 680 }}>
                                <thead>
                                    <tr>
                                        <th style={{ width: '45%' }}>Tên sách</th>
                                        <th style={{ width: '15%' }}>Số lượng</th>
                                        <th style={{ width: '20%' }}>Đơn giá nhập</th>
                                        <th style={{ width: '15%' }}>Thành tiền</th>
                                        <th style={{ width: '5%' }}></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {form.items.map((item, idx) => (
                                        <tr key={idx}>
                                            <td style={{ position: 'relative' }}>
                                                {item.book_id ? (
                                                    <div style={{ display: 'flex', alignItems: 'center', gap: 8 }}>
                                                        <span style={{ fontSize: 13, flex: 1, overflow: 'hidden', textOverflow: 'ellipsis', whiteSpace: 'nowrap' }}>
                                                            {item.book_title}
                                                        </span>
                                                        <button
                                                            onClick={() => { updateItem(idx, 'book_id', ''); updateItem(idx, 'book_title', ''); }}
                                                            style={{ border: 'none', background: 'none', cursor: 'pointer', color: '#999', padding: 0 }}
                                                        >✕</button>
                                                    </div>
                                                ) : (
                                                    <div>
                                                        <input
                                                            type="text"
                                                            className="admin-input"
                                                            placeholder="Gõ để tìm sách..."
                                                            style={{ marginBottom: 0 }}
                                                            onFocus={() => setActiveItemIdx(idx)}
                                                            onChange={e => { setBookSearch(e.target.value); setActiveItemIdx(idx); }}
                                                            value={activeItemIdx === idx ? bookSearch : ''}
                                                        />
                                                        {activeItemIdx === idx && bookResults.length > 0 && (
                                                            <div style={{
                                                                position: 'absolute',
                                                                zIndex: 100,
                                                                background: '#fff',
                                                                border: '1px solid var(--color-border)',
                                                                borderRadius: 8,
                                                                boxShadow: '0 4px 16px rgba(0,0,0,.12)',
                                                                maxHeight: 220,
                                                                overflowY: 'auto',
                                                                width: '100%',
                                                                left: 0,
                                                                top: '100%',
                                                            }}>
                                                                {bookResults.map(book => (
                                                                    <div
                                                                        key={book.book_id}
                                                                        onClick={() => selectBook(idx, book)}
                                                                        style={{ padding: '8px 12px', cursor: 'pointer', borderBottom: '1px solid #f0f0f0', fontSize: 13 }}
                                                                        onMouseEnter={e => e.currentTarget.style.background = '#f5f5f5'}
                                                                        onMouseLeave={e => e.currentTarget.style.background = ''}
                                                                    >
                                                                        <div style={{ fontWeight: 500 }}>{book.title}</div>
                                                                        <div style={{ color: '#888', fontSize: 12 }}>
                                                                            Tồn kho: {book.stock_quantity ?? '?'} | {fmtPrice(book.discount_price || book.price)}
                                                                        </div>
                                                                    </div>
                                                                ))}
                                                            </div>
                                                        )}
                                                    </div>
                                                )}
                                            </td>
                                            <td>
                                                <input
                                                    type="number"
                                                    className="admin-input"
                                                    min={1}
                                                    value={item.quantity}
                                                    onChange={e => updateItem(idx, 'quantity', Math.max(1, parseInt(e.target.value) || 1))}
                                                    style={{ width: 80, marginBottom: 0 }}
                                                />
                                            </td>
                                            <td>
                                                <input
                                                    type="number"
                                                    className="admin-input"
                                                    min={0}
                                                    value={item.unit_cost}
                                                    onFocus={e => e.target.select()}
                                                    onChange={e => {
                                                        const raw = e.target.value;
                                                        // Cho phép xóa về rỗng khi đang gõ; lưu 0 nếu rỗng
                                                        const val = raw === '' ? 0 : Math.max(0, Number(raw) || 0);
                                                        updateItem(idx, 'unit_cost', val);
                                                    }}
                                                    style={{ width: 120, marginBottom: 0 }}
                                                />
                                            </td>
                                            <td style={{ fontWeight: 600 }}>
                                                {fmtPrice((item.quantity || 0) * (item.unit_cost || 0))}
                                            </td>
                                            <td>
                                                {form.items.length > 1 && (
                                                    <button
                                                        onClick={() => removeItem(idx)}
                                                        style={{ border: 'none', background: 'none', cursor: 'pointer', color: '#ef4444', fontSize: 18 }}
                                                    >🗑</button>
                                                )}
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colSpan={3} style={{ textAlign: 'right', fontWeight: 700, paddingRight: 12 }}>Tổng tiền nhập:</td>
                                        <td style={{ fontWeight: 700, color: 'var(--color-primary, #2563eb)' }}>{fmtPrice(totalImportCost)}</td>
                                        <td />
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    {saveError && <p style={{ color: '#ef4444', fontSize: 13, marginBottom: 12 }}>⚠️ {saveError}</p>}

                    <div style={{ display: 'flex', gap: 12, justifyContent: 'flex-end' }}>
                        <button className="admin-btn" onClick={() => setShowForm(false)}>Hủy</button>
                        <button className="admin-btn admin-btn--primary" onClick={handleSave} disabled={saving}>
                            {saving ? '⏳ Đang lưu...' : '✅ Xác nhận nhập kho'}
                        </button>
                    </div>
                </div>
            )}

            {/* ── LIST TABLE ── */}
            {loading ? (
                <p style={{ textAlign: 'center', color: '#888' }}>Đang tải...</p>
            ) : imports.length === 0 ? (
                <div style={{ textAlign: 'center', padding: '60px 0', color: '#888' }}>
                    <div style={{ fontSize: 40, marginBottom: 12 }}>📦</div>
                    <p>Chưa có phiếu nhập kho nào.</p>
                    <button className="admin-btn admin-btn--primary" onClick={() => { setForm(EMPTY_FORM); setShowForm(true); }}>
                        Tạo phiếu đầu tiên
                    </button>
                </div>
            ) : (
                <>
                    <div style={{ overflowX: 'auto' }}>
                        <table className="admin-table">
                            <thead>
                                <tr>
                                    <th>Mã phiếu</th>
                                    <th>Ngày nhập</th>
                                    <th>Nhà cung cấp</th>
                                    <th style={{ textAlign: 'center' }}>Số loại sách</th>
                                    <th style={{ textAlign: 'right' }}>Tổng tiền</th>
                                    <th>Người nhập</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                {imports.map(imp => (
                                    <tr key={imp.import_id}>
                                        <td>
                                            <span style={{ fontFamily: 'monospace', fontWeight: 600, color: '#2563eb' }}>
                                                {imp.import_code}
                                            </span>
                                        </td>
                                        <td style={{ fontSize: 13, color: '#666' }}>{fmtDate(imp.created_at)}</td>
                                        <td>{imp.supplier_name || <span style={{ color: '#bbb' }}>—</span>}</td>
                                        <td style={{ textAlign: 'center' }}>
                                            <span style={{
                                                background: '#eff6ff',
                                                color: '#2563eb',
                                                padding: '2px 10px',
                                                borderRadius: 20,
                                                fontSize: 13,
                                                fontWeight: 600,
                                            }}>
                                                {imp.items?.length || 0}
                                            </span>
                                        </td>
                                        <td style={{ textAlign: 'right', fontWeight: 600 }}>{fmtPrice(imp.total_cost)}</td>
                                        <td style={{ fontSize: 13 }}>{imp.creator?.full_name || imp.creator?.username || '—'}</td>
                                        <td>
                                            <button
                                                className="admin-btn"
                                                style={{ padding: '4px 12px', fontSize: 12 }}
                                                onClick={() => openDetail(imp)}
                                            >
                                                Chi tiết
                                            </button>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>

                    {/* Pagination */}
                    {meta.last_page > 1 && (
                        <div style={{ display: 'flex', justifyContent: 'center', gap: 8, marginTop: 20 }}>
                            {Array.from({ length: meta.last_page }, (_, i) => i + 1).map(p => (
                                <button
                                    key={p}
                                    className={`admin-btn${p === meta.current_page ? ' admin-btn--primary' : ''}`}
                                    style={{ minWidth: 36, padding: '4px 10px' }}
                                    onClick={() => fetchImports(p)}
                                >{p}</button>
                            ))}
                        </div>
                    )}

                    <p style={{ fontSize: 13, color: '#888', marginTop: 12 }}>
                        Tổng: {meta.total} phiếu nhập
                    </p>
                </>
            )}

            {/* ── DETAIL MODAL ── */}
            {detailImport && (
                <div style={{
                    position: 'fixed', inset: 0, background: 'rgba(0,0,0,.5)',
                    display: 'flex', alignItems: 'center', justifyContent: 'center', zIndex: 1000,
                }} onClick={() => setDetailImport(null)}>
                    <div style={{
                        background: '#fff', borderRadius: 16, padding: 28, width: '90%', maxWidth: 700,
                        maxHeight: '85vh', overflowY: 'auto',
                    }} onClick={e => e.stopPropagation()}>
                        <div style={{ display: 'flex', justifyContent: 'space-between', marginBottom: 20 }}>
                            <h3 style={{ margin: 0 }}>📋 Chi tiết phiếu nhập — {detailImport.import_code}</h3>
                            <button className="admin-btn" onClick={() => setDetailImport(null)} style={{ padding: '4px 12px' }}>✕</button>
                        </div>

                        <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 12, marginBottom: 20, fontSize: 14 }}>
                            <div><strong>Ngày nhập:</strong> {fmtDate(detailImport.created_at)}</div>
                            <div><strong>Người nhập:</strong> {detailImport.creator?.full_name || detailImport.creator?.username || '—'}</div>
                            <div><strong>Nhà cung cấp:</strong> {detailImport.supplier_name || '—'}</div>
                            <div><strong>Tổng tiền:</strong> <span style={{ fontWeight: 700, color: '#2563eb' }}>{fmtPrice(detailImport.total_cost)}</span></div>
                            {detailImport.note && <div style={{ gridColumn: '1/-1' }}><strong>Ghi chú:</strong> {detailImport.note}</div>}
                        </div>

                        <table className="admin-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sách</th>
                                    <th style={{ textAlign: 'center' }}>Số lượng</th>
                                    <th style={{ textAlign: 'right' }}>Đơn giá</th>
                                    <th style={{ textAlign: 'right' }}>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                {(detailImport.items || []).map((item, i) => (
                                    <tr key={item.item_id}>
                                        <td>{i + 1}</td>
                                        <td>{item.book?.title || `Book #${item.book_id}`}</td>
                                        <td style={{ textAlign: 'center', fontWeight: 600 }}>{item.quantity}</td>
                                        <td style={{ textAlign: 'right' }}>{fmtPrice(item.unit_cost)}</td>
                                        <td style={{ textAlign: 'right', fontWeight: 600 }}>{fmtPrice(item.total_cost)}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            )}
        </AdminLayout>
    );
}
