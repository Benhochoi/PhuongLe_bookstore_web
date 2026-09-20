import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom';
import IndexPage from "./pages/index";
import LoginPage from './pages/LoginPage';
import RegisterPage from './pages/RegisterPage';
import DashboardPage from './pages/DashboardPage';
import { VanhocListPage, VanhocDetailPage, ThieuNhiListPage } from './pages/VanhocPage';
import CartPage from './pages/CartPage';
import CheckoutPage from './pages/CheckoutPage';
import AdminOrdersPage from './pages/admin/AdminOrdersPage';
import AdminBooksPage from './pages/admin/AdminBooksPage';
import AdminStaffPage from './pages/admin/AdminStaffPage';
import AdminCategoriesPage from './pages/admin/AdminCategoriesPage';
import AdminAuthorsPage from './pages/admin/AdminAuthorsPage';
import AdminPublishersPage from './pages/admin/AdminPublishersPage';
import AdminStockImportPage from './pages/admin/AdminStockImportPage';
import RequireRole from './components/RequireRole';
// Trang thông tin
import GioiThieuPage from './pages/GioiThieuPage';
import ChinhSachVanChuyenPage from './pages/ChinhSachVanChuyenPage';
import ChinhSachBaoMatPage from './pages/ChinhSachBaoMatPage';
import LienHePage from './pages/LienHePage';
import FAQPage from './pages/FAQPage';
import DoiTraPage from './pages/DoiTraPage';
import SachMoiPage from './pages/SachMoiPage';
import TacGiaPage from './pages/TacGiaPage';

function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<IndexPage />} />
                <Route path="/login" element={<LoginPage />} />
                <Route path="/register" element={<RegisterPage />} />
                <Route path="/dashboard" element={<DashboardPage />} />

                {/* Trang Văn Học */}
                <Route path="/van-hoc" element={<VanhocListPage />} />
                <Route path="/van-hoc/:slug" element={<VanhocDetailPage />} />

                {/* Trang Thiếu Nhi */}
                <Route path="/thieu-nhi" element={<ThieuNhiListPage />} />
                <Route path="/thieu-nhi/:slug" element={<VanhocDetailPage />} />

                {/* Giỏ hàng & Thanh toán */}
                <Route path="/cart" element={<CartPage />} />
                <Route path="/checkout" element={<CheckoutPage />} />

                {/* Khu vực quản trị — chỉ role_id 1 (admin) và 2 (nhân viên) */}
                <Route
                    path="/admin/orders"
                    element={
                        <RequireRole roles={[1, 2, 4]}>
                            <AdminOrdersPage />
                        </RequireRole>
                    }
                />
                <Route
                    path="/admin/books"
                    element={
                        <RequireRole roles={[1, 2]}>
                            <AdminBooksPage />
                        </RequireRole>
                    }
                />
                <Route path="/admin/categories" element={<RequireRole roles={[1, 2]}><AdminCategoriesPage /></RequireRole>} />
                <Route path="/admin/authors" element={<RequireRole roles={[1, 2]}><AdminAuthorsPage /></RequireRole>} />
                <Route path="/admin/publishers" element={<RequireRole roles={[1, 2]}><AdminPublishersPage /></RequireRole>} />
                <Route path="/admin/staff" element={<RequireRole roles={[1]}><AdminStaffPage /></RequireRole>} />
                <Route path="/admin/stock-imports" element={<RequireRole roles={[1, 2]}><AdminStockImportPage /></RequireRole>} />

                {/* Redirect route cũ sang route mới */}
                <Route path="/books/:slug" element={<VanhocDetailPage />} />
                <Route path="/products" element={<VanhocListPage />} />

                {/* Trang thông tin */}
                <Route path="/gioi-thieu" element={<GioiThieuPage />} />
                <Route path="/chinh-sach-van-chuyen" element={<ChinhSachVanChuyenPage />} />
                <Route path="/chinh-sach-bao-mat" element={<ChinhSachBaoMatPage />} />
                <Route path="/lien-he" element={<LienHePage />} />
                <Route path="/cau-hoi-thuong-gap" element={<FAQPage />} />
                <Route path="/doi-tra" element={<DoiTraPage />} />
                <Route path="/sach-moi" element={<SachMoiPage />} />
                <Route path="/tac-gia" element={<TacGiaPage />} />

                <Route path="*" element={<Navigate to="/" replace />} />
            </Routes>
        </BrowserRouter>
    );
}

export default App;