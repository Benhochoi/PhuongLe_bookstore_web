import { useEffect, useState, useCallback, useRef } from 'react';
import { Link, useLocation, useNavigate, useParams } from 'react-router-dom';
import axios from 'axios';
import { useAuth } from '../context/AuthContext';
import { addToCart, getCartCount } from '../utils/cartStorage';
import '../styles/style.css';
import '../styles/vanhoc.css';
import '../styles/nav-dropdown.css';
import AboutDropdown from '../components/AboutDropdown';

/* ============================================================
   Helpers
   ============================================================ */
const formatPrice = (value) => {
    const n = Number(value) || 0;
    return `${n.toLocaleString('vi-VN')}đ`;
};

const calcDiscount = (price, discountPrice) => {
    if (!discountPrice || !price || Number(discountPrice) >= Number(price)) return null;
    return Math.round((1 - Number(discountPrice) / Number(price)) * 100);
};

// Cart helpers dùng chung với CartPage và trang chủ

/* ============================================================
   StarRating
   ============================================================ */
const StarRating = ({ value = 0, max = 5, interactive = false, onRate }) => (
    <span className="star-rating">
        {Array.from({ length: max }).map((_, i) => (
            <svg key={i} width="14" height="14" viewBox="0 0 24 24"
                fill={i < Math.round(value) ? 'currentColor' : 'none'}
                stroke="currentColor" strokeWidth="2"
                style={{
                    color: i < Math.round(value) ? '#f59e0b' : '#d1d5db',
                    cursor: interactive ? 'pointer' : 'default',
                }}
                onClick={() => interactive && onRate && onRate(i + 1)}>
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
            </svg>
        ))}
    </span>
);

/* ============================================================
   DROPDOWN NAV CATEGORIES
   ============================================================ */
const NAV_CATEGORIES = [
    { label: 'Văn Học', path: '/van-hoc', icon: '📚' },
    { label: 'Thiếu Nhi', path: '/thieu-nhi', icon: '🌟' },
    { label: 'Kinh Tế', path: '/kinh-te', icon: '📈' },
    { label: 'Tiểu Sử, Hồi Ký', path: '/tieu-su-hoi-ky', icon: '✍️' },
];

/* ============================================================
   HEADER SHARED
   ============================================================ */
function SiteHeader({ searchTerm, setSearchTerm, onSearchSubmit, accountLabel, accessToken, cartCount }) {
    const [dropOpen, setDropOpen] = useState(false);
    const dropRef = useRef(null);
    const [aboutOpen, setAboutOpen] = useState(false);
    const aboutRef = useRef(null);

    // Đóng dropdown khi click ra ngoài
    useEffect(() => {
        const handler = (e) => {
            if (dropRef.current && !dropRef.current.contains(e.target)) {
                setDropOpen(false);
            }
            if (aboutRef.current && !aboutRef.current.contains(e.target)) setAboutOpen(false);
        };
        document.addEventListener('mousedown', handler);
        return () => document.removeEventListener('mousedown', handler);
    }, []);

    return (
        <header className="site-header">
            <div className="site-header__inner">
                <Link to="/" className="brand">PhuongLebookstore</Link>
                <nav className="site-nav">
                    {/* Danh mục dropdown — click để toggle */}
                    <div
                        className={`nav-dropdown${dropOpen ? ' open' : ''}`}
                        ref={dropRef}
                    >
                        <button
                            className="nav-dropdown__trigger"
                            onClick={() => setDropOpen(prev => !prev)}
                            aria-expanded={dropOpen}
                            aria-haspopup="true"
                        >
                            Danh mục
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" className="nav-dropdown__arrow">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <div className="nav-dropdown__menu" role="menu">
                            <div className="nav-dropdown__header">Thể loại sách</div>
                            {NAV_CATEGORIES.map(cat => (
                                <Link
                                    key={cat.path}
                                    to={cat.path}
                                    className="nav-dropdown__item"
                                    role="menuitem"
                                    onClick={() => setDropOpen(false)}
                                >
                                    <span className="nav-dropdown__icon">{cat.icon}</span>
                                    <span>{cat.label}</span>
                                </Link>
                            ))}
                        </div>
                    </div>
                    <Link to="/#bestsellers">Bán chạy</Link>
                    <AboutDropdown
                        open={aboutOpen}
                        onToggle={() => setAboutOpen(prev => !prev)}
                        onClose={() => setAboutOpen(false)}
                        dropRef={aboutRef}
                    />
                </nav>
                <div className="header-actions">
                    <form className="search-box" onSubmit={onSearchSubmit}>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                            <circle cx="11" cy="11" r="7" /><line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input type="text" value={searchTerm} onChange={e => setSearchTerm(e.target.value)}
                            placeholder="Tìm kiếm sách, tác giả..." />
                    </form>
                    <Link to={accessToken ? '/dashboard' : '/login'} className="account-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                            <circle cx="12" cy="8" r="4" /><path d="M4 20c0-4 4-6 8-6s8 2 8 6" />
                        </svg>
                        <span className="account-link__label">{accountLabel}</span>
                    </Link>
                    <Link to="/cart" className="icon-btn" aria-label="Giỏ hàng">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                            <circle cx="9" cy="21" r="1" /><circle cx="20" cy="21" r="1" />
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                        </svg>
                        {cartCount > 0 && <span className="cart-badge">{cartCount}</span>}
                    </Link>
                </div>
            </div>
        </header>
    );
}

/* ============================================================
   FOOTER SHARED
   ============================================================ */
