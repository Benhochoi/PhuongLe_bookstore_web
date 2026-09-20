import SiteLayout from '../layouts/SiteLayout';

export default function ChinhSachBaoMatPage() {
    const sections = [
        {
            title: '1. Thông tin chúng tôi thu thập',
            content: (
                <ul style={ulStyle}>
                    <li>Họ tên, địa chỉ email, số điện thoại (khi đăng ký tài khoản)</li>
                    <li>Địa chỉ giao hàng (khi đặt hàng)</li>
                    <li>Lịch sử mua hàng và hành vi duyệt web trên nền tảng</li>
                    <li>Thông tin thiết bị và trình duyệt (cookie, địa chỉ IP)</li>
                </ul>
            ),
        },
        {
            title: '2. Mục đích sử dụng thông tin',
            content: (
                <ul style={ulStyle}>
                    <li>Xử lý đơn hàng và giao hàng đến địa chỉ của bạn</li>
                    <li>Gửi xác nhận đơn hàng và thông báo trạng thái giao hàng</li>
                    <li>Cải thiện trải nghiệm mua sắm và gợi ý sách phù hợp</li>
                    <li>Gửi khuyến mãi và thông tin sản phẩm mới (nếu bạn đồng ý)</li>
                </ul>
            ),
        },
        {
            title: '3. Bảo mật thông tin',
            content: (
                <ul style={ulStyle}>
                    <li>Mã hóa mật khẩu bằng thuật toán bcrypt</li>
                    <li>Kết nối HTTPS được mã hóa SSL/TLS</li>
                    <li>Phân quyền truy cập nội bộ nghiêm ngặt</li>
                    <li>Không lưu trữ thông tin thẻ tín dụng/thanh toán trên hệ thống</li>
                </ul>
            ),
        },
        {
            title: '4. Chia sẻ thông tin với bên thứ ba',
            content: (
                <>
                    <p style={pStyle}>Chúng tôi <strong>không bán</strong> thông tin cá nhân của bạn. Thông tin chỉ được chia sẻ với:</p>
                    <ul style={ulStyle}>
                        <li>Đơn vị vận chuyển (để thực hiện giao hàng)</li>
                        <li>Cổng thanh toán (để xử lý giao dịch)</li>
                        <li>Cơ quan pháp luật (khi có yêu cầu hợp pháp)</li>
                    </ul>
                </>
            ),
        },
        {
            title: '5. Quyền của bạn',
            content: (
                <>
                    <ul style={ulStyle}>
                        <li>Yêu cầu xem, sửa đổi hoặc xóa thông tin cá nhân</li>
                        <li>Hủy đăng ký nhận email marketing bất kỳ lúc nào</li>
                    </ul>
                    <p style={{ ...pStyle, marginTop: 10 }}>Liên hệ: <a href="mailto:privacy@phuonglebookstore.vn" style={{ color: '#5a4a3a' }}>privacy@phuonglebookstore.vn</a></p>
                </>
            ),
        },
        {
            title: '6. Cookie',
            content: <p style={pStyle}>Chúng tôi sử dụng cookie để ghi nhớ phiên đăng nhập và cải thiện trải nghiệm. Bạn có thể tắt cookie trong cài đặt trình duyệt, tuy nhiên một số tính năng có thể không hoạt động đầy đủ.</p>,
        },
        {
            title: '7. Thay đổi chính sách',
            content: <p style={pStyle}>Chính sách này có thể được cập nhật định kỳ. Chúng tôi sẽ thông báo thay đổi quan trọng qua email hoặc thông báo trên website. Việc tiếp tục sử dụng dịch vụ đồng nghĩa với chấp nhận chính sách mới.</p>,
        },
    ];

    return (
        <SiteLayout>
            <section className="hero" style={{ minHeight: 220 }}>
                <div className="hero__bg" style={{ backgroundImage: "url('https://placehold.co/1600x400/dadad5/424842?text=PhuongLebookstore')" }} />
                <div className="hero__overlay" />
                <div className="hero__content">
                    <div className="hero__inner">
                        <span className="hero__eyebrow">Bảo vệ thông tin</span>
                        <h1 className="hero__title" style={{ fontSize: '2.2rem' }}>Chính Sách Bảo Mật</h1>
                    </div>
                </div>
            </section>

            <section className="section">
                <div className="container" style={{ maxWidth: 820 }}>
                    <p style={{ color: '#888', fontSize: 13, marginBottom: 8 }}>Cập nhật lần cuối: 01/09/2026</p>
                    <p style={{ ...pStyle, marginBottom: 36 }}>PhuongLebookstore cam kết bảo vệ quyền riêng tư và thông tin cá nhân của khách hàng.</p>

                    {sections.map(s => (
                        <div key={s.title} style={{ marginBottom: 36 }}>
                            <h2 style={{ fontSize: 18, color: '#2c2c2c', marginBottom: 12, paddingBottom: 6, borderBottom: '2px solid #e8e2d9' }}>{s.title}</h2>
                            {s.content}
                        </div>
                    ))}
                </div>
            </section>
        </SiteLayout>
    );
}

const pStyle = { color: '#444', lineHeight: 1.8, fontSize: 14 };
const ulStyle = { paddingLeft: 20, color: '#444', lineHeight: 2, fontSize: 14 };
