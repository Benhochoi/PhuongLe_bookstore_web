import { useState } from 'react';
import SiteLayout from '../layouts/SiteLayout';

const FAQS = [
    { q: 'Làm sao để đặt hàng?', a: 'Chọn sách → Thêm vào giỏ hàng → Thanh toán → Điền thông tin giao hàng → Xác nhận. Rất đơn giản!' },
    { q: 'Tôi cần đăng ký tài khoản để mua hàng không?', a: 'Có, bạn cần đăng ký tài khoản để đặt hàng. Việc này giúp bạn theo dõi đơn hàng và nhận ưu đãi thành viên.' },
    { q: 'Các phương thức thanh toán nào được chấp nhận?', a: 'Chúng tôi chấp nhận: Thanh toán khi nhận hàng (COD), Chuyển khoản ngân hàng, Ví điện tử MoMo, ZaloPay.' },
    { q: 'Miễn phí vận chuyển khi nào?', a: 'Miễn phí vận chuyển toàn quốc với đơn hàng từ 500.000đ. Dưới 500.000đ, phí ship từ 20.000đ – 60.000đ tùy khu vực.' },
    { q: 'Tôi có thể hủy đơn hàng sau khi đặt không?', a: 'Bạn có thể hủy khi đơn đang "Chờ xác nhận" hoặc "Đã xác nhận". Vào Dashboard → Đơn hàng → Bấm "Hủy đơn". Đơn đang giao không thể hủy.' },
    { q: 'Sách bị lỗi hoặc không đúng tôi phải làm gì?', a: 'Liên hệ hotline 1800 1234 hoặc email trong 7 ngày kể từ nhận hàng. Chúng tôi sẽ đổi sách mới hoặc hoàn tiền 100%.' },
    { q: 'Thời gian giao hàng là bao lâu?', a: 'TP.HCM, Hà Nội nội thành: 1–2 ngày. Tỉnh thành khác: 3–5 ngày. Vùng sâu/hải đảo: 5–7 ngày làm việc.' },
    { q: 'Tôi có thể đổi sách đã mua không?', a: 'Được! Sách lỗi từ nhà xuất bản được đổi trong 30 ngày. Xem chi tiết tại trang Chính sách Đổi Trả.' },
    { q: 'Làm sao theo dõi đơn hàng?', a: 'Đăng nhập → Bấm vào ảnh đại diện → Dashboard → Tab "Đơn hàng của tôi". Bạn sẽ thấy tất cả đơn hàng và trạng thái mới nhất.' },
    { q: 'Sách trên web có phải hàng chính hãng không?', a: '100% sách chính hãng từ các nhà xuất bản uy tín tại Việt Nam. Cam kết không bán sách giả, sách lậu.' },
];

export default function FAQPage() {
    const [openIdx, setOpenIdx] = useState(null);

    return (
        <SiteLayout>
            <section className="hero" style={{ minHeight: 220 }}>
                <div className="hero__bg" style={{ backgroundImage: "url('https://placehold.co/1600x400/dadad5/424842?text=PhuongLebookstore')" }} />
                <div className="hero__overlay" />
                <div className="hero__content">
                    <div className="hero__inner">
                        <span className="hero__eyebrow">Giải đáp thắc mắc</span>
                        <h1 className="hero__title" style={{ fontSize: '2.2rem' }}>Câu Hỏi Thường Gặp</h1>
                    </div>
                </div>
            </section>

            <section className="section">
                <div className="container" style={{ maxWidth: 800 }}>
                    <p style={{ color: '#666', marginBottom: 32, lineHeight: 1.7 }}>
                        Không tìm thấy câu trả lời? <a href="/lien-he" style={{ color: '#5a4a3a', fontWeight: 600 }}>Liên hệ chúng tôi →</a>
                    </p>

                    <div style={{ display: 'flex', flexDirection: 'column', gap: 10 }}>
                        {FAQS.map((faq, i) => (
                            <div key={i} style={{ border: '1px solid #e8e2d9', borderRadius: 10, background: '#fff', overflow: 'hidden' }}>
                                <button
                                    onClick={() => setOpenIdx(openIdx === i ? null : i)}
                                    style={{
                                        width: '100%', display: 'flex', justifyContent: 'space-between', alignItems: 'center',
                                        padding: '16px 20px', border: 'none', background: openIdx === i ? '#f5ede0' : 'transparent',
                                        cursor: 'pointer', textAlign: 'left', fontSize: 15, fontWeight: 600, color: '#2c2c2c',
                                        transition: 'background .15s',
                                    }}
                                >
                                    <span>{faq.q}</span>
                                    <span style={{ fontSize: 22, fontWeight: 300, color: '#7a5c3d', transform: openIdx === i ? 'rotate(45deg)' : 'none', transition: 'transform 0.2s', flexShrink: 0 }}>+</span>
                                </button>
                                {openIdx === i && (
                                    <div style={{ padding: '0 20px 16px', color: '#555', fontSize: 14, lineHeight: 1.8, borderTop: '1px solid #f0ebe3' }}>
                                        {faq.a}
                                    </div>
                                )}
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            <section className="section section--alt">
                <div className="container">
                    <div className="cta-card">
                        <div className="cta-content">
                            <h2>Vẫn còn thắc mắc?</h2>
                            <p>Đội ngũ hỗ trợ của chúng tôi luôn sẵn sàng giúp đỡ bạn trong giờ làm việc.</p>
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
