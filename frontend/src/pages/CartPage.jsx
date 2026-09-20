import { useState, useEffect, useRef } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import { getCart, saveCart, addToCart, getCartCount } from '../utils/cartStorage';
import '../styles/style.css';
import '../styles/nav-dropdown.css';
import '../styles/cart.css';
import AboutDropdown from '../components/AboutDropdown';

// Re-export để các file khác có thể import từ CartPage
export { getCart, saveCart, addToCart, getCartCount };

// ─── Helpers ──────────────────────────────────────────────────────────────────
const fmtPrice = (n) =>
    new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(n);

// ─── NAV CATEGORIES ───────────────────────────────────────────────────────────
const NAV_CATEGORIES = [
    { label: 'Văn Học',        path: '/van-hoc',    icon: '📚' },
    { label: 'Thiếu Nhi',      path: '/thieu-nhi',  icon: '🌟' },
    { label: 'Kinh Tế',        path: '/kinh-te',    icon: '📈' },
    { label: 'Tiểu Sử, Hồi Ký', path: '/tieu-su',  icon: '✍️' },
];

// ─── SITE HEADER ──────────────────────────────────────────────────────────────
function SiteHeader({ cartCount = 0 }) {
    const [dropOpen, setDropOpen] = useState(false);
    const dropRef = useRef(null);
    const [aboutOpen, setAboutOpen] = useState(false);
    const aboutRef = useRef(null);
    const { accessToken, user } = useAuth();
    const accountLabel = accessToken
        ? (user?.full_name || user?.username || 'Tài khoản')
        : 'Đăng nhập';

    useEffect(() => {
        const handler = (e) => {
            if (dropRef.current && !dropRef.current.contains(e.target)) setDropOpen(false);
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
                    <div className={`nav-dropdown${dropOpen ? ' open' : ''}`} ref={dropRef}>
                        <button
                            className="nav-dropdown__trigger"
                            onClick={() => setDropOpen(p => !p)}
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
                                <Link key={cat.path} to={cat.path} className="nav-dropdown__item" role="menuitem" onClick={() => setDropOpen(false)}>
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
                    <Link to={accessToken ? '/dashboard' : '/login'} className="account-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                            <circle cx="12" cy="8" r="4" /><path d="M4 20c0-4 4-6 8-6s8 2 8 6" />
                        </svg>
                        <span className="account-link__label">{accountLabel}</span>
                    </Link>
                    <Link to="/cart" className="icon-btn" aria-label="Giỏ hàng" style={{ position: 'relative' }}>
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

// ─── FOOTER ───────────────────────────────────────────────────────────────────
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

// ─── CART PAGE ────────────────────────────────────────────────────────────────
export default function CartPage() {
    const [items, setItems] = useState([]);
    const navigate = useNavigate();
    const { accessToken } = useAuth();

    // Sync từ localStorage
    const loadCart = () => setItems(getCart());

    useEffect(() => {
        loadCart();
        window.addEventListener('cart-updated', loadCart);
        return () => window.removeEventListener('cart-updated', loadCart);
    }, []);

    const cartCount = items.reduce((s, i) => s + i.qty, 0);

    // Thay đổi số lượng
    const changeQty = (bookId, delta) => {
        const updated = items.map(it =>
            it.book_id === bookId
                ? { ...it, qty: Math.min(Math.max(1, it.qty + delta), 99) }
                : it
        );
        saveCart(updated);
        setItems(updated);
    };

    // Xoá item
    const removeItem = (bookId) => {
        const updated = items.filter(it => it.book_id !== bookId);
        saveCart(updated);
        setItems(updated);
        window.dispatchEvent(new Event('cart-updated'));
    };

    // Tính tổng
    const subtotal = items.reduce((s, it) => s + it.price * it.qty, 0);
    const shippingFee = subtotal >= 500000 ? 0 : 30000;
    const total = subtotal + shippingFee;

    // ─── RENDER ───────────────────────────────────────────────────────────────
    return (
        <div className="cart-page">
            <SiteHeader cartCount={cartCount} />

            <main className="cart-page__body">
                <h1 className="cart-page__title">
                    Giỏ Hàng
                    {items.length > 0 && <span>({cartCount} sản phẩm)</span>}
                </h1>

                {items.length === 0 ? (
                    /* ── EMPTY ── */
                    <div className="cart-empty">
                        <div className="cart-empty__icon">🛒</div>
                        <h2>Giỏ hàng trống</h2>
                        <p>Bạn chưa thêm sách nào vào giỏ hàng.</p>
                        <Link to="/van-hoc" className="btn" style={{ display: 'inline-flex', textDecoration: 'none' }}>
                            Khám phá sách ngay
                        </Link>
                    </div>
                ) : (
                    <div className="cart-page__layout">

                        {/* ── LEFT: danh sách sách ── */}
                        <div className="cart-items-panel">
                            {/* Header cột */}
                            <div className="cart-items-header">
                                <span style={{ fontSize: 13, fontWeight: 600, color: 'var(--color-on-surface-variant)' }}>
                                    Sản phẩm
                                </span>
                                <div className="cart-items-header-labels">
                                    <span className="cart-col-label cart-col-label--qty">Số lượng</span>
                                    <span className="cart-col-label cart-col-label--total">Thành tiền</span>
                                    <span className="cart-col-label cart-col-label--del"></span>
                                </div>
                            </div>

                            {items.map(item => (
                                <div className="cart-item" key={item.book_id}>
                                    {/* Ảnh */}
                                    <Link to={`/van-hoc/${item.slug}`} className="cart-item__img-wrap" tabIndex={-1}>
                                        {item.image ? (
                                            <img src={item.image} alt={item.title} />
                                        ) : (
                                            <div className="cart-item__img-placeholder">📖</div>
                                        )}
                                    </Link>

                                    {/* Thông tin */}
                                    <div className="cart-item__info">
                                        <Link to={`/van-hoc/${item.slug}`} className="cart-item__title">
                                            {item.title}
                                        </Link>
                                        {item.author && (
                                            <p className="cart-item__author">{item.author}</p>
                                        )}
                                        <div className="cart-item__price-row">
                                            <span className="cart-item__price">{fmtPrice(item.price)}</span>
                                            {item.original_price && (
                                                <span className="cart-item__original">{fmtPrice(item.original_price)}</span>
                                            )}
                                        </div>
                                    </div>

                                    {/* Số lượng */}
                                    <div className="qty-control">
                                        <button
                                            className="qty-btn"
                                            onClick={() => changeQty(item.book_id, -1)}
                                            disabled={item.qty <= 1}
                                            aria-label="Giảm"
                                        >−</button>
                                        <span className="qty-value">{item.qty}</span>
                                        <button
                                            className="qty-btn"
                                            onClick={() => changeQty(item.book_id, 1)}
                                            disabled={item.qty >= 99}
                                            aria-label="Tăng"
                                        >+</button>
                                    </div>

                                    {/* Thành tiền */}
                                    <div className="cart-item__total">
                                        {fmtPrice(item.price * item.qty)}
                                    </div>

                                    {/* Xoá */}
                                    <button
                                        className="cart-item__del"
                                        onClick={() => removeItem(item.book_id)}
                                        aria-label="Xoá"
                                    >
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                            <path d="M10 11v6M14 11v6" />
                                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                        </svg>
                                    </button>
                                </div>
                            ))}
                        </div>

                        {/* ── RIGHT: tổng tiền ── */}
                        <div className="cart-summary">
                            <h2 className="cart-summary__title">Tóm tắt đơn hàng</h2>

                            <div className="cart-summary__row">
                                <span>Tạm tính ({cartCount} sản phẩm)</span>
                                <span>{fmtPrice(subtotal)}</span>
                            </div>

                            <div className="cart-summary__row">
                                <span>Phí vận chuyển</span>
                                <span>{shippingFee === 0 ? 'Miễn phí' : fmtPrice(shippingFee)}</span>
                            </div>

                            {subtotal < 500000 && (
                                <div className="cart-summary__ship-note">
                                    <span>🚚</span>
                                    Mua thêm <strong>&nbsp;{fmtPrice(500000 - subtotal)}&nbsp;</strong> để được miễn phí ship
                                </div>
                            )}

                            <div className="cart-summary__row cart-summary__row--total">
                                <span>Tổng cộng</span>
                                <span className="cart-summary__total-price">{fmtPrice(total)}</span>
                            </div>

                            <button
                                className="btn-checkout"
                                onClick={() => {
                                    if (!accessToken) {
                                        navigate('/login');
                                        return;
                                    }
                                    navigate('/checkout');
                                }}
                            >
                                Tiến hành thanh toán →
                            </button>

                            <Link to="/van-hoc" className="btn-continue">← Tiếp tục mua sắm</Link>
                        </div>
                    </div>
                )}
            </main>

            <SiteFooter />
        </div>
    );
}

