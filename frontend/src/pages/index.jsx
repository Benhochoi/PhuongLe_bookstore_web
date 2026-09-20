import { useState, useEffect, useRef } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import axios from 'axios';
import '../styles/style.css';
import '../styles/nav-dropdown.css';
import { useAuth } from '../context/AuthContext';
import { addToCart, getCartCount } from '../utils/cartStorage';
import AboutDropdown from '../components/AboutDropdown';


const IconSearch = (props) => (
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" {...props}>
        <circle cx="11" cy="11" r="7" />
        <line x1="21" y1="21" x2="16.65" y2="16.65" />
    </svg>
);

const IconUser = (props) => (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" {...props}>
        <circle cx="12" cy="8" r="4" />
        <path d="M4 20c0-4 4-6 8-6s8 2 8 6" />
    </svg>
);

const IconCart = (props) => (
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" {...props}>
        <circle cx="9" cy="21" r="1" />
        <circle cx="20" cy="21" r="1" />
        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
    </svg>
);

const IconArrow = (props) => (
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" {...props}>
        <line x1="5" y1="12" x2="19" y2="12" />
        <polyline points="12 5 19 12 12 19" />
    </svg>
);

const IconBook = (props) => (
    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6" {...props}>
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
    </svg>
);

const IconTrend = (props) => (
    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6" {...props}>
        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
        <polyline points="17 6 23 6 23 12" />
    </svg>
);

const IconPsychology = (props) => (
    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6" {...props}>
        <path d="M9.5 2a5.5 5.5 0 0 0-5 7.8A4 4 0 0 0 6 17h1v3a2 2 0 0 0 2 2h2v-4h2v4h1a2 2 0 0 0 2-2v-3.2a4.5 4.5 0 0 0 1.5-8.6A5.5 5.5 0 0 0 9.5 2z" />
    </svg>
);

const IconChild = (props) => (
    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6" {...props}>
        <circle cx="12" cy="6" r="3" />
        <path d="M6 21v-5a6 6 0 0 1 12 0v5" />
    </svg>
);

const IconTranslate = (props) => (
    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6" {...props}>
        <path d="M4 5h9M7 3v2M9.5 5c0 4-3 7-6 8.5M6 9c1.3 2 3 3.3 5 4" />
        <path d="M13 21l4.5-11L22 21M14.5 17.5h6" />
    </svg>
);

const formatPrice = (value) => {
    const numericValue = Number(value) || 0;
    return `${numericValue.toLocaleString('vi-VN')}đ`;
};

/* Các thể loại hiển thị trong dropdown danh mục */
const NAV_CATEGORIES = [
    { label: 'Văn Học', path: '/van-hoc', icon: '📚' },
    { label: 'Thiếu Nhi', path: '/thieu-nhi', icon: '🌟' },
    { label: 'Kinh Tế', path: '/kinh-te', icon: '📈' },
    { label: 'Tiểu Sử, Hồi Ký', path: '/tieu-su-hoi-ky', icon: '✍️' },
];

/* Map tên danh mục sang route */
const getCategoryPath = (name) => {
    const n = (name || '').toLowerCase();
    if (n.includes('văn') || n.includes('liter')) return '/van-hoc';
    if (n.includes('thiếu') || n.includes('child')) return '/thieu-nhi';
    if (n.includes('kinh') || n.includes('econom')) return '/kinh-te';
    if (n.includes('tiểu sử') || n.includes('hồi ký')) return '/tieu-su-hoi-ky';
    return '/van-hoc';
};

const getCategoryIcon = (name, index) => {
    const normalized = (name || '').toLowerCase();
    if (normalized.includes('văn') || normalized.includes('liter')) return IconBook;
    if (normalized.includes('kinh') || normalized.includes('econom')) return IconTrend;
    if (normalized.includes('tâm') || normalized.includes('psych')) return IconPsychology;
    if (normalized.includes('thiếu') || normalized.includes('child')) return IconChild;
    if (normalized.includes('ngoại') || normalized.includes('language')) return IconTranslate;
    return index % 2 === 0 ? IconBook : IconTrend;
};

