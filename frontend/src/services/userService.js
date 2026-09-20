import api from './api';

export async function updateProfile(data) {
    const response = await api.put('/profile', data);
    return response.data;
}

export async function changePassword(data) {
    const response = await api.put('/profile/password', data);
    return response.data;
}

export async function getOrders() {
    const response = await api.get('/orders');
    return response.data;
}

export async function getOrderStats() {
    const response = await api.get('/orders/stats');
    return response.data;
}
