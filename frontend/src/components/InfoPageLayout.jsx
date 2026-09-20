/**
 * InfoPageLayout — Layout chung cho các trang thông tin tĩnh
 * Bao gồm header đơn giản với back button và breadcrumb, nội dung truyền qua children.
 */
import { Link } from 'react-router-dom';
import '../styles/style.css';

export default function InfoPageLayout({ title, breadcrumb, children }) {
    return (
        <div style={{ minHeight: '100vh', background: '#faf9f6', fontFamily: 'var(--font-body, Georgia, serif)' }}>
            {/* Header mini */}
            <header style={{
                background: '#fff',
                borderBottom: '1px solid #e8e2d9',
                padding: '14px 0',
                position: 'sticky',
                top: 0,
                zIndex: 100,
            }}>
                <div style={{ maxWidth: 860, margin: '0 auto', padding: '0 24px', display: 'flex', alignItems: 'center', gap: 16 }}>
                    <Link to="/" style={{ fontWeight: 700, fontSize: 17, color: '#2c2c2c', textDecoration: 'none', letterSpacing: '-0.5px' }}>
                        PhuongLebookstore
                    </Link>
                    <span style={{ color: '#ccc' }}>›</span>
                    <span style={{ color: '#888', fontSize: 14 }}>{breadcrumb || title}</span>
                    <span style={{ marginLeft: 'auto' }}>
                        <Link to="/" style={{
                            fontSize: 13,
                            color: '#7a6a55',
                            textDecoration: 'none',
                            padding: '5px 14px',
                            border: '1px solid #d4c9bb',
                            borderRadius: 20,
                            display: 'inline-block',
                        }}>← Trang chủ</Link>
                    </span>
                </div>
            </header>

            {/* Hero banner */}
            <div style={{
                background: 'linear-gradient(135deg, #3d2b1f 0%, #7a5c3d 100%)',
                color: '#fff',
                textAlign: 'center',
                padding: '52px 24px 44px',
            }}>
                <h1 style={{ margin: 0, fontSize: 32, fontWeight: 700, letterSpacing: '-0.5px' }}>{title}</h1>
            </div>

            {/* Content */}
            <main style={{ maxWidth: 820, margin: '0 auto', padding: '48px 24px 80px' }}>
                {children}
            </main>

            {/* Footer mini */}
            <footer style={{
                background: '#2c2c2c',
                color: '#aaa',
                textAlign: 'center',
                padding: '20px',
                fontSize: 13,
            }}>
                <p style={{ margin: 0 }}>© {new Date().getFullYear()} PhuongLebookstore. All rights reserved.</p>
            </footer>
        </div>
    );
}
