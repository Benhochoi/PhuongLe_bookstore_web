import SiteLayout from '../layouts/SiteLayout';

export default function DoiTraPage() {
    return (
        <SiteLayout>
            <section className="hero" style={{ minHeight: 220 }}>
                <div className="hero__bg" style={{ backgroundImage: "url('https://placehold.co/1600x400/dadad5/424842?text=PhuongLebookstore')" }} />
                <div className="hero__overlay" />
                <div className="hero__content">
                    <div className="hero__inner">
                        <span className="hero__eyebrow">Cam kết của chúng tôi</span>
                        <h1 className="hero__title" style={{ fontSize: '2.2rem' }}>Chính Sách Đổi Trả</h1>
                    </div>
                </div>
            </section>

            <section className="section">
                <div className="container" style={{ maxWidth: 860 }}>
                    <p style={{ color: '#888', fontSize: 13, marginBottom: 24 }}>Cập nhật lần cuối: 01/09/2026</p>

                    {/* Highlight */}
                    <div style={{ background: '#f0faf0', border: '1px solid #a8d8a8', borderRadius: 10, padding: '14px 18px', marginBottom: 36, fontSize: 15, color: '#2d6a2d', lineHeight: 1.7 }}>
                        🛡️ Chúng tôi cam kết <strong>đổi trả miễn phí</strong> với mọi sản phẩm lỗi từ nhà sản xuất. Sự hài lòng của bạn là ưu tiên hàng đầu.
                    </div>

                    <InfoSection title="✅ Điều kiện được đổi/trả">
                        <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 16 }}>
                            <PolicyBox color="#27ae60" label="✅ Được đổi/trả" items={[
                                'Sách bị lỗi in, trang bị thiếu hoặc lặp',
                                'Giao sai sách so với đơn hàng',
                                'Sách bị rách, ướt, méo do vận chuyển',
                                'Bìa sách bong tróc nghiêm trọng',
                            ]} />
                            <PolicyBox color="#e74c3c" label="❌ Không được đổi/trả" items={[
                                'Đã qua 30 ngày kể từ ngày nhận hàng',
                                'Sách đã bị viết/đánh dấu/rách do người dùng',
                                'Mất hóa đơn mua hàng',
                                'Đổi vì lý do cá nhân (không thích, đọc rồi)',
                            ]} />
                        </div>
                    </InfoSection>

                    <InfoSection title="📋 Quy trình đổi/trả">
                        <ol style={{ listStyle: 'none', padding: 0, display: 'flex', flexDirection: 'column', gap: 14 }}>
                            {[
                                { t: 'Liên hệ trong 7 ngày', d: 'Gọi hotline 1800 1234 hoặc email với tiêu đề "ĐỔI TRẢ - [Mã đơn hàng]".' },
                                { t: 'Cung cấp bằng chứng', d: 'Chụp ảnh rõ sản phẩm bị lỗi, gửi kèm mã đơn hàng qua email hoặc chat.' },
                                { t: 'Chờ xác nhận', d: 'Bộ phận hỗ trợ xem xét và phản hồi trong 1–2 ngày làm việc.' },
                                { t: 'Gửi lại hàng', d: 'Chúng tôi hướng dẫn địa chỉ gửi. Chi phí vận chuyển do PhuongLebookstore chịu nếu lỗi từ chúng tôi.' },
                                { t: 'Nhận hàng mới hoặc hoàn tiền', d: 'Sách mới gửi trong 3–5 ngày, hoặc hoàn tiền trong 2–5 ngày làm việc.' },
                            ].map((s, i) => (
                                <li key={i} style={{ display: 'flex', gap: 14, alignItems: 'flex-start' }}>
                                    <span style={{ minWidth: 28, height: 28, background: '#5a4a3a', color: '#fff', borderRadius: '50%', display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: 13, fontWeight: 700, flexShrink: 0 }}>{i + 1}</span>
                                    <div>
                                        <div style={{ fontWeight: 700, color: '#2c2c2c', marginBottom: 2, fontSize: 14 }}>{s.t}</div>
                                        <div style={{ color: '#666', fontSize: 13, lineHeight: 1.6 }}>{s.d}</div>
                                    </div>
                                </li>
                            ))}
                        </ol>
                    </InfoSection>

                    <InfoSection title="💳 Chính sách hoàn tiền">
                        <table style={{ width: '100%', borderCollapse: 'collapse', fontSize: 14 }}>
                            <thead><tr>
                                {['Phương thức thanh toán', 'Thời gian hoàn tiền'].map(h => (
                                    <th key={h} style={{ padding: '10px 14px', textAlign: 'left', fontWeight: 600, color: '#5a4a3a', borderBottom: '2px solid #e0d4c0', background: '#f5ede0' }}>{h}</th>
                                ))}
                            </tr></thead>
                            <tbody>
                                {[
                                    ['Thanh toán khi nhận hàng (COD)', '3–5 ngày làm việc'],
                                    ['Chuyển khoản ngân hàng', '2–3 ngày làm việc'],
                                    ['Ví MoMo / ZaloPay', '1–2 ngày làm việc'],
                                ].map((row, i) => (
                                    <tr key={i} style={{ background: i % 2 === 0 ? '#fff' : '#fdf9f4' }}>
                                        {row.map((cell, j) => <td key={j} style={{ padding: '9px 14px', borderBottom: '1px solid #ede8e0', color: '#444' }}>{cell}</td>)}
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </InfoSection>
                </div>
            </section>

            <section className="section section--alt">
                <div className="container">
                    <div className="cta-card">
                        <div className="cta-content">
                            <h2>Cần hỗ trợ đổi trả?</h2>
                            <p>Hotline: <strong>1800 1234</strong> (Miễn phí, 8:00–21:00) · Email: <strong>returns@phuonglebookstore.vn</strong></p>
                        </div>
                        <div>
                            <a href="/lien-he" className="btn btn-primary">Liên hệ ngay →</a>
                        </div>
                    </div>
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

function PolicyBox({ color, label, items }) {
    return (
        <div style={{ border: `2px solid ${color}30`, borderRadius: 10, padding: '16px', background: `${color}08` }}>
            <div style={{ fontWeight: 700, color, marginBottom: 10, fontSize: 14 }}>{label}</div>
            <ul style={{ margin: 0, paddingLeft: 18 }}>
                {items.map((item, i) => <li key={i} style={{ color: '#444', fontSize: 13, lineHeight: 1.9 }}>{item}</li>)}
            </ul>
        </div>
    );
}
