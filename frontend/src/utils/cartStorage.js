const CART_KEY = 'phuongle_cart';

export function getCart() {
    try {
        return JSON.parse(localStorage.getItem(CART_KEY)) || [];
    } catch {
        return [];
    }
}

export function saveCart(items) {
    localStorage.setItem(CART_KEY, JSON.stringify(items));
    window.dispatchEvent(new Event('cart-updated'));
}

export function getCartCount() {
    return getCart().reduce((sum, item) => sum + (item.qty || item.quantity || 1), 0);
}

/** Thêm sách vào giỏ. Nếu đã có thì tăng số lượng. */
export function addToCart(book, qty = 1) {
    const cart = getCart();
    const idx = cart.findIndex((i) => i.book_id === book.book_id);
    if (idx >= 0) {
        cart[idx].qty = Math.min((cart[idx].qty || 1) + qty, 99);
    } else {
        cart.push({
            book_id: book.book_id,
            title: book.title,
            slug: book.slug,
            image: book.image,
            price: parseFloat(book.discount_price || book.price),
            original_price: book.discount_price ? parseFloat(book.price) : null,
            author: book.authors?.[0]?.author_name || book.author || '',
            qty,
        });
    }
    saveCart(cart);
    return getCartCount();
}
