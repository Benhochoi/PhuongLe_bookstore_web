import { useState, useEffect, useCallback, useRef } from 'react';
import AdminLayout from '../../layouts/AdminLayout';
import {
    getAdminOrders,
    getAdminOrderDetail,
    updateAdminOrderStatus,
    getAdminOrderStats,
} from '../../services/adminOrderService';

/* ── helpers ── */
const fmtPrice = (n) =>
    new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(Number(n) || 0);

const fmtDate = (d) => (d ? new Date(d).toLocaleDateString('vi-VN') : '—');
const fmtDateTime = (d) => (d ? new Date(d).toLocaleString('vi-VN') : '—');

const STATUS_META = {
    pending:   { label: 'Chờ xác nhận', tone: 'amber' },
    confirmed: { label: 'Đã xác nhận',  tone: 'blue' },
    shipping:  { label: 'Đang giao',    tone: 'violet' },
    completed: { label: 'Hoàn thành',   tone: 'green' },
    cancelled: { label: 'Đã hủy',       tone: 'red' },
};

const STATUS_OPTIONS = Object.entries(STATUS_META).map(([value, m]) => ({ value, label: m.label }));
const FILTER_OPTIONS = [{ value: 'all', label: 'Tất cả trạng thái' }, ...STATUS_OPTIONS];
const LOCKED_STATUSES = ['completed', 'cancelled'];

function StatusBadge({ status }) {
    const meta = STATUS_META[status] || { label: status, tone: 'gray' };
    return <span className={`admin-badge admin-badge--${meta.tone}`}>{meta.label}</span>;
}

/* ── INLINE STATUS DROPDOWN (đổi trạng thái nhanh ngay trong bảng) ── */
function InlineStatusSelect({ order, onUpdated }) {
    const [open, setOpen] = useState(false);
    const [saving, setSaving] = useState(false);
    const [error, setError] = useState('');
    const ref = useRef(null);

    const locked = LOCKED_STATUSES.includes(order.order_status);
    const meta = STATUS_META[order.order_status] || { label: order.order_status, tone: 'gray' };

    useEffect(() => {
        if (!open) return;
        const handler = (e) => {
            if (ref.current && !ref.current.contains(e.target)) setOpen(false);
        };
        document.addEventListener('mousedown', handler);
        return () => document.removeEventListener('mousedown', handler);
    }, [open]);

    const handlePick = async (newStatus) => {
        setOpen(false);
        if (newStatus === order.order_status) return;
        setSaving(true);
        setError('');
        try {
            const res = await updateAdminOrderStatus(order.order_id, newStatus);
            onUpdated(res.data);
        } catch (err) {
            setError(err.response?.data?.message || 'Cập nhật thất bại');
            setTimeout(() => setError(''), 3000);
        } finally {
            setSaving(false);
        }
    };

    return (
        <div className="admin-status-select" ref={ref}>
            <button
                type="button"
                className={`admin-badge admin-badge--${meta.tone} admin-badge--btn`}
                onClick={() => !locked && !saving && setOpen(p => !p)}
                disabled={locked || saving}
            >
                {saving ? 'Đang lưu...' : meta.label}
                {!locked && (
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="3">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                )}
            </button>

            {open && (
                <div className="admin-status-select__menu">
                    {STATUS_OPTIONS.map(o => (
                        <button
                            key={o.value}
                            type="button"
                            className={`admin-status-select__option${o.value === order.order_status ? ' current' : ''}`}
                            onClick={() => handlePick(o.value)}
                        >
                            <span className={`admin-badge admin-badge--${STATUS_META[o.value].tone}`}>{o.label}</span>
                        </button>
                    ))}
                </div>
            )}
            {error && <span className="admin-status-select__error">{error}</span>}
        </div>
    );
}

