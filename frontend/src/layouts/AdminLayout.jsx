import { Link, useNavigate, useLocation } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import { clearAuthState } from '../utils/authStorage';
import api from '../services/api';
import '../styles/admin.css';

const MENU = [
    { path: '/admin/orders', label: 'Đơn hàng', icon: '📦', roles: [1, 2, 4] },
    { path: '/admin/books', label: 'Sách', icon: '📚', roles: [1, 2] },
    { path: '/admin/stock-imports', label: 'Nhập Kho', icon: '🏭', roles: [1, 2] },
    { path: '/admin/categories', label: 'Danh mục', icon: '📁', roles: [1, 2] },
    { path: '/admin/authors', label: 'Tác giả', icon: '✍️', roles: [1, 2] },
    { path: '/admin/publishers', label: 'Nhà xuất bản', icon: '🏢', roles: [1, 2] },
    { path: '/admin/staff', label: 'Quản lý nhân viên', icon: '👥', roles: [1] },
];

const ROLE_LABELS = { 1: 'Quản trị viên', 2: 'Nhân viên', 4: 'Người vận chuyển' };

export default function AdminLayout({ children, title, subtitle }) {
    const { user, setAccessToken, setUser } = useAuth();
    const navigate = useNavigate();
    const location = useLocation();

    const handleLogout = async () => {
        try { await api.post('/logout'); } catch { /* noop */ }
        setAccessToken(null);
        setUser(null);
        clearAuthState();
        navigate('/login');
    };

    const initials = (user?.full_name || user?.username || '?').charAt(0).toUpperCase();

    return (
        <div className="admin-shell">
            <aside className="admin-sidebar">
                <Link to="/" className="admin-sidebar__brand">PhuongLebookstore</Link>
                <span className="admin-sidebar__eyebrow">Khu vực quản trị</span>

                <nav className="admin-sidebar__nav">
                    {MENU.filter(item => !item.roles || item.roles.includes(user?.role_id)).map(item => (
                        <Link
                            key={item.path}
                            to={item.path}
                            className={`admin-sidebar__item${location.pathname === item.path ? ' active' : ''}`}
                        >
                            <span className="admin-sidebar__icon">{item.icon}</span>
                            {item.label}
                        </Link>
                    ))}
                </nav>

                <div className="admin-sidebar__footer">
                    <Link 
                        to="/dashboard" 
                        className="admin-sidebar__item" 
                        style={{ background: 'var(--color-surface)', color: 'var(--color-text)', border: '1px solid var(--color-border)', justifyContent: 'center', marginBottom: '12px' }}
                    >
                        Trở về
                    </Link>
                    <div className="admin-sidebar__user">
                        <div className="admin-sidebar__avatar">{initials}</div>
                        <div>
                            <p className="admin-sidebar__name">{user?.full_name || user?.username}</p>
                            <span className="admin-sidebar__role">{ROLE_LABELS[user?.role_id] || 'Nhân viên'}</span>
                        </div>
                    </div>
                    <button type="button" className="admin-sidebar__logout" onClick={handleLogout}>
                        Đăng xuất
                    </button>
                </div>
            </aside>

            <div className="admin-content">
                <header className="admin-topbar">
                    <div>
                        <h1 className="admin-topbar__title">{title}</h1>
                        {subtitle && <p className="admin-topbar__subtitle">{subtitle}</p>}
                    </div>
                </header>
                <main className="admin-main">{children}</main>
            </div>
        </div>
    );
}