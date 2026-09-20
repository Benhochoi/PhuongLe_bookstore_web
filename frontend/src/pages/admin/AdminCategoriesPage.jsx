import { useState, useEffect } from 'react';
import AdminLayout from '../../layouts/AdminLayout';
import api from '../../services/api';

const EMPTY_FORM = { category_name: '', description: '' };

export default function AdminCategoriesPage() {
    const [items, setItems] = useState([]);
    const [form, setForm] = useState(EMPTY_FORM);
    const [editingId, setEditingId] = useState(null);
    const [error, setError] = useState('');

    useEffect(() => { loadItems(); }, []);
    const loadItems = () => api.get('/admin/categories').then(res => setItems(res.data)).catch(() => {});

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        try {
            if (editingId) {
                await api.put(`/admin/categories/${editingId}`, form);
            } else {
                await api.post('/admin/categories', form);
            }
            setForm(EMPTY_FORM);
            setEditingId(null);
            loadItems();
        } catch (err) {
            setError(err.response?.data?.message || 'Lỗi lưu danh mục');
        }
    };

    const handleEdit = (item) => {
        setEditingId(item.category_id);
        setForm({
            category_name: item.category_name || '',
            description: item.description || ''
        });
        setError('');
    };

    const handleCancelEdit = () => {
        setEditingId(null);
        setForm(EMPTY_FORM);
        setError('');
    };

    const handleDelete = async (id) => {
        if (!window.confirm('Bạn có chắc muốn xóa danh mục này?')) return;
        try {
            await api.delete(`/admin/categories/${id}`);
            if (editingId === id) handleCancelEdit();
            loadItems();
        } catch (err) {
            alert(err.response?.data?.message || 'Không thể xóa danh mục này');
        }
    };

    return (
        <AdminLayout title="Quản lý danh mục">
            <div style={{ display: 'flex', gap: 20 }}>
                <form onSubmit={handleSubmit} style={{ flex: 1, display: 'flex', flexDirection: 'column', gap: 10, background: 'var(--color-surface)', padding: 16, borderRadius: 8, border: '1px solid var(--color-border)' }}>
                    <h3>{editingId ? 'Sửa thông tin danh mục' : 'Thêm danh mục mới'}</h3>
                    {error && <div style={{ color: 'red' }}>{error}</div>}
                    
                    <label className="admin-field">
                        <span>Tên danh mục *</span>
                        <input className="form-input" required value={form.category_name} onChange={e => setForm({...form, category_name: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Mô tả</span>
                        <textarea className="form-input" rows="4" value={form.description} onChange={e => setForm({...form, description: e.target.value})} />
                    </label>

                    <div style={{ display: 'flex', gap: 10, marginTop: 10 }}>
                        <button type="submit" className="btn-account btn-account--primary" style={{ flex: 1 }}>
                            {editingId ? 'Lưu thay đổi' : 'Thêm danh mục'}
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
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th>Số sách</th>
                                <th style={{ textAlign: 'right' }}>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            {items.length === 0 ? (
                                <tr><td colSpan="4" style={{ textAlign: 'center' }}>Chưa có danh mục nào</td></tr>
                            ) : (
                                items.map(i => (
                                    <tr key={i.category_id}>
                                        <td><strong>{i.category_name}</strong></td>
                                        <td>{i.description || '—'}</td>
                                        <td>{i.books_count} cuốn</td>
                                        <td style={{ textAlign: 'right' }}>
                                            <button className="btn-outline" style={{ marginRight: 8, padding: '4px 8px' }} onClick={() => handleEdit(i)}>Sửa</button>
                                            <button className="btn-outline" style={{ borderColor: 'var(--color-error)', color: 'var(--color-error)', padding: '4px 8px' }} onClick={() => handleDelete(i.category_id)}>Xóa</button>
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
