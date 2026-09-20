import { useState, useEffect } from 'react';
import { useParams, Link, useNavigate } from 'react-router-dom';
import axios from 'axios';
import { useAuth } from '../context/AuthContext';
import SiteLayout from '../layouts/SiteLayout';
import { addToCart } from '../utils/cartStorage';
import '../styles/style.css';

const formatPrice = (v) => Number(v || 0).toLocaleString('vi-VN') + 'đ';

const BookDetailPage = () => {
    const { slug } = useParams();
    const navigate = useNavigate();
    const { accessToken } = useAuth();

    const [book, setBook]         = useState(null);
    const [loading, setLoading]   = useState(true);
    const [quantity, setQuantity] = useState(1);
    const [searchTerm, setSearchTerm] = useState('');
    const [added, setAdded]       = useState(false);
    const [activeImg, setActiveImg] = useState(null);

    useEffect(() => {
        setLoading(true);
        axios.get(`/api/books/${slug}`)
            .then(res => { setBook(res.data); setActiveImg(res.data?.image || null); })
            .catch(err => console.error('Lỗi khi tải thông tin sách:', err))
            .finally(() => setLoading(false));
    }, [slug]);

    const handleAddToCart = () => {
        if (!book) return;
        addToCart({ id: book.book_id, title: book.title, price: book.discount_price || book.price, cover: book.image }, Number(quantity));
        window.dispatchEvent(new Event('cart-updated'));
        setAdded(true);
        setTimeout(() => setAdded(false), 2000);
    };

    const handleBuyNow = () => {
        if (!accessToken) { navigate('/login'); return; }
        handleAddToCart();
        navigate('/cart');
    };

    if (loading) return (
        <SiteLayout>
            <div style={{ padding: '80px 0', textAlign: 'center', color: '#888' }}>Đang tải thông tin sách...</div>
        </SiteLayout>
    );
    if (!book) return (
        <SiteLayout>
            <div style={{ padding: '80px 0', textAlign: 'center', color: '#888' }}>Không tìm thấy cuốn sách này!</div>
        </SiteLayout>
    );

    const images = [book.image, ...(book.images?.map(i => i.image_path) || [])].filter(Boolean);
    const hasDiscount = book.discount_price && Number(book.discount_price) < Number(book.price);

    return (
        <SiteLayout>
            {/* Breadcrumb */}
            <div style={{ background: '#faf9f6', borderBottom: '1px solid #e8e2d9', padding: '10px 0' }}>
                <div className="container" style={{ fontSize: 13, color: '#888', display: 'flex', gap: 6, alignItems: 'center' }}>
                    <Link to="/" style={{ color: '#888', textDecoration: 'none' }}>Trang chủ</Link>
                    <span>›</span>
                    <Link to="/van-hoc" style={{ color: '#888', textDecoration: 'none' }}>
                        {book.category?.category_name || 'Sách'}
                    </Link>
                    <span>›</span>
                    <span style={{ color: '#444', fontWeight: 500 }}>{book.title}</span>
                </div>
            </div>

            {/* Main Content */}
            <section className="section">
                <div className="container">
                    <div style={{ display: 'flex', gap: 48, alignItems: 'flex-start', flexWrap: 'wrap' }}>

                        {/* ── Ảnh sách ── */}
                        <div style={{ flexShrink: 0, width: 300 }}>
                            <div style={{ borderRadius: 12, overflow: 'hidden', border: '1px solid #e8e2d9', background: '#f5f0e8', aspectRatio: '3/4', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                                <img
                                    src={activeImg || 'https://placehold.co/300x400/e8e8e3/424842?text=S%C3%A1ch'}
                                    alt={book.title}
                                    style={{ width: '100%', height: '100%', objectFit: 'cover' }}
                                    onError={e => { e.target.src = 'https://placehold.co/300x400/e8e8e3/424842?text=S%C3%A1ch'; }}
                                />
                            </div>
                            {/* Thumbnail gallery */}
                            {images.length > 1 && (
                                <div style={{ display: 'flex', gap: 8, marginTop: 10, flexWrap: 'wrap' }}>
                                    {images.map((img, i) => (
                                        <div
                                            key={i}
                                            onClick={() => setActiveImg(img)}
                                            style={{
                                                width: 60, height: 80, borderRadius: 6, overflow: 'hidden', cursor: 'pointer',
                                                border: activeImg === img ? '2px solid #5a4a3a' : '2px solid #e8e2d9',
                                                flexShrink: 0,
                                            }}
                                        >
                                            <img src={img} alt="" style={{ width: '100%', height: '100%', objectFit: 'cover' }} />
                                        </div>
                                    ))}
                                </div>
                            )}
                        </div>

                        {/* ── Thông tin sách ── */}
                        <div style={{ flex: 1, minWidth: 280 }}>
                            {/* Badge thể loại */}
                            <span style={{ background: '#f5ede0', color: '#7a5c3d', padding: '4px 12px', borderRadius: 20, fontSize: 12, fontWeight: 600 }}>
                                {book.category?.category_name || 'Sách'}
                            </span>

                            <h1 style={{ margin: '14px 0 8px', fontSize: 28, fontWeight: 700, color: '#2c2c2c', lineHeight: 1.3 }}>{book.title}</h1>

                            <p style={{ color: '#888', fontSize: 14, marginBottom: 4 }}>
                                Tác giả: <strong style={{ color: '#5a4a3a' }}>
                                    {book.authors?.length ? book.authors.map(a => a.author_name).join(', ') : 'Đang cập nhật'}
                                </strong>
                            </p>
                            <p style={{ color: '#888', fontSize: 14, marginBottom: 20 }}>
                                NXB: <strong style={{ color: '#5a4a3a' }}>{book.publisher?.publisher_name || 'Đang cập nhật'}</strong>
                            </p>

                            {/* Giá */}
                            <div style={{ display: 'flex', alignItems: 'center', gap: 14, marginBottom: 24 }}>
                                <span style={{ fontSize: 32, fontWeight: 800, color: '#c0392b' }}>
                                    {formatPrice(book.discount_price || book.price)}
                                </span>
                                {hasDiscount && (
                                    <>
                                        <span style={{ fontSize: 18, color: '#bbb', textDecoration: 'line-through' }}>
                                            {formatPrice(book.price)}
                                        </span>
                                        <span style={{ background: '#e74c3c', color: '#fff', padding: '3px 10px', borderRadius: 20, fontSize: 12, fontWeight: 700 }}>
                                            -{Math.round((1 - book.discount_price / book.price) * 100)}%
                                        </span>
                                    </>
                                )}
                            </div>

                            {/* Mô tả */}
                            {book.description && (
                                <p style={{ lineHeight: 1.8, color: '#555', marginBottom: 24, fontSize: 14 }}>{book.description}</p>
                            )}

                            {/* Số lượng + nút */}
                            <div style={{ display: 'flex', alignItems: 'center', gap: 16, marginBottom: 16 }}>
                                <div style={{ display: 'flex', alignItems: 'center', border: '1px solid #d4c9bb', borderRadius: 8, overflow: 'hidden' }}>
                                    <button onClick={() => setQuantity(q => Math.max(1, q - 1))}
                                        style={{ width: 36, height: 40, border: 'none', background: '#f5ede0', cursor: 'pointer', fontSize: 18, color: '#5a4a3a' }}>−</button>
                                    <input type="number" min="1" max={book.stock_quantity} value={quantity}
                                        onChange={e => setQuantity(Math.max(1, Math.min(book.stock_quantity, Number(e.target.value))))}
                                        style={{ width: 50, textAlign: 'center', border: 'none', outline: 'none', fontSize: 15, fontWeight: 600 }} />
                                    <button onClick={() => setQuantity(q => Math.min(book.stock_quantity, q + 1))}
                                        style={{ width: 36, height: 40, border: 'none', background: '#f5ede0', cursor: 'pointer', fontSize: 18, color: '#5a4a3a' }}>+</button>
                                </div>
                                <span style={{ fontSize: 13, color: '#999' }}>
                                    {book.stock_quantity > 0 ? `Còn ${book.stock_quantity} cuốn` : '⚠️ Hết hàng'}
                                </span>
                            </div>

                            <div style={{ display: 'flex', gap: 12 }}>
                                <button
                                    onClick={handleAddToCart}
                                    disabled={book.stock_quantity === 0}
                                    className="btn btn-primary"
                                    style={{ flex: 1, padding: '12px', background: added ? '#27ae60' : undefined }}
                                >
                                    {added ? '✓ Đã thêm vào giỏ!' : '🛒 Thêm vào giỏ hàng'}
                                </button>
                                <button
                                    onClick={handleBuyNow}
                                    disabled={book.stock_quantity === 0}
                                    style={{
                                        flex: 1, padding: '12px', background: '#fff', border: '2px solid #5a4a3a',
                                        borderRadius: 8, fontWeight: 600, color: '#5a4a3a', cursor: 'pointer', fontSize: 14,
                                    }}
                                >
                                    Mua ngay →
                                </button>
                            </div>

                            {/* Thông tin nhanh */}
                            <div style={{ marginTop: 28, display: 'flex', flexDirection: 'column', gap: 10, borderTop: '1px solid #e8e2d9', paddingTop: 20 }}>
                                {[
                                    ['🚚 Vận chuyển', 'Miễn phí toàn quốc với đơn từ 500.000đ'],
                                    ['🔄 Đổi trả', 'Đổi trả miễn phí trong 30 ngày nếu sách lỗi'],
                                    ['✅ Chính hãng', '100% sách chính hãng từ NXB uy tín'],
                                ].map(([label, value]) => (
                                    <div key={label} style={{ display: 'flex', gap: 10, fontSize: 13 }}>
                                        <span style={{ color: '#5a4a3a', fontWeight: 600, minWidth: 130 }}>{label}</span>
                                        <span style={{ color: '#666' }}>{value}</span>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </SiteLayout>
    );
};

export default BookDetailPage;