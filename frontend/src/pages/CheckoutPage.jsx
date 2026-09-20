import { useState, useEffect, useRef } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import { getCart, saveCart } from '../utils/cartStorage';
import api from '../services/api';
import '../styles/style.css';
import '../styles/nav-dropdown.css';
import '../styles/checkout.css';
import AboutDropdown from '../components/AboutDropdown';

/* ── helpers ── */
const fmtPrice = (n) =>
    new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(Number(n) || 0);

const NAV_CATEGORIES = [
    { label: 'Văn Học',          path: '/van-hoc',   icon: '📚' },
    { label: 'Thiếu Nhi',        path: '/thieu-nhi', icon: '🌟' },
    { label: 'Kinh Tế',          path: '/kinh-te',   icon: '📈' },
    { label: 'Tiểu Sử, Hồi Ký', path: '/tieu-su',   icon: '✍️' },
];

const PAYMENT_METHODS = [
    {
        id: 'cod',
        name: 'Thanh toán khi nhận hàng (COD)',
        desc: 'Trả tiền mặt khi nhận hàng tại nhà',
        icon: '💵',
    },
    {
        id: 'bank_transfer',
        name: 'Chuyển khoản ngân hàng',
        desc: 'Chuyển khoản qua ATM / Internet Banking',
        icon: '🏦',
    },
    {
        id: 'momo',
        name: 'Ví MoMo',
        desc: 'Thanh toán nhanh qua ứng dụng MoMo',
        icon: '💜',
    },
    {
        id: 'zalopay',
        name: 'ZaloPay',
        desc: 'Thanh toán qua ví ZaloPay',
        icon: '🔵',
    },
];

