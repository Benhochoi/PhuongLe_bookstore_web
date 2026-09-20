import axios from "axios";
import { getAccessToken } from '../utils/authStorage';

// Tạo instance axios dùng chung cho toàn bộ frontend.
// withCredentials: true cho phép trình duyệt gửi và nhận cookie (bao gồm refresh token).
const api = axios.create({
    // Production: VITE_API_BASE_URL=https://xxx.railway.app/api
    // Local dev:  proxy qua Vite → /api
    baseURL: import.meta.env.VITE_API_BASE_URL
        ? import.meta.env.VITE_API_BASE_URL + '/api'
        : '/api',
    headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
    },
    withCredentials: true,
});

// Interceptor chạy trước mỗi request.
// Nếu trong memory có access token thì tự động gắn vào header Authorization.
api.interceptors.request.use((config) => {
    const token = getAccessToken();
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
});

export default api;