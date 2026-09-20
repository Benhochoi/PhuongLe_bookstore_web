import { useEffect, useState, useRef } from 'react';
import { Link, useLocation, useNavigate } from 'react-router-dom';
import axios from 'axios';
import { useAuth } from '../context/AuthContext';
import '../styles/style.css';
import AboutDropdown from '../components/AboutDropdown';

const formatPrice = (value) => {
    const numericValue = Number(value) || 0;
    return `${numericValue.toLocaleString('vi-VN')}đ`;
};

export default function ProductListPage() {
    const location = useLocation();
    const queryParams = new URLSearchParams(location.search);
    // categoryId lấy từ query string ?category=... để lọc sản phẩm theo danh mục.
    const categoryId = queryParams.get('category');

    const navigate = useNavigate();
    // State chứa danh sách sản phẩm và thông tin danh mục đang hiển thị.
    const [products, setProducts] = useState([]);
    const [categoryName, setCategoryName] = useState('Tất cả sản phẩm');
    const [loading, setLoading] = useState(true);
    const [searchTerm, setSearchTerm] = useState('');
    const [cartCount] = useState(0);
    const [aboutOpen, setAboutOpen] = useState(false);
    const aboutRef = useRef(null);

    // Lấy auth state để hiển thị tên người dùng ở header khi đã đăng nhập.
    const { accessToken, user } = useAuth();

    const accountLabel = accessToken ? (user?.full_name || user?.username || 'Tài khoản') : 'Đăng nhập';

    useEffect(() => {
        const handler = (e) => {
            if (aboutRef.current && !aboutRef.current.contains(e.target)) setAboutOpen(false);
        };
        document.addEventListener('mousedown', handler);
        return () => document.removeEventListener('mousedown', handler);
    }, []);

    useEffect(() => {
        setLoading(true);

        Promise.all([
            axios.get('/api/categories'),
            categoryId ? axios.get(`/api/categories/${categoryId}/books`) : axios.get('/api/books')
        ])
            .then(([categoriesRes, booksRes]) => {
                const categoryList = Array.isArray(categoriesRes.data)
                    ? categoriesRes.data
                    : (categoriesRes.data?.data ?? []);

                const selectedCategory = categoryList.find((item) => String(item.category_id) === String(categoryId));
                if (selectedCategory) {
                    setCategoryName(selectedCategory.category_name || selectedCategory.name || 'Danh mục');
                } else if (!categoryId) {
                    setCategoryName('Tất cả sản phẩm');
                } else {
                    setCategoryName('Danh mục');
                }

                const bookList = Array.isArray(booksRes.data?.data)
                    ? booksRes.data.data
                    : (Array.isArray(booksRes.data) ? booksRes.data : []);

                setProducts(bookList);
            })
            .catch((err) => {
                console.error('Lỗi tải danh sách sản phẩm:', err);
                setProducts([]);
                setCategoryName(categoryId ? 'Danh mục' : 'Tất cả sản phẩm');
            })
            .finally(() => setLoading(false));
    }, [categoryId]);

    const handleSearchSubmit = (e) => {
        e.preventDefault();
        navigate(`/products?search=${encodeURIComponent(searchTerm)}`);
    };

    return (
        <div>
            <header className="site-header">
                <div className="site-header__inner">
                    <Link to="/" className="brand">PhuongLebookstore</Link>

                    <nav className="site-nav">
                        <Link to="/#bestsellers">Bán chạy</Link>
                        <AboutDropdown
                            open={aboutOpen}
                            onToggle={() => setAboutOpen(prev => !prev)}
                            onClose={() => setAboutOpen(false)}
                            dropRef={aboutRef}
                        />
                    </nav>

                    <div className="header-actions">
                        <form className="search-box" onSubmit={handleSearchSubmit}>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                <circle cx="11" cy="11" r="7" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>
                            <input
                                type="text"
                                value={searchTerm}
                                onChange={(e) => setSearchTerm(e.target.value)}
                                placeholder="Tìm kiếm sách, tác giả..."
                            />
                        </form>

                        <Link to={accessToken ? '/dashboard' : '/login'} className="account-link" aria-label="Tài khoản">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 20c0-4 4-6 8-6s8 2 8 6" />
                            </svg>
                            <span className="account-link__label">{accountLabel}</span>
                        </Link>

                        <Link to="/cart" className="icon-btn" aria-label="Giỏ hàng">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                <circle cx="9" cy="21" r="1" />
                                <circle cx="20" cy="21" r="1" />
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                            </svg>
                            {cartCount > 0 && <span className="cart-badge">{cartCount}</span>}
                        </Link>
                    </div>
                </div>
            </header>

            <main className="container" style={{ padding: '2rem 0 3rem' }}>
                <div className="section-header">
                    <div>
                        <h2 className="section-title">{categoryName}</h2>
                        <p className="section-subtitle">
                            {categoryId ? 'Danh sách sách thuộc danh mục đã chọn' : 'Danh sách tất cả sản phẩm có sẵn'}
                        </p>
                    </div>
                    <Link to="/" className="see-all-link">← Quay lại</Link>
                </div>

                {loading ? (
                    <p className="section-subtitle">Đang tải sản phẩm...</p>
                ) : products.length === 0 ? (
                    <p className="section-subtitle">Không có sản phẩm nào thuộc danh mục này</p>
                ) : (
                    <div className="book-grid">
                        {products.map((book) => (
                            <Link key={book.book_id || book.id || book.slug} to={`/books/${book.slug || book.book_id}`} className="book-card">
                                <div className="book-card__image-wrap">
                                    <img
                                        src={book.image || 'https://placehold.co/400x600/e8e8e3/424842?text=S%C3%A1ch'}
                                        alt={`Bìa sách ${book.title || 'Sách'}`}
                                        loading="lazy"
                                    />
                                </div>
                                <h3 className="book-card__title" title={book.title}>{book.title || 'Sách chưa có tên'}</h3>
                                <p className="book-card__author">{book.category?.category_name || 'Danh mục chưa cập nhật'}</p>
                                <div className="book-card__footer">
                                    <span className="book-price">{formatPrice(book.discount_price || book.price)}</span>
                                </div>
                            </Link>
                        ))}
                    </div>
                )}
            </main>

            <footer className="site-footer" style={{ marginTop: '2rem' }}>
                <div className="container footer-top">
                    <div className="footer-brand">
                        <Link to="/" className="brand">PhuongLebookstore</Link>
                        <p>Kiến tạo không gian tri thức hiện đại, kết nối những tâm hồn yêu sách trên khắp mọi miền.</p>
                    </div>
                    <div className="footer-links">
                        <div className="footer-col">
                            <h4>Về chúng tôi</h4>
                            <Link to="/gioi-thieu">Giới thiệu</Link>
                            <Link to="/chinh-sach-van-chuyen">Chính sách vận chuyển</Link>
                            <Link to="/chinh-sach-bao-mat">Chính sách bảo mật</Link>
                        </div>
                        <div className="footer-col">
                            <h4>Khám phá</h4>
                            <a href="/#bestsellers">Sách bán chạy</a>
                            <Link to="/sach-moi">Sách mới</Link>
                            <Link to="/tac-gia">Tác giả</Link>
                        </div>
                        <div className="footer-col">
                            <h4>Hỗ trợ</h4>
                            <Link to="/lien-he">Liên hệ hỗ trợ</Link>
                            <Link to="/cau-hoi-thuong-gap">Câu hỏi thường gặp</Link>
                            <Link to="/doi-tra">Đổi trả</Link>
                        </div>
                    </div>
                </div>
                <div className="footer-bottom">
                    <div className="container">
                        <p>© {new Date().getFullYear()} PhuongLebookstore. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    );
}
