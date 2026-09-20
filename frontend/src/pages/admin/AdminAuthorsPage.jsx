import { useState, useEffect } from 'react';
import AdminLayout from '../../layouts/AdminLayout';
import api from '../../services/api';

const EMPTY_FORM = { author_name: '', biography: '', nationality: '' };

export default function AdminAuthorsPage() {
    const [items, setItems] = useState([]);
    const [form, setForm] = useState(EMPTY_FORM);
    const [editingId, setEditingId] = useState(null);
    const [error, setError] = useState('');

    useEffect(() => { loadItems(); }, []);
    const loadItems = () => api.get('/admin/authors').then(res => setItems(res.data)).catch(() => {});

    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');
        try {
            if (editingId) {
                await api.put(`/admin/authors/${editingId}`, form);
            } else {
                await api.post('/admin/authors', form);
            }
            setForm(EMPTY_FORM);
            setEditingId(null);
            loadItems();
        } catch (err) {
            setError(err.response?.data?.message || 'Lỗi lưu tác giả');
        }
    };

    const handleEdit = (item) => {
        setEditingId(item.author_id);
        setForm({
            author_name: item.author_name || '',
            biography: item.biography || '',
            nationality: item.nationality || ''
        });
        setError('');
    };

    const handleCancelEdit = () => {
        setEditingId(null);
        setForm(EMPTY_FORM);
        setError('');
    };

    const handleDelete = async (id) => {
        if (!window.confirm('Bạn có chắc muốn xóa tác giả này?')) return;
        try {
            await api.delete(`/admin/authors/${id}`);
            if (editingId === id) handleCancelEdit();
            loadItems();
        } catch (err) {
            alert(err.response?.data?.message || 'Không thể xóa tác giả này');
        }
    };

    return (
        <AdminLayout title="Quản lý tác giả">
            <div style={{ display: 'flex', gap: 20 }}>
                <form onSubmit={handleSubmit} style={{ flex: 1, display: 'flex', flexDirection: 'column', gap: 10, background: 'var(--color-surface)', padding: 16, borderRadius: 8, border: '1px solid var(--color-border)' }}>
                    <h3>{editingId ? 'Sửa thông tin tác giả' : 'Thêm tác giả mới'}</h3>
                    {error && <div style={{ color: 'red' }}>{error}</div>}
                    
                    <label className="admin-field">
                        <span>Tên tác giả *</span>
                        <input className="form-input" required value={form.author_name} onChange={e => setForm({...form, author_name: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Quốc tịch</span>
                        <input className="form-input" value={form.nationality} onChange={e => setForm({...form, nationality: e.target.value})} />
                    </label>
                    <label className="admin-field">
                        <span>Tiểu sử</span>
                        <textarea className="form-input" rows="4" value={form.biography} onChange={e => setForm({...form, biography: e.target.value})} />
                    </label>

                    <div style={{ display: 'flex', gap: 10, marginTop: 10 }}>
                        <button type="submit" className="btn-account btn-account--primary" style={{ flex: 1 }}>
                            {editingId ? 'Lưu thay đổi' : 'Thêm tác giả'}
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
                                <th>Quốc tịch</th>
                                <th>Số sách</th>
                                <th style={{ textAlign: 'right' }}>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            {items.length === 0 ? (
                                <tr><td colSpan="4" style={{ textAlign: 'center' }}>Chưa có tác giả nào</td></tr>
                            ) : (
                                items.map(i => (
                                    <tr key={i.author_id}>
                                        <td><strong>{i.author_name}</strong></td>
                                        <td>{i.nationality || '—'}</td>
                                        <td>{i.books_count} cuốn</td>
                                        <td style={{ textAlign: 'right' }}>
                                            <button className="btn-outline" style={{ marginRight: 8, padding: '4px 8px' }} onClick={() => handleEdit(i)}>Sửa</button>
                                            <button className="btn-outline" style={{ borderColor: 'var(--color-error)', color: 'var(--color-error)', padding: '4px 8px' }} onClick={() => handleDelete(i.author_id)}>Xóa</button>
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
