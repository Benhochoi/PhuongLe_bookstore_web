// import axios from 'axios';

// const axiosClient = axios.create({
//     baseURL: 'http://127.0.0.1:8000/api', // Đường dẫn tới Laravel API của bạn
//     headers: {
//         'Content-Type': 'application/json',
//         'Accept': 'application/json',
//     },
//     withCredentials: true, // Nếu dùng Sanctum cookie-based authentication
// });

export default axiosClient;

import axios from "axios";

const api = axios.create({
    baseURL: "http://127.0.0.1:8000/api",
});

export default api;