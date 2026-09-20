
# 📚 PhuongLebookstore

![Build](https://img.shields.io/badge/build-passing-brightgreen)
![License](https://img.shields.io/badge/license-[MIT]-blue)
![Version](https://img.shields.io/badge/version-1.0.0-informational)
![PHP](https://img.shields.io/badge/backend-PHP-777BB4?logo=php&logoColor=white)
![React](https://img.shields.io/badge/frontend-React-61DAFB?logo=react&logoColor=black)
![MySQL](https://img.shields.io/badge/database-MySQL-4479A1?logo=mysql&logoColor=white)

## Mô tả dự án
Đây là một website thương mại điện tử chuyên bán sách trực tuyến, được xây dựng theo kiến trúc tách biệt frontend/backend (decoupled architecture). Hệ thống hỗ trợ đầy đủ vòng đời mua sắm của một cửa hàng sách: từ duyệt danh mục, tìm kiếm, quản lý giỏ hàng, đặt hàng, thanh toán, cho đến đánh giá sản phẩm và áp dụng mã giảm giá — đi kèm khu vực quản trị (admin) riêng để vận hành hệ thống.

### Tính năng chính

- 🔐 **Xác thực & phân quyền**: Đăng ký/đăng nhập bằng JWT, phân quyền theo 3 vai trò (`admin`, `staff`, `customer`); tài khoản `staff`/`admin` chỉ được tạo bởi quản trị viên nhằm tránh leo thang đặc quyền (privilege escalation).
- 👤 **Quản lý hồ sơ cá nhân**: Xem và cập nhật thông tin cá nhân (họ tên, số điện thoại, giới tính, ngày sinh, địa chỉ) ngay tại trang *My Account*.
- 📖 **Danh mục sách**: Duyệt sách theo danh mục, tác giả, nhà xuất bản; tìm kiếm và xem chi tiết (mô tả, giá, tồn kho, đánh giá). 
- 🛒 **Giỏ hàng & đơn hàng**: Thêm/xóa/cập nhật giỏ hàng, đặt hàng và theo dõi trạng thái đơn. 
- 💳 **Thanh toán**: Quản lý phương thức thanh toán, mã giao dịch, trạng thái thanh toán.
- ⭐ **Đánh giá sản phẩm**: Đánh giá sao & bình luận, xác thực đã mua hàng (verified purchase).
- 🎁 **Mã giảm giá**: Coupon theo phần trăm/số tiền cố định, giới hạn số lượng và số lần sử dụng.
- 🚚 **Vận chuyển**: Theo dõi trạng thái giao hàng và mã vận đơn.
- 🛠️ **Trang quản trị (Admin)**: Quản lý sách, danh mục, tác giả, nhà xuất bản, đơn hàng, người dùng, mã giảm giá.

### Lý do lựa chọn công nghệ
- **React + Vite** được chọn cho frontend vì tốc độ dev-server nhanh, hot reload tức thời và hệ sinh thái component (shadcn/ui, lucide-react) giúp xây dựng UI nhất quán, dễ mở rộng.
- **PHP kiểu lai (hybrid)**: các file endpoint (`backend/api/...`) viết theo phong cách thủ tục (procedural) — đơn giản, dễ đọc, không qua controller/router phức tạp; trong khi các thành phần dùng chung (kết nối database, JWT, middleware xác thực, model, chuẩn hóa response) được gói trong các class nhỏ, gọn (`Database`, `JWT`, `Auth`, `User`, `Response`) để tái sử dụng và tránh lặp code — không dùng các pattern OOP nặng như interface, abstract class hay dependency injection.
- **MySQL** phù hợp với dữ liệu quan hệ chặt chẽ giữa các thực thể (users, books, orders, payments...) và được hỗ trợ sẵn trong môi trường XAMPP quen thuộc.
- **JWT (tự triển khai HS256)** cho phép xác thực stateless giữa frontend và backend mà không cần thư viện ngoài, giữ backend gọn nhẹ.

### Thách thức đã gặp
- Cân bằng giữa việc tách lớp Model/Endpoint theo chuẩn REST và giữ code đủ đơn giản, dễ đọc cho người mới — một số resource (ví dụ hồ sơ người dùng) được gộp GET/PUT vào chung 1 file endpoint để giảm số lượng file mà vẫn tách biệt rõ hành vi theo HTTP method.
- Đảm bảo phân quyền chặt chẽ ngay từ tầng API (không chỉ ẩn/hiện ở giao diện) để tránh người dùng tự đăng ký với vai trò admin/staff.
- Thiết kế lại header/dashboard responsive trên nhiều breakpoint (mobile, tablet, desktop) mà vẫn giữ đầy đủ chức năng tìm kiếm, danh mục, giỏ hàng, tài khoản.

### Định hướng phát triển trong tương lai
- Hoàn thiện các API còn thiếu cho `books`, `categories`, `authors`, `publishers`, `cart`, `orders`, `payments`, `reviews`, `coupons`, `shipments` (hiện các thư mục này mới ở dạng khung sườn).
- Tích hợp cổng thanh toán trực tuyến (VNPay, Momo).
- Gửi thông báo qua email (xác nhận đơn hàng, đổi mật khẩu...).
- Xây dựng trang quản trị (Admin Dashboard) đầy đủ chức năng CRUD cho toàn bộ thực thể.
- Tối ưu SEO cho các trang sách.
- Viết tài liệu API chuẩn hóa (Swagger/Postman collection).
- Triển khai lên hosting/VPS thực tế.

---

## Mục lục

- [Mô tả dự án](#mô-tả-dự-án)
- [Cài đặt & thiết lập](#cài-đặt--thiết-lập)
- [Cách sử dụng](#cách-sử-dụng)
- [Đóng góp & kiểm thử](#đóng-góp--kiểm-thử)
- [Credits](#credits)
- [Giấy phép](#giấy-phép)

---

## Cài đặt & thiết lập

### Yêu cầu hệ thống

- [XAMPP](https://www.apachefriends.org/) (PHP >= 8.0, MySQL/MariaDB, Apache)
- [Node.js](https://nodejs.org/) >= 16.x và npm

### 1. Clone repository

```bash
git clone
cd PhuongLe_Bookstore
```

### 2. Cài đặt backend (PHP + MySQL)

1. Copy thư mục `backend/` vào thư mục `htdocs` của XAMPP, ví dụ:
   ```
   C:\xampp\htdocs\PhuongLe_Bookstore\backend
   ```
2. Khởi động **Apache** và **MySQL** từ XAMPP Control Panel.
3. Mở **phpMyAdmin** (`http://localhost/phpmyadmin`), import file `database/bookshop.sql` (file này tự tạo database `bookshop_db`, không cần tạo database trước).
4. Kiểm tra lại thông tin kết nối trong `backend/config/database.php` (mặc định XAMPP: host `localhost`, port `3306`, user `root`, password rỗng):
   ```php
   private string $host = "localhost";
   private int $port = 3306;
   private string $dbName = "bookshop_db";
   private string $username = "root";
   private string $password = "";
   ```
5. Tạo mật khẩu bcrypt cho tài khoản mặc định (nếu cần) bằng PHP CLI:
   ```bash
   php -r "echo password_hash('mat_khau_cua_ban', PASSWORD_BCRYPT);"
   ```

### 3. Cấu hình biến môi trường

— hiện dự án chưa dùng file `.env`; các thông số kết nối được khai báo trực tiếp trong `backend/config/database.php` và `backend/config/jwt.php`.

### 4. Cài đặt & chạy frontend (React + Vite)

```bash
cd frontend
npm install
npm run dev
```

Frontend chạy tại: `http://localhost:3000`
Backend API chạy tại: `http://localhost/PhuongLe_Bookstore/backend`

---

## Cách sử dụng

### Các lệnh chính

| Lệnh | Vị trí | Mô tả |
|---|---|---|
| `npm run dev` | `frontend/` | Chạy dev server (hot reload) |
| `npm run build` | `frontend/` | Build bản production vào `frontend/dist` |
| `npm run preview` | `frontend/` | Xem trước bản build production |

### Ví dụ luồng sử dụng

1. Truy cập `http://localhost:3000/register` để tạo tài khoản khách hàng (`customer`).
2. Đăng nhập tại `http://localhost:3000/login`.
3. Vào trang **My Account** để xem/cập nhật thông tin cá nhân (họ tên, số điện thoại, giới tính, ngày sinh, địa chỉ).

**Ví dụ gọi API cập nhật hồ sơ cá nhân:**

```bash
curl -X PUT http://localhost/PhuongLe_Bookstore/backend/api/auth/profile.php \
  -H "Authorization: Bearer <token>" \
  -H "Content-Type: application/json" \
  -d '{
        "full_name": "Nguyễn Văn A",
        "phone": "0901234567",
        "gender": "male",
        "date_of_birth": "1999-01-01",
        "address": "123 Đường ABC, Quận 1, TP.HCM"
      }'
```

**Output mẫu:**

```json
{
  "success": true,
  "message": "Cập nhật thông tin thành công",
  "data": {
    "user_id": 1,
    "username": "ben1910",
    "full_name": "Nguyễn Văn A",
    "email": "a@gmail.com",
    "phone": "0901234567",
    "role": "customer"
  }
}
```
## Đóng góp & kiểm thử

### Hướng dẫn đóng góp

1. Fork repository.
2. Tạo nhánh mới cho tính năng/sửa lỗi: `git checkout -b feature/ten-tinh-nang`.
3. Commit theo mô tả rõ ràng, ngắn gọn: `git commit -m "feat: mô tả thay đổi"`.
4. Push lên nhánh của bạn: `git push origin feature/ten-tinh-nang`.
5. Tạo Pull Request kèm mô tả thay đổi và ảnh chụp màn hình (nếu có UI thay đổi).

### Quy ước code

- Backend: PHP thuần theo phong cách thủ tục (procedural), không dùng OOP/class phức tạp; mỗi resource gộp các HTTP method liên quan (GET/PUT/...) vào chung 1 file endpoint khi hợp lý.
- Frontend: React function component + hooks; toàn bộ lời gọi API tập trung tại `frontend/src/services/api.js`.

### Chạy test

— dự án hiện chưa cấu hình test tự động (unit test/integration test).

---

## Credits

### Thành viên / Nhóm phát triển

- [TODO] — Tên thành viên – [GitHub link](https://github.com/[TODO])

### Thư viện & tài liệu tham khảo

- [React](https://react.dev/)
- [Vite](https://vitejs.dev/)
- [React Router](https://reactrouter.com/)
- [Axios](https://axios-http.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [shadcn/ui](https://ui.shadcn.com/)
- [lucide-react](https://lucide.dev/)
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [XAMPP](https://www.apachefriends.org/)

---

## Giấy phép

Dự án này được phát hành theo giấy phép **MIT**.
```
