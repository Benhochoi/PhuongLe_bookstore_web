import SiteLayout from '../layouts/SiteLayout';

export default function GioiThieuPage() {
    return (
        <SiteLayout>
            {/* Page hero */}
            <section className="hero" style={{ minHeight: 260 }}>
                <div className="hero__bg" style={{ backgroundImage: "url('https://placehold.co/1600x400/dadad5/424842?text=PhuongLebookstore')" }} />
                <div className="hero__overlay" />
                <div className="hero__content">
                    <div className="hero__inner">
                        <span className="hero__eyebrow">Câu chuyện của chúng tôi</span>
                        <h1 className="hero__title" style={{ fontSize: '2.2rem' }}>Về Chúng Tôi</h1>
                    </div>
                </div>
            </section>

            {/* Câu chuyện */}
            <section className="section">
                <div className="container">
                    <div className="section-header">
                        <div>
                            <h2 className="section-title">🏪 Câu chuyện của chúng tôi</h2>
                            <p className="section-subtitle">Hành trình xây dựng không gian tri thức hiện đại</p>
                        </div>
                    </div>
                    <div style={{ maxWidth: 720, lineHeight: 1.9, color: '#444', fontSize: 15 }}>
                        <p>PhuongLebookstore được thành lập với niềm đam mê sách và khát khao xây dựng một không gian tri thức hiện đại, nơi mọi người có thể tìm thấy những cuốn sách phù hợp với từng giai đoạn cuộc đời.</p>
                        <p style={{ marginTop: 16 }}>Từ những ngày đầu chỉ là một gian hàng nhỏ, chúng tôi đã không ngừng mở rộng danh mục — từ văn học kinh điển, sách thiếu nhi, kinh tế đến tâm lý học — để đáp ứng nhu cầu đa dạng của độc giả Việt Nam.</p>
                    </div>
                </div>
            </section>

            {/* Giá trị cốt lõi */}
            <section className="section section--alt">
                <div className="container">
                    <div className="section-header">
                        <div>
                            <h2 className="section-title">💡 Giá trị cốt lõi</h2>
                            <p className="section-subtitle">Những điều chúng tôi cam kết với mỗi độc giả</p>
                        </div>
                    </div>
                    <div className="category-grid">
                        {[
                            { icon: '📚', title: 'Chất lượng', desc: 'Tất cả sách đều chính hãng 100%.' },
                            { icon: '🚚', title: 'Nhanh chóng', desc: 'Giao toàn quốc 2–5 ngày. Miễn phí từ 500.000đ.' },
                            { icon: '💬', title: 'Tận tâm', desc: 'Đội ngũ hỗ trợ sẵn sàng tư vấn 8:00–21:00.' },
                            { icon: '🔄', title: 'Uy tín', desc: 'Đổi trả miễn phí. Hoàn tiền nếu sách lỗi.' },
                        ].map(v => (
                            <div key={v.title} className="category-card" style={{ cursor: 'default', flexDirection: 'column', alignItems: 'flex-start', gap: 8, padding: '20px 18px' }}>
                                <span style={{ fontSize: 32 }}>{v.icon}</span>
                                <strong style={{ fontSize: 15, color: '#2c2c2c' }}>{v.title}</strong>
                                <span style={{ fontSize: 13, color: '#666', lineHeight: 1.5 }}>{v.desc}</span>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Liên hệ */}
            <section className="section">
                <div className="container">
                    <div className="section-header">
                        <div>
                            <h2 className="section-title">📍 Thông tin liên hệ</h2>
                        </div>
                    </div>
                    <div style={{ display: 'flex', flexDirection: 'column', gap: 14, maxWidth: 600 }}>
                        {[
                            { label: 'Địa chỉ', value: '123 Đường Sách, Quận 1, TP. Hồ Chí Minh' },
                            { label: 'Email', value: 'contact@phuonglebookstore.vn' },
                            { label: 'Hotline', value: '1800 1234 (Miễn phí, 8:00 – 21:00)' },
                            { label: 'Giờ làm việc', value: 'Thứ 2 – Chủ nhật: 8:00 – 21:00' },
                        ].map(r => (
                            <div key={r.label} style={{ display: 'flex', gap: 16, padding: '12px 0', borderBottom: '1px solid #ede8e0', fontSize: 14 }}>
                                <span style={{ minWidth: 120, fontWeight: 600, color: '#5a4a3a' }}>{r.label}:</span>
                                <span style={{ color: '#444' }}>{r.value}</span>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* CTA */}
            <section className="section section--alt">
                <div className="container">
                    <div className="cta-card">
                        <div className="cta-content">
                            <h2>Sứ mệnh của chúng tôi</h2>
                            <p>Đưa những cuốn sách hay đến tay mọi người một cách thuận tiện, nhanh chóng và tiết kiệm nhất.</p>
                        </div>
                        <div>
                            <a href="/products" className="btn btn-primary">Khám phá kho sách</a>
                        </div>
                    </div>
                </div>
            </section>
        </SiteLayout>
    );
}
