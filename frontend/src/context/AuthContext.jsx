import { createContext, useContext, useEffect, useState } from 'react';
import api from '../services/api';
import { clearAuthState, getAccessToken, getUser, setAccessToken as setAccessTokenStore, setUser as setUserStore } from '../utils/authStorage';

// Context dùng để chia sẻ trạng thái đăng nhập cho toàn bộ ứng dụng React.
const AuthContext = createContext();

export function AuthProvider({ children }) {
    // Khởi tạo state từ memory. Nếu ứng dụng vừa reload, access token sẽ mất, nhưng sẽ được thử khôi phục lại bằng refresh token.
    const [accessToken, setAccessTokenState] = useState(getAccessToken());
    const [user, setUserState] = useState(getUser());
    const [loading, setLoading] = useState(true);

    // Hàm wrapper để cập nhật access token ở cả React state lẫn memory helper.
    const setAccessToken = (token) => {
        setAccessTokenState(token);
        setAccessTokenStore(token);
    };

    // Hàm wrapper để cập nhật thông tin người dùng ở cả React state lẫn memory helper.
    const setUser = (nextUser) => {
        setUserState(nextUser);
        setUserStore(nextUser);
    };

    // Gọi endpoint /refresh để lấy access token mới từ refresh token được gửi kèm cookie.
    // Đây là bước quan trọng để khôi phục session sau khi F5 mà không lưu access token vào localStorage.
    const refreshAccessToken = async () => {
        try {
            const response = await api.post('/refresh');
            const nextToken = response.data.access_token;

            setAccessToken(nextToken);

            // Nếu refresh thành công, lấy thêm thông tin user để render UI ngay lập tức.
            try {
                const profileResponse = await api.get('/profile');
                setUser(profileResponse.data);
            } catch {
                setUser(null);
            }

            return nextToken;
        } catch (error) {
            // Nếu refresh thất bại (cookie hết hạn, không hợp lệ...), xóa state auth khỏi memory.
            setAccessToken(null);
            setUser(null);
            clearAuthState();
            return null;
        }
    };

    // Khi app khởi động, cố gắng khôi phục auth bằng refresh token nếu chưa có access token trong memory.
    useEffect(() => {
        const initAuth = async () => {
            if (getAccessToken()) {
                setLoading(false);
                return;
            }

            await refreshAccessToken();
            setLoading(false);
        };

        initAuth();
    }, []);

    return (
        <AuthContext.Provider
            value={{
                accessToken,
                setAccessToken,
                user,
                setUser,
                refreshAccessToken,
                loading,
            }}
        >
            {children}
        </AuthContext.Provider>
    );
}

// Hook tiện lợi để các component lấy state auth mà không cần truyền props.
export function useAuth() {
    return useContext(AuthContext);
}