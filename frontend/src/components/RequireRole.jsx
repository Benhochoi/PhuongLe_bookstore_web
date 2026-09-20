import { Navigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';

/**
 * Bọc quanh 1 route để chỉ cho phép user có role_id nằm trong danh sách `roles` truy cập.
 * Ví dụ: <RequireRole roles={[1, 2]}><AdminOrdersPage /></RequireRole>
 */
export default function RequireRole({ roles, children }) {
    const { user, accessToken, loading } = useAuth();

    if (loading) {
        return (
            <div style={{ minHeight: '100vh', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                Đang tải...
            </div>
        );
    }

    if (!accessToken || !user) {
        return <Navigate to="/login" replace />;
    }

    if (!roles.includes(user.role_id)) {
        return <Navigate to="/" replace />;
    }

    return children;
}
