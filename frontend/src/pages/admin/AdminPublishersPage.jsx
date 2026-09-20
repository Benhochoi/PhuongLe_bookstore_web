import { useState, useEffect } from 'react';
import AdminLayout from '../../layouts/AdminLayout';
import api from '../../services/api';

const EMPTY_FORM = { publisher_name: '', address: '', phone: '', email: '' };

export default function AdminPublishersPage() {
    const [items, setItems] = useState([]);
    const [form, setForm] = useState(EMPTY_FORM);
    const [editingId, setEditingId] = useState(null);
    const [error, setError] = useState('');

    useEffect(() => { loadItems(); }, []);
    const loadItems = () => api.get('/admin/publishers').then(res => setItems(res.data)).catch(() => {});

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        try {
            if (editingId) {
                await api.put(`/admin/publishers/${editingId}`, form);
            } else {
                await api.post('/admin/publishers', form);
            }
            setForm(EMPTY_FORM);
            setEditingId(null);
            loadItems();
        } catch (err) {
            setError(err.response?.data?.message || 'Lỗi lưu nhà xuất bản');
        }
    };

    const handleEdit = (item) => {
        setEditingId(item.publisher_id);
        setForm({
            publisher_name: item.publisher_name || '',
            address: item.address || '',
            phone: item.phone || '',
            email: item.email || ''
        });
        setError('');
    };

    const handleCancelEdit = () => {
        setEditingId(null);
        setForm(EMPTY_FORM);
        setError('');
    };

    const handleDelete = async (id) => {
        if (!window.confirm('Bạn có chắc muốn xóa nhà xuất bản này?')) return;
        try {
            await api.delete(`/admin/publishers/${id}`);
            if (editingId === id) handleCancelEdit();
            loadItems();
        } catch (err) {
            alert(err.response?.data?.message || 'Không thể xóa nhà xuất bản này');
        }
    };

    return (
        <AdminLayout title="Quản lý nhà xuất bản">
            <div style={{ display: 'flex', gap: 20 }}>
                <form onSubmit={handleSubmit} style={{ flex: 1, display: 'flex', flexDirection: 'column', gap: 10, background: 'var(--color-surface)', padding: 16, borderRadius: 8, border: '1px solid var(--color-border)' }}>
                    <h3>{editingId ? 'Sửa thông tin NXB' : 'Thêm NXB mới'}</h3>
                    {error && <div style={{ color: 'red' }}>{error}</div>}
                    
                    <label className="admin-field">
                        <span>Tên NXB *</span>
                        <input className="form-input" required value={form.publisher_name} onChange={e => setForm({...form, publisher_name: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Số điện thoại</span>
                        <input className="form-input" value={form.phone} onChange={e => setForm({...form, phone: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Email</span>
                        <input className="form-input" type="email" value={form.email} onChange={e => setForm({...form, email: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Địa chỉ</span>
                        <textarea className="form-input" rows="3" value={form.address} onChange={e => setForm({...form, address: e.target.value})} />
                    </label>

                    <div style={{ display: 'flex', gap: 10, marginTop: 10 }}>
                        <button type="submit" className="btn-account btn-account--primary" style={{ flex: 1 }}>
                            {editingId ? 'Lưu thay đổi' : 'Thêm NXB'}
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
                                <th>Thông tin liên hệ</th>
                                <th>Số sách</th>
                                <th style={{ textAlign: 'right' }}>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            {items.length === 0 ? (
                                <tr><td colSpan="4" style={{ textAlign: 'center' }}>Chưa có NXB nào</td></tr>
                            ) : (
                                items.map(i => (
                                    <tr key={i.publisher_id}>
                                        <td><strong>{i.publisher_name}</strong></td>
                                        <td>
                                            {i.phone && <div>SĐT: {i.phone}</div>}
                                            {i.email && <div>Email: {i.email}</div>}
                                            {(!i.phone && !i.email) && '—'}
                                        </td>
                                        <td>{i.books_count} cuốn</td>
                                        <td style={{ textAlign: 'right' }}>
                                            <button className="btn-outline" style={{ marginRight: 8, padding: '4px 8px' }} onClick={() => handleEdit(i)}>Sửa</button>
                                            <button className="btn-outline" style={{ borderColor: 'var(--color-error)', color: 'var(--color-error)', padding: '4px 8px' }} onClick={() => handleDelete(i.publisher_id)}>Xóa</button>
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