/* ── STATS ROW ── */
function StatsRow({ stats }) {
    const cards = [
        { label: 'Doanh thu (đơn hoàn thành)', value: fmtPrice(stats.total_revenue), icon: '💰' },
        { label: 'Tổng số đơn hàng', value: stats.total_orders ?? 0, icon: '📦' },
        { label: 'Chờ xác nhận', value: stats.by_status?.pending ?? 0, icon: '⏳', tone: 'amber' },
        { label: 'Doanh thu hôm nay', value: fmtPrice(stats.today_revenue), icon: '📈' },
    ];
    return (
        <div className="admin-stats-row">
            {cards.map(c => (
                <div key={c.label} className={`admin-stat-card${c.tone ? ` admin-stat-card--${c.tone}` : ''}`}>
                    <span className="admin-stat-card__icon">{c.icon}</span>
                    <div>
                        <div className="admin-stat-card__value">{c.value}</div>
                        <div className="admin-stat-card__label">{c.label}</div>
                    </div>
                </div>
            ))}
        </div>
    );
}

/* ── DETAIL DRAWER ── */
function OrderDrawer({ orderId, onClose, onStatusUpdated }) {
    const [order, setOrder] = useState(null);
    const [loadingDetail, setLoadingDetail] = useState(true);
    const [nextStatus, setNextStatus] = useState('');
    const [saving, setSaving] = useState(false);
    const [error, setError] = useState('');

    useEffect(() => {
        let alive = true;
        setLoadingDetail(true);
        setError('');
        getAdminOrderDetail(orderId)
            .then(res => {
                if (!alive) return;
                setOrder(res.data);
                setNextStatus(res.data.order_status);
            })
            .catch(() => alive && setError('Không tải được chi tiết đơn hàng.'))
            .finally(() => alive && setLoadingDetail(false));
        return () => { alive = false; };
    }, [orderId]);

    const handleSaveStatus = async () => {
        if (!order || nextStatus === order.order_status) return;
        setSaving(true);
        setError('');
        try {
            const res = await updateAdminOrderStatus(order.order_id, nextStatus);
            setOrder(res.data);
            onStatusUpdated(res.data);
        } catch (err) {
            setError(err.response?.data?.message || 'Cập nhật trạng thái thất bại.');
        } finally {
            setSaving(false);
        }
    };

    const locked = order && LOCKED_STATUSES.includes(order.order_status);

    return (
        <div className="admin-drawer-overlay" onClick={onClose}>
            <div className="admin-drawer" onClick={e => e.stopPropagation()}>
                <div className="admin-drawer__header">
                    <h2>Chi tiết đơn hàng</h2>
                    <button type="button" className="admin-drawer__close" onClick={onClose} aria-label="Đóng">✕</button>
                </div>

                {loadingDetail ? (
                    <div className="admin-drawer__loading">Đang tải...</div>
                ) : !order ? (
                    <div className="admin-drawer__loading">{error || 'Không có dữ liệu.'}</div>
                ) : (
                    <div className="admin-drawer__body">
                        <div className="admin-drawer__row">
                            <span className="admin-drawer__code">#{order.order_code}</span>
                            <StatusBadge status={order.order_status} />
                        </div>
                        <p className="admin-drawer__meta">Đặt lúc {fmtDateTime(order.created_at)}</p>

                        <section className="admin-drawer__section">
                            <h3>Khách hàng</h3>
                            <p><strong>{order.user?.full_name || order.receiver_name || 'Không rõ'}</strong> · {order.user?.phone || order.receiver_phone || '—'}</p>
                            <p>{order.shipping_address || order.user?.address || 'Chưa có địa chỉ'}</p>
                            {order.note && <p className="admin-drawer__note">Ghi chú: {order.note}</p>}
                            {order.user?.email && <p>{order.user.email}</p>}
                        </section>

                        {(order.confirmer || order.shipper) && (
                            <section className="admin-drawer__section">
                                <h3>Thông tin xử lý</h3>
                                {order.confirmer && (
                                    <p><strong>Người xác nhận:</strong> {order.confirmer.full_name || order.confirmer.username} ({order.confirmer.phone || 'Không có SĐT'})</p>
                                )}
                                {order.shipper && (
                                    <p><strong>Người giao hàng:</strong> {order.shipper.full_name || order.shipper.username} ({order.shipper.phone || 'Không có SĐT'})</p>
                                )}
                            </section>
                        )}

                        <section className="admin-drawer__section">
                            <h3>Sản phẩm</h3>
                            <div className="admin-drawer__items">
                                {(order.items || []).map(item => (
                                    <div key={item.order_item_id} className="admin-drawer__item">
                                        {item.book?.image && (
                                            <img src={item.book.image} alt={item.book.title} />
                                        )}
                                        <div className="admin-drawer__item-info">
                                            <p>{item.book?.title || 'Sách'}</p>
                                            <span>SL: {item.quantity} × {fmtPrice(item.unit_price)}</span>
                                        </div>
                                        <span className="admin-drawer__item-total">
                                            {fmtPrice(item.quantity * item.unit_price)}
                                        </span>
                                    </div>
                                ))}
                            </div>
                        </section>

                        <section className="admin-drawer__section admin-drawer__totals">
                            <div><span>Tạm tính</span><span>{fmtPrice(order.total_amount)}</span></div>
                            <div><span>Phí vận chuyển</span><span>{fmtPrice(order.shipping_fee)}</span></div>
                            <div className="admin-drawer__totals-final">
                                <span>Thành tiền</span><span>{fmtPrice(order.final_amount)}</span>
                            </div>
                        </section>

                        <section className="admin-drawer__section">
                            <h3>Cập nhật trạng thái</h3>
                            {locked ? (
                                <p className="admin-drawer__locked">
                                    Đơn hàng {order.order_status === 'completed' ? 'đã hoàn thành' : 'đã bị hủy'} — không thể thay đổi thêm.
                                </p>
                            ) : (
                                <div className="admin-drawer__status-form">
                                    <select value={nextStatus} onChange={e => setNextStatus(e.target.value)}>
                                        {STATUS_OPTIONS.map(o => (
                                            <option key={o.value} value={o.value}>{o.label}</option>
                                        ))}
                                    </select>
                                    <button
                                        type="button"
                                        className="admin-btn admin-btn--primary"
                                        disabled={saving || nextStatus === order.order_status}
                                        onClick={handleSaveStatus}
                                    >
                                        {saving ? 'Đang lưu...' : 'Lưu thay đổi'}
                                    </button>
                                </div>
                            )}
                            {error && <p className="admin-drawer__error">{error}</p>}
                        </section>
                    </div>
                )}
            </div>
        </div>
    );
}

