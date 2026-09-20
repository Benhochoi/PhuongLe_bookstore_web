import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import SiteLayout from '../layouts/SiteLayout';
import { addToCart, getCartCount } from '../utils/cartStorage';

const formatPrice = (value) => `${Number(value || 0).toLocaleString('vi-VN')}đ`;

const IconCart = (props) => (
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" {...props}>
        <circle cx="9" cy="21" r="1" /><circle cx="20" cy="21" r="1" />
        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
    </svg>
);

export default function SachMoiPage() {
    const [books, setBooks] = useState([]);
    const [loading, setLoading] = useState(true);
    const navigate = useNavigate();

    useEffect(() => {
        axios.get('/api/books', { params: { sort: 'newest', per_page: 24 } })
            .then(res => {
                const list = res.data?.data || res.data || [];
                setBooks(Array.isArray(list) ? list : []);
            })
            .catch(() => setBooks([]))
            .finally(() => setLoading(false));
    }, []);

    const handleBookClick = (book) => {
        const slug = book.slug || book.book_id;
        navigate(`/van-hoc/${slug}`);
    };

    const handleAddToCart = (e, book) => {
        e.stopPropagation();
        addToCart(book);
        window.dispatchEvent(new Event('cart-updated'));
    };

    return (
        <SiteLayout>
            <section className="hero" style={{ minHeight: 220 }}>
                <div className="hero__bg" style={{ backgroundImage: "url('https://placehold.co/1600x400/dadad5/424842?text=PhuongLebookstore')" }} />
                <div className="hero__overlay" />
                <div className="hero__content">
                    <div className="hero__inner">
                        <span className="hero__eyebrow">Cập nhật liên tục</span>
                        <h1 className="hero__title" style={{ fontSize: '2.2rem' }}>Sách Mới</h1>
                        <p className="hero__subtitle">Những tựa sách mới nhất vừa được bổ sung vào kho</p>
                    </div>
                </div>
            </section>

            <section className="section section--alt">
                <div className="container">
                    <div className="section-header">
                        <div>
                            <h2 className="section-title">Sách mới nhất</h2>
                            <p className="section-subtitle">Khám phá ngay hôm nay</p>
                        </div>
                    </div>

                    {loading ? (
                        <p className="section-subtitle">Đang tải...</p>
                    ) : books.length === 0 ? (
                        <p className="section-subtitle">Chưa có sách nào.</p>
                    ) : (
                        <div className="book-grid">
                            {books.map((book) => (
                                <article
                                    key={book.book_id}
                                    className="book-card"
                                    onClick={() => handleBookClick(book)}
                                    onKeyDown={(e) => { if (e.key === 'Enter') handleBookClick(book); }}
                                    role="button"
                                    tabIndex={0}
                                    style={{ position: 'relative' }}
                                >
                                    <div style={{ position: 'absolute', top: 8, left: 8, background: '#2563eb', color: '#fff', fontSize: 10, fontWeight: 700, padding: '2px 8px', borderRadius: 20 }}>MỚI</div>
                                    <div className="book-card__image-wrap">
                                        <img
                                            src={book.image || book.cover_image || 'https://placehold.co/400x600/e8e8e3/424842?text=S%C3%A1ch'}
                                            alt={`Bìa sách ${book.title}`}
                                            loading="lazy"
                                        />
                                        {book.discount_price && book.discount_price < book.price && (
                                            <span className="book-card__badge">SALE</span>
                                        )}
                                    </div>
                                    <h3 className="book-card__title" title={book.title}>{book.title}</h3>
                                    <p className="book-card__author">{book.category?.category_name || '—'}</p>
                                    <div className="book-card__footer">
                                        <span className="book-price">{formatPrice(book.discount_price || book.price)}</span>
                                        <button
                                            type="button"
                                            className="cart-btn"
                                            aria-label={`Thêm ${book.title} vào giỏ`}
                                            onClick={(e) => handleAddToCart(e, book)}
                                        >
                                            <IconCart />
                                        </button>
                                    </div>
                                </article>
                            ))}
                        </div>
                    )}
                </div>
            </section>
        </SiteLayout>
    );
}