/* ── SiteHeader ── */
function SiteHeader() {
    const [dropOpen, setDropOpen] = useState(false);
    const dropRef = useRef(null);
    const [aboutOpen, setAboutOpen] = useState(false);
    const aboutRef = useRef(null);
    const { accessToken, user } = useAuth();

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
                        <button className="nav-dropdown__trigger"
                            onClick={() => setDropOpen(p => !p)}>
                            Danh mục
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" strokeWidth="2.5" className="nav-dropdown__arrow">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <div className="nav-dropdown__menu">
                            <div className="nav-dropdown__header">Thể loại sách</div>
                            {NAV_CATEGORIES.map(cat => (
                                <Link key={cat.path} to={cat.path} className="nav-dropdown__item"
                                    onClick={() => setDropOpen(false)}>
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
                            <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 4-6 8-6s8 2 8 6"/>
                        </svg>
                        <span className="account-link__label">
                            {accessToken ? (user?.full_name || 'Tài khoản') : 'Đăng nhập'}
                        </span>
                    </Link>
                </div>
            </div>
        </header>
    );
}

/* ── SUCCESS SCREEN ── */
function SuccessScreen({ order, paymentMethod }) {
    const navigate = useNavigate();
    const methodName = PAYMENT_METHODS.find(m => m.id === paymentMethod)?.name || paymentMethod;

    return (
        <div className="checkout-body">
            <div className="checkout-success">
                <div className="checkout-success__icon">🎉</div>
                <h1 className="checkout-success__title">Đặt hàng thành công!</h1>
                <p className="checkout-success__code">
                    Mã đơn hàng: <strong>#{order.order_code}</strong>
                </p>
                <div className="checkout-success__detail">
                    <div className="checkout-success__row">
                        <span>Phương thức thanh toán</span>
                        <strong>{methodName}</strong>
                    </div>
                    <div className="checkout-success__row">
                        <span>Tổng tiền hàng</span>
                        <strong>{fmtPrice(order.total_amount)}</strong>
                    </div>
                    <div className="checkout-success__row">
                        <span>Phí vận chuyển</span>
                        <strong>{order.shipping_fee > 0 ? fmtPrice(order.shipping_fee) : 'Miễn phí'}</strong>
                    </div>
                    <div className="checkout-success__row">
                        <span>Thành tiền</span>
                        <strong style={{ color: 'var(--color-primary)', fontSize: 16 }}>
                            {fmtPrice(order.final_amount)}
                        </strong>
                    </div>
                    <div className="checkout-success__row">
                        <span>Trạng thái</span>
                        <strong>⏳ Chờ xác nhận</strong>
                    </div>
                </div>

                {paymentMethod === 'cod' && (
                    <div className="cod-banner">
                        <span>📋</span>
                        <span>
                            <strong>Thanh toán khi nhận hàng:</strong> Nhân viên giao hàng sẽ liên hệ
                            xác nhận địa chỉ. Vui lòng chuẩn bị đúng số tiền <strong>{fmtPrice(order.final_amount)}</strong> khi nhận hàng.
                        </span>
                    </div>
                )}

                {paymentMethod === 'bank_transfer' && (
                    <div className="bank-transfer-info">
                        <strong>Thông tin chuyển khoản</strong>
                        <p>Ngân hàng: <span>VietcomBank</span></p>
                        <p>Số tài khoản: <span>1234567890</span></p>
                        <p>Tên: <span>PHUONG LE BOOKSTORE</span></p>
                        <p>Nội dung: <span>#{order.order_code}</span></p>
                        <p style={{ color: '#dc2626', marginTop: 8 }}>
                            ⚠️ Đơn hàng sẽ được xử lý sau khi chúng tôi xác nhận thanh toán.
                        </p>
                    </div>
                )}

                <div className="checkout-success__actions" style={{ marginTop: 24 }}>
                    <Link to="/dashboard?tab=orders" className="btn-account btn-account--primary"
                        style={{ textDecoration: 'none', padding: '12px 24px' }}>
                        Xem đơn hàng
                    </Link>
                    <Link to="/van-hoc" className="btn-outline"
                        style={{ textDecoration: 'none', padding: '12px 24px' }}>
                        Tiếp tục mua sắm
                    </Link>
                </div>
            </div>
        </div>
    );
}

/* ── MAIN CHECKOUT PAGE ── */
export default function CheckoutPage() {
    const navigate = useNavigate();
    const { user, accessToken, loading } = useAuth();

    const [cartItems, setCartItems] = useState(() => getCart()); // lazy init — đọc cart đồng bộ, tránh flash redirect
    const [paymentMethod, setPaymentMethod] = useState('cod');
    const [submitting, setSubmitting] = useState(false);
    const [successOrder, setSuccessOrder] = useState(null);
    const [errors, setErrors] = useState({});

    const [form, setForm] = useState({
        receiver_name: '',
        receiver_phone: '',
        shipping_address: '',
        note: '',
    });

    /* Sync cart when localStorage changes (e.g. from another tab) */
    useEffect(() => {
        const sync = () => setCartItems(getCart());
        window.addEventListener('cart-updated', sync);
        return () => window.removeEventListener('cart-updated', sync);
    }, []);

    useEffect(() => {
        if (user) {
            setForm(prev => ({
                ...prev,
                receiver_name: prev.receiver_name || user.full_name || '',
                receiver_phone: prev.receiver_phone || user.phone || '',
                shipping_address: prev.shipping_address || user.address || '',
            }));
        }
    }, [user]);

    /* Auth guard */
    useEffect(() => {
        if (!loading && !accessToken) navigate('/login');
    }, [loading, accessToken, navigate]);

    /* Redirect to cart if empty */
    useEffect(() => {
        if (!loading && cartItems.length === 0 && !successOrder) navigate('/cart');
    }, [cartItems, loading, successOrder, navigate]);

    /* Calculations */
    const subtotal = cartItems.reduce((s, i) => s + (i.price || 0) * (i.qty || 1), 0);
    const shippingFee = subtotal >= 500000 ? 0 : 30000;
    const total = subtotal + shippingFee;

    /* Validate */
    const validate = () => {
        const errs = {};
        if (!form.receiver_name.trim()) errs.receiver_name = 'Vui lòng nhập tên người nhận';
        if (!form.receiver_phone.trim()) errs.receiver_phone = 'Vui lòng nhập số điện thoại';
        else if (!/^[0-9]{9,11}$/.test(form.receiver_phone.replace(/\s/g, '')))
            errs.receiver_phone = 'Số điện thoại không hợp lệ';
        if (!form.shipping_address.trim()) errs.shipping_address = 'Vui lòng nhập địa chỉ nhận hàng';
        return errs;
    };

    /* Submit */
    const handleSubmit = async (e) => {
        e.preventDefault();
        const errs = validate();
        if (Object.keys(errs).length > 0) { setErrors(errs); return; }
        setErrors({});
        setSubmitting(true);

        try {
            const payload = {
                items: cartItems.map(i => ({
                    book_id: i.book_id,
                    qty: i.qty || 1,
                    price: i.price,
                })),
                shipping_address: form.shipping_address,
                receiver_name: form.receiver_name,
                receiver_phone: form.receiver_phone,
                payment_method: paymentMethod,
                note: form.note || null,
            };

            const res = await api.post('/checkout', payload);
            const newOrder = res.data.order;

            /* Clear cart */
            saveCart([]);
            setSuccessOrder(newOrder);
        } catch (err) {
            const msg = err.response?.data?.message || 'Đặt hàng thất bại. Vui lòng thử lại.';
            alert(msg);
        } finally {
            setSubmitting(false);
        }
    };

    if (loading || !user) {
        return <div style={{ minHeight: '100vh', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>Đang tải...</div>;
    }

    if (successOrder) {
        return (
            <div className="checkout-page">
                <SiteHeader />
                <SuccessScreen order={successOrder} paymentMethod={paymentMethod} />
            </div>
        );
    }

    return (
        <div className="checkout-page">
            <SiteHeader />

            <div className="checkout-body">
                <h1 className="checkout-title">Thanh toán</h1>

                <form onSubmit={handleSubmit}>
                    <div className="checkout-layout">
                        {/* ── LEFT COLUMN ── */}
                        <div>
                            {/* Thông tin giao hàng */}
                            <div className="checkout-section">
                                <h2 className="checkout-section__title">Thông tin giao hàng</h2>
                                <div className="checkout-form-grid">
                                    <div className="checkout-form-group">
                                        <label htmlFor="receiver_name">Tên người nhận *</label>
                                        <input id="receiver_name"
                                            value={form.receiver_name}
                                            onChange={e => setForm({ ...form, receiver_name: e.target.value })}
                                            placeholder="Nhập họ và tên" />
                                        {errors.receiver_name && <span className="form-error">{errors.receiver_name}</span>}
                                    </div>

                                    <div className="checkout-form-group">
                                        <label htmlFor="receiver_phone">Số điện thoại *</label>
                                        <input id="receiver_phone"
                                            value={form.receiver_phone}
                                            onChange={e => setForm({ ...form, receiver_phone: e.target.value })}
                                            placeholder="0xxxxxxxxx" />
                                        {errors.receiver_phone && <span className="form-error">{errors.receiver_phone}</span>}
                                    </div>

                                    <div className="checkout-form-group full-width">
                                        <label htmlFor="shipping_address">Địa chỉ nhận hàng *</label>
                                        <input id="shipping_address"
                                            value={form.shipping_address}
                                            onChange={e => setForm({ ...form, shipping_address: e.target.value })}
                                            placeholder="Số nhà, đường, phường/xã, quận/huyện, tỉnh/thành phố" />
                                        {errors.shipping_address && <span className="form-error">{errors.shipping_address}</span>}
                                    </div>

                                    <div className="checkout-form-group full-width">
                                        <label htmlFor="note">Ghi chú cho đơn hàng</label>
                                        <textarea id="note"
                                            value={form.note}
                                            onChange={e => setForm({ ...form, note: e.target.value })}
                                            placeholder="Ví dụ: Giao giờ hành chính, gọi trước khi giao..." />
                                    </div>
                                </div>
                            </div>

                            {/* Phương thức thanh toán */}
                            <div className="checkout-section">
                                <h2 className="checkout-section__title">Phương thức thanh toán</h2>
                                <div className="payment-methods">
                                    {PAYMENT_METHODS.map(m => (
                                        <label key={m.id}
                                            className={`payment-method-item${paymentMethod === m.id ? ' selected' : ''}`}>
                                            <input type="radio" name="payment_method"
                                                value={m.id}
                                                checked={paymentMethod === m.id}
                                                onChange={() => setPaymentMethod(m.id)} />
                                            <span className="payment-method-icon">{m.icon}</span>
                                            <div className="payment-method-info">
                                                <p className="payment-method-name">{m.name}</p>
                                                <p className="payment-method-desc">{m.desc}</p>
                                            </div>
                                        </label>
                                    ))}
                                </div>

                                {paymentMethod === 'cod' && (
                                    <div className="cod-banner">
                                        <span>💡</span>
                                        <span>Thanh toán bằng tiền mặt khi nhận hàng. Đơn hàng sẽ được giao trong 2-5 ngày làm việc.</span>
                                    </div>
                                )}
                                {paymentMethod === 'bank_transfer' && (
                                    <div className="bank-transfer-info">
                                        <strong>Thông tin tài khoản nhận chuyển khoản</strong>
                                        <p>Ngân hàng: <span>VietcomBank — Chi nhánh HCM</span></p>
                                        <p>Số tài khoản: <span>1234 5678 90</span></p>
                                        <p>Tên tài khoản: <span>PHUONG LE BOOKSTORE</span></p>
                                        <p style={{ marginTop: 8 }}>Nội dung chuyển khoản: <span>Tên + Số điện thoại của bạn</span></p>
                                    </div>
                                )}
                            </div>
                        </div>

                        {/* ── RIGHT COLUMN: Order Summary ── */}
                        <div className="checkout-summary">
                            <h2 className="checkout-summary__title">Đơn hàng của bạn</h2>

                            <div className="checkout-book-list">
                                {cartItems.map(item => (
                                    <div key={item.book_id} className="checkout-book-item">
                                        {item.image
                                            ? <img src={item.image} alt={item.title} className="checkout-book-img"
                                                onError={e => { e.target.style.display = 'none'; }} />
                                            : <div className="checkout-book-img-placeholder">📚</div>
                                        }
                                        <div className="checkout-book-info">
                                            <p className="checkout-book-title">{item.title}</p>
                                            <p className="checkout-book-qty">x{item.qty || 1}</p>
                                        </div>
                                        <span className="checkout-book-price">
                                            {fmtPrice((item.price || 0) * (item.qty || 1))}
                                        </span>
                                    </div>
                                ))}
                            </div>

                            <hr className="checkout-divider" />

                            <div className="checkout-summary-row">
                                <span>Tạm tính ({cartItems.length} sản phẩm)</span>
                                <span>{fmtPrice(subtotal)}</span>
                            </div>
                            <div className="checkout-summary-row">
                                <span>Phí vận chuyển</span>
                                <span style={{ color: shippingFee === 0 ? 'var(--color-primary)' : 'inherit' }}>
                                    {shippingFee === 0 ? '🎁 Miễn phí' : fmtPrice(shippingFee)}
                                </span>
                            </div>
                            {shippingFee === 0 && (
                                <div className="checkout-summary-row" style={{ fontSize: 12, color: 'var(--color-primary)' }}>
                                    <span>✓ Đơn hàng ≥ 500.000đ được miễn phí vận chuyển</span>
                                </div>
                            )}

                            <div className="checkout-summary-row checkout-summary-row--total">
                                <span>Tổng thanh toán</span>
                                <span>{fmtPrice(total)}</span>
                            </div>

                            <button type="submit" className="btn-place-order" disabled={submitting}>
                                {submitting ? '⏳ Đang xử lý...' : `Đặt hàng — ${fmtPrice(total)}`}
                            </button>
                            <p className="checkout-note">
                                Bằng cách đặt hàng, bạn đồng ý với <Link to="/terms">Điều khoản sử dụng</Link> của chúng tôi.
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    );
}
