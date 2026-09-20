import { useEffect, useState, useCallback, useRef } from 'react';
import { Link, useNavigate, useLocation } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import api from '../services/api';
import { clearAuthState } from '../utils/authStorage';
import { getFavorites, saveFavorites } from '../utils/favoritesStorage';
import { updateProfile, changePassword, getOrders, getOrderStats } from '../services/userService';
import '../styles/style.css';
import '../styles/nav-dropdown.css';
import '../styles/dashboard.css';
import AboutDropdown from '../components/AboutDropdown';

/* ── helpers ── */
const fmtPrice = (n) =>
    new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(Number(n) || 0);

const parseDateParts = (dateStr) => {
    if (!dateStr) return { day: '', month: '', year: '' };
    const d = new Date(dateStr);
    if (Number.isNaN(d.getTime())) return { day: '', month: '', year: '' };
    return { day: String(d.getDate()), month: String(d.getMonth() + 1), year: String(d.getFullYear()) };
};

const buildDateString = (day, month, year) => {
    if (!day || !month || !year) return null;
    const d = new Date(Number(year), Number(month) - 1, Number(day));
    if (Number.isNaN(d.getTime())) return null;
    return d.toISOString().split('T')[0];
};

const CART_KEY = 'phuongle_cart';
const getCartCount = () => {
    try {
        const c = JSON.parse(localStorage.getItem(CART_KEY) || '[]');
        return c.reduce((s, i) => s + (i.qty || 1), 0);
    } catch { return 0; }
};

const ORDER_STATUS_LABELS = {
    pending:   'Chờ xác nhận',
    confirmed: 'Đã xác nhận',
    shipping:  'Đang giao',
    completed: 'Hoàn thành',
    cancelled: 'Đã hủy',
};

const ROLE_LABELS = {
    1: 'Quản trị viên',
    2: 'Nhân viên',
    3: 'Khách hàng',
    4: 'Người vận chuyển',
};

/* ── NAV DROPDOWN ── */
const NAV_CATEGORIES = [
    { label: 'Văn Học',          path: '/van-hoc',  icon: '📚' },
    { label: 'Thiếu Nhi',        path: '/thieu-nhi',icon: '🌟' },
    { label: 'Kinh Tế',          path: '/kinh-te',  icon: '📈' },
    { label: 'Tiểu Sử, Hồi Ký', path: '/tieu-su',  icon: '✍️' },
];

