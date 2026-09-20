import SiteLayout from '../layouts/SiteLayout';

export default function LienHePage() {
    const handleSubmit = (e) => {
        e.preventDefault();
        alert('Cảm ơn bạn! Chúng tôi sẽ phản hồi trong thời gian sớm nhất.');
        e.target.reset();
    };

    return (
        <SiteLayout>
            <section className="hero" style={{ minHeight: 220 }}>
                <div className="hero__bg" style={{ backgroundImage: "url('https://placehold.co/1600x400/dadad5/424842?text=PhuongLebookstore')" }} />
                <div className="hero__overlay" />
                <div className="hero__content">
                    <div className="hero__inner">
                        <span className="hero__eyebrow">Chúng tôi luôn lắng nghe</span>
                        <h1 className="hero__title" style={{ fontSize: '2.2rem' }}>Liên Hệ Hỗ Trợ</h1>
                    </div>
                </div>
            </section>

            {/* Kênh liên hệ */}
            <section className="section section--alt">
                <div className="container">
                    <div className="section-header">
                        <div>
                            <h2 className="section-title">Kênh liên hệ</h2>
                            <p className="section-subtitle">Chọn cách liên hệ phù hợp với bạn</p>
                        </div>
                    </div>
                    <div className="category-grid">
                        {[
                            { icon: '📞', title: 'Hotline', desc: '1800 1234', sub: 'Miễn phí · 8:00 – 21:00 hàng ngày' },
                            { icon: '📧', title: 'Email', desc: 'support@phuonglebookstore.vn', sub: 'Phản hồi trong 2 giờ làm việc' },
                            { icon: '💬', title: 'Live Chat', desc: 'Chat trực tiếp', sub: 'Góc phải màn hình' },
                            { icon: '📍', title: 'Địa chỉ', desc: '123 Đường Sách, Q.1, TP.HCM', sub: '8:00 – 20:00 hàng ngày' },
                        ].map(c => (
                            <div key={c.title} className="category-card" style={{ cursor: 'default', flexDirection: 'column', alignItems: 'flex-start', gap: 6, padding: '20px 18px' }}>
                                <span style={{ fontSize: 32 }}>{c.icon}</span>
                                <strong style={{ fontSize: 15, color: '#2c2c2c' }}>{c.title}</strong>
                                <span style={{ fontSize: 14, color: '#5a4a3a', fontWeight: 600 }}>{c.desc}</span>
                                <span style={{ fontSize: 12, color: '#888' }}>{c.sub}</span>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Form liên hệ + Thời gian phản hồi */}
            <section className="section">
                <div className="container">
                    <div style={{ display: 'grid', gridTemplateColumns: '1fr 420px', gap: 48, alignItems: 'start' }}>
                        {/* Form */}
                        <div>
                            <h2 className="section-title" style={{ marginBottom: 24 }}>📝 Gửi yêu cầu hỗ trợ</h2>
                            <form onSubmit={handleSubmit} style={{ display: 'flex', flexDirection: 'column', gap: 16 }}>
                                <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 14 }}>
                                    <Field label="Họ và tên *"><input required style={inputStyle} placeholder="Nguyễn Văn A" /></Field>
                                    <Field label="Email *"><input required type="email" style={inputStyle} placeholder="email@example.com" /></Field>
                                </div>
                                <Field label="Số điện thoại"><input style={inputStyle} placeholder="0901 234 567" /></Field>
                                <Field label="Chủ đề *">
                                    <select required style={inputStyle}>
                                        <option value="">-- Chọn chủ đề --</option>
                                        <option>Đơn hàng của tôi</option>
                                        <option>Đổi trả / Hoàn tiền</option>
                                        <option>Sản phẩm bị lỗi</option>
                                        <option>Thanh toán</option>
                                        <option>Tài khoản</option>
                                        <option>Khác</option>
                                    </select>
                                </Field>
                                <Field label="Nội dung *">
                                    <textarea required rows={5} style={{ ...inputStyle, resize: 'vertical' }} placeholder="Mô tả vấn đề bạn gặp phải..." />
                                </Field>
                                <button type="submit" className="btn btn-primary" style={{ alignSelf: 'flex-start' }}>Gửi yêu cầu →</button>
                            </form>
                        </div>

                        {/* Thời gian phản hồi */}
                        <div>
                            <h2 className="section-title" style={{ marginBottom: 24 }}>⏰ Thời gian phản hồi</h2>
                            <div style={{ display: 'flex', flexDirection: 'column', gap: 10 }}>
                                {[
                                    ['Email / Form liên hệ', 'Trong vòng 2 giờ'],
                                    ['Hotline', 'Ngay lập tức'],
                                    ['Đổi trả / Hoàn tiền', '1 – 3 ngày làm việc'],
                                    ['Khiếu nại', '5 ngày làm việc'],
                                ].map(([type, time]) => (
                                    <div key={type} style={{ display: 'flex', justifyContent: 'space-between', padding: '12px 16px', background: '#f5f0e8', borderRadius: 8, fontSize: 14 }}>
                                        <span style={{ color: '#5a4a3a', fontWeight: 500 }}>{type}</span>
                                        <span style={{ color: '#27ae60', fontWeight: 700 }}>{time}</span>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </SiteLayout>
    );
}

function Field({ label, children }) {
    return (
        <div>
            <label style={{ display: 'block', fontSize: 13, fontWeight: 600, color: '#5a4a3a', marginBottom: 6 }}>{label}</label>
            {children}
        </div>
    );
}

const inputStyle = {
    width: '100%', padding: '10px 14px', border: '1px solid #d4c9bb',
    borderRadius: 8, fontSize: 14, fontFamily: 'inherit', color: '#333',
    background: '#fff', boxSizing: 'border-box', outline: 'none',
};
