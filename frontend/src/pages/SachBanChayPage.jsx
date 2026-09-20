import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';
import InfoPageLayout from '../components/InfoPageLayout';
import { addToCart } from '../utils/cartStorage';

const fmtPrice = (n) => Number(n || 0).toLocaleString('vi-VN') + 'đ';

export default function SachBanChayPage() {
    const [books, setBooks] = useState([]);
    const [loading, setLoading] = useState(true);
    const [added, setAdded] = useState({});

    useEffect(() => {
        axios.get('/api/books', { params: { sort: 'price_desc', per_page: 24 } })
            .then(res => {
                const list = res.data?.data || res.data || [];
                setBooks(Array.isArray(list) ? list : []);
            })
            .catch(() => setBooks([]))
            .finally(() => setLoading(false));
    }, []);

    const handleAdd = (book) => {
        addToCart({ id: book.book_id, title: book.title, price: book.discount_price || book.price, cover: book.cover_image }, 1);
        setAdded(a => ({ ...a, [book.book_id]: true }));
        setTimeout(() => setAdded(a => ({ ...a, [book.book_id]: false })), 1500);
        window.dispatchEvent(new Event('cart-updated'));
    };

    const slug = (book) => book.slug || book.book_id;

    return (
        <InfoPageLayout title="Sách Bán Chạy" breadcrumb="Sách bán chạy">
            <p style={{ color: '#666', marginBottom: 28 }}>
                Những cuốn sách được yêu thích nhất tại PhuongLebookstore — được cộng đồng độc giả tin chọn.
            </p>

            {loading ? (
                <p style={{ textAlign: 'center', color: '#888', padding: '40px 0' }}>Đang tải...</p>
            ) : (
                <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fill, minmax(180px, 1fr))', gap: 20 }}>
                    {books.map((book, idx) => (
                        <div key={book.book_id} style={{ background: '#fff', borderRadius: 12, border: '1px solid #e8e2d9', overflow: 'hidden', transition: 'box-shadow .2s' }}
                            onMouseEnter={e => e.currentTarget.style.boxShadow = '0 4px 20px rgba(0,0,0,.1)'}
                            onMouseLeave={e => e.currentTarget.style.boxShadow = 'none'}>
                            {idx < 3 && (
                                <div style={{ background: idx === 0 ? '#f59e0b' : idx === 1 ? '#94a3b8' : '#cd7f32', color: '#fff', fontSize: 11, fontWeight: 700, textAlign: 'center', padding: '4px 0' }}>
                                    #{idx + 1} BÁN CHẠY
                                </div>
                            )}
                            <Link to={`/van-hoc/${slug(book)}`} style={{ display: 'block', textDecoration: 'none' }}>
                                <div style={{ aspectRatio: '3/4', overflow: 'hidden', background: '#f5f0e8' }}>
                                    <img src={book.cover_image || '/placeholder-book.jpg'} alt={book.title}
                                        style={{ width: '100%', height: '100%', objectFit: 'cover' }}
                                        onError={e => { e.target.style.display = 'none'; }} />
                                </div>
                                <div style={{ padding: '12px' }}>
                                    <p style={{ margin: '0 0 4px', fontSize: 13, fontWeight: 600, color: '#2c2c2c', lineHeight: 1.4, display: '-webkit-box', WebkitLineClamp: 2, WebkitBoxOrient: 'vertical', overflow: 'hidden' }}>
                                        {book.title}
                                    </p>
                                    <p style={{ margin: '0 0 8px', fontSize: 12, color: '#888' }}>
                                        {book.authors?.map(a => a.author_name).join(', ') || '—'}
                                    </p>
                                    <p style={{ margin: 0, fontWeight: 700, color: '#c0392b', fontSize: 15 }}>
                                        {fmtPrice(book.discount_price || book.price)}
                                    </p>
                                </div>
                            </Link>
                            <div style={{ padding: '0 12px 12px' }}>
                                <button onClick={() => handleAdd(book)} style={{
                                    width: '100%',
                                    padding: '8px',
                                    background: added[book.book_id] ? '#27ae60' : '#3d2b1f',
                                    color: '#fff',
                                    border: 'none',
                                    borderRadius: 8,
                                    fontSize: 12,
                                    fontWeight: 600,
                                    cursor: 'pointer',
                                    transition: 'background .2s',
                                }}>
                                    {added[book.book_id] ? '✓ Đã thêm' : '🛒 Thêm vào giỏ'}
                                </button>
                            </div>
                        </div>
                    ))}
                </div>
            )}
        </InfoPageLayout>
    );
}
