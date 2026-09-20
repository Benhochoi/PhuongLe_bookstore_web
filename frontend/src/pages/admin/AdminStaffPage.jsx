import { useState, useEffect } from 'react';
import AdminLayout from '../../layouts/AdminLayout';
import api from '../../services/api';

const EMPTY_FORM = { username: '', email: '', password: '', full_name: '', phone: '', role_id: 2 };

export default function AdminStaffPage() {
    const [staff, setStaff] = useState([]);
    const [roles, setRoles] = useState([]);
    const [form, setForm] = useState(EMPTY_FORM);
    const [editingId, setEditingId] = useState(null);
    const [error, setError] = useState('');

    useEffect(() => {
        api.get('/admin/roles').then(res => setRoles(res.data)).catch(() => {});
        loadStaff();
    }, []);

    const loadStaff = () => api.get('/admin/staff').then(res => setStaff(res.data)).catch(() => {});

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        try {
            if (editingId) {
                // If password is not provided during edit, don't send it to prevent hashing an empty string or breaking validation
                const updateData = { ...form };
                if (!updateData.password) delete updateData.password;
                
                await api.put(`/admin/staff/${editingId}`, updateData);
            } else {
                await api.post('/admin/staff', form);
            }
            setForm(EMPTY_FORM);
            setEditingId(null);
            loadStaff();
        } catch (err) {
            setError(err.response?.data?.message || 'Lỗi lưu nhân sự');
        }
    };

    const handleEdit = (user) => {
        setEditingId(user.user_id);
        setForm({
            username: user.username,
            email: user.email,
            password: '', // Blank by default, only fill if changing
            full_name: user.full_name,
            phone: user.phone || '',
            role_id: user.role_id
        });
        setError('');
    };

    const handleCancelEdit = () => {
        setEditingId(null);
        setForm(EMPTY_FORM);
        setError('');
    };

    const handleDelete = async (id) => {
        if (!window.confirm('Bạn có chắc muốn xóa nhân sự này?')) return;
        try {
            await api.delete(`/admin/staff/${id}`);
            if (editingId === id) handleCancelEdit();
            loadStaff();
        } catch (err) {
            alert(err.response?.data?.message || 'Không thể xóa');
        }
    };

    return (
        <AdminLayout title="Quản lý nhân sự" subtitle="Thêm và quản lý tài khoản Staff / Shipper">
            <div style={{ display: 'flex', gap: 20 }}>
                <form onSubmit={handleSubmit} style={{ flex: 1, display: 'flex', flexDirection: 'column', gap: 10, background: 'var(--color-surface)', padding: 16, borderRadius: 8, border: '1px solid var(--color-border)' }}>
                    <h3>{editingId ? 'Sửa thông tin nhân sự' : 'Thêm tài khoản'}</h3>
                    {error && <div style={{ color: 'red' }}>{error}</div>}
                    
                    <label className="admin-field">
                        <span>Họ tên *</span>
                        <input className="form-input" required value={form.full_name} onChange={e => setForm({...form, full_name: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Tên đăng nhập (Username) *</span>
                        <input className="form-input" required disabled={!!editingId} value={form.username} onChange={e => setForm({...form, username: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Email *</span>
                        <input className="form-input" type="email" required disabled={!!editingId} value={form.email} onChange={e => setForm({...form, email: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Mật khẩu {editingId && '(bỏ trống nếu không đổi)'} {!editingId && '*'}</span>
                        <input className="form-input" type="password" required={!editingId} value={form.password} onChange={e => setForm({...form, password: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Số điện thoại</span>
                        <input className="form-input" value={form.phone} onChange={e => setForm({...form, phone: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Phân quyền (Role) *</span>
                        <select className="form-input" value={form.role_id} onChange={e => setForm({...form, role_id: Number(e.target.value)})}>
                            {roles.filter(r => r.role_id !== 3).map(r => (
                                <option key={r.role_id} value={r.role_id}>{r.role_name} - {r.description}</option>
                            ))}
                        </select>
                    </label>

                    <div style={{ display: 'flex', gap: 10, marginTop: 10 }}>
                        <button type="submit" className="btn-account btn-account--primary" style={{ flex: 1 }}>
                            {editingId ? 'Lưu thay đổi' : 'Thêm tài khoản'}
                        </button>
                        {editingId && (
                            <button type="button" className="btn-outline" onClick={handleCancelEdit}>
                                Hủy
                            </button>
                        )}
                    </div>
                </form>

                <div style={{ flex: 2 }}>
                    <table className="admin-table">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Username / Email</th>
                                <th>Role</th>
                                <th>SĐT</th>
                                <th style={{ textAlign: 'right' }}>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            {staff.length === 0 ? (
                                <tr><td colSpan="5" style={{ textAlign: 'center' }}>Chưa có nhân sự nào</td></tr>
                            ) : (
                                staff.map(u => (
                                    <tr key={u.user_id}>
                                        <td><strong>{u.full_name}</strong></td>
                                        <td>{u.username}<br/><small>{u.email}</small></td>
                                        <td>{u.role?.role_name}</td>
                                        <td>{u.phone || '—'}</td>
                                        <td style={{ textAlign: 'right' }}>
                                            <button className="btn-outline" style={{ marginRight: 8, padding: '4px 8px' }} onClick={() => handleEdit(u)}>Sửa</button>
                                            <button className="btn-outline" style={{ borderColor: 'var(--color-error)', color: 'var(--color-error)', padding: '4px 8px' }} onClick={() => handleDelete(u.user_id)}>Xóa</button>
                                        </td>
                                    </tr>
                                ))
                            )}
                        </tbody>
                    </table>
                </div>
            </div>
        </AdminLayout>
    );
}
