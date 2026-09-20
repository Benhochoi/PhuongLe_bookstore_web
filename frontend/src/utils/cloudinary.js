// Tiện ích nhúng Cloudinary Upload Widget vào form React (không cần backend xử lý upload).
// Cần khai báo 2 biến môi trường trong file .env ở thư mục frontend:
//   VITE_CLOUDINARY_CLOUD_NAME=...
//   VITE_CLOUDINARY_UPLOAD_PRESET=...

let widgetScriptPromise = null;

function loadCloudinaryScript() {
    if (widgetScriptPromise) return widgetScriptPromise;

    widgetScriptPromise = new Promise((resolve, reject) => {
        if (window.cloudinary) {
            resolve();
            return;
        }
        const script = document.createElement('script');
        script.src = 'https://widget.cloudinary.com/v2.0/global/all.js';
        script.async = true;
        script.onload = () => resolve();
        script.onerror = () => reject(new Error('Không tải được Cloudinary widget. Kiểm tra kết nối mạng.'));
        document.body.appendChild(script);
    });

    return widgetScriptPromise;
}

/**
 * Mở popup upload ảnh của Cloudinary.
 * Trả về secure_url (string) nếu upload thành công,
 * hoặc null nếu người dùng đóng popup mà không upload.
 */
export async function openCloudinaryUploadWidget() {
    const cloudName = import.meta.env.VITE_CLOUDINARY_CLOUD_NAME;
    const uploadPreset = import.meta.env.VITE_CLOUDINARY_UPLOAD_PRESET;

    if (!cloudName || !uploadPreset) {
        throw new Error(
            'Chưa cấu hình Cloudinary. Thêm VITE_CLOUDINARY_CLOUD_NAME và VITE_CLOUDINARY_UPLOAD_PRESET vào file .env rồi restart npm run dev.'
        );
    }

    await loadCloudinaryScript();

    return new Promise((resolve, reject) => {
        const widget = window.cloudinary.createUploadWidget(
            {
                cloudName,
                uploadPreset,
                sources: ['local', 'url', 'camera'],
                multiple: false,
                maxFileSize: 5_000_000, // 5MB
                folder: 'phuonglebookstore/books',
                language: 'vi',
            },
            (error, result) => {
                if (error) {
                    reject(error);
                    return;
                }
                if (result.event === 'success') {
                    resolve(result.info.secure_url);
                } else if (result.event === 'close') {
                    resolve(null); // người dùng đóng popup, không phải lỗi
                }
            }
        );
        widget.open();
    });
}
