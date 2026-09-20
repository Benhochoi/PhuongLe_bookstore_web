/**
 * SiteLayout — Layout chung dùng đúng header + footer của trang chủ
 * Trích xuất từ index.jsx để tái sử dụng trên các trang thông tin.
 */
import { useState, useRef, useEffect } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import { getCartCount } from '../utils/cartStorage';
import AboutDropdown from '../components/AboutDropdown';
import '../styles/style.css';
import '../styles/nav-dropdown.css';

/* ── Icons (copy từ index.jsx) ── */
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

const NAV_CATEGORIES = [
    { label: 'Văn Học',        path: '/van-hoc',   icon: '📚' },
    { label: 'Thiếu Nhi',      path: '/thieu-nhi', icon: '🌟' },
    { label: 'Kinh Tế',        path: '/kinh-te',   icon: '📈' },
    { label: 'Tiểu Sử, Hồi Ký', path: '/tieu-su-hoi-ky', icon: '✍️' },
];

export default function SiteLayout({ children }) {
    const { accessToken, user } = useAuth();
    const navigate = useNavigate();
    const [cartCount, setCartCount] = useState(getCartCount);
    const [searchTerm, setSearchTerm] = useState('');
    const [dropOpen, setDropOpen] = useState(false);
    const dropRef = useRef(null);
    const [aboutOpen, setAboutOpen] = useState(false);
    const aboutRef = useRef(null);

    const accountLabel = accessToken
        ? (user?.full_name || user?.username || 'Tài khoản')
        : 'Đăng nhập';

    // Đóng dropdown khi click ra ngoài
    useEffect(() => {
        const handler = (e) => {
            if (dropRef.current && !dropRef.current.contains(e.target)) setDropOpen(false);
            if (aboutRef.current && !aboutRef.current.contains(e.target)) setAboutOpen(false);
        };
        document.addEventListener('mousedown', handler);
        return () => document.removeEventListener('mousedown', handler);
    }, []);

    // Đồng bộ số lượng giỏ hàng
    useEffect(() => {
        const sync = () => setCartCount(getCartCount());
        window.addEventListener('cart-updated', sync);
        return () => window.removeEventListener('cart-updated', sync);
    }, []);

    const handleSearchSubmit = (e) => {
        e.preventDefault();
        if (searchTerm.trim()) navigate(`/van-hoc?search=${encodeURIComponent(searchTerm.trim())}`);
    };

    return (
        <div>
            {/* ══════════ HEADER ══════════ */}
            <header className="site-header">
                <div className="site-header__inner">
                    <Link to="/" className="brand">PhuongLebookstore</Link>

                    <nav className="site-nav">
                        {/* Dropdown danh mục */}
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
                        <form className="search-box" onSubmit={handleSearchSubmit}>
                            <IconSearch />
                            <input
                                type="text"
                                value={searchTerm}
                                onChange={(e) => setSearchTerm(e.target.value)}
                                placeholder="Tìm kiếm sách, tác giả..."
                            />
                        </form>

                        <Link to={accessToken ? '/dashboard' : '/login'} className="account-link" aria-label="Tài khoản">
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

            {/* ══════════ CONTENT ══════════ */}
            <main>
                {children}
            </main>

            {/* ══════════ FOOTER ══════════ */}
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
                            <Link to="/#bestsellers">Sách bán chạy</Link>
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
