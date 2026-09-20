import api from '../services/api';

export const getAdminOrders = (params = {}) =>
    api.get('/admin/orders', { params }).then(res => res.data);

export const getAdminOrderDetail = (id) =>
    api.get(`/admin/orders/${id}`).then(res => res.data);

export const updateAdminOrderStatus = (id, order_status) =>
    api.patch(`/admin/orders/${id}/status`, { order_status }).then(res => res.data);

export const getAdminOrderStats = () =>
    api.get('/admin/orders/stats').then(res => res.data);