/* ── MAIN PAGE ── */
export default function AdminOrdersPage() {
    const [orders, setOrders] = useState([]);
    const [meta, setMeta] = useState({ total: 0, current_page: 1, last_page: 1 });
    const [stats, setStats] = useState({ total_revenue: 0, total_orders: 0, today_revenue: 0, today_orders: 0, by_status: {} });
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    const [status, setStatus] = useState('all');
    const [searchInput, setSearchInput] = useState('');
    const [search, setSearch] = useState('');
    const [page, setPage] = useState(1);
    const [selectedOrderId, setSelectedOrderId] = useState(null);

    const debounceRef = useRef(null);

    /* Debounce search input → search state */
    useEffect(() => {
        if (debounceRef.current) clearTimeout(debounceRef.current);
        debounceRef.current = setTimeout(() => {
            setSearch(searchInput.trim());
            setPage(1);
        }, 400);
        return () => clearTimeout(debounceRef.current);
    }, [searchInput]);

    const loadOrders = useCallback(async () => {
        setLoading(true);
        setError('');
        try {
            const res = await getAdminOrders({ status, search: search || undefined, page, per_page: 10 });
            setOrders(res.data || []);
            setMeta(res.meta || { total: 0, current_page: 1, last_page: 1 });
        } catch {
            setError('Không tải được danh sách đơn hàng.');
        } finally {
            setLoading(false);
        }
    }, [status, search, page]);

    const loadStats = useCallback(async () => {
        try {
            const res = await getAdminOrderStats();
            setStats(res);
        } catch { /* silent — stats không quan trọng bằng danh sách */ }
    }, []);

    useEffect(() => { loadOrders(); }, [loadOrders]);
    useEffect(() => { loadStats(); }, [loadStats]);

    const handleStatusUpdated = (updatedOrder) => {
        setOrders(prev => prev.map(o => o.order_id === updatedOrder.order_id ? { ...o, order_status: updatedOrder.order_status } : o));
        loadStats();
    };

    return (
        <AdminLayout title="Quản lý đơn hàng" subtitle="Theo dõi, xử lý và cập nhật trạng thái toàn bộ đơn hàng của cửa hàng">
            <StatsRow stats={stats} />

            <div className="admin-panel">
                <div className="admin-toolbar">
                    <div className="admin-toolbar__filters">
                        <select value={status} onChange={e => { setStatus(e.target.value); setPage(1); }}>
                            {FILTER_OPTIONS.map(o => (
                                <option key={o.value} value={o.value}>{o.label}</option>
                            ))}
                        </select>
                        <input
                            type="text"
                            placeholder="Tìm theo mã đơn, tên hoặc SĐT khách hàng..."
                            value={searchInput}
                            onChange={e => setSearchInput(e.target.value)}
                        />
                    </div>
                    <button type="button" className="admin-btn" onClick={() => { loadOrders(); loadStats(); }}>
                        ⟳ Làm mới
                    </button>
                </div>

                {loading ? (
                    <div className="admin-empty">Đang tải danh sách đơn hàng...</div>
                ) : error ? (
                    <div className="admin-empty admin-empty--error">{error}</div>
                ) : orders.length === 0 ? (
                    <div className="admin-empty">
                        <div className="admin-empty__icon">📦</div>
                        <p>Không có đơn hàng nào khớp với bộ lọc hiện tại.</p>
                    </div>
                ) : (
                    <>
                        <div className="admin-table-wrap">
                            <table className="admin-table">
                                <thead>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Khách hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {orders.map(order => (
                                        <tr key={order.order_id}>
                                            <td className="admin-table__code">#{order.order_code}</td>
                                            <td>
                                                <div>{order.user?.full_name || order.receiver_name || '—'}</div>
                                                <span className="admin-table__muted">{order.user?.phone || order.receiver_phone || ''}</span>
                                            </td>
                                            <td>{fmtDate(order.created_at)}</td>
                                            <td className="admin-table__price">{fmtPrice(order.final_amount)}</td>
                                            <td>
                                                <InlineStatusSelect order={order} onUpdated={handleStatusUpdated} />
                                            </td>
                                            <td>
                                                <button
                                                    type="button"
                                                    className="admin-btn admin-btn--ghost"
                                                    onClick={() => setSelectedOrderId(order.order_id)}
                                                >
                                                    Xem chi tiết
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>

                        {meta.last_page > 1 && (
                            <div className="admin-pagination">
                                <button
                                    type="button"
                                    disabled={meta.current_page <= 1}
                                    onClick={() => setPage(p => Math.max(1, p - 1))}
                                >
                                    ‹ Trước
                                </button>
                                <span>Trang {meta.current_page} / {meta.last_page} — {meta.total} đơn</span>
                                <button
                                    type="button"
                                    disabled={meta.current_page >= meta.last_page}
                                    onClick={() => setPage(p => Math.min(meta.last_page, p + 1))}
                                >
                                    Sau ›
                                </button>
                            </div>
                        )}
                    </>
                )}
            </div>

            {selectedOrderId && (
                <OrderDrawer
                    orderId={selectedOrderId}
                    onClose={() => setSelectedOrderId(null)}
                    onStatusUpdated={handleStatusUpdated}
                />
            )}
        </AdminLayout>
    );
}