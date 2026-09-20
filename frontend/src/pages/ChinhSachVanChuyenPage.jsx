import SiteLayout from '../layouts/SiteLayout';

const tableStyle = { width: '100%', borderCollapse: 'collapse', fontSize: 14, marginTop: 12 };
const thStyle = { padding: '10px 14px', textAlign: 'left', fontWeight: 600, color: '#5a4a3a', borderBottom: '2px solid #e0d4c0', background: '#f5ede0' };
const tdStyle = (i) => ({ padding: '9px 14px', borderBottom: '1px solid #ede8e0', color: '#444', background: i % 2 === 0 ? '#fff' : '#fdf9f4' });

export default function ChinhSachVanChuyenPage() {
    return (
        <SiteLayout>
            <section className="hero" style={{ minHeight: 220 }}>
                <div className="hero__bg" style={{ backgroundImage: "url('https://placehold.co/1600x400/dadad5/424842?text=PhuongLebookstore')" }} />
                <div className="hero__overlay" />
                <div className="hero__content">
                    <div className="hero__inner">
                        <span className="hero__eyebrow">Thông tin vận chuyển</span>
                        <h1 className="hero__title" style={{ fontSize: '2.2rem' }}>Chính Sách Vận Chuyển</h1>
                    </div>
                </div>
            </section>

            <section className="section">
                <div className="container" style={{ maxWidth: 860 }}>
                    <p style={{ color: '#888', fontSize: 13, marginBottom: 32 }}>Cập nhật lần cuối: 01/09/2026</p>

                    <InfoSection title="🚚 Phạm vi giao hàng">
                        <p style={{ color: '#444', lineHeight: 1.8 }}>PhuongLebookstore giao hàng toàn quốc 63 tỉnh thành qua GHN, GHTK, J&T Express.</p>
                    </InfoSection>

                    <InfoSection title="💰 Phí vận chuyển">
                        <div style={{ overflowX: 'auto' }}>
                            <table style={tableStyle}>
                                <thead><tr>
                                    {['Giá trị đơn hàng', 'Khu vực', 'Phí ship'].map(h => <th key={h} style={thStyle}>{h}</th>)}
                                </tr></thead>
                                <tbody>
                                    {[
                                        ['Từ 500.000đ', 'Toàn quốc', 'Miễn phí'],
                                        ['Dưới 500.000đ', 'Nội thành TP.HCM & Hà Nội', '20.000đ'],
                                        ['Dưới 500.000đ', 'Tỉnh thành khác', '30.000đ'],
                                        ['Dưới 500.000đ', 'Vùng sâu/vùng xa', '40.000đ – 60.000đ'],
                                    ].map((row, i) => (
                                        <tr key={i}>{row.map((cell, j) => <td key={j} style={{ ...tdStyle(i), fontWeight: cell === 'Miễn phí' ? 700 : 400, color: cell === 'Miễn phí' ? '#27ae60' : '#444' }}>{cell}</td>)}</tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </InfoSection>

                    <InfoSection title="⏱ Thời gian giao hàng">
                        <div style={{ overflowX: 'auto' }}>
                            <table style={tableStyle}>
                                <thead><tr>
                                    {['Khu vực', 'Thời gian dự kiến'].map(h => <th key={h} style={thStyle}>{h}</th>)}
                                </tr></thead>
                                <tbody>
                                    {[
                                        ['TP.HCM, Hà Nội (nội thành)', '1 – 2 ngày làm việc'],
                                        ['Tỉnh thành lân cận', '2 – 3 ngày làm việc'],
                                        ['Tỉnh thành xa', '3 – 5 ngày làm việc'],
                                        ['Vùng sâu, hải đảo', '5 – 7 ngày làm việc'],
                                    ].map((row, i) => (
                                        <tr key={i}>{row.map((cell, j) => <td key={j} style={tdStyle(i)}>{cell}</td>)}</tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                        <p style={{ marginTop: 10, background: '#fffbf0', border: '1px solid #f0d9a0', borderRadius: 8, padding: '8px 14px', fontSize: 13, color: '#7a5c3d' }}>
                            💡 Thời gian trên chưa tính Thứ 7, Chủ nhật và ngày lễ.
                        </p>
                    </InfoSection>

                    <InfoSection title="📦 Quy trình xử lý đơn hàng">
                        <ol style={{ paddingLeft: 0, listStyle: 'none', display: 'flex', flexDirection: 'column', gap: 12 }}>
                            {[
                                'Đơn hàng được xác nhận trong vòng 2 giờ làm việc.',
                                'Sách được đóng gói cẩn thận với lớp bảo vệ bong bóng khí.',
                                'Bàn giao cho đơn vị vận chuyển và gửi mã theo dõi đến email/SĐT.',
                                'Theo dõi đơn hàng qua trang Dashboard của bạn.',
                            ].map((item, i) => (
                                <li key={i} style={{ display: 'flex', gap: 12, alignItems: 'flex-start' }}>
                                    <span style={{ minWidth: 26, height: 26, background: '#5a4a3a', color: '#fff', borderRadius: '50%', display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: 13, fontWeight: 700, flexShrink: 0 }}>{i + 1}</span>
                                    <span style={{ color: '#444', lineHeight: 1.7, paddingTop: 2, fontSize: 14 }}>{item}</span>
                                </li>
                            ))}
                        </ol>
                    </InfoSection>

                    <InfoSection title="⚠️ Lưu ý">
                        <ul style={{ paddingLeft: 20, color: '#444', lineHeight: 2, fontSize: 14 }}>
                            <li>Vui lòng kiểm tra hàng trước khi ký nhận.</li>
                            <li>Từ chối nhận hàng nếu thùng hàng rách nát, méo mó, có dấu hiệu đã mở.</li>
                            <li>Liên hệ hotline trong 24 giờ nếu nhận được hàng bị lỗi hoặc sai.</li>
                        </ul>
                    </InfoSection>
                </div>
            </section>
        </SiteLayout>
    );
}

function InfoSection({ title, children }) {
    return (
        <div style={{ marginBottom: 40 }}>
            <h2 style={{ fontSize: 20, color: '#2c2c2c', marginBottom: 14, paddingBottom: 8, borderBottom: '2px solid #e8e2d9' }}>{title}</h2>
            {children}
        </div>
    );
}
