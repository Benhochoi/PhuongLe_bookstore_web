/**
 * AboutDropdown — Dropdown "Về Chúng Tôi" dùng chung ở tất cả header.
 * Nhận props: open, onToggle, onClose
 */
import { Link } from 'react-router-dom';

const ABOUT_ITEMS = [
    { icon: '🏪', label: 'Giới thiệu',            to: '/gioi-thieu' },
    { icon: '🚚', label: 'Chính sách vận chuyển', to: '/chinh-sach-van-chuyen' },
    { icon: '🔒', label: 'Chính sách bảo mật',    to: '/chinh-sach-bao-mat' },
];

export default function AboutDropdown({ open, onToggle, onClose, dropRef }) {
    return (
        <div
            className={`nav-dropdown${open ? ' open' : ''}`}
            ref={dropRef}
        >
            <button
                className="nav-dropdown__trigger"
                onClick={onToggle}
                aria-expanded={open}
                aria-haspopup="true"
            >
                Về chúng tôi
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" className="nav-dropdown__arrow">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </button>
            <div className="nav-dropdown__menu" role="menu">
                {ABOUT_ITEMS.map(item => (
                    <Link
                        key={item.to}
                        to={item.to}
                        className="nav-dropdown__item"
                        role="menuitem"
                        onClick={onClose}
                    >
                        <span className="nav-dropdown__icon">{item.icon}</span>
                        <span>{item.label}</span>
                    </Link>
                ))}
            </div>
        </div>
    );
}