function SiteFooter() {
    return (
        <footer className="site-footer">
            <div className="container footer-top">
                <div className="footer-brand">
                    <Link to="/" className="brand">PhuongLebookstore</Link>
                    <p>Kiến tạo không gian tri thức hiện đại, kết nối những tâm hồn yêu sách trên khắp mọi miền.</p>
                </div>
                <div className="footer-links">
                    <div className="footer-col">
                        <h4>Về chúng tôi</h4>
                        <Link to="/gioi-thieu">Giới thiệu</Link>
                        <Link to="/chinh-sach-van-chuyen">Chính sách vận chuyển</Link>
                        <Link to="/chinh-sach-bao-mat">Chính sách bảo mật</Link>
                    </div>
                    <div className="footer-col">
                        <h4>Khám phá</h4>
                        <a href="/#bestsellers">Sách bán chạy</a>
                        <Link to="/sach-moi">Sách mới</Link>
                        <Link to="/tac-gia">Tác giả</Link>
                    </div>
                    <div className="footer-col">
                        <h4>Hỗ trợ</h4>
                        <Link to="/lien-he">Liên hệ hỗ trợ</Link>
                        <Link to="/cau-hoi-thuong-gap">Câu hỏi thường gặp</Link>
                        <Link to="/doi-tra">Đổi trả</Link>
                    </div>
                </div>
            </div>
            <div className="footer-bottom">
                <div className="container">
                    <p>© {new Date().getFullYear()} PhuongLebookstore. All rights reserved.</p>
                </div>
            </div>
        </footer>
    );
}

/* ============================================================
   TRANG DANH SÁCH VĂN HỌC
   ============================================================ */
export function VanhocListPage() {
    return <BookListPage categoryKeyword="văn" pageTitle="Văn Học" />;
}

export function ThieuNhiListPage() {
    return <BookListPage categoryKeyword="thiếu" pageTitle="Thiếu Nhi" />;
}

