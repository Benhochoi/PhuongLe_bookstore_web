import { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { login } from '../services/authService';
import '../styles/style.css';
import { useAuth } from '../context/AuthContext';

export default function LoginPage() {
    const navigate = useNavigate();
    // State lưu dữ liệu nhập trên form đăng nhập.
    const [formData, setFormData] = useState({ email: '', password: '' });
    // State thông báo lỗi/thành công cho người dùng.
    const [error, setError] = useState('');
    const [success, setSuccess] = useState('');
    // State bật/tắt loading khi đang gọi API đăng nhập.
    const [loading, setLoading] = useState(false);

    // Lấy các hàm cập nhật auth từ context để lưu token và user vào memory.
    const { setAccessToken, setUser } = useAuth();

    // Cập nhật dữ liệu form mỗi khi người dùng nhập vào input.
    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    // Xử lý submit form đăng nhập.
    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        setSuccess('');
        setLoading(true);

        try {
            const payload = {
                email: formData.email,
                password: formData.password,
            };

            // Gọi API backend để xác thực thông tin đăng nhập.
            const response = await login(payload);

            // Lưu access token vào memory để các request sau dùng được.
            setAccessToken(response.data.access_token);
            // Lưu thông tin user để hiển thị ở header/dashboard.
            setUser(response.data.user);

            setSuccess(response.data.message || 'Đăng nhập thành công');
            // Chuyển về trang chủ sau khi đăng nhập thành công.
            navigate('/');
        } catch (err) {
            setError(err.response?.data?.message || 'Đăng nhập thất bại');
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="auth-page">
            <div className="auth-card">
                <h1 className="auth-title">Đăng nhập</h1>
                <p className="auth-subtitle">Chào mừng quay trở lại</p>

                <form className="auth-form" onSubmit={handleSubmit} noValidate>
                    <div className="form-group">
                        <label className="form-label" htmlFor="login-email">
                            Email hoặc tên đăng nhập
                        </label>
                        <input
                            id="login-email"
                            type="text"
                            name="email"
                            value={formData.email}
                            onChange={handleChange}
                            placeholder="Nhập email hoặc tên đăng nhập..."
                            className="form-input"
                            autoComplete="username"
                            required
                        />
                    </div>

                    <div className="form-group">
                        <label className="form-label" htmlFor="login-password">
                            Mật khẩu
                        </label>
                        <input
                            id="login-password"
                            type="password"
                            name="password"
                            value={formData.password}
                            onChange={handleChange}
                            placeholder="Nhập mật khẩu..."
                            className="form-input"
                            autoComplete="current-password"
                            required
                        />
                    </div>

                    {error && <p className="alert alert-error">{error}</p>}
                    {success && <p className="alert alert-success">{success}</p>}

                    <button type="submit" disabled={loading} className="btn btn-primary">
                        {loading ? 'Đang xử lý...' : 'Đăng nhập'}
                    </button>
                </form>

                <p className="auth-footer">
                    Chưa có tài khoản?
                    <Link to="/register" className="auth-link">
                        Đăng ký
                    </Link>
                </p>

                <p className="auth-footer">
                    Quên mật khẩu?
                    <Link to="/forgot-password" className="auth-link">
                        Khôi phục mật khẩu
                    </Link>
                </p>
            </div>
        </div>
    );
}
