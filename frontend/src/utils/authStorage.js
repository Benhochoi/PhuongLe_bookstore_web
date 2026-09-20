// Chúng ta giữ access token chỉ trong bộ nhớ JavaScript (RAM), không lưu vào localStorage.
// Điều này giúp tránh lộ token cho các script khác và giữ trạng thái đăng nhập tạm thời.
let accessTokenInMemory = null;
let userInMemory = null;

// Trả về access token hiện đang được giữ trong memory.
export function getAccessToken() {
    return accessTokenInMemory;
}

// Cập nhật access token vào memory sau khi đăng nhập hoặc refresh thành công.
export function setAccessToken(token) {
    accessTokenInMemory = token ?? null;
}

// Trả về thông tin người dùng hiện đang đăng nhập.
export function getUser() {
    return userInMemory;
}

// Cập nhật thông tin người dùng vào memory.
export function setUser(user) {
    userInMemory = user ?? null;
}

// Xóa toàn bộ trạng thái auth khỏi memory khi đăng xuất hoặc refresh thất bại.
export function clearAuthState() {
    accessTokenInMemory = null;
    userInMemory = null;
}