export default function IndexPage() {
    const { accessToken, user, loading } = useAuth();
    if (loading) return <div>Đang tải...</div>;

    const token = accessToken;
    const accountLabel = token ? (user?.full_name || user?.username || 'Tài khoản') : 'Đăng nhập';

    const [cartCount, setCartCount] = useState(getCartCount);
    const [searchTerm, setSearchTerm] = useState('');
    const [categories, setCategories] = useState([]);
    const [featuredBooks, setFeaturedBooks] = useState([]);
    const [bestsellerBooks, setBestsellerBooks] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [dropOpen, setDropOpen] = useState(false);
    const dropRef = useRef(null);
    const [aboutOpen, setAboutOpen] = useState(false);
    const aboutRef = useRef(null);
    const navigate = useNavigate();

    // Đóng dropdown khi click ra ngoài
    useEffect(() => {
        const handler = (e) => {
            if (dropRef.current && !dropRef.current.contains(e.target)) setDropOpen(false);
            if (aboutRef.current && !aboutRef.current.contains(e.target)) setAboutOpen(false);
        };
        document.addEventListener('mousedown', handler);
        return () => document.removeEventListener('mousedown', handler);
    }, []);

    useEffect(() => {
        const syncCart = () => setCartCount(getCartCount());
        window.addEventListener('cart-updated', syncCart);
        return () => window.removeEventListener('cart-updated', syncCart);
    }, []);

    const handleAddToCart = (event, book) => {
        event.stopPropagation();
        addToCart(book);
    };

    const handleSearchSubmit = (e) => {
        e.preventDefault();
        if (searchTerm.trim()) navigate(`/van-hoc?search=${encodeURIComponent(searchTerm.trim())}`);
    };

    const handleBookClick = (book) => {
        const slug = book.slug || book.book_id;
        if (slug) navigate(`/van-hoc/${slug}`);
    };

    useEffect(() => {
        setIsLoading(true);

        Promise.all([
            axios.get('/api/categories'),
            axios.get('/api/books'),
            axios.get('/api/books', { params: { sort: 'price_desc', per_page: 8 } }),
        ])
            .then(([categoriesRes, booksRes, bestsellerRes]) => {
                const categoryList = Array.isArray(categoriesRes.data)
                    ? categoriesRes.data
                    : (categoriesRes.data?.data ?? []);
                const bookList = Array.isArray(booksRes.data?.data)
                    ? booksRes.data.data
                    : (Array.isArray(booksRes.data) ? booksRes.data : []);
                const bestList = Array.isArray(bestsellerRes.data?.data)
                    ? bestsellerRes.data.data
                    : (Array.isArray(bestsellerRes.data) ? bestsellerRes.data : []);

                setCategories(categoryList.filter((category) => category?.status !== 'inactive'));
                setFeaturedBooks(bookList.slice(0, 8));
                setBestsellerBooks(bestList.slice(0, 8));
            })
            .catch((err) => {
                console.error('Lỗi tải dữ liệu từ backend:', err);
                setCategories([]);
                setFeaturedBooks([]);
                setBestsellerBooks([]);
            })
            .finally(() => setIsLoading(false));
    }, []);

    return (
        <div>
            {/* ---------- Header ---------- */}
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
                        <a href="#bestsellers">Bán chạy</a>
                        <AboutDropdown
                            open={aboutOpen}
                            onToggle={() => setAboutOpen(prev => !prev)}
                            onClose={() => setAboutOpen(false)}
                            dropRef={aboutRef}
                        />
                    </nav>

                    <div className="header-actions">
                        <form className="search-box" onSubmit={handleSearchSubmit}>
                            <IconSearch />
                            <input
                                type="text"
                                value={searchTerm}
                                onChange={(e) => setSearchTerm(e.target.value)}
                                placeholder="Tìm kiếm sách, tác giả..."
                            />
                        </form>

                        <Link to={token ? "/dashboard" : "/login"} className="account-link" aria-label="Tài khoản">
                            <IconUser />
                            <span className="account-link__label">{accountLabel}</span>
                        </Link>

                        <Link to="/cart" className="icon-btn" aria-label="Giỏ hàng">
                            <IconCart />
                            {cartCount > 0 && <span className="cart-badge">{cartCount}</span>}
                        </Link>
                    </div>
                </div>
            </header>

            <main>
                {/* ---------- Hero Banner ---------- */}
                <section className="hero">
                    <div
                        className="hero__bg"
                        style={{ backgroundImage: "url('/img/home.png')" }}
                        role="img"
                        aria-label="Không gian hiệu sách hiện đại"
                    />
                    <div className="hero__overlay" />
                    <div className="hero__content">
                        <div className="hero__inner">
                            <span className="hero__eyebrow">Cửa hàng sách trực tuyến</span>
                            <h1 className="hero__title">Thế Giới Sách<br />Trong Tầm Tay</h1>
                            <p className="hero__subtitle">
                                Khám phá kho tàng tri thức với hàng ngàn đầu sách được chọn lọc kỹ lưỡng,
                                mang lại trải nghiệm đọc sách tinh tế và hiện đại.
                            </p>
                            <div className="hero__actions">
                                <Link to="/products" className="btn btn-primary">Mua ngay</Link>
                                <a href="#featured-books" className="btn-outline">Khám phá thêm</a>
                            </div>
                        </div>
                    </div>
                </section>

                {/* ---------- Danh mục nổi bật ---------- */}
                <section className="section" id="categories">
                    <div className="container">
                        <div className="section-header">
                            <div>
                                <h2 className="section-title">Danh mục nổi bật</h2>
                                <p className="section-subtitle">Tìm kiếm theo chủ đề bạn yêu thích</p>
                            </div>
                            <Link to="/categories" className="see-all-link">
                                Xem tất cả <IconArrow />
                            </Link>
                        </div>

                        <div className="category-grid">
                            {!isLoading && categories.length === 0 ? (
                                <p className="section-subtitle">Chưa có danh mục nào được đăng tải.</p>
                            ) : (
                                categories.map((category, index) => {
                                    const Icon = getCategoryIcon(category.category_name || category.name || '', index);
                                    const categoryName = category.category_name || category.name || 'Danh mục';
                                    const categoryKey = category.category_id || category.id || `${categoryName}-${index}`;
                                    const categoryPath = getCategoryPath(categoryName);

                                    return (
                                        <Link key={categoryKey} to={categoryPath} className="category-card">
                                            <Icon />
                                            <span>{categoryName}</span>
                                        </Link>
                                    );
                                })
                            )}
                        </div>
                    </div>
                </section>

                {/* ---------- Sách nổi bật ---------- */}
                <section className="section section--alt" id="featured-books">
                    <div className="container">
                        <div className="section-header">
                            <div>
                                <h2 className="section-title">Sách nổi bật</h2>
                                <p className="section-subtitle">Những tựa sách được bạn đọc yêu thích nhất tuần qua</p>
                            </div>
                        </div>

                        <div className="book-grid">
                            {!isLoading && featuredBooks.length === 0 ? (
                                <p className="section-subtitle">Chưa có sản phẩm nào được đăng tải.</p>
                            ) : (
                                featuredBooks.map((book) => (
                                    <article
                                        key={book.book_id || book.id || book.slug}
                                        className="book-card"
                                        onClick={() => handleBookClick(book)}
                                        onKeyDown={(event) => {
                                            if (event.key === 'Enter' || event.key === ' ') {
                                                event.preventDefault();
                                                handleBookClick(book);
                                            }
                                        }}
                                        role="button"
                                        tabIndex={0}
                                    >
                                        <div className="book-card__image-wrap">
                                            <img
                                                src={book.image || 'https://placehold.co/400x600/e8e8e3/424842?text=S%C3%A1ch'}
                                                alt={`Bìa sách ${book.title || 'Sách'}`}
                                                loading="lazy"
                                            />
                                            {book.discount_price && book.discount_price < book.price ? (
                                                <span className="book-card__badge">SALE</span>
                                            ) : null}
                                        </div>
                                        <h3 className="book-card__title" title={book.title}>{book.title || 'Sách chưa có tên'}</h3>
                                        <p className="book-card__author">{book.category?.category_name || 'Danh mục chưa cập nhật'}</p>
                                        <div className="book-card__footer">
                                            <span className="book-price">{formatPrice(book.discount_price || book.price)}</span>
                                            <button
                                                type="button"
                                                className="cart-btn"
                                                aria-label={`Thêm ${book.title || 'sách'} vào giỏ`}
                                                onClick={(event) => handleAddToCart(event, book)}
                                            >
                                                <IconCart width="16" height="16" />
                                            </button>
                                        </div>
                                    </article>
                                ))
                            )}
                        </div>
                    </div>
                </section>

                {/* ---------- CTA cộng đồng ---------- */}
                <section className="section section--alt" id="bestsellers">
                    <div className="container">
                        <div className="section-header">
                            <div>
                                <h2 className="section-title">🔥 Sách Bán Chạy</h2>
                                <p className="section-subtitle">Được cộng đồng độc giả yêu thích và lựa chọn nhiều nhất</p>
                            </div>
                        </div>

                        <div className="book-grid">
                            {!isLoading && bestsellerBooks.length === 0 ? (
                                <p className="section-subtitle">Chưa có dữ liệu.</p>
                            ) : (
                                bestsellerBooks.map((book, idx) => (
                                    <article
                                        key={book.book_id || book.id}
                                        className="book-card"
                                        onClick={() => handleBookClick(book)}
                                        onKeyDown={(event) => {
                                            if (event.key === 'Enter' || event.key === ' ') {
                                                event.preventDefault();
                                                handleBookClick(book);
                                            }
                                        }}
                                        role="button"
                                        tabIndex={0}
                                        style={{ position: 'relative' }}
                                    >
                                        {/* Badge top 3 */}
                                        {idx < 3 && (
                                            <div style={{
                                                position: 'absolute', top: 8, left: 8, zIndex: 2,
                                                background: idx === 0 ? '#f59e0b' : idx === 1 ? '#94a3b8' : '#cd7f32',
                                                color: '#fff', fontSize: 10, fontWeight: 800,
                                                padding: '2px 8px', borderRadius: 20,
                                            }}>#{idx + 1}</div>
                                        )}
                                        <div className="book-card__image-wrap">
                                            <img
                                                src={book.image || book.cover_image || 'https://placehold.co/400x600/e8e8e3/424842?text=S%C3%A1ch'}
                                                alt={`Bìa sách ${book.title || 'Sách'}`}
                                                loading="lazy"
                                            />
                                            {book.discount_price && book.discount_price < book.price ? (
                                                <span className="book-card__badge">SALE</span>
                                            ) : null}
                                        </div>
                                        <h3 className="book-card__title" title={book.title}>{book.title || 'Sách chưa có tên'}</h3>
                                        <p className="book-card__author">{book.category?.category_name || 'Danh mục chưa cập nhật'}</p>
                                        <div className="book-card__footer">
                                            <span className="book-price">{formatPrice(book.discount_price || book.price)}</span>
                                            <button
                                                type="button"
                                                className="cart-btn"
                                                aria-label={`Thêm ${book.title || 'sách'} vào giỏ`}
                                                onClick={(event) => handleAddToCart(event, book)}
                                            >
                                                <IconCart width="16" height="16" />
                                            </button>
                                        </div>
                                    </article>
                                ))
                            )}
                        </div>
                    </div>
                </section>

                {/* ---------- CTA cộng đồng ---------- */}
                <section className="section" id="community">
                    <div className="container">
                        <div className="cta-card">
                            <div className="cta-content">
                                <h2>Tham gia cộng đồng yêu sách</h2>
                                <p>
                                    Cập nhật những tựa sách mới nhất, tham gia thảo luận và nhận những
                                    ưu đãi đặc biệt dành riêng cho thành viên.
                                </p>
                            </div>
                            <div>
                                <form className="cta-form" onSubmit={(e) => e.preventDefault()}>
                                    <input type="email" placeholder="Nhập email của bạn" required />
                                    <button type="submit" className="btn btn-primary">Đăng ký ngay</button>
                                </form>
                                <p className="cta-disclaimer">Chúng tôi cam kết bảo mật thông tin của bạn.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            {/* ---------- Footer ---------- */}
            <footer className="site-footer">
                <div className="container footer-top">
                    <div className="footer-brand">
                        <Link to="/" className="brand">PhuongLebookstore</Link>
                        <p>Kiến tạo không gian tri thức hiện đại, kết nối những tâm hồn yêu sách trên khắp mọi miền.</p>
                        <div className="footer-social">
                            <a href="#" aria-label="Chia sẻ"><IconArrow /></a>
                        </div>
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
                            <a href="#bestsellers">Sách bán chạy</a>
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
        </div>
    );
}