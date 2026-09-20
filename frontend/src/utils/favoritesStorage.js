const FAV_KEY = 'phuongle_favorites';

export function getFavorites() {
    try {
        return JSON.parse(localStorage.getItem(FAV_KEY)) || [];
    } catch {
        return [];
    }
}

export function saveFavorites(items) {
    localStorage.setItem(FAV_KEY, JSON.stringify(items));
    window.dispatchEvent(new Event('favorites-updated'));
}

export function toggleFavorite(book) {
    const favorites = getFavorites();
    const idx = favorites.findIndex((i) => i.book_id === book.book_id);
    if (idx >= 0) {
        favorites.splice(idx, 1);
    } else {
        favorites.push({
            book_id: book.book_id,
            title: book.title,
            slug: book.slug,
            image: book.image,
            price: parseFloat(book.discount_price || book.price),
            author: book.authors?.[0]?.author_name || book.author || '',
            added_at: new Date().toISOString(),
        });
    }
    saveFavorites(favorites);
    return favorites;
}

export function isFavorite(bookId) {
    return getFavorites().some((i) => i.book_id === bookId);
}
