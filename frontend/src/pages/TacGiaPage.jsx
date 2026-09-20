import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import SiteLayout from '../layouts/SiteLayout';

export default function TacGiaPage() {
    const [authors, setAuthors] = useState([]);
    const [loading, setLoading] = useState(true);
    const [search, setSearch] = useState('');
    const navigate = useNavigate();

    useEffect(() => {
        axios.get('/api/authors')
            .then(res => {
                const list = res.data?.data || res.data || [];
                setAuthors(Array.isArray(list) ? list : []);
            })
            .catch(() => setAuthors([]))
            .finally(() => setLoading(false));
    }, []);

    const filtered = authors.filter(a =>
        (a.author_name || a.name || '').toLowerCase().includes(search.toLowerCase())
    );

    // Nhóm theo chữ cái đầu
    const grouped = filtered.reduce((acc, author) => {
        const name = author.author_name || author.name || '?';
        const letter = name[0].toUpperCase();
        if (!acc[letter]) acc[letter] = [];
        acc[letter].push(author);
        return acc;
    }, {});
    const letters = Object.keys(grouped).sort();

    const handleAuthorClick = (name) => {
        navigate(`/van-hoc?search=${encodeURIComponent(name)}`);
    };

    return (
        <SiteLayout>
            <section className="hero" style={{ minHeight: 220 }}>
                <div className="hero__bg" style={{ backgroundImage: "url('https://placehold.co/1600x400/dadad5/424842?text=PhuongLebookstore')" }} />
                <div className="hero__overlay" />
                <div className="hero__content">
                    <div className="hero__inner">
                        <span className="hero__eyebrow">Khám phá</span>
                        <h1 className="hero__title" style={{ fontSize: '2.2rem' }}>Tác Giả</h1>
                        <p className="hero__subtitle">{authors.length} tác giả có mặt tại PhuongLebookstore</p>
                    </div>
                </div>
            </section>

            <section className="section section--alt">
                <div className="container">
                    {/* Search */}
                    <div style={{ marginBottom: 32, maxWidth: 480 }}>
                        <form className="search-box" style={{ background: '#fff' }} onSubmit={e => e.preventDefault()}>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                                <circle cx="11" cy="11" r="7" /><line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>
                            <input
                                type="text"
                                value={search}
                                onChange={e => setSearch(e.target.value)}
                                placeholder="Tìm kiếm tác giả..."
                            />
                        </form>
                    </div>

                    {loading ? (
                        <p className="section-subtitle">Đang tải...</p>
                    ) : filtered.length === 0 ? (
                        <p className="section-subtitle">Không tìm thấy tác giả nào.</p>
                    ) : (
                        letters.map(letter => (
                            <div key={letter} style={{ marginBottom: 32 }}>
                                <div style={{ fontSize: 24, fontWeight: 800, color: '#5a4a3a', paddingBottom: 8, borderBottom: '2px solid #e8e2d9', marginBottom: 16 }}>{letter}</div>
                                <div style={{ display: 'flex', flexWrap: 'wrap', gap: 10 }}>
                                    {grouped[letter].map(author => {
                                        const name = author.author_name || author.name;
                                        const id = author.author_id || author.id;
                                        return (
                                            <button
                                                key={id}
                                                onClick={() => handleAuthorClick(name)}
                                                style={{
                                                    display: 'flex', alignItems: 'center', gap: 8,
                                                    padding: '8px 16px', background: '#fff',
                                                    border: '1px solid #e8e2d9', borderRadius: 30,
                                                    color: '#2c2c2c', fontSize: 14, fontWeight: 500,
                                                    cursor: 'pointer', transition: 'all .15s',
                                                    fontFamily: 'inherit',
                                                }}
                                                onMouseEnter={e => { e.currentTarget.style.background = '#f5ede0'; e.currentTarget.style.borderColor = '#c0a080'; }}
                                                onMouseLeave={e => { e.currentTarget.style.background = '#fff'; e.currentTarget.style.borderColor = '#e8e2d9'; }}
                                            >
                                                <span style={{ width: 28, height: 28, background: '#f5ede0', borderRadius: '50%', display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: 12, fontWeight: 700, color: '#7a5c3d', flexShrink: 0 }}>
                                                    {name[0].toUpperCase()}
                                                </span>
                                                {name}
                                            </button>
                                        );
                                    })}
                                </div>
                            </div>
                        ))
                    )}
                </div>
            </section>
        </SiteLayout>
    );
}
