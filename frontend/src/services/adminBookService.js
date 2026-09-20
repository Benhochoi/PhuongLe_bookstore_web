import api from '../services/api';

export const getAdminBooks = (params = {}) =>
    api.get('/admin/books', { params }).then(res => res.data);

export const getAdminBookDetail = (id) =>
    api.get(`/admin/books/${id}`).then(res => res.data);

export const createAdminBook = (payload) =>
    api.post('/admin/books', payload).then(res => res.data);

export const updateAdminBook = (id, payload) =>
    api.put(`/admin/books/${id}`, payload).then(res => res.data);

export const deleteAdminBook = (id) =>
    api.delete(`/admin/books/${id}`).then(res => res.data);

// Dữ liệu phụ trợ cho các dropdown trong form (đã có sẵn API công khai)
export const getCategoriesList = () => api.get('/categories').then(res => res.data);
export const getPublishersList = () => api.get('/publishers').then(res => res.data);
export const getAuthorsList = () => api.get('/authors').then(res => res.data);