function BookListPage({ categoryKeyword, pageTitle }) {
    const location = useLocation();
    const navigate = useNavigate();
    const { accessToken, user } = useAuth();
    const qp = new URLSearchParams(location.search);

    const [products, setProducts] = useState([]);
    const [totalResults, setTotalResults] = useState(0);
    const [totalPages, setTotalPages] = useState(1);
    const [currentPage, setCurrentPage] = useState(parseInt(qp.get('page')) || 1);
    const [loading, setLoading] = useState(true);
    const [searchTerm, setSearchTerm] = useState(qp.get('search') || '');
    const [cartCount, setCartCount] = useState(getCartCount());

    // Filter states
    const [selectedPriceRange, setSelectedPriceRange] = useState(null);
    const [sort, setSort] = useState(qp.get('sort') || 'best_seller');
    const [categoryId, setCategoryId] = useState(null);

    // Publishers filter
    const [publishers, setPublishers] = useState([]);
    const [selectedPublishers, setSelectedPublishers] = useState([]);

    // Authors filter
    const [authors, setAuthors] = useState([]);
    const [authorSearch, setAuthorSearch] = useState('');
    const [selectedAuthors, setSelectedAuthors] = useState([]);
    const [showAllAuthors, setShowAllAuthors] = useState(false);

    const accountLabel = accessToken ? (user?.full_name || user?.username || 'Tài khoản') : 'Đăng nhập';

    // Cart sync
    useEffect(() => {
        const update = () => setCartCount(getCartCount());
        window.addEventListener('cart-updated', update);
        return () => window.removeEventListener('cart-updated', update);
    }, []);

    // Lấy category_id theo keyword truyền vào (vd: "văn", "thiếu")
    useEffect(() => {
        axios.get('/api/categories').then(res => {
            const cats = Array.isArray(res.data) ? res.data : (res.data?.data ?? []);
            const found = cats.find(c => {
                const name = (c.category_name || c.name || '').toLowerCase();
                return name.includes(categoryKeyword);
            });
            setCategoryId(found ? (found.category_id || found.id) : undefined);
        }).catch(() => {
            setCategoryId(undefined);
        });
    // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [categoryKeyword]);

    // Lấy danh sách nhà xuất bản
    useEffect(() => {
        axios.get('/api/publishers').then(res => {
            const data = Array.isArray(res.data) ? res.data : (res.data?.data ?? []);
            setPublishers(data);
        }).catch(() => {});
    }, []);

    // Lấy danh sách tác giả
    useEffect(() => {
        axios.get('/api/authors', { params: { search: authorSearch } }).then(res => {
            const data = Array.isArray(res.data) ? res.data : (res.data?.data ?? []);
            setAuthors(data);
        }).catch(() => {});
    }, [authorSearch]);

    const fetchBooks = useCallback(() => {
        setLoading(true);
        const params = { page: currentPage, per_page: 12, sort };
        // categoryId = undefined nghĩa là chưa load xong / không có category → không filter
        if (categoryId) params.category = categoryId;
        if (selectedPriceRange) {
            if (selectedPriceRange.min !== undefined && selectedPriceRange.min !== '') params.min_price = selectedPriceRange.min;
            if (selectedPriceRange.max) params.max_price = selectedPriceRange.max;
        }
        if (selectedPublishers.length > 0) {
            selectedPublishers.forEach((id, idx) => { params[`publisher[${idx}]`] = id; });
        }
        if (selectedAuthors.length > 0) {
            selectedAuthors.forEach((id, idx) => { params[`author[${idx}]`] = id; });
        }
        const searchParam = new URLSearchParams(location.search).get('search') || searchTerm;
        if (searchParam) params.search = searchParam;

        axios.get('/api/books', { params })
            .then(res => {
                const data = res.data;
                const bookList = Array.isArray(data?.data) ? data.data : (Array.isArray(data) ? data : []);
                setProducts(bookList);
                setTotalResults(data?.total || bookList.length);
                setTotalPages(data?.last_page || 1);
            })
            .catch(() => setProducts([]))
            .finally(() => setLoading(false));
    // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [categoryId, currentPage, sort, selectedPriceRange, selectedPublishers, selectedAuthors, searchTerm]);

    // Load sách ngay khi categoryId được set (kể cả undefined = không tìm thấy category)
    useEffect(() => {
        if (categoryId !== null) fetchBooks();
    }, [fetchBooks, categoryId]);

    const handleSearchSubmit = (e) => {
        e.preventDefault();
        setCurrentPage(1);
        navigate(`/van-hoc?search=${encodeURIComponent(searchTerm)}`);
    };

    const handleResetFilters = () => {
        setSelectedPriceRange(null);
        setSelectedPublishers([]);
        setSelectedAuthors([]);
        setCurrentPage(1);
    };

    const togglePublisher = (id) => {
        setSelectedPublishers(prev =>
            prev.includes(id) ? prev.filter(x => x !== id) : [...prev, id]
        );
        setCurrentPage(1);
    };

    const toggleAuthor = (id) => {
        setSelectedAuthors(prev =>
            prev.includes(id) ? prev.filter(x => x !== id) : [...prev, id]
        );
        setCurrentPage(1);
    };

    const priceRanges = [
        { label: 'Dưới 100.000đ', min: 0, max: 100000 },
        { label: '100.000đ – 200.000đ', min: 100000, max: 200000 },
        { label: '200.000đ – 300.000đ', min: 200000, max: 300000 },
        { label: 'Trên 300.000đ', min: 300000, max: '' },
    ];

    const visibleAuthors = showAllAuthors ? authors : authors.slice(0, 6);
    const hasActiveFilters = selectedPriceRange || selectedPublishers.length > 0 || selectedAuthors.length > 0;

    const renderPagination = () => {
        if (totalPages <= 1) return null;
        const pages = [];
        const delta = 2;
        const range = [];
        for (let i = Math.max(1, currentPage - delta); i <= Math.min(totalPages, currentPage + delta); i++) {
            range.push(i);
        }
        if (range[0] > 1) { pages.push(1); if (range[0] > 2) pages.push('...'); }
        pages.push(...range);
        if (range[range.length - 1] < totalPages) {
            if (range[range.length - 1] < totalPages - 1) pages.push('...');
            pages.push(totalPages);
        }
        return (
            <div className="vl-pagination">
                <button className="vl-page-btn" disabled={currentPage === 1}
                    onClick={() => setCurrentPage(p => p - 1)}>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                        <polyline points="15 18 9 12 15 6" />
                    </svg>
                </button>
                {pages.map((p, i) => p === '...'
                    ? <span key={`dots-${i}`} className="vl-page-dots">…</span>
                    : <button key={p} className={`vl-page-btn${currentPage === p ? ' active' : ''}`}
                        onClick={() => setCurrentPage(p)}>{p}</button>
                )}
                <button className="vl-page-btn" disabled={currentPage === totalPages}
                    onClick={() => setCurrentPage(p => p + 1)}>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </button>
            </div>
        );
    };

    return (
        <div className="vl-page">
            <SiteHeader searchTerm={searchTerm} setSearchTerm={setSearchTerm}
                onSearchSubmit={handleSearchSubmit} accountLabel={accountLabel}
                accessToken={accessToken} cartCount={cartCount} />

            <main className="container vl-main">
                {/* Breadcrumb */}
                <nav className="vl-breadcrumb">
                    <Link to="/">Trang chủ</Link>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                    <span>{pageTitle}</span>
                </nav>

                {/* Page heading */}
                <div className="vl-heading">
                    <h1 className="vl-title">Sách {pageTitle}</h1>
                    <p className="vl-tagline">
                        {pageTitle === 'Thiếu Nhi'
                            ? 'Kho sách thiếu nhi phong phú — nuôi dưỡng trí tưởng tượng và tình yêu đọc sách từ nhỏ.'
                            : 'Khám phá thế giới của những câu chuyện kinh điển và đường đời, nơi từng trang sách mở ra những góc nhìn mới về cuộc sống.'}
                    </p>
                </div>

                <div className="vl-layout">
                    {/* ---- Sidebar Filter ---- */}
                    <aside className="vl-sidebar">
                        <div className="vl-filter-section">
                            <div className="vl-filter-header">
                                <h3 className="vl-filter-title">Bộ lọc tìm kiếm</h3>
                                {hasActiveFilters && (
                                    <button className="vl-reset-btn" onClick={handleResetFilters}>
                                        Xóa bộ lọc
                                    </button>
                                )}
                            </div>
                        </div>

                        {/* Mức giá */}
                        <div className="vl-filter-section">
                            <h4 className="vl-filter-label">Mức giá</h4>
                            {priceRanges.map(r => (
                                <label key={r.label} className="vl-radio-label">
                                    <input
                                        type="radio"
                                        name="price-range"
                                        className="vl-radio"
                                        onChange={() => { setSelectedPriceRange(r); setCurrentPage(1); }}
                                        checked={selectedPriceRange?.label === r.label}
                                    />
                                    <span>{r.label}</span>
                                </label>
                            ))}
                            {selectedPriceRange && (
                                <button className="vl-clear-filter-btn"
                                    onClick={() => { setSelectedPriceRange(null); setCurrentPage(1); }}>
                                    ✕ Bỏ lọc giá
                                </button>
                            )}
                        </div>

                        {/* Nhà xuất bản */}
                        {publishers.length > 0 && (
                            <div className="vl-filter-section">
                                <h4 className="vl-filter-label">Nhà xuất bản</h4>
                                {publishers.slice(0, 5).map(pub => (
                                    <label key={pub.publisher_id} className="vl-checkbox-label">
                                        <input
                                            type="checkbox"
                                            className="vl-checkbox"
                                            checked={selectedPublishers.includes(pub.publisher_id)}
                                            onChange={() => togglePublisher(pub.publisher_id)}
                                        />
                                        <span>{pub.publisher_name}</span>
                                    </label>
                                ))}
                            </div>
                        )}

                        {/* Tác giả */}
                        <div className="vl-filter-section">
                            <h4 className="vl-filter-label">Tác giả</h4>
                            <div className="vl-author-search">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                    <circle cx="11" cy="11" r="7" /><line x1="21" y1="21" x2="16.65" y2="16.65" />
                                </svg>
                                <input
                                    type="text"
                                    placeholder="Tìm tác giả..."
                                    value={authorSearch}
                                    onChange={e => setAuthorSearch(e.target.value)}
                                />
                            </div>
                            {visibleAuthors.map(author => (
                                <label key={author.author_id} className="vl-checkbox-label">
                                    <input
                                        type="checkbox"
                                        className="vl-checkbox"
                                        checked={selectedAuthors.includes(author.author_id)}
                                        onChange={() => toggleAuthor(author.author_id)}
                                    />
                                    <span>{author.author_name}</span>
                                </label>
                            ))}
                            {authors.length > 6 && !authorSearch && (
                                <button className="vl-show-more-btn"
                                    onClick={() => setShowAllAuthors(v => !v)}>
                                    {showAllAuthors ? 'Thu gọn' : `Xem thêm (${authors.length - 6})`}
                                </button>
                            )}
                        </div>

                        {/* Đánh giá */}
                        <div className="vl-filter-section">
                            <h4 className="vl-filter-label">Đánh giá</h4>
                            {[5, 4, 3].map(star => (
                                <label key={star} className="vl-checkbox-label">
                                    <input type="checkbox" className="vl-checkbox" />
                                    <StarRating value={star} />
                                    {star < 5 && <span style={{ fontSize: '12px', color: '#737971' }}>&amp; Up</span>}
                                </label>
                            ))}
                        </div>
                    </aside>

                    {/* ---- Book Grid ---- */}
                    <div className="vl-content">
                        {/* Toolbar */}
                        <div className="vl-toolbar">
                            <p className="vl-results-count">
                                Hiển thị {products.length} trong <strong>{totalResults}</strong> kết quả
                            </p>
                            <div className="vl-sort-wrap">
                                <label htmlFor="vl-sort" className="vl-sort-label">Sắp xếp theo:</label>
                                <select id="vl-sort" className="vl-sort-select"
                                    value={sort} onChange={e => { setSort(e.target.value); setCurrentPage(1); }}>
                                    <option value="newest">Mới nhất</option>
                                    <option value="best_seller">Bán chạy nhất</option>
                                    <option value="price_asc">Giá thấp → cao</option>
                                    <option value="price_desc">Giá cao → thấp</option>
                                </select>
                            </div>
                        </div>

                        {/* Active filter tags */}
                        {hasActiveFilters && (
                            <div className="vl-active-filters">
                                {selectedPriceRange && (
                                    <span className="vl-filter-tag">
                                        {selectedPriceRange.label}
                                        <button onClick={() => setSelectedPriceRange(null)}>✕</button>
                                    </span>
                                )}
                                {selectedPublishers.map(id => {
                                    const pub = publishers.find(p => p.publisher_id === id);
                                    return pub ? (
                                        <span key={id} className="vl-filter-tag">
                                            {pub.publisher_name}
                                            <button onClick={() => togglePublisher(id)}>✕</button>
                                        </span>
                                    ) : null;
                                })}
                                {selectedAuthors.map(id => {
                                    const author = authors.find(a => a.author_id === id);
                                    return author ? (
                                        <span key={id} className="vl-filter-tag">
                                            {author.author_name}
                                            <button onClick={() => toggleAuthor(id)}>✕</button>
                                        </span>
                                    ) : null;
                                })}
                            </div>
                        )}

                        {/* Grid */}
                        {loading ? (
                            <div className="vl-loading">
                                {Array.from({ length: 8 }).map((_, i) => (
                                    <div key={i} className="vl-book-skeleton" />
                                ))}
                            </div>
                        ) : products.length === 0 ? (
                            <div className="vl-empty">
                                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                                </svg>
                                <p>Không tìm thấy sách nào phù hợp</p>
                                {hasActiveFilters && (
                                    <button className="vl-apply-btn" onClick={handleResetFilters}>
                                        Xóa bộ lọc
                                    </button>
                                )}
                            </div>
                        ) : (
                            <div className="vl-book-grid">
                                {products.map(book => {
                                    const discount = calcDiscount(book.price, book.discount_price);
                                    const displayPrice = book.discount_price || book.price;
                                    const authors = book.authors?.map(a => a.author_name).join(', ')
                                        || book.category?.category_name || '';
                                    return (
                                        <div key={book.book_id || book.slug} className="vl-book-card">
                                            <Link to={`/van-hoc/${book.slug || book.book_id}`} className="vl-book-card__img-wrap">
                                                <img
                                                    src={book.image || 'https://placehold.co/400x600/e8e8e3/424842?text=Sach'}
                                                    alt={book.title}
                                                    loading="lazy"
                                                    onError={e => { e.target.src = 'https://placehold.co/400x600/e8e8e3/424842?text=Sach'; }}
                                                />
                                                {discount && (
                                                    <span className="vl-book-card__discount">-{discount}%</span>
                                                )}
                                            </Link>
                                            <div className="vl-book-card__body">
                                                <p className="vl-book-card__genre">
                                                    {book.category?.category_name || 'Văn Học'}
                                                </p>
                                                <Link to={`/van-hoc/${book.slug || book.book_id}`} className="vl-book-card__title-link">
                                                    <h3 className="vl-book-card__title" title={book.title}>
                                                        {book.title}
                                                    </h3>
                                                </Link>
                                                <p className="vl-book-card__author">{authors}</p>
                                                <StarRating value={4} />
                                                <div className="vl-book-card__footer">
                                                    <div className="vl-book-card__price-row">
                                                        <span className="vl-book-card__price">
                                                            {formatPrice(displayPrice)}
                                                        </span>
                                                        {book.discount_price && book.price > book.discount_price && (
                                                            <span className="vl-book-card__original">
                                                                {formatPrice(book.price)}
                                                            </span>
                                                        )}
                                                    </div>
                                                    <button
                                                        className="vl-book-card__cart-btn"
                                                        title="Thêm vào giỏ hàng"
                                                        onClick={e => {
                                                            e.preventDefault();
                                                            addToCart(book, 1);
                                                        }}
                                                    >
                                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                                            <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
                                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    );
                                })}
                            </div>
                        )}

                        {renderPagination()}
                    </div>
                </div>
            </main>

            <SiteFooter />
        </div>
    );
}

/* ============================================================
   TRANG CHI TIẾT SÁCH
   ============================================================ */
export function VanhocDetailPage() {
    const { slug } = useParams();
    const navigate = useNavigate();
    const { accessToken, user } = useAuth();
    const reviewFormRef = useRef(null);

    const [data, setData] = useState(null);
    const [loading, setLoading] = useState(true);
    const [quantity, setQuantity] = useState(1);
    const [searchTerm, setSearchTerm] = useState('');
    const [cartCount, setCartCount] = useState(getCartCount());
    const [activeImg, setActiveImg] = useState(0);
    const [addedToCart, setAddedToCart] = useState(false);

    // Review state
    const [reviewRating, setReviewRating] = useState(0);
    const [reviewHover, setReviewHover] = useState(0);
    const [reviewText, setReviewText] = useState('');
    const [reviewName, setReviewName] = useState(user?.full_name || '');
    const [reviewSubmitted, setReviewSubmitted] = useState(false);
    const [reviews, setReviews] = useState([]);
    const [canReview, setCanReview] = useState(false);
    const [reviewLoading, setReviewLoading] = useState(false);
    const [reviewError, setReviewError] = useState('');

    // Gallery intro
    const [activeIntroImg, setActiveIntroImg] = useState(0);
    // Description expand
    const [descExpanded, setDescExpanded] = useState(false);

    const accountLabel = accessToken ? (user?.full_name || user?.username || 'Tài khoản') : 'Đăng nhập';

    // Cart sync
    useEffect(() => {
        const update = () => setCartCount(getCartCount());
        window.addEventListener('cart-updated', update);
        return () => window.removeEventListener('cart-updated', update);
    }, []);

    useEffect(() => {
        setLoading(true);
        setActiveImg(0);
        setActiveIntroImg(0);
        setQuantity(1);
        setReviews([]);
        setCanReview(false);
        setDescExpanded(false);
        axios.get(`/api/books/${slug}`)
            .then(res => {
                const bookData = res.data?.book || res.data;
                const related = res.data?.related || [];
                setData({ book: bookData, related });
                // Load reviews
                const bookId = bookData?.book_id;
                if (bookId) {
                    axios.get(`/api/books/${bookId}/reviews`)
                        .then(r => setReviews(r.data || []))
                        .catch(() => {});
                    if (accessToken) {
                        axios.get(`/api/books/${bookId}/reviews/can-review`, {
                            headers: { Authorization: `Bearer ${accessToken}` }
                        }).then(r => setCanReview(r.data?.can_review || false))
                          .catch(() => {});
                    }
                }
            })
            .catch(() => setData(null))
            .finally(() => setLoading(false));
    }, [slug, accessToken]);

    const handleAddToCart = () => {
        if (!data?.book) return;
        const newCount = addToCart(data.book, quantity);
        setCartCount(newCount);
        setAddedToCart(true);
        setTimeout(() => setAddedToCart(false), 2500);
    };

    const handleBuyNow = () => {
        if (!data?.book) return;
        addToCart(data.book, quantity);
        navigate('/cart');
    };

    const handleWriteReview = () => {
        if (!accessToken) { navigate('/login'); return; }
        reviewFormRef.current?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    };

    const handleReviewSubmit = async (e) => {
        e.preventDefault();
        if (!reviewRating) return;
        if (!accessToken) { navigate('/login'); return; }
        setReviewLoading(true);
        setReviewError('');
        try {
            const bookId = data?.book?.book_id;
            const res = await axios.post(`/api/books/${bookId}/reviews`,
                { rating: reviewRating, comment: reviewText },
                { headers: { Authorization: `Bearer ${accessToken}` } }
            );
            setReviews(prev => [res.data.review, ...prev]);
            setReviewSubmitted(true);
            setCanReview(false);
            setReviewText('');
            setReviewRating(0);
        } catch (err) {
            setReviewError(err.response?.data?.message || 'Gửi đánh giá thất bại. Vui lòng thử lại.');
        } finally {
            setReviewLoading(false);
        }
    };

    if (loading) return (
        <div className="vd-page">
            <SiteHeader searchTerm={searchTerm} setSearchTerm={setSearchTerm}
                onSearchSubmit={e => e.preventDefault()} accountLabel={accountLabel}
                accessToken={accessToken} cartCount={cartCount} />
            <div className="vd-skeleton-wrap container">
                {Array.from({ length: 3 }).map((_, i) => <div key={i} className="vd-skeleton-block" />)}
            </div>
        </div>
    );

    if (!data?.book) return (
        <div className="vd-page">
            <SiteHeader searchTerm={searchTerm} setSearchTerm={setSearchTerm}
                onSearchSubmit={e => e.preventDefault()} accountLabel={accountLabel}
                accessToken={accessToken} cartCount={cartCount} />
            <div style={{ textAlign: 'center', padding: '80px 24px', color: '#737971' }}>
                <h2>Không tìm thấy cuốn sách này!</h2>
                <Link to="/van-hoc" className="vd-btn-back">← Quay lại danh sách</Link>
            </div>
        </div>
    );

    const { book, related } = data;
    const discount = calcDiscount(book.price, book.discount_price);
    const authorNames = book.authors?.map(a => a.author_name).join(', ') || 'Đang cập nhật';
    // Ảnh chính + ảnh phụ
    const allImages = [book.image, ...(book.images?.map(i => i.image_path) || [])].filter(Boolean);
    // Ảnh giới thiệu (ảnh phụ, không tính ảnh chính)
    const introImages = (book.images?.map(i => i.image_path) || []).filter(Boolean);

    const specs = [
        { label: 'Nhà xuất bản', value: book.publisher?.publisher_name || '—' },
        { label: 'Tác giả', value: authorNames },
        { label: 'Năm xuất bản', value: book.publish_year || '—' },
        { label: 'Ngôn ngữ', value: book.language || '—' },
        { label: 'Trọng lượng', value: book.weight ? `${book.weight}gr` : '—' },
        { label: 'Kích thước bao bì', value: book.dimensions || '—' },
        { label: 'Số trang', value: book.page_count || '—' },
        { label: 'Hình thức', value: book.cover_type || '—' },
    ];

    return (
        <div className="vd-page">
            <SiteHeader searchTerm={searchTerm} setSearchTerm={setSearchTerm}
                onSearchSubmit={e => { e.preventDefault(); navigate(`/van-hoc?search=${encodeURIComponent(searchTerm)}`); }}
                accountLabel={accountLabel} accessToken={accessToken} cartCount={cartCount} />

            <main className="container vd-main">
                {/* Breadcrumb */}
                <nav className="vl-breadcrumb">
                    <Link to="/">Trang chủ</Link>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                    <Link to="/van-hoc">Văn Học</Link>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                    <span>{book.title?.slice(0, 40)}{book.title?.length > 40 ? '…' : ''}</span>
                </nav>

                {/* ---- Top: Image + Info ---- */}
                <div className="vd-top">
                    {/* Image Gallery */}
                    <div className="vd-gallery">
                        <div className="vd-gallery__main">
                            <img
                                src={allImages[activeImg] || 'https://placehold.co/400x560/e8e8e3/424842?text=Sach'}
                                alt={book.title}
                                onError={e => { e.target.src = 'https://placehold.co/400x560/e8e8e3/424842?text=Sach'; }}
                            />
                        </div>
                        {allImages.length > 1 && (
                            <div className="vd-gallery__thumbs">
                                {allImages.map((img, i) => (
                                    <button key={i}
                                        className={`vd-gallery__thumb${activeImg === i ? ' active' : ''}`}
                                        onClick={() => setActiveImg(i)}>
                                        <img src={img} alt={`Ảnh ${i + 1}`}
                                            onError={e => { e.target.src = 'https://placehold.co/64x64/e8e8e3/424842?text=?'; }} />
                                    </button>
                                ))}
                            </div>
                        )}
                    </div>

                    {/* Info Panel */}
                    <div className="vd-info">
                        <div className="vd-info__badges">
                            {discount && <span className="vd-badge vd-badge--sale">Best Seller</span>}
                            <span className="vd-badge vd-badge--cat">
                                {book.category?.category_name || 'Văn Học'}
                            </span>
                        </div>

                        <h1 className="vd-info__title">{book.title}</h1>
                        <p className="vd-info__meta">
                            Tác giả: <strong>{authorNames}</strong>
                            &nbsp;|&nbsp;
                            Hình thức: <strong>{book.cover_type || 'Bìa Mềm'}</strong>
                        </p>

                        <div className="vd-info__price-block">
                            <span className="vd-info__price">
                                {formatPrice(book.discount_price || book.price)}
                            </span>
                            {book.discount_price && Number(book.price) > Number(book.discount_price) && (
                                <>
                                    <span className="vd-info__original">{formatPrice(book.price)}</span>
                                    <span className="vd-badge vd-badge--off">-{discount}%</span>
                                </>
                            )}
                        </div>

                        {/* Shipping info */}
                        <div className="vd-shipping">
                            <div className="vd-shipping__row">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5">
                                    <rect x="1" y="3" width="15" height="13" rx="1" />
                                    <path d="M16 8h4l3 5v3h-7V8z" /><circle cx="5.5" cy="18.5" r="1.5" />
                                    <circle cx="18.5" cy="18.5" r="1.5" />
                                </svg>
                                <div>
                                    <p className="vd-shipping__label">Giao hàng tận nơi</p>
                                    <p className="vd-shipping__sub">Phường Bến Nghé, Quận 1, Hồ Chí Minh &nbsp;<a href="#">Thay đổi</a></p>
                                </div>
                            </div>
                            <div className="vd-shipping__tags">
                                <span>Đổi trả miễn phí</span>
                                <span>12 tháng đổi trả</span>
                                <span>4 ngày giao hàng</span>
                                <a href="#">xem thêm</a>
                            </div>
                        </div>

                        {/* Quantity */}
                        <div className="vd-qty">
                            <label>Số lượng:</label>
                            <div className="vd-qty__control">
                                <button onClick={() => setQuantity(q => Math.max(1, q - 1))}>−</button>
                                <input type="number" min="1" max={book.stock_quantity || 99}
                                    value={quantity}
                                    onChange={e => setQuantity(Math.max(1, parseInt(e.target.value) || 1))} />
                                <button onClick={() => setQuantity(q => Math.min(book.stock_quantity || 99, q + 1))}>+</button>
                            </div>
                            <span className="vd-qty__stock">
                                {book.stock_quantity > 0
                                    ? <><span className="vd-stock-dot vd-stock-dot--in"></span>Còn {book.stock_quantity} cuốn</>
                                    : <><span className="vd-stock-dot vd-stock-dot--out"></span>Hết hàng</>
                                }
                            </span>
                        </div>

                        <div className="vd-actions">
                            <button className="vd-btn-wishlist" title="Yêu thích">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                </svg>
                            </button>
                            <button
                                className={`vd-btn-cart${addedToCart ? ' vd-btn-cart--success' : ''}`}
                                onClick={handleAddToCart}
                                disabled={book.stock_quantity === 0}>
                                {addedToCart ? (
                                    <>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                        Đã thêm vào giỏ
                                    </>
                                ) : (
                                    <>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                            <circle cx="9" cy="21" r="1" /><circle cx="20" cy="21" r="1" />
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                        </svg>
                                        Thêm vào giỏ hàng
                                    </>
                                )}
                            </button>
                            <button className="vd-btn-buy" onClick={handleBuyNow}
                                disabled={book.stock_quantity === 0}>
                                Mua ngay
                            </button>
                        </div>

                        {/* Trust badges */}
                        <div className="vd-trust">
                            <div className="vd-trust__item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                </svg>
                                <span>Cam kết chính hãng 100%</span>
                            </div>
                            <div className="vd-trust__item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                    <polyline points="17 6 23 6 23 12" />
                                </svg>
                                <span>Hoàn tiền nếu sách lỗi</span>
                            </div>
                        </div>
                    </div>
                </div>

                {/* ---- Thông tin chi tiết ---- */}
                <div className="vd-details-grid">
                    <div className="vd-specs">
                        <h2 className="vd-section-title">Thông tin chi tiết</h2>
                        <table className="vd-specs-table">
                            <tbody>
                                {specs.map(s => (
                                    <tr key={s.label}>
                                        <td className="vd-specs-table__label">{s.label}</td>
                                        <td className="vd-specs-table__value">{s.value}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>

                {/* ---- Mô tả sản phẩm ---- */}
                {book.description && (
                    <div className="vd-description">
                        <h2 className="vd-section-title">Mô tả sản phẩm</h2>
                        <div className={`vd-description__body${descExpanded ? ' expanded' : ''}`}>
                            <div className="vd-description__text"
                                style={{ whiteSpace: 'pre-line' }}>
                                {book.description}
                            </div>
                            {!descExpanded && <div className="vd-description__fade" />}
                        </div>
                        <button className="vd-description__toggle"
                            onClick={() => setDescExpanded(p => !p)}>
                            {descExpanded ? (
                                <>Thu gọn <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5"><polyline points="18 15 12 9 6 15"/></svg></>
                            ) : (
                                <>Xem thêm <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5"><polyline points="6 9 12 15 18 9"/></svg></>
                            )}
                        </button>
                    </div>
                )}

                {/* ---- Đánh giá sản phẩm ---- */}
                <div className="vd-reviews">
                    <h2 className="vd-section-title">Đánh giá sản phẩm</h2>

                    {/* Summary */}
                    {(() => {
                        const avgRating = reviews.length
                            ? (reviews.reduce((s, r) => s + r.rating, 0) / reviews.length).toFixed(1)
                            : 0;
                        const starCounts = [5,4,3,2,1].map(s => ({
                            star: s,
                            count: reviews.filter(r => r.rating === s).length,
                            pct: reviews.length ? Math.round(reviews.filter(r => r.rating === s).length / reviews.length * 100) : 0,
                        }));
                        return (
                            <div className="vd-reviews__layout">
                                <div className="vd-reviews__summary">
                                    <div className="vd-reviews__score">{avgRating}</div>
                                    <div className="vd-reviews__stars"><StarRating value={Number(avgRating)} /></div>
                                    <p className="vd-reviews__count">{reviews.length} đánh giá</p>
                                    <div className="vd-reviews__bars">
                                        {starCounts.map(({ star, count, pct }) => (
                                            <div key={star} className="vd-reviews__bar-row">
                                                <span>{star}</span>
                                                <div className="vd-reviews__bar">
                                                    <div className="vd-reviews__bar-fill" style={{ width: `${pct}%` }} />
                                                </div>
                                                <span>{count}</span>
                                            </div>
                                        ))}
                                    </div>
                                </div>

                                {/* Review list */}
                                <div className="vd-reviews__list">
                                    {reviews.length === 0 ? (
                                        <div className="vd-reviews__empty">
                                            <p>Chưa có đánh giá nào. Hãy là người đầu tiên!</p>
                                            {canReview && (
                                                <button className="vd-btn-review" onClick={handleWriteReview}>
                                                    Viết đánh giá
                                                </button>
                                            )}
                                        </div>
                                    ) : (
                                        <>
                                            {reviews.map(rv => (
                                                <div key={rv.review_id} className="vd-review-item">
                                                    <div className="vd-review-item__header">
                                                        <div className="vd-review-item__avatar">
                                                            {(rv.user?.full_name || rv.user?.username || '?').charAt(0).toUpperCase()}
                                                        </div>
                                                        <div>
                                                            <p className="vd-review-item__name">
                                                                {rv.user?.full_name || rv.user?.username || 'Ẩn danh'}
                                                                {rv.is_verified_purchase === 1 && (
                                                                    <span className="vd-review-item__verified">✓ Đã mua</span>
                                                                )}
                                                            </p>
                                                            <StarRating value={rv.rating} />
                                                        </div>
                                                        <span className="vd-review-item__date">
                                                            {new Date(rv.created_at).toLocaleDateString('vi-VN')}
                                                        </span>
                                                    </div>
                                                    {rv.comment && (
                                                        <p className="vd-review-item__comment">{rv.comment}</p>
                                                    )}
                                                </div>
                                            ))}
                                            {canReview && (
                                                <button className="vd-btn-review" onClick={handleWriteReview}
                                                    style={{ marginTop: 16 }}>
                                                    Viết đánh giá
                                                </button>
                                            )}
                                        </>
                                    )}
                                </div>
                            </div>
                        );
                    })()}

                    {/* Review form — chỉ hiển thị khi canReview */}
                    <div ref={reviewFormRef} className="vd-review-form">
                        {!accessToken ? (
                            <div className="vd-review-form__notice">
                                <span>🔒</span>
                                <p>Vui lòng <Link to="/login">đăng nhập</Link> để đánh giá sản phẩm.</p>
                            </div>
                        ) : !canReview && !reviewSubmitted ? (
                            <div className="vd-review-form__notice">
                                <span>🛒</span>
                                <p>Bạn cần <strong>mua và thanh toán thành công</strong> cuốn sách này mới có thể viết đánh giá.</p>
                                <Link to="/van-hoc" className="vd-btn-review" style={{ marginTop: 12, display: 'inline-block' }}>
                                    Mua sách ngay
                                </Link>
                            </div>
                        ) : reviewSubmitted ? (
                            <div className="vd-review-form__success">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#22c55e" strokeWidth="2">
                                    <circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/>
                                </svg>
                                <p>Cảm ơn bạn đã đánh giá!</p>
                            </div>
                        ) : (
                            <>
                                <h3 className="vd-review-form__title">Viết đánh giá của bạn</h3>
                                {reviewError && (
                                    <div style={{ color: '#dc2626', background: 'rgba(239,68,68,0.08)', borderRadius: 6, padding: '8px 12px', marginBottom: 12, fontSize: 13 }}>
                                        {reviewError}
                                    </div>
                                )}
                                <form onSubmit={handleReviewSubmit}>
                                    <div className="vd-review-form__stars">
                                        <span>Chọn số sao: *</span>
                                        <div className="vd-review-form__star-picker">
                                            {[1,2,3,4,5].map(s => (
                                                <svg key={s} width="28" height="28" viewBox="0 0 24 24"
                                                    fill={(reviewHover || reviewRating) >= s ? 'currentColor' : 'none'}
                                                    stroke="currentColor" strokeWidth="2"
                                                    style={{ color: (reviewHover || reviewRating) >= s ? '#f59e0b' : '#d1d5db', cursor: 'pointer' }}
                                                    onMouseEnter={() => setReviewHover(s)}
                                                    onMouseLeave={() => setReviewHover(0)}
                                                    onClick={() => setReviewRating(s)}>
                                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                                                </svg>
                                            ))}
                                        </div>
                                    </div>
                                    <div className="vd-review-form__field">
                                        <label>Nội dung đánh giá</label>
                                        <textarea rows={4}
                                            placeholder="Chia sẻ cảm nhận của bạn về cuốn sách này..."
                                            value={reviewText}
                                            onChange={e => setReviewText(e.target.value)} />
                                    </div>
                                    <button type="submit" className="vd-btn-buy"
                                        style={{ minWidth: '160px' }}
                                        disabled={!reviewRating || reviewLoading}>
                                        {reviewLoading ? 'Đang gửi...' : 'Gửi đánh giá'}
                                    </button>
                                </form>
                            </>
                        )}
                    </div>
                </div>


                {/* ---- Sản phẩm liên quan ---- */}
                {related.length > 0 && (
                    <div className="vd-related">
                        <div className="vd-section-header">
                            <h2 className="vd-section-title">Sản phẩm liên quan</h2>
                            <Link to="/van-hoc" className="vd-see-all">Xem tất cả</Link>
                        </div>
                        <div className="vd-related__grid">
                            {related.slice(0, 4).map(b => {
                                const d = calcDiscount(b.price, b.discount_price);
                                return (
                                    <Link key={b.book_id} to={`/van-hoc/${b.slug || b.book_id}`} className="vd-related__card">
                                        <div className="vd-related__img-wrap">
                                            <img
                                                src={b.image || 'https://placehold.co/200x280/e8e8e3/424842?text=Sach'}
                                                alt={b.title}
                                                onError={e => { e.target.src = 'https://placehold.co/200x280/e8e8e3/424842?text=Sach'; }}
                                            />
                                            {d && <span className="vl-book-card__discount">-{d}%</span>}
                                        </div>
                                        <h4 className="vd-related__title" title={b.title}>{b.title}</h4>
                                        <p className="vd-related__author">
                                            {b.authors?.map(a => a.author_name).join(', ') || ''}
                                        </p>
                                        <div className="vd-related__prices">
                                            <span className="vd-related__price">{formatPrice(b.discount_price || b.price)}</span>
                                            {b.discount_price && Number(b.price) > Number(b.discount_price) && (
                                                <span className="vd-related__original">{formatPrice(b.price)}</span>
                                            )}
                                            {d && <span className="vd-related__off">-{d}%</span>}
                                        </div>
                                    </Link>
                                );
                            })}
                        </div>
                    </div>
                )}

                {/* ---- Fahasa Giới thiệu (ảnh phụ gallery) ---- */}
                {introImages.length > 0 && (
                    <div className="vd-intro-gallery">
                        <div className="vd-section-header">
                            <h2 className="vd-section-title">Xem trước nội dung sách</h2>
                        </div>
                        <div className="vd-intro-gallery__layout">
                            <div className="vd-intro-gallery__main">
                                <img
                                    src={introImages[activeIntroImg]}
                                    alt={`Xem trước trang ${activeIntroImg + 1}`}
                                    onError={e => { e.target.src = 'https://placehold.co/600x400/e8e8e3/424842?text=Preview'; }}
                                />
                            </div>
                            {introImages.length > 1 && (
                                <div className="vd-intro-gallery__thumbs">
                                    {introImages.map((img, i) => (
                                        <button
                                            key={i}
                                            className={`vd-intro-gallery__thumb${activeIntroImg === i ? ' active' : ''}`}
                                            onClick={() => setActiveIntroImg(i)}>
                                            <img src={img} alt={`Preview ${i + 1}`}
                                                onError={e => { e.target.src = 'https://placehold.co/120x80/e8e8e3/424842?text=?'; }} />
                                        </button>
                                    ))}
                                </div>
                            )}
                        </div>
                    </div>
                )}
            </main>

            <SiteFooter />
        </div>
    );
}

/* ============================================================
   ExpandableDescription — "Xem thêm / Thu gọn"
   ============================================================ */
function ExpandableDescription({ description }) {
    const [expanded, setExpanded] = useState(false);
    const paragraphs = description.split('\n').filter(p => p.trim());

    return (
        <div className="vd-description">
            <h2 className="vd-section-title">Mô tả sản phẩm</h2>
            <div className={`vd-description__content${expanded ? ' expanded' : ''}`}>
                {paragraphs.map((para, i) => <p key={i}>{para}</p>)}
            </div>
            {paragraphs.length > 4 && (
                <button className="vd-description__toggle" onClick={() => setExpanded(v => !v)}>
                    {expanded ? (
                        <>Thu gọn <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><polyline points="18 15 12 9 6 15" /></svg></>
                    ) : (
                        <>Xem thêm <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><polyline points="6 9 12 15 18 9" /></svg></>
                    )}
                </button>
            )}
        </div>
    );
}
