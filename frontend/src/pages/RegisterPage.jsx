import { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { register } from '../services/authService';
import '../styles/style.css';

export default function RegisterPage() {
    const navigate = useNavigate();
    const [formData, setFormData] = useState({
        username: '',
        full_name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });
    const [error, setError] = useState('');
    const [success, setSuccess] = useState('');
    const [loading, setLoading] = useState(false);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        setSuccess('');

        if (formData.password !== formData.password_confirmation) {
            setError('Mật khẩu xác nhận không khớp');
            return;
        }

        setLoading(true);

        try {
            const payload = {
                username: formData.username,
                full_name: formData.full_name,
                email: formData.email,
                password: formData.password,
            };

            const response = await register(payload);
            setSuccess(response.data.message || 'Đăng ký thành công');
            setTimeout(() => navigate('/login'), 1000);
        } catch (err) {
            const data = err.response?.data;
            const firstError = data?.errors
                ? Object.values(data.errors).flat()[0]
                : data?.message;
            setError(firstError || 'Đăng ký thất bại');
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="auth-page">
            <div className="auth-card">
                <h1 className="auth-title">Đăng ký</h1>
                <p className="auth-subtitle">Tạo tài khoản mới</p>

                <form className="auth-form" onSubmit={handleSubmit} noValidate>
                    <div className="form-group">
                        <label className="form-label" htmlFor="register-fullname">
                            Họ và tên
                        </label>
                        <input
                            id="register-fullname"
                            type="text"
                            name="full_name"
                            value={formData.full_name}
                            onChange={handleChange}
                            placeholder="Nhập họ tên..."
                            className="form-input"
                            autoComplete="name"
                            required
                        />
                    </div>

                    <div className="form-group">
                        <label className="form-label" htmlFor="register-username">
                            Tên đăng nhập
                        </label>
                        <input
                            id="register-username"
                            type="text"
                            name="username"
                            value={formData.username}
                            onChange={handleChange}
                            placeholder="Nhập tên đăng nhập..."
                            className="form-input"
                            autoComplete="username"
                            required
                        />
                    </div>

                    <div className="form-group">
                        <label className="form-label" htmlFor="register-email">
                            Email
                        </label>
                        <input
                            id="register-email"
                            type="email"
                            name="email"
                            value={formData.email}
                            onChange={handleChange}
                            placeholder="Nhập email..."
                            className="form-input"
                            autoComplete="email"
                            required
                        />
                    </div>

                    <div className="form-group">
                        <label className="form-label" htmlFor="register-password">
                            Mật khẩu
                        </label>
                        <input
                            id="register-password"
                            type="password"
                            name="password"
                            value={formData.password}
                            onChange={handleChange}
                            placeholder="Nhập mật khẩu..."
                            className="form-input"
                            autoComplete="new-password"
                            required
                        />
                    </div>

                    <div className="form-group">
                        <label className="form-label" htmlFor="register-password-confirm">
                            Xác nhận mật khẩu
                        </label>
                        <input
                            id="register-password-confirm"
                            type="password"
                            name="password_confirmation"
                            value={formData.password_confirmation}
                            onChange={handleChange}
                            placeholder="Xác nhận mật khẩu..."
                            className="form-input"
                            autoComplete="new-password"
                            required
                        />
                    </div>

                    {error && <p className="alert alert-error">{error}</p>}
                    {success && <p className="alert alert-success">{success}</p>}

                    <button type="submit" disabled={loading} className="btn btn-primary">
                        {loading ? 'Đang xử lý...' : 'Đăng ký'}
                    </button>
                </form>

                <p className="auth-footer">
                    Đã có tài khoản?
                    <Link to="/login" className="auth-link">
                        Đăng nhập
                    </Link>
                </p>
            </div>
        </div>
    );
}