function SiteHeader() {
    const { user, accessToken, setAccessToken, setUser } = useAuth();
    const navigate = useNavigate();
    const [dropOpen, setDropOpen] = useState(false);
    const [cartCount, setCartCount] = useState(getCartCount());
    const dropRef = useRef(null);
    const [aboutOpen, setAboutOpen] = useState(false);
    const aboutRef = useRef(null);

    useEffect(() => {
        const syncCart = () => setCartCount(getCartCount());
        window.addEventListener('cart-updated', syncCart);
        return () => window.removeEventListener('cart-updated', syncCart);
    }, []);

    useEffect(() => {
        const handler = (e) => {
            if (dropRef.current && !dropRef.current.contains(e.target)) setDropOpen(false);
            if (aboutRef.current && !aboutRef.current.contains(e.target)) setAboutOpen(false);
        };
        document.addEventListener('mousedown', handler);
        return () => document.removeEventListener('mousedown', handler);
    }, []);

    const handleLogout = async () => {
        try { await api.post('/logout'); } catch {}
        setAccessToken(null);
        setUser(null);
        clearAuthState();
        navigate('/login');
    };

    return (
        <header className="site-header">
            <div className="site-header__inner">
                <Link to="/" className="brand">PhuongLebookstore</Link>
                <nav className="site-nav">
                    <div className={`nav-dropdown${dropOpen ? ' open' : ''}`} ref={dropRef}>
                        <button className="nav-dropdown__trigger"
                            onClick={() => setDropOpen(p => !p)}
                            aria-expanded={dropOpen} aria-haspopup="true">
                            Danh mục
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" className="nav-dropdown__arrow">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <div className="nav-dropdown__menu" role="menu">
                            <div className="nav-dropdown__header">Thể loại sách</div>
                            {NAV_CATEGORIES.map(cat => (
                                <Link key={cat.path} to={cat.path} className="nav-dropdown__item"
                                    role="menuitem" onClick={() => setDropOpen(false)}>
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
                    <Link to="/dashboard" className="account-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                            <circle cx="12" cy="8" r="4" /><path d="M4 20c0-4 4-6 8-6s8 2 8 6" />
                        </svg>
                        <span className="account-link__label">{user?.full_name || 'Tài khoản'}</span>
                    </Link>
                    <Link to="/cart" className="icon-btn" aria-label="Giỏ hàng" style={{ position: 'relative' }}>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                            <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                        </svg>
                        {cartCount > 0 && <span className="cart-badge">{cartCount}</span>}
                    </Link>
                    {accessToken && (
                        <button onClick={handleLogout} className="btn-outline"
                            style={{ fontSize: 13, padding: '7px 16px' }}>
                            Đăng xuất
                        </button>
                    )}
                </div>
            </div>
        </header>
    );
}

/* ── MENU ── */
const MENU_GROUPS = [
    {
        label: 'Tài khoản',
        items: [
            { id: 'profile',  label: 'Hồ sơ cá nhân',      icon: '👤' },
            { id: 'address',  label: 'Địa chỉ giao hàng',  icon: '📍' },
            { id: 'password', label: 'Đổi mật khẩu',       icon: '🔒' },
        ],
    },
    {
        label: 'Mua sắm',
        items: [
            { id: 'orders',    label: 'Đơn hàng của tôi', icon: '📦' },
            { id: 'purchased', label: 'Sách đã mua',      icon: '📚' },
            { id: 'favorites', label: 'Sách yêu thích',   icon: '❤️' },
            { id: 'stats',     label: 'Thống kê',         icon: '📊' },
        ],
    },
];

/* ── MAIN DASHBOARD ── */
export default function DashboardPage() {
    const navigate = useNavigate();
    const location = useLocation();
    const { user, accessToken, setAccessToken, setUser, loading } = useAuth();

    // Đọc ?tab= từ URL để tự động chuyển tab (ví dụ sau checkout redirect /dashboard?tab=orders)
    const initialTab = new URLSearchParams(location.search).get('tab') || 'profile';
    const [activeTab, setActiveTab] = useState(initialTab);
    const [message, setMessage] = useState({ type: '', text: '' });
    const [saving, setSaving] = useState(false);

    const [profileForm, setProfileForm] = useState({
        full_name: '', email: '', phone: '', gender: 'other', day: '', month: '', year: '',
    });
    const [addressForm, setAddressForm] = useState({ address: '' });
    const [passwordForm, setPasswordForm] = useState({
        current_password: '', new_password: '', new_password_confirmation: '',
    });

    const [stats, setStats] = useState({ total_spent: 0, successful_orders: 0, total_orders: 0 });
    const [orders, setOrders] = useState([]);
    const [favorites, setFavorites] = useState([]);
    const [purchasedBooks, setPurchasedBooks] = useState([]);
    const [cancellingId, setCancellingId] = useState(null);

    useEffect(() => {
        if (loading) return;
        if (!user && !accessToken) navigate('/login');
    }, [accessToken, loading, navigate, user]);

    useEffect(() => {
        if (!user) return;
        const dob = parseDateParts(user.date_of_birth);
        setProfileForm({
            full_name: user.full_name || '',
            email: user.email || '',
            phone: user.phone || '',
            gender: user.gender || 'other',
            ...dob,
        });
        setAddressForm({ address: user.address || '' });
    }, [user]);

    const loadDashboardData = useCallback(async () => {
        try {
            const [statsRes, ordersRes] = await Promise.all([
                getOrderStats().catch(() => ({ total_spent: 0, successful_orders: 0, total_orders: 0 })),
                getOrders().catch(() => ({ data: [] })),
            ]);
            setStats(statsRes);
            const orderList = ordersRes.data || [];
            setOrders(orderList);
            const purchased = [];
            orderList.filter(o => o.order_status === 'completed').forEach(order => {
                (order.items || []).forEach(item => {
                    if (item.book) purchased.push({
                        ...item.book, quantity: item.quantity,
                        unit_price: item.unit_price, order_code: order.order_code,
                        purchased_at: order.created_at,
                    });
                });
            });
            setPurchasedBooks(purchased);
        } catch {
            setOrders([]); setPurchasedBooks([]);
        }
        setFavorites(getFavorites());
    }, []);

    useEffect(() => {
        if (user && accessToken) loadDashboardData();
    }, [user, accessToken, loadDashboardData]);

    useEffect(() => {
        const syncFav = () => setFavorites(getFavorites());
        window.addEventListener('favorites-updated', syncFav);
        return () => window.removeEventListener('favorites-updated', syncFav);
    }, []);

    const showMessage = (type, text) => {
        setMessage({ type, text });
        setTimeout(() => setMessage({ type: '', text: '' }), 4000);
    };

    const handleLogout = async () => {
        try { await api.post('/logout'); } catch {}
        setAccessToken(null);
        setUser(null);
        clearAuthState();
        navigate('/login');
    };

    const handleSaveProfile = async (e) => {
        e.preventDefault(); setSaving(true);
        try {
            const date_of_birth = buildDateString(profileForm.day, profileForm.month, profileForm.year);
            const res = await updateProfile({ full_name: profileForm.full_name, phone: profileForm.phone || null, gender: profileForm.gender, date_of_birth });
            setUser(res.user);
            showMessage('success', res.message || 'Cập nhật thành công');
        } catch (err) {
            showMessage('error', err.response?.data?.message || 'Cập nhật thất bại');
        } finally { setSaving(false); }
    };

    const handleSaveAddress = async (e) => {
        e.preventDefault(); setSaving(true);
        try {
            const res = await updateProfile({ address: addressForm.address });
            setUser(res.user);
            showMessage('success', 'Lưu địa chỉ thành công');
        } catch (err) {
            showMessage('error', err.response?.data?.message || 'Lưu địa chỉ thất bại');
        } finally { setSaving(false); }
    };

    const handleChangePassword = async (e) => {
        e.preventDefault(); setSaving(true);
        try {
            const res = await changePassword(passwordForm);
            showMessage('success', res.message || 'Đổi mật khẩu thành công');
            setPasswordForm({ current_password: '', new_password: '', new_password_confirmation: '' });
        } catch (err) {
            const msg = err.response?.data?.message
                || err.response?.data?.errors?.current_password?.[0]
                || err.response?.data?.errors?.new_password?.[0]
                || 'Đổi mật khẩu thất bại';
            showMessage('error', msg);
        } finally { setSaving(false); }
    };

    const handleCancelOrder = async (orderId) => {
        const confirmed = window.confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');
        if (!confirmed) return;

        setCancellingId(orderId);
        try {
            const res = await api.patch(`/orders/${orderId}/cancel`);
            setOrders(prev => prev.map(o =>
                o.order_id === orderId ? { ...o, order_status: 'cancelled' } : o
            ));
            showMessage('success', res.data?.message || 'Hủy đơn hàng thành công');
        } catch (err) {
            showMessage('error', err.response?.data?.message || 'Hủy đơn hàng thất bại. Vui lòng thử lại.');
        } finally {
            setCancellingId(null);
        }
    };

    const handleRemoveFavorite = (bookId) => {
        const updated = getFavorites().filter(f => f.book_id !== bookId);
        saveFavorites(updated);
        setFavorites(updated);
    };

    if (loading || !user) {
        return (
            <div className="loading-state">
                <span>Đang tải...</span>
            </div>
        );
    }

    const favCount  = favorites.length;
    const initials  = (user.full_name || user.username || '?').charAt(0).toUpperCase();

    /* ── Tab content ── */
    const renderContent = () => {
        switch (activeTab) {

            /* ─── PROFILE ─── */
            case 'profile':
                return (
                    <>
                        {/* Stats banner */}
                        <div className="account-stats-grid">
                            <div className="account-stat-card">
                                <div className="account-stat-card__value">{stats.total_orders}</div>
                                <div className="account-stat-card__label">Số đơn hàng</div>
                            </div>
                            <div className="account-stat-card">
                                <div className="account-stat-card__value">{fmtPrice(stats.total_spent)}</div>
                                <div className="account-stat-card__label">Đã thanh toán</div>
                            </div>
                            <div className="account-stat-card">
                                <div className="account-stat-card__value">{favCount}</div>
                                <div className="account-stat-card__label">Sách yêu thích</div>
                            </div>
                            <div className="account-stat-card">
                                <div className="account-stat-card__value">{purchasedBooks.length}</div>
                                <div className="account-stat-card__label">Sách đã mua</div>
                            </div>
                        </div>

                        {/* Profile form */}
                        <div className="account-panel">
                            <h2 className="account-panel__title">Hồ sơ cá nhân</h2>
                            <p className="account-panel__subtitle">Cập nhật thông tin tài khoản của bạn</p>
                            <form className="account-form-grid" onSubmit={handleSaveProfile}>
                                <div className="account-form-row">
                                    <label htmlFor="full_name">Họ và tên *</label>
                                    <input id="full_name" value={profileForm.full_name}
                                        onChange={e => setProfileForm({ ...profileForm, full_name: e.target.value })}
                                        placeholder="Nhập họ và tên" required />
                                </div>
                                <div className="account-form-row">
                                    <label htmlFor="email">Email</label>
                                    <input id="email" value={profileForm.email} disabled placeholder="Email" />
                                </div>
                                <div className="account-form-row">
                                    <label htmlFor="phone">Số điện thoại</label>
                                    <input id="phone" value={profileForm.phone}
                                        onChange={e => setProfileForm({ ...profileForm, phone: e.target.value })}
                                        placeholder="Nhập số điện thoại" />
                                </div>
                                <div className="account-form-row">
                                    <span>Giới tính</span>
                                    <div className="account-radio-group">
                                        {[['male','Nam'],['female','Nữ'],['other','Khác']].map(([v,l]) => (
                                            <label key={v}>
                                                <input type="radio" name="gender" value={v}
                                                    checked={profileForm.gender === v}
                                                    onChange={e => setProfileForm({ ...profileForm, gender: e.target.value })} />
                                                {l}
                                            </label>
                                        ))}
                                    </div>
                                </div>
                                <div className="account-form-row">
                                    <span>Ngày sinh</span>
                                    <div className="account-dob-row">
                                        <select value={profileForm.day}
                                            onChange={e => setProfileForm({ ...profileForm, day: e.target.value })}>
                                            <option value="">Ngày</option>
                                            {Array.from({length:31},(_,i)=>(
                                                <option key={i+1} value={String(i+1)}>{i+1}</option>
                                            ))}
                                        </select>
                                        <select value={profileForm.month}
                                            onChange={e => setProfileForm({ ...profileForm, month: e.target.value })}>
                                            <option value="">Tháng</option>
                                            {Array.from({length:12},(_,i)=>(
                                                <option key={i+1} value={String(i+1)}>Tháng {i+1}</option>
                                            ))}
                                        </select>
                                        <select value={profileForm.year}
                                            onChange={e => setProfileForm({ ...profileForm, year: e.target.value })}>
                                            <option value="">Năm</option>
                                            {Array.from({length:80},(_,i)=>{
                                                const y = new Date().getFullYear() - i;
                                                return <option key={y} value={String(y)}>{y}</option>;
                                            })}
                                        </select>
                                    </div>
                                </div>
                                <div className="account-actions">
                                    <button type="submit" className="btn-account btn-account--primary" disabled={saving}>
                                        {saving ? 'Đang lưu...' : 'Lưu thay đổi'}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </>
                );

            /* ─── ADDRESS ─── */
            case 'address':
                return (
                    <div className="account-panel">
                        <h2 className="account-panel__title">Địa chỉ giao hàng</h2>
                        <p className="account-panel__subtitle">Quản lý địa chỉ nhận hàng của bạn</p>
                        <form className="account-form-grid" onSubmit={handleSaveAddress}>
                            <div className="account-form-row">
                                <label htmlFor="full_name_addr">Họ và tên</label>
                                <input id="full_name_addr" value={user.full_name || ''} disabled />
                            </div>
                            <div className="account-form-row">
                                <label htmlFor="phone_addr">Số điện thoại</label>
                                <input id="phone_addr" value={user.phone || ''} disabled placeholder="Chưa có số điện thoại" />
                            </div>
                            <div className="account-form-row">
                                <label htmlFor="address">Địa chỉ *</label>
                                <textarea id="address" value={addressForm.address}
                                    onChange={e => setAddressForm({ address: e.target.value })}
                                    placeholder="Số nhà, đường, phường/xã, quận/huyện, tỉnh/thành phố" />
                            </div>
                            <div className="account-actions">
                                <button type="submit" className="btn-account btn-account--primary" disabled={saving}>
                                    {saving ? 'Đang lưu...' : 'Lưu địa chỉ'}
                                </button>
                            </div>
                        </form>
                    </div>
                );

            /* ─── PASSWORD ─── */
            case 'password':
                return (
                    <div className="account-panel">
                        <h2 className="account-panel__title">Đổi mật khẩu</h2>
                        <p className="account-panel__subtitle">Bảo mật tài khoản với mật khẩu mạnh</p>
                        <form className="account-form-grid" onSubmit={handleChangePassword}>
                            <div className="account-form-row">
                                <label htmlFor="current_password">Mật khẩu hiện tại *</label>
                                <input id="current_password" type="password"
                                    value={passwordForm.current_password}
                                    onChange={e => setPasswordForm({ ...passwordForm, current_password: e.target.value })}
                                    placeholder="Mật khẩu hiện tại" required />
                            </div>
                            <div className="account-form-row">
                                <label htmlFor="new_password">Mật khẩu mới *</label>
                                <input id="new_password" type="password"
                                    value={passwordForm.new_password}
                                    onChange={e => setPasswordForm({ ...passwordForm, new_password: e.target.value })}
                                    placeholder="Tối thiểu 8 ký tự" required minLength={8} />
                            </div>
                            <div className="account-form-row">
                                <label htmlFor="new_password_confirmation">Xác nhận mật khẩu *</label>
                                <input id="new_password_confirmation" type="password"
                                    value={passwordForm.new_password_confirmation}
                                    onChange={e => setPasswordForm({ ...passwordForm, new_password_confirmation: e.target.value })}
                                    placeholder="Nhập lại mật khẩu mới" required minLength={8} />
                            </div>
                            <div className="account-actions">
                                <button type="submit" className="btn-account btn-account--primary" disabled={saving}>
                                    {saving ? 'Đang xử lý...' : 'Đổi mật khẩu'}
                                </button>
                            </div>
                        </form>
                    </div>
                );

            /* ─── ORDERS ─── */
            case 'orders':
                return (
                    <div className="account-panel">
                        <h2 className="account-panel__title">Đơn hàng của tôi</h2>
                        <p className="account-panel__subtitle">Theo dõi trạng thái các đơn hàng</p>
                        {orders.length === 0 ? (
                            <div className="account-empty">
                                <div className="account-empty__icon">📦</div>
                                <p>Bạn chưa có đơn hàng nào.</p>
                                <Link to="/van-hoc" className="btn-account btn-account--primary"
                                    style={{ display: 'inline-block', textDecoration: 'none', marginTop: 16 }}>
                                    Mua sách ngay
                                </Link>
                            </div>
                        ) : (
                            <div className="account-order-list">
                                {orders.map(order => (
                                    <div key={order.order_id} className="account-order-card">
                                        <div className="account-order-card__header">
                                            <span className="account-order-card__code">#{order.order_code}</span>
                                            <span style={{ color: 'var(--color-on-surface-variant)' }}>
                                                {new Date(order.created_at).toLocaleDateString('vi-VN')}
                                            </span>
                                            <span className={`account-order-status account-order-status--${order.order_status}`}>
                                                {ORDER_STATUS_LABELS[order.order_status] || order.order_status}
                                            </span>
                                        </div>
                                        <div className="account-order-card__body">
                                            {(order.items || []).map(item => (
                                                <div key={item.order_item_id} className="account-order-item">
                                                    {item.book?.image && (
                                                        <img src={item.book.image} alt={item.book.title}
                                                            className="account-order-item__img" />
                                                    )}
                                                    <div className="account-order-item__info">
                                                        <p className="account-order-item__title">
                                                            {item.book?.title || 'Sách'}
                                                        </p>
                                                        <p className="account-order-item__meta">
                                                            SL: {item.quantity} × {fmtPrice(item.unit_price)}
                                                        </p>
                                                    </div>
                                                </div>
                                            ))}
                                        </div>
                                        <div className="account-order-card__footer">
                                            <span>Tổng thanh toán</span>
                                            <span className="account-order-card__total">{fmtPrice(order.final_amount)}</span>
                                        </div>
                                        {['pending', 'confirmed'].includes(order.order_status) && (
                                            <div className="account-order-card__actions">
                                                <button type="button"
                                                    className="btn-outline btn-cancel-order"
                                                    disabled={cancellingId === order.order_id}
                                                    onClick={() => handleCancelOrder(order.order_id)}>
                                                    {cancellingId === order.order_id ? 'Đang hủy...' : '✕ Hủy đơn hàng'}
                                                </button>
                                            </div>
                                        )}
                                    </div>
                                ))}
                            </div>
                        )}
                    </div>
                );

            /* ─── PURCHASED ─── */
            case 'purchased':
                return (
                    <div className="account-panel">
                        <h2 className="account-panel__title">Sách đã mua</h2>
                        <p className="account-panel__subtitle">Lịch sử sách bạn đã mua từ các đơn hoàn thành</p>
                        {purchasedBooks.length === 0 ? (
                            <div className="account-empty">
                                <div className="account-empty__icon">📚</div>
                                <p>Bạn chưa mua sách nào.</p>
                            </div>
                        ) : (
                            <div className="account-purchased-list">
                                {purchasedBooks.map((book, idx) => (
                                    <div key={`${book.book_id}-${idx}`} className="account-order-item">
                                        {book.image && (
                                            <img src={book.image} alt={book.title} className="account-order-item__img" />
                                        )}
                                        <div className="account-order-item__info">
                                            <p className="account-order-item__title">{book.title}</p>
                                            <p className="account-order-item__meta">
                                                Đơn #{book.order_code} · SL: {book.quantity} · {fmtPrice(book.unit_price)}
                                            </p>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        )}
                    </div>
                );

            /* ─── FAVORITES ─── */
            case 'favorites':
                return (
                    <div className="account-panel">
                        <h2 className="account-panel__title">Sách yêu thích</h2>
                        <p className="account-panel__subtitle">Danh sách sách bạn đã lưu yêu thích</p>
                        {favorites.length === 0 ? (
                            <div className="account-empty">
                                <div className="account-empty__icon">❤️</div>
                                <p>Chưa có sách yêu thích. Thêm sách từ trang danh mục!</p>
                                <Link to="/van-hoc" className="btn-account btn-account--primary"
                                    style={{ display: 'inline-block', textDecoration: 'none', marginTop: 16 }}>
                                    Khám phá sách
                                </Link>
                            </div>
                        ) : (
                            <div className="account-fav-grid">
                                {favorites.map(book => (
                                    <div key={book.book_id} className="account-fav-card">
                                        <Link to={`/van-hoc/${book.slug || book.book_id}`}>
                                            <img src={book.image || 'https://placehold.co/200x300/e8e8e3/424842?text=Sách'}
                                                alt={book.title} className="account-fav-card__img" />
                                        </Link>
                                        <div className="account-fav-card__body">
                                            <p className="account-fav-card__title">{book.title}</p>
                                            <p className="account-fav-card__price">{fmtPrice(book.price)}</p>
                                            <button type="button" className="account-fav-card__remove"
                                                onClick={() => handleRemoveFavorite(book.book_id)}>
                                                Xóa khỏi yêu thích
                                            </button>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        )}
                    </div>
                );

            /* ─── STATS ─── */
            case 'stats':
                return (
                    <>
                        <div className="account-stats-grid">
                            <div className="account-stat-card">
                                <div className="account-stat-card__value">{fmtPrice(stats.total_spent)}</div>
                                <div className="account-stat-card__label">Số tiền đã mua</div>
                            </div>
                            <div className="account-stat-card">
                                <div className="account-stat-card__value">{stats.successful_orders}</div>
                                <div className="account-stat-card__label">Đơn hoàn thành</div>
                            </div>
                            <div className="account-stat-card">
                                <div className="account-stat-card__value">{favCount}</div>
                                <div className="account-stat-card__label">Sách yêu thích</div>
                            </div>
                            <div className="account-stat-card">
                                <div className="account-stat-card__value">{purchasedBooks.length}</div>
                                <div className="account-stat-card__label">Sách đã mua</div>
                            </div>
                        </div>
                        <div className="account-panel">
                            <h2 className="account-panel__title">Tổng quan mua hàng</h2>
                            <p className="account-panel__subtitle">
                                Bạn có {stats.total_orders} đơn hàng, trong đó {stats.successful_orders} đơn đã hoàn thành.
                            </p>
                            {purchasedBooks.length === 0 ? (
                                <div className="account-empty">
                                    <div className="account-empty__icon">📊</div>
                                    <p>Chưa có dữ liệu. Hãy đặt hàng để xem thống kê!</p>
                                    <Link to="/van-hoc" className="btn-account btn-account--primary"
                                        style={{ display: 'inline-block', textDecoration: 'none', marginTop: 16 }}>
                                        Mua sách ngay
                                    </Link>
                                </div>
                            ) : (
                                <div className="account-purchased-list">
                                    {purchasedBooks.slice(0, 5).map((book, idx) => (
                                        <div key={`s-${book.book_id}-${idx}`} className="account-order-item">
                                            {book.image && <img src={book.image} alt={book.title} className="account-order-item__img" />}
                                            <div className="account-order-item__info">
                                                <p className="account-order-item__title">{book.title}</p>
                                                <p className="account-order-item__meta">SL: {book.quantity} · {fmtPrice(book.unit_price)}</p>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            )}
                        </div>
                    </>
                );

            default:
                return null;
        }
    };

    return (
        <div className="account-dashboard">
            <SiteHeader />

            <div className="account-dashboard__layout">
                {/* ── SIDEBAR ── */}
                <aside className="account-sidebar">
                    <div className="account-sidebar__profile">
                        <div className="account-sidebar__avatar"
                            style={{ background: 'linear-gradient(135deg, var(--color-primary), #86a789)', color: '#fff', fontFamily: 'var(--font-heading)', fontWeight: 700, fontSize: 26 }}>
                            {initials}
                        </div>
                        <p className="account-sidebar__name">{user.full_name || user.username}</p>
                        <span className="account-sidebar__badge">{ROLE_LABELS[user.role_id] || 'Khách hàng'}</span>
                        {user.email && <p className="account-sidebar__email">{user.email}</p>}
                    </div>

                    <nav className="account-sidebar__nav">
                        {[1, 2, 4].includes(user.role_id) && (
                            <div>
                                <div className="account-sidebar__section-label">Quản trị</div>
                                <Link to="/admin/orders" className="account-sidebar__item">
                                    <span className="account-sidebar__icon">🛠️</span>
                                    Trang quản lý (Shipper/Staff/Admin)
                                </Link>
                            </div>
                        )}
                        {MENU_GROUPS.map(group => (
                            <div key={group.label}>
                                <div className="account-sidebar__section-label">{group.label}</div>
                                {group.items.map(item => (
                                    <button key={item.id} type="button"
                                        className={`account-sidebar__item${activeTab === item.id ? ' active' : ''}`}
                                        onClick={() => { setActiveTab(item.id); setMessage({ type: '', text: '' }); }}>
                                        <span className="account-sidebar__icon">{item.icon}</span>
                                        {item.label}
                                    </button>
                                ))}
                            </div>
                        ))}
                        <button type="button"
                            className="account-sidebar__item account-sidebar__item--logout"
                            onClick={handleLogout}>
                            <span className="account-sidebar__icon">🚪</span>
                            Đăng xuất
                        </button>
                    </nav>
                </aside>

                {/* ── MAIN ── */}
                <main className="account-main">
                    {message.text && (
                        <div className={`account-alert account-alert--${message.type}`}>
                            {message.text}
                        </div>
                    )}
                    {renderContent()}
                </main>
            </div>
        </div>
    );
}
