<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VanhocSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // CATEGORY
        $categoryId = DB::table('categories')->insertGetId([
            'category_name' => 'Van Hoc',
            'description'   => 'Sach van hoc trong va ngoai nuoc',
            'status'        => 'active',
        ]);

        // PUBLISHERS
        $publishers = [];
        $publishers['Dân Trí'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Dân Trí',        ]);
        $publishers['Hà Nội'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Hà Nội',        ]);
        $publishers['Hội Nhà Văn'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Hội Nhà Văn',        ]);
        $publishers['Kim Đồng'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Kim Đồng',        ]);
        $publishers['Lao Động'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Lao Động',        ]);
        $publishers['NXB Kim Đồng'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'NXB Kim Đồng',        ]);
        $publishers['NXB Phụ Nữ Việt Nam'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'NXB Phụ Nữ Việt Nam',        ]);
        $publishers['NXB Thanh Niên'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'NXB Thanh Niên',        ]);
        $publishers['NXB Trẻ'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'NXB Trẻ',        ]);
        $publishers['NXB Văn Học'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'NXB Văn Học',        ]);
        $publishers['Phụ Nữ Việt Nam'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Phụ Nữ Việt Nam',        ]);
        $publishers['Quân Đội Nhân Dân'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Quân Đội Nhân Dân',        ]);
        $publishers['Quân Đội Nhân Nân'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Quân Đội Nhân Nân',        ]);
        $publishers['Thanh Niên'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Thanh Niên',        ]);
        $publishers['Thế Giới'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Thế Giới',        ]);
        $publishers['Trẻ'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Trẻ',        ]);
        $publishers['Tổng Hợp Thành Phố Hồ Chí Minh'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Tổng Hợp Thành Phố Hồ Chí Minh',        ]);
        $publishers['Văn Học'] = DB::table('publishers')->insertGetId([
            'publisher_name' => 'Văn Học',        ]);

        // AUTHORS
        $authors = [];
        $authors['Agatha Christie'] = DB::table('authors')->insertGetId([
            'author_name' => 'Agatha Christie',        ]);
        $authors['Alexandre Dumas'] = DB::table('authors')->insertGetId([
            'author_name' => 'Alexandre Dumas',        ]);
        $authors['Andy Weir'] = DB::table('authors')->insertGetId([
            'author_name' => 'Andy Weir',        ]);
        $authors['Asagiri Kafka'] = DB::table('authors')->insertGetId([
            'author_name' => 'Asagiri Kafka',        ]);
        $authors['Asato Asato'] = DB::table('authors')->insertGetId([
            'author_name' => 'Asato Asato',        ]);
        $authors['Aya Yajima'] = DB::table('authors')->insertGetId([
            'author_name' => 'Aya Yajima',        ]);
        $authors['Azuri Hyuga'] = DB::table('authors')->insertGetId([
            'author_name' => 'Azuri Hyuga',        ]);
        $authors['Barbara Constantine'] = DB::table('authors')->insertGetId([
            'author_name' => 'Barbara Constantine',        ]);
        $authors['Cho Chang-In'] = DB::table('authors')->insertGetId([
            'author_name' => 'Cho Chang-In',        ]);
        $authors['Chu Lai'] = DB::table('authors')->insertGetId([
            'author_name' => 'Chu Lai',        ]);
        $authors['Dan Brown'] = DB::table('authors')->insertGetId([
            'author_name' => 'Dan Brown',        ]);
        $authors['Donato Carrisi'] = DB::table('authors')->insertGetId([
            'author_name' => 'Donato Carrisi',        ]);
        $authors['Doo Vandenis'] = DB::table('authors')->insertGetId([
            'author_name' => 'Doo Vandenis',        ]);
        $authors['Frank Herbert'] = DB::table('authors')->insertGetId([
            'author_name' => 'Frank Herbert',        ]);
        $authors['Fredrik Backman'] = DB::table('authors')->insertGetId([
            'author_name' => 'Fredrik Backman',        ]);
        $authors['Fujiko F Fujio'] = DB::table('authors')->insertGetId([
            'author_name' => 'Fujiko F Fujio',        ]);
        $authors['Gabriel Garcia Márquez'] = DB::table('authors')->insertGetId([
            'author_name' => 'Gabriel Garcia Márquez',        ]);
        $authors['George R.R Martin'] = DB::table('authors')->insertGetId([
            'author_name' => 'George R.R Martin',        ]);
        $authors['Ghost Mikawa'] = DB::table('authors')->insertGetId([
            'author_name' => 'Ghost Mikawa',        ]);
        $authors['Gosho Aoyama'] = DB::table('authors')->insertGetId([
            'author_name' => 'Gosho Aoyama',        ]);
        $authors['H!koro Studio'] = DB::table('authors')->insertGetId([
            'author_name' => 'H!koro Studio',        ]);
        $authors['Harukawa Sango'] = DB::table('authors')->insertGetId([
            'author_name' => 'Harukawa Sango',        ]);
        $authors['Hector Malot'] = DB::table('authors')->insertGetId([
            'author_name' => 'Hector Malot',        ]);
        $authors['Higashino Keigo'] = DB::table('authors')->insertGetId([
            'author_name' => 'Higashino Keigo',        ]);
        $authors['Hiten'] = DB::table('authors')->insertGetId([
            'author_name' => 'Hiten',        ]);
        $authors['Homer'] = DB::table('authors')->insertGetId([
            'author_name' => 'Homer',        ]);
        $authors['Hyuganatsu'] = DB::table('authors')->insertGetId([
            'author_name' => 'Hyuganatsu',        ]);
        $authors['Hồ Chí Minh'] = DB::table('authors')->insertGetId([
            'author_name' => 'Hồ Chí Minh',        ]);
        $authors['I-IV'] = DB::table('authors')->insertGetId([
            'author_name' => 'I-IV',        ]);
        $authors['Isao Murayama'] = DB::table('authors')->insertGetId([
            'author_name' => 'Isao Murayama',        ]);
        $authors['J K Rowling'] = DB::table('authors')->insertGetId([
            'author_name' => 'J K Rowling',        ]);
        $authors['J.K. Rowling'] = DB::table('authors')->insertGetId([
            'author_name' => 'J.K. Rowling',        ]);
        $authors['J.K.Rowling'] = DB::table('authors')->insertGetId([
            'author_name' => 'J.K.Rowling',        ]);
        $authors['J.R.R. Tolkien'] = DB::table('authors')->insertGetId([
            'author_name' => 'J.R.R. Tolkien',        ]);
        $authors['Jeffrey Archer'] = DB::table('authors')->insertGetId([
            'author_name' => 'Jeffrey Archer',        ]);
        $authors['Joe Siple'] = DB::table('authors')->insertGetId([
            'author_name' => 'Joe Siple',        ]);
        $authors['Joses Mauro De Vasconcelos'] = DB::table('authors')->insertGetId([
            'author_name' => 'Joses Mauro De Vasconcelos',        ]);
        $authors['José Mauro de Vasconcelos'] = DB::table('authors')->insertGetId([
            'author_name' => 'José Mauro de Vasconcelos',        ]);
        $authors['Jules Verne'] = DB::table('authors')->insertGetId([
            'author_name' => 'Jules Verne',        ]);
        $authors['Kana Yuki'] = DB::table('authors')->insertGetId([
            'author_name' => 'Kana Yuki',        ]);
        $authors['Kawabata Yasunari'] = DB::table('authors')->insertGetId([
            'author_name' => 'Kawabata Yasunari',        ]);
        $authors['Khaled Hosseini'] = DB::table('authors')->insertGetId([
            'author_name' => 'Khaled Hosseini',        ]);
        $authors['Khương Chi Ngư'] = DB::table('authors')->insertGetId([
            'author_name' => 'Khương Chi Ngư',        ]);
        $authors['Koyoharu Gotouge'] = DB::table('authors')->insertGetId([
            'author_name' => 'Koyoharu Gotouge',        ]);
        $authors['Lam'] = DB::table('authors')->insertGetId([
            'author_name' => 'Lam',        ]);
        $authors['Little Rainbow'] = DB::table('authors')->insertGetId([
            'author_name' => 'Little Rainbow',        ]);
        $authors['Lý Lan'] = DB::table('authors')->insertGetId([
            'author_name' => 'Lý Lan',        ]);
        $authors['Madeline Miller'] = DB::table('authors')->insertGetId([
            'author_name' => 'Madeline Miller',        ]);
        $authors['Mario Puzo'] = DB::table('authors')->insertGetId([
            'author_name' => 'Mario Puzo',        ]);
        $authors['Momoco'] = DB::table('authors')->insertGetId([
            'author_name' => 'Momoco',        ]);
        $authors['Mộc Trầm'] = DB::table('authors')->insertGetId([
            'author_name' => 'Mộc Trầm',        ]);
        $authors['Natsu Hyuuga'] = DB::table('authors')->insertGetId([
            'author_name' => 'Natsu Hyuuga',        ]);
        $authors['Nguyễn Du'] = DB::table('authors')->insertGetId([
            'author_name' => 'Nguyễn Du',        ]);
        $authors['Nguyễn Ngọc Thuần'] = DB::table('authors')->insertGetId([
            'author_name' => 'Nguyễn Ngọc Thuần',        ]);
        $authors['Nguyễn Ngọc Tư'] = DB::table('authors')->insertGetId([
            'author_name' => 'Nguyễn Ngọc Tư',        ]);
        $authors['Nguyễn Nhật Ánh'] = DB::table('authors')->insertGetId([
            'author_name' => 'Nguyễn Nhật Ánh',        ]);
        $authors['Nguyễn Thạch Giang'] = DB::table('authors')->insertGetId([
            'author_name' => 'Nguyễn Thạch Giang',        ]);
        $authors['Nguyễn Văn Thạc'] = DB::table('authors')->insertGetId([
            'author_name' => 'Nguyễn Văn Thạc',        ]);
        $authors['Ngô Thừa Ân'] = DB::table('authors')->insertGetId([
            'author_name' => 'Ngô Thừa Ân',        ]);
        $authors['Nhiều Tác Giả'] = DB::table('authors')->insertGetId([
            'author_name' => 'Nhiều Tác Giả',        ]);
        $authors['Nikolai AOstrovsky'] = DB::table('authors')->insertGetId([
            'author_name' => 'Nikolai AOstrovsky',        ]);
        $authors['Nikolai Alekseyevich Ostrovsky'] = DB::table('authors')->insertGetId([
            'author_name' => 'Nikolai Alekseyevich Ostrovsky',        ]);
        $authors['Oscar Wilde'] = DB::table('authors')->insertGetId([
            'author_name' => 'Oscar Wilde',        ]);
        $authors['Paulo Coelho'] = DB::table('authors')->insertGetId([
            'author_name' => 'Paulo Coelho',        ]);
        $authors['Phùng Quán'] = DB::table('authors')->insertGetId([
            'author_name' => 'Phùng Quán',        ]);
        $authors['Phạm Lữ Ân'] = DB::table('authors')->insertGetId([
            'author_name' => 'Phạm Lữ Ân',        ]);
        $authors['Quất Tử Bất Toan'] = DB::table('authors')->insertGetId([
            'author_name' => 'Quất Tử Bất Toan',        ]);
        $authors['R. F. Kuang'] = DB::table('authors')->insertGetId([
            'author_name' => 'R. F. Kuang',        ]);
        $authors['Satoshi Ito'] = DB::table('authors')->insertGetId([
            'author_name' => 'Satoshi Ito',        ]);
        $authors['Satsuki Nakamura'] = DB::table('authors')->insertGetId([
            'author_name' => 'Satsuki Nakamura',        ]);
        $authors['Shima Mizuki'] = DB::table('authors')->insertGetId([
            'author_name' => 'Shima Mizuki',        ]);
        $authors['Shin Kyung-Sook'] = DB::table('authors')->insertGetId([
            'author_name' => 'Shin Kyung-Sook',        ]);
        $authors['Shirabii'] = DB::table('authors')->insertGetId([
            'author_name' => 'Shirabii',        ]);
        $authors['Sunsunsun'] = DB::table('authors')->insertGetId([
            'author_name' => 'Sunsunsun',        ]);
        $authors['Sơn Tùng'] = DB::table('authors')->insertGetId([
            'author_name' => 'Sơn Tùng',        ]);
        $authors['Takahiro Okura'] = DB::table('authors')->insertGetId([
            'author_name' => 'Takahiro Okura',        ]);
        $authors['Takata'] = DB::table('authors')->insertGetId([
            'author_name' => 'Takata',        ]);
        $authors['Tetsuo Yajima'] = DB::table('authors')->insertGetId([
            'author_name' => 'Tetsuo Yajima',        ]);
        $authors['Thương Thái Vi'] = DB::table('authors')->insertGetId([
            'author_name' => 'Thương Thái Vi',        ]);
        $authors['Thất Anh Tuấn'] = DB::table('authors')->insertGetId([
            'author_name' => 'Thất Anh Tuấn',        ]);
        $authors['Touko Shino'] = DB::table('authors')->insertGetId([
            'author_name' => 'Touko Shino',        ]);
        $authors['Trúc Dĩ'] = DB::table('authors')->insertGetId([
            'author_name' => 'Trúc Dĩ',        ]);
        $authors['Tuế Kiến'] = DB::table('authors')->insertGetId([
            'author_name' => 'Tuế Kiến',        ]);
        $authors['Tố Hữu'] = DB::table('authors')->insertGetId([
            'author_name' => 'Tố Hữu',        ]);
        $authors['Vũ Bằng'] = DB::table('authors')->insertGetId([
            'author_name' => 'Vũ Bằng',        ]);
        $authors['Xuân Đao Hàn'] = DB::table('authors')->insertGetId([
            'author_name' => 'Xuân Đao Hàn',        ]);
        $authors['Yoshichi Shimada'] = DB::table('authors')->insertGetId([
            'author_name' => 'Yoshichi Shimada',        ]);
        $authors['Yukiyo Teramoto'] = DB::table('authors')->insertGetId([
            'author_name' => 'Yukiyo Teramoto',        ]);
        $authors['singNsong'] = DB::table('authors')->insertGetId([
            'author_name' => 'singNsong',        ]);
        $authors['Đinh Hằng'] = DB::table('authors')->insertGetId([
            'author_name' => 'Đinh Hằng',        ]);
        $authors['Đặng Vương Hưng'] = DB::table('authors')->insertGetId([
            'author_name' => 'Đặng Vương Hưng',        ]);
        $authors['Đặng Xuân Hòa'] = DB::table('authors')->insertGetId([
            'author_name' => 'Đặng Xuân Hòa',        ]);

        // BOOKS
        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Lao Động'],
            'isbn'           => '8935250721479',
            'title'          => '86-EIGHTY SIX - Ep.14 - Tô Đen Hết Đi - Bản Đặc Biệt - Tặng Kèm Set 4 Bookmark',
            'slug'           => '86-eighty-six-ep14-to-den-het-di-ban-dac-biet-tang-kem-set-4-bookmark',
            'image'          => '/images/vanhoc/86-eighty-six-ep14-to-den-het-di-ban-dac-biet-tang-kem-set-4-bookmark/1.jpg',
            'price'          => 145000.0,
            'discount_price' => 130500.0,
            'stock_quantity' => 50,
            'page_count'     => '334',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '18 x 13 x 1.6 cm',
            'weight'         => '300',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '86-EIGHTY SIX - Ep.14 - Tô Đen Hết Đi Khủng bố đánh bom tự sát gây rúng động thủ đô, Legion tấn công dữ dội, dân tị nạn gia tăng đột biến, vô vàn suy đoán và hoài nghi khiến hỗn loạn phát sinh. Trong bối cảnh đó, một bộ phận dân Cộng hòa còn tổ chức bạo động vũ trang tại Liên bang. Đang làm nhiệm vụ hỗ trợ rút quân tại tiền tuyến, Lữ đoàn Biệt kích cũng bị điều đi trấn áp. Tuy nhiên, việc Lena còn bị giữ ở hậu phương khiến lòng Shin rối bời. Mặt khác, Yuto dẫn theo nhóm Actaeon gồm Chitori, bước vào “hành trình cuối cùng” tìm về Cộng hòa. Nhận được tin từ họ, Dustin bị giằng xé giữa quá khứ và hiện tại, Ange không khỏi tự dằn vặt khi thấy cậu như vậy. “Lời nhắn gửi cho chàng trai thân thương ấy là lời nguyền, hay...” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Asato Asato'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Asato Asato'],
            ]);
        }
        if (isset($authors['Shirabii'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Shirabii'],
            ]);
        }
        if (isset($authors['I-IV'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['I-IV'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/86-eighty-six-ep14-to-den-het-di-ban-dac-biet-tang-kem-set-4-bookmark/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/86-eighty-six-ep14-to-den-het-di-ban-dac-biet-tang-kem-set-4-bookmark/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/86-eighty-six-ep14-to-den-het-di-ban-dac-biet-tang-kem-set-4-bookmark/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042399579-qt',
            'title'          => 'Arya Bàn Bên Thỉnh Thoảng Lại Trêu Ghẹo Tôi Bằng Tiếng Nga - Tập 10 - Bản Boxset - Tặng Kèm Box + Set 6 Bookmark + Standee Acrylic + Poster',
            'slug'           => 'arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic-poster',
            'image'          => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic-poster/1.jpg',
            'price'          => 250000.0,
            'discount_price' => null,
            'stock_quantity' => 50,
            'page_count'     => '312',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 1.6 cm',
            'weight'         => null,
            'cover_type'     => 'Bộ Hộp',
            'description'    => 'Arya Bàn Bên Thỉnh Thoảng Lại Trêu Ghẹo Tôi Bằng Tiếng Nga - Tập 10 “И наменятоже обрати внимание” “Anh sẽ trở lại là Suou Masachika để trở thành một bản thân mà anh có thể tự hào.” Sự giác ngộ đặt cược vào vị trí gia chủ nhà Suou, cùng quyết tâm không lay chuyển với cuộc chiến bầu cử. Sau khi bộc bạch hết nỗi lòng với nhau, Masachika và Yuki cuối cùng cũng làm hòa. (Không... đây thật ra là ai? Người khác à? Làm… gì có chuyện đó chứ?) Mặt khác, dù bị Yuki trong “chế độ em gái” xoay như chong chóng, Alisa vẫn thấu hiểu quá khứ mà hai anh em nhà Suou phải gánh vác và chấp nhận sự thật. Giữa lúc ấy, Ayano lại có vẻ như đang một mình trầm tư suy nghĩ điều gì đó. Và rồi, Nonoa với ác ý ngây thơ ẩn giấu đã bất ngờ tiếp cận cô...!? “… Thực ra cậu thấy ngứa mắt Kujou Alisa lắm đúng không?” Những âm mưu cuộn xoáy bắt đầu hiển lộ trong tập 10 này của câu chuyện hài lãng mạn tuổi thanh xuân cùng nữ sinh trung học gốc Nga! Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Sunsunsun'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Sunsunsun'],
            ]);
        }
        if (isset($authors['Momoco'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Momoco'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic-poster/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic-poster/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic-poster/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic-poster/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042399579',
            'title'          => 'Arya Bàn Bên Thỉnh Thoảng Lại Trêu Ghẹo Tôi Bằng Tiếng Nga - Tập 10 - Bản Boxset - Tặng Kèm Box + Set 6 Bookmark + Standee Acrylic',
            'slug'           => 'arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic',
            'image'          => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic/1.jpg',
            'price'          => 250000.0,
            'discount_price' => null,
            'stock_quantity' => 50,
            'page_count'     => '312',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 1.6 cm',
            'weight'         => '470',
            'cover_type'     => 'Bộ Hộp',
            'description'    => 'Arya Bàn Bên Thỉnh Thoảng Lại Trêu Ghẹo Tôi Bằng Tiếng Nga - Tập 10 “И наменятоже обрати внимание” “Anh sẽ trở lại là Suou Masachika để trở thành một bản thân mà anh có thể tự hào.” Sự giác ngộ đặt cược vào vị trí gia chủ nhà Suou, cùng quyết tâm không lay chuyển với cuộc chiến bầu cử. Sau khi bộc bạch hết nỗi lòng với nhau, Masachika và Yuki cuối cùng cũng làm hòa. (Không... đây thật ra là ai? Người khác à? Làm… gì có chuyện đó chứ?) Mặt khác, dù bị Yuki trong “chế độ em gái” xoay như chong chóng, Alisa vẫn thấu hiểu quá khứ mà hai anh em nhà Suou phải gánh vác và chấp nhận sự thật. Giữa lúc ấy, Ayano lại có vẻ như đang một mình trầm tư suy nghĩ điều gì đó. Và rồi, Nonoa với ác ý ngây thơ ẩn giấu đã bất ngờ tiếp cận cô...!? “… Thực ra cậu thấy ngứa mắt Kujou Alisa lắm đúng không?” Những âm mưu cuộn xoáy bắt đầu hiển lộ trong tập 10 này của câu chuyện hài lãng mạn tuổi thanh xuân cùng nữ sinh trung học gốc Nga! Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Sunsunsun'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Sunsunsun'],
            ]);
        }
        if (isset($authors['Momoco'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Momoco'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-ban-boxset-tang-kem-box-set-6-bookmark-standee-acrylic/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042399562',
            'title'          => 'Arya Bàn Bên Thỉnh Thoảng Lại Trêu Ghẹo Tôi Bằng Tiếng Nga - Tập 10 - Tặng Kèm Bookmark Bế Hình + Bìa Áo Bonus',
            'slug'           => 'arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-tang-kem-bookmark-be-hinh-bia-ao-bonus',
            'image'          => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-tang-kem-bookmark-be-hinh-bia-ao-bonus/1.jpg',
            'price'          => 95000.0,
            'discount_price' => 85500.0,
            'stock_quantity' => 50,
            'page_count'     => '312',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 1.6 cm',
            'weight'         => '325',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Arya Bàn Bên Thỉnh Thoảng Lại Trêu Ghẹo Tôi Bằng Tiếng Nga - Tập 10 “И наменятоже обрати внимание” “Anh sẽ trở lại là Suou Masachika để trở thành một bản thân mà anh có thể tự hào.” Sự giác ngộ đặt cược vào vị trí gia chủ nhà Suou, cùng quyết tâm không lay chuyển với cuộc chiến bầu cử. Sau khi bộc bạch hết nỗi lòng với nhau, Masachika và Yuki cuối cùng cũng làm hòa. (Không... đây thật ra là ai? Người khác à? Làm… gì có chuyện đó chứ?) Mặt khác, dù bị Yuki trong “chế độ em gái” xoay như chong chóng, Alisa vẫn thấu hiểu quá khứ mà hai anh em nhà Suou phải gánh vác và chấp nhận sự thật. Giữa lúc ấy, Ayano lại có vẻ như đang một mình trầm tư suy nghĩ điều gì đó. Và rồi, Nonoa với ác ý ngây thơ ẩn giấu đã bất ngờ tiếp cận cô...!? “… Thực ra cậu thấy ngứa mắt Kujou Alisa lắm đúng không?” Những âm mưu cuộn xoáy bắt đầu hiển lộ trong tập 10 này của câu chuyện hài lãng mạn tuổi thanh xuân cùng nữ sinh trung học gốc Nga! Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Sunsunsun'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Sunsunsun'],
            ]);
        }
        if (isset($authors['Momoco'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Momoco'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-tang-kem-bookmark-be-hinh-bia-ao-bonus/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-tang-kem-bookmark-be-hinh-bia-ao-bonus/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-tang-kem-bookmark-be-hinh-bia-ao-bonus/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-10-tang-kem-bookmark-be-hinh-bia-ao-bonus/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935212349208',
            'title'          => 'Bộ Bến Xe (Tái Bản 2020)',
            'slug'           => 'bo-ben-xe-tai-ban-2020',
            'image'          => '/images/vanhoc/bo-ben-xe-tai-ban-2020/1.jpg',
            'price'          => 76000.0,
            'discount_price' => 54720.0,
            'stock_quantity' => 50,
            'page_count'     => '284',
            'publish_year'   => '2020',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 13 x 1.3 cm',
            'weight'         => '300',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Bến Xe (Tái Bản 2020) Bến Xe Thứ tôi có thể cho em trong cuộc đời này chỉ là danh dự trong sạch và một tương lai tươi đẹp mà thôi. Thế nhưng, nếu chúng ta có kiếp sau, nếu kiếp sau tôi có đôi mắt sáng, tôi sẽ ở bến xe này… đợi em. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Thương Thái Vi'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Thương Thái Vi'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ben-xe-tai-ban-2020/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ben-xe-tai-ban-2020/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ben-xe-tai-ban-2020/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ben-xe-tai-ban-2020/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Dân Trí'],
            'isbn'           => '9786320057573',
            'title'          => 'Bí Mật Tối Thượng - The Secret Of Secrets - Bìa Cứng - Kèm Chữ Ký In Của Dan Brown (Chỉ Có Tại Bản In Đầu)',
            'slug'           => 'bi-mat-toi-thuong-the-secret-of-secrets-bia-cung-kem-chu-ky-in-cua-dan-brown-chi-co-tai-ban-in-dau',
            'image'          => '/images/vanhoc/bi-mat-toi-thuong-the-secret-of-secrets-bia-cung-kem-chu-ky-in-cua-dan-brown-chi-co-tai-ban-in-dau/1.jpg',
            'price'          => 428000.0,
            'discount_price' => 385200.0,
            'stock_quantity' => 50,
            'page_count'     => '952',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 16 x 4.9 cm',
            'weight'         => '1500',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Bí Mật Tối Thượng - The Secret Of Secrets ĐIỀU GÌ ĐÁNG MONG CHỜ NHẤT Ở “BÍ MẬT TỐI THƯỢNG”? Điều gì sẽ xảy ra nếu có một bí mật đủ sức phá hủy mọi điều nhân loại từng tin tưởng? Nếu lịch sử mà chúng ta học suốt hàng trăm năm chỉ là một lớp màn được dựng lên để che giấu sự thật khủng khiếp hơn nhiều? Đó chính là cảm giác rợn người mà Bí mật tối thượng mang lại ngay từ những trang đầu tiên. Sau nhiều năm im lặng, Dan Brown trở lại với một câu chuyện được mô tả là táo bạo và nguy hiểm nhất trong sự nghiệp của ông. Không còn đơn thuần là những mật mã cổ hay các hội kín bí ẩn, lần này cuốn tiểu thuyết dường như đào sâu vào một “bí mật cuối cùng”, thứ mà nếu bị phơi bày có thể làm rung chuyển nền tảng của tôn giáo, khoa học và cả quyền lực toàn cầu. Ngay khi nội dung đầu tiên được hé lộ, cộng đồng yêu sách quốc tế đã bùng nổ tranh luận. Những giả thuyết đáng sợ xuất hiện khắp nơi: Dan Brown đang ám chỉ điều gì? Có phải cuốn sách liên quan đến những bí mật bị Vatican che giấu? Hay là một khám phá khoa học đủ khiến thế giới hỗn loạn? Chính sự mơ hồ ấy khiến độc giả bị cuốn vào trạng thái tò mò gần như ám ảnh. Đó là thứ Dan Brown làm giỏi hơn bất kỳ ai: Khiến người đọc luôn có cảm giác rằng những gì nằm trong tiểu thuyết không hoàn toàn là hư cấu. Mỗi chương truyện giống như một cánh cửa hé mở vào vùng tối của lịch sử nhân loại, nơi những tổ chức bí mật thao túng thế giới từ phía sau màn đêm, nơi sự thật bị chôn vùi bằng máu và quyền lực. Có độc giả nói rằng đọc Bí mật tối thượng giống như bước vào mê cung không lối thoát. Càng lần theo manh mối, họ càng phát hiện những chi tiết đáng sợ đến lạnh sống lưng. Và điều kinh hoàng nhất là cảm giác biết đâu ngoài đời thực, những bí mật ấy vẫn đang tồn tại ở đâu đó quanh chúng ta. Bí mật tối thượng không chỉ bán một câu chuyện. Nó bán cảm giác sợ hãi, tò mò và kích thích cực độ, cảm giác khiến hàng triệu người trên thế giới không thể cưỡng lại việc mở trang sách đầu tiên. Vì lẽ đó, Bí mật tối thượng được coi là một trong những tiểu thuyết gây bão lớn nhất năm 2026. DAN BROWN, CÁI TÊN BẢO CHỨNG CHO CHẤT LƯỢNG SẢN PHẨM Dan Brown là một trong những nhà văn trinh thám, giật gân nổi tiếng nhất thế giới, người từng khiến hàng triệu độc giả thức trắng đêm vì những câu đố lịch sử và các âm mưu rùng rợn ẩn sau tôn giáo, nghệ thuật và khoa học. Sinh năm 1964 tại Mỹ, ông từng là nhạc sĩ và giáo viên trước khi bước vào văn chương, nhưng chính trí tưởng tượng táo bạo cùng khả năng kể chuyện điện ảnh đã biến Dan Brown thành hiện tượng xuất bản toàn cầu. Tên tuổi ông bùng nổ với Mật mã Da Vinci, cuốn tiểu thuyết gây chấn động thế giới vì khai thác những bí mật xoay quanh Giáo hội, Chén Thánh và các mật mã cổ. Mật mã Da Vinci và Biểu tượng thất truyền bán hơn 1 triệu bản trong ngày đầu phát hành và nhanh chóng trở thành hiện tượng văn hóa toàn cầu, được dịch ra hàng chục ngôn ngữ. Mật mã Da Vinci còn được chuyển thể thành phim bom tấn. Ngoài Mật mã Da Vinci , Dan Brown còn nổi tiếng với hàng loạt tác phẩm ăn khách như Thiên thần',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Dan Brown'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Dan Brown'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bi-mat-toi-thuong-the-secret-of-secrets-bia-cung-kem-chu-ky-in-cua-dan-brown-chi-co-tai-ban-in-dau/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bi-mat-toi-thuong-the-secret-of-secrets-bia-cung-kem-chu-ky-in-cua-dan-brown-chi-co-tai-ban-in-dau/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bi-mat-toi-thuong-the-secret-of-secrets-bia-cung-kem-chu-ky-in-cua-dan-brown-chi-co-tai-ban-in-dau/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bi-mat-toi-thuong-the-secret-of-secrets-bia-cung-kem-chu-ky-in-cua-dan-brown-chi-co-tai-ban-in-dau/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Hà Nội'],
            'isbn'           => '8935235249257',
            'title'          => 'Bộ Bố Con Cá Gai (Tái Bản 2026)',
            'slug'           => 'bo-bo-con-ca-gai-tai-ban-2026',
            'image'          => '/images/vanhoc/bo-bo-con-ca-gai-tai-ban-2026/1.jpg',
            'price'          => 138000.0,
            'discount_price' => 111000.0,
            'stock_quantity' => 50,
            'page_count'     => '340',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14 x 1.7 cm',
            'weight'         => '360',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Bố Con Cá Gai Có những câu chuyện mãi được yêu thương, và nằm trong trái tim bạn đọc suốt năm này qua năm khác… Bố con cá gai là một câu chuyện như thế, trong trái tim độc giả Hàn Quốc, suốt nhiều năm nay. Ở đó có một em nhỏ đã chiến đấu với bệnh hiểm nghèo từ lúc lên ba, giờ em gần mười tuổi. Hãy khoan, đừng vội buồn! Vì em bé này sẽ chẳng làm bạn phải buồn nhiều. Em chịu tiêm rất giỏi, em không khóc, ngoài những lúc mệt quá ngủ thiếp đi, em còn bận đỏ bừng mặt nghĩ tới bạn Eun Mi kẹp-tóc-hoa, bận xếp hình tàu cướp biển, bận lật giở cuốn truyện Bảy viên ngọc rồng… Nhưng bố em thì khác, một ông bố làm em nhỏ của chúng ta phiền lòng quá nhiều, cũng làm những ai dõi theo “bố con cá gai” phải buồn không ít, có khi buồn quá hóa giận! Ông bố ấy đích thị là bố cá gai - một cá bố rất kỳ lạ - cả nguồn sống chỉ co cụm quẩn quanh cá gai con tí xíu. Như một ông bố ngốc! Ra đời năm 2000, câu chuyện cảm động về ông bố cá gai và cậu bé con mà người bố ấy nâng niu trong Bố con cá gai có sức lay động mạnh mẽ, trở thành một trong những câu chuyện về tình cha được người Hàn Quốc yêu thích nhất. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Cho Chang-In'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Cho Chang-In'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-con-ca-gai-tai-ban-2026/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-con-ca-gai-tai-ban-2026/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Hà Nội'],
            'isbn'           => '8935325037177',
            'title'          => 'Bộ Bộ Sách Omniscient Reader’s Viewpoint - Góc Nhìn Của Độc Giả Toàn Tri - Tập 1 + Tập 2 (Bộ 2 Tập) - Tặng Kèm 2 Bookmark Bế Hình',
            'slug'           => 'bo-bo-sach-omniscient-readers-viewpoint-goc-nhin-cua-doc-gia-toan-tri-tap-1-tap-2-bo-2-tap-tang-kem-2-bookmark-be-hinh',
            'image'          => '/images/vanhoc/bo-bo-sach-omniscient-readers-viewpoint-goc-nhin-cua-doc-gia-toan-tri-tap-1-tap-2-bo-2-tap-tang-kem-2-bookmark-be-hinh/1.jpg',
            'price'          => 449000.0,
            'discount_price' => 360000.0,
            'stock_quantity' => 50,
            'page_count'     => '1108',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 17 x 5.6 cm',
            'weight'         => '1540',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Bộ Sách Omniscient Reader’s Viewpoint - Góc Nhìn Của Độc Giả Toàn Tri - Tập 1 + Tập 2 (Bộ 2 Tập) “Chỉ mình tôi biết được kết thúc của thế giới này.” Kim Dokja vốn chỉ là một nhân viên văn phòng tầm thường, người tìm thấy niềm an ủi duy nhất ở bộ tiểu thuyết mạng vô danh “Ba cách sống sót trong một thế giới diệt vong”. Nhưng rồi một ngày, ranh giới giữa hư cấu và thực tại bỗng chốc sụp đổ. Những thảm kịch kinh hoàng từ tiểu thuyết bước ra đời thực, nhấn chìm nhân loại trong hỗn loạn và biển máu. Giữa sự tàn khốc của ngày tận thế, Kim Dokja nắm giữ một đặc quyền vô giá: Anh là độc giả duy nhất biết trước hồi kết của bộ tiểu thuyết hơn ba nghìn chương. Để sinh tồn, anh buộc phải dấn thân vào những kịch bản khốc liệt, đồng hành cùng “nhân vật chính” Yoo Joonghyuk và những đồng đội mới trên lằn ranh sinh tử mỏng manh. Bằng tri thức của một kẻ vốn dĩ chỉ đứng ngoài, liệu Kim Dokja có thể viết lại một cái kết mới cho thế giới bi kịch này, hay chỉ đang vô tình đẩy bánh xe vận mệnh lún sâu hơn vào vũng bùn nghiệt ngã? Quan trọng hơn cả, liệu anh có thể sống sót cho đến ngày được chứng kiến cái kết định mệnh đó hay không? “Bạn, người đang đọc những dòng chữ này, sẽ sống sót...” ----------------------------------- THÀNH TÍCH BỘ TRUYỆN: - Đạt hàng trăm triệu lượt đọc trên Naver - Đã chuyển thể thành nhiều phiên bản khác nhau - Được mua bản quyền tại nhiều nước trên thế giới như Thái Lan, Anh, Trung Quốc,... Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['singNsong'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['singNsong'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-sach-omniscient-readers-viewpoint-goc-nhin-cua-doc-gia-toan-tri-tap-1-tap-2-bo-2-tap-tang-kem-2-bookmark-be-hinh/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-sach-omniscient-readers-viewpoint-goc-nhin-cua-doc-gia-toan-tri-tap-1-tap-2-bo-2-tap-tang-kem-2-bookmark-be-hinh/3.png', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-sach-omniscient-readers-viewpoint-goc-nhin-cua-doc-gia-toan-tri-tap-1-tap-2-bo-2-tap-tang-kem-2-bookmark-be-hinh/4.png', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-sach-omniscient-readers-viewpoint-goc-nhin-cua-doc-gia-toan-tri-tap-1-tap-2-bo-2-tap-tang-kem-2-bookmark-be-hinh/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974216209-bq',
            'title'          => 'Boxset Harry Potter (Hộp 7 Cuốn) - Bìa Cứng - Tặng Kèm 7 Bookmark Ghép Hình In 2 Mặt + 1 Bản Đồ Đạo Tặc Khổ Poster - Phiên Bản Độc Quyền 50 Năm Fahasa',
            'slug'           => 'boxset-harry-potter-hop-7-cuon-bia-cung-tang-kem-7-bookmark-ghep-hinh-in-2-mat-1-ban-do-dao-tac-kho-poster-phien-ban-doc-quyen-50-nam-fahasa',
            'image'          => '/images/vanhoc/boxset-harry-potter-hop-7-cuon-bia-cung-tang-kem-7-bookmark-ghep-hinh-in-2-mat-1-ban-do-dao-tac-kho-poster-phien-ban-doc-quyen-50-nam-fahasa/1.jpg',
            'price'          => 4150000.0,
            'discount_price' => 3735000.0,
            'stock_quantity' => 50,
            'page_count'     => '1400',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '40 x 22 x 17 cm',
            'weight'         => '9000',
            'cover_type'     => 'Bộ Hộp',
            'description'    => 'Boxset Harry Potter (Hộp 7 Cuốn) Harry Potter là tên của bộ truyện (gồm bảy phần) của nữ nhà văn J. K. Rowling viết về cậu bé thiếu niên Harry Potter. Câu chuyện phần lớn diễn ra tại Trường Phù thủy và Pháp sư Hogwarts, một ngôi trường pháp thuật, và tập trung vào cuộc chiến của Harry Potter chống lại một phù thủy hắc ám là Chúa tể Voldemort, người đã giết cha mẹ cậu trong tham vọng làm chủ thế giới phù thủy. Sau khi Việt Nam gia nhập công ước Berne, Nhà xuất bản Trẻ là đơn vị đầu tiên mua tác quyền sách từ nước ngoài, và bộ sách đầu tiên được mua chính là bộ Harry Potter. Bộ sách lập tức được sự đón nhận rộng rãi của bạn đọc trên khắp cả nước. Để kịp đáp ứng nhu cầu bạn đọc, NXB Trẻ đã “chẻ nhỏ” bộ sách ra thành nhiều tập cỡ nhỏ dịch đến đâu thì biên tập, in ấn, phát hành tới đó để kịp đến tay bạn đọc. Bộ bìa hoạt hình đầu tiên dùng cho bộ Harry Potter khổ nhỏ, hơn 60 tập, đã trở thành một phần tuổi thơ của nhiều thế hệ. Nhà xuất bản Trẻ đã ra mắt nhiều phiên bản bìa mềm của bộ Harry Potter khổ lớn 7 tập, phiên bản Harry Potter bìa cứng minh họa màu, phiên bản Harry Potter bìa mềm khổ bỏ túi 30 tập, và nhiều ngoại truyện, sách đồng hành của bộ Harry Potter. Trong những năm qua, các fan của Harry Potter vẫn luôn kêu gọi sự “tái xuất hiện” của phiên bản bìa hoạt hình kỷ niệm, cũng như xuất bản bản bìa cứng. Vào năm 2026, nhân kỷ niệm 45 năm Nhà xuất bản Trẻ và 50 năm thành lập Công ty CP Phát Hành Sách TP.HCM – FAHASA, hai đơn vị đã phối hợp cho ra mắt phiên bản Boxset HARRY POTTER bìa cứng - lần in thứ nhất phân phối độc quyền qua hệ thống FAHASA. Boxset Harry Potter có những điểm đặc biệt gì? Đây là bộ sách Harry Potter bìa cứng bản tiếng Việt đầu tiên xuất bản tại Việt Nam. Box làm rất dày dặn cứng cáp, các cạnh có lớp đệm dày và nắp mở đứng.Đây là box bằng ván MDF cứng cáp, cứ không phải box giấy carton. Trên mặt box in hình Harry Potter cưỡi rồng bao trọn cả ba mặt, Mặt trên và mặt sau của box, chữ HARRY POTTER được ép kim vàng lấp lánh. Mặt trước box còn có hình trái banh Snitch vàng có cánh, trái banh quan trọng nhất trong môn thể thao phù thủy Quidditch, mà tất cả các fan Harry Potter đều sẽ nhận ra. Phiên bản bìa hoạt hình có thêm phần GÁY GHÉP HÌNH, khi đặt trọn bộ cạnh nhau sẽ thấy khung cảnh bộ ba nhân vật chính cưỡi rồng tuyệt đẹp, ăn khớp với hình minh họa trên box. Boxset gồm có 7 cuốn bìa cứng, qua bản dịch được yêu thích của dịch giả Lý Lan. Mỗi cuốn bên ngoài có bìa áo và bìa cứng bên trong, thuận lợi cho cả hai hình thức trưng bày: Nếu để nguyên bìa áo thì phần gáy sẽ ghép thành hình bộ ba nhân vật Harry Potter, Ron và Hermione cưỡi rồng, còn nếu bỏ bìa áo chỉ để lớp bìa cứng màu trầm phía trong, thì bạn sẽ có một bộ sách mang phong cách cổ điển khác hẳn. Tựa đề và họa tiết trên bìa cứng phía trong cũng ép kim sang trọng. Khi mở sách, bên trong lớp bìa cứng là tờ gát bằng giấy mỹ thuật. Giấy ruột là giấy ford kem chống ố tốt hơn so với loại giấy xốp. Mỗi trang ruột được trang trí bằng họa tiết đồng bộ với họa tiết đường viền bìa',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['J.K. Rowling'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['J.K. Rowling'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-harry-potter-hop-7-cuon-bia-cung-tang-kem-7-bookmark-ghep-hinh-in-2-mat-1-ban-do-dao-tac-kho-poster-phien-ban-doc-quyen-50-nam-fahasa/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-harry-potter-hop-7-cuon-bia-cung-tang-kem-7-bookmark-ghep-hinh-in-2-mat-1-ban-do-dao-tac-kho-poster-phien-ban-doc-quyen-50-nam-fahasa/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-harry-potter-hop-7-cuon-bia-cung-tang-kem-7-bookmark-ghep-hinh-in-2-mat-1-ban-do-dao-tac-kho-poster-phien-ban-doc-quyen-50-nam-fahasa/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-harry-potter-hop-7-cuon-bia-cung-tang-kem-7-bookmark-ghep-hinh-in-2-mat-1-ban-do-dao-tac-kho-poster-phien-ban-doc-quyen-50-nam-fahasa/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Hội Nhà Văn'],
            'isbn'           => '8935235248168',
            'title'          => 'Cây Cam Ngọt Của Tôi (Tái Bản 2026)',
            'slug'           => 'cay-cam-ngot-cua-toi-tai-ban-2026',
            'image'          => '/images/vanhoc/cay-cam-ngot-cua-toi-tai-ban-2026/1.jpg',
            'price'          => 125000.0,
            'discount_price' => 100000.0,
            'stock_quantity' => 50,
            'page_count'     => '244',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 14.5 x 1.2 cm',
            'weight'         => '260',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Cây Cam Ngọt Của Tôi CÂY CAM NGỌT CỦA TÔI - MỘT TUỔI THƠ BỊ LÃNG QUÊN Với một đứa trẻ, thế giới không giới hạn trong một bữa ăn, mà thế giới cần có hào quang của tình thương. Bạn có bao giờ cảm thấy bị lạc lõng trong chính ngôi nhà của mình? Một câu chuyện chạm đến tận cùng cảm xúc VỀ TÁC GIẢ: José Mauro de Vasconcelos - Ông là một nhà văn vĩ đại nhưng lại có xuất thân nghèo khó ở Brazil. Ông từng làm nhiều công việc khác nhau trước khi trở thành nhà văn - Những trải nghiệm tuổi thơ đầy gian truân là nguồn cảm hứng để ông viết nên Cây Cam Ngọt Của Tôi (1968) – tác phẩm nổi tiếng nhất trong sự nghiệp. - Văn phong giản dị, chân thực, giàu cảm xúc, khiến bao thế hệ độc giả rơi nước mắt và suy ngẫm về tình yêu thương, sự mất mát và giá trị của một tuổi thơ trọn vẹn. VỀ DỊCH GIẢ: Nguyễn Lê Minh - Là một dịch giả giàu kinh nghiệm trong việc chuyển ngữ các tác phẩm văn học nước ngoài, đặc biệt là các tác phẩm văn học Latin. - Bản dịch “Cây Cam Ngọt Của Tôi” của ông được đánh giá cao vì giữ trọn vẹn tinh thần, cảm xúc và sự trong trẻo của nguyên tác, giúp người đọc Việt Nam đắm chìm trong từng câu chữ và cảm nhận được sự trong sáng, mơ mộng nhưng cũng đầy đau thương của cậu bé Zezé. TÓM TẮT NỘI DUNG SÁCH Nếu tuổi thơ là một món quà, thì với Zezé, đó là một món quà có cả vị ngọt lẫn đắng. Zezé - một cậu bé nghèo năm tuổi tại Brazil, thông minh, lém lỉnh nhưng luôn bị gia đình xem như một đứa trẻ hư. Những trò nghịch ngợm của cậu thường bị trừng phạt bằng đòn roi, nhưng ai biết rằng đằng sau đó là một trái tim khao khát yêu thương? Người bạn duy nhất luôn lắng nghe cậu chính là cây cam ngọt nhỏ bé trong vườn, nơi cậu có thể gửi gắm những bí mật và nỗi buồn của mình. Rồi một ngày, Zezé gặp ông Portuga - một người đàn ông xa lạ nhưng lại là ánh sáng dịu dàng đầu tiên trong cuộc đời đầy bão tố của cậu bé. Ông dạy cậu về lòng nhân ái, về tình yêu thương vô điều kiện - thứ mà Zezé luôn khao khát nhưng chưa từng có được. Nhưng rồi, số phận không cho phép Zezé giữ mãi những hạnh phúc nhỏ nhoi đó… Cây Cam Ngọt Của Tôi không chỉ là câu chuyện của một cậu bé – đó còn là bức tranh về những nỗi đau vô hình của tuổi thơ, về sự khắc nghiệt của cuộc sống nhưng cũng đầy những tia sáng hy vọng. Quyển sách mang đến cho bạn: - Sự đồng cảm sâu sắc với những đứa trẻ nhạy cảm nhưng không được thấu hiểu. - Những khoảnh khắc ngọt ngào đan xen cùng nỗi đau mất mát, để lại dư âm khó quên. - Bài học quý giá về tình yêu thương, lòng trắc ẩn và sự quan tâm đến những người xung quanh. - Nhận ra vẻ đẹp thực sự của cuộc sống đến từ những điều giản dị, và rằng cuộc đời thật khốn khổ nếu thiếu đi lòng yêu thương và niềm trắc ẩn. Tại sao bạn nên đọc? - Một trong những tác phẩm văn học châu Mỹ Latin hay và bán chạy nhất Brazil và thế giới. - Một câu chuyện khiến bất kỳ ai cũng phải suy ngẫm, dù bạn là trẻ con hay đã trưởng thành. - Một cuốn sách giúp bạn trân trọng hơn những điều giản dị và nhìn lại tuổi thơ của chính mình. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['José Mauro de Vasconcelos'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['José Mauro de Vasconcelos'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/cay-cam-ngot-cua-toi-tai-ban-2026/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/cay-cam-ngot-cua-toi-tai-ban-2026/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974187639',
            'title'          => 'Bộ Cho Tôi Xin Một Vé Đi Tuổi Thơ (Tái Bản 2023)',
            'slug'           => 'bo-cho-toi-xin-mot-ve-di-tuoi-tho-tai-ban-2023',
            'image'          => '/images/vanhoc/bo-cho-toi-xin-mot-ve-di-tuoi-tho-tai-ban-2023/1.jpg',
            'price'          => 90000.0,
            'discount_price' => 77000.0,
            'stock_quantity' => 50,
            'page_count'     => '208',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1 cm',
            'weight'         => '220',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'CHO TÔI XIN MỘT VÉ ĐI TUỔI THƠ - HỒI ỨC NGỌT NGÀO CỦA NHỮNG NGÀY XƯA TƯƠI ĐẸP Bạn có bao giờ muốn quay ngược thời gian, trở lại những ngày vô tư chạy chân trần trên sân, háo hức đợi cây kem ốc quế hay trốn ngủ trưa để chơi cùng lũ bạn? Cho Tôi Một Vé Về Tuổi Thơ chính là tấm vé đưa bạn trở lại khoảng trời hồn nhiên ấy. VỀ TÁC GIẢ : Nguyễn Nhật Ánh - Người đưa tuổi thơ lên trang sách Nguyễn Nhật Ánh – nhà văn nổi tiếng bậc nhất của văn học Việt Nam đương đại, chuyên viết về tuổi thơ và thanh xuân, chạm đến cảm xúc của cả trẻ em lẫn người lớn. Với hơn 40 năm sáng tác, ông đã để lại dấu ấn với hàng loạt tác phẩm như Mắt Biếc, Cô Gái Đến Từ Hôm Qua, Tôi Thấy Hoa Vàng Trên Cỏ Xanh … Là một trong những nhà văn có lượng sách bán chạy nhất Việt Nam, với hàng triệu bản in và luôn được tái bản nhiều lần. Cho Tôi Một Vé Về Tuổi Thơ là một trong những cuốn sách bán chạy nhất của ông, được đông đảo độc giả yêu thích. Văn chương của Nguyễn Nhật Ánh không chỉ để đọc, mà còn để sống lại những năm tháng đẹp nhất đời người. TÓM TẮT NỘI DUNG SÁCH Câu chuyện xoay quanh cu Mùi, Tí sún, Hải cò và Tủn - nhóm trẻ con với những trò nghịch ngợm “nhất quỷ, nhì ma”. Dưới góc nhìn hài hước nhưng cũng đầy sâu sắc, Nguyễn Nhật Ánh không chỉ kể về những trò chơi thơ ấu mà còn mở ra cả một thế giới tuổi thơ chân thực: những buổi trốn ngủ trưa đi thả diều, những lần tức tối vì người lớn áp đặt, hay những rung động đầu đời vụng dại. Nhưng tuổi thơ không kéo dài mãi mãi. Khi lớn lên, ta nhận ra điều từng chán ghét lúc bé lại là thứ ta khao khát nhất khi trưởng thành. Cuốn sách không chỉ khiến bạn cười vì những trò nghịch dại, mà còn lắng lại để suy ngẫm: liệu người lớn có thực sự hiểu trẻ con, hay chỉ áp đặt chúng theo cách mình muốn? Quyển sách mang đến cho bạn: Cảm giác được sống lại tuổi thơ – cuốn sách này chính là cánh cửa đưa bạn trở lại những ngày tháng đẹp nhất trong đời. Một góc nhìn mới về cuộc sống – đôi khi hạnh phúc đến từ những điều giản đơn nhất. Giúp đấng sinh thành hiểu hơn về tuổi thơ và cải thiện mối quan hệ với con cái. Tại sao bạn nên đọc? Đạt giải thưởng Văn học ASEAN 2010 với tác phẩm Cho Tôi Một Vé Về Tuổi Thơ . Một tác phẩm văn học kinh điển, phù hợp cho mọi lứa tuổi. Bạn đã sẵn sàng cầm trên tay tấm vé về tuổi thơ chưa? => CHỐT ĐƠN NGAY NÀO Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-cho-toi-xin-mot-ve-di-tuoi-tho-tai-ban-2023/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-cho-toi-xin-mot-ve-di-tuoi-tho-tai-ban-2023/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-cho-toi-xin-mot-ve-di-tuoi-tho-tai-ban-2023/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-cho-toi-xin-mot-ve-di-tuoi-tho-tai-ban-2023/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974216773',
            'title'          => 'Bộ Chuyện Tình Thị Trấn - Bìa Cứng - Tặng Kèm Ngẫu Nhiên Chữ Ký Tác Giả + Bookmark + Card Tròn Hình Đĩa Nhạc + Sổ Tay',
            'slug'           => 'bo-chuyen-tinh-thi-tran-bia-cung-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac-so-tay',
            'image'          => '/images/vanhoc/bo-chuyen-tinh-thi-tran-bia-cung-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac-so-tay/1.jpg',
            'price'          => 285000.0,
            'discount_price' => 256500.0,
            'stock_quantity' => 50,
            'page_count'     => '360',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 2 cm',
            'weight'         => '580',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Chuyện Tình Thị Trấn Chuyện tình thị trấn là tác phẩm dành cho bạn đọc tuổi trưởng thành của nhà văn Nguyễn Nhật Ánh. Tác phẩm mở ra câu chuyện về những nhân vật trong một thị trấn nhỏ với cuộc sống chậm trôi, nhưng đằng sau đó, mỗi người đều có những câu chuyện riêng nối kết với nhau theo cách ít ai ngờ đến. Chàng trai tài hoa, hào hiệp và cô gái xinh đẹp nhất thị trấn ở rất gần nhau, nhưng vì đâu số phận lại đẩy họ ra hai đầu xa nhau tít tắp? Khi bắt đầu một câu chuyện tình, ai cũng mơ về sự viên mãn, nhưng “… cuộc sống thường có những khúc quanh bất ngờ. Khi con người tình cờ bước tới khúc quanh đó, bi kịch sẽ gọi tên. Lỗi đâu tại tình yêu!” (Trích) Tình yêu không có lỗi, nhưng lựa chọn trong tình yêu có thể thay đổi nhiều điều trong cuộc đời mình và những người xung quanh mình. Viết về một chủ đề "kinh điển" là tình yêu, Chuyện tình thị trấn hấp dẫn bạn đọc bằng cách kể mới lạ, hài hước và tình tiết chuyển ngoặt bất ngờ như một cuốn phim trinh thám. Mỗi một nhân vật đều có nét đặc trưng đáng nhớ. Đặc biệt, những bài nhạc và khung cảnh cách nay vài thập niên phủ lên tác phẩm không khí hoài niệm và cảm xúc. Một tác phẩm xứng đáng chờ đợi của nhà văn Nguyễn Nhật Ánh cho mùa hè này. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chuyen-tinh-thi-tran-bia-cung-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac-so-tay/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chuyen-tinh-thi-tran-bia-cung-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac-so-tay/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chuyen-tinh-thi-tran-bia-cung-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac-so-tay/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chuyen-tinh-thi-tran-bia-cung-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac-so-tay/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974216766',
            'title'          => 'Bộ Chuyện Tình Thị Trấn - Tặng Kèm Ngẫu Nhiên Chữ Ký Tác Giả + Bookmark + Card Tròn Hình Đĩa Nhạc',
            'slug'           => 'bo-chuyen-tinh-thi-tran-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac',
            'image'          => '/images/vanhoc/bo-chuyen-tinh-thi-tran-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac/1.jpg',
            'price'          => 150000.0,
            'discount_price' => 135000.0,
            'stock_quantity' => 50,
            'page_count'     => '360',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1.8 cm',
            'weight'         => '380',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Chuyện Tình Thị Trấn Chuyện tình thị trấn là tác phẩm dành cho bạn đọc tuổi trưởng thành của nhà văn Nguyễn Nhật Ánh. Tác phẩm mở ra câu chuyện về những nhân vật trong một thị trấn nhỏ với cuộc sống chậm trôi, nhưng đằng sau đó, mỗi người đều có những câu chuyện riêng nối kết với nhau theo cách ít ai ngờ đến. Chàng trai tài hoa, hào hiệp và cô gái xinh đẹp nhất thị trấn ở rất gần nhau, nhưng vì đâu số phận lại đẩy họ ra hai đầu xa nhau tít tắp? Khi bắt đầu một câu chuyện tình, ai cũng mơ về sự viên mãn, nhưng “… cuộc sống thường có những khúc quanh bất ngờ. Khi con người tình cờ bước tới khúc quanh đó, bi kịch sẽ gọi tên. Lỗi đâu tại tình yêu!” (Trích) Tình yêu không có lỗi, nhưng lựa chọn trong tình yêu có thể thay đổi nhiều điều trong cuộc đời mình và những người xung quanh mình. Viết về một chủ đề "kinh điển" là tình yêu, Chuyện tình thị trấn hấp dẫn bạn đọc bằng cách kể mới lạ, hài hước và tình tiết chuyển ngoặt bất ngờ như một cuốn phim trinh thám. Mỗi một nhân vật đều có nét đặc trưng đáng nhớ. Đặc biệt, những bài nhạc và khung cảnh cách nay vài thập niên phủ lên tác phẩm không khí hoài niệm và cảm xúc. Một tác phẩm xứng đáng chờ đợi của nhà văn Nguyễn Nhật Ánh cho mùa hè này. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chuyen-tinh-thi-tran-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chuyen-tinh-thi-tran-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chuyen-tinh-thi-tran-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chuyen-tinh-thi-tran-tang-kem-ngau-nhien-chu-ky-tac-gia-bookmark-card-tron-hinh-dia-nhac/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '8935244874488',
            'title'          => 'Circe',
            'slug'           => 'circe',
            'image'          => '/images/vanhoc/circe/1.jpg',
            'price'          => 200000.0,
            'discount_price' => 160000.0,
            'stock_quantity' => 50,
            'page_count'     => '528',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '22.5 x 14.5 cm x 2.7',
            'weight'         => '550',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Tiểu thuyết mới của Madeline Miller – tác giả của Trường ca Achilles! PHỤ NỮ. PHÙ THUỶ. THẦN THOẠI. PHÀM NHÂN. BỊ RUỒNG BỎ. TÌNH NHÂN. KẺ HUỶ DIỆT. NGƯỜI SỐNG SÓT. CIRCE. Một cô con gái ra đời trong cung điện của Helios, vị thần mặt trời và là Titan hùng mạnh nhất. Nhưng Circe là một đứa trẻ kì quặc – không hùng mạnh và khủng khiếp như cha, hay quyến rũ một cách độc địa như mẹ. Bị khinh thường và chối bỏ, Circe lớn lên trong bóng tối, nằm ngoài thế giới của cả thần linh lẫn phàm nhân. Nhưng nàng sở hữu thứ quyền năng của riêng mình: sức mạnh phép thuật. Khi tài năng ấy của Circe đe doạ chính các vị thần, nàng bị trục xuất ra hoang đảo Aiaia. Tại đây nàng mài giũa thứ nghệ thuật huyền bí của mình, phù phép, thuần phục thú hoang và thu lấy sức mạnh từ thiên nhiên. Song không phải lúc nào nàng cũng một mình; nhiều người được mệnh định sẵn sẽ đi qua nơi lưu đày của Circe, đan xen số phận của họ với nàng. Vị thần đưa tin Hermes. Người thợ thủ công Daedalus. Một con tàu chở bộ lông cừu vàng. Và Odysseus mưu trí, trong chuyến hành trình hùng tráng về nhà. Nhưng cũng có nhiều hiểm nguy đối với một người phụ nữ một mình một cõi trên thế giới này, và sự độc lập của Circe thu hút cơn thịnh nộ của cả phàm nhân lẫn thánh thần. Để bảo vệ những gì mình yêu quý nhất, Circe phải dùng toàn bộ sức mạnh của mình và chọn lựa, một lần và mãi mãi, xem mình thuộc về thế giới thần linh mà nàng được sinh ra, hay nơi các phàm nhân mà nàng đã bắt đầu yêu mến. “Dưới vẻ bề ngoài phẳng lặng, quen thuộc của vạn vật là một diện mạo khác đang chờ đợi để xé đôi thế giới.” === Thổi hồn vào thế giới cổ đại, Madeline Miller đã dệt nên một câu chuyện say đắm về các vị thần và anh hùng, phép thuật và quái vật, sự sống còn và biến đổi. Với những nhân vật sống động đến khó quên, ngôn từ mê hoặc và những bí ẩn theo từng trang giấy, tiểu thuyết Circe là thiên sử thi đầy say mê về những cạnh tranh gia đình, âm mưu cung cấm, tình yêu và nỗi mất mát – là khúc ca bướng bỉnh, không thể dập tắt về một người phụ nữ bừng cháy và sáng rực giữa những góc tối trong một thế giới thống trị bởi đàn ông. Về tác giả: Madeline Miller sinh ra ở Boston, lớn lên tại thành phố New York và Philadelphia. Cô tốt nghiệp bằng cử nhân và thạc sĩ ngành Latinh học và ngành Hy Lạp cổ đại tại trường Đại học Brown. 15 năm qua, cô tham gia giảng dạy và kèm cặp sinh viên trong lĩnh vực tiếng Latinh, Hy Lạp, và văn chương Shakespeare. Trường ca Achilles, tiểu thuyết đầu tay của cô, giành giải Orange năm 2012 dành cho tiểu thuyết hư cấu. Tác phẩm này đã được dịch ra 25 ngôn ngữ trên thế giới. Circe là tiểu thuyết thứ hai của cô. Tác phẩm này ngay lập tức đứng đầu danh sách bán chạy theo tờ New York Times và Sunday Times . Circe đã được dịch ra 22 thứ tiếng và hiện đang được HBO Max tiến hành chuyển thể thành phim truyền hình dài tập. Sách cùng tác giả: - Trường ca Achilles --- Một ấn phẩm của WINGS BOOKS - Thương hiệu sách trẻ của NXB Kim Đồng. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Madeline Miller'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Madeline Miller'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974212416',
            'title'          => 'Bộ Cô Bé Hàng Xóm Và Bốn Viên Kẹo - Tặng Kèm Random 1 Trong 4 Mẫu Bookmark + Sticker',
            'slug'           => 'bo-co-be-hang-xom-va-bon-vien-keo-tang-kem-random-1-trong-4-mau-bookmark-sticker',
            'image'          => '/images/vanhoc/bo-co-be-hang-xom-va-bon-vien-keo-tang-kem-random-1-trong-4-mau-bookmark-sticker/1.jpg',
            'price'          => 115000.0,
            'discount_price' => 92000.0,
            'stock_quantity' => 50,
            'page_count'     => '240',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1.2 cm',
            'weight'         => '260',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Cô Bé Hàng Xóm Và Bốn Viên Kẹo “Cô bé hàng xóm và bốn viên kẹo” là những trang viết trong trẻo về tuổi thơ, tình bạn, tình thân, và lòng tốt giản dị. Có hai điểm đặc biệt trong tác phẩm này, thứ nhất là nhà văn Nguyễn Nhật Ánh chọn một bối cảnh khác cho câu chuyện, thay vì vùng thôn quê miền Trung thường xuất hiện trong các tác phẩm của ông; và điều đặc biệt thứ hai là một vài nhân vật trong một tác phẩm đã ra mắt trước đó sẽ lại xuất hiện, tạo nên sự kết nối thú vị giữa những tác phẩm Nguyễn Nhật Ánh. Dù bạn sinh ra ở đâu và ở độ tuổi nào, chắc hẳn khi đọc cuốn sách này, bạn sẽ mỉm cười trước những đoạn đối thoại đậm “chất Nguyễn Nhật Ánh”, và thấy lòng mình mềm lại trước những hành động tốt đẹp giữa người với người dù trong hoàn cảnh khó khăn. Điều đáng quý nhất ở trẻ thơ chính là tấm lòng tốt đơn thuần, và càng đáng quý hơn khi lớn lên, ta vẫn giữ được sự thuần lương đó. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-be-hang-xom-va-bon-vien-keo-tang-kem-random-1-trong-4-mau-bookmark-sticker/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-be-hang-xom-va-bon-vien-keo-tang-kem-random-1-trong-4-mau-bookmark-sticker/3.png', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-be-hang-xom-va-bon-vien-keo-tang-kem-random-1-trong-4-mau-bookmark-sticker/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-be-hang-xom-va-bon-vien-keo-tang-kem-random-1-trong-4-mau-bookmark-sticker/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Trẻ'],
            'isbn'           => '8934974177944',
            'title'          => 'Bộ Còn Chút Gì Để Nhớ (2022)',
            'slug'           => 'bo-con-chut-gi-de-nho-2022',
            'image'          => '/images/vanhoc/bo-con-chut-gi-de-nho-2022/1.jpg',
            'price'          => 110000.0,
            'discount_price' => 94000.0,
            'stock_quantity' => 50,
            'page_count'     => '216',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 13 x 1',
            'weight'         => '250',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Đó là những kỷ niệm thời đi học của Chương, lúc mới bước chân vào Sài Gòn và làm quen với cuộc sống đô thị. Là những mối quan hệ bạn bè tưởng chừng hời hợt thoảng qua nhưng gắn bó suốt cuộc đời. Cuộc sống đầy biến động đã xô dạt mỗi người mỗi nơi, nhưng trải qua hàng mấy chục năm, những kỷ niệm ấy vẫn luôn níu kéo Chương về với một thời để nhớ. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-chut-gi-de-nho-2022/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-chut-gi-de-nho-2022/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-chut-gi-de-nho-2022/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-chut-gi-de-nho-2022/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042419024',
            'title'          => 'Doraemon - Tiểu Thuyết - Nobita Và Lâu Đài Dưới Đáy Biển - Phiên Bản Mới',
            'slug'           => 'doraemon-tieu-thuyet-nobita-va-lau-dai-duoi-day-bien-phien-ban-moi',
            'image'          => '/images/vanhoc/doraemon-tieu-thuyet-nobita-va-lau-dai-duoi-day-bien-phien-ban-moi/1.jpg',
            'price'          => 60000.0,
            'discount_price' => 51000.0,
            'stock_quantity' => 50,
            'page_count'     => '204',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 1 cm',
            'weight'         => '200',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Doraemon - Tiểu Thuyết - Nobita Và Lâu Đài Dưới Đáy Biển Kì nghỉ hè đã đến! Nobita háo hức vô cùng, vì Doraemon có một ý tưởng cực kì hấp dẫn: đưa nhóm bạn đi cắm trại… dưới lòng biển, nhờ sự trợ giúp của các bảo bối tuyệt đỉnh như xe buggy dưới nước và đèn pin thích ứng! Chuyến du hành mở ra thế giới đại dương kì thú ngoài sức tưởng tượng. Đang say mê khám phá, nhóm bạn bất ngờ phát hiện xác tàu đắm bí ẩn và chạm trán El - chàng trai kì lạ thuộc Liên bang MU, nền văn minh trải rộng dưới đáy biển. Đúng lúc đó, tin dữ ập đến: Lâu đài quỷ - nỗi ám ảnh của cư dân biển cả - đã thức tỉnh. Bí mật gì chôn vùi nơi tòa lâu đài kì dị ấy? Thử thách kinh hoàng nào đang chờ đợi phía trước? Mang theo niềm tin mãnh liệt vào sức mạnh vô song của tình bạn, nhóm bạn dấn thân vào cuộc phiêu lưu vĩ đại sẽ quyết định vận mệnh của địa cầu! --- FUJIKO F FUJIO Tác giả FUJIKO F FUJIO tên thật là Hiroshi Fujimoto, sinh năm 1933 tại thành phố Takaoka, tỉnh Toyama, Nhật Bản. Ông giới thiệu tác phẩm đầu tay Tenshi no Tama-chan năm 1951, sau đó sáng tạo thêm nhiều kiệt tác, tạo ra kỉ nguyên mới của truyện tranh thiếu nhi xứ Phù Tang. Các tác phẩm nổi tiếng nhất của ông phải kể đến Doraemon, Obake no Q-taro (đồng tác giả) và Perman . Tháng 9 năm 2011, khai trương “FUJIKO-F-FUJIO museum ở thành phố Kawasaki”, trưng bày tác phẩm và tôn vinh những thành tựu của ông. Isao MURAYAMA Biên kịch Isao MURAYAMA phụ trách viết kịch bản cho loạt phim truyền hình Doraemon . Bên cạnh đó, ông còn tham gia các dự án thuộc thương hiệu Pretty Cure như Meitantei Pretty Curel, Mahou Tsukai Pretty Cure!! ~MIRAI DAYS~, cùng loạt phim Kagaku x Bōken Survival . Ông đạt được nhiều thành tựu trong lĩnh vực biên kịch và xây dựng nội dung tổng thể cho các dự án truyền hình và điện ảnh. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Fujiko F Fujio'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Fujiko F Fujio'],
            ]);
        }
        if (isset($authors['Isao Murayama'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Isao Murayama'],
            ]);
        }
        if (isset($authors['Tetsuo Yajima'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Tetsuo Yajima'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/doraemon-tieu-thuyet-nobita-va-lau-dai-duoi-day-bien-phien-ban-moi/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/doraemon-tieu-thuyet-nobita-va-lau-dai-duoi-day-bien-phien-ban-moi/3.png', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thế Giới'],
            'isbn'           => '8935235248533',
            'title'          => 'Dune Messiah - Cứu Tinh Xứ Cát',
            'slug'           => 'dune-messiah-cuu-tinh-xu-cat',
            'image'          => '/images/vanhoc/dune-messiah-cuu-tinh-xu-cat/1.jpg',
            'price'          => 185000.0,
            'discount_price' => 166500.0,
            'stock_quantity' => 50,
            'page_count'     => '318',
            'publish_year'   => '2026',
            'language'       => 'Tieng Viet',
            'dimensions'     => '25 x 17 x 1.6 cm',
            'weight'         => '400',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Dune Messiah - Cứu Tinh Xứ Cát PHẦN TIẾP THEO CỦA XỨ CÁT Nhiều năm sau khi trở thành Hoàng đế Xứ Cát và đấng tiên tri của con dân Đế quốc liên hành tinh, Paul Muad\'dib vẫn chưa từng thực sự có được sự an bình. Những kẻ thù không đội trời chung vẫn không buông tha chàng. Mưu sâu chước hiểm của chúng luôn luôn đe dọa cướp đi tất cả những gì chàng yêu quý nhất, hòng bẻ gãy tinh thần chàng, buộc chàng phải có những quyết định ngược với các nguyên tắc và lý tưởng chàng hằng theo đuổi. Cứu tinh Xứ Cát tiếp tục dẫn dắt chúng ta bước vào chương mới trong cuộc đời Paul Muad\'dib, quyền uy hơn, cô độc hơn, và cũng bi kịch hơn bao giờ hết, khiến ta vui với những chiến thăng mới của vị Cứu tinh Xứ Cát, đồng thời đau cùng nỗi đau của chàng... "Trong toàn bộ series, đây là cuốn tôi yêu thích nhất, vượt xa những cuốn còn lại. Một cuốn sách u tối mà tuyệt đẹp, kể về Paul và Chani khi họ phải vật lộn với tinh yêu của mình dưới gánh nặng của quyền lực lẫn áp lực từ cả thế giới xung quanh; về nỗ lực của Paul để thoát khỏi vòng xoáy bạo lực. Có điều gì đó rất đặc biệt trong tình yêu của họ, trong cách mối quan hệ ấy biến đổi theo thời gian." - DENIS VILLENEUVE đạo diễn phim Xứ Cát "Xuất sắc... hội tụ tất cả những gì Xứ Cát từng có, và có lẽ còn hơn thế nữa." - GALAXY MAGAZINE Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Frank Herbert'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Frank Herbert'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/dune-messiah-cuu-tinh-xu-cat/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/dune-messiah-cuu-tinh-xu-cat/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thanh Niên'],
            'isbn'           => '8935212377430',
            'title'          => 'Eo Thon Nhỏ (Tái Bản 2026)',
            'slug'           => 'eo-thon-nho-tai-ban-2026',
            'image'          => '/images/vanhoc/eo-thon-nho-tai-ban-2026/1.jpg',
            'price'          => 286000.0,
            'discount_price' => 229000.0,
            'stock_quantity' => 50,
            'page_count'     => '608',
            'publish_year'   => null,
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 16 x 3 cm',
            'weight'         => '800',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Eo Thon Nhỏ Lục Trì hiểu ý Đường Nhân, môi cậu khẽ nhếch lên. Đường Nhân nheo mắt. “Sau này phải cười nhiều vào đấy! Cậu cười lên trông đẹp trai lắm.” Nụ cười “thầm kín” của Lục Trì tắt phụt. Cô cười, để lộ hàm răng trắng tinh. “Vừa nãy tớ uống nước mật ong, nước mật ong ngọt ê răng luôn ấy.” Lục Trì nhìn cô. Hai chuyện này thì liên quan gì tới nhau? Đường Nhân bồi thêm: “Nụ cười của cậu… còn ngọt hơn mật ong tớ uống hôm nay.” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Khương Chi Ngư'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Khương Chi Ngư'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/eo-thon-nho-tai-ban-2026/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Trẻ'],
            'isbn'           => '8934974177951',
            'title'          => 'Hạ Đỏ (Tái Bản 2022)',
            'slug'           => 'ha-do-tai-ban-2022',
            'image'          => '/images/vanhoc/ha-do-tai-ban-2022/1.jpg',
            'price'          => 95000.0,
            'discount_price' => 81000.0,
            'stock_quantity' => 50,
            'page_count'     => '184',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 12 x 0.5 cm',
            'weight'         => '200',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Hạ Đỏ (Tái Bản 2022) Mùa hè năm đó, Chương được bố mẹ cho về quê chơi. Ở đây, cậu được biết đến những trò chơi thú vị cùng hai đứa em con nhà dì của mình, những trò chơi mà Chương chẳng thể kiếm ở đâu được khi còn sống ở thành phố. Rồi Chương gặp Út Thêm và phải lòng cô bé, Chương thích sự nhẹ nhàng ở Út Thêm và chỉ muốn được nhìn thấy cô mỗi ngày. Ngày qua ngày, Chương đã đi qua nhiều cung bậc cảm xúc khi bắt đầu biết rung động trước một người con gái, cậu muốn dành những điều thật vui vẻ và tốt đẹp gửi đến cho cô. Chương trở lại thành phố sau những ngày hè nắng cháy, hoa cỏ may trắng muốt mọc đầy trên con đường cậu đi qua mỗi ngày để đến nhà Út Thêm bám đầy gấu quần cậu, như mối tình đầu da diết mà cậu mang trong lòng. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ha-do-tai-ban-2022/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ha-do-tai-ban-2022/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ha-do-tai-ban-2022/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ha-do-tai-ban-2022/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974179672',
            'title'          => 'Bộ Harry Potter Và Hòn Đá Phù Thuỷ - Tập 1 (Tái Bản)',
            'slug'           => 'bo-harry-potter-va-hon-da-phu-thuy-tap-1-tai-ban',
            'image'          => '/images/vanhoc/bo-harry-potter-va-hon-da-phu-thuy-tap-1-tai-ban/1.jpg',
            'price'          => 150000.0,
            'discount_price' => 128000.0,
            'stock_quantity' => 50,
            'page_count'     => '366',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 14 cm',
            'weight'         => '300',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Khi một lá thư được gởi đến cho cậu bé Harry Potter bình thường và bất hạnh, cậu khám phá ra một bí mật đã được che giấu suốt cả một thập kỉ. Cha mẹ cậu chính là phù thủy và cả hai đã bị lời nguyền của Chúa tể Hắc ám giết hại khi Harry mới chỉ là một đứa trẻ, và bằng cách nào đó, cậu đã giữ được mạng sống của mình. Thoát khỏi những người giám hộ Muggle không thể chịu đựng nổi để nhập học vào trường Hogwarts, một trường đào tạo phù thủy với những bóng ma và phép thuật, Harry tình cờ dấn thân vào một cuộc phiêu lưu đầy gai góc khi cậu phát hiện ra một con chó ba đầu đang canh giữ một căn phòng trên tầng ba. Rồi Harry nghe nói đến một viên đá bị mất tích sở hữu những sức mạnh lạ kì, rất quí giá, vô cùng nguy hiểm, mà cũng có thể là mang cả hai đặc điểm trên. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['J.K.Rowling'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['J.K.Rowling'],
            ]);
        }
        if (isset($authors['Lý Lan'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Lý Lan'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-hon-da-phu-thuy-tap-1-tai-ban/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-hon-da-phu-thuy-tap-1-tai-ban/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-hon-da-phu-thuy-tap-1-tai-ban/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-hon-da-phu-thuy-tap-1-tai-ban/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935212370189',
            'title'          => 'Hồ Điệp Và Kình Ngư',
            'slug'           => 'ho-diep-va-kinh-ngu',
            'image'          => '/images/vanhoc/ho-diep-va-kinh-ngu/1.jpg',
            'price'          => 155000.0,
            'discount_price' => 111600.0,
            'stock_quantity' => 50,
            'page_count'     => '272',
            'publish_year'   => '2024',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20.5 x 14.5 x 1.3 cm',
            'weight'         => '500',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'HỒ ĐIỆP VÀ KÌNH NGƯ - BI KỊCH HAY HUYỀN THOẠI CỦA TÌNH YÊU? Một câu chuyện cuốn hút ngay từ những trang đầu tiên - Khi tình yêu trở thành sợi dây mong manh giữa sinh tử, phản bội và hy vọng. Khi một nàng hồ điệp nhỏ bé chạm trán với kình ngư mạnh mẽ, liệu đó là định mệnh hay chỉ là một giấc mộng chóng tàn? VỀ TÁC GIẢ : Tuế Kiến Tuế Kiến là một tác giả được yêu thích trong dòng văn học lãng mạn Trung Quốc. Cô nổi tiếng với những tác phẩm có nội dung sâu sắc, kịch tính, giàu cảm xúc nhưng cũng đầy tính hiện thực. Văn phong của Tuế Kiến không chỉ khiến độc giả đắm chìm trong từng câu chữ mà còn khơi gợi nhiều suy ngẫm về tình yêu, số phận và lựa chọn của con người. Hồ Điệp Và Kình Ngư, cô một lần nữa chứng minh được khả năng dẫn dắt câu chuyện tài tình, khiến độc giả không thể rời mắt khỏi từng trang sách. VỀ DỊCH GIẢ: Diệp Châu Diệp Châu là dịch giả có nhiều kinh nghiệm trong việc chuyển ngữ các tác phẩm văn học Trung Quốc. Với sự nhạy bén trong ngôn ngữ và khả năng truyền tải cảm xúc tinh tế, bản dịch của Diệp Châu giúp độc giả Việt Nam dễ dàng cảm nhận được sự lãng mạn, đau thương và giằng xé trong từng câu chữ mà Tuế Kiến đã gửi gắm vào tác phẩm. TÓM TẮT NỘI DUNG SÁCH Một cô gái trẻ đang sống một cuộc đời bình thường nhưng lại vô tình bị cuốn vào thế giới đen tối đầy bí ẩn của một người đàn ông nguy hiểm nhưng đầy cuốn hút. Anh là kẻ đứng trên đỉnh cao quyền lực, là người mà cô không nên yêu. Nhưng càng muốn trốn chạy, càng không thể thoát. Giữa họ là yêu hay hận? Là bảo vệ hay hủy diệt? Là vận mệnh đã an bài hay chỉ là một trò đùa tàn nhẫn của số phận? Những bí mật chôn giấu dần được phơi bày, những lựa chọn đau đớn buộc phải đưa ra. Khi đã bước vào ván cờ sinh tử này, liệu tình yêu có đủ để cứu rỗi cả hai? ĐIỀU GÌ KHIẾN BẠN KHÔNG THỂ BỎ LỠ CUỐN SÁCH NÀY? Đây không chỉ là một câu chuyện tình yêu, mà còn là một bức tranh chân thực về con người giữa những lựa chọn nghiệt ngã. Sự kết hợp hoàn hảo giữa lãng mạn và kịch tính, giữa những cảm xúc nhẹ nhàng và những cao trào đầy đau đớn. Chứa đựng những câu chữ tinh tế, sắc bén, lột tả chân thực những góc khuất trong lòng người. “HỒ ĐIỆP VÀ KÌNH NGƯ” MANG ĐẾN ĐIỀU GÌ? Một tác phẩm mang đậm màu sắc bi kịch và hiện thực, nơi tình yêu không chỉ có hạnh phúc mà còn là thử thách khắc nghiệt của số phận. Một câu chuyện với kết cấu chặt chẽ, tuyến nhân vật có chiều sâu, thể hiện rõ sự giằng xé giữa lý trí và tình cảm, giữa quá khứ và tương lai. Một hành trình khai thác nội tâm đầy ám ảnh, nơi từng quyết định nhỏ bé có thể thay đổi cả cuộc đời con người. Một cuốn sách mang lại nhiều tầng ý nghĩa, không chỉ dừng lại ở tình yêu mà còn là số phận, sự lựa chọn và cái giá của những khát vọng. ​”Hồ điệp và kình ngư” - một cuốn sách đáng đọc, đáng suy ngẫm và đáng có trong tủ sách của bất kỳ ai yêu thích những tác phẩm đầy chiều sâu! Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Tuế Kiến'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Tuế Kiến'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ho-diep-va-kinh-ngu/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935095633982',
            'title'          => 'Bộ Không Gia Đình - Bìa Cứng (Tái Bản 2024)',
            'slug'           => 'bo-khong-gia-dinh-bia-cung-tai-ban-2024',
            'image'          => '/images/vanhoc/bo-khong-gia-dinh-bia-cung-tai-ban-2024/1.jpg',
            'price'          => 215000.0,
            'discount_price' => 172000.0,
            'stock_quantity' => 50,
            'page_count'     => '616',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 16 x 3.2 cm',
            'weight'         => '990',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Không Gia Đình KHÔNG GIA ĐÌNH - HÀNH TRÌNH ĐẦY NƯỚC MẮT VÀ HY VỌNG CỦA CẬU BÉ RÉMI Bạn đã bao giờ cảm thấy lạc lõng giữa dòng đời, khao khát một mái ấm nhưng chỉ nhận lại những thử thách khắc nghiệt? Không Gia Đình sẽ đưa bạn vào hành trình xúc động của cậu bé Rémi – nơi mỗi bước chân là một bài học về lòng nhân ái, sự kiên cường và ý nghĩa thực sự của gia đình. VỀ TÁC GIẢ: Hector Malot (1830-1907) - Là một nhà văn nổi tiếng người Pháp thế kỷ 19, với nhiều tác phẩm để lại dấu ấn sâu sắc trong lòng độc giả. - Ông là người tiên phong trong việc khắc họa tâm lý nhân vật một cách tinh tế, gây rung động mạnh mẽ cho người đọc. - Tác phẩm “KHÔNG GIA ĐÌNH” được coi là đỉnh cao trong sự nghiệp văn chương của ông. VỀ DỊCH GIẢ: Hà Mai Anh (1905 - 1975) - Là một dịch giả xuất sắc, được biết đến qua nhiều bản dịch kinh điển của văn học Pháp. - Ông đã mang đến cho độc giả Việt Nam một bản dịch mượt mà, tinh tế, giúp giữ nguyên vẹn giá trị và tinh thần của tác phẩm Không Gia Đình. TÓM TẮT NỘI DUNG SÁCH Không Gia Đình kể về cuộc hành trình đầy gian truân của cậu bé Rémi – một đứa trẻ bị bỏ rơi từ nhỏ và được một gia đình nông dân nuôi dưỡng. Khi biết mình không phải con ruột, cậu bị bán cho cụ Vitalis, một nghệ sĩ hát rong. Từ đây, cuộc đời Rémi bước vào những chuỗi ngày phiêu bạt khắp nước Pháp, sống nhờ tài năng ca hát và lòng tốt của những người cậu gặp trên đường. Trong hành trình ấy, Rémi không chỉ đối mặt với đói rét, bất công mà còn tìm thấy tình bạn, lòng yêu thương và hy vọng. Cậu học được ý nghĩa thực sự của gia đình - không phải chỉ là quan hệ máu mủ, mà còn là những trái tim cùng chung nhịp đập. Cuộc hành trình của Rémi đưa cậu qua nhiều cung bậc cảm xúc, từ hạnh phúc đến đau khổ, từ tình bạn đến sự phản bội. Qua từng trang sách, độc giả sẽ cảm nhận được sức mạnh của tình yêu thương và tấm lòng vị tha giữa những con người trong xã hội đầy phức tạp.Không Gia Đình là một câu chuyện cảm động về lòng nhân ái, nghị lực sống và niềm tin vào tương lai. Quyển sách mang đến cho bạn: - Gợi mở trong mỗi chúng ta những suy nghĩ về gia đình, tình thân và giá trị của sự kết nối giữa con người. - Độc giả sẽ được trải nghiệm nhiều bài học sâu sắc về cuộc sống, sự trưởng thành và vượt qua khó khăn. Tại sao bạn nên đọc? - Không Gia Đình là một trong những tác phẩm văn học thiếu nhi kinh điển của thế giới, được yêu thích qua nhiều thế hệ. - Bản dịch xuất sắc của Hà Mai Anh giúp người đọc Việt Nam cảm nhận trọn vẹn tinh thần của tác phẩm. - Một câu chuyện không chỉ dành cho trẻ em mà còn khiến người lớn phải suy ngẫm về ý nghĩa thực sự của "gia đình". - Cuốn sách phù hợp với mọi lứa tuổi, giúp nuôi dưỡng tâm hồn và khơi dậy lòng trắc ẩn. Hãy để “KHÔNG GIA ĐÌNH” của Hector Malot mở ra những chân trời mới trong trải nghiệm đọc của bạn! Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Hector Malot'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Hector Malot'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-khong-gia-dinh-bia-cung-tai-ban-2024/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-khong-gia-dinh-bia-cung-tai-ban-2024/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '8935352627525',
            'title'          => 'Làm Bạn Với Cô Nàng Dễ Thương Nhì Lớp - Tập 5 - Bản Giới Hạn - Tặng Kèm Postcard + Bookmark + Leaflet',
            'slug'           => 'lam-ban-voi-co-nang-de-thuong-nhi-lop-tap-5-ban-gioi-han-tang-kem-postcard-bookmark-leaflet',
            'image'          => '/images/vanhoc/lam-ban-voi-co-nang-de-thuong-nhi-lop-tap-5-ban-gioi-han-tang-kem-postcard-bookmark-leaflet/1.jpg',
            'price'          => 105000.0,
            'discount_price' => null,
            'stock_quantity' => 50,
            'page_count'     => '412',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 2 cm',
            'weight'         => '400',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Làm Bạn Với Cô Nàng Dễ Thương Nhì Lớp - Tập 5 “Cô nàng dễ thương nhì lớp” Asanagi Umi và tôi, Maehara Maki, đang mường tượng về một “chuyến du lịch trăng mật” trước thềm Tuần lễ Vàng. Nghĩ là vậy, nhưng hai đứa vẫn còn là học sinh cấp 3, tất nhiên sẽ không được cho phép đi chơi riêng… Thế nhưng, bố mẹ Umi lại đưa ra một đề xuất. Đó là: Tôi sẽ cùng gia đình cô ấy về thăm quê ở một khu suối nước nóng! Tính ra hai đứa hẹn hò cũng sắp nửa năm, chuyện tình cảm đang tiến triển rất tốt đẹp... Phải chăng đã đến lúc mối quan hệ này tiến thêm một bước nữa? Giữa lúc trong lòng còn đang bồn chồn trăn trở, tôi lại càng thêm hồi hộp, tim đập liên hồi khi được cùng Umi dạo bước quanh thị trấn, vui đùa bên bờ sông và đỉnh điểm là khu tắm chung ở suối nước nóng lộ thiên!? Mặt khác, biểu hiện của anh Riku - anh trai của Umi - lại cứ kì lạ sao đó. Dường như cuộc hội ngộ với cô bạn thanh mai trúc mã Shizuku đang khiến anh ấy mang nhiều tâm sự...? Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Takata'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Takata'],
            ]);
        }
        if (isset($authors['Azuri Hyuga'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Azuri Hyuga'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/lam-ban-voi-co-nang-de-thuong-nhi-lop-tap-5-ban-gioi-han-tang-kem-postcard-bookmark-leaflet/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/lam-ban-voi-co-nang-de-thuong-nhi-lop-tap-5-ban-gioi-han-tang-kem-postcard-bookmark-leaflet/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thế Giới'],
            'isbn'           => '9786043651591',
            'title'          => 'Lén Nhặt Chuyện Đời',
            'slug'           => 'len-nhat-chuyen-doi',
            'image'          => '/images/vanhoc/len-nhat-chuyen-doi/1.jpg',
            'price'          => 85000.0,
            'discount_price' => 68000.0,
            'stock_quantity' => 50,
            'page_count'     => '213',
            'publish_year'   => '2022',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1.1 cm',
            'weight'         => '223',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Lén Nhặt Chuyện Đời Tại vùng ngoại ô xứ Đan Mạch xưa, người thợ kim hoàn Per Enevoldsen đã cho ra mắt một món đồ trang sức lấy ý tưởng từ Pandora - người phụ nữ đầu tiên của nhân loại mang vẻ đẹp như một ngọc nữ phù dung, kiêu sa và bí ẩn trong Thần thoại Hy Lạp. Vòng Pandora được kết hợp từ một sợi dây bằng vàng, bạc hoặc bằng da cùng với những viên charm được chế tác đa dạng, tỉ mỉ. Ý tưởng của ông, mỗi viên charm như một câu chuyện, một kỷ niệm đáng nhớ của người sở hữu chiếc vòng. Khi một viên charm được thêm vào sợi Pandora là cuộc đời lại có thêm một ký ức cần lưu lại để nhớ, để thương, để trân trọng. Lén nhặt chuyện đời ra mắt trong khoảng thời gian chông chênh nhất của bản thân, hay nói cách khác là một cậu bé mới lớn, vừa bước ra khỏi cái vỏ bọc vốn an toàn của mình. Những câu chuyện trong Lén nhặt chuyện đời là những câu chuyện tôi được nghe kể lại, hoặc vô tình bắt gặp, hoặc nhặt nhạnh ở đâu đó trong miền ký ức rời rạc của quá khứ, không theo một trình tự hay một thời gian nào nhất định. Mỗi một câu chuyện là một viên charm lấp lánh, kiêu kỳ, có sức hút mạnh mẽ đối với một người trẻ như tôi luôn tò mò với những điều dung dị trong cuộc sống. Tôi âm thầm nhặt những viên charm ấy về, kết thành sợi Pandora cho chính mình. Lén ở đây không phải là một cái gì đó vụng trộm, âm thầm sợ người khác phát hiện. Mà nó là lặng lẽ. Tôi lặng lẽ nghe, lặng lẽ quan sát, lặng lẽ đi tìm và lặng lẽ viết nên quyển sách này. Tôi vẫn thích dùng từ Lén hơn, vì đơn giản, tôi thấy bản thân mình trong đó. Lén nhặt chuyện đời được chia thành năm chương: chương thứ nhất nói về tình yêu của cả giới trẻ và người tu sĩ; chương thứ hai viết về gia đình; chương thứ ba dành cho những người trẻ; chương thứ tư là những câu chuyện bên đời, những bài tâm sự của người tu sĩ; chương năm là thơ và chương cuối cùng là tâm sự của bản thân khi tôi đã về già. Nếu ai nghĩ Lén nhặt chuyện đời sẽ giảng thuyết về chân lý, định hướng cho người trẻ hay chữa lành những vết thương… thì đã tìm sai chỗ, bản thân chưa bao giờ nghĩ quyển sách này sẽ làm được điều đó. Đây chỉ là những câu chuyện, những suy nghĩ về cuộc đời của một người trẻ đang chông chênh. Đôi khi, tôi hóa thành một ông già của năm chục năm sau kể về những ký ức thời vụng dại. Chỉ mong sao, đọc Lén nhặt chuyện đời, người ta có thể tìm được đâu đó những viên charm phù hợp với bản thân mình. Quyển sách này sẽ là dấu ấn lớn nhất đối với cuộc đời của bản thân. Mỗi bài viết là một viên charm của Pandora Lén nhặt chuyện đời và Lén nhặt chuyện đời cũng sẽ là một viên charm lấp lánh trong sợi Pandora của cuộc đời tôi. Quyển sách này, xin được nhớ về những người Thầy của tôi, về Từ Quang, về gia đình, và tất cả những ai đã hiện diện trong thời thanh xuân của tôi. Để nhắc rằng, tôi đã từng có mặt trong cuộc đời của họ, và họ có mặt trong quyển sách này của tôi. Cảm ơn đã tìm đến sợi Pandora Lén nhặt chuyện đời, và nào, hãy cùng tôi bắt đầu đi tìm những viên charm, nhặt lên và xâu vào sợi Pandora của mình thôi! Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Mộc Trầm'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Mộc Trầm'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042264105',
            'title'          => 'Bộ [Light Novel] Ác Nữ Nửa Vời - Truyền Kì Hoán Hồn Đổi Xác - Tập 1 - Tặng Kèm Bookmark + Postcard PVC + Shikishi 2 Mặt',
            'slug'           => 'bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-1-tang-kem-bookmark-postcard-pvc-shikishi-2-mat',
            'image'          => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-1-tang-kem-bookmark-postcard-pvc-shikishi-2-mat/1.jpg',
            'price'          => 115000.0,
            'discount_price' => 98000.0,
            'stock_quantity' => 50,
            'page_count'     => '445',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 2.2 cm',
            'weight'         => '440',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '[Light Novel] Ác Nữ Nửa Vời - Truyền Kì Hoán Hồn Đổi Xác - Tập 1 CÂU CHUYỆN HOÁN ĐỔI RUNG CHUYỂN CẢ HẬU CUNG CHUẨN BỊ KHAI MÀN… Sồ Cung là cung điện dành cho các vị tiểu thư thuộc ngũ đại gia tộc đến tu dưỡng học tập để trở thành phi tử đời kế tiếp. Linh Lâm, tú nữ xinh đẹp yếu ớt tựa hồ điệp, người được ca ngợi rằng sẽ trở thành Hoàng hậu đời tiếp theo, một đêm Thất Tịch nọ bị hoán hồn đổi xác với Chu Tuệ Nguyệt, một tú nữ ganh ghét đố kị với cô! Bất thình lình trở thành Chu Tuệ Nguyệt, ác nữ mặt đầy tàn nhang mà người người căm ghét, không được ai tin tưởng, Linh Lâm bị tất cả những người từng yêu thương mình khinh thường, bị rơi vào hoàn cảnh vô cùng khó khăn, nhưng… “Không bị khó thở, cũng không bị ngất đi… Quả là một cơ thể khoẻ mạnh vô cùng…! Thật là ghen tị quá đi…” Linh Lâm mà ai cũng ngưỡng mộ, thực chất là một thiếu nữ có tinh thần thép, đã luôn phải chiến đấu với “cái chết” cận kề…?! Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Satsuki Nakamura'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Satsuki Nakamura'],
            ]);
        }
        if (isset($authors['Kana Yuki'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Kana Yuki'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-1-tang-kem-bookmark-postcard-pvc-shikishi-2-mat/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-1-tang-kem-bookmark-postcard-pvc-shikishi-2-mat/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042395403',
            'title'          => 'Bộ [Light Novel] Ác Nữ Nửa Vời - Truyền Kì Hoán Hồn Đổi Xác - Tập  2 - Tặng Kèm Bookmark + Postcard PVC + Card Ngọc Trai',
            'slug'           => 'bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-2-tang-kem-bookmark-postcard-pvc-card-ngoc-trai',
            'image'          => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-2-tang-kem-bookmark-postcard-pvc-card-ngoc-trai/1.jpg',
            'price'          => 115000.0,
            'discount_price' => 98000.0,
            'stock_quantity' => 50,
            'page_count'     => '424',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 2.1 cm',
            'weight'         => '415',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '[Light Novel] Ác Nữ Nửa Vời - Truyền Kì Hoán Hồn Đổi Xác - Tập 2 CÂU CHUYỆN HOÁN ĐỔI RUNG CHUYỂN CẢ HẬU CUNG ĐÃ BƯỚC SANG TẬP 2! Chu Tuệ Nguyệt, tú nữ bị tất cả mọi người căm ghét, vốn được coi là “ác nữ” đã hoán hồn đổi xác với Hoàng Linh Lâm, tú nữ được tất cả mọi người yêu quý ngưỡng mộ. Tuy nhiên… “Người là… tiểu thư Linh Lâm, có phải không?” Đã có một người nhận ra sự thật ẩn giấu này. Đó chính là Đông Tuyết, cung nữ thân thiết của Linh Lâm. Từ đó trở đi, mọi chuyện xung quanh Linh Lâm trở nên rối rắm. Ngay cả Nghiêu Minh và Thần Vũ cũng bắt đầu nhận ra sự kì lạ ở hai người… Cuộc sống hoán đổi đầy kích thích này sắp đến hồi kết thúc rồi. Trong khi đó, cung nữ Kim gia rắp tâm hãm hại Linh Lâm và Lị Lị vẫn còn đang ẩn mình sau bức màn tối. Linh Lâm quyết tâm sẽ làm sáng tỏ toàn bộ chân tướng…! *** “Nữ chính là một người luôn tích cực và đầy nghị lực. Điều tuyệt vời nhất ở cô ấy là khả năng giữ cân bằng - giống như thành ngữ ‘vững như bàn thạch’. Dù hành xử như ‘ác nữ’, nhưng cô ấy không bao giờ đi chệch khỏi con đường chính nghĩa. Chính điều đó khiến câu chuyện trở nên thật sảng khoái và cuốn hút! Đây là một nhân vật mà bạn chắc chắn sẽ muốn cổ vũ.” - HYUGANATSU, tác giả bộ truyện Dược sư tự sự. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Satsuki Nakamura'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Satsuki Nakamura'],
            ]);
        }
        if (isset($authors['Kana Yuki'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Kana Yuki'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-2-tang-kem-bookmark-postcard-pvc-card-ngoc-trai/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-2-tang-kem-bookmark-postcard-pvc-card-ngoc-trai/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042399326',
            'title'          => 'Bộ [Light Novel] Ác Nữ Nửa Vời - Truyền Kì Hoán Hồn Đổi Xác - Tập 3 - Tặng Kèm Bookmark + Postcard PVC + Lót Ly 2 Mặt',
            'slug'           => 'bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-3-tang-kem-bookmark-postcard-pvc-lot-ly-2-mat',
            'image'          => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-3-tang-kem-bookmark-postcard-pvc-lot-ly-2-mat/1.jpg',
            'price'          => 130000.0,
            'discount_price' => 111000.0,
            'stock_quantity' => 50,
            'page_count'     => '496',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 2.4 cm',
            'weight'         => '480',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '[Light Novel] Ác Nữ Nửa Vời - Truyền Kì Hoán Hồn Đổi Xác - Tập 3 CÂU CHUYỆN HOÁN ĐỔI RUNG CHUYỂN CẢ HẬU CUNG – MÀN HAI: “CHUYẾN XUẤT CUNG ĐẦU TIÊN” CHÍNH THỨC KHAI MÀN “Lễ hội cầu mùa lần này được tổ chức tại lãnh địa phía Nam!” Điểm đến được chọn cho chuyến công du đầu tiên sau khi trở thành tú nữ, lại chính là quê nhà của kẻ bị ghét bỏ nhất trong cung - Chu Tuệ Nguyệt! Không có một vị phi tần nào làm hậu thuẫn, Tuệ Nguyệt một mình tất bật chuẩn bị. Linh Lâm vừa hết lòng hỗ trợ, vừa háo hức mong chờ lần đầu được ra khỏi cung… Thế nhưng… Vì bị kẻ lạ mặt phá rối nghi lễ, Tuệ Nguyệt mất kiểm soát và bộc phát sức mạnh. Rốt cuộc lại… hoán đổi thân xác lần nữa! Giữa cơn hỗn loạn đó, dân làng toan bắt cóc Tuệ Nguyệt, còn Linh Lâm lại không hiểu vì sao lại cùng anh trai mình chủ động giơ tay chịu trói!? Trong khi Nghiêu Minh rơi vào tình cảnh không thể hành động, Thần Vũ lại một mình lần theo dấu vết, các ông anh trai của Linh Lâm ưa nuông chiều em gái sẽ khiến mọi thứ như nổ tung trong tập 3 này! *** “Nữ chính là một người luôn tích cực và đầy nghị lực. Điều tuyệt vời nhất ở cô ấy là khả năng giữ cân bằng - giống như thành ngữ ‘vững như bàn thạch’. Dù hành xử như ‘ác nữ’, nhưng cô ấy không bao giờ đi chệch khỏi con đường chính nghĩa. Chính điều đó khiến câu chuyện trở nên thật sảng khoái và cuốn hút! Đây là một nhân vật mà bạn chắc chắn sẽ muốn cổ vũ.” - HYUGANATSU, tác giả bộ truyện Dược sư tự sự. “Tôi nghĩ điều cuốn hút nhất vẫn là nhân vật Linh Lâm. Hiếm có một nhân vật nào dễ mến đến vậy. Tôi đã say mê cô gái này, dù trước hay sau khi hoán đổi đều luôn hướng về phía trước, không nản lòng trong mọi cảnh ngộ. Điều tạo nên sự cuốn hút ở cô ấy, không chỉ là dáng vẻ đáng yêu mà còn ở sự kiên cường. Ngay cả với nhân vật ‘phản diện’ cũng có rất nhiều điểm có thể đồng cảm, càng đọc càng thấy Tuệ Nguyệt ‘đáng ghét’ dần trở nên đáng yêu, điều đó thật không khỏi ghen tị.” - KEISUKE INOUE, đạo diễn anime Chuyển sinh thành tiểu thư phản diện độc ác trong otome game, Masamune báo thù. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Satsuki Nakamura'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Satsuki Nakamura'],
            ]);
        }
        if (isset($authors['Kana Yuki'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Kana Yuki'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-3-tang-kem-bookmark-postcard-pvc-lot-ly-2-mat/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-3-tang-kem-bookmark-postcard-pvc-lot-ly-2-mat/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042399609',
            'title'          => 'Bộ [Light Novel] Ác Nữ Nửa Vời - Truyền Kì Hoán Hồn Đổi Xác - Tập 4 - Tặng Kèm Bookmark + Postcard PVC + Phiến Quạt Treo',
            'slug'           => 'bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-4-tang-kem-bookmark-postcard-pvc-phien-quat-treo',
            'image'          => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-4-tang-kem-bookmark-postcard-pvc-phien-quat-treo/1.jpg',
            'price'          => 115000.0,
            'discount_price' => 98000.0,
            'stock_quantity' => 50,
            'page_count'     => '412',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 2 cm',
            'weight'         => '390',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '[Light Novel] Ác Nữ Nửa Vời - Truyền Kì Hoán Hồn Đổi Xác - Tập 4 CÂU CHUYỆN HOÁN ĐỔI RUNG CHUYỂN CẢ HẬU CUNG - MÀN HAI: “CHUYẾN XUẤT CUNG ĐẦU TIÊN” KHÉP LẠI! “Tại sao… mình không ngăn cản được họ…” Linh Lâm, trong thân xác của Tuệ Nguyệt chịu sự ghét bỏ, đã bị người dân ấp hạ tiện bắt cóc! Khi bệnh dịch mới lắng xuống một chút, thủ lĩnh Vân Lam bị đâm trọng thương. Chứng kiến cậu hấp hối sắp chết, Linh Lâm trở nên dao động, suy sụp nặng nề, khiến Thần Vũ và Cảnh Hành đều không khỏi lo lắng. Phía bên kia, Tuệ Nguyệt quyết tâm tổ chức “tiệc trà” tập hợp các tú nữ lại, bất chấp sự lo ngại của Nghiêu Minh và Cảnh Chương. Trong cuộc chiến tâm lí giữa các tú nữ, Tuệ Nguyệt đã nhổ bỏ nanh độc của Lam Phương Xuân, kẻ đang rắp tâm bôi nhọ cô, và phản kích trở lại…!? Chuyến xuất cung đầy trắc trở với đủ chuyện xảy ra, Tuệ Nguyệt bị quấy rối, lễ hội gián đoạn, và bệnh dịch bùng phát. Tất cả đều dẫn đến những biến chuyển trong tâm lí của Linh Lâm và Tuệ Nguyệt. Màn hai của bộ truyện được nhiều yêu thích đến hồi kết, với tập 4 hứa hẹn những giọt nước mắt cùng lòng quyết tâm. *** “Nữ chính là một người luôn tích cực và đầy nghị lực. Điều tuyệt vời nhất ở cô ấy là khả năng giữ cân bằng - giống như thành ngữ ‘vững như bàn thạch’. Dù hành xử như ‘ác nữ’, nhưng cô ấy không bao giờ đi chệch khỏi con đường chính nghĩa. Chính điều đó khiến câu chuyện trở nên thật sảng khoái và cuốn hút! Đây là một nhân vật mà bạn chắc chắn sẽ muốn cổ vũ.” - HYUGANATSU, tác giả bộ truyện Dược sư tự sự. “Tôi nghĩ điều cuốn hút nhất vẫn là nhân vật Linh Lâm. Hiếm có một nhân vật nào dễ mến đến vậy. Tôi đã say mê cô gái này, dù trước hay sau khi hoán đổi đều luôn hướng về phía trước, không nản lòng trong mọi cảnh ngộ. Điều tạo nên sự cuốn hút ở cô ấy, không chỉ là dáng vẻ đáng yêu mà còn ở sự kiên cường. Ngay cả với nhân vật ‘phản diện’ cũng có rất nhiều điểm có thể đồng cảm, càng đọc càng thấy Tuệ Nguyệt ‘đáng ghét’ dần trở nên đáng yêu, điều đó thật không khỏi ghen tị.” - KEISUKE INOUE, đạo diễn anime Chuyển sinh thành tiểu thư phản diện độc ác trong otome game, Masamune báo thù. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Satsuki Nakamura'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Satsuki Nakamura'],
            ]);
        }
        if (isset($authors['Kana Yuki'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Kana Yuki'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-4-tang-kem-bookmark-postcard-pvc-phien-quat-treo/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-ac-nu-nua-voi-truyen-ki-hoan-hon-doi-xac-tap-4-tang-kem-bookmark-postcard-pvc-phien-quat-treo/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thế Giới'],
            'isbn'           => '8935250718516',
            'title'          => '[Light Novel] Văn Hào Lưu Lạc - Tập 8 - Storm Bringer - Bản Đặc Biệt - Tặng Kèm Card Bo Góc Kèm Phong Bì',
            'slug'           => 'light-novel-van-hao-luu-lac-tap-8-storm-bringer-ban-dac-biet-tang-kem-card-bo-goc-kem-phong-bi',
            'image'          => '/images/vanhoc/light-novel-van-hao-luu-lac-tap-8-storm-bringer-ban-dac-biet-tang-kem-card-bo-goc-kem-phong-bi/1.jpg',
            'price'          => 190000.0,
            'discount_price' => 152000.0,
            'stock_quantity' => 50,
            'page_count'     => '520',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '18 x 13 x 2.6 cm',
            'weight'         => '540',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '[Light Novel] Văn Hào Lưu Lạc - Tập 8 - Storm Bringer Đã một năm trôi qua kể từ khi cùng Dazai Osamu xử lý “Vụ việc Arahabaki” và gia nhập Port Mafia, Nakahara Chuya giờ đây đang nhắm tới vị trí trong ban lãnh đạo thì xuất hiện trước mặt cậu là vua ám sát Paul Verlaine, người gọi cậu là em trai. Verlaine tuyên bố sẽ ám sát toàn bộ những kẻ Chuya yêu quý. Để ngăn chặn kế hoạch ấy, Chuya hợp tác với Adam, một điều tra viên là sản phẩm của trí tuệ nhân tạo châu Âu. Đó là điềm báo cho cơn bão sẽ lần nữa nuốt chửng Yokohama. Nakahara Chuya rốt cuộc là “gì”? Chân tướng của quá khứ vốn được bọc trong bóng tối đen kịt giờ đây sẽ sáng tỏ...! Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Asagiri Kafka'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Asagiri Kafka'],
            ]);
        }
        if (isset($authors['Harukawa Sango'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Harukawa Sango'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/light-novel-van-hao-luu-lac-tap-8-storm-bringer-ban-dac-biet-tang-kem-card-bo-goc-kem-phong-bi/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/light-novel-van-hao-luu-lac-tap-8-storm-bringer-ban-dac-biet-tang-kem-card-bo-goc-kem-phong-bi/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/light-novel-van-hao-luu-lac-tap-8-storm-bringer-ban-dac-biet-tang-kem-card-bo-goc-kem-phong-bi/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Trẻ'],
            'isbn'           => '8934974178637',
            'title'          => 'Bộ Mắt Biếc (Tái Bản 2022)',
            'slug'           => 'bo-mat-biec-tai-ban-2022',
            'image'          => '/images/vanhoc/bo-mat-biec-tai-ban-2022/1.jpg',
            'price'          => 43000.0,
            'discount_price' => 37000.0,
            'stock_quantity' => 50,
            'page_count'     => '244',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '14.5 x 10 x 0.5 cm',
            'weight'         => '230',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Mắt Biếc Một tác phẩm được nhiều người bình chọn là hay nhất của nhà văn này. Một tác phẩm đang được dịch và giới thiệu tại Nhật Bản (theo thông tin từ các báo)… Bởi sự trong sáng của một tình cảm, bởi cái kết thúc rất, rất buồn khi suốt câu chuyện vẫn là những điều vui, buồn lẫn lộn (cái kết thúc không như mong đợi của mọi người). Cũng bởi, mắt biếc… năm xưa nay đâu (theo lời một bài hát) Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-mat-biec-tai-ban-2022/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Quân Đội Nhân Dân'],
            'isbn'           => '8938563609069',
            'title'          => 'Bộ Mưa Đỏ - Ấn Bản Kỷ Niệm - Bìa Cứng - Tặng Kèm Bookmark + Móc Khoá Balo Mũ Cối - Độc Quyền Fahasa',
            'slug'           => 'bo-mua-do-an-ban-ky-niem-bia-cung-tang-kem-bookmark-moc-khoa-balo-mu-coi-doc-quyen-fahasa',
            'image'          => '/images/vanhoc/bo-mua-do-an-ban-ky-niem-bia-cung-tang-kem-bookmark-moc-khoa-balo-mu-coi-doc-quyen-fahasa/1.jpg',
            'price'          => 249000.0,
            'discount_price' => 175000.0,
            'stock_quantity' => 50,
            'page_count'     => '392',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14.5 x 2.1 cm',
            'weight'         => '600',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Mưa Đỏ “Mưa đỏ” là tiểu thuyết của nhà văn Chu Lai, kết quả sau nhiều năm trăn trở và sáng tạo. Tiểu thuyết lấy bối cảnh chính là cuộc chiến đấu bảo vệ Thành cổ Quảng Trị mùa hè năm 1972, cả ở hai bên chiến tuyến (ta và địch), xoay quanh trục hai nhân vật chính: Cường (chiến sĩ Giải phóng) và Quang (tên chỉ huy hắc báo của ngụy). Bên cạnh đó là bối cảnh trên bàn đàm phán ở Pa-ri với nhân vật bà mẹ của Cường - một nhà ngoại giao là thành viên của đoàn đàm phán phía ta… Tác giả đã mượn phông nền của một sự kiện lịch sử điển hình nhưng cũng khá “nhạy cảm” trong cuộc kháng chiến chống Mỹ, cứu nước để dựng lại bức tranh bi tráng về cuộc chiến đấu bảo vệ Thành cổ 81 ngày đêm mùa hè đỏ lửa năm 1972. Bằng ngòi bút đậm chất văn miêu tả, không ôm đồm đi vào “bề rộng” của không gian cuộc chiến, mà đi vào chiều sâu của những chi tiết, những nhân vật; lột tả tính chất khốc liệt và bi tráng, tác giả nhập hồn vào từng nhân vật để giúp bạn đọc thấy được tâm trạng giằng xé trong từng cảnh huống: Cả sự dũng cảm và đớn hèn, cái thiện và cái á.c,… sự bùng n.ổ những trạng thái tích cực và tiêu cực… của những con người từng giây, từng phút phải đối mặt với sự hy sinh, chết chóc đến bất cứ lúc nào. Đan cài trong những trang miêu tả cuộc chiến đọc đến gai người là những khoảng bình yên, lãng mạn đầy chất thơ của tình yêu nảy mầm trong lửa đạn, của những sự hào hoa, phóng túng rất đời… (Trích giới thiệu trên báo Quân đội nhân dân đăng tải ngày 29/04/2016) Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Chu Lai'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Chu Lai'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-mua-do-an-ban-ky-niem-bia-cung-tang-kem-bookmark-moc-khoa-balo-mu-coi-doc-quyen-fahasa/2.png', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-mua-do-an-ban-ky-niem-bia-cung-tang-kem-bookmark-moc-khoa-balo-mu-coi-doc-quyen-fahasa/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-mua-do-an-ban-ky-niem-bia-cung-tang-kem-bookmark-moc-khoa-balo-mu-coi-doc-quyen-fahasa/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-mua-do-an-ban-ky-niem-bia-cung-tang-kem-bookmark-moc-khoa-balo-mu-coi-doc-quyen-fahasa/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thế Giới'],
            'isbn'           => '8932000134749',
            'title'          => 'Nếu Biết Trăm Năm Là Hữu Hạn - Ấn Bản Kỉ Niệm 10 Năm Xuất Bản (Tái Bản 2024)',
            'slug'           => 'neu-biet-tram-nam-la-huu-han-an-ban-ki-niem-10-nam-xuat-ban-tai-ban-2024',
            'image'          => '/images/vanhoc/neu-biet-tram-nam-la-huu-han-an-ban-ki-niem-10-nam-xuat-ban-tai-ban-2024/1.jpg',
            'price'          => 159000.0,
            'discount_price' => 136000.0,
            'stock_quantity' => 50,
            'page_count'     => '263',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 13 x 1.2 cm',
            'weight'         => '279',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'NẾU BIẾT TRĂM NĂM LÀ HỮU HẠN - LÁ THƯ GỬI NHỮNG NGƯỜI TRẺ ĐANG LẠC LỐI Bạn đã bao giờ tự hỏi: Nếu biết trước cuộc đời là hữu hạn, bạn sẽ sống khác đi chứ? Chúng ta luôn nghĩ mình có nhiều thời gian, nhưng thực tế, mọi khoảnh khắc đều đang trôi qua mãi mãi . VỀ TÁC GIẢ : PHẠM LỮ ÂN Là bút danh của đôi vợ chồng nhà báo chuyên viết cho giới trẻ, là Đặng Nguyễn Đông Vy và Nguyễn Hoàng Mai, hai nhà văn nổi bật trong dòng sách truyền cảm hứng. Những tác phẩm của họ không chỉ là lời kể, mà là những triết lý sống sâu sắc, giúp độc giả nhìn lại chính mình. Nếu Biết Trăm Năm Là Hữu Hạn là một trong những cuốn sách được yêu thích nhất, giúp hàng ngàn người trẻ tìm lại ý nghĩa của cuộc sống. TÓM TẮT NỘI DUNG SÁCH Nếu Biết Trăm Năm Là Hữu Hạn là tập hợp 40 bài viết nhẹ nhàng nhưng sâu sắc, giàu cảm xúc từ chuyên mục Cảm thức của Bán nguyệt san Sinh Viên Việt Nam . Cuốn sách dẫn dắt người đọc đi sâu vào những cảm nhận về cuộc đời, tình yêu, tình bạn và sự thành bại, đặt ra những câu hỏi mà ai cũng từng nghĩ đến nhưng ít ai dám đối diện: Chúng ta đang sống hay chỉ đang tồn tại? Hạnh phúc thực sự nằm ở đâu? Điều gì sẽ khiến chúng ta không hối tiếc khi nhìn lại? Với giọng văn dung dị, thân mật, tác giả dễ dàng chạm đến trái tim người đọc, khiến ta như đang lắng nghe một người bạn tâm sự. Những câu chuyện giản dị nhưng chứa nhiều tầng cảm xúc: hoài niệm, sâu sắc, chân thành - gợi mở những suy ngẫm mới mẻ về giá trị của từng khoảnh khắc trong cuộc đời. Cuốn sách không chỉ là một tác phẩm văn học mà còn là một lời nhắc nhở nhẹ nhàng: Thời gian là hữu hạn, hãy sống sao cho xứng đáng! Vì sao bạn không nên bỏ lỡ cuốn sách này? Nếu bạn từng trì hoãn hạnh phúc của mình cho một ngày "đủ đầy" trong tương lai. Nếu bạn từng loay hoay giữa những lựa chọn, sợ hãi mình sẽ hối tiếc. Nếu bạn muốn sống một cuộc đời mà không phải quay đầu nhìn lại với tiếc nuối. Cuốn sách giúp bạn nhận ra điều gì? Nếu Biết Trăm Năm Là Hữu Hạn là một lời nhắc nhở nhẹ nhàng nhưng đầy ám ảnh, giúp bạn nhận ra: Hạnh phúc không nằm ở tương lai xa vời mà ngay trong hiện tại. Cuộc sống hữu hạn, đừng chờ đến khi quá muộn mới nhận ra điều gì đáng giá. Những gì nhỏ bé hôm nay có thể trở thành những kỷ niệm lớn nhất mai sau. Nếu biết trăm năm là hữu hạn, liệu bạn có sống khác đi? => MUA NGAY Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Phạm Lữ Ân'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Phạm Lữ Ân'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/neu-biet-tram-nam-la-huu-han-an-ban-ki-niem-10-nam-xuat-ban-tai-ban-2024/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974208075',
            'title'          => 'Bộ Ngày Xưa Có Một Chuyện Tình - Khổ Nhỏ (Tái Bản 2025)',
            'slug'           => 'bo-ngay-xua-co-mot-chuyen-tinh-kho-nho-tai-ban-2025',
            'image'          => '/images/vanhoc/bo-ngay-xua-co-mot-chuyen-tinh-kho-nho-tai-ban-2025/1.jpg',
            'price'          => 77000.0,
            'discount_price' => 66000.0,
            'stock_quantity' => 50,
            'page_count'     => '296',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '14.5 x 10 x 1.4 cm',
            'weight'         => '140',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Ngày Xưa Có Một Chuyện Tình Đúng như tên gọi, đây là cuốn sách về tình yêu, được viết theo một phong cách hoàn toàn khác lạ với nhà văn Nguyễn Nhật Ánh từ trước đến nay. Tác phẩm phù hợp với đông đảo đối tượng độc giả và được Nhà xuất bản Trẻ đầu tư mạnh về hình thức cũng như truyền thông, tiếp thị...Ngày xưa có một chuyện tình là một câu chuyện cảm động khi người ta yêu nhau, nỗi khát khao một hạnh phúc êm đềm ấm áp đến thế; hay đơn giản chỉ là chuyện ba người - anh, em, và người ấy...? Khi mở sách ra, độc giả sẽ được chứng kiến làn gió tình yêu chảy qua như rải nắng trên khuôn mặt mùa đông của cô gái; nụ hôn đầu tiên ngọt mật, cái ôm đầu tiên, những giọt nước mắt và cái ôm xiết cuối cùng của tấm tình người yêu người...Và người đọc sẽ tìm thấy câu trả lời, cho riêng mình. - Miền nè. - Gì hở Phúc? - Có chuyện này nè. - Chuyện gì vậy? - Ở trong lớp mình ấy mà. - Trong lớp mình sao? - Lần này tôi thấy đôi lông mày Miền nhướn lên. Nó vừa hỏi vừa xoáy mắt vào mặt tôi, chắc nó lấy làm lạ trước lối nói chuyện lòng vòng của tôi. Ngay cả tôi, tôi cũng thấy tôi không giống mọi hôm chút nào và phát hiện đó khiến tôi gần như nổi điên lên với chính mình.Tôi nói nhanh: - Có một bạn trong lớp đang thích Miền đó. Tôi rơi vào tình yêu như thiên thạch bị rơi vào lỗ đen. Tôi bị tình yêu đó nuốt chửng với một sức mạnh không sao cưỡng lại được. Suốt một thời gian dài, tôi trượt trên tình yêu như trượt trên vỏ chuối, ngây ngất, mê man, chỉ khi nào té ngã thì đà trượt đó mới dừng lại. Có cái gì đó làm tôi lạc lối. Nó khiến tôi tin rằng đạo đức là cái con người vẽ ra chứ không phải là cái vẽ ra con người. Nó khiến tôi sẵn sàng nổi loạn, chẳng buồn bận tâm cuộc đời mình rồi sẽ trôi dạt về đâu, những thứ gì sẽ đổ lên cuộc đời mình. Và tôi, thoạt đầu là tin một cách ngây thơ, về sau thì cố tin đó là tình yêu để biện hộ cho hành động của mình. Nhưng yêu kiểu như tôi yêu Phúc thì càng yêu tôi càng hiểu về tình yêu ít hơn....Có cái gì đó mù lòa, say đắm, điên rồ, ảo giác, đẫm mê hương trong cuộc tình này. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ngay-xua-co-mot-chuyen-tinh-kho-nho-tai-ban-2025/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ngay-xua-co-mot-chuyen-tinh-kho-nho-tai-ban-2025/3.JPG', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ngay-xua-co-mot-chuyen-tinh-kho-nho-tai-ban-2025/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ngay-xua-co-mot-chuyen-tinh-kho-nho-tai-ban-2025/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Thanh Niên'],
            'isbn'           => '8935095631537',
            'title'          => 'Người Bà Tài Giỏi Vùng Saga',
            'slug'           => 'nguoi-ba-tai-gioi-vung-saga',
            'image'          => '/images/vanhoc/nguoi-ba-tai-gioi-vung-saga/1.jpg',
            'price'          => 128000.0,
            'discount_price' => 103000.0,
            'stock_quantity' => 50,
            'page_count'     => '216',
            'publish_year'   => '2021',
            'language'       => 'Tieng Viet',
            'dimensions'     => '18.5 x 13 cm',
            'weight'         => '100',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Hạnh phúc không phải là thứ được định đoạt bằng tiền. Hạnh phúc phải được định đoạt bằng tâm thế của mỗi chúng ta. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Yoshichi Shimada'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Yoshichi Shimada'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/nguoi-ba-tai-gioi-vung-saga/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/nguoi-ba-tai-gioi-vung-saga/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974182375',
            'title'          => 'Người Đàn Ông Mang Tên OVE (Tái Bản)',
            'slug'           => 'nguoi-dan-ong-mang-ten-ove-tai-ban',
            'image'          => '/images/vanhoc/nguoi-dan-ong-mang-ten-ove-tai-ban/1.jpg',
            'price'          => 160000.0,
            'discount_price' => 136000.0,
            'stock_quantity' => 50,
            'page_count'     => '452',
            'publish_year'   => '2022',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 cm',
            'weight'         => '430',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'NGƯỜI ĐÀN ÔNG MANG TÊN OVE - CUỐN SÁCH KHIẾN TRIỆU ĐỘC GIẢ CƯỜI RỒI KHÓC Bạn có tin rằng một ông lão cộc cằn, khó tính lại có thể khiến bạn rơi nước mắt vì xúc động? Bạn đã bao giờ nghĩ rằng lòng nhân ái có thể đến từ những con người tưởng chừng khô khan nhất? Một ông lão cộc cằn, một con mèo hoang, vài người hàng xóm phiền phức - tất cả có thể tạo nên một câu chuyện khiến bạn bật khóc? VỀ TÁC GIẢ : Fredrik Backman - Hành trình trở thành nhà Văn được yêu thích Fredrik Backman (sinh năm 1981) là nhà văn, blogger và nhà báo người Thụy Điển. Trước khi trở thành tiểu thuyết gia, ông từng viết blog và làm phóng viên cho một tờ báo địa phương. Năm 2012, ông xuất bản Người Đàn Ông Mang Tên Ove, tác phẩm nhanh chóng trở thành hiện tượng toàn cầu, lọt top bán chạy tại nhiều quốc gia. Ông nổi tiếng với lối viết hài hước, cảm động và đầy tính nhân văn, đưa những câu chuyện đời thường trở nên sâu sắc và đáng nhớ. VỀ DỊCH GIẢ : Hoàng Anh - Người thổi hồn vào tác phẩm Hoàng Anh là dịch giả tận tâm, mang văn học thế giới đến gần hơn với độc giả Việt. Với lối dịch trôi chảy, giàu cảm xúc, anh đã giúp những câu chuyện nước ngoài trở nên gần gũi và chân thực hơn. Một số tác phẩm dịch tiêu biểu: Người Đàn Ông Mang Tên Ove - Fredrik Backman Britt-Marie Đã Ở Đây - Fredrik Backman Lời Hứa Lúc Bình Minh - Romain Gary TÓM TẮT NỘI DUNG SÁCH Ove là một người đàn ông 59 tuổi, sống một cuộc đời nghiêm túc, theo nguyên tắc và không thích thay đổi. Ông cộc cằn, khó gần, thậm chí có vẻ đáng ghét. Nhưng sâu bên trong, Ove là một người đàn ông mang nhiều nỗi đau, đặc biệt là sau khi mất đi người vợ yêu dấu. Cuộc sống của Ove đảo lộn khi một gia đình trẻ chuyển đến bên cạnh nhà ông và sự xuất hiện của con mèo hoang. Họ vô tình “xâm nhập” vào cuộc sống đơn độc của ông, kéo theo những tình huống dở khóc dở cười. Dần dần, tấm lòng nhân hậu của Ove được hé lộ , chứng minh rằng ngay cả những người khép kín nhất cũng có thể mở lòng khi gặp đúng người. Cuốn sách này cũng đã được chuyển thể thành bộ phim đình đám với sự tham gia của Tom Hanks , đã được đề cử ở hạng mục phim nói tiếng nước ngoài hay nhất tại Oscar 2017 . Quyển sách mang đến cho độc giả: Chạm đến cảm xúc – Hài hước, cảm động và đầy nhân văn. Nhìn cuộc sống theo cách khác – Đằng sau vẻ ngoài cộc cằn là một trái tim ấm áp. Tình người giản dị nhưng sâu sắc – Những kết nối nhỏ bé có thể thay đổi cả một đời người. Chữa lành và truyền cảm hứng – Dành cho những ai từng cô đơn, lạc lõng Tại sao độc giả nên đọc? Cuốn sách mang chất trào lộng duyên dáng kiểu Bắc Âu nhưng cũng tràn đầy tính nhân văn, đã trở thành hiện tượng toàn cầu với gần 3 triệu bản in bán ra. Sách xuất bản bằng tiếng Anh vào năm 2013 và lọt vào danh sách Sách bán chạy nhất của New York Times 18 tháng sau khi xuất bản và ở trong danh sách thứ 42 tuần. Độc giả đã sẵn sàng bước vào thế giới của Ove. Chốt đơn tại Fahasa ngay nào Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Fredrik Backman'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Fredrik Backman'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Hội Nhà Văn'],
            'isbn'           => '8935235247376',
            'title'          => 'Bộ Nhà Giả Kim (Tái Bản 2025)',
            'slug'           => 'bo-nha-gia-kim-tai-ban-2025',
            'image'          => '/images/vanhoc/bo-nha-gia-kim-tai-ban-2025/1.jpg',
            'price'          => 95000.0,
            'discount_price' => 76000.0,
            'stock_quantity' => 50,
            'page_count'     => '228',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14 x 1.1 cm',
            'weight'         => '240',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Nhà Giả Kim NHÀ GIẢ KIM - HÀNH TRÌNH ĐI TÌM KHO BÁU HAY CUỘC HÀNH TRÌNH TÌM KIẾM CHÍNH MÌNH "Nhà Giả Kim" không đơn thuần là một cuốn tiểu thuyết, mà là bản đồ dẫn lối đến giấc mơ, khao khát và định mệnh của mỗi con người. Câu chuyện về chàng trai chăn cừu Santiago không chỉ mang đến những cuộc phiêu lưu hấp dẫn, mà còn mở ra nhiều tầng triết lý sâu sắc về cuộc sống. VỀ TÁC GIẢ Paulo Coelho - Là nhà văn người Brazil, bậc thầy kể chuyện với lối viết đậm chất triết lý. - Ông là tác giả của nhiều tác phẩm truyền cảm hứng, trong đó "Nhà Giả Kim" là cuốn sách nổi tiếng nhất, được dịch ra hơn 80 ngôn ngữ và bán hàng triệu bản trên toàn thế giới. - Các tác phẩm khác của ông như "Veronika quyết chết", "Nhà tiên tri" hay "Phù thủy thành phố Portobello" cũng để lại dấu ấn sâu sắc trong lòng độc giả. VỀ DỊCH GIẢ Lê Chu Cầu - Là dịch giả có nhiều đóng góp trong việc đưa văn học nước ngoài đến với độc giả Việt Nam. - Ông đã chuyển ngữ nhiều tác phẩm kinh điển, trong đó bản dịch "Nhà Giả Kim" của ông được đánh giá cao bởi sự mượt mà, giàu cảm xúc và giữ trọn vẹn tinh thần triết lý của Paulo Coelho. TÓM TẮT NỘI DUNG SÁCH Santiago – một chàng trai chăn cừu trẻ tuổi, rời quê hương để theo đuổi giấc mơ tìm kho báu ở Kim Tự Tháp Ai Cập. Trên hành trình ấy, anh gặp gỡ nhiều người, từ ông vua thông thái, người buôn pha lê đến Nhà Giả Kim huyền bí. Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người. Mỗi cuộc gặp gỡ không chỉ giúp anh tiến gần hơn đến kho báu mà còn giúp anh hiểu được mục đích thật sự của đời mình: - Trích Nhà giả Kim: "Kho báu không nằm ở nơi ta đến, mà nằm trong chính hành trình ta đi." Quyển sách mang đến cho độc giả: - Truyền cảm hứng mạnh mẽ để theo đuổi đam mê, ước mơ. - Khám phá những triết lý sâu sắc về cuộc sống và định mệnh. - Một câu chuyện lôi cuốn, đầy tính phiêu lưu nhưng cũng giàu chất thơ và suy ngẫm. - Một nguồn cảm hứng lớn lao, thể hiện sức mạnh của lòng trung thành và tình bạn. - Những bài học về lòng dũng cảm, sự hy sinh vì người khác sẽ khiến độc giả suy ngẫm và trân trọng hơn những giá trị cuộc sống. Tại sao độc giả nên đọc? - Tác phẩm đã được dịch ra 67 ngôn ngữ và bán ra tới 95 triệu bản (theo thống kê ngày 19 tháng 5 năm 2008), trở thành một trong những cuốn sách bán chạy nhất mọi thời đại. - Một trong những cuốn sách truyền cảm hứng bán chạy nhất mọi thời đại. - Phù hợp với mọi độ tuổi, đặc biệt dành cho những ai đang tìm kiếm mục đích sống. - Mỗi trang viết đều chứa đựng triết lý sống sâu sắc và những câu chuyện đầy cảm hứng. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Paulo Coelho'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Paulo Coelho'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-nha-gia-kim-tai-ban-2025/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-nha-gia-kim-tai-ban-2025/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Văn Học'],
            'isbn'           => '8935095632053',
            'title'          => 'Nhật Ký Trong Tù (Tái Bản)',
            'slug'           => 'nhat-ky-trong-tu-tai-ban',
            'image'          => '/images/vanhoc/nhat-ky-trong-tu-tai-ban/1.jpg',
            'price'          => 48000.0,
            'discount_price' => 39000.0,
            'stock_quantity' => 50,
            'page_count'     => '175',
            'publish_year'   => '2021',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20.5 x 13.5 cm',
            'weight'         => '300',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Nhật Ký Trong Tù (Tái Bản) Chủ tịch Hồ Chí Minh là vị lãnh tụ thiên tài của Đảng và nhân dân Việt Nam, anh hùng giải phóng dân tộc, danh nhân văn hoá thế giới. Người kết tinh trong mình những phẩm chất và giá trị tinh thần cao quý nhất của giai cấp công nhân và dân tộc việt Nam. Cuộc đời, sự nghiệp của Người là một tấm gương sáng vì dân, vì nước. Trong suốt cuộc đời hoạt động cách mạng, Người đã trải qua nhiều khó khăn, gian khổ, thậm chí nguy hiểm đến tính mạng, nhưng dù bất kỳ hoàn cảnh nào. Người cũng vẫn luôn lạc quan, tin tưởng vào thắng lợi của cách mạng. Tinh thần ấy thể hiện rõ trong nhiều trước tác của Người, trong đó tập thơ Nhật ký trong tù. Đây là một tập thơ chữ Hán, gồm hơn một trăm bài thơ, phần cuối có một số ghi chép về quân sự và thời sự, được Chủ tịch Hồ Chí Minh sáng tác trong thời gian hơn một năm (từ 29-8-1942 đến 10-9-1943) Người bị chính quyền địa phương của Tưởng Giới Thạch bắt giam trái phép tại các nhà tù ở tỉnh Quảng tây, Trung Quốc. Nhật ký trong tù lên án chế độc nhà tù hà khắc của chính quyền Quốc dân Đảng, thể hiện tinh thần lạc quan cách mạng và tình cảm nhân đạo cộng sản chủ nghĩa cao đẹp của Chủ tịch Hồ Chí Minh. Tập thơ được đánh giá là một văn kiện lịch sử quan trọng, một tác phẩm văn học xuất sắc, có tác dụng giáo dục sâu sắc phẩm chất và đạo đức cách mạng cho nhiều thế hệ. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Hồ Chí Minh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Hồ Chí Minh'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thanh Niên'],
            'isbn'           => '8936228540382',
            'title'          => 'Bộ Sách Tô Màu - Lạc Vào Thế Giới Chibi',
            'slug'           => 'bo-sach-to-mau-lac-vao-the-gioi-chibi',
            'image'          => '/images/vanhoc/bo-sach-to-mau-lac-vao-the-gioi-chibi/1.jpg',
            'price'          => 88000.0,
            'discount_price' => 71000.0,
            'stock_quantity' => 50,
            'page_count'     => '64',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 19 x 0.3 cm',
            'weight'         => '146',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Sách Tô Màu - Lạc Vào Thế Giới Chibi Giới thiệu chung về chủ đề của sách Thông điệp về cảm xúc: - Lạc vào thế giới chibi, lạc vào thế giới của bạn - Cùng Chibi tô nên những khoảnh khắc ngọt ngào và đầy màu sắc Thông điệp về công năng: - Tô chibi, giảm stress - 30 câu chuyện, 30 sắc màu, vô vàn cảm xúc 1. Phần bìa sách: Bìa sách mang phong cách anime, vibe vui nhộn, tinh nghịch, vô tri, đáng yêu. 2. Phần nội dung bên trong sản phẩm - Nội dung: Chọn kiểu nhân vật, chủ đề mang phong cách anime, một chủ đề và phong cách khách hàng rất yêu thích. Không chỉ là sách tô màu, mà còn kết hợp câu chuyện ngắn về cuộc sống của nhân vật Chibi - Sách tô màu về chibi/anime đầu tiên trên thị trường - Kết hợp giữa tô màu và kể chuyện >> Tạo chiều sâu gắn kết cảm xúc nhân vật - Cấp độ tô màu đa dạng: Từ tranh đơn giản đến phức tạp 3. Chất lượng giấy - Định lượng: 140gsm - Chất giấy mịn mượt, cứng cáp - Sử dụng đa chất liệu: chì màu, bút sáp, acrylic marker, gouche. 4. Kích thước: 24x19cm Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['H!koro Studio'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['H!koro Studio'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-sach-to-mau-lac-vao-the-gioi-chibi/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-sach-to-mau-lac-vao-the-gioi-chibi/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-sach-to-mau-lac-vao-the-gioi-chibi/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-sach-to-mau-lac-vao-the-gioi-chibi/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935325029677',
            'title'          => 'Sứ Mệnh Hail Mary - Project Hail Mary',
            'slug'           => 'su-menh-hail-mary-project-hail-mary',
            'image'          => '/images/vanhoc/su-menh-hail-mary-project-hail-mary/1.jpg',
            'price'          => 209000.0,
            'discount_price' => 168000.0,
            'stock_quantity' => 50,
            'page_count'     => '592',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 15.7 x 2.9 cm',
            'weight'         => '750',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Sứ Mệnh Hail Mary - Project Hail Mary Top 100 cuốn sách hay nhất thế kỷ 21 do độc giả New York Times bình chọn TÁC PHẨM BÁN CHẠY SỐ 1 TRÊN NEW YORK TIMES TỪ TÁC GIẢ CỦA THE MARTIAN - Giải thưởng Audiobook of the Year tại Audie Awards 2022 - Sách nói bán chạy số 1 trên Audible và New York Times - Top 100 cuốn sách hay nhất thế kỷ 21 do độc giả New York Times bình chọn Một sứ mệnh tuyệt vọng. Một phi hành gia đơn độc. Và cơ hội cuối cùng để cứu lấy Trái Đất. Ryland Grace thức dậy trong một con tàu vũ trụ tối tân, trôi dạt giữa không gian, cách xa Trái Đất hàng triệu dặm ánh sáng. Không ký ức, không đồng đội, chỉ có hai thi thể lạnh lẽo bên cạnh. Anh không biết mình là ai, đang ở đâu, hay tại sao lại là người sống sót cuối cùng. Những mảnh ký ức rời rạc dần trở lại – cùng với một sự thật kinh hoàng: anh là niềm hy vọng cuối cùng của nhân loại. Một chủng vi sinh vật ngoài hành tinh đang hút năng lượng từ Mặt Trời và làm chậm quá trình phát sáng của nó, đẩy Trái Đất vào viễn cảnh diệt vong. Nhiệm vụ của Ryland là tìm ra cách ngăn chặn mối đe dọa này. Nhưng anh không phải là sinh vật duy nhất trong vũ trụ thực hiện sứ mệnh đó… Giữa hành trình cô độc, Ryland bất ngờ gặp gỡ một sinh vật thông minh đến từ một hành tinh xa xôi cũng đang gặp hiểm họa tương tự. Không nói cùng ngôn ngữ, không cùng nền văn minh, nhưng họ cùng chung mục tiêu: sống sót, cứu lấy hành tinh của mình. Và từ đó, một tình bạn chưa từng có trong lịch sử nhân loại được hình thành. Khi giải pháp cuối cùng đã nằm trong tay, Ryland buộc phải đối mặt với quyết định khó khăn nhất đời mình. Trở về Trái Đất với vinh quang – hay ở lại, đơn độc giữa không gian, hy sinh tất cả để cứu lấy bạn mình và một thế giới không phải của anh? Sứ Mệnh Hail Mary là một bản giao hưởng giữa khoa học đỉnh cao, trí tưởng tượng táo bạo và thông điệp nhân văn. Hồi hộp, thông minh và đầy cảm xúc, đây là câu chuyện về hy vọng, sự sống còn – và một tình bạn vượt qua mọi giới hạn của không gian và giống loài. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Andy Weir'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Andy Weir'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/su-menh-hail-mary-project-hail-mary/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/su-menh-hail-mary-project-hail-mary/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/su-menh-hail-mary-project-hail-mary/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/su-menh-hail-mary-project-hail-mary/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042421546',
            'title'          => 'Thám Tử Lừng Danh Conan - Tiểu Thuyết - Thiên Thần Sa Ngã Trên Xa Lộ',
            'slug'           => 'tham-tu-lung-danh-conan-tieu-thuyet-thien-than-sa-nga-tren-xa-lo',
            'image'          => '/images/vanhoc/tham-tu-lung-danh-conan-tieu-thuyet-thien-than-sa-nga-tren-xa-lo/1.jpg',
            'price'          => 55000.0,
            'discount_price' => 49500.0,
            'stock_quantity' => 50,
            'page_count'     => '180',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 0.9 cm',
            'weight'         => '180',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Thám Tử Lừng Danh Conan - Tiểu Thuyết - Thiên Thần Sa Ngã Trên Xa Lộ Đang đến thành phố Yokohama dự lễ hội mô tô, Conan bất ngờ bị cuốn vào một vụ tai nạn bắt nguồn từ chiếc mô tô đen bí ẩn liều lĩnh phóng bạt mạng trên cao tốc. Đội trưởng Hagiwara Chihaya của Đội Mô tô Giao thông số 3 thuộc Sở cảnh sát tỉnh Kanagawa điều khiển mô tô cảnh sát truy đuổi, và bằng kĩ năng lái xe điêu luyện cùng khả năng xử lí tình huống xuất sắc, cô đã dồn tên tội phạm vào thế bí. Đáng tiếc, ở khoảnh khắc quyết định, hắn kịp tẩu thoát. Sau sự việc đó, tại lễ hội mô tô, mẫu xe cảnh sát mới mang tên Angel trình làng, thu hút sự chú ý của công chúng. Tuy nhiên, mọi chuyện chưa dừng lại, chiếc mô tô đen bí ẩn lại ngang nhiên xuất hiện giữa nội đô, ngoạn mục cắt đuôi lực lượng cảnh sát. Rốt cuộc, kẻ lái chiếc mô tô có biệt danh Lucifer ấy đang mưu tính điều gì? --- Mời các bạn đón đọc bộ tiểu thuyết Thám tử lừng danh Conan : - Hoa hướng dương trong biển lửa - Nốt nhạc kinh hoàng - 15 phút trầm mặc - Cầu thủ ghi bàn số 11 - Cơn ác mộng đen tối - Những giây cuối cùng tới thiên đường - Tàu ngầm sắt màu đen - Ngôi sao 5 cánh 1 triệu đô - Dư ảnh của độc nhãn - Thiên thần sa ngã trên xa lộ - … *** Shima MIZUKI Sinh tại: tỉnh Aichi, Nhật Bản. Cung hoàng đạo: Kim Ngưu. Nhóm máu: B. Sở thích: xem phim điện ảnh và phim truyền hình dài tập của nước ngoài, chơi đùa cùng cún cưng (hiện đang nuôi hai chú Chihuahua). Shima MIZUKI là tác giả của các tiểu thuyết chuyển thể từ loạt phim Thám tử lừng danh Conan . Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Gosho Aoyama'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Gosho Aoyama'],
            ]);
        }
        if (isset($authors['Takahiro Okura'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Takahiro Okura'],
            ]);
        }
        if (isset($authors['Shima Mizuki'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Shima Mizuki'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/tham-tu-lung-danh-conan-tieu-thuyet-thien-than-sa-nga-tren-xa-lo/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/tham-tu-lung-danh-conan-tieu-thuyet-thien-than-sa-nga-tren-xa-lo/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Kim Đồng'],
            'isbn'           => '8935244843545',
            'title'          => 'Trường Ca Achilles',
            'slug'           => 'truong-ca-achilles',
            'image'          => '/images/vanhoc/truong-ca-achilles/1.jpg',
            'price'          => 156000.0,
            'discount_price' => 125000.0,
            'stock_quantity' => 50,
            'page_count'     => '444',
            'publish_year'   => '2020',
            'language'       => 'Tieng Viet',
            'dimensions'     => '22.5 x 14 cm',
            'weight'         => '450',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'TRƯỜNG CA ACHILLES - MỘT BẢN TÌNH CA BI TRÁNG DƯỚI ÁNH HOÀNG HÔN HY LẠP Lấy cảm hứng từ sử thi Iliad, Madeline Miller đã tái hiện một câu chuyện tình yêu đầy say đắm nhưng cũng nhuốm màu bi kịch giữa hai người anh hùng Hy Lạp trong tác phẩm đầu tay của mình – Trường Ca Achilles. VỀ TÁC GIẢ: Madeline Miller Là nhà văn người Mỹ, chuyên gia về văn học Hy Lạp cổ đại. Bà từng giảng dạy về Iliad và Odyssey suốt hơn 10 năm trước khi viết Trường Ca Achilles. Trường Ca Achilles đã giúp bà giành Giải Orange Prize 2012 – giải thưởng danh giá dành cho tiểu thuyết xuất sắc nhất của nữ tác giả. Cuốn sách sau đó được đề cử Women\'s Prize năm 2019, và cùng với Trường ca Achilles đã đánh dấu một sự nghiệp văn chương rực rỡ của Madeline Miller. VỀ DỊCH GIẢ : Jack Frogg Một dịch giả tài năng, sinh ra tại Hà Nội và hiện đang sinh sống tại Aix-en-Provence. Với niềm đam mê văn học và ngôn ngữ, anh đã chuyển ngữ thành công nhiều tác phẩm nổi tiếng. Tiểu thuyết Trường Ca Achilles, đã mang đến một bản chuyển ngữ mượt mà, giàu cảm xúc, giúp độc giả Việt Nam cảm nhận trọn vẹn vẻ đẹp bi tráng vốn có. Với sự tinh tế trong cách dùng từ và khả năng nắm bắt tinh thần nguyên tác, bản dịch này không chỉ tái hiện một câu chuyện tình yêu đầy mê hoặc mà còn khắc họa rõ nét khí chất hào hùng của thời đại sử thi Hy Lạp. TÓM TẮT NỘI DUNG SÁCH "Anh sẽ không bao giờ để họ làm tổn thương em." Lấy cảm hứng từ Iliad , Trường Ca Achilles là câu chuyện về tình yêu, danh vọng và bi kịch giữa hai con người bị ràng buộc bởi số phận. Patroclus – chàng hoàng tử bị lưu đày, mang trong mình tâm hồn dịu dàng và khao khát yêu thương. Achilles – vị chiến binh huyền thoại, người được tiên tri sẽ trở thành anh hùng vĩ đại nhất Hy Lạp. Họ gặp nhau, gắn bó bên nhau, và tình yêu nảy nở giữa những ngày tuổi trẻ. "Patroclus, em là ánh sáng của đời anh." Thế nhưng, định mệnh không bao giờ ưu ái những kẻ yêu nhau. Khi chiến tranh thành Troy nổ ra, Achilles buộc phải lựa chọn giữa danh vọng bất tử và tình yêu duy nhất đời mình. Còn Patroclus, dù biết rõ cái chết đang chờ đợi, vẫn tình nguyện ở bên người mình yêu. Dưới ngòi bút lãng mạn và đầy mê hoặc của Madeline Miller, Trường Ca Achilles không chỉ là một câu chuyện về chiến tranh và vinh quang, mà còn là một bản tình ca đầy khắc khoải, nơi tình yêu vĩnh cửu tỏa sáng ngay cả giữa bi kịch đẫm máu. "Ngay cả khi cái chết chia cắt chúng ta, anh vẫn sẽ tìm em." Quyển sách mang đến điều gì? Một cách nhìn mới về huyền thoại Achilles – không chỉ là chiến binh vĩ đại mà còn là một con người với tình cảm sâu sắc. Câu chuyện tình yêu đầy đau đớn giữa Achilles và Patroclus, được viết bằng ngôn từ đầy mê hoặc. Một tiểu thuyết sử thi hiện đại, vừa bi tráng vừa lãng mạn, làm sống lại những huyền thoại cổ đại theo cách chân thực nhất. Tại sao nên đọc & sở hữu "Trường Ca Achilles"? Best-seller quốc tế, được đánh giá cao bởi độc giả và giới phê bình. Dành cho những ai yêu thích thần thoại Hy Lạp, sử thi và những câu chuyện cảm động về tình yêu, danh dự và số phận. Một tác phẩm ki',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Madeline Miller'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Madeline Miller'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truong-ca-achilles/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truong-ca-achilles/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truong-ca-achilles/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truong-ca-achilles/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8936203366280',
            'title'          => 'Truyện Kiều - Ấn Bản Cao Cấp - Bìa Cứng - Phiên Bản Độc Quyền 50 Năm Fahasa',
            'slug'           => 'truyen-kieu-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa',
            'image'          => '/images/vanhoc/truyen-kieu-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa/1.jpg',
            'price'          => 790000.0,
            'discount_price' => null,
            'stock_quantity' => 50,
            'page_count'     => '208',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '30 x 25 x 2.2 cm',
            'weight'         => '2000',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Truyện Kiều Truyện Kiều là một kiệt tác văn chương của nước ta, với tinh thần cốt tử là niềm bi cảm về thân phận con người trong buổi loạn ly. Nỗi niềm đó, như nhà nghiên cứu Nhật Chiêu nhận xét, gói gọn cái tinh túy trong sự “trông thấu” (sáu cõi) và “nghĩ suốt” (ngàn đời). Không chỉ là minh chứng cho tài hoa của văn chương quốc âm thế kỷ XVIII, Truyện Kiều còn là đúc kết của nhân sinh quan dân tộc với tư tưởng Phật giáo, Khổng giáo của giới trí thức, dùng đạo lý hiếu nghĩa làm nền, lấy giáo pháp duyên khởi làm móng. Câu nói của học giả Phạm Quỳnh ( “Truyện Kiều còn, tiếng ta còn...” ), theo lẽ đó, có lẽ cũng không quá thậm xưng. Thế nhưng, đối với người đọc phổ thông thời hiện đại, Truyện Kiều của Nguyễn Du không phải dễ đọc, không chỉ bởi những từ Nôm cổ, những từ Hán-Việt khó, mà còn vì hệ thống điển tích, điển cố dày đặc, vốn là đặc trưng của văn học Hán-Nôm trung đại. Công trình khảo đính và chú thích Truyện Kiều của nhà nghiên cứu Hán-Nôm Nguyễn Thạch Giang là một công trình đặc biệt đề cao tính hệ thống và khoa học trong việc xử lý văn bản, cũng như tính chính xác, đầy đủ (mà không quá sa đà) trong việc chú giải. Đây là công trình được coi như “khuôn mẫu về xử lý văn bản tác phẩm văn Nôm”. Trong bản in lần này, những người làm sách đã mời họa sĩ Đặng Xuân Hòa minh họa cho ấn phẩm. Trước đây, Truyện Kiều đã nhiều lần được minh họa dưới ngọn bút tài hoa của nhiều họa sĩ, mỗi thời kỳ lại mang một dấu ấn khác nhau, góp phần tạo nên hình dung về đường nét, chân dung của những nhân vật trong Truyện Kiều trong tâm khảm người đọc. Còn lần này, với 16 minh họa mới của họa sĩ Đặng Xuân Hòa, chúng tôi mong muốn mở ra cho độc giả cái nhìn và cảm xúc mới về những chi tiết, những nhân vật tưởng chừng như quen thuộc. Ấn phẩm được ấn hành nhân kỷ niệm 50 năm thành lập FAHASA. Sách có bìa cứng, bọc bìa áo, khổ lớn 25 x 30 cm. Ruột in bốn màu trên giấy Ford định lượng 150 gsm. Giới thiệu tác giả: NGUYỄN DU (1765 – 1820) Ông có tự là Tố Như, hiệu là Thanh Hiên. Cha ông là Xuân Quận công Nguyễn Nghiễm, làm tới chức Tham tụng trong phủ chúa Trịnh, quê gốc ở làng Tiên Điền, Nghi Xuân, Hà Tĩnh. Ông trải qua thời niên thiếu ở kinh thành Thăng Long hoa lệ. Nguyễn Du bước vào đời trong buổi đất nước gặp thời biến động: nhà Lê sụp, Nguyễn và Tây Sơn giao tranh, quân Thanh ngấp nghé ngoài bờ cõi. Dòng họ của ông suy sút, ông thì trải qua mười năm gió bụi . Khi Nguyễn Ánh diệt Tây Sơn, ông ra làm quan cho nhà Nguyễn, sau được cử đi sứ nhà Thanh năm 48 tuổi (1813). Nhiều nhà phân tích văn học cho rằng Truyện Kiều chính là tiếng lòng của Nguyễn Du khóc than cho mối cô trung của mình với nhà Lê, cho thân phận bất đắc chí, nỗi đau nhân tình thế thái giữa buổi loạn ly. NGUYỄN THẠCH GIANG (1928 – 2017) Phó giáo sư Nguyễn Thạch Giang là một trong những nhà nghiên cứu chuyên sâu về văn chương Hán-Nôm cổ hàng đầu của Việt Nam. Trong suốt hơn 50 năm nghiên cứu, ông đã xuất bản hơn 70 đầu sách, trong đó có nhiều đầu sách có giá trị cao về mặt khoa học. Vào năm 2012, ông được tr',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Du'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Du'],
            ]);
        }
        if (isset($authors['Nguyễn Thạch Giang'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Thạch Giang'],
            ]);
        }
        if (isset($authors['Đặng Xuân Hòa'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Đặng Xuân Hòa'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truyen-kieu-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truyen-kieu-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truyen-kieu-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truyen-kieu-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042284721',
            'title'          => 'Tủ Sách Thanh Niên - Mãi Mãi Tuổi Hai Mươi - Nhật Ký Thời Chiến Việt Nam',
            'slug'           => 'tu-sach-thanh-nien-mai-mai-tuoi-hai-muoi-nhat-ky-thoi-chien-viet-nam',
            'image'          => '/images/vanhoc/tu-sach-thanh-nien-mai-mai-tuoi-hai-muoi-nhat-ky-thoi-chien-viet-nam/1.jpg',
            'price'          => 80000.0,
            'discount_price' => 68000.0,
            'stock_quantity' => 50,
            'page_count'     => '348',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 13.5 x 1.7 cm',
            'weight'         => '360',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Tủ Sách Thanh Niên - Mãi Mãi Tuổi Hai Mươi - Nhật Ký Thời Chiến Việt Nam Mãi mãi tuổi hai mươi đã làm rung động hàng triệu con tim của bạn đọc bởi vẻ đẹp tâm hồn thuần khiết, tình yêu quê hương đất nước nồng nàn thể hiện qua những cảm nhận bình dị của liệt sĩ Nguyễn Văn Thạc trong suốt những chặng đường hành quân. Như một lời tiên tri về ngày thống nhất đất nước, lá thư đề ngày 18 tháng 9 năm 1971 gửi người yêu, anh Thạc viết: “Bất kỳ một sự vinh quang nào cũng cần phải trả bằng một giá. Và khó khăn gian khổ càng nhiều và thử thách càng nhiều, sự vinh quang đó càng trở nên rực rỡ. Chúng ta đừng đi tìm những chân lý sâu xa đơn thuần qua những áng văn và những bài thơ, bài toán. 30.4.1975 Thạc sẽ trả lời cho P. câu: Hạnh phúc là gì?...” Và cuốn nhật ký dừng lại tại ngã ba Đồng Lộc ngày 3 tháng 6 năm 1972 khi anh chuẩn bị vào chiến trường… --- Mãi mãi tuổi hai mươi cùng với Nhật ký Đặng Thùy Trâm đã được xếp vào một trong mười sự kiện văn hóa tiêu biểu năm 2005 tại Việt Nam với số lượng phát hành kỷ lục và nhiều lần tái bản. Trong thư, Đại tướng Võ Nguyên Giáp đã viết: “Tôi mong các học sinh, sinh viên, thanh niên và nhân dân ta hãy tìm đọc cuốn nhật ký của liệt sĩ Nguyễn Văn Thạc và cuốn nhật ký vừa xuất bản của liệt sĩ – bác sĩ Đặng Thùy Trâm, hai người con ưu tú của Thủ đô Hà Nội đó hy sinh trong hang triệu chiến sĩ và đồng bào yêu nước đã ngã xuống vì độc lập, thống nhất của Tổ quốc.” … “Cùng với niềm xúc động, tôi có niềm tự hào rất lớn. Thời chiến tranh, Thùy Trâm và Thạc là hai tấm gương trong muôn triệu tấm gương của thế hệ trẻ và của dân tộc Việt Nam ta. Ngày nay, Thùy Trâm và Thạc có muôn triệu người Việt Nam, đặc biệt là trong lớp trẻ, yêu mến và kính phục, vì sự gặp nhau về hoài bão, sự gần nhau về tấm lòng, có cùng một ngọn lửa đang cháy sáng hoặc ít nhất thì cũng đang âm ỉ trong mỗi con người Việt Nam ta.” – Thủ tướng Phan Văn Khải Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Văn Thạc'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Văn Thạc'],
            ]);
        }
        if (isset($authors['Đặng Vương Hưng'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Đặng Vương Hưng'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/tu-sach-thanh-nien-mai-mai-tuoi-hai-muoi-nhat-ky-thoi-chien-viet-nam/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/tu-sach-thanh-nien-mai-mai-tuoi-hai-muoi-nhat-ky-thoi-chien-viet-nam/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Trẻ'],
            'isbn'           => '8934974176213',
            'title'          => 'Bộ Vừa Nhắm Mắt Vừa Mở Cửa Số (Tái Bản 2022)',
            'slug'           => 'bo-vua-nham-mat-vua-mo-cua-so-tai-ban-2022',
            'image'          => '/images/vanhoc/bo-vua-nham-mat-vua-mo-cua-so-tai-ban-2022/1.jpg',
            'price'          => 75000.0,
            'discount_price' => 64000.0,
            'stock_quantity' => 50,
            'page_count'     => '192',
            'publish_year'   => '2022',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1 cm',
            'weight'         => '200',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Vừa Nhắm Mắt Vừa Mở Cửa Số Tác phẩm gồm những câu chuyện ngắn xoay quanh cuộc sống thường ngày của một đứa trẻ mười tuổi, từ những thứ nhỏ nhặt như cái răng khểnh, ngón tay cho đến chuyện mất mát của đời người. Có vui, có buồn, có được, có mất như cuộc sống vẫn diễn ra, nhưng cảm nhận và cách nhìn của cậu bé làm cho mỗi người lớn phải suy ngẫm. Trong trẻo, sống động, đầy chất thơ, lại chứa đựng nhiều ý nghĩa sâu sắc, tác phẩm là một thế giới dung dị mà trong trẻo ngọt ngào dành cho cho tuổi thơ, đồng thời cũng là thông điệp dành cho người lớn: hãy nhắm mắt và mở lòng - mở cánh cửa của chính mình - hãy nhìn cuộc sống bằng tất cả các giác quan để cảm nhận, thấu hiểu, yêu thương, để quan tâm và để nhớ. Vừa Nhắm Mắt Vừa Mở Cửa Sổ đã giành được Giải A cuộc Vận động sáng tác văn học cho thiếu nhi năm 2002 do Nhà xuất bản Trẻ và Hội Nhà văn TP. HCM tổ chức và được phát hành lần đầu năm 2004. Đến nay, tác phẩm đã tái bản 29 lần với số lượng phát hành hơn 50 ngàn bản. Năm 2007, truyện được dịch qua tiếng Thuỵ Điển với tên Blunda och öppna ditt fönster và đến năm 2008 đã giành được giải Peter Pan của Thuỵ Điển cho mảng văn học thiếu nhi. Ngoài ra, sách cũng được chuyển ngữ sang tiếng Anh dưới tên Open the windows, eyes closed, được bán tác quyền sang Hàn Quốc... Tập sách hay, dễ thương, và còn nhiều mỹ từ khác nữa xứng đáng được dành cho nó. Hãy tìm đọc nội dung thay vì đọc trước phần giới thiệu sách này viết gì…. Như thế, bạn sẽ càng thích thú hơn với “Vừa nhắm mắt, vừa mở cửa sổ”. "Truyện về một thế giới của cả trẻ con lẫn người lớn, được kể lại trong giọng kể của một cậu bé 10 tuổi. Và con mắt của cậu bé ở đây cũng như thể một tấm gương, có độ trong đặc biệt, làm người lớn đọc vào mà cảm động và buồn, vì gương của mình đã đục bớt." - Nhà văn Phan Thị Vàng Anh "Nghĩ ngợi loay hoay, nhân đọc cuốn Vừa nhắm mắt vừa mở cửa sổ. Ðọc xong ngẩn ngơ lâu lâu. Văn phong đẹp, trong vắt. Người đọc soi vào đấy, thấy cả những ao ước tuổi thơ mình. Ðúng giọng đúng kiểu trẻ con, không phải giả vờ ngọng nghịu như phần lớn người viết truyện thiếu nhi dễ mắc. Nhưng cũng không tự nhiên chủ nghĩa ú ớ trẻ con mãi. Sau khi đã tạo dựng được một thế giới trẻ con đáng tin cậy, tác giả khéo lồng vào đó chất lãng mạn tuyệt vời khiến những ai từng là trẻ con đều phải bâng khuâng." - Nhà văn Hồ Anh Thái "Vừa nhắm mắt vừa mở cửa sổ đã thật sự là một cú đúp ngoạn mục về văn chương: Mỗi truyện ngắn nho nhỏ trong đó đã là một truyện tặng cho bạn đọc trẻ thơ, lại vừa là một truyện dành cho người lớn. Bởi chúng nhiều tầng nghĩa, giàu chất thơ, và có lẽ, bởi cả tác phẩm chính là kết quả cái nhìn độc đáo của một chủ thể thi sĩ viết văn xuôi, với động thái đắm đuối nhị nguyên rất mới lạ: vừa nhắm mắt, vừa mở cửa sổ nhìn ra thế giới. Và chỉ để phát hiện ra rằng \'\'thế giới\'\' chính là tất cả những gì thân thuộc, thân mến nhất ngay ở trước mắt: khu vườn nhỏ cạnh cửa sổ nhà mình, cuộc sống hàng ngày êm đêm của cha mẹ, bạn bè, cô giáo, hàng xóm láng giềng kế bên, và thật thú vị, ở ngay trong trái ti',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Ngọc Thuần'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Ngọc Thuần'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974185086',
            'title'          => 'Bà Ngoại Tôi Gửi Lời Xin Lỗi (Tái Bản 2023)',
            'slug'           => 'ba-ngoai-toi-gui-loi-xin-loi-tai-ban-2023',
            'image'          => '/images/vanhoc/ba-ngoai-toi-gui-loi-xin-loi-tai-ban-2023/1.jpg',
            'price'          => 190000.0,
            'discount_price' => 162000.0,
            'stock_quantity' => 50,
            'page_count'     => '514',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 2.5 cm',
            'weight'         => '530',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'BÀ NGOẠI GỬI TÔI LỜI XIN LỖI - HÀNH TRÌNH THEO DẤU NHỮNG LÁ THƯ BÍ ẨN Bà ngoại của Elsa lập dị, mê kể chuyện và là người duy nhất hiểu cô bé. Khi bà qua đời, Elsa nhận nhiệm vụ giao những lá thư xin lỗi bí ẩn. Mỗi lá thư mở ra một bí mật, một quá khứ bất ngờ. Nhưng đây chỉ là nhiệm vụ đơn thuần, hay Elsa sẽ khám phá điều lớn lao hơn? VỀ TÁC GIẢ: Fredrik Backman Nhà văn Thụy Điển, sinh năm 1981, nổi tiếng với lối kể chuyện giàu cảm xúc. Từng là nhà báo, sau đó thành công với Người đàn ông mang tên Ove . Tác phẩm của ông mang màu sắc nhân văn, hài hước nhưng cũng đầy sâu lắng. Được dịch ra hơn 40 ngôn ngữ, có lượng độc giả đông đảo trên toàn thế giới. VỀ DỊCH GIẢ : Hoàng Anh Dịch giả chuyên chuyển ngữ các tác phẩm văn học nước ngoài. Lối dịch tự nhiên, truyền tải trọn vẹn tinh thần nguyên tác. Đã dịch nhiều cuốn sách nổi tiếng, được độc giả đánh giá cao. TÓM TẮT NỘI DUNG SÁCH Elsa bảy tuổi – một cô bé khác biệt với trí tưởng tượng rộng lớn và một người bạn duy nhất: bà ngoại. Bà không giống ai, lập dị, hài hước, thậm chí có phần "điên rồ" trong mắt người lớn. Nhưng với Elsa, bà là siêu anh hùng, là người kể những câu chuyện cổ tích về vương quốc bí mật nơi mọi kẻ lạc loài đều tìm thấy chỗ đứng. Rồi một ngày, bà ra đi, để lại cho Elsa một "nhiệm vụ tối mật": giao những bức thư xin lỗi đến những người bà từng làm tổn thương. Nhưng vì sao một người như bà lại phải xin lỗi? Những bí mật được hé mở, những con người tưởng xa lạ lại gắn bó hơn Elsa nghĩ. Và cô bé nhận ra: thế giới này không chỉ có trắng và đen, đúng và sai - mà còn có những câu chuyện dang dở, những nỗi đau giấu kín và những lời chưa kịp nói ra... "Bà nói với cháu rằng tất cả những điều tuyệt vời nhất trên thế gian này đều bắt đầu bằng một câu chuyện." Vậy câu chuyện này sẽ đưa Elsa đến đâu?... CUỐN SÁCH NÀY MANG ĐẾN ĐIỀU GÌ? Một bức tranh sống động về gia đình, tình yêu và những mối quan hệ tưởng chừng đơn giản nhưng lại phức tạp vô cùng. Hành trình khám phá những bí mật trong quá khứ, nơi từng câu chuyện nhỏ đều mang ý nghĩa sâu sắc. Sự kết hợp hoàn hảo giữa trí tưởng tượng phong phú và hiện thực đời thường, tạo nên một tác phẩm chạm đến mọi cung bậc cảm xúc. Một câu chuyện không chỉ để đọc mà còn để cảm nhận, suy tư và đồng điệu. TẠI SAO NÊN ĐỌC VÀ SỞ HỮU CUỐN SÁCH NÀY? Một bức tranh sống động về gia đình, tình yêu và những mối quan hệ tưởng chừng đơn giản nhưng lại phức tạp vô cùng. Hành trình khám phá những bí mật trong quá khứ, nơi từng câu chuyện nhỏ đều mang ý nghĩa sâu sắc. Sự kết hợp hoàn hảo giữa trí tưởng tượng phong phú và hiện thực đời thường, tạo nên một tác phẩm chạm đến mọi cung bậc cảm xúc. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Fredrik Backman'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Fredrik Backman'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ba-ngoai-toi-gui-loi-xin-loi-tai-ban-2023/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Lao Động'],
            'isbn'           => '9786320309160',
            'title'          => 'Babel Hay Sự Cần Thiết Của Bạo Lực',
            'slug'           => 'babel-hay-su-can-thiet-cua-bao-luc',
            'image'          => '/images/vanhoc/babel-hay-su-can-thiet-cua-bao-luc/1.jpg',
            'price'          => 336000.0,
            'discount_price' => 269000.0,
            'stock_quantity' => 50,
            'page_count'     => '636',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 16 x 3.1 cm',
            'weight'         => '820',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Babel Hay Sự Cần Thiết Của Bạo Lực Năm 1829, Robin Swift bỗng trở thành một cậu bé mồ côi sau khi cả gia đình qua đời vì dịch tả lan tràn ở Quảng Châu. Cậu được Giáo sư Lovell cứu sống và đưa đến London. Ở đó, cậu được dạy tiếng Latin, tiếng Hy Lạp cổ đại và tiếng Trung để chuẩn bị cho ngày nhập học ở Viện Dịch thuật Hoàng gia danh giá tại Oxford - còn được gọi là Babel - trung tâm dịch thuật và trường pháp thuật hàng đầu thế giới. Với Robin, Oxford là một nơi không tưởng dành riêng cho việc theo đuổi tri thức. Nhưng tri thức phục tùng quyền lực, và với tư cách một cậu bé người Trung Quốc lớn lên ở Anh, Robin nhận ra rằng phục vụ Babel đồng nghĩa với việc phản bội lại quê hương. Cậu thấy mình đứng giữa Babel và Hermes - một tổ chức ngầm đang tìm cách ngăn chặn sự bành trướng của đế quốc. Khi nước Anh muốn khơi mào một cuộc chiến phi nghĩa với Trung Quốc vì bạc và nha phiến, Robin phải đưa ra lựa chọn sẽ đứng về phe nào. Liệu các thể chế quyền lực có thể được thay đổi từ bên trong, hay cách mạng luôn cần đến bạo lực? Babel là tiểu thuyết lịch sử giả tưởng về cuộc cách mạng của các sinh viên Oxford, về phong trào chống thực dân, về việc sử dụng ngôn ngữ và dịch thuật như một công cụ đàn áp của Đế quốc Anh. Tác phẩm đã giành được giải thưởng Nebula và giải Blackwell năm 2022 cùng nhiều giải thưởng khác và đang được dựng thành phim truyền hình. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['R. F. Kuang'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['R. F. Kuang'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/babel-hay-su-can-thiet-cua-bao-luc/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/babel-hay-su-can-thiet-cua-bao-luc/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/babel-hay-su-can-thiet-cua-bao-luc/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/babel-hay-su-can-thiet-cua-bao-luc/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974186083',
            'title'          => 'Bộ Beartown - Thị Trấn Nhỏ, Giấc Mơ Lớn',
            'slug'           => 'bo-beartown-thi-tran-nho-giac-mo-lon',
            'image'          => '/images/vanhoc/bo-beartown-thi-tran-nho-giac-mo-lon/1.jpg',
            'price'          => 210000.0,
            'discount_price' => 179000.0,
            'stock_quantity' => 50,
            'page_count'     => '604',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 2 cm',
            'weight'         => '600',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Beartown - Thị Trấn Nhỏ, Giấc Mơ Lớn Từ tác giả cuốn sách bán chạy toàn cầu “Người đàn ông mang tên Ove” Fredrik Backman cuốn hút người đọc vào cuốn tiểu thuyết sâu sắc, quyến rũ về một thị trấn nhỏ mang giấc mơ lớn – và cái giá phải trả để biến giấc mơ thành hiện thực. Ai cũng nói Beartown vậy là xong rồi. Một cộng đồng nhỏ nép mình sâu trong rừng, và ngày càng nhỏ lại khi cây cối xâm lấn. Nhưng ở đây có một sân băng cũ, và đây là lí do người dân Beartown tin rằng ngày mai sẽ tốt hơn hôm nay. Đội khúc côn cầu trên băng của họ sắp thi đấu ở vòng bán kết quốc gia, và họ hoàn toàn có cơ hội chiến thắng. Tất cả hi vọng và ước mơ của nơi này được đặt lên vai những cậu trai tuổi teen. Nhưng chính điều đó lại tạo thành một gánh nặng cho các cậu, và đã kích hoạt một hành động bạo lực, cả thị trấn chìm trong hỗn loạn. “Beartown” đi sâu vào những hi vọng gắn kết một cộng đồng nhỏ lại với nhau, những bí mật đã chia cắt nó và sự can đảm cần có để một người làm điều khác thường. Trong câu chuyện về thị trấn nhỏ trong rừng này, Fredrik Backman đã tìm được cả thế giới. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Fredrik Backman'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Fredrik Backman'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-beartown-thi-tran-nho-giac-mo-lon/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-beartown-thi-tran-nho-giac-mo-lon/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935325031519',
            'title'          => 'Bộ Bộ Sách Khó Dỗ Dành - Tập 1 + Tập 2 (Bộ 2 Tập) (Tái Bản 2025) - Tặng Kèm Bookmark Bồi Cứng',
            'slug'           => 'bo-bo-sach-kho-do-danh-tap-1-tap-2-bo-2-tap-tai-ban-2025-tang-kem-bookmark-boi-cung',
            'image'          => '/images/vanhoc/bo-bo-sach-kho-do-danh-tap-1-tap-2-bo-2-tap-tai-ban-2025-tang-kem-bookmark-boi-cung/1.jpg',
            'price'          => 365000.0,
            'discount_price' => 292000.0,
            'stock_quantity' => 50,
            'page_count'     => '976',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 15.7 x 4.9 cm',
            'weight'         => '1250',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Bộ Sách Khó Dỗ Dành - Tập 1 + Tập 2 (Bộ 2 Tập) Ôn Dĩ Phàm và Tang Diên từng là bạn học, hai người tình cờ gặp lại nhau trong một quán bar, sau đó lại tình cờ trở thành bạn thuê trọ chung. Chuyện cũng chẳng có gì nếu như hồi còn đi học Ôn Dĩ Phàm chưa từng... từ chối tình cảm của Tang Diên. Thật ra Tang Diên là một người rất cộc cằn, anh có thể gây sát thương bằng lời nói với bất kỳ ai, nhưng anh lại vô cùng dịu dàng với Ôn Dĩ Phàm. Yêu thầm cô suốt sáu năm, tìm đủ mọi cách để lưu giữ hình ảnh của cô trong những năm tháng xa cách... Kể cả khi bị cô từ chối, anh vẫn âm thầm dõi theo cô từ xa. Còn về Ôn Dĩ Phàm, vì những tổn thương trong quá khứ mà cô luôn cảm thấy mình không xứng với Tang Diên - một chàng trai quá đỗi đẹp đẽ. Gặp lại sau sáu năm, cô quyết định sẽ không bỏ lỡ Tang Diên lần nữa, thật lòng muốn bù đắp cho những tổn thương mình đã gây ra cho anh năm ấy… Ôn Dĩ Phàm: "Tang Diên à, em mong sau này mình sẽ sống lâu hơn anh sáu năm, để được yêu anh nhiều hơn sáu năm. Vậy là chúng ta huề nhau rồi." Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Trúc Dĩ'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Trúc Dĩ'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-sach-kho-do-danh-tap-1-tap-2-bo-2-tap-tai-ban-2025-tang-kem-bookmark-boi-cung/2.png', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-sach-kho-do-danh-tap-1-tap-2-bo-2-tap-tai-ban-2025-tang-kem-bookmark-boi-cung/3.png', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-sach-kho-do-danh-tap-1-tap-2-bo-2-tap-tai-ban-2025-tang-kem-bookmark-boi-cung/4.png', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => 'apdb-bq',
            'title'          => 'Boxset Chúa Nhẫn (Hộp 3 Tập) - Ấn Phẩm Đặc Biệt',
            'slug'           => 'boxset-chua-nhan-hop-3-tap-an-pham-dac-biet',
            'image'          => '/images/vanhoc/boxset-chua-nhan-hop-3-tap-an-pham-dac-biet/1.jpg',
            'price'          => 2810000.0,
            'discount_price' => 2530000.0,
            'stock_quantity' => 50,
            'page_count'     => '2096',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 16 x 10 cm',
            'weight'         => '3500',
            'cover_type'     => 'Bộ Hộp',
            'description'    => 'Boxset Chúa Nhẫn (Hộp 3 Tập) Giới Thiệu Sách: Một trong những tượng đài lớn nhất của văn học kỳ ảo thế giới trở lại trong một diện mạo đặc biệt, dành cho những độc giả đã yêu mến hành trình qua Trung Địa cũng như những người đang chuẩn bị lần đầu bước chân vào thế giới của Tolkien. Boxset được thực hiện với hình thức chỉn chu, trang trọng, phù hợp để bổ sung vào tủ sách cá nhân hoặc trở thành một món quà dành cho người yêu Chúa Nhẫn. Quy Cách Bản Đặc Biệt: - Hộp làm thủ công. - Bìa cứng carton nhập ngoại. - Ruột in giấy ngà định lượng 100gsm. - Bụng sách mạ nhũ vàng. - Đánh số từ 1 đến 333. - 24 minh họa màu mới thực hiện. - Đóng triện son Nhã Nam. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['J.R.R. Tolkien'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['J.R.R. Tolkien'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-chua-nhan-hop-3-tap-an-pham-dac-biet/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-chua-nhan-hop-3-tap-an-pham-dac-biet/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-chua-nhan-hop-3-tap-an-pham-dac-biet/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-chua-nhan-hop-3-tap-an-pham-dac-biet/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974185116-bq',
            'title'          => 'Boxset Harry Potter Hộp (Trọn Bộ 7 Cuốn)',
            'slug'           => 'boxset-harry-potter-hop-tron-bo-7-cuon',
            'image'          => '/images/vanhoc/boxset-harry-potter-hop-tron-bo-7-cuon/1.jpg',
            'price'          => 1760000.0,
            'discount_price' => 1498000.0,
            'stock_quantity' => 50,
            'page_count'     => null,
            'publish_year'   => '2023',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 14 x 14 cm',
            'weight'         => '5100',
            'cover_type'     => 'Bộ Hộp',
            'description'    => 'Boxset Harry Potter (Trọn Bộ 7 Cuốn) Harry Potter là tên của bộ truyện (gồm bảy phần) của nữ nhà văn J. K. Rowling viết về cậu bé thiếu niên Harry Potter. Câu chuyện phần lớn diễn ra tại Trường Phù thủy và Pháp sư Hogwarts, một ngôi trường pháp thuật, và tập trung vào cuộc chiến của Harry Potter chống lại một phù thủy hắc ám là Chúa tể Voldemort, người đã giết cha mẹ cậu trong tham vọng làm chủ thế giới phù thủy. 1. Boxset Harry Potter Hộp (Trọn Bộ 7 Cuốn) 2. Phí Bảo Quản Hàng Hoá Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['J.K. Rowling'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['J.K. Rowling'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-harry-potter-hop-tron-bo-7-cuon/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-harry-potter-hop-tron-bo-7-cuon/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974216247-qt-bq',
            'title'          => 'Bộ Boxset Nguyễn Nhật Ánh - Đã Chuyển Thể Thành Phim (Hộp 4 Cuốn) - Tặng Kèm 4 Bookmark + 1 Shikishi Ngẫu Nhiên Có Chữ Ký Tác Giả + 1 Túi Canvas - Phiên Bản Độc Quyền 50 Năm Fahasa',
            'slug'           => 'bo-boxset-nguyen-nhat-anh-da-chuyen-the-thanh-phim-hop-4-cuon-tang-kem-4-bookmark-1-shikishi-ngau-nhien-co-chu-ky-tac-gia-1-tui-canvas-phien-ban-doc-quyen-50-nam-fahasa',
            'image'          => '/images/vanhoc/bo-boxset-nguyen-nhat-anh-da-chuyen-the-thanh-phim-hop-4-cuon-tang-kem-4-bookmark-1-shikishi-ngau-nhien-co-chu-ky-tac-gia-1-tui-canvas-phien-ban-doc-quyen-50-nam-fahasa/1.jpg',
            'price'          => 1490000.0,
            'discount_price' => 1053000.0,
            'stock_quantity' => 50,
            'page_count'     => null,
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '21.2 x 14 x 9.6 cm',
            'weight'         => null,
            'cover_type'     => 'Bộ Hộp',
            'description'    => 'Boxset Nguyễn Nhật Ánh - Đã Chuyển Thể Thành Phim (Hộp 4 Cuốn) Boxset Nguyễn Nhật Ánh - Từ Sách đến Phim Boxset "Nguyễn Nhật Ánh - Từ Sách đến Phim" gồm bốn truyện dài đã phát hành hàng trăm nghìn bản của nhà văn Nguyễn Nhật Ánh: - Mắt Biếc - Cô gái đến từ hôm qua - Tôi thấy hoa vàng trên cỏ xanh - Ngày xưa có một chuyện tình Cả bốn cuốn đều được làm phiên bản BÌA CỨNG, với hình bìa là ảnh từ các bộ phim chuyển thể cùng tên, chưa từng xuất bản trước đây. Boxset gọn gàng cứng cáp, thành box là giấy màu bồi trên trên ván MDF. Mỗi boxset tặng kèm túi canvas cao cấp và bookmark trong mỗi cuốn. Boxset sẽ phát hành trong tháng 6.2026, thuộc dự án hợp tác đặc biệt nhằm kỷ niệm 45 năm thành lập Nhà xuất bản Trẻ và 50 năm thành lập Công ty Cổ phần Phát hành Sách TP.HCM (FAHASA). Đặc biệt, trong mỗi boxset sẽ có một tấm shikishi in hình nhà văn Nguyễn Nhật Ánh. Trong số 2000 box phát hành, sẽ có 500 box chứa shikishi có chữ ký tươi do nhà văn Nguyễn Nhật Ánh tự tay ký ( không phải chữ ký in). Những box có shikishi có chữ ký thì bên ngoài sẽ có nhãn ghi rõ: boxset có chữ ký của nhà văn. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-boxset-nguyen-nhat-anh-da-chuyen-the-thanh-phim-hop-4-cuon-tang-kem-4-bookmark-1-shikishi-ngau-nhien-co-chu-ky-tac-gia-1-tui-canvas-phien-ban-doc-quyen-50-nam-fahasa/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-boxset-nguyen-nhat-anh-da-chuyen-the-thanh-phim-hop-4-cuon-tang-kem-4-bookmark-1-shikishi-ngau-nhien-co-chu-ky-tac-gia-1-tui-canvas-phien-ban-doc-quyen-50-nam-fahasa/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-boxset-nguyen-nhat-anh-da-chuyen-the-thanh-phim-hop-4-cuon-tang-kem-4-bookmark-1-shikishi-ngau-nhien-co-chu-ky-tac-gia-1-tui-canvas-phien-ban-doc-quyen-50-nam-fahasa/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-boxset-nguyen-nhat-anh-da-chuyen-the-thanh-phim-hop-4-cuon-tang-kem-4-bookmark-1-shikishi-ngau-nhien-co-chu-ky-tac-gia-1-tui-canvas-phien-ban-doc-quyen-50-nam-fahasa/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thế Giới'],
            'isbn'           => 'bsodysseyiliad',
            'title'          => 'Boxset Sách Odyssêy + Iliad (Hộp 2 Cuốn)',
            'slug'           => 'boxset-sach-odyssey-iliad-hop-2-cuon',
            'image'          => '/images/vanhoc/boxset-sach-odyssey-iliad-hop-2-cuon/1.jpg',
            'price'          => 589000.0,
            'discount_price' => 530100.0,
            'stock_quantity' => 50,
            'page_count'     => '1456',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.7 x 14.2 x 8 xm',
            'weight'         => '2000',
            'cover_type'     => 'Bộ Hộp',
            'description'    => 'Boxset Sách Odyssêy + Iliad (Hộp 2 Cuốn) 1. ODYSSÊY Bản anh hùng ca Odyssêy là bức tranh hoành tráng, hào hùng của người Hy Lạp trong cuộc chinh phục thiên nhiên và di dân mở đất. Tác phẩm gồm 12.110 câu thơ, chia làm 24 khúc ca, kể lại hành trình gian nan của Odyssêy (hay Ulysses) trên đường trở về quê hương sau khi quân Hy Lạp hạ được thành Troy. Odyssêy phản ánh một giai đoạn cao trong quá trình tan rã của chế độ công xã thị tộc: Đó là thời kỳ những người Hy Lạp đã bước vào cuộc sống lao động hòa bình có khát vọng chinh phục thế giới xung quanh, thời kỳ hình thành gia đình một vợ một chồng với chế độ phụ quyền và quyền tư hữu tài sản. Ngoài ra ta còn thấy khát vọng sống văn minh, hữu ái của người xưa như một nguyện vọng không riêng gì của thời đại Homer mà của nhân loại ở mọi thời đại. Chủ đề của Odyssêy là tinh thần chế ngự hoàn cảnh, chủ đề ăn sâu cắm rễ trong lòng dân tộc Hy Lạp, Homer liên tục nhấn mạnh qua mấy phẩm từ nổi trội gắn liền với ba nhân vật chính: Odysseus khôn khéo, Penelope kín đáo, Telemachos thận trọng. Về hình thức thi phẩm là chuyện phiêu lưu, kết hợp tài tình giản dị với phong phú, thực tế với tưởng tượng, hữu hình với vô hình, thần linh với thế nhân, ảnh hưởng sâu đậm văn hóa, văn minh Tây phương hơn bất kể sáng tác văn chương nào từ trước tới giờ. 2. ILIAD Iliad là bản trường ca Hy lạp cổ nhất và có lẽ hay nhất trong văn học Tây phương. Qua chuỗi dài lịch sử đã tạo cảm hứng cho vô vàn tác phẩm nghệ thuật, từ hội họa, kiến trúc, thi ca cho đến tiểu thuyết, kịch nghệ, âm nhạc. Tác phẩm Iliad gồm hai mươi bốn khúc, khúc nào cũng lôi cuốn khiến người nghe ngây ngất, phần vì ý phần vì lời. Kể một giai đoạn ngắn năm mươi ngày trong năm thứ mười cuộc chiến tranh thành Troie, với câu chuyện xoay quanh về mối bất hòa giữa vị tướng kiệt xuất Achilleus của Hy Lạp và thống soái Agamemnon, cùng với nỗi phẫn nộ Achilleus cực chẳng đã phải mang trong lòng. Chiến trận rền vang, chàng lui về trại không tham dự, lực lượng Achaian vì thế suy yếu trầm trọng. Mãi tới lúc bạn chí thiết Patroklos tử trận, chàng mới rời trại ra chiến trường giao chiến và giết chết Hektor. Không những thế nhân giao chiến, mà cả thần linh cũng xung đột sâu sắc, và cuộc chiến vì thế trở nên kéo dài và vô cùng đẫm máu. Phần cuối trường ca kể về lễ hỏa táng Hektor. Tác phẩm là biểu tượng miêu tả số phận nhân loại hoàn toàn do định mệnh đưa đẩy. Đời sống xã hội Hy Lạp cổ đại cũng được phản ánh một cách chân thực trong tác phẩm, trong đó có thể thấy quá trình diễn biến từ chế độ thị tộc đến sự hình thành thành bang của chế độ nô lệ, đồng thời ca ngợi các nhân vật anh hùng kiệt xuất của phía Hy Lạp như Achilleus, của phía Troie như Hektor. Kết hợp chuyện truyền khẩu với chuyện thần thoại để đúc kết, tác phẩm được các thi sĩ ca công ngâm vịnh, phô diễn trước quần chúng qua nhiều thế hệ trước khi được ghi lại thành văn vào thế kỷ VIII trước công nguyên. 3. THÔNG TIN TÁC GIẢ Homer là nhà thơ sử thi huyền thoại của Hy Lạp cổ đại, được xem là một trong những tác giả có ản',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Homer'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Homer'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-sach-odyssey-iliad-hop-2-cuon/2.png', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-sach-odyssey-iliad-hop-2-cuon/3.png', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-sach-odyssey-iliad-hop-2-cuon/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/boxset-sach-odyssey-iliad-hop-2-cuon/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974212409',
            'title'          => 'Bộ Cánh Đồng Bất Tận (Tái Bản 2025)',
            'slug'           => 'bo-canh-dong-bat-tan-tai-ban-2025',
            'image'          => '/images/vanhoc/bo-canh-dong-bat-tan-tai-ban-2025/1.jpg',
            'price'          => 100000.0,
            'discount_price' => 85000.0,
            'stock_quantity' => 50,
            'page_count'     => '226',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1.1 cm',
            'weight'         => '240',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Cánh Đồng Bất Tận "Cánh đồng bất tận" b ao gồm những truyện hay và mới nhất của nhà văn Nguyễn Ngọc Tư. Đây là tác phẩm đang gây xôn xao trong đời sống văn học, bởi ở đó người ta tìm thấy sự dữ dội, khốc liệt của đời sống thôn dã qua cái nhìn của một cô gái. Bi kịch về nỗi mất mát, sự cô đơn được đẩy lên đến tận cùng, khiến người đọc có lúc cảm thấy nhói tim... CÁNH ĐỒNG BẤT TẬN - NỖI ĐAU CHẬT KÍN GIỮA MIỀN SÔNG NƯỚC MÊNH MÔNG Một cánh đồng rộng lớn, nhưng chẳng có lối thoát. Một cuộc đời lênh đênh, nhưng không tìm thấy bến bờ. Một vết thương tưởng đã khô, nhưng vẫn rỉ máu mãi mãi… Hãy bước vào “Cánh Đồng Bất Tận” của Nguyễn Ngọc Tư, nơi mỗi con chữ như một nhát dao cứa vào trái tim, nơi con người yêu thương nhau bằng những cách đau đớn nhất. VỀ TÁC GIẢ: Nguyễn Ngọc Tư - Là một trong những nhà văn xuất sắc nhất của văn học Việt Nam đương đại, Nguyễn Ngọc Tư không chỉ viết về miền Tây sông nước, mà còn viết về những vết thương không bao giờ liền sẹo trong tâm hồn con người. - “Cánh Đồng Bất Tận” đã mang về cho bà Giải thưởng Văn học ASEAN 2008, đồng thời tạo ra những cuộc tranh luận sâu sắc về hiện thực xã hội. TÓM TẮT NỘI DUNG SÁCH Trên những cánh đồng hoang vu, cuộc đời của Nương và Điền trôi dạt theo những cơn sóng bi kịch. Hai chị em bị bỏ rơi, bị cuốn vào nỗi hận thù và sự cô đơn của người cha – một người đàn ông sống trong đau đớn vì tình phụ bạc. Trên hành trình đó, họ gặp gỡ một cô gái làng chơi tên Sương, người cũng tìm kiếm một nơi trú ẩn trong cuộc đời bão tố. Mỗi trang sách là những lát cắt sắc lạnh về tình yêu, sự phản bội và những tổn thương sâu thẳm, khiến người đọc đau lòng nhưng không thể rời mắt. Ở đó, đàn ông bỏ đi sau những cuộc tình, đàn bà bị tổn thương và trả giá, còn những đứa trẻ chỉ biết câm lặng mà lớn lên… Tại sao nên đọc “Cánh Đồng Bất Tận”? - Một câu chuyện gai góc, trần trụi nhưng ám ảnh mãi mãi. - Một bức tranh vừa thơ vừa cay đắng về miền Tây hoang hoải. - Một tiếng thở dài cho những cuộc đời không bao giờ có cơ hội chọn lựa. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Ngọc Tư'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Ngọc Tư'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-canh-dong-bat-tan-tai-ban-2025/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thế Giới'],
            'isbn'           => '8935235249035',
            'title'          => 'Children Of Dune - Hậu Duệ Xứ Cát',
            'slug'           => 'children-of-dune-hau-due-xu-cat',
            'image'          => '/images/vanhoc/children-of-dune-hau-due-xu-cat/1.jpg',
            'price'          => 340000.0,
            'discount_price' => 306000.0,
            'stock_quantity' => 50,
            'page_count'     => '522',
            'publish_year'   => '2026',
            'language'       => 'Tieng Viet',
            'dimensions'     => '25 x 17 x 2.6 cm',
            'weight'         => '500',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Children Of Dune - Hậu Duệ Xứ Cát Phần ba của XỨ CÁT - một trong những loạt tiểu thuyết viễn tưởng công phu và ấn tượng nhất mọi thời đại! ã chín năm trôi qua kể từ khi Paul "Muad\'Dib" Atreides tiến vào sa mạc, giờ đây, hệ sinh thái của hành tinh Arrakis đã có những sự thay đổi lớn - ở rất nhiều nơi, người Fremen không còn cần đến sa phục, nguồn nước cũng dồi dào hơn. Nhưng đồng thời, môi trường sống tự nhiên của loài sâu cát lại bị đe dọa bởi chính những thay đổi này, ảnh hưởng nghiêm trọng đến nguồn cung cấp hương dược - thứ tài nguyên quý giá của Xứ Cát. Hai đứa con sinh đôi của Paul Atreides là Leto II và Ghanima tuy vẫn còn ít tuổi nhưng đã mang trong mình ký ức của vô số tổ tiên, đang phải tìm cách chống lại kết cục sẽ trở thành Kẻ Ghê Tởm của những kẻ tiền sinh. Ở một nơi xa xôi, công chúa Wensica đang âm mưu ám sát hai đứa trẻ để phục vụ cho kế hoạch lấy lại quyền lực của nhà Corrino. Cùng lúc đó, trong sa mạc xuất hiện một ông lão mù kỳ lạ với tên gọi Nhà Truyền Giáo, mang theo những lời lẽ báng bổ đến di sản của Muad\'Dib, nhưng lại được rất nhiều người hưởng ứng. Và ngay cả Alia, cô ruột của Leto Il và Ghanima cũng đang có những kế hoạch riêng dành cho cặp sinh đôi. Cuộc đối đầu giữa những con người, những phe phái khác nhau - với những ý đồ khác nhau - sẽ mang đến tương lai như thế nào cho Xứ Cát, cho người Fremen, và cho cả vũ trụ? Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Frank Herbert'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Frank Herbert'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/children-of-dune-hau-due-xu-cat/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/children-of-dune-hau-due-xu-cat/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '8935352629413',
            'title'          => 'Bộ Chung Một Mái Nhà - Tập 6 - Bản Giới Hạn - Tặng Kèm Bookmark + Lót Ly + Shikishi',
            'slug'           => 'bo-chung-mot-mai-nha-tap-6-ban-gioi-han-tang-kem-bookmark-lot-ly-shikishi',
            'image'          => '/images/vanhoc/bo-chung-mot-mai-nha-tap-6-ban-gioi-han-tang-kem-bookmark-lot-ly-shikishi/1.jpg',
            'price'          => 105000.0,
            'discount_price' => 90000.0,
            'stock_quantity' => 50,
            'page_count'     => '332',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 1.6 cm',
            'weight'         => '350',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Chung Một Mái Nhà - Tập 6 Dù từng quyết sẽ sống một mình , nhưng chẳng biết từ bao giờ, tôi lại muốn được sánh bước bên cạnh một ai đó . Tựa như bị ma lực của Halloween dẫn dắt, Yuuta và Saki đã tìm đến hơi ấm của nhau như một cặp tình nhân. Dù bề ngoài, cả hai vẫn giữ khoảng cách như trước, nhưng bản chất mối quan hệ của họ đã có sự thay đổi rõ rệt. Sinh nhật của đối phương, những bất ngờ và sự "điều chỉnh", Giáng sinh, lần đầu tiên cùng đón năm mới, và chuyến về quê. Trong khi đau đầu suy nghĩ về quà tặng, về cách trải qua những ngày kỉ niệm, về cách làm đối phương vui lòng, hai con người vụng về ấy vẫn tìm kiếm con đường hạnh phúc theo cách của riêng mình. Và rồi, hình ảnh của bố mẹ và họ hàng cũng buộc họ phải suy nghĩ về việc trở thành người lớn, về mối liên kết gia đình, và cả về tương lai sau này của một mối quan hệ yêu đương... như là hôn nhân hay con cái...? Đây là câu chuyện về mùa đông đầu tiên của hai con người đã trở thành anh em. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Ghost Mikawa'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Ghost Mikawa'],
            ]);
        }
        if (isset($authors['Hiten'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Hiten'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chung-mot-mai-nha-tap-6-ban-gioi-han-tang-kem-bookmark-lot-ly-shikishi/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chung-mot-mai-nha-tap-6-ban-gioi-han-tang-kem-bookmark-lot-ly-shikishi/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Trẻ'],
            'isbn'           => '8934974178408',
            'title'          => 'Bộ Cô Gái Đến Từ Hôm Qua (Tái Bản 2022)',
            'slug'           => 'bo-co-gai-den-tu-hom-qua-tai-ban-2022',
            'image'          => '/images/vanhoc/bo-co-gai-den-tu-hom-qua-tai-ban-2022/1.jpg',
            'price'          => 85000.0,
            'discount_price' => 73000.0,
            'stock_quantity' => 50,
            'page_count'     => '222',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 13 x 0.5 cm',
            'weight'         => '200',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Cô Gái Đến Từ Hôm Qua Nếu ngày xưa còn bé, Thư luôn tự hào mình là cậu con trai thông minh có quyền bắt nạt và sai khiến các cô bé cùng lứa tuổi thì giờ đây khi lớn lên, anh luôn khổ sở khi thấy mình ngu ngơ và bị con gái “xỏ mũi”. Và điều nghịch lý ấy xem ra càng “trớ trêu’ hơn, khi như một định mệnh, Thư nhận ra Việt An, cô bạn học thông minh thường làm mình bối rối bấy lâu nay chính là Tiểu Li, con bé hàng xóm ngốc nghếch từng hứng chịu những trò nghịch ngợm của mình hồi xưa. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-gai-den-tu-hom-qua-tai-ban-2022/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-gai-den-tu-hom-qua-tai-ban-2022/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-gai-den-tu-hom-qua-tai-ban-2022/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-gai-den-tu-hom-qua-tai-ban-2022/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974185178',
            'title'          => 'Bộ Có Hai Con Mèo Ngồi Bên Cửa Sổ (Tái Bản 2023)',
            'slug'           => 'bo-co-hai-con-meo-ngoi-ben-cua-so-tai-ban-2023',
            'image'          => '/images/vanhoc/bo-co-hai-con-meo-ngoi-ben-cua-so-tai-ban-2023/1.jpg',
            'price'          => 100000.0,
            'discount_price' => 85000.0,
            'stock_quantity' => 50,
            'page_count'     => '208',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1 cm',
            'weight'         => '220',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'CÓ HAI CON MÈO NGỒI BÊN CỬA SỔ - MỘT CÂU CHUYỆN NHẸ NHÀNG NHƯNG THẤM ĐẪM CẢM XÚC Hai con mèo, một câu chuyện, và những triết lý cuộc sống tưởng chừng giản đơn nhưng lại sâu sắc đến lạ. Bạn đã bao giờ tự hỏi, loài mèo có biết yêu thương không? Có biết buồn vui, biết nhớ nhung như con người không? Nếu chưa, hãy để “Có Hai Con Mèo Ngồi Bên Cửa Sổ” giúp bạn tìm câu trả lời! VỀ TÁC GIẢ : Nguyễn Nhật Ánh Nguyễn Nhật Ánh – nhà văn gắn liền với tuổi thơ của hàng triệu độc giả Việt Nam. Ông là tác giả của những tác phẩm đình đám như Mắt Biếc, Tôi Thấy Hoa Vàng Trên Cỏ Xanh, Cô Gái Đến Từ Hôm Qua ,… Khởi nghiệp văn chương từ năm 13 tuổi, bắt đầu với thơ trước khi chuyển sang truyện dài và tiểu thuyết. Chuyên viết về tuổi thơ, thanh xuân, các tác phẩm của ông mang đậm chất hoài niệm, trong sáng và đầy cảm xúc. Được yêu thích bởi nhiều thế hệ độc giả, văn phong giản dị, hóm hỉnh nhưng sâu lắng, đầy triết lý nhân sinh. TÓM TẮT NỘI DUNG SÁCH - Tình bạn diệu kỳ vượt qua quy luật tự nhiên Một chú mèo mập lười nhưng thông minh, một cô chim sẻ nhỏ bé nhưng đầy nhiệt huyết – hai loài vốn là thiên địch, nhưng lại trở thành bạn bè. "Có Hai Con Mèo Ngồi Bên Cửa Sổ" không chỉ là câu chuyện dễ thương về tình bạn mà còn chứa đựng triết lý sâu sắc về sự bao dung và thấu hiểu. "Một con mèo không thể yêu một con chim sẻ. Nhưng điều đó không có nghĩa là chúng ta không thể ngồi bên nhau và ngắm bầu trời." Với lối kể chuyện hóm hỉnh, nhẹ nhàng nhưng đầy ý nghĩa, Nguyễn Nhật Ánh mang đến một câu chuyện khiến ta bật cười, rồi lặng người suy ngẫm. Liệu tình bạn của mèo Gấu và sẻ Miêu có thể kéo dài? Và liệu có tình yêu nào vượt qua mọi rào cản? Hãy mở sách và tự tìm câu trả lời! Cuốn sách này mang đến điều gì? Một câu chuyện trong trẻo nhưng thấm đẫm cảm xúc về tình bạn, tình yêu và sự trưởng thành. Những câu thoại sâu sắc, khiến bạn vừa bật cười, vừa nghẹn lòng suy ngẫm. Lối viết nhẹ nhàng nhưng đầy triết lý, giúp bạn nhìn nhận lại những điều quý giá trong cuộc sống. Tại sao nên đọc và sở hữu cuốn sách này? Một cuốn sách dành cho mọi lứa tuổi, từ trẻ em đến người lớn, ai cũng sẽ tìm thấy chính mình trong từng trang sách. Mang đến sự thư giãn, ấm áp, giúp bạn trút bỏ những căng thẳng của cuộc sống bộn bề. Một món quà ý nghĩa, dành cho những ai yêu mèo, yêu văn chương và yêu những điều giản dị trong cuộc sống. "Tớ sẽ luôn ngồi đây, ngay bên cửa sổ này. Bởi vì tớ biết, chỉ cần quay lại, cậu sẽ luôn thấy tớ ở đó." Hãy để “Có Hai Con Mèo Ngồi Bên Cửa Sổ” chạm đến trái tim bạn! Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-hai-con-meo-ngoi-ben-cua-so-tai-ban-2023/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-hai-con-meo-ngoi-ben-cua-so-tai-ban-2023/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-hai-con-meo-ngoi-ben-cua-so-tai-ban-2023/4.JPG', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-hai-con-meo-ngoi-ben-cua-so-tai-ban-2023/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042252997',
            'title'          => 'Bộ Doraemon - Tiểu Thuyết - Nobita Và Cuộc Phiêu Lưu Vào Thế Giới Trong Tranh',
            'slug'           => 'bo-doraemon-tieu-thuyet-nobita-va-cuoc-phieu-luu-vao-the-gioi-trong-tranh',
            'image'          => '/images/vanhoc/bo-doraemon-tieu-thuyet-nobita-va-cuoc-phieu-luu-vao-the-gioi-trong-tranh/1.jpg',
            'price'          => 60000.0,
            'discount_price' => 51000.0,
            'stock_quantity' => 50,
            'page_count'     => '240',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 1.2 cm',
            'weight'         => '235',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Doraemon - Tiểu Thuyết - Nobita Và Cuộc Phiêu Lưu Vào Thế Giới Trong Tranh Khi cả thế giới xôn xao về bức tranh cổ trị giá hàng chục tỉ yên mới được phát hiện thì Nobita đang cặm cụi vẽ bài mĩ thuật được giao trong kì nghỉ hè. Bỗng, một mảnh tranh lạ kì hình miếng chả cá từ đâu rơi trúng đầu cậu. Cậu tò mò, dùng bảo bối đèn dẫn vào tranh để khám phá, và trong tranh, cậu gặp cô bé Claire bí ẩn. Cuộc gặp mở ra một chuyến phiêu lưu vô tiền khoáng hậu. Bất ngờ thay, Công quốc Artoria xinh đẹp mà nhóm bạn đặt chân đến chính là thế giới Trung Cổ trong bức tranh quý đang gây chấn động! Dường như, truyền thuyết hãi hùng về ngày tận thế mà người dân nơi đây truyền tụng đang dần trở thành hiện thực. Liệu nhóm bạn có thể xoay chuyển vận mệnh, phá bỏ lời sấm và giải cứu thế giới trong tranh? --- Tác giả FUJIKO F FUJIO tên thật là Hiroshi Fujimoto. Ông sinh ngày 1 tháng 12 năm 1933 tại thành phố Takaoka, tỉnh Toyama, Nhật Bản. Năm 1951, ông ra mắt sự nghiệp họa sĩ truyện tranh với tác phẩm “Thiên thần Tama”. Khi lấy bút danh Fujiko F Fujio, ông liên tục sáng tác xoay quanh nhân vật “Doraemon”, kiến tạo nên một kỉ nguyên mới của truyện tranh thiếu nhi. Những tác phẩm tiêu biểu của ông bao gồm: “Doraemon”, “Con ma Q-Taro (đồng tác giả)”, “Perman - Cậu bé siêu nhân”, “Cuốn từ điển kì bí”, “Siêu nhân Mami” và “Tuyển tập truyện ngắn khoa học viễn tưởng”. Tháng 9 năm 2011, “FUJIKO·F·FUJIO MUSEUM” đã được khai trương ở thành phố Kawasaki. Đây là bảo tàng nghệ thuật tôn vinh Fujiko F Fujio, trưng bày những bức tranh gốc do chính ông từng chấp bút. Satoshi ITO Biên kịch Satoshi ITO phụ trách viết kịch bản cho loạt phim truyền hình Doraemon trong hơn 10 năm. Bên cạnh đó, ông còn đảm nhận lên ý tưởng kịch bản cho loạt phim Ultraman R/B (Ruebe), Ultraman Chronicle ZERO & GEED, phim Kaiju Step Wandabada. Năm 2017, ông vinh dự nhận Giải thưởng lớn Kinjo Tetsuo lần thứ nhất nhờ những thành tựu trong vai trò biên kịch. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Fujiko F Fujio'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Fujiko F Fujio'],
            ]);
        }
        if (isset($authors['Satoshi Ito'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Satoshi Ito'],
            ]);
        }
        if (isset($authors['Yukiyo Teramoto'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Yukiyo Teramoto'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-doraemon-tieu-thuyet-nobita-va-cuoc-phieu-luu-vao-the-gioi-trong-tranh/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Dân Trí'],
            'isbn'           => '8936213491613',
            'title'          => 'Hà Thanh Hải Yến - Ngang Qua Ngõ Nhỏ Bình An',
            'slug'           => 'ha-thanh-hai-yen-ngang-qua-ngo-nho-binh-an',
            'image'          => '/images/vanhoc/ha-thanh-hai-yen-ngang-qua-ngo-nho-binh-an/1.jpg',
            'price'          => 196000.0,
            'discount_price' => 157000.0,
            'stock_quantity' => 50,
            'page_count'     => '324',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14 x 1.6 cm',
            'weight'         => '200',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Hà Thanh Hải Yến - Ngang Qua Ngõ Nhỏ Bình An Bị bố đánh đập dã man, bị bạn học bắt nạt, trong lúc tuyệt vọng cùng quẫn, tôi tìm đến tiệm xăm trong góc ngõ. Nghe nói ông chủ là một tên côn đồ, rất hung hãn và dữ dằn, người xung quanh đều e sợ anh. Đẩy cửa, tôi moi từ trong túi ra một tờ mười tệ nhàu nhĩ, lấy hết dũng khí hỏi: “Nghe nói anh thu phí bảo kê, vậy anh... có thể bảo vệ tôi không?” Giữa làn khói thuốc lượn lờ, người đàn ông nhếch môi phì cười. “Nhóc con nhà ai đây? To gan thật đấy.” Sau này, anh chỉ vì tờ mười tệ ấy mà bảo vệ tôi suốt mười năm. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Quất Tử Bất Toan'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Quất Tử Bất Toan'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ha-thanh-hai-yen-ngang-qua-ngo-nho-binh-an/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ha-thanh-hai-yen-ngang-qua-ngo-nho-binh-an/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ha-thanh-hai-yen-ngang-qua-ngo-nho-binh-an/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ha-thanh-hai-yen-ngang-qua-ngo-nho-binh-an/5.png', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935095635054',
            'title'          => 'Bộ Hai Số Phận - Kane And Abel - Bìa Cứng (Tái Bản 2025)',
            'slug'           => 'bo-hai-so-phan-kane-and-abel-bia-cung-tai-ban-2025',
            'image'          => '/images/vanhoc/bo-hai-so-phan-kane-and-abel-bia-cung-tai-ban-2025/1.jpg',
            'price'          => 295000.0,
            'discount_price' => 236000.0,
            'stock_quantity' => 50,
            'page_count'     => '768',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 13.5 x 3.8 cm',
            'weight'         => '900',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Hai Số Phận - Kane And Abel HAI SỐ PHẬN - MỘT CUỘC ĐUA KHÔNG CÔNG BẰNG Bạn đã từng tự hỏi mình thuộc về con đường nào trong cuộc đời chưa? Hai Số Phận không chỉ đơn thuần là một cuốn tiểu thuyết, mà còn là bản giao hưởng của những hoài bão, tham vọng và những cuộc đấu tranh không khoan nhượng để vươn tới đỉnh cao. Câu chuyện về hai con người với hai xuất phát điểm khác nhau nhưng cùng chung một khát vọng đã trở thành một trong những tác phẩm kinh điển về ý chí và sự nỗ lực không ngừng. VỀ TÁC GIẢ: Jeffrey Archer - Trước khi trở thành nhà văn, ông từng là một chính trị gia, phục vụ trong Nghị viện Anh. - Là nhà văn, chính trị gia người Anh, nổi danh với những tác phẩm lôi cuốn, đầy kịch tính và bất ngờ. - Những tác phẩm của Archer nổi bật bởi cách xây dựng nhân vật đầy chiều sâu, cốt truyện kịch tính, nhiều bất ngờ. - Ông là tác giả của nhiều cuốn tiểu thuyết bán chạy toàn cầu, trong đó Hai Số Phận (Kane and Abel) là tác phẩm tiêu biểu, đã chinh phục hàng triệu độc giả và được dịch ra hơn 30 ngôn ngữ và tái bản nhiều lần. TÓM TẮT NỘI DUNG SÁCH Hai số phận, hai con người, hai cuộc đời đối lập. Một bên là William Lowell Kane – con trai của một nhà tài phiệt ngân hàng giàu có, lớn lên với mọi điều kiện tốt nhất. Một bên là Abel Rosnovski – một cậu bé mồ côi nghèo khó, sống sót qua bao gian khổ để vươn lên. Hai con người tưởng chừng không có điểm chung, nhưng định mệnh lại gắn kết họ trong một cuộc đối đầu kịch tính kéo dài suốt nhiều thập kỷ. Cuộc chiến giữa họ không chỉ là câu chuyện cá nhân mà còn là biểu tượng cho sự đối lập giữa giàu và nghèo, giữa quyền lực và ý chí vươn lên. Để rồi sau tất cả, liệu hận thù có bị đánh bại bởi lòng bao dung? Cuốn sách mang đến điều gì? - Bài học sâu sắc về ý chí, nghị lực và khát vọng vươn lên. - Làm rung động mọi trái tim quả cảm - Thay đổi cách nhìn về cuộc sống và vận mệnh - Cái nhìn chân thực về sự đối lập giữa giàu và nghèo, về sự khác biệt trong cách con người đi đến thành công qua hai nhân vật chính. Tại sao nên đọc và sở hữu "Hai Số Phận"? - Một trong những tiểu thuyết kinh điển về cuộc sống và sự nghiệp. - Tác phẩm bán chạy toàn cầu, được đánh giá cao bởi cả giới phê bình và độc giả. - Phù hợp với mọi lứa tuổi, đặc biệt dành cho những ai đang khao khát chinh phục ước mơ và vượt qua thử thách. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Jeffrey Archer'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Jeffrey Archer'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-hai-so-phan-kane-and-abel-bia-cung-tai-ban-2025/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-hai-so-phan-kane-and-abel-bia-cung-tai-ban-2025/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974182290',
            'title'          => 'Bộ Harry Potter Và Phòng Chứa Bí Mật - Tập 2 (Tái Bản 2022)',
            'slug'           => 'bo-harry-potter-va-phong-chua-bi-mat-tap-2-tai-ban-2022',
            'image'          => '/images/vanhoc/bo-harry-potter-va-phong-chua-bi-mat-tap-2-tai-ban-2022/1.jpg',
            'price'          => 170000.0,
            'discount_price' => 145000.0,
            'stock_quantity' => 50,
            'page_count'     => '432',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 14 cm',
            'weight'         => '450',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Harry khổ sở mong ngóng cho kì nghỉ hè kinh khủng với gia đình Dursley kết thúc. Nhưng một con gia tinh bé nhỏ tội nghiệp đã cảnh báo cho Harry biết về mối nguy hiểm chết người đang chờ cậu ở trường Hogwarts. Trở lại trường học, Harry nghe một tin đồn đang lan truyền về phòng chứa bí mật, nơi cất giữ những bí ẩn đáng sợ dành cho giới phù thủy có nguồn gốc Muggle. Có kẻ nào đó đang phù phép làm tê liệt mọi người, khiến họ gần như đã chết, và một lời cảnh báo kinh hoàng được tìm thấy trên bức tường. Mối nghi ngờ hàng đầu – và luôn luôn sai lầm – là Harry. Nhưng một việc còn đen tối hơn thế đã được hé mở. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['J K Rowling'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['J K Rowling'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-phong-chua-bi-mat-tap-2-tai-ban-2022/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-phong-chua-bi-mat-tap-2-tai-ban-2022/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-phong-chua-bi-mat-tap-2-tai-ban-2022/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-phong-chua-bi-mat-tap-2-tai-ban-2022/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974179658',
            'title'          => 'Bộ Harry Potter Và Tên Tù Nhân Ngục Azkaban - Tập 3 (Tái Bản)',
            'slug'           => 'bo-harry-potter-va-ten-tu-nhan-nguc-azkaban-tap-3-tai-ban',
            'image'          => '/images/vanhoc/bo-harry-potter-va-ten-tu-nhan-nguc-azkaban-tap-3-tai-ban/1.jpg',
            'price'          => 205000.0,
            'discount_price' => 175000.0,
            'stock_quantity' => 50,
            'page_count'     => '560',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 14 x 2.5 cm',
            'weight'         => '450',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Harry Potter may mắn sống sót đến tuổi 13, sau nhiều cuộc tấn công của Chúa tể hắc ám. Nhưng hy vọng có một học kỳ yên ổn với Quidditch của cậu đã tiêu tan thành mây khói khi một kẻ điên cuồng giết người hàng loạt vừa thoát khỏi nhà tù Azkaban, với sự lùng sục của những cai tù là giám ngục. Dường như trường Hogwarts là nơi an toàn nhất cho Harry lúc này. Nhưng có phải là sự trùng hợp khi cậu luôn cảm giác có ai đang quan sát mình từ bóng đêm, và những điềm báo của giáo sư Trelawney liệu có chính xác? ‘Câu chuyện được kể với trí tưởng tượng bay bổng, sự hài hước bất tận có thể quyến rũ cả người lớn lẫn trẻ em.’ - Sunday Express Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['J.K.Rowling'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['J.K.Rowling'],
            ]);
        }
        if (isset($authors['Lý Lan'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Lý Lan'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-ten-tu-nhan-nguc-azkaban-tap-3-tai-ban/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-ten-tu-nhan-nguc-azkaban-tap-3-tai-ban/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-ten-tu-nhan-nguc-azkaban-tap-3-tai-ban/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-ten-tu-nhan-nguc-azkaban-tap-3-tai-ban/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935325036781',
            'title'          => 'Bộ Hiến Tế Một Trò Hư - Tặng Kèm Bookmark',
            'slug'           => 'bo-hien-te-mot-tro-hu-tang-kem-bookmark',
            'image'          => '/images/vanhoc/bo-hien-te-mot-tro-hu-tang-kem-bookmark/1.jpg',
            'price'          => 196000.0,
            'discount_price' => 157000.0,
            'stock_quantity' => 50,
            'page_count'     => '456',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14.5 x 2.2 cm',
            'weight'         => '470',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Hiến Tế Một Trò Hư Trường trung học tư thục phía Đông dường như được vận hành bằng những luật lệ ngầm, vì sau mỗi Giờ giới nghiêm, vẫn có những buổi học kỳ lạ dành cho các học sinh được gọi là Trò , được dạy bởi người Thầy không thuộc về thế giới của những kẻ đang sống. Vào mỗi năm, ngôi trường đều phải trả một cái giá để có thể tiếp tục tồn tại: hiến tế. Mỗi Trò đều buộc phải đấu tranh để sống sót. Kháng cự hay quy phục, cứu người hay cứu mình; bất kỳ lựa chọn nào cũng chẳng sạch tay. Hiến tế một Trò hư được xây dựng theo kết cấu đa nhánh và đa kết cục. Chính bạn sẽ là người quyết định diễn biến và cái kết của câu chuyện. Hãy nhớ rằng, không có lựa chọn nào là vô hại. Mỗi ngã rẽ sẽ hé lộ một mảnh sự thật, nhưng đồng thời cũng chôn vùi những mảnh còn lại. Về tác giả: Doo Vandenis là tác giả trẻ đeo đuổi thể loại kinh dị xuất thân từ ngành Kỹ thuật Phần mềm (IT), hiện sở hữu hơn 120k+ người theo dõi trên các nền tảng mạng xã hội. Tác giả đã xuất bản và tham gia một số dự án nổi bật như: Vết Máu Ngược (2021, 17 âm 1 (2023, Lớp có Tang sự không cần điểm danh (2024), Webtoon "Classroom’s Mourning Rules" (2025). Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Doo Vandenis'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Doo Vandenis'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-hien-te-mot-tro-hu-tang-kem-bookmark/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-hien-te-mot-tro-hu-tang-kem-bookmark/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-hien-te-mot-tro-hu-tang-kem-bookmark/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thế Giới'],
            'isbn'           => '8935270700171',
            'title'          => 'Iliad (Tái Bản 2026)',
            'slug'           => 'iliad-tai-ban-2026',
            'image'          => '/images/vanhoc/iliad-tai-ban-2026/1.jpg',
            'price'          => 259000.0,
            'discount_price' => null,
            'stock_quantity' => 50,
            'page_count'     => '768',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14 x 3.8 xm',
            'weight'         => '780',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Iliad Iliad được kết hợp bởi truyện truyền khẩu và thần thoại gồm 24 khúc với 15.693 câu thơ, kể về một giai đoạn ngắn vào năm thứ 10 của cuộc chiến thành Troa, về những nỗi uất hận mà vị anh hùng Hy Lạp Achilleus cực chẳng đã phải mang trong lòng, những cảnh ác liệt đẫm máu của chiến trường, sự xung đột sâu sắc của thần linh và mọi thứ như đều nằm dưới bàn tay nghiệt ngã của định mệnh. Đời sống xã hội Hy Lạp cổ đại cũng được phản ánh một cách chân thực trong tác phẩm, trong đó có thể thấy quá trình diễn biến từ chế độ thị tộc đến sự hình thành thành bang của chế độ nô lệ. Tất cả những điều đó đã tạo nên một pho sử thi được đánh giá là lâu đời và hay bậc nhất của nền văn học Tây phương từ cổ chí kim. ĐÁNH GIÁ/NHẬN XÉT CHUYÊN GIA Diễm lệ, bi hùng và thi vị, Iliad là bản tuyên ngôn đầu tiên cho sự tranh đấu vì danh dự và lòng dũng cảm của con người. Chủ đề và giá trị của tác phẩm đã khẳng định được sự ảnh hưởng bền bỉ và sâu rộng trên tất cả các bình diện văn hóa. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Homer'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Homer'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/iliad-tai-ban-2026/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/iliad-tai-ban-2026/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/iliad-tai-ban-2026/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/iliad-tai-ban-2026/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Phụ Nữ Việt Nam'],
            'isbn'           => '8935069910163',
            'title'          => 'Bộ Kẻ Nhắc Tuồng (Tái Bản)',
            'slug'           => 'bo-ke-nhac-tuong-tai-ban',
            'image'          => '/images/vanhoc/bo-ke-nhac-tuong-tai-ban/1.jpg',
            'price'          => 199000.0,
            'discount_price' => 155220.0,
            'stock_quantity' => 50,
            'page_count'     => '516',
            'publish_year'   => '2022',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '23.2 x 15.5 cm',
            'weight'         => '550',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '“Gã luôn đi trước chúng ta một bước” Lời đề tựa rất thu hút và chứa đầy sự mời gọi đối với những độc giả ưa thích thể loại tiểu thuyết tâm lý tội phạm. Và cuốn tiểu thuyết đầu tay của nhà văn người Italia Donato Carrisi, “Kẻ nhắc tuồng” thực sự là một tác phẩm không thể nào bỏ qua. Một bức thư mật gửi từ Trại giam tới Văn phòng Chánh biện lý J.B. Marin đề cập đến trường hợp khẩn cấp về một phạm nhân kì lạ mang số tù RK-357/9 là sự mở đầu dẫn dắt độc giả đến với những bí mật khủng khiếp diễn ra ở hơn 500 trang tiếp theo sau đó: những vụ mất tích liên tiếp của năm bé gái, từ việc biến mất một cách bí ẩn cho đến việc đứa trẻ bị bắt cóc ngay trước mũi cha mẹ chúng. Cuộc điều tra tưởng chừng rơi vào bế tắc thì cũng là lúc sáu cánh tay trái của các nạn nhân được tìm thấy trong khu rừng vắng. Sáu đứa trẻ, thay vì năm và tung tích của đứa trẻ bí ẩn hoàn toàn không có, không thông báo mất tích, không danh tính, thân phận. Nhóm điều tra lúc này buộc phải nhờ đến sự giúp đỡ của một nữ chuyên gia về các vụ mất tích - Mila Vasquez. Đó cũng là lúc vở tuồng bắt đầu, các diễn viên đã đứng đúng vào vị trí và sau lưng họ, kẻ nhắc tuồng luôn đứng đó, thì thầm lời thoại cho vở bi kịch chết chóc. Hắn thì thầm rót vào tai những con người đang bị lung lay nhằm khơi dậy trong họ thứ khoái cảm quyền lực khi được nắm trong tay sinh mệnh kẻ khác. Hắn còn giật dây được cả những hành động của đội điều tra. Tất cả những người này đều là nghệ sĩ trên sân khấu của kẻ nhắc tuồng. Khi Mila Vasquez, một nữ cảnh sát chuyên về các vụ mất tích, nhập cuộc với nhóm điều tra cũng là lúc vở kịch hạ màn theo cách tốt đẹp nhất có thể. Nhưng chính bản thân cô lại phải hứng chịu đau đớn nhiều nhất khi phát hiện ra một sự thật khác còn đau lòng hơn: những cảm xúc đã bị chôn vùi cùng với quá khứ của cô nay lại được “đánh thức”, và có lẽ cô sẽ không cần phải tìm đến những cảm xúc ấy bằng cách tự làm tổn thương mình, theo nghĩa đen nữa. Câu chuyện được kể chủ yếu qua cái nhìn của nhân vật chính Mila, nhưng người đọc sẽ có cái nhìn đa chiều về quá khứ của nỗi đau khi bản chất của từng nhân vật dần được hé lộ. Người mà chúng ta tưởng rằng tốt hóa ra lại trở nên điên loạn, kẻ chúng ta không ưa lại khiến ta cảm thông, thương xót. Đặc biệt có những nhân vật lại đứng giữa ranh giới của tốt - xấu, đáng ghét - đáng thương, lạnh lùng - tình cảm. Tác giả Donato Carrisi sinh năm 1973 ở Ý, tốt nghiệp ngành luật và tội phạm học trước khi trở thành nhà viết kịch bản phim truyền hình. Cuốn tiểu thuyết trinh thám đầu tay Kẻ nhắc tuồng của ông đã gây được tiếng vang lớn với năm giải thưởng Văn học quốc tế, được dịch ra hơn 30 thứ tiếng, và đưa tác giả lên vị trí “nhà văn Italia được đọc nhiều nhất trên thế giới”. Dịch giả Hoàng Anh , tên thật là Vũ Hoàng Anh, là dịch giả hai thứ tiếng Anh, Pháp. Bén duyên với công việc dịch thuật từ năm 2009, cho đến nay anh đã ra mắt bạn đọc gần 40 dịch phẩm và nhận được sự đánh giá cao không chỉ bởi nội dung hấp dẫn của tác phẩm, mà còn',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Donato Carrisi'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Donato Carrisi'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ke-nhac-tuong-tai-ban/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Phụ Nữ Việt Nam'],
            'isbn'           => '9786044908861',
            'title'          => 'Kẻ Trộm Cà Chua',
            'slug'           => 'ke-trom-ca-chua',
            'image'          => '/images/vanhoc/ke-trom-ca-chua/1.jpg',
            'price'          => 96000.0,
            'discount_price' => 74880.0,
            'stock_quantity' => 50,
            'page_count'     => '248',
            'publish_year'   => '2025',
            'language'       => 'Tieng Viet',
            'dimensions'     => '21 x 13 x 1.2 cm',
            'weight'         => '300',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Kẻ Trộm Cà Chua Cậu bé Tom 11 tuổi sống trong một căn nhà tạm xập xệ với người mẹ trẻ con nhiều hơn cậu chỉ….13 tuổi rưỡi. Vì Joss – mẹ của Tom rất hay đi chơi khuya, yêu đương và thường xuyên đi chơi cuối tuần với bạn trai, nên Tom luôn phải ở nhà một mình và tự lo liệu mọi thứ. Để có cái ăn, Tom lén đến các vườn rau của hàng xóm để trộm vài củ cà rốt, khoai tây… Nhưng vì rất sợ bị tóm vào trại cải tạo (Joss từng dọa nếu cậu mà bị tóm vào đó thì chẳng còn đường nào mà ra), Tom hết sức cẩn thận, xóa hết dấu vết, trồng lại những cây cà rốt, khoai tây mà cậu đã nhổ lên. Một tối nọ, khi đang tìm một khu vườn mới để “đi chợ”, Tom bắt gặp cụ bà Madeleine ngoài 90 tuổi đang nằm khóc giữa đám bắp cải và không thể đứng dậy. Bà già tội nghiệp có lẽ sẽ chết nếu như nhóc Tom không tình cờ đi ngang qua đó… Cậu bé đã cố gắng đưa bà vào nhà, gọi cứu hộ chở bà đến viện và ngày ngày chăm sóc cho con chó, con mèo của bà. Bằng sự tận tụy, tốt bụng, đầy trách nhiệm với con người và cuộc sống nhưng vẫn giữ được tâm hồn thơ trẻ của mình, Tom kết nối những người tưởng như không liên quan hoặc không còn sự liên quan lại với nhau: đó là mẹ cậu – Joss đang cố gắng từng ngày để mọi người yêu mến cô vì chính bản thân cô chứ không phải vì bộ ngực; là bố cậu Samy – người đang sửa chữa lại cuộc đời mình sau khi ra tù; là bà Madeleine với quá khứ đau buồn; là vợ chồng ông hàng xóm người Anh tốt bụng… Kẻ trộm cà chua được viết bằng giọng văn trong trẻo, ngắn gọn, đôi khi mang nét hồn nhiên như chính nhân vật trong truyện. Tác giả đã dựng nên hình ảnh những nhân vật không hoàn hảo mà hết sức chân thật. Cuộc sống của các nhân vật trong tác phẩm đều không dễ dàng, nhưng khi họ gặp nhau, mọi thứ bỗng trở nên nhẹ nhàng hơn và khiến những điều giản dị trong cuộc sống hằng ngày cũng trở nên đẹp đẽ hơn. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Barbara Constantine'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Barbara Constantine'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ke-trom-ca-chua/2.png', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ke-trom-ca-chua/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ke-trom-ca-chua/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '9786043230574',
            'title'          => 'Bộ Không Gia Đình - Nobody’s Boy - Song Ngữ Anh-Việt - Tập 1',
            'slug'           => 'bo-khong-gia-dinh-nobodys-boy-song-ngu-anh-viet-tap-1',
            'image'          => '/images/vanhoc/bo-khong-gia-dinh-nobodys-boy-song-ngu-anh-viet-tap-1/1.jpg',
            'price'          => 89000.0,
            'discount_price' => 72000.0,
            'stock_quantity' => 50,
            'page_count'     => '334',
            'publish_year'   => '2024',
            'language'       => 'Song Ngữ Anh - Việt',
            'dimensions'     => '20.5 x 15 x 1.6 cm',
            'weight'         => '350',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Không Gia Đình - Nobody’s Boy - Song Ngữ Anh-Việt - Tập 1 “Không Gia Đình” của tác giả Hector Malot là một trong những tác phẩm văn học Pháp kinh điển. Nội dung là câu chuyện đầy cảm động và sâu sắc về cuộc đời và hành trình đi tìm lại gia đình thật của cậu bé mồ côi Remi. Remi được ông Barberin nhặt được vào một đêm mùa đông giữa thủ đô Paris và mang về cho vợ của ông là bà Barberin hiền lành, tốt bụng nuôi dưỡng. Remi được mẹ nuôi hết mực yêu thương và chăm sóc như con ruột. Nhưng khi Remi 8 tuổi, gia đình bố mẹ nuôi gặp biến cố, cậu bé đã bị bố nuôi bán cho cụ Vitalis, một nghệ sĩ đường phố già. Cụ Vitalis dẫn dắt Remi cùng đoàn xiếc của mình gồm chú khỉ Joli-Cœur, chú chó thông minh Capi và hai chú chó nhỏ khác đi biểu diễn khắp nước Pháp để kiếm sống. Trên đường đi, Rémi học hỏi được nhiều kỹ năng sống và cũng dần phát hiện ra niềm đam mê âm nhạc của mình, cậu bé cũng cảm nhận được tình yêu mà cụ Vitalis dành cho cậu dù cả hai cụ cháu không phải là ruột thịt máu mủ. Trong suốt cuộc hành trình rong ruổi khắp nước Pháp, Remi và cụ Vitalis gặp phải không ít những khó khăn, thử thách cam go và khốc liệt của cuộc sống cũng như nghịch cảnh của xã hội thời bấy giờ. Tuy nhiên, cậu bé cũng tìm thấy tình bạn, tình thương yêu từ những người lạ mặt – những người sau này trở thành gia đình của cậu. Trải qua mỗi thử thách, Remi trưởng thành hơn, mạnh mẽ và kiên cường hơn trước. Câu chuyện mang đến thông điệp mạnh mẽ về tình yêu, sự lương thiện, và ý nghĩa của gia đình – đó không chỉ là nơi chúng ta sinh ra mà còn là nơi chúng ta được yêu thương, che chở và quay trở về. “Không Gia Đình” là một cuốn sách đầy nhân văn không chỉ cho trẻ em, mà còn mang lại những bài học giá trị cho cả người lớn. Cuốn sách đã trở thành một phần không thể thiếu trong nền văn hóa đọc của nhân loại, được yêu thích qua nhiều thế hệ, và tiếp tục truyền cảm hứng cho độc giả khám phá ý nghĩa sâu sắc của cuộc sống. ƯU ĐIỂM CỦA BỘ SÁCH Phần tiếng Anh là bản dịch của Florence Crewe-Jones năm 1916 – một bản dịch vô cùng được yêu thích bởi những người yêu tiếng Anh trên khắp thế giới. Là bản song ngữ duy nhất trên thị trường. Giúp độc giả luyện thêm Tiếng Anh dễ dàng hơn, vừa giải trí và tăng vốn từ qua tác phẩm đậm chất nhân văn. Nuôi dưỡng trí tuệ cảm xúc (EQ) và cảm nhận tác phẩm kinh điển này bằng cả hai thứ tiếng. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Hector Malot'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Hector Malot'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-khong-gia-dinh-nobodys-boy-song-ngu-anh-viet-tap-1/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-khong-gia-dinh-nobodys-boy-song-ngu-anh-viet-tap-1/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Trẻ'],
            'isbn'           => '8934974164135',
            'title'          => 'Bộ Làm Bạn Với Bầu Trời',
            'slug'           => 'bo-lam-ban-voi-bau-troi',
            'image'          => '/images/vanhoc/bo-lam-ban-voi-bau-troi/1.jpg',
            'price'          => 110000.0,
            'discount_price' => 94000.0,
            'stock_quantity' => 50,
            'page_count'     => '220',
            'publish_year'   => '2019',
            'language'       => 'Tieng Viet',
            'dimensions'     => '13 x 20 x 1.1',
            'weight'         => '300',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Làm Bạn Với Bầu Trời Một câu chuyện giản dị, chứa đầy bất ngờ cho tới trang cuối cùng. Và đẹp lộng lẫy, vì lòng vị tha và tình yêu thương, khiến mắt rưng rưng vì một nỗi mừng vui hân hoan. Cuốn sách như một đốm lửa thắp lên lòng khát khao sống tốt trên đời. Viết về điều tốt đã không dễ, viết sao cho người đọc có thể đón nhận đầy cảm xúc tích cực, và muốn được hưởng, được làm những điều tốt dù nhỏ bé... mới thật là khó. Làm bạn với bầu trời của Nguyễn Nhật Ánh đã làm được điều này. Như nhà văn từng phát biểu “...điểm mạnh của văn chương nằm ở khả năng thẩm thấu. Bằng hình thức đặc thù của mình, văn chương góp phần mài sắc các ý niệm đạo đức nơi người đọc một cách vô hình. Bồi đắp tâm hồn và nhân cách một cách âm thầm và bền bỉ, đó là chức năng gốc rễ của văn chương, đặc biệt là văn chương viết cho thanh thiếu niên.” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-lam-ban-voi-bau-troi/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-lam-ban-voi-bau-troi/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-lam-ban-voi-bau-troi/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-lam-ban-voi-bau-troi/5.JPG', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '8935352615485',
            'title'          => 'Bộ [Light Novel] Dược Sư Tự Sự - Tập 5 - Tặng Kèm Bookmark',
            'slug'           => 'bo-light-novel-duoc-su-tu-su-tap-5-tang-kem-bookmark',
            'image'          => '/images/vanhoc/bo-light-novel-duoc-su-tu-su-tap-5-tang-kem-bookmark/1.jpg',
            'price'          => 125000.0,
            'discount_price' => 107000.0,
            'stock_quantity' => 50,
            'page_count'     => '468',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 2.3 cm',
            'weight'         => '485',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '[Light Novel] Dược Sư Tự Sự - Tập 5 Cuộc nổi loạn của Tử tộc được dẹp yên, hoàng tử chào đời trong cung cấm, Ngọc Diệp trở thành chính cung hoàng hậu. Nhâm Thị tham gia xử lí chính sự với thân phận hoàng đệ thay vì hoạn quan. Thoạt nhìn, mọi việc tưởng chừng như đã yên bình, thế nhưng bầu không khí bất ổn lại lan toả khắp kinh thành. Miêu Miêu thì vẫn như mọi khi, dính dáng tới vụ án đồ ngọt có độc bí ẩn, mối lo ngại về nạn châu chấu, vấn đề quyền sở hữu ở ngôi làng làm giấy... và xía mũi vào mấy chuyện này. Bên cạnh đó, theo mệnh lệnh của Nhâm Thị, cô cũng phải đi đến quê hương của Ngọc Diệp phi, địa điểm mang tên gọi Tây Đô. Tại buổi vũ hội nơi vô vàn đoá hoa rực rỡ nở rộ, âm mưu của kẻ nào đó đang lẩn khuất. Liệu Miêu Miêu có thể vạch trần ý đồ đó hay không!? Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Natsu Hyuuga'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Natsu Hyuuga'],
            ]);
        }
        if (isset($authors['Touko Shino'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Touko Shino'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-duoc-su-tu-su-tap-5-tang-kem-bookmark/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042251754',
            'title'          => 'Bộ [Light Novel] Dược Sư Tự Sự - Tập 7 - Tặng Kèm Bookmark',
            'slug'           => 'bo-light-novel-duoc-su-tu-su-tap-7-tang-kem-bookmark',
            'image'          => '/images/vanhoc/bo-light-novel-duoc-su-tu-su-tap-7-tang-kem-bookmark/1.jpg',
            'price'          => 125000.0,
            'discount_price' => 107000.0,
            'stock_quantity' => 50,
            'page_count'     => '408',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 2 cm',
            'weight'         => '430',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '[Light Novel] Dược Sư Tự Sự - Tập 7 Vụ việc của Lí Thụ phi giải quyết xong chưa được bao lâu, Cao Thuận đã lại đem rắc rối đến chỗ Miêu Miêu. Cụ thể, người ta cần Miêu Miêu tham gia kì thi tuyển nữ quan. Miêu Miêu đã dự thi trong tình trạng nửa phần là bị ép buộc. Kết quả, Miêu Miêu trở thành nữ quan mới phụ việc cho thái y. Trong thời gian này, Miêu Miêu chạm trán với một quân sư quái nhân phiền phức, những thái y thượng cấp nghiêm khắc và các nữ quan đồng nghiệp... Các nữ quan này dường như đã thoả thuận với nhau bày trò chơi xỏ Miêu Miêu. Đặc biệt là nữ quan đứng đầu tên Diêu thường xuyên tỏ ra thù địch. * DƯỢC SƯ TỰ SỰ là series light-novel thể loại trinh thám vô cùng độc đáo lấy bối cảnh cung đình. Truyện đã được chuyển thể manga và anime ra mắt vào cuối năm 2023. Toàn series đã vượt mốc 40 triệu bản tại thị trường Nhật Bản và luôn thống trị các bảng xếp hạng bán chạy mỗi khi ra tập mới! Anime đã chiếu xong mùa 2 và dự kiến sẽ có mùa 3 trong thời gian tới. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Touko Shino'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Touko Shino'],
            ]);
        }
        if (isset($authors['Hyuganatsu'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Hyuganatsu'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-duoc-su-tu-su-tap-7-tang-kem-bookmark/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-light-novel-duoc-su-tu-su-tap-7-tang-kem-bookmark/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974189640',
            'title'          => 'Bộ Mùa Hè Không Tên - Tặng Kèm Bookmark 2 Mặt + Poster Tranh',
            'slug'           => 'bo-mua-he-khong-ten-tang-kem-bookmark-2-mat-poster-tranh',
            'image'          => '/images/vanhoc/bo-mua-he-khong-ten-tang-kem-bookmark-2-mat-poster-tranh/1.jpg',
            'price'          => 130000.0,
            'discount_price' => 111000.0,
            'stock_quantity' => 50,
            'page_count'     => '292',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1.4 cm',
            'weight'         => '310',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Mùa Hè Không Tên “Mùa hè không tên” là truyện dài mới nhất của nhà văn Nguyễn Nhật Ánh, với những câu chuyện tuổi thơ với vô số trò tinh nghịch, những thoáng thinh thích hồi hộp cùng vô vàn kỷ niệm. Để rồi khi những tháng ngày trong sáng của tình bạn dần qua, bọn nhỏ trong mỗi gia đình bình dị lớn lên cùng chứng kiến những giây phút cảm động của câu chuyện tình thân, nỗi khát khao hạnh phúc êm đềm, cùng bỡ ngỡ bước vào tuổi lớn nhiều yêu thương mang cả màu va vấp. Mùa hè năm ấy của cậu bé Khang không chỉ toàn chuyện leo cây hái trái và qua lại với con Nhàn hồn hậu đáng yêu ưa nuôi bọn cá dị tật, mà có Tí, có Chỉnh, rồi Túc, Đính… phải đối mặt với những thử thách của số phận. Nhưng vì sao là “mùa hè không tên”? “Đó là mùa hè thật đặc biệt với tôi. Sau mùa hè đó, cuộc sống của tôi đã thay đổi mãi mãi. Vì vậy tôi muốn đặt cho nó một cái tên để nó không giống với những mùa hè khác trong đời tôi mỗi khi tôi nhớ về. Tôi định gọi nó là mùa hè chia tay, mùa hè ưu tư, mùa hè định mệnh , hay sến sẩm một chút là mùa hè có mây tím bay nhưng rồi tôi thấy không cái tên nào thật sự phù hợp. Cuối cùng, tôi nghĩ nếu cần phải có một cái tên thì tôi sẽ đặt tên cho nó là mùa hè không tên . Ờ, mùa hè đặc biệt của tôi cần gì phải khoác một cái tên riêng khi mà mỗi lần đầu óc tôi quay ngược về thời kỳ đó, tôi luôn thấy lòng đầy xáo trộn. Nó đã khắc lên số phận tôi những dấu vết không thể phai mờ - như vết chàm mà con người ta phải mang theo cho đến tận cuối đời.” (Trích) Nhà văn Nguyễn Nhật Ánh vốn nổi tiếng qua nhiều thế hệ bạn đọc với nhiều tác phẩm đi vào lòng người. Với tác phẩm này, ông vẫn luôn giữ thông điệp khơi dậy khao khát sống đẹp, sống tử tế nơi người đọc. Sách gồm 25 tranh minh họa lớn và nhiều minh họa nhỏ xinh xắn từ họa sĩ Đỗ Hoàng Tường. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-mua-he-khong-ten-tang-kem-bookmark-2-mat-poster-tranh/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-mua-he-khong-ten-tang-kem-bookmark-2-mat-poster-tranh/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-mua-he-khong-ten-tang-kem-bookmark-2-mat-poster-tranh/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-mua-he-khong-ten-tang-kem-bookmark-2-mat-poster-tranh/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Dân Trí'],
            'isbn'           => '8935325022449',
            'title'          => 'Năm Điều Ước Của Ông Murray McBride',
            'slug'           => 'nam-dieu-uoc-cua-ong-murray-mcbride',
            'image'          => '/images/vanhoc/nam-dieu-uoc-cua-ong-murray-mcbride/1.jpg',
            'price'          => 139000.0,
            'discount_price' => 112000.0,
            'stock_quantity' => 50,
            'page_count'     => '360',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14.5 x 1.8 cm',
            'weight'         => '380',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'NĂM ĐIỀU ƯỚC CỦA ÔNG MURRAY MCBRIDE - CUỘC GẶP GỠ THAY ĐỔI SỐ PHẬN Một trăm năm cuộc đời để rồi chỉ còn lại sự cô độc… Một cậu bé mười tuổi với trái tim có thể ngừng đập bất cứ lúc nào… Điều gì sẽ xảy ra khi số phận của họ giao nhau? Không còn gia đình, không còn lý do để tiếp tục, ông quyết định tự mình đặt dấu chấm hết cho cuộc đời. Nhưng rồi, cuộc gặp gỡ tình cờ với Jason Cashman - một người sắp rời bỏ thế gian và một người đang cố níu kéo từng phút giây. Liệu số phận có mang đến điều kỳ diệu? VỀ TÁC GIẢ: Joe Siple Là nhà văn người Mỹ, chuyên viết tiểu thuyết truyền cảm hứng. Được biết đến với lối viết nhẹ nhàng nhưng sâu sắc, chạm đến những cảm xúc tinh tế nhất. Tác phẩm của ông đã giành được nhiều giải thưởng văn học uy tín. “Năm Điều Ước Của Ông Murray McBride” là một trong những cuốn sách nổi bật nhất của ông. VỀ DỊCH GIẢ : Phương Ly Dịch giả tâm huyết với nhiều năm kinh nghiệm trong lĩnh vực chuyển ngữ văn học. Có phong cách dịch tự nhiên, mượt mà, giúp giữ nguyên tinh thần của tác phẩm gốc. TÓM TẮT NỘI DUNG SÁCH Murray McBride đã sẵn sàng rời bỏ thế gian này… cho đến khi ông gặp Jason Cashman – cậu bé mắc bệnh tim bẩm sinh, được bác sĩ chẩn đoán không thể sống bao lâu nữa. Nhưng thay vì sợ hãi hay tuyệt vọng, Jason lại có một danh sách năm điều ước đầy táo bạo. Cậu bé không cần sự thương hại, cậu chỉ cần một người có thể giúp mình hoàn thành những ước mơ dang dở. Cuộc gặp gỡ ấy đã kéo Murray vào một hành trình kỳ lạ – nơi ông lần đầu tiên trong nhiều năm cảm nhận được ý nghĩa của sự tồn tại. Từ một người đã mất đi mọi động lực sống, Murray trở thành người bạn đồng hành của Jason, cùng cậu thực hiện những điều không tưởng. Nhưng khi số phận sắp đặt thử thách cuối cùng, cả hai sẽ đối mặt với một lựa chọn khó khăn nhất trong đời… và liệu phép màu có thực sự tồn tại? DẤU ẤN ĐẶC BIỆT CỦA CUỐN SÁCH NÀY? Lọt vào danh sách những tiểu thuyết truyền cảm hứng được yêu thích nhất. Nhận được nhiều đánh giá tích cực từ giới phê bình văn học về cách khai thác chủ đề cuộc sống và cái chết một cách sâu sắc nhưng vẫn đầy hy vọng. Được chuyển ngữ sang nhiều ngôn ngữ, mang câu chuyện lay động lòng người đến với độc giả toàn cầu. ĐIỀU GÌ KHIẾN BẠN KHÔNG THỂ BỎ LỠ CUỐN SÁCH NÀY? Một góc nhìn độc đáo về giá trị của thời gian và ý nghĩa của sự tồn tại. Một hành trình đầy cảm xúc, có bi thương, có hy vọng, có những khoảnh khắc khiến trái tim rung động mạnh mẽ. Những nhân vật có chiều sâu, mỗi lời thoại và hành động đều mang một ý nghĩa đặc biệt. Một thông điệp mạnh mẽ về tình bạn, sự gắn kết và sức mạnh của lòng kiên trì. CUỐN SÁCH NÀY MANG ĐẾN ĐIỀU GÌ? Một cốt truyện hiếm có, kết hợp giữa sự kịch tính và chiều sâu nhân văn. Những tình tiết được xây dựng tinh tế, không chỉ kể một câu chuyện mà còn khơi gợi suy ngẫm. Một tác phẩm chạm đến cảm xúc chân thực nhất của con người, khiến người ta phải nhìn lại những điều tưởng chừng như nhỏ bé nhưng quý giá trong cuộc sống. Ngôn ngữ trau chuốt, cách dẫn dắt cuốn hút từ trang đầu tiên đến trang cuối cùng. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Joe Siple'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Joe Siple'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/nam-dieu-uoc-cua-ong-murray-mcbride/2.png', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/nam-dieu-uoc-cua-ong-murray-mcbride/3.png', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/nam-dieu-uoc-cua-ong-murray-mcbride/4.png', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/nam-dieu-uoc-cua-ong-murray-mcbride/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974176411',
            'title'          => 'Bộ Ngồi Khóc Trên Cây (Tái Bản 2022)',
            'slug'           => 'bo-ngoi-khoc-tren-cay-tai-ban-2022',
            'image'          => '/images/vanhoc/bo-ngoi-khoc-tren-cay-tai-ban-2022/1.jpg',
            'price'          => 130000.0,
            'discount_price' => 111000.0,
            'stock_quantity' => 50,
            'page_count'     => '341',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 13 x 1.5 cm',
            'weight'         => '320',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Ngồi Khóc Trên Cây (Tái Bản 2022) Mở đầu là kỳ nghỉ hè tại một ngôi làng thơ mộng ven sông với nhân vật là những đứa trẻ mới lớn có vô vàn trò chơi đơn sơ hấp dẫn ghi dấu mãi trong lòng. Mối tình đầu trong veo của cô bé Rùa và chàng sinh viên quê học ở thành phố có giống tình đầu của bạn thời đi học? Và cái cách họ thương nhau giấu giếm, không dám làm nhau buồn, khát khao hạnh phúc đến nghẹt thở có phải là câu chuyện chính? “Nồng nàn lên với Cốc rượu trên tay Xanh xanh lên với Trời cao ngàn ngày Dài nhanh lên với Tóc xõa ngang mày Lớn nhanh lên với Bé bỏng chiều nay” Bạn sẽ được tác giả dẫn đi liền một mạch trong một thứ cảm xúc rưng rưng của tình yêu thương. Bạn sẽ thấy may mắn vì đang đuợc sống trong cuộc sống này, thấy yêu thế những tấm tình người… tất cả đều đẹp hồn hậu một cách giản dị. Với cuốn sách này, một lần nữa người đọc lại được Nguyễn Nhật Ánh tặng món quà quý giá: lòng tin vào điều tốt có thật trên đời. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ngoi-khoc-tren-cay-tai-ban-2022/2.JPG', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ngoi-khoc-tren-cay-tai-ban-2022/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ngoi-khoc-tren-cay-tai-ban-2022/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-ngoi-khoc-tren-cay-tai-ban-2022/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thế Giới'],
            'isbn'           => '8935270700188',
            'title'          => 'Odyssêy (Tái Bản 2026)',
            'slug'           => 'odyssey-tai-ban-2026',
            'image'          => '/images/vanhoc/odyssey-tai-ban-2026/1.jpg',
            'price'          => 219000.0,
            'discount_price' => 187000.0,
            'stock_quantity' => 50,
            'page_count'     => '688',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14 x 3.4 cm',
            'weight'         => '700',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Odyssêy Bản anh hùng ca Odyssêy là bức tranh hoành tráng, hào hùng của người Hy Lạp trong cuộc chinh phục thiên nhiên và di dân mở đất. Tác phẩm gồm 12.110 câu thơ, chia làm 24 khúc ca, kể lại hành trình gian nan của Odysseus trên đường trở về quê hương sau khi quân Hy Lạp hạ được thành Troa. Odyssêy phản ánh giai đoạn cao trào trong quá trình tan rã của chế độ công xã thị tộc : Đó là thời kỳ những người Hy Lạp đã bước vào cuộc sống lao động hòa bình có khát vọng chinh phục thế giới xung quanh, thời kỳ hình thành gia đình một vợ một chồng với chế độ phụ quyền và quyền tư hữu tài sản. Ngoài ra ta còn thấy khát vọng sống văn minh, hữu ái, của người xưa như một nguyện vọng không riêng gì của thời đại Homer mà của nhân loại ở mọi thời đại. Odyssêy có sự kết hợp tài tình giữa những thứ giản dị với phong phú, thực tế với tưởng tượng, hữu hình với vô hình, thần linh với thế nhân, ảnh hưởng sâu dậm tới văn hóa, văn minh Tây phương, hơn bất kỳ sáng tác văn chương nào từ trước tới giờ. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Homer'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Homer'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/odyssey-tai-ban-2026/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/odyssey-tai-ban-2026/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/odyssey-tai-ban-2026/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/odyssey-tai-ban-2026/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thế Giới'],
            'isbn'           => '8938539539581',
            'title'          => 'Quá Trẻ Để Chết - Hành Trình Nước Mỹ',
            'slug'           => 'qua-tre-de-chet-hanh-trinh-nuoc-my',
            'image'          => '/images/vanhoc/qua-tre-de-chet-hanh-trinh-nuoc-my/1.jpg',
            'price'          => 129000.0,
            'discount_price' => 104000.0,
            'stock_quantity' => 50,
            'page_count'     => '248',
            'publish_year'   => '2025',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20.5 x 14 x 1.2 cm',
            'weight'         => '290',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Quá Trẻ Để Chết - Hành Trình Nước Mỹ “Trong những ngày xuân của năm 2013 giữa Washington D.C., tôi chỉ không biết, đó sẽ là một trong những câu chuyện đẹp đẽ và rực rỡ nhất đời mình. Những ngày ấy D.C. mưa đầu xuân thánh thót, lâm râm, làm ướt đẫm những bông hoa trà thắm đỏ trong khu vườn cuối phố. Mưa thế, gió vậy, mà anh đào vẫn bung cánh, cuộc sống vẫn chuyển mình sang trang, chỉ có tôi là đứng lại trước ranh giới mong manh của mùa, bâng khuâng không biết cuộc đời rồi sẽ lật sang trang nào. Bỏ nhà bỏ cửa ra đi nửa vòng Trái Đất, để một ngày nhìn cơn mưa xuân kéo dài đã mấy tiếng đồng hồ như chẳng bao giờ dứt, rồi bật chiếc dù màu xanh của Robert lên và bước đi. Trong những cơn mưa tuổi trẻ ấy, nào có ai thấy được đường đi, biết ở cuối đường nắng có ửng hồng rực rỡ hay không. Nhưng đôi khi tất cả những gì người ta có thể làm là bước đi, và để cho mình ướt. Vì không đi thì sẽ không bao giờ biết cuối đường nắng đã lên chưa.” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Đinh Hằng'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Đinh Hằng'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Dân Trí'],
            'isbn'           => '8936230471926',
            'title'          => 'Sự Xảo Quyệt Của Vệ Nữ',
            'slug'           => 'su-xao-quyet-cua-ve-nu',
            'image'          => '/images/vanhoc/su-xao-quyet-cua-ve-nu/1.jpg',
            'price'          => 249000.0,
            'discount_price' => 224100.0,
            'stock_quantity' => 50,
            'page_count'     => '508',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14 x 2.5 cm',
            'weight'         => '520',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Sự Xảo Quyệt Của Vệ Nữ Một cuộc điện thoại bất ngờ gọi đến cho Hakurou - một bác sĩ thú y độc thân dễ rung động. “Rất vui được gặp anh, anh chồng yêu quý!” Người phụ nữ ở đầu dây bên kia tự xưng là Kaede, vợ mới cưới của Akito - em trai cùng mẹ khác cha của anh. Cô nói rằng Akito đã mất tích và nhờ Hakurou giúp đỡ. Trong quá trình tìm kiếm em trai, Hakurou dần bị cuốn vào vòng xoáy của lòng tham, sự toan tính thừa kế tài sản, bí mật gia tộc, và phát hiện ra chân tướng vụ tai nạn dẫn đến cái chết của người mẹ năm xưa. Còn đối với cạm bẫy ngọt ngào do Kaede giăng ra, Hakurou dần không biết mình đang tiến gần đến sự thật hay chìm sâu hơn vào dối trá…. Về tác giả HIGASHINO KEIGO sinh năm 1958 tại Osaka. Tốt nghiệp khoa Kỹ thuật Đại học Công lập Osaka (Osaka Prefecture University). Năm 1985, ông bắt đầu sự nghiệp nhà văn với tác phẩm Houkago, đoạt giải thưởng Edogawa Ranpo lần thứ 31. Năm 1999, ông nhận giải thưởng Hiệp hội nhà văn trinh thám Nhật Bản lần thứ 52 cho tác phẩm Himitsu. Năm 2006, ông đoạt giải thưởng Naoki lần thứ 134 và giải thưởng Honkaku Mystery lần thứ 6 cho tác phẩm Yougisha X no Kenshin. Năm 2012, ông nhận giải thưởng Văn học Công luận Trung ương lần thứ 7 cho tác phẩm Namiya Zakka-ten no Kiseki. Năm 2013, ông đoạt giải thưởng Shibata Renza-buro lần thứ 26 cho tác phẩm Mugen Hana. Năm 2014, ông nhận giải thưởng Văn học Eiji Yoshikawa lần thứ 48 cho tác phẩm Inori no Maku ga Oriru Toki. Năm 2019, ông được trao giải thưởng Văn hóa Xuất bản Noma lần thứ nhất. Các tác phẩm tiêu biểu của ông bao gồm: Bunshin, Byakuyakou, Genya, Kokushou Shousetsu, loạt truyện Masquerade Hotel, Hakuchou to Koumori, Toumei na Rasen và nhiều tác phẩm khác. Thông tin về sách: - Cuốn sách là một câu chuyện kịch tính về gia đình pha trộn yếu tố trinh thám, để lại những câu hỏi về lòng tham, niềm tin và tình thân. - “Vệ Nữ” trong nhan đề không chỉ là nữ thần sắc đẹp mà còn tượng trưng cho sức hấp dẫn khiến con người mất khả năng phán đoán. Ấn tượng ban đầu dễ khiến con người đưa ra những quyết định sai lầm. => Một “thí nghiệm tâm lý” cho nam chính Kakurou trước nữ chính Kaede. - Hành trình điều tra không chỉ nhằm tìm kiếm người mất tích mà còn là quá trình kiểm chứng lòng tin giữa người với người. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Higashino Keigo'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Higashino Keigo'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/su-xao-quyet-cua-ve-nu/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/su-xao-quyet-cua-ve-nu/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935212362139',
            'title'          => 'Bộ Thép Đã Tôi Thế Đấy (Tái Bản 2023)',
            'slug'           => 'bo-thep-da-toi-the-day-tai-ban-2023',
            'image'          => '/images/vanhoc/bo-thep-da-toi-the-day-tai-ban-2023/1.jpg',
            'price'          => 139000.0,
            'discount_price' => 97300.0,
            'stock_quantity' => 50,
            'page_count'     => '516',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '23 x 16 x 2 cm',
            'weight'         => '500',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Thép Đã Tôi Thế Đấy Thép Đã Tôi Thế Đấy không phải là một tác phẩm văn học chỉ nhìn đời mà viết. Tác giả sống nó rồi mới viết nó. Nhân vật trung tâm Pa-ven chính là tác giả: Nhi-ca-lai A-xtơ-rốp- xki. Là một chiến sĩ cách mạng tháng Mười, ông đã sống một cách nồng cháy nhất, như nhân vật Pa-ven của ông. Cũng không phải một cuốn tiểu thuyết tự thuật thường vì hứng thú hay lợi ích cá nhân mà viết. A-xtơ-rốp-xki viết Thép Đã Tôi Thế Đấy trên giường bệnh, trong khi bại liệt và mù, bệnh tật tàn phá chín phần mười cơ thể. Chưa bao giờ có một nhà văn sáng tác trong những điều kiện gian khổ như vậy. Trong lòng người viết phải có một nhiệt độ cảm hứng nồng nàn không biết bao nhiêu mà kể. Nguồn cảm hứng ấy là sức mạnh tinh thần của người chiến sĩ cách mạng bị tàn phế, đau đớn đến cùng cực, không chịu nằm đợi chết, không thể chịu được xa rời chiến đấu, do đó phấn đấu trở thành một nhà văn và viết nên cuốn sách này. Càng yêu cuốn sách, càng kính trọng nhà văn, càng tôn quí phẩm chất của con người cách mạng. Hãy đọc Thép đã tôi thế đấy để biết từng có một thời người ta sống: “Cái quý nhất của con người ta là sự sống. Đời người chỉ sống có một lần. Phải sống sao cho khỏi xót xa, ân hận vì những năm tháng đã sống hoài, sống phí, cho khỏi hổ thẹn vì dĩ vãng ti tiện và hèn đớn của mình, để khi nhắm mắt xuôi tay có thể nói rằng: tất cả đời ta, tất cả sức ta, ta đã hiến dâng cho sự nghiệp cao đẹp nhất trên đời, sự nghiệp đấu tranh giải phóng loài người…” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nikolai AOstrovsky'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nikolai AOstrovsky'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Phụ Nữ Việt Nam'],
            'isbn'           => '8935325000379',
            'title'          => 'Thương',
            'slug'           => 'thuong',
            'image'          => '/images/vanhoc/thuong/1.jpg',
            'price'          => 75000.0,
            'discount_price' => 60000.0,
            'stock_quantity' => 50,
            'page_count'     => '168',
            'publish_year'   => '2021',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '17 x 10 cm x 0.9',
            'weight'         => '200',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '"Em nói em từ bỏ Sao em lại đau lòng? Em nói em từ bỏ Sao em còn trông mong?" Được viết bởi các tác giả đến từ Group Thìa Đầy Thơ - nơi hội tụ thế hệ trẻ yêu thơ và làm thơ, "Thương" là một tập thơ rất tình, ngẫu hứng, và đầy sáng tạo. Ở “Thương ” không có bóng dáng của một nhân vật nhất định, nhưng mang lại cho người đọc đầy đủ tất cả cảm xúc về tình yêu, tuổi trẻ và cuộc đời. Thực sự không khó để tìm được sự đồng điệu tâm hồn với những dòng thơ ấy. Sự đồng cảm trong giai điệu mà “Thương” phủ lên đôi môi của độc giả có chút nhẹ nhàng, bâng quơ, gần gũi, dễ đọc, dễ  đánh thức sự lãng mạn cùng những tâm tư chưa từng tỏ bày cùng ai. Đó là thứ thơ phóng khoáng, trẻ trung đầy sức sống, đôi khi da diết, đôi khi lửng lơ, phảng phất đủ loại thăng trầm được biểu đạt theo một cách hết sức dễ chịu. Bạn hẳn sẽ thấy chính mình trong đó. Đó là những ấm áp len lỏi của tình cảm gia đình, là ngọt ngào hạnh phúc của tình yêu, là những phút giây chậm lại để sống. Là nhớ thương chờ đợi, là giận hờn vu vơ, là lo sợ được mất và cả những tổn thương, những lần tự chữa lành. Màu sắc đặc biệt trong “Thương” nằm ở sự thành thật nhưng mang đậm chất mơ mộng rất đặc trưng của thơ. Những góc nhìn về cuộc sống, về quan hệ bạn bè, với xã hội và vẻ đẹp tình yêu đều được phơi bày hết sự giản đơn, đời thường: “Ba giờ mẹ vẫn dậy Mặc giá rét mùa đông Vì tình mẹ ấm áp Còn hơn bếp lửa hồng.” Không gò bó về phương thức diễn đạt, đa dạng về thể loại, chất lượng về nội dung, cùng sự linh hoạt trẻ trung, nhưng cũng rất lắng đọng và nghệ thuật, “Thương” chắc chắn sẽ đem lại cho bạn những rung cảm đẹp đẽ và nhiều bất ngờ vể một thế hệ trẻ làm thơ . Một thế hệ vẫn luôn tìm cách giữ gìn và phát huy sự diệu kỳ của tiếng Việt. Dù là đọc để thưởng thức, hay đọc để tìm sự ủi an. Gấp lại “Thương”,  mong rằng những “thương đau” nếu có trong lòng bạn cũng tới ngày được xoa dịu và hơn cả là để “thương yêu”, thêm một lần nữa đầy trong tim! Đây sẽ món quà vỗ về trái tim bạn sau những giông bão cuộc đời, đưa bạn trở về những ngày tháng niên thiếu tươi đẹp. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nhiều Tác Giả'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nhiều Tác Giả'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/thuong/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Hội Nhà Văn'],
            'isbn'           => '8935235247840',
            'title'          => 'Bộ Thương Nhớ Mười Hai (Tái Bản 2026)',
            'slug'           => 'bo-thuong-nho-muoi-hai-tai-ban-2026',
            'image'          => '/images/vanhoc/bo-thuong-nho-muoi-hai-tai-ban-2026/1.jpg',
            'price'          => 168000.0,
            'discount_price' => 135000.0,
            'stock_quantity' => 50,
            'page_count'     => '344',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14.5 x 1.7 cm',
            'weight'         => '500',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Thương Nhớ Mười Hai “Nhớ lại có những đêm tháng mười ở Hà Nội, vợ chồng còn sống cạnh nhau, cứ vào khoảng này thì mặc áo ấm dắt nhau đi trên đường khuya tìm cao lâu quen ăn với nhau một bát tam xà đại hội có lá chanh và miến rán giòn tan, người chồng lạc phách đêm nay nhớ vợ cũng đóng cửa lại đi tìm một nhà hàng nào bán thịt rắn để nhấm nháp một mình và tưởng tượng như hãy còn ngồi ăn với người vợ thương yêu ngày trước, nhưng sao đi tìm mãi, đi tìm hoài không thấy […] Người chồng dừng lại, sợ chính bóng mình. Nước mắt anh lại ứa ra, và chảy dài theo lối đi lấp loáng một bông sao rụng.” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Vũ Bằng'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Vũ Bằng'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974188841',
            'title'          => 'Bộ Tôi Là Bêtô (Tái Bản 2023)',
            'slug'           => 'bo-toi-la-beto-tai-ban-2023',
            'image'          => '/images/vanhoc/bo-toi-la-beto-tai-ban-2023/1.jpg',
            'price'          => 95000.0,
            'discount_price' => 81000.0,
            'stock_quantity' => 50,
            'page_count'     => '230',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1.1 cm',
            'weight'         => '250',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Tôi Là Bêtô Truyện Tôi là Bêtô là sáng tác mới nhất của nhà văn Nguyễn Nhật Ánh được viết theo phong cách hoàn toàn khác so với những tác phẩm trước đây của ông. Những mẩu chuyện, hay những phát hiện của chú chó Bêtô đầy thú vị, vừa hài hước, vừa chiêm nghiệm một cách nhẹ nhàng “vô vàn những điều thú vị mà cuộc sống cố tình giấu kín ở ngóc ngách nào đó trong tâm hồn của mỗi chúng ta”. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-toi-la-beto-tai-ban-2023/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-toi-la-beto-tai-ban-2023/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-toi-la-beto-tai-ban-2023/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-toi-la-beto-tai-ban-2023/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Dân Trí'],
            'isbn'           => '8935325015984',
            'title'          => 'Bộ Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark',
            'slug'           => 'bo-tron-len-mai-nha-de-khoc-tang-kem-bookmark',
            'image'          => '/images/vanhoc/bo-tron-len-mai-nha-de-khoc-tang-kem-bookmark/1.jpg',
            'price'          => 95000.0,
            'discount_price' => 76000.0,
            'stock_quantity' => 50,
            'page_count'     => '208',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 12 x 1 cm',
            'weight'         => '220',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'TRỐN LÊN MÁI NHÀ ĐỂ KHÓC - NƠI CẢM XÚC ĐƯỢC BUÔNG LỎNG, KÝ ỨC ĐƯỢC CẤT LỜI "Có những ngày chẳng ai hiểu mình, chẳng ai cần mình, chẳng ai thương mình. Và những ngày đó, mái nhà là nơi duy nhất tôi thấy an toàn." "Trốn Lên Mái Nhà Để Khóc" không chỉ là câu chuyện của riêng tác giả, mà còn là những mảnh ghép ký ức của mỗi người. Một cuốn sách dành cho những trái tim nhạy cảm, cho những ai từng giấu nước mắt sau nụ cười, từng thu mình vào một góc chỉ để đối diện với chính mình. VỀ TÁC GIẢ: Lam Tác giả trẻ, nổi bật với lối viết tinh tế, giàu cảm xúc. Chuyên viết về tuổi thơ, ký ức, nỗi buồn và hành trình trưởng thành. Ngôn từ nhẹ nhàng nhưng chạm sâu vào tâm hồn độc giả. "Trốn Lên Mái Nhà Để Khóc" là nơi để những tâm hồn lạc lõng tìm thấy sự đồng điệu. Tóm tắt nội dung sách Mái nhà – nơi cao nhất trong căn nhà nhưng lại là nơi sâu nhất trong tâm hồn một đứa trẻ. Ở đó, Lam đã lắng nghe nhịp thở của quá khứ, nơi có giọng nói của mẹ, bàn tay của bà, những ký ức đẹp đẽ xen lẫn những nỗi đau khó gọi tên. "Lớn lên, tôi nhận ra mái nhà không phải nơi trú ẩn, mà là nơi để chuẩn bị cho những hành trình tiếp theo. Nhưng đôi khi, tôi vẫn muốn trốn lên đó, để được khóc mà không ai nhìn thấy." Cuốn sách là những dòng tâm sự chân thật, một hành trình quay về thời thơ ấu để tìm kiếm chính mình. Cuốn sách này mang đến cho bạn điều gì? Sự đồng cảm sâu sắc – Nếu bạn từng cảm thấy cô đơn, lạc lõng giữa thế giới này, hãy để những trang sách an ủi tâm hồn bạn. Lời thì thầm từ quá khứ – Những ký ức tưởng chừng bị lãng quên, nhưng lại là sợi dây giữ ta không lạc mất chính mình. Góc nhìn mới về gia đình & tình thân – Để bạn hiểu rằng, đôi khi ta phải rời đi để biết mình thuộc về đâu. Tại sao bạn nên đọc "Trốn Lên Mái Nhà Để Khóc"? Ai cũng cần một nơi để trốn, để khóc, để rồi đủ mạnh mẽ bước tiếp. Có những nỗi buồn không cần giải thích, chỉ cần một cuốn sách để cảm thấy không cô đơn. Trên hành trình trưởng thành, chúng ta đều cần một mái nhà trong tim để quay về. "Trốn Lên Mái Nhà Để Khóc" – Cuốn sách dành cho những người đã từng lạc lõng, từng đau, từng khóc… nhưng vẫn kiên cường bước tiếp… Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Lam'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Lam'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tron-len-mai-nha-de-khoc-tang-kem-bookmark/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tron-len-mai-nha-de-khoc-tang-kem-bookmark/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tron-len-mai-nha-de-khoc-tang-kem-bookmark/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tron-len-mai-nha-de-khoc-tang-kem-bookmark/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8936203366297',
            'title'          => 'Truyện Kiều - Ấn Bản Giới Hạn - Bìa Vải - Phiên Bản Độc Quyền 50 Năm Fahasa - Tặng Kèm Postcard',
            'slug'           => 'truyen-kieu-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard',
            'image'          => '/images/vanhoc/truyen-kieu-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard/1.jpg',
            'price'          => 2200000.0,
            'discount_price' => null,
            'stock_quantity' => 50,
            'page_count'     => '208',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '30 x 25 x 2.2 cm',
            'weight'         => '2000',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Truyện Kiều Truyện Kiều là một kiệt tác văn chương của nước ta, với tinh thần cốt tử là niềm bi cảm về thân phận con người trong buổi loạn ly. Nỗi niềm đó, như nhà nghiên cứu Nhật Chiêu nhận xét, gói gọn cái tinh túy trong sự “trông thấu” (sáu cõi) và “nghĩ suốt” (ngàn đời). Không chỉ là minh chứng cho tài hoa của văn chương quốc âm thế kỷ XVIII, Truyện Kiều còn là đúc kết của nhân sinh quan dân tộc với tư tưởng Phật giáo, Khổng giáo của giới trí thức, dùng đạo lý hiếu nghĩa làm nền, lấy giáo pháp duyên khởi làm móng. Câu nói của học giả Phạm Quỳnh ( “Truyện Kiều còn, tiếng ta còn...” ), theo lẽ đó, có lẽ cũng không quá thậm xưng. Thế nhưng, đối với người đọc phổ thông thời hiện đại, Truyện Kiều của Nguyễn Du không phải dễ đọc, không chỉ bởi những từ Nôm cổ, những từ Hán-Việt khó, mà còn vì hệ thống điển tích, điển cố dày đặc, vốn là đặc trưng của văn học Hán-Nôm trung đại. Công trình khảo đính và chú thích Truyện Kiều của nhà nghiên cứu Hán-Nôm Nguyễn Thạch Giang là một công trình đặc biệt đề cao tính hệ thống và khoa học trong việc xử lý văn bản, cũng như tính chính xác, đầy đủ (mà không quá sa đà) trong việc chú giải. Đây là công trình được coi như “khuôn mẫu về xử lý văn bản tác phẩm văn Nôm”. Trong bản in lần này, những người làm sách đã mời họa sĩ Đặng Xuân Hòa minh họa cho ấn phẩm. Trước đây, Truyện Kiều đã nhiều lần được minh họa dưới ngọn bút tài hoa của nhiều họa sĩ, mỗi thời kỳ lại mang một dấu ấn khác nhau, góp phần tạo nên hình dung về đường nét, chân dung của những nhân vật trong Truyện Kiều trong tâm khảm người đọc. Còn lần này, với 16 minh họa mới của họa sĩ Đặng Xuân Hòa, chúng tôi mong muốn mở ra cho độc giả cái nhìn và cảm xúc mới về những chi tiết, những nhân vật tưởng chừng như quen thuộc. Giới thiệu tác giả: NGUYỄN DU (1765 – 1820) Ông có tự là Tố Như, hiệu là Thanh Hiên. Cha ông là Xuân Quận công Nguyễn Nghiễm, làm tới chức Tham tụng trong phủ chúa Trịnh, quê gốc ở làng Tiên Điền, Nghi Xuân, Hà Tĩnh. Ông trải qua thời niên thiếu ở kinh thành Thăng Long hoa lệ. Nguyễn Du bước vào đời trong buổi đất nước gặp thời biến động: nhà Lê sụp, Nguyễn và Tây Sơn giao tranh, quân Thanh ngấp nghé ngoài bờ cõi. Dòng họ của ông suy sút, ông thì trải qua mười năm gió bụi . Khi Nguyễn Ánh diệt Tây Sơn, ông ra làm quan cho nhà Nguyễn, sau được cử đi sứ nhà Thanh năm 48 tuổi (1813). Nhiều nhà phân tích văn học cho rằng Truyện Kiều chính là tiếng lòng của Nguyễn Du khóc than cho mối cô trung của mình với nhà Lê, cho thân phận bất đắc chí, nỗi đau nhân tình thế thái giữa buổi loạn ly. NGUYỄN THẠCH GIANG (1928 – 2017) Phó giáo sư Nguyễn Thạch Giang là một trong những nhà nghiên cứu chuyên sâu về văn chương Hán-Nôm cổ hàng đầu của Việt Nam. Trong suốt hơn 50 năm nghiên cứu, ông đã xuất bản hơn 70 đầu sách, trong đó có nhiều đầu sách có giá trị cao về mặt khoa học. Vào năm 2012, ông được trao giải thưởng Phan Châu Trinh về Nghiên cứu vì những đóng góp xuất sắc của ông trong lĩnh vực văn học Hán-Nôm của Việt Nam. Nếu công trình khảo đính Truyện Kiề',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Du'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Du'],
            ]);
        }
        if (isset($authors['Nguyễn Thạch Giang'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Thạch Giang'],
            ]);
        }
        if (isset($authors['Đặng Xuân Hòa'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Đặng Xuân Hòa'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truyen-kieu-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truyen-kieu-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truyen-kieu-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/truyen-kieu-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Tổng Hợp Thành Phố Hồ Chí Minh'],
            'isbn'           => '9786044834108',
            'title'          => 'Bộ Vượt Côn Đảo (Tái Bản 2025)',
            'slug'           => 'bo-vuot-con-dao-tai-ban-2025',
            'image'          => '/images/vanhoc/bo-vuot-con-dao-tai-ban-2025/1.jpg',
            'price'          => 99000.0,
            'discount_price' => 80000.0,
            'stock_quantity' => 50,
            'page_count'     => '228',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 15 x 1.1 cm',
            'weight'         => '240',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Vượt Côn Đảo Nhà văn Vũ Tú Nam trong bài Nhớ Phùng Quán, thay lời giới thiệu tập hồi ký Tôi đã trở thành nhà văn như thế nào của Phùng Quán, đã viết: “Nhớ đến Phùng Quán, là nhớ đến bản thảo Vượt Côn Đảo đã gây ấn tượng tốt cho tôi, nhớ đến người bạn trẻ hai mươi tuổi...”. Vượt Côn Đảo là tác phẩm đầu tay của nhà văn Phùng Quán, đánh dấu bước ngoặt trong cuộc đời cầm bút của ông, xuất bản lần đầu năm 1954 và đã được nhiều người đọc hoan nghênh, đón nhận. Ngay sau đó Vượt Côn Đảo đã nhận giải thưởng của Hội Văn nghệ Việt Nam (1954-1955). Sau hơn nửa thế kỷ, kể từ lần in đầu tiên đến nay, sách đã được tái bản nhiều lần và vẫn được bạn đọc nhiều thế hệ tìm đọc. Năm 2007, cùng với hai tác phẩm Tiếng hát trên địa ngục Côn Đảo và Tuổi thơ dữ dội, Vượt Côn Đảo đã được trao giải thưởng Nhà nước về Văn học Nghệ thuật. Người lính trẻ hai mươi tuổi - Phùng Quán lúc đó, khi bắt tay vào viết Vượt Côn Đảo chưa một lần đặt chân đến chốn “địa ngục trần gian” ấy. Sau Hiệp định Genève 1954, đất nước tạm chia làm hai miền chờ ngày thống nhất. Được có mặt trong cuộc trao đổi tù binh ở Sầm Sơn, Phùng Quán gặp gỡ những người tù cách mạng trở về từ Côn Đảo. Chính những câu chuyện của họ về những con người bất khuất và ý chí quật cường với hai lần vượt ngục thất bại là nguồn cảm hứng để Phùng Quán viết nên bản anh hùng ca Vượt Côn Đảo. Ý chí sắt đá, lòng quả cảm và nghị lực của những chiến sĩ cách mạng qua ngòi bút tài hoa, bi tráng của Phùng Quán đã tái hiện lại bức tranh ác liệt của cuộc sống tù nhân bị đọa đày dưới sự cai trị của thực dân Pháp, đồng thời khắc họa chân dung những con người bình thường mà lớn lao, dù thân trong ngục tối nhưng tâm trí vẫn sáng ngời lý tưởng cách mạng. Đọc Vượt Côn Đảo, thế hệ trẻ hôm nay không chỉ yêu mến, trân trọng hơn những con người phi thường đã hy sinh tuổi xuân và xương máu cho hòa bình của đất nước mà còn được tiếp thêm nghị lực vượt qua bản thân, vượt qua hoàn cảnh, kiên định với mục tiêu để đi đến thắng lợi và thành công, như lời nhắn gởi của Phùng Quán: “Người chiến sĩ khi đã quyết định dấn thân thì phải dấn thân đến cùng, không quay đầu lại, không rẽ ngang rẽ tắt, không được thối lui, không được bỏ cuộc. Không có sự hèn hạ nào đáng ghê tởm hơn sự hèn hạ bỏ cuộc” Trích đoạn: "Tất cả tù Côn Đảo đều gọi Côn Đảo là địa ngục, một thứ địa ngục trần gian. Nghe người ta nói ở địa ngục, trên có Diêm Vương hung ác, dưới có bọn quỷ sứ đầu trâu mặt ngựa. Để hành hạ người chết, có vạc dầu nấu sôi, sông lúc nhúc mãng xà rắn rết, có chỗ cưa chân xẻ tay, róc thịt chẻ xương. Không biết có địa ngục và địa ngục có những cảnh đó không, nhưng ở Côn Đảo, những cảnh đó không thiếu gì, và còn gấp trăm gấp nghìn thế là khác." Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Phùng Quán'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Phùng Quán'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-vuot-con-dao-tai-ban-2025/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042399357',
            'title'          => 'Bộ Arya Bàn Bên Thỉnh Thoảng Lại Trêu Ghẹo Tôi Bằng Tiếng Nga - Tập 9 - Bản Boxset - Tặng Kèm Boxset + Sổ Tay + Lenticular Card',
            'slug'           => 'bo-arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-9-ban-boxset-tang-kem-boxset-so-tay-lenticular-card',
            'image'          => '/images/vanhoc/bo-arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-9-ban-boxset-tang-kem-boxset-so-tay-lenticular-card/1.jpg',
            'price'          => 135000.0,
            'discount_price' => 115000.0,
            'stock_quantity' => 50,
            'page_count'     => '364',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 1.8 cm',
            'weight'         => '520',
            'cover_type'     => 'Bộ Hộp',
            'description'    => 'Arya Bàn Bên Thỉnh Thoảng Lại Trêu Ghẹo Tôi Bằng Tiếng Nga - Tập 9 “И наменятоже обрати внимание” “Yuki là… em gái ruột của tôi.” Lời thú nhận đầy bất ngờ của Masachika vang lên giữa công viên trong đêm. Không thể tiếp tục đứng nhìn cậu tự phủ nhận bản thân và nói rằng mình đã sống bằng cách hi sinh em gái, Alisa đã nắm lấy tay Masachika, cùng cậu đến gặp Yuki đang bệnh. Được Alisa tiếp thêm dũng khí, Masachika cuối cùng cũng đối mặt với mẹ, và với cả ông ngoại. Dù còn nhiều băn khoăn, cậu vẫn quyết tâm bước tiếp về phía trước. Trong khi đó, Alisa khi đã biết hết hoàn cảnh của Masachika cũng bắt đầu chất chứa băn khoăn trong lòng… Và khi cả hai cuối cùng đã đưa ra quyết định của mình, Alisa “lần đầu tiên” đối thoại với Suou Yuki. “Ồ, chào Arya. Cậu đến thăm mình à.” Tình thương, sự quyết tâm, và cả tình yêu. Khi tất cả các cảm xúc đó đan xen, ba con người ấy rồi sẽ đi đến đâu? Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Sunsunsun'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Sunsunsun'],
            ]);
        }
        if (isset($authors['Momoco'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Momoco'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-9-ban-boxset-tang-kem-boxset-so-tay-lenticular-card/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-9-ban-boxset-tang-kem-boxset-so-tay-lenticular-card/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-9-ban-boxset-tang-kem-boxset-so-tay-lenticular-card/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '9786042399340',
            'title'          => 'Bộ Arya Bàn Bên Thỉnh Thoảng Lại Trêu Ghẹo Tôi Bằng Tiếng Nga - Tập 9 - Tặng Kèm Bookmark Bế Hình + Bìa Áo Bonus',
            'slug'           => 'bo-arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-9-tang-kem-bookmark-be-hinh-bia-ao-bonus',
            'image'          => '/images/vanhoc/bo-arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-9-tang-kem-bookmark-be-hinh-bia-ao-bonus/1.jpg',
            'price'          => 95000.0,
            'discount_price' => 81000.0,
            'stock_quantity' => 50,
            'page_count'     => '364',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 1.8 cm',
            'weight'         => '360',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Arya Bàn Bên Thỉnh Thoảng Lại Trêu Ghẹo Tôi Bằng Tiếng Nga - Tập 9 “И наменятоже обрати внимание” “Yuki là… em gái ruột của tôi.” Lời thú nhận đầy bất ngờ của Masachika vang lên giữa công viên trong đêm. Không thể tiếp tục đứng nhìn cậu tự phủ nhận bản thân và nói rằng mình đã sống bằng cách hi sinh em gái, Alisa đã nắm lấy tay Masachika, cùng cậu đến gặp Yuki đang bệnh. Được Alisa tiếp thêm dũng khí, Masachika cuối cùng cũng đối mặt với mẹ, và với cả ông ngoại. Dù còn nhiều băn khoăn, cậu vẫn quyết tâm bước tiếp về phía trước. Trong khi đó, Alisa khi đã biết hết hoàn cảnh của Masachika cũng bắt đầu chất chứa băn khoăn trong lòng… Và khi cả hai cuối cùng đã đưa ra quyết định của mình, Alisa “lần đầu tiên” đối thoại với Suou Yuki. “Ồ, chào Arya. Cậu đến thăm mình à.” Tình thương, sự quyết tâm, và cả tình yêu. Khi tất cả các cảm xúc đó đan xen, ba con người ấy rồi sẽ đi đến đâu? Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Sunsunsun'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Sunsunsun'],
            ]);
        }
        if (isset($authors['Momoco'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Momoco'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-9-tang-kem-bookmark-be-hinh-bia-ao-bonus/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-9-tang-kem-bookmark-be-hinh-bia-ao-bonus/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-arya-ban-ben-thinh-thoang-lai-treu-gheo-toi-bang-tieng-nga-tap-9-tang-kem-bookmark-be-hinh-bia-ao-bonus/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935095634453',
            'title'          => 'Bá Tước Monte Cristo - Bìa Cứng (Tái Bản 2025)',
            'slug'           => 'ba-tuoc-monte-cristo-bia-cung-tai-ban-2025',
            'image'          => '/images/vanhoc/ba-tuoc-monte-cristo-bia-cung-tai-ban-2025/1.jpg',
            'price'          => 235000.0,
            'discount_price' => 188000.0,
            'stock_quantity' => 50,
            'page_count'     => '656',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 13.5 x 3.4 cm',
            'weight'         => '800',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Bá Tước Monte Cristo Lấy bối cảnh nước Pháp thời Napoleon, cuốn sách xoay quanh các chủ đề về công lý, sự trả thù, tình yêu và sự tha thứ. Vào những ngày tươi đẹp nhất của chàng thanh niên Edmond Dantès khi anh chuẩn bị cưới Mercédès xinh đẹp và sắp được thăng chức làm thuyền trưởng, thì anh bị những người bạn ghen ghét vu khống và cam chịu giam giữ trong hầm ngục suốt 14 năm. Sau khi vượt ngục, nhờ kho báu bí mật của người bạn tù là nhà bác học - linh mục Faria, Dantès đổi tên thành bá tước Monte Cristo, thâm nhập vào cuộc sống của kẻ thù và bắt đầu kế hoạch trả thù của mình. Những mưu đồ, thủ đoạn khó đoán, những cuộc xung đột lên đến đỉnh điểm, những bí mật không thể giải đáp, tất cả đã tạo nên một tác phẩm bất ngờ, ly kỳ và đầy hấp dẫn. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Alexandre Dumas'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Alexandre Dumas'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ba-tuoc-monte-cristo-bia-cung-tai-ban-2025/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/ba-tuoc-monte-cristo-bia-cung-tai-ban-2025/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Trẻ'],
            'isbn'           => '8934974178521',
            'title'          => 'Bộ Bàn Có Năm Chỗ Ngồi (Tái Bản 2022)',
            'slug'           => 'bo-ban-co-nam-cho-ngoi-tai-ban-2022',
            'image'          => '/images/vanhoc/bo-ban-co-nam-cho-ngoi-tai-ban-2022/1.jpg',
            'price'          => 38000.0,
            'discount_price' => 33000.0,
            'stock_quantity' => 50,
            'page_count'     => '188',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '14.5 x 10 x 0.5 cm',
            'weight'         => '200',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Bàn Có Năm Chỗ Ngồi Câu chuyện xoay quanh tình bạn của năm đứa trẻ ngồi cùng bàn trong lớp 8A2: Huy, Bảy, Hiền, Quang, Đại, năm con người với năm tính cách, hoàn cảnh khác nhau cùng nhiều trò nghịch ngợm, những mâu thuẫn trẻ con trong lứa tuổi cắp sách tới trường. Mộc mạc, chân chất, vô tư, trong sáng… mỗi nhân vật là một tính cách sống động của lứa tuổi học trò mà ai cũng có thể bắt gặp trong ký ức của mình. Nhân vật chính là cậu bé tên Huy: ham chơi, nghịch ngợm, hay lý sự cùn và thích trở thành người lớn, Huy yêu môn Văn nhưng “oán” môn Toán. Nhờ sự giúp đỡ của các bạn, Huy dần nhận ra những khuyết điểm của mình và sửa đổi để “người lớn” hơn, có trách nhiệm hơn. Điều quan trọng nhất là cậu đã cảm nhận được giá trị của tình bạn, kể cả những người cậu đã từng coi là “phe xấu”. Câu chuyện cũng hé lộ tình cảm Huy dành cho “nhỏ Hiền”- cô bé duy nhất trong tổ, những cảm xúc đầu đời hồn nhiên và trong sáng, dễ thương. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974189145',
            'title'          => 'Bộ Beartown 2 - Chúng Tôi Đấu Với Các Bạn',
            'slug'           => 'bo-beartown-2-chung-toi-dau-voi-cac-ban',
            'image'          => '/images/vanhoc/bo-beartown-2-chung-toi-dau-voi-cac-ban/1.jpg',
            'price'          => 225000.0,
            'discount_price' => 192000.0,
            'stock_quantity' => 50,
            'page_count'     => '680',
            'publish_year'   => '2023',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 13 x 3.4 cm',
            'weight'         => '700',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Beartown 2 - Chúng Tôi Đấu Với Các Bạn Từ tác giả cuốn sách bán chạy toàn cầu “Người đàn ông mang tên Ove” Phần tiếp theo của cuốn sách bán chạy “Beartown” Bạn từng chứng kiến một thị trấn sụp đổ? Thị trấn của chúng tôi đã từng. Bạn từng chứng kiến một thị trấn mọc lên? Thị trấn của chúng tôi cũng đã từng. Là một cộng đồng nhỏ ẩn sâu trong rừng, Beartown là nơi sinh sống của những người cứng cỏi, chăm chỉ, những người không mong chờ cuộc sống phải dễ dàng hay công bằng. Dù cuộc sống có những lúc vô cùng khó khăn, họ luôn có thể tự hào về đội khúc côn cầu trên băng của địa phương mình. Vì thế việc đội khúc côn cầu trên băng của Beartown có thể sớm bị giải thể là một tin tàn nhẫn với họ. Và điều tồi tệ hơn là đội đối thủ ở thị trấn Hed lân cận lại tỏ ra vô cùng hài lòng với tin này. Khi căng thẳng leo thang giữa hai bên, một người mới đến đã mang đến cho Beartown một huấn luyện viên mới bất ngờ và một cơ hội để trở lại. Trận đấu lớn sắp đến gần, những trò chơi khăm và những sự-cố-không-hề-là-sự-cố giữa hai cộng đồng ngày càng xuất hiện nhiều, sự căm ghét của họ ngày càng tăng. Khi bàn thắng cuối cùng được ghi, một cư dân của Beartown sẽ chết, người dân của hai thị trấn sẽ buộc phải tự hỏi liệu sau mọi chuyện, trò chơi họ yêu thích có thể trở lại là một thứ đơn giản chỉ cần một sân băng, hai cái lưới và hai đội chơi. Chỉ là chúng tôi đấu với các bạn. Sâu sắc và giàu lòng trắc ẩn, Fredrik Backman – “Dickens của thời đại chúng ta” (Green Valley News) – đã thể hiện cách mà lòng trung thành, tình bạn và sự tử tế có thể đưa một thị trấn vượt qua những ngày thử thách nhất Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Fredrik Backman'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Fredrik Backman'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-beartown-2-chung-toi-dau-voi-cac-ban/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-beartown-2-chung-toi-dau-voi-cac-ban/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8936203366150',
            'title'          => 'Bố Già - Ấn Bản Giới Hạn - Bìa Vải - Phiên Bản Độc Quyền 50 Năm Fahasa - Tặng Kèm Postcard',
            'slug'           => 'bo-gia-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard',
            'image'          => '/images/vanhoc/bo-gia-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard/1.jpg',
            'price'          => 2400000.0,
            'discount_price' => null,
            'stock_quantity' => 50,
            'page_count'     => '320',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '30 x 25 x 3.4 cm',
            'weight'         => '2000',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Bố Già Thế giới ngầm được phản ánh trong tiểu thuyết Bố Già là sự gặp gỡ giữa một bên là ý chí cương cường và nền tảng gia tộc chặt chẽ theo truyền thống mafia xứ Sicily với một bên là xã hội Mỹ nhập nhằng đen trắng, mảnh đất màu mỡ cho những cơ hội làm ăn bất chính hứa hẹn những món lợi kếch xù. Trong thế giới ấy, hình tượng Bố Già được tác giả dày công khắc họa đã trở thành bức chân dung bất hủ trong lòng người đọc. Từ một kẻ nhập cư tay trắng đến ông trùm tột đỉnh quyền uy, Don Vito Corleone là con rắn hổ mang thâm trầm, nguy hiểm khiến kẻ thù phải kiềng nể, e dè, nhưng cũng được bạn bè, thân quyến xem như một đấng toàn năng đầy nghĩa khí. Nhân vật trung tâm ấy đồng thời cũng là hiện thân của một pho triết lí rất “đời” được nhào nặn từ vốn sống của hàng chục năm lăn lộn giữa chốn giang hồ bao phen vào sinh ra tử, vì thế mà có ý kiến cho rằng “ Bố Già là sự tổng hòa của mọi hiểu biết. Bố Già là đáp án cho mọi câu hỏi”. Với cấu tứ hoàn hảo, cốt truyện không thiếu những pha hành động gay cấn, tình tiết bất ngờ và không khí kình địch đến nghẹt thở, Bố Già xứng đáng là đỉnh cao trong sự nghiệp văn chương của Mario Puzo. Và như một cơ duyên đặc biệt, ngay từ năm 1971-1972, Bố Già đã đến với bạn đọc trong nước qua phong cách chuyển ngữ hào sảng, đậm chất giang hồ của dịch giả Ngọc Thứ Lang. Giới thiệu tác giả: Mario Puzo (1920 - 1999) là nhà văn, nhà biên kịch người Mỹ gốc Italy nổi tiếng với nhiều tiểu thuyết về đề tài mafia và tội phạm. Bố Già (The Godfather) xuất bản năm 1969 là đỉnh cao của dòng văn chương hư cấu này, đồng thời là tác phẩm đưa Puzo lên tột đỉnh vinh quang. Đây cũng là một trong những tiểu thuyết bán chạy nhất mọi thời đại. Ngoài Bố Già , Mario Puzo còn nổi tiếng với các tiểu thuyết khác như Đất máu Sicily, Luật im lặng, Ông trùm cuối cùng, Cha con Giáo hoàng… Giới thiệu dịch giả: Ngọc Thứ Lang tên thật là Nguyễn Ngọc Tú, biệt danh là công tử Bắc Kỳ, vào Sài Gòn lập nghiệp khoảng năm 1950. Ngọc Thứ Lang là dịch giả của thời kì trước năm 1975, đã chuyển ngữ nhiều tác phẩm nhưng có lẽ Bố Già già là một dấu son trong sự nghiệp của ông. Năm 1972, bản dịch Bố Già của Ngọc Thứ Lang chuyển ngữ từ nguyên bản tiếng Anh ra mắt và đã thu hút được sự chú ý của rất nhiều độc giả. Nếu như The Godfather của Mario Puzo khi vừa xuất bản đã nằm trong danh sách sách bán chạy nhất suốt 67 tuần thì Bố Già của Ngọc Thứ Lang cũng “làm mưa làm gió” trên thị trường văn học dịch của Sài Gòn những năm 70 của thế kỉ trước. Cái hay, cái khiến người đọc say mê Bố Già có lẽ nằm ở chính giọng văn đậm chất giang hồ súng đạn của người dịch. Và bản thân cái tên Bố Già cũng là một sáng tạo vô tiền khoáng hậu của Ngọc Thứ Lang. Nhiều độc giả Việt Nam nói rằng nếu đọc The Godfather của Mario Puzo, hãy tìm đúng bản dịch của Ngọc Thứ Lang để thấy chất đàn ông trong đó… Nhận xét về tác phẩm: “ Bố Già là sự tổng hòa của mọi hiểu biết. Bố Già là đáp án cho mọi câu hỏi.” - Diễn viên Tom Hanks “Bạn không thể dừng đọc nó và khó lòng ngừng mơ về nó.” - New York Times Magazine ',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Mario Puzo'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Mario Puzo'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-gia-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-gia-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-gia-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-gia-an-ban-gioi-han-bia-vai-phien-ban-doc-quyen-50-nam-fahasa-tang-kem-postcard/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8936203360608',
            'title'          => 'Bộ Bố Già - Bìa Cứng',
            'slug'           => 'bo-bo-gia-bia-cung',
            'image'          => '/images/vanhoc/bo-bo-gia-bia-cung/1.jpg',
            'price'          => 250000.0,
            'discount_price' => 175000.0,
            'stock_quantity' => 50,
            'page_count'     => '536',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 16 x 2.8 cm',
            'weight'         => '890',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Thế giới ngầm được phản ánh trong tiểu thuyết Bố già là sự gặp gỡ giữa một bên là ý chí cương cường và nền tảng gia tộc chặt chẽ theo truyền thống mafia xứ Sicily với một bên là xã hội Mỹ nhập nhằng đen trắng, mảnh đất màu mỡ cho những cơ hội làm ăn bất chính hứa hẹn những món lợi kếch xù. Trong thế giới ấy, hình tượng Bố già được tác giả dày công khắc họa đã trở thành bức chân dung bất hủ trong lòng người đọc. Từ một kẻ nhập cư tay trắng đến ông trùm tột đỉnh quyền uy, Don Vito Corleone là con rắn hổ mang thâm trầm, nguy hiểm khiến kẻ thù phải kiềng nể, e dè, nhưng cũng được bạn bè, thân quyến xem như một đấng toàn năng đầy nghĩa khí. Nhân vật trung tâm ấy đồng thời cũng là hiện thân của một pho triết lí rất “đời” được nhào nặn từ vốn sống của hàng chục năm lăn lộn giữa chốn giang hồ bao phen vào sinh ra tử, vì thế mà có ý kiến cho rằng “ Bố già là sự tổng hòa của mọi hiểu biết. Bố già là đáp án cho mọi câu hỏi”. Với cấu tứ hoàn hảo, cốt truyện không thiếu những pha hành động gay cấn, tình tiết bất ngờ và không khí kình địch đến nghẹt thở, Bố già xứng đáng là đỉnh cao trong sự nghiệp văn chương của Mario Puzo. Và như một cơ duyên đặc biệt, ngay từ năm 1971-1972, Bố già đã đến với bạn đọc trong nước qua phong cách chuyển ngữ hào sảng, đậm chất giang hồ của dịch giả Ngọc Thứ Lang. Giới thiệu tác giả: Mario Puzo (1920 - 1999) là nhà văn, nhà biên kịch người Mỹ gốc Italy nổi tiếng với nhiều tiểu thuyết về đề tài mafia và tội phạm. Bố già (The Godfather) xuất bản năm 1969 là đỉnh cao của dòng văn chương hư cấu này, đồng thời là tác phẩm đưa Puzo lên tột đỉnh vinh quang. Đây cũng là một trong những tiểu thuyết bán chạy nhất mọi thời đại. Ngoài Bố già , Mario Puzo còn nổi tiếng với các tiểu thuyết khác như Sicilian khúc ca bi tráng , Luật im lặng , Ông trùm quyền lực cuối cùng , Gia đình Giáo hoàng … Giới thiệu dịch giả: Ngọc Thứ Lang tên thật là Nguyễn Ngọc Tú, biệt danh là công tử Bắc Kỳ, vào Sài Gòn lập nghiệp khoảng năm 1950. Ngọc Thứ Lang là dịch giả của thời kì trước năm 1975, đã chuyển ngữ nhiều tác phẩm nhưng có lẽ Bố già là một dấu son trong sự nghiệp của ông. Năm 1972, bản dịch Bố già của Ngọc Thứ Lang chuyển ngữ từ nguyên bản tiếng Anh ra mắt và đã thu hút được sự chú ý của rất nhiều độc giả. Nếu như The Godfather của Mario Puzo khi vừa xuất bản đã nằm trong danh sách sách bán chạy nhất suốt 67 tuần thì Bố già của Ngọc Thứ Lang cũng “làm mưa làm gió” trên thị trường văn học dịch của Sài Gòn những năm 70 của thế kỉ trước. Cái hay, cái khiến người đọc say mê Bố già có lẽ nằm ở chính giọng văn đậm chất giang hồ súng đạn của người dịch. Và bản thân cái tên Bố già cũng là một sáng tạo vô tiền khoáng hậu của Ngọc Thứ Lang. Nhiều độc giả Việt Nam nói rằng nếu đọc The Godfather của Mario Puzo, hãy tìm đúng bản dịch của Ngọc Thứ Lang để thấy chất đàn ông trong đó… Nhận xét về tác phẩm: “Bố già là sự tổng hòa của mọi hiểu biết. Bố già là đáp án cho mọi câu hỏi.” - Diễn viên Tom Hanks “Bạn không thể dừng đọc nó và khó lòng ngừng mơ về nó.” - New York T',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Mario Puzo'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Mario Puzo'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-gia-bia-cung/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-gia-bia-cung/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-gia-bia-cung/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-gia-bia-cung/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935230001485',
            'title'          => 'Bộ Bộ Sách Tây Du Ký (Bộ 3 Tập)',
            'slug'           => 'bo-bo-sach-tay-du-ky-bo-3-tap',
            'image'          => '/images/vanhoc/bo-bo-sach-tay-du-ky-bo-3-tap/1.jpg',
            'price'          => 540000.0,
            'discount_price' => 378000.0,
            'stock_quantity' => 50,
            'page_count'     => '1800',
            'publish_year'   => '2025',
            'language'       => 'Tieng Viet',
            'dimensions'     => '24 x 16 x 9.1 cm',
            'weight'         => '2320',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Bộ Sách Tây Du Ký (Bộ 3 Tập) Bộ 3 cuốn Tây Du Ký phiên bản truyện chữ là bộ sách tuyệt vời cho những ai yêu thích văn học cổ điển và muốn tìm hiểu câu chuyện huyền thoại về hành trình thỉnh kinh của Đường Tăng cùng bốn thầy trò: Tôn Ngộ Không, Trư Bát Giới, Sa Tăng và ngựa Bạch Long. Với văn phong dễ hiểu, cuốn sách mang đến cho người đọc những tình tiết hấp dẫn, những cuộc chiến đấu thần thoại, cùng những bài học về lòng kiên trì, trí tuệ và sự hy sinh. Bộ sách không chỉ giúp người đọc khám phá vẻ đẹp của văn hóa Trung Hoa mà còn truyền tải những giá trị đạo đức sâu sắc qua từng trang sách. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Ngô Thừa Ân'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Ngô Thừa Ân'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-sach-tay-du-ky-bo-3-tap/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-sach-tay-du-ky-bo-3-tap/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-bo-sach-tay-du-ky-bo-3-tap/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Hội Nhà Văn'],
            'isbn'           => '9786049725890',
            'title'          => 'Bức Họa Dorian Gray',
            'slug'           => 'buc-hoa-dorian-gray',
            'image'          => '/images/vanhoc/buc-hoa-dorian-gray/1.jpg',
            'price'          => 120000.0,
            'discount_price' => 84000.0,
            'stock_quantity' => 50,
            'page_count'     => '285',
            'publish_year'   => '2018',
            'language'       => 'Tieng Viet',
            'dimensions'     => '24 x 16 x 1.3 cm',
            'weight'         => '423',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Bức Họa Dorian Gray "Bức họa Dorian Gray" là cuốn tiểu thuyết đầu tay và duy nhất trong sự nghiệp sáng tác của Oscar Wilde. Lấy bối cảnh nước Anh thời Victoria, Oscar Wilde đã kể lại câu chuyện cuộc đời chàng trai trẻ Dorian Gray, trong mối quan hệ với hoạ sĩ Basil Hallward và Huân tước Henry Woton; rồi từ đó mượn câu chuyện bức hoạ Dorian ma quái để gửi gắm triết lý nghệ thuật của riêng mình. Tại đây, ông phô bày các cuộc đối thoại về cái đẹp, sự sáng tạo, phê bình nghệ thuật,về người nghệ sĩ và nhà phê bình. Mỗi nhân vật chính của truyện lại thể hiện một khía cạnh trong con người Oscar Wilde theo thời gian, đúng như ông từng thổ lộ: “Basil Hallward là người mà tôi nghĩ là tôi, Huân tước Henry là người mà thế giới nghĩ về tôi, còn Dorian là người mà tôi muốn trở thành, trong những thời đại khác nhau, có lẽ vậy.” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Oscar Wilde'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Oscar Wilde'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/buc-hoa-dorian-gray/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '8935352628263',
            'title'          => 'Bộ Chung Một Mái Nhà - Tập 5 - Bản Giới Hạn - Tặng Kèm Bookmark + Photostrip + Postcard',
            'slug'           => 'bo-chung-mot-mai-nha-tap-5-ban-gioi-han-tang-kem-bookmark-photostrip-postcard',
            'image'          => '/images/vanhoc/bo-chung-mot-mai-nha-tap-5-ban-gioi-han-tang-kem-bookmark-photostrip-postcard/1.jpg',
            'price'          => 105000.0,
            'discount_price' => 90000.0,
            'stock_quantity' => 50,
            'page_count'     => '332',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 x 1.6 cm',
            'weight'         => '330',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Chung Một Mái Nhà - Tập 5 Ánh đèn Halloween ẩn chứa sức mạnh ma thuật. Một cuộc sống bí mật không ai khác được biết chỉ của hai con người đã bắt đầu. Yuuta và Saki tiếp tục nuôi dưỡng mối quan hệ gần như anh em, cũng gần như người yêu. Một mối quan hệ chẳng thể đặt tên. Cả hai không ép buộc nhau, nhưng cũng không ôm đồm mọi thứ một mình, mà biết cách dựa dẫm vào nhau, và cố gắng trở thành đối tượng lí tưởng của nhau. Buổi hẹn hò đầu tiên, trang phục lạ mắt, sinh nhật của bạn bè, hoạt động tình nguyện, và cả Halloween. Sau khi dành thời gian cho nhau, cùng trải qua muôn vàn sự kiện, hai con người đã từng sống mà không hề trông đợi gì ở người khác giới cũng dần dần có dấu hiệu “thay đổi”. Và rồi, những người xung quanh họ cũng bắt đầu nhận ra sự thay đổi đó…? Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Ghost Mikawa'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Ghost Mikawa'],
            ]);
        }
        if (isset($authors['Hiten'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Hiten'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chung-mot-mai-nha-tap-5-ban-gioi-han-tang-kem-bookmark-photostrip-postcard/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-chung-mot-mai-nha-tap-5-ban-gioi-han-tang-kem-bookmark-photostrip-postcard/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974212423',
            'title'          => 'Bộ Cô Bé Hàng Xóm Và Bốn Viên Kẹo - Bìa Cứng - Tặng Kèm Random 1 Trong 4 Mẫu Bookmark + Sticker + Sổ Vẽ',
            'slug'           => 'bo-co-be-hang-xom-va-bon-vien-keo-bia-cung-tang-kem-random-1-trong-4-mau-bookmark-sticker-so-ve',
            'image'          => '/images/vanhoc/bo-co-be-hang-xom-va-bon-vien-keo-bia-cung-tang-kem-random-1-trong-4-mau-bookmark-sticker-so-ve/1.jpg',
            'price'          => 200000.0,
            'discount_price' => 160000.0,
            'stock_quantity' => 50,
            'page_count'     => '240',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1.4 cm',
            'weight'         => '360',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Cô Bé Hàng Xóm Và Bốn Viên Kẹo “Cô bé hàng xóm và bốn viên kẹo” là những trang viết trong trẻo về tuổi thơ, tình bạn, tình thân, và lòng tốt giản dị. Có hai điểm đặc biệt trong tác phẩm này, thứ nhất là nhà văn Nguyễn Nhật Ánh chọn một bối cảnh khác cho câu chuyện, thay vì vùng thôn quê miền Trung thường xuất hiện trong các tác phẩm của ông; và điều đặc biệt thứ hai là một vài nhân vật trong một tác phẩm đã ra mắt trước đó sẽ lại xuất hiện, tạo nên sự kết nối thú vị giữa những tác phẩm Nguyễn Nhật Ánh. Dù bạn sinh ra ở đâu và ở độ tuổi nào, chắc hẳn khi đọc cuốn sách này, bạn sẽ mỉm cười trước những đoạn đối thoại đậm “chất Nguyễn Nhật Ánh”, và thấy lòng mình mềm lại trước những hành động tốt đẹp giữa người với người dù trong hoàn cảnh khó khăn. Điều đáng quý nhất ở trẻ thơ chính là tấm lòng tốt đơn thuần, và càng đáng quý hơn khi lớn lên, ta vẫn giữ được sự thuần lương đó. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-be-hang-xom-va-bon-vien-keo-bia-cung-tang-kem-random-1-trong-4-mau-bookmark-sticker-so-ve/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-be-hang-xom-va-bon-vien-keo-bia-cung-tang-kem-random-1-trong-4-mau-bookmark-sticker-so-ve/3.png', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-be-hang-xom-va-bon-vien-keo-bia-cung-tang-kem-random-1-trong-4-mau-bookmark-sticker-so-ve/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-co-be-hang-xom-va-bon-vien-keo-bia-cung-tang-kem-random-1-trong-4-mau-bookmark-sticker-so-ve/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thế Giới'],
            'isbn'           => '8935325025266',
            'title'          => 'Có Một Ngày, Bố Mẹ Sẽ Già Đi (Tái Bản 2024)',
            'slug'           => 'co-mot-ngay-bo-me-se-gia-di-tai-ban-2024',
            'image'          => '/images/vanhoc/co-mot-ngay-bo-me-se-gia-di-tai-ban-2024/1.jpg',
            'price'          => 92000.0,
            'discount_price' => 74000.0,
            'stock_quantity' => 50,
            'page_count'     => '216',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '17 x 11.5 x 1 cm',
            'weight'         => '230',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Có Một Ngày, Bố Mẹ Sẽ Già Đi Bao lâu rồi bạn chưa về nhà? Bao lâu rồi bạn chưa ngồi quây quần bên mâm cơm gia đình? “Trong thế giới của người trưởng thành, những xô bồ chốn đô thị và dụ hoặc nơi trần thế ngày càng nhiều.” Chúng ta bị cuốn vào guồng quay cuộc sống và vô tình bỏ quên những người thân yêu rồi đến khi nhận ra, có những chuyện đã không thể vãn hồi. Thời gian giống như đường một chiều, kẻ lữ hành chúng ta chỉ có thể tiến về phía trước và tuổi tác của bố mẹ cũng vậy, sẽ ngày một già đi theo năm tháng. “Có một ngày, bố mẹ sẽ già đi” là những câu chuyện cảm động về tình thân, gia đình và người nhà. Mỗi trang sách đều tái hiện ký ức tuổi thơ với những khoảnh khắc quý báu bên những người thân yêu. Căn nhà thời thơ ấu, món ăn thơm ngon mẹ nấu, những lời dặn dò của bố, sự ân cần của ông bà dành cho con cháu… Những hình ảnh gần gũi mà bình dị này sẽ ôm lấy bạn, trở thành nguồn sức mạnh to lớn giúp bạn vượt qua giông bão cuộc đời. “Bạn ơi, mau về nhà thôi… có ánh đèn vàng ấm áp luôn sáng, có bữa cơm nóng hổi vương hương thơm, có gia đình đang ngóng trông đợi chờ, bất kể bao mùa mưa nắng. Đong đầy thương nhớ và tình yêu vô điều kiện.” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nhiều Tác Giả'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nhiều Tác Giả'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/co-mot-ngay-bo-me-se-gia-di-tai-ban-2024/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/co-mot-ngay-bo-me-se-gia-di-tai-ban-2024/3.png', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/co-mot-ngay-bo-me-se-gia-di-tai-ban-2024/4.png', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/co-mot-ngay-bo-me-se-gia-di-tai-ban-2024/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Trẻ'],
            'isbn'           => '8934974166122',
            'title'          => 'Bộ Con Chó Nhỏ Mang Giỏ Hoa Hồng (Tái Bản 2020)',
            'slug'           => 'bo-con-cho-nho-mang-gio-hoa-hong-tai-ban-2020',
            'image'          => '/images/vanhoc/bo-con-cho-nho-mang-gio-hoa-hong-tai-ban-2020/1.jpg',
            'price'          => 95000.0,
            'discount_price' => 81000.0,
            'stock_quantity' => 50,
            'page_count'     => '252',
            'publish_year'   => '2020',
            'language'       => 'Tieng Viet',
            'dimensions'     => '13 x 20 cm',
            'weight'         => '280',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Cái tựa sách quả là có sức gợi tò mò. Tại sao lại là con chó mang giỏ hoa hồng? Nó mang cho bạn nó, hay cho những ai biết yêu thương nó? Câu chuyện về 5 chú chó đầy thú vị và cũng không kém cảm xúc lãng mạn- tác phẩm mới nhất của nhà văn bestseller Nguyễn Nhật Ánh sẽ khiến bạn thay đổi nhiều trong cách nhìn về loài thú cưng số 1 thế giới này. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-cho-nho-mang-gio-hoa-hong-tai-ban-2020/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-cho-nho-mang-gio-hoa-hong-tai-ban-2020/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-cho-nho-mang-gio-hoa-hong-tai-ban-2020/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-cho-nho-mang-gio-hoa-hong-tai-ban-2020/5.JPG', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '3300000063027-qt',
            'title'          => 'Bộ Còn Ra Thể Thống Gì? - Tập 2 - Bản Đặc Biệt - Tặng Kèm Card Bế Khuôn Nhân Vật + Postcard 2 Mặt Có Chữ Ký Và Lời Nhắn Của Tác Giả + Standee Chibi Xích Đu',
            'slug'           => 'bo-con-ra-the-thong-gi-tap-2-ban-dac-biet-tang-kem-card-be-khuon-nhan-vat-postcard-2-mat-co-chu-ky-va-loi-nhan-cua-tac-gia-standee-chibi-xich-du',
            'image'          => '/images/vanhoc/bo-con-ra-the-thong-gi-tap-2-ban-dac-biet-tang-kem-card-be-khuon-nhan-vat-postcard-2-mat-co-chu-ky-va-loi-nhan-cua-tac-gia-standee-chibi-xich-du/1.jpg',
            'price'          => 229000.0,
            'discount_price' => 206100.0,
            'stock_quantity' => 50,
            'page_count'     => '400',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14.5 x 2 cm',
            'weight'         => null,
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Còn Ra Thể Thống Gì? - Tập 2 Nhờ sự xuất hiện kịp thời của Dữu Vãn Âm, Hạ Hầu Đạm đã thoát khỏi vụ ám sát trên Bội Sơn. Tuy nhiên hắn đã trúng phải kịch độc của nước Khương, tính mạng ngàn cân treo sợi tóc. Đoan vương lúc này không còn kiên nhẫn nữa, y triệu tập ba toán quân biên ải về kinh thành, chuẩn bị soán vị. Tính toán của y vô cùng kín kẽ, bẫy rập muôn trùng. Dữu Vãn Âm và Hạ Hầu Đạm đành tương kế tựu kế, vừa bí mật tìm thuốc giải cho Hạ Hầu Đạm vừa chuẩn bị cho trận đại chiến cuối cùng. “Cô đang đứng ở nơi kết thúc và cũng là khởi đầu của một triều đại, nơi gió lớn nổi lên cúi nhìn dòng lũ cuồn cuộn dưới chân. Thế cuộc đổi dời, nhân duyên sinh diệt, ngày đêm xoay vần, non sông đổi chủ, tất cả đều dựa vào ý muốn của cô.” GIỚI THIỆU TÁC GIẢ: THẤT ANH TUẤN Hội viên Hiệp hội Tác giả Trung Quốc, đồng thời là tác giả tiểu thuyết nổi tiếng người Trung Quốc. Văn phong nhẹ nhàng và dí dỏm. Ý tưởng sáng tác độc đáo và đầy bất ngờ. Yêu thích học thêm kỹ năng mới và thám hiểm thế giới. Các tác phẩm tiêu biểu: Có thuốc (tên tạm dịch), Hương Sơn Hà (tên tạm dịch) Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Thất Anh Tuấn'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Thất Anh Tuấn'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-ra-the-thong-gi-tap-2-ban-dac-biet-tang-kem-card-be-khuon-nhan-vat-postcard-2-mat-co-chu-ky-va-loi-nhan-cua-tac-gia-standee-chibi-xich-du/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-ra-the-thong-gi-tap-2-ban-dac-biet-tang-kem-card-be-khuon-nhan-vat-postcard-2-mat-co-chu-ky-va-loi-nhan-cua-tac-gia-standee-chibi-xich-du/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-ra-the-thong-gi-tap-2-ban-dac-biet-tang-kem-card-be-khuon-nhan-vat-postcard-2-mat-co-chu-ky-va-loi-nhan-cua-tac-gia-standee-chibi-xich-du/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-con-ra-the-thong-gi-tap-2-ban-dac-biet-tang-kem-card-be-khuon-nhan-vat-postcard-2-mat-co-chu-ky-va-loi-nhan-cua-tac-gia-standee-chibi-xich-du/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Trẻ'],
            'isbn'           => '8934974177289',
            'title'          => 'Đi Qua Hoa Cúc (Tái Bản 2022)',
            'slug'           => 'di-qua-hoa-cuc-tai-ban-2022',
            'image'          => '/images/vanhoc/di-qua-hoa-cuc-tai-ban-2022/1.jpg',
            'price'          => 105000.0,
            'discount_price' => 90000.0,
            'stock_quantity' => 50,
            'page_count'     => '232',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 13 x 1.1 cm',
            'weight'         => '260',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Đi Qua Hoa Cúc (Tái Bản 2022) Mùa hè năm ấy, Trường cảm nhận được những rung động đầu đời trước một hình bóng thiếu nữ. Giữa khung cảnh yên bình của làng quê và những trò láu cá với đám bạn, Trường bắt đầu trải qua các cung bậc cảm xúc của một cậu trai rụt rè lần đầu biết yêu, biết ghen khi người mình thương có tình cảm với một người đàn ông khác. Tình yêu đầu của cậu rực rỡ như màu vàng của bông hoa cúc trong vườn mà hai người từng cùng nhau ngồi ngắm những ngày hè khi Trường 16 tuổi, sắc vàng ấy mang theo một nỗi buồn cứ neo mãi trong lòng Trường. Đi qua hoa cúc, chỉ còn lại tiếc nuối và hoài niệm đã xa. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/di-qua-hoa-cuc-tai-ban-2022/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/di-qua-hoa-cuc-tai-ban-2022/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/di-qua-hoa-cuc-tai-ban-2022/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/di-qua-hoa-cuc-tai-ban-2022/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Dân Trí'],
            'isbn'           => '8935325038068',
            'title'          => 'Điều Ước Đầu Tiên Của Ông Murray McBride',
            'slug'           => 'dieu-uoc-dau-tien-cua-ong-murray-mcbride',
            'image'          => '/images/vanhoc/dieu-uoc-dau-tien-cua-ong-murray-mcbride/1.jpg',
            'price'          => 169000.0,
            'discount_price' => 152100.0,
            'stock_quantity' => 50,
            'page_count'     => '376',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14.5 x 1.9 cm',
            'weight'         => '390',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Điều Ước Đầu Tiên Của Ông Murray McBride Một ngày trước khi Murray McBride đưa Jenny - người vợ yêu quý của ông suốt tám mươi năm - vào trung tâm chăm sóc những người bị sa sút trí tuệ, bà thuyết phục ông tìm kiếm chiếc hộp được cho là chứa “một kho báu đáng giá hơn vàng” mà ông nội bà đã chôn từ lâu. Với sự giúp đỡ của vài người bạn mới, Murray và Jenny từng bước lần theo dấu vết của những năm tháng đã qua. Trong suốt cả ngày hôm ấy, Murray trìu mến kể lại câu chuyện tình yêu của họ - cách họ gặp gỡ nhau, những thử thách mà họ đã cùng đối mặt và vượt qua, và những nỗ lực đầu tiên của họ trong cuộc tìm kiếm kho báu ấy kể từ khi họ còn nhỏ. Nhưng giờ đây, khi ngày càng đến gần kho báu, Murray lại càng nhớ rõ hơn lý do tại sao ngày xưa họ đã từ bỏ cuộc kiếm tìm này. Với khám phá đầy phấn khích trước mắt, Murray phải đưa ra quyết định xem liệu ông có nên tiếp tục khai quật kho báu hay không, ngay cả khi điều đó đồng nghĩa với việc khơi lại những sự kiện đau buồn trong quá khứ. GIỚI THIỆU TÁC GIẢ Joe Siple là một tiểu thuyết gia và diễn giả, với xuất thân là bình luận viên thể thao truyền hình. Anh là tác giả của cuốn tiểu thuyết bán chạy nhất trên USA Today - Năm điều ước của ông Murray McBride , cuốn sách đã được Maxy Awards vinh danh là “Cuốn sách của năm” năm 2018, đoạt giải thưởng National Indie Excellence Award (hạng mục Tình bạn ), và lọt vào chung kết của nhiều giải thưởng khác. Tác phẩm đã xuất bản tại Việt Nam: Năm điều ước của ông Murray McBride. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Joe Siple'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Joe Siple'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/dieu-uoc-dau-tien-cua-ong-murray-mcbride/2.png', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/dieu-uoc-dau-tien-cua-ong-murray-mcbride/3.png', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/dieu-uoc-dau-tien-cua-ong-murray-mcbride/4.png', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/dieu-uoc-dau-tien-cua-ong-murray-mcbride/5.png', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thanh Niên'],
            'isbn'           => '8936214272648',
            'title'          => 'Góc Nhỏ Có Nắng',
            'slug'           => 'goc-nho-co-nang',
            'image'          => '/images/vanhoc/goc-nho-co-nang/1.jpg',
            'price'          => 68000.0,
            'discount_price' => 55000.0,
            'stock_quantity' => 50,
            'page_count'     => '64',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '26.5 x 19 x 0.3 cm',
            'weight'         => '100',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Góc Nhỏ Có Nắng - Với 30 chủ đề tô màu phong phú đa dạng, mỗi bức tranh như là một lời thủ thỉ tâm tình gửi đến bạn - Thư giãn và chữa lành: Với những hình ảnh đẹp mắt và đơn giản, tô màu sẽ là một phương pháp hiệu quả giúp bạn chữa lành và nuôi dưỡng tâm hồn - Khám phá sự sáng tạo: Bạn đừng ngại vẽ thêm, tô thêm màu sắc để thể hiện cảm xúc của riêng mình - Chất liệu giấy dày, mịn, đẹp sẽ đem đến cho bạn trải nghiệm tô màu thú vị Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Little Rainbow'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Little Rainbow'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/goc-nho-co-nang/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/goc-nho-co-nang/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/goc-nho-co-nang/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/goc-nho-co-nang/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '8935244877489',
            'title'          => 'Bộ Hai Vạn Dặm Dưới Biển (Tái Bản 2022)',
            'slug'           => 'bo-hai-van-dam-duoi-bien-tai-ban-2022',
            'image'          => '/images/vanhoc/bo-hai-van-dam-duoi-bien-tai-ban-2022/1.jpg',
            'price'          => 99000.0,
            'discount_price' => 80000.0,
            'stock_quantity' => 50,
            'page_count'     => '452',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '19 x 13 x 2.2 cm',
            'weight'         => '475',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Một con thủy quái khổng lồ bỗng nhiên xuất hiện làm điêu đứng cả ngành hàng hải. Một đoàn thám hiểm nhổ chiếc neo tàu ra khơi với nhiệm vụ tiêu diệt con quái vật ấy, dù có phải đánh đổi bằng cả mạng sống. Một chiếc tàu ngầm thoắt ẩn, thoắt hiện, cùng một vị thuyền trưởng mang trong mình lời thề sẽ không bao giờ can dự vào cuộc sống trên đất liền thêm một lần nào nữa… Tất cả những bí mật sâu kín nhất của đại dương sâu thẳm, những phát minh chưa từng được biết đến, những mối nguy hiểm rình rập trong lòng biển cả… Tất cả đã quyện cùng với nhau để tạo nên một chuyến phiêu lưu li kì, hấp dẫn mà các bạn không thể bỏ qua, khi đã cầm trên tay cuốn sách “Hai vạn dặm dưới biển” của Jules Verne. JULES GABRIEL VERNE (1828 - 1905) nhà văn người Pháp, được xem là người đi tiên phong trong thể loại văn học khoa học viễn tưởng. Các tác phẩm của Jules Verne đã đưa ra những tiên đoán thần kì về cuộc sống hiện đại cũng như các thành tựu về khoa học kĩ thuật mà không phải nhà văn nào cũng có thể làm được… Các tác phẩm tiêu biểu: Năm tuần trên khinh khí cầu (1863) Chuyến du hành vào lòng đất (1864) Từ trái đất đến mặt trăng (1865) Hai vạn dặm dưới biển (1870) Vòng quanh thế giới trong 80 ngày (1873) “Thật vậy, Jules Verne là một trong những người đi tiên phong trong kỉ nguyên vũ trụ.” - Frank Borman (Phi hành gia Mĩ - tàu Apollo 8) “Khi Jules Verne kể về những sinh vật của biển cả trong Hai vạn dặm dưới biển, tôi có cảm giác như đang đọc một bài thơ của đại dương.” - Georges Perec (Nhà văn Pháp) “Tất cả chúng ta, theo cách này hay cách khác, đều là những đứa trẻ của Jules Verne.” -  Ray Bradbury (Nhà văn giả tưởng Mĩ) Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Jules Verne'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Jules Verne'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974179641',
            'title'          => 'Bộ Harry Potter Và Bảo Bối Tử Thần - Tập 7 (Tái Bản)',
            'slug'           => 'bo-harry-potter-va-bao-boi-tu-than-tap-7-tai-ban',
            'image'          => '/images/vanhoc/bo-harry-potter-va-bao-boi-tu-than-tap-7-tai-ban/1.jpg',
            'price'          => 285000.0,
            'discount_price' => 243000.0,
            'stock_quantity' => 50,
            'page_count'     => '846',
            'publish_year'   => '2022',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 14 cm',
            'weight'         => '700',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Harry Potter đang chuẩn bị rời khỏi nhà Dursley và đường Privet Drive trong thời khắc cuối cùng. Tuy nhiên, tương lai Harry đầy rẫy hiểm nguy, không chỉ cho cậu mà cả những người gần gũi – và Harry đã mất mát quá nhiều. Chỉ bằng cách tiêu hủy những Trường Sinh Linh Giá, Harry Potter mới có thể tự cứu mình và vượt qua những thế lực đen tối của Chúa tể hắc ám. Ở phần kết đầy kịch tính của loạt truyện Harry Potter này, Harry phải để những người bạn trung thành nhất ở lại tuyến sau để dấn thân vào cuộc hành trình nguy hiểm cuối cùng hòng tìm kiếm sức mạnh và đối mặt với số phận đáng sợ của cậu: một cuộc chiến sinh tử và đơn độc. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['J.K.Rowling'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['J.K.Rowling'],
            ]);
        }
        if (isset($authors['Lý Lan'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Lý Lan'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-bao-boi-tu-than-tap-7-tai-ban/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-bao-boi-tu-than-tap-7-tai-ban/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-bao-boi-tu-than-tap-7-tai-ban/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-bao-boi-tu-than-tap-7-tai-ban/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974184027',
            'title'          => 'Bộ Harry Potter Và Hội Phượng Hoàng - Tập 5 (Tái Bản 2023)',
            'slug'           => 'bo-harry-potter-va-hoi-phuong-hoang-tap-5-tai-ban-2023',
            'image'          => '/images/vanhoc/bo-harry-potter-va-hoi-phuong-hoang-tap-5-tai-ban-2023/1.jpg',
            'price'          => 385000.0,
            'discount_price' => 328000.0,
            'stock_quantity' => 50,
            'page_count'     => '1310',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 14 x 3 cm',
            'weight'         => '800',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Harry Potter Và Hội Phượng Hoàng - Tập 5 (Tái Bản 2023) Harry tức giận vì bị bỏ rơi ở nhà Dursley trong dịp hè, cậu ngờ rằng Chúa tể hắc ám Voldemort đang tập hợp lực lượng, và vì cậu có nguy cơ bị tấn công, những người Harry luôn coi là bạn đang cố che giấu tung tích cậu. Cuối cùng, sau khi được giải cứu, Harry khám phá ra rằng giáo sư Dumbledore đang tập hợp lại Hội Phượng Hoàng – một đoàn quân bí mật đã được thành lập từ những năm trước nhằm chống lại Chúa tể Voldemort. Tuy nhiên, Bộ Pháp thuật không ủng hộ Hội Phượng Hoàng, những lời bịa đặt nhanh chóng được đăng tải trên Nhật báo Tiên tri – một tờ báo của giới phù thủy, Harry lo ngại rằng rất có khả năng cậu sẽ phải gánh vác trách nhiệm chống lại cái ác một mình. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['J K Rowling'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['J K Rowling'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-hoi-phuong-hoang-tap-5-tai-ban-2023/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-hoi-phuong-hoang-tap-5-tai-ban-2023/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-hoi-phuong-hoang-tap-5-tai-ban-2023/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-harry-potter-va-hoi-phuong-hoang-tap-5-tai-ban-2023/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Hà Nội'],
            'isbn'           => '8935235248052',
            'title'          => 'Bộ Hãy Chăm Sóc Mẹ (Tái Bản 2026)',
            'slug'           => 'bo-hay-cham-soc-me-tai-ban-2026',
            'image'          => '/images/vanhoc/bo-hay-cham-soc-me-tai-ban-2026/1.jpg',
            'price'          => 126000.0,
            'discount_price' => 101000.0,
            'stock_quantity' => 50,
            'page_count'     => '323',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14 x 1 cm',
            'weight'         => '340',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Hãy Chăm Sóc Mẹ Tác phẩm Hãy chăm sóc mẹ của nhà văn Hàn Quốc Kyung-sook Shin mở đầu bằng khung cảnh xáo trộn của một gia đình. Mẹ bị lạc khi chuẩn bị bước lên tàu điện ngầm cùng bố ở ga Seoul. Hai ông bà dự định lên đây thăm cậu con cả. Con gái đầu, Chi-hon, là người đứng ra viết thông báo tìm người lạc thay cho cả gia đình. “Ngoại hình: Tóc ngắn đã muối tiêu, xương gò má cao, khi đi lạc đang mặc áo sơ mi xanh da trời, áo khoác trắng, váy xếp nếp màu be”. Trong tiềm thức của mình, Chi-hon vẫn nghĩ mẹ là người thường“bước đi giữa biển người với phong thái có thể đe dọa cả những tòa nhà lừng lững đang nhìn thẳng xuống từ trên cao”. Trong khi đó, những người qua đường đáp lại thông báo tìm người lạc của cô bằng miêu tả về một “một bà già cứ lững thững bước đi, thỉnh thoảng lại ngồi bệt xuống đường hay đứng thẫn thờ trước cầu thang cuốn”. Liệu đó có phải là người mẹ mà cả gia đình cô đang cất công tìm kiếm? Một ngày, một tuần rồi gần một tháng chầm chậm trôi qua. Người chồng và những đứa con hiện đều đã phương trưởng cả không chỉ lo sốt vó mà còn day dứt tâm can vì cảm giác tội lỗi, và rối bời “trong nỗi hoảng loạn như thể tất cả mọi người đều bị tổn thương ở vùng não”. Họ cũng lấy làm băn khoăn tại sao mẹ không biết hỏi đường về nhà cậu con cả cho đến khi phát hiện ra hai sự thật rằng mẹ không biết chữ và mẹ bệnh ung thư vú khiến đầu óc không được minh mẫn như thường. Từ đây, những hy vọng tìm lại mẹ càng trở nên mong manh hơn… - Nhận định về tác phẩm “Cuốn sách của tác giả nổi tiếng nhất Hàn Quốc này có thể làm mọi độc giả phải rơi nước mắt.” - Library Journal “Cảm động và ám ảnh.” - Newsday “Phần là câu chuyện về sự chuyển dịch của xã hội Hàn Quốc từ nông thôn ra thành thị, phần là khúc ca về sức mạnh của mối ràng buộc gia đình được hình thành từ sự quên mình của người phụ nữ; đây là một tác phẩm vô cùng cảm động.” - Kirkus Reviews “Nao lòng… Thấm thía… Người đọc sẽ tìm thấy sự đồng cảm trong câu chuyện về gia đình bán chạy nhất Hàn Quốc từ trước tới nay này.” - Publishers Weekly *** Đôi nét về tác giả: Shin Kyung-sook sinh năm 1963 trong một gia đình nghèo sống tại một ngôi làng nhỏ ở miền Nam Hàn Quốc. Không có điều kiện vào trường trung học, mười sáu tuổi cô lên Seoul lao động kiếm sống. ShinKyung-sook khởi nghiệp viết văn năm 1985 và sớm gặt hái thành công. Các tác phẩm của cô luôn có lượng độc giả lớn và nhận được nhiều giải thưởng văn học trong nước cũng như trong khu vực. Với Hãy chăm sóc mẹ , Shin Kyung-sook trở thành nhà văn châu Á nổi bật nhất năm 2009. *** Trích "Hãy chăm sóc mẹ" [...] Cô treo tai nghe lên cổ rồi đi vào nhà vệ sinh để rửa tay. Mọi người trong đoàn nhìn theo cô khi cô sải bước vào nhà vệ sinh. Cô rửa tay trong bồn rửa và khi mở túi xách lấy khăn lau tay, cô nhìn chằm chằm vào lá thư đã nhàu nát của cô em gái gửi cho mình để ở bên trong. Đây là lá thư cô đã lấy ra từ trong hòm thư ở căn hộ của mình ba hôm trước, đúng vào ngày cô cùng bạn trai rời Seoul. Một tay cầm cái túi du lịch có gắn bánh xe, đứng trước cửa nhà, cô đ',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Shin Kyung-Sook'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Shin Kyung-Sook'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Lao Động'],
            'isbn'           => '8935325029967',
            'title'          => 'Bộ Kẹo Dâu Tây Và Tiểu Tiên Nữ Của Anh - Tập 1 - Tặng Kèm Bookmark',
            'slug'           => 'bo-keo-dau-tay-va-tieu-tien-nu-cua-anh-tap-1-tang-kem-bookmark',
            'image'          => '/images/vanhoc/bo-keo-dau-tay-va-tieu-tien-nu-cua-anh-tap-1-tang-kem-bookmark/1.jpg',
            'price'          => 196000.0,
            'discount_price' => 157000.0,
            'stock_quantity' => 50,
            'page_count'     => '520',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14.5 x 2.6 cm',
            'weight'         => '540',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Kẹo Dâu Tây Và Tiểu Tiên Nữ Của Anh - Tập 1 Họ nói: Quý Nhượng độc một thân nanh vuốt sắc nhọn, anh đã sa ngã đến mức không thể cứu vãn được nữa, những người xung quanh anh chắc chắn cũng sẽ trầm luân trong vực thẳm. Họ truyền tai nhau: Quý Nhượng là một kẻ điên, ngang ngược, thâm hiểm, cậy nhà giàu nên suốt ngày gây chuyện. Và ngay cả chính Quý Nhượng cũng thấy vậy, anh chẳng có gì gọi là kế hoạch cuộc đời, anh sống ngày nào hay ngày ấy, không có mơ ước cũng chẳng hy vọng về tương lai. Cuộc đời của anh chỉ độc một nỗi cô đơn, nhàm chán, không ai quản nổi, cũng chẳng ai quan tâm. Vậy mà… Bất chợt một ngày, một cô gái nhỏ xuất hiện trong cuộc đời anh, đuổi theo phía sau anh, và luôn nở nụ cười ngọt ngào với anh. Cô sẵn sàng dang rộng đôi tay che chở cho anh ở phía sau. Cô gái ấy nói với anh rằng “Dù cả thế giới quay lưng lại với cậu, tớ cũng sẽ mãi mãi đứng về phía cậu.” “Tớ không đi đâu hết, tớ sẽ chỉ ở bên cạnh cậu thôi.” Cô gái ấy tuyên bố với mọi người rằng, “Anh ấy thế nào tôi cũng thích.” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Xuân Đao Hàn'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Xuân Đao Hàn'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-keo-dau-tay-va-tieu-tien-nu-cua-anh-tap-1-tang-kem-bookmark/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-keo-dau-tay-va-tieu-tien-nu-cua-anh-tap-1-tang-kem-bookmark/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-keo-dau-tay-va-tieu-tien-nu-cua-anh-tap-1-tang-kem-bookmark/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-keo-dau-tay-va-tieu-tien-nu-cua-anh-tap-1-tang-kem-bookmark/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Lao Động'],
            'isbn'           => '8936229390641-tb2026',
            'title'          => 'Khi Anh Chạy Về Phía Em (Tái Bản 2026) - Tặng Kèm Bookmark 2 Mặt Bồi Cứng',
            'slug'           => 'khi-anh-chay-ve-phia-em-tai-ban-2026-tang-kem-bookmark-2-mat-boi-cung',
            'image'          => '/images/vanhoc/khi-anh-chay-ve-phia-em-tai-ban-2026-tang-kem-bookmark-2-mat-boi-cung/1.jpg',
            'price'          => 219000.0,
            'discount_price' => 157680.0,
            'stock_quantity' => 50,
            'page_count'     => '512',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 16 x 2.5 cm',
            'weight'         => '660',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Khi Anh Chạy Về Phía Em Lần đầu tiên Tô Tại gặp Trương Lục Nhượng là một ngày mưa rất bình thường. Anh yên tĩnh bước qua người cô, phần đuôi tóc vẫn còn nhỏ nước, tóc mai Gói chặt vào gò má. Vẻ ngoài mưa nửa người thơm quyến rũ, khiến Tô Tại Tại cảm thấy đầy như anh đang cố ý. Anh biết bản thân nhịp điệu nào. Vì thế anh mới cố ý dầm mưa, cố ý lướt qua trước mặt cô. Cố ý… thu hút cô. Mãi sau này khi nhớ lại ngày hôm nay, Trương Lục Nhượng không nhớ rõ toàn bộ những gì đã xảy ra. Chỉ có hình bóng một cô gái cầm ô chậm rãi ngước lên, đôi mắt long lanh nhìn thẳng vào anh. Ánh mắt ấy như đang nhắc nhở rằng, ngọn đuốc sáng cuộc đời anh đã tới. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Trúc Dĩ'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Trúc Dĩ'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/khi-anh-chay-ve-phia-em-tai-ban-2026-tang-kem-bookmark-2-mat-boi-cung/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/khi-anh-chay-ve-phia-em-tai-ban-2026-tang-kem-bookmark-2-mat-boi-cung/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/khi-anh-chay-ve-phia-em-tai-ban-2026-tang-kem-bookmark-2-mat-boi-cung/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '9786043230581',
            'title'          => 'Bộ Không Gia Đình - Nobody’s Boy - Song Ngữ Anh-Việt - Tập 2',
            'slug'           => 'bo-khong-gia-dinh-nobodys-boy-song-ngu-anh-viet-tap-2',
            'image'          => '/images/vanhoc/bo-khong-gia-dinh-nobodys-boy-song-ngu-anh-viet-tap-2/1.jpg',
            'price'          => 89000.0,
            'discount_price' => 72000.0,
            'stock_quantity' => 50,
            'page_count'     => '322',
            'publish_year'   => '2024',
            'language'       => 'Song Ngữ Anh - Việt',
            'dimensions'     => '20.5 x 15 x 1.6 cm',
            'weight'         => '340',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Không Gia Đình - Nobody’s Boy - Song Ngữ Anh-Việt - Tập 2 “Không Gia Đình” của tác giả Hector Malot là một trong những tác phẩm văn học Pháp kinh điển. Nội dung là câu chuyện đầy cảm động và sâu sắc về cuộc đời và hành trình đi tìm lại gia đình thật của cậu bé mồ côi Remi. Remi được ông Barberin nhặt được vào một đêm mùa đông giữa thủ đô Paris và mang về cho vợ của ông là bà Barberin hiền lành, tốt bụng nuôi dưỡng. Remi được mẹ nuôi hết mực yêu thương và chăm sóc như con ruột. Nhưng khi Remi 8 tuổi, gia đình bố mẹ nuôi gặp biến cố, cậu bé đã bị bố nuôi bán cho cụ Vitalis, một nghệ sĩ đường phố già. Cụ Vitalis dẫn dắt Remi cùng đoàn xiếc của mình gồm chú khỉ Joli-Cœur, chú chó thông minh Capi và hai chú chó nhỏ khác đi biểu diễn khắp nước Pháp để kiếm sống. Trên đường đi, Rémi học hỏi được nhiều kỹ năng sống và cũng dần phát hiện ra niềm đam mê âm nhạc của mình, cậu bé cũng cảm nhận được tình yêu mà cụ Vitalis dành cho cậu dù cả hai cụ cháu không phải là ruột thịt máu mủ. Trong suốt cuộc hành trình rong ruổi khắp nước Pháp, Remi và cụ Vitalis gặp phải không ít những khó khăn, thử thách cam go và khốc liệt của cuộc sống cũng như nghịch cảnh của xã hội thời bấy giờ. Tuy nhiên, cậu bé cũng tìm thấy tình bạn, tình thương yêu từ những người lạ mặt – những người sau này trở thành gia đình của cậu. Trải qua mỗi thử thách, Remi trưởng thành hơn, mạnh mẽ và kiên cường hơn trước. Câu chuyện mang đến thông điệp mạnh mẽ về tình yêu, sự lương thiện, và ý nghĩa của gia đình – đó không chỉ là nơi chúng ta sinh ra mà còn là nơi chúng ta được yêu thương, che chở và quay trở về. “Không Gia Đình” là một cuốn sách đầy nhân văn không chỉ cho trẻ em, mà còn mang lại những bài học giá trị cho cả người lớn. Cuốn sách đã trở thành một phần không thể thiếu trong nền văn hóa đọc của nhân loại, được yêu thích qua nhiều thế hệ, và tiếp tục truyền cảm hứng cho độc giả khám phá ý nghĩa sâu sắc của cuộc sống. ƯU ĐIỂM CỦA BỘ SÁCH Phần tiếng Anh là bản dịch của Florence Crewe-Jones năm 1916 – một bản dịch vô cùng được yêu thích bởi những người yêu tiếng Anh trên khắp thế giới. Là bản song ngữ duy nhất trên thị trường. Giúp độc giả luyện thêm Tiếng Anh dễ dàng hơn, vừa giải trí và tăng vốn từ qua tác phẩm đậm chất nhân văn. Nuôi dưỡng trí tuệ cảm xúc (EQ) và cảm nhận tác phẩm kinh điển này bằng cả hai thứ tiếng. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Hector Malot'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Hector Malot'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-khong-gia-dinh-nobodys-boy-song-ngu-anh-viet-tap-2/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-khong-gia-dinh-nobodys-boy-song-ngu-anh-viet-tap-2/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Thanh Niên'],
            'isbn'           => '9786320506668',
            'title'          => 'Bộ Lửa Và Máu - Bìa Cứng',
            'slug'           => 'bo-lua-va-mau-bia-cung',
            'image'          => '/images/vanhoc/bo-lua-va-mau-bia-cung/1.jpg',
            'price'          => 380000.0,
            'discount_price' => 266000.0,
            'stock_quantity' => 50,
            'page_count'     => '904',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 16 x 4.7 cm',
            'weight'         => '1420',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Lửa Và Máu Lửa Và Máu (Fire & Blood) đưa độc giả ngược dòng thời gian gần ba thế kỷ trước những biến cố trong bộ truyện nổi tiếng Khúc tráng ca của Băng và Lửa. Tác phẩm tái hiện một cách sống động quá trình hình thành, hưng thịnh và những cuộc tranh giành quyền lực đẫm máu của dòng họ Targaryen - gia tộc sở hữu những con rồng hùng mạnh từng chinh phục lục địa Westeros. Với lối kể chuyện như một biên niên sử cổ xưa, cuốn sách mở ra bức tranh rộng lớn về các vị vua, hoàng hậu, chiến binh, âm mưu cung đình và những trận chiến làm thay đổi vận mệnh cả vương quốc. Không chỉ là câu chuyện về quyền lực và tham vọng, Lửa Và Máu còn là bản anh hùng ca về tình yêu, lòng trung thành, sự phản bội và cái giá khủng khiếp mà con người phải trả cho ngai vàng. THÔNG TIN TÁC GIẢ George R. R. Martin sinh năm 1948 tại Hoa Kỳ. Ông được xem là một trong những nhà văn giả tưởng có ảnh hưởng lớn nhất thế giới đương đại. Trước khi trở thành hiện tượng văn học toàn cầu, Martin từng làm biên kịch và sản xuất cho nhiều chương trình truyền hình. Ông nổi tiếng nhờ khả năng xây dựng thế giới rộng lớn, nhân vật đa chiều cùng những tình tiết bất ngờ khiến độc giả không thể đoán trước. Bộ tiểu thuyết Khúc tráng ca của Băng và Lửa đã trở thành nền tảng cho loạt phim truyền hình đình đám Trò chơi vương quyền, đưa tên tuổi của ông vươn tầm quốc tế. Với trí tưởng tượng phi thường và phong cách kể chuyện giàu chiều sâu, George R. R. Martin đã tạo nên một trong những vũ trụ giả tưởng đồ sộ và hấp dẫn nhất của văn học hiện đại. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['George R.R Martin'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['George R.R Martin'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-lua-va-mau-bia-cung/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-lua-va-mau-bia-cung/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-lua-va-mau-bia-cung/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-lua-va-mau-bia-cung/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974163442-2022',
            'title'          => 'Bộ Mắt Biếc (Tái Bản 2022)',
            'slug'           => 'bo-mat-biec-tai-ban-2022-2',
            'image'          => '/images/vanhoc/bo-mat-biec-tai-ban-2022-2/1.jpg',
            'price'          => 110000.0,
            'discount_price' => 94000.0,
            'stock_quantity' => 50,
            'page_count'     => '298',
            'publish_year'   => '2022',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 cm',
            'weight'         => '350',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Một tác phẩm được nhiều người bình chọn là hay nhất của nhà văn này. Một tác phẩm đang được dịch và giới thiệu tại Nhật Bản (theo thông tin từ các báo)… Bởi sự trong sáng của một tình cảm, bởi cái kết thúc rất, rất buồn khi suốt câu chuyện vẫn là những điều vui, buồn lẫn lộn (cái kết thúc không như mong đợi của mọi người). Cũng bởi, mắt biếc… năm xưa nay đâu (theo lời một bài hát) Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-mat-biec-tai-ban-2022-2/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Quân Đội Nhân Nân'],
            'isbn'           => '8935075961890',
            'title'          => 'Mưa Đỏ - Ấn Bản Bìa Cứng - Kèm Hộp + Chữ Ký Scan',
            'slug'           => 'mua-do-an-ban-bia-cung-kem-hop-chu-ky-scan',
            'image'          => '/images/vanhoc/mua-do-an-ban-bia-cung-kem-hop-chu-ky-scan/1.jpg',
            'price'          => 275000.0,
            'discount_price' => 220000.0,
            'stock_quantity' => 50,
            'page_count'     => '372',
            'publish_year'   => '2025',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '22.5 x 14 x 4 cm',
            'weight'         => '950',
            'cover_type'     => 'Bộ Hộp',
            'description'    => 'Mưa Đỏ Ấn Bản Bìa Cứng - Kèm Hộp Trong mùa phim “Mưa Đỏ” tạo cơn sốt mạnh mẽ, không chịu đứng ngoài dòng chảy cảm xúc ấy, bản sách Mưa Đỏ – phiên bản cao cấp bìa cứng, hộp đựng đẹp mắt, in ruột giấy 100 gsm được tái bản như một món quà tinh thần dành cho những ai đã, đang và sẽ tiếp cận câu chuyện lịch sử bi hùng này. Mưa Đỏ – tiểu thuyết chiến tranh bất tử của nhà văn – đại tá Chu Lai – xoay quanh 81 ngày đêm bảo vệ Thành cổ Quảng Trị mùa hè 1972, nơi bom đạn vùi lấp không chỉ đất đai mà còn thử thách cả ý chí con người. Cuốn sách dựng nên hình ảnh chiến trường đỏ lửa, đồng thời khắc họa sâu sắc nội tâm người lính trẻ – giữa tiếng còi pháo, khói bom, vẫn còn những khát khao bình dị, nhớ thương quê hương, khao khát sống và hy vọng về hòa bình. Khi phiên bản điện ảnh Mưa Đỏ khởi chiếu từ 22/8/2025, lấy nguyên tác tiểu thuyết của Chu Lai làm nền tảng, sự phấn khích lan tỏa khắp công chúng. Trailer đầu tiên đã tung ra những cảnh bom đạn hoành hành tại Thành cổ Quảng Trị, khiến người xem rùng mình vì hình ảnh lịch sử được tái hiện sống động, cảm xúc át cả tiếng súng. Theo chia sẻ của chính tác giả, Mưa Đỏ vốn xuất phát từ một kịch bản viết từ năm 2010 nhưng vì điều kiện tài chính, không được dựng thành phim ngay, nên được chuyển thể thành tiểu thuyết năm 2015. Khi phim được sản xuất, tiểu thuyết ngay lập tức trở lại là hiện tượng sách “cháy hàng”, với nhu cầu in nối bản liên tục để đáp ứng độc giả mong muốn sở hữu bản gốc sâu sắc hơn bản phim. Bản sách đặc biệt lần này không chỉ là một phiên bản đẹp để trưng bày – nó là tấm gương lưu giữ cho thế hệ hôm nay và mai sau về tinh thần chiến đấu, nỗi đau chiến tranh và giá trị hòa bình. So với phiên bản thông thường, bìa cứng + hộp giúp bảo vệ sách trước thời gian, đồng thời thể hiện sự trân trọng với nội dung. Nếu bạn đã bị xúc động bởi trailer, mong muốn đi sâu vào tâm tưởng người lính nơi chiến tuyến, muốn đọc những lời chưa kịp nói trong màn ảnh, thì bản sách Mưa Đỏ ấn bản đặc biệt là lựa chọn không thể bỏ qua. Hãy đặt trước để sở hữu cuốn sách – như chạm vào lịch sử bằng chính trái tim mình. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Chu Lai'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Chu Lai'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/mua-do-an-ban-bia-cung-kem-hop-chu-ky-scan/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/mua-do-an-ban-bia-cung-kem-hop-chu-ky-scan/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/mua-do-an-ban-bia-cung-kem-hop-chu-ky-scan/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/mua-do-an-ban-bia-cung-kem-hop-chu-ky-scan/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Hội Nhà Văn'],
            'isbn'           => '8935235248311',
            'title'          => 'Bộ Người Đua Diều (Tái Bản 2026)',
            'slug'           => 'bo-nguoi-dua-dieu-tai-ban-2026',
            'image'          => '/images/vanhoc/bo-nguoi-dua-dieu-tai-ban-2026/1.jpg',
            'price'          => 155000.0,
            'discount_price' => 124000.0,
            'stock_quantity' => 50,
            'page_count'     => '460',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14 x 2.3 cm',
            'weight'         => '500',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Người Đua Diều NGƯỜI ĐUA DIỀU - BÍ MẬT, PHẢN BỘI VÀ HÀNH TRÌNH CHUỘC LỖI KHÔNG LỐI THOÁT Một tội lỗi trong quá khứ. Một cơ hội để sửa sai. Nhưng liệu đã quá muộn? Một lời hứa bị phản bội – Một quá khứ không thể chôn vùi – Một hành trình chuộc lỗi đầy đau đớn của một tình bạn tưởng chừng là tri kỷ… VỀ TÁC GIẢ: Khaled Hosseini Khaled Khaled (sinh năm 1965) - Là tiểu thuyết gia người Mỹ gốc Afghanistan, nổi tiếng với những tác phẩm đầy ám ảnh về quê hương ông. - Ông từng là bác sĩ trước khi bước vào con đường văn chương. "Người Đua Diều" (2003) là cuốn tiểu thuyết đầu tay, cũng là tác phẩm đưa tên tuổi ông vươn ra thế giới. - Sau đó, ông tiếp tục thành công với Ngàn Mặt Trời Rực Rỡ (2007) và Và Những Ngọn Núi Vọng (2013). TÓM TẮT NỘI DUNG SÁCH Afghanistan những năm 1970, nơi những cánh diều tung bay trên bầu trời đầy tự do và ước mơ, nhưng cũng là nơi định mệnh trói buộc hai cậu bé Amir và Hassan vào một bi kịch không thể nào quên. Một sự phản bội, một bí mật bị chôn giấu, một vết thương lòng không bao giờ lành - tất cả mở đầu cho hành trình giằng xé giữa tội lỗi và sự chuộc lỗi kéo dài suốt cả cuộc đời. Nhiều năm sau, Amir đã rời xa quê hương, tìm kiếm một cuộc sống mới tại Mỹ. Nhưng quá khứ chưa bao giờ ngủ yên. Một cuộc điện thoại bất ngờ đưa anh trở về Kabul, nơi chiến tranh đã tàn phá tất cả, và nơi anh buộc phải đối mặt với lỗi lầm của chính mình. Liệu anh có đủ dũng cảm để sửa chữa những sai lầm của tuổi thơ? Liệu cánh diều ngày nào có thể bay lại trên bầu trời một lần nữa? Điểm nổi bật của “Người Đua Diều” - Câu chuyện đầy cảm xúc về tình bạn và sự phản bội: Một tình bạn đẹp đẽ nhưng bị hoen ố bởi nỗi sợ hãi, sự ích kỷ và những lựa chọn sai lầm. - Hành trình chuộc lỗi đầy ám ảnh: Một cuộc đời bị giằng xé giữa quá khứ và hiện tại, giữa tội lỗi và sự cứu rỗi. - Bức tranh chân thực về Afghanistan: Từ những ngày tháng yên bình đến khi đất nước chìm trong chiến tranh, cuốn sách mang đến cái nhìn đầy cảm động về một Afghanistan đã mất. Vì sao bạn không thể bỏ lỡ "Người Đua Diều"? - Thành tựu của “Người Đua Diều” - Tác phẩm bán chạy số 1 của New York Times trong hơn 2 năm. - Được dịch ra hơn 70 ngôn ngữ, bán hơn 38 triệu bản toàn cầu. - Chuyển thể thành phim điện ảnh đình đám năm 2007. - Nhận nhiều giải thưởng văn học quốc tế, đề cử giải BAFTA. - Nắm giữ vị trí đầu bảng của The New York Times trong 110 tuần. - Một cốt truyện ly kỳ với câu chuyện xúc động về tình bạn, danh dự và sự chuộc tội. - Khắc họa Afghanistan trước và sau chiến tranh - vừa đẹp đẽ, vừa tàn khốc, xung đột gay gắt. "Người Đua Diều" không chỉ là một câu chuyện, mà còn là tiếng vọng của lương tâm, của những lỗi lầm và sự chuộc lỗi. Bạn đã sẵn sàng để đọc chưa? Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Khaled Hosseini'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Khaled Hosseini'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Hội Nhà Văn'],
            'isbn'           => '8935235242173',
            'title'          => 'Sưởi Ấm Mặt Trời - Phần Tiếp Theo Của Cây Cam Ngọt Của Tôi',
            'slug'           => 'suoi-am-mat-troi-phan-tiep-theo-cua-cay-cam-ngot-cua-toi',
            'image'          => '/images/vanhoc/suoi-am-mat-troi-phan-tiep-theo-cua-cay-cam-ngot-cua-toi/1.jpg',
            'price'          => 160000.0,
            'discount_price' => 128000.0,
            'stock_quantity' => 50,
            'page_count'     => '376',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20.5 x 14 x 1.8 cm',
            'weight'         => '400',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'SƯỞI ẤM MẶT TRỜI: : Tập 2 Của Cây Cam Ngọt - HÀNH TRÌNH ĐI TÌM ÁNH SÁNG GIỮA TỔN THƯƠNG Zezé đã lớn hơn, nhưng trái tim cậu vẫn mang đầy những vết xước… Tiếp nối câu chuyện đầy cảm động của "Cây Cam Ngọt Của Tôi" VỀ TÁC GIẢ : José Mauro de Vasconcelos Ông là một nhà văn vĩ đại nhưng lại có xuất thân nghèo khó ở Brazil. Ông từng làm nhiều công việc khác nhau trước khi trở thành nhà văn Những trải nghiệm tuổi thơ đầy gian truân là nguồn cảm hứng để ông viết nên “Cây Cam Ngọt Của Tôi” (1968) – tác phẩm nổi tiếng nhất trong sự nghiệp. "Sưởi Ấm Mặt Trời" là phần tiếp theo, tiếp tục câu chuyện về Zezé với những tổn thương sâu sắc hơn. Văn phong giản dị, chân thực, giàu cảm xúc, khiến bao thế hệ độc giả rơi nước mắt và suy ngẫm về tình yêu thương, sự mất mát và giá trị của một tuổi thơ trọn vẹn. VỀ DỊCH GIẢ : Đặng Bảo Kim Dịch giả tài năng, chuyên chuyển ngữ các tác phẩm văn học nước ngoài. Có lối dịch tinh tế, giữ trọn vẹn cảm xúc và nét đẹp nguyên bản của tác phẩm. Đóng góp quan trọng trong việc đưa văn học Brazil đến gần hơn với độc giả Việt Nam. TÓM TẮT NỘI DUNG SÁCH Zezé – cậu bé từng trò chuyện với cây cam ngọt, nay đã lớn hơn và đối diện với một thế giới khắc nghiệt hơn. Mồ côi mẹ, bị cha ghẻ lạnh, Zezé lạc lõng giữa cuộc đời đầy cay đắng. Cuộc gặp gỡ với Manuel Valadares mang đến cho cậu tình yêu thương hiếm hoi, nhưng định mệnh tàn nhẫn lại cướp đi tất cả. Zezé sẽ phải đối mặt với mất mát ra sao? Liệu ánh sáng ấm áp của mặt trời có còn sưởi ấm trái tim cậu? "Có những nỗi đau không ai thấy, nhưng chúng vẫn đục khoét tâm hồn ta từng ngày." "Nếu lớn lên nghĩa là quên đi những người mình yêu thương, thì cháu không muốn nữa!" Một câu chuyện đầy ám ảnh về tuổi thơ, tình yêu thương và những vết thương không bao giờ lành. Bạn đã sẵn sàng bước vào thế giới của Zezé chưa? “SƯỞI ẤM MẶT TRỜI” MANG ĐẾN ĐIỀU GÌ? Một hành trình cảm xúc từ ngây thơ đến trưởng thành, chạm đến những góc sâu nhất của tâm hồn. Câu chuyện về tình yêu thương, mất mát và nỗi đau của một đứa trẻ, khiến bạn trăn trở về giá trị của gia đình và ký ức. Ngôn ngữ đẹp đẽ, giàu hình ảnh, mang đến những thước phim sống động về tuổi thơ. TẠI SAO NÊN ĐỌC VÀ SỞ HỮU “SƯỞI ẤM MẶT TRỜI”? Một kiệt tác văn học Brazil chạm đến trái tim hàng triệu độc giả trên thế giới. Dõi theo hành trình trưởng thành của Zezé – một cậu bé nhỏ bé nhưng mang trong mình cả thế giới cảm xúc. Đắm chìm trong sự hồn nhiên, tình yêu thương và những khát khao giản dị nhưng đầy sức mạnh. Chạm đến những nỗi buồn sâu lắng, nhưng cũng tìm thấy hy vọng rực rỡ giữa những mất mát của cuộc đời. Nếu bạn từng yêu “Cây Cam Ngọt Của Tôi”, đây là cuốn sách bạn không thể bỏ lỡ! Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Joses Mauro De Vasconcelos'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Joses Mauro De Vasconcelos'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/suoi-am-mat-troi-phan-tiep-theo-cua-cay-cam-ngot-cua-toi/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/suoi-am-mat-troi-phan-tiep-theo-cua-cay-cam-ngot-cua-toi/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/suoi-am-mat-troi-phan-tiep-theo-cua-cay-cam-ngot-cua-toi/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935095633272',
            'title'          => 'Bộ Thần Thoại Hy Lạp - Bìa Cứng (Tái Bản 2023)',
            'slug'           => 'bo-than-thoai-hy-lap-bia-cung-tai-ban-2023',
            'image'          => '/images/vanhoc/bo-than-thoai-hy-lap-bia-cung-tai-ban-2023/1.jpg',
            'price'          => 295000.0,
            'discount_price' => 236000.0,
            'stock_quantity' => 50,
            'page_count'     => '716',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 16 x 4 cm',
            'weight'         => '856',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Thần Thoại Hy Lạp Thần thoại Hy Lạp, một di sản văn hóa nhân loại, từ lâu đã trở thành nền tảng văn hóa không chỉ của một quốc gia mà còn là của cả một châu lục - Âu châu. Thần thoại Hy Lạp là những câu chuyện lý giải sự hình thành thế giới nhưng lấp lánh bên trong đó là khát khao, là ước mơ khẳng định tầm vóc của con người trước thiên nhiên. Những ước mơ ấy của loài người càng lấp lánh bao nhiêu thì bầu trời đêm thần thoại lại càng huyền bí, càng rộng mở bấy nhiêu. Đó chính là sức hấp dẫn ngàn đời của Thần thoại Hy Lạp. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nhiều Tác Giả'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nhiều Tác Giả'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '8935244898361',
            'title'          => 'The Green Lotus Bud - Búp Sen Xanh',
            'slug'           => 'the-green-lotus-bud-bup-sen-xanh',
            'image'          => '/images/vanhoc/the-green-lotus-bud-bup-sen-xanh/1.jpg',
            'price'          => 79000.0,
            'discount_price' => 68000.0,
            'stock_quantity' => 50,
            'page_count'     => '356',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Anh',
            'dimensions'     => '20.5 x 12.5 x 1.7 cm',
            'weight'         => '370',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'The Green Lotus Bud - Búp Sen Xanh The Green Lotus Bud là bản dịch tiếng Anh của tiểu thuyết Búp Sen Xanh do các dịch giả Phan Thanh Hào, Diane Fox và Kate Jellema chuyển ngữ. Đây là một dịch phẩm giúp bạn đọc quốc tế tiếp cận một tác phẩm văn học Việt Nam nổi tiếng nói chung, một tiểu thuyết lịch sử về Hồ Chủ tịch nói riêng. Bạn đọc Việt Nam cũng có thêm cơ hội học hỏi về tiếng Anh về dịch thuật qua cuốn sách này. First published in 1982, The Green Lotus Bud is the very first historical novel about the life of President Hồ Chí Minh, from his childhood to the day he left his homeland to embark on a journey seeking a way to save the country. Writer Sơn Tùng spent thirty years of his life researching, recording and collecting documentary about Hồ Chí Minh. He visited all places where Hồ Chí Minh once lived and worked to meet witnesses and seek any possible chance to talk to the President’s siblings. Especially, when taking a role of reporter, Sơn Tùng had the opportunity to interview Hồ Chí Minh. He had reassembled and recreated vividly and truthfully in his book an important period in President Hồ Chí Minh\'s life. “Genius does not come ready-made. One’s character and potential to succeed is rooted in family and homeland.” - SƠN TÙNG --- SƠN TÙNG (1928-2021) Sơn Tùng was born in Diễn Châu, Nghệ An. He was one of the Vietnamese writers who wrote a lot, especially about President Hồ Chí Minh and other notables in Vietnamese history. His most successful work is the novel The Green Lotus Bud. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Sơn Tùng'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Sơn Tùng'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/the-green-lotus-bud-bup-sen-xanh/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/the-green-lotus-bud-bup-sen-xanh/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/the-green-lotus-bud-bup-sen-xanh/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8936203366167',
            'title'          => 'Thép Đã Tôi Thế Đấy - Ấn Bản Cao Cấp - Bìa Cứng - Phiên Bản Độc Quyền 50 Năm Fahasa',
            'slug'           => 'thep-da-toi-the-day-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa',
            'image'          => '/images/vanhoc/thep-da-toi-the-day-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa/1.jpg',
            'price'          => 890000.0,
            'discount_price' => null,
            'stock_quantity' => 50,
            'page_count'     => '284',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '30 x 25 x 3 cm',
            'weight'         => '2000',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Thép Đã Tôi Thế Đấy Tiểu thuyết Thép đã tôi thế đấy của Nikolai Ostrovsky là một tác phẩm kinh điển của văn học Nga nói riêng và văn học cách mạng nói chung, đã trở thành nguồn cảm hứng cho nhiều thế hệ độc giả. Thép đã tôi thế đấy ghi lại cả một quá trình tôi thép, bước đường gian khổ trưởng thành của thế hệ thanh niên Xô viết đầu tiên. Đây không phải là một tác phẩm văn học chỉ nhìn đời mà viết. Tác giả sống nó rồi mới viết nó. Nhân vật trung tâm, Pavel, chính là tác giả: Nikolai Ostrovsky. Là một chiến sĩ Cách mạng Tháng Mười, ông đã sống một cách nồng cháy nhất, như nhân vật Pavel của ông. Đây cũng không phải một cuốn tiểu thuyết tự thuật thường vì hứng thú hay lợi ích cá nhân mà viết. Ostrovsky viết Thép đã tôi thế đấy trên giường bệnh, trong khi bại liệt và mù, bệnh tật tàn phá chín phần mười cơ thể. Chưa bao giờ có một nhà văn sáng tác trong những điều kiện gian khổ như vậy. Trong lòng người viết phải có một nhiệt huyết và cảm hứng nồng nàn không biết bao nhiêu mà kể. Nguồn cảm hứng ấy là sức mạnh tinh thần của người chiến sĩ cách mạng bị tàn phế, đau đớn đến cùng cực, không chịu nằm đợi chết, không thể chịu được xa rời chiến đấu, do đó phấn đấu trở thành một nhà văn và viết nên cuốn sách này. Càng yêu cuốn sách, càng kính trọng nhà văn, càng tôn quý phẩm chất của con người cách mạng. Ấn bản tiếng Việt này được biên tập lại với mục tiêu mang đến sự gần gũi và chuẩn xác hơn với nguyên bản tiếng Nga, đồng thời đảm bảo tính thống nhất về văn phong và thuật ngữ xuyên suốt toàn bộ tác phẩm. Cụ thể, quá trình biên tập đã tập trung vào các điểm sau: 1. Hiệu đính ngôn ngữ: Toàn bộ bản dịch được rà soát kỹ lưỡng để điều chỉnh các từ và cụm từ vay mượn tiếng nước ngoài, tên nhân vật, tên tổ chức được viết theo lối phiên âm cũ. VD: Man-li-khe thành Malinncher , Côm-sô- môn thành Komsomol , Pa-ven thành Pavel , ly-xê thành lycée … Các lối diễn đạt không còn phổ biến cũng đã được điều chỉnh phù hợp với ngôn ngữ tiếng Việt hiện đại nhưng vẫn giữ vững tinh thần của bản dịch. 2. Chuẩn hóa thuật ngữ: Các thuật ngữ chính trị, lịch sử và tên gọi tổ chức của Liên Xô (như Komsomol, Bolsheviks, Cheka, v.v.) được thống nhất cách chuyển tự và dịch nghĩa, giúp người đọc theo dõi dễ dàng hơn các yếu tố chuyên ngành trong cốt truyện. Một số danh từ riêng hoặc các thuật ngữ đặc biệt cũng đã được bổ sung thông tin vào phần chú thích giúp độc giả nắm rõ các sự kiện thuộc bối cảnh lịch sử thời Nội chiến Nga và Nội chiến Ukraina. 3. Điều chỉnh và bổ sung thông tin: Đối chiếu với bản tiếng Nga của Nhà xuất bản Công nhân Moskva (1977) để hiệu đính bản dịch, đồng thời bổ sung một số chú thích ký hiệu (BT) để cung cấp thêm thông tin mở rộng cho bạn đọc. Giới thiệu tác giả: Sinh ra trong một gia đình lao động nghèo tại làng Villia thuộc một thị trấn nhỏ ở Ukraina, khi ấy còn thuộc quyền kiểm soát của Nga hoàng. Lớn lên trong giai đoạn đầy phức tạp, Ostrovsky chứng kiến nhiều đổi thay của thời cuộc: sự sụp đổ của chế độ quân chủ, ảnh hưởng của Cách mạng Nga năm 1917, cuộc nội ',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nikolai Alekseyevich Ostrovsky'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nikolai Alekseyevich Ostrovsky'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/thep-da-toi-the-day-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/thep-da-toi-the-day-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/thep-da-toi-the-day-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/thep-da-toi-the-day-an-ban-cao-cap-bia-cung-phien-ban-doc-quyen-50-nam-fahasa/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Lao Động'],
            'isbn'           => '9786043930573',
            'title'          => 'Bộ Thiên Thần Và Ác Quỷ - Bìa Cứng (Tái Bản 2023)',
            'slug'           => 'bo-thien-than-va-ac-quy-bia-cung-tai-ban-2023',
            'image'          => '/images/vanhoc/bo-thien-than-va-ac-quy-bia-cung-tai-ban-2023/1.jpg',
            'price'          => 239000.0,
            'discount_price' => 167300.0,
            'stock_quantity' => 50,
            'page_count'     => '725',
            'publish_year'   => '2023',
            'language'       => 'Tieng Viet',
            'dimensions'     => '24 x 16 x 4.3 cm',
            'weight'         => '1185',
            'cover_type'     => 'Bìa Cứng',
            'description'    => 'Thiên Thần Và Ác Quỷ - Bìa Cứng Dan Brown sinh ngày 22 tháng 6 năm 1964 tại Exeter, New Hampshire. Ông tốt nghiệp trường Cao đẳng Amherst với hai tấm bằng tiếng Anh và tiếng Tây Ban Nha vào năm 1986, sau đó bước chân vào con đường soạn nhạc. Năm 1996, ông bắt đầu chuyên tâm vào viết văn và cho ra đời cuốn tiểu thuyết đầu tay - Pháo đài số - vào năm 1998. Tiếp nối thành công, ông cho ra đời thêm các tác phẩm Thiên thần và Ác quỷ năm 2000 và Điểm dối lừa năm 2001. Tuy nhiên phải đến cuốn thứ 4, Mật mã Davinci năm 2003 mới thực sự đưa tên tuổi ông nổi như cồn trên khắp thế giới. Không hề bị áp lực do quá thành công từ các cuốn trước, ông tiếp tục xuất bản cuốn Biểu tượng thất truyền (2009) và Hỏa Ngục (2013). Cả hai cuốn sách đều trở thành những tác phẩm bán cực kỳ chạy. Thông tin tác phẩm: - Robert Langdon, giáo sư biểu tượng học của Harvard, được bí mật mời tới Trung tâm nghiên cứu Hạt nhân châu Âu - cơ quan nghiên cứu khoa học lớn nhất thế giới để làm sáng tỏ cái chết của nhà vật lý học Leonardo Vetra. Biểu tượng bí ẩn được đóng dấu sắt nung trên ngực thi thể đưa đến một kết luận duy nhất: Hung thủ chính là Illuminati - một hội kín tưởng chừng đã tàn lụi từ 400 năm trước. Dường như hội kín vô cùng quyền lực này đã trở lại để tiếp tục cuộc báo thù nhằm vào Nhà thờ Công giáo, kẻ thù truyền kiếp của mình. Phản vật chất - công tình nghiên cứu của nhà vật lý học quá cố cùng cô con gái nuôi Vittoria Vetra bỗng chốc trở thành mối đe dọa cực kỳ nghiêm trọng đối với thành Rome cũng như giáo hội Vatican trong đêm Mật nghị Hồng y. Bốn vị Hồng y, những ứng cử viên cho chức vụ Giáo hoàng lần lượt bị bắt cóc ngay trước thềm Mật nghị. Robert Langdon cùng nữ khoa học gia quyến rũ Vittoria Vetra phải chạy đua với thời gian để tìm kiếm bốn vị Hồng y mất tích cùng hộp phản vật chất bị đánh cắp. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Dan Brown'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Dan Brown'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935095633753',
            'title'          => 'Bộ Thơ Tố Hữu (Tái Bản 2024)',
            'slug'           => 'bo-tho-to-huu-tai-ban-2024',
            'image'          => '/images/vanhoc/bo-tho-to-huu-tai-ban-2024/1.jpg',
            'price'          => 55000.0,
            'discount_price' => 44000.0,
            'stock_quantity' => 50,
            'page_count'     => '220',
            'publish_year'   => '2024',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '18 x 11 x 1.1 cm',
            'weight'         => '240',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Thơ Tố Hữu "Tố Hữu là một nhà thơ lớn. nói đúng hơn, ông là nhà thơ lãng mạn cách mạng. Cả cuộc đời ông gắn bó với cách mạng. Thơ với đời là một. Trước sau đều nhất quán. Tố Hữu nhìn cách mạng bằng con mắt lãng mạn của một thi sĩ. Thơ ông dường như chỉ có một giọng. Đó là gióng hát từng bừng ca ngợi cách mạng. Đọc thơ ông trong bất cứ hoàn cảnh và tâm trạng nào. Ta cũng thấy phấn chấn, náo nức như đi trẩy hội. Đến đâu cũng nghe vang tiếng trống, tiếng kèn. Mà thơ ông đâu chỉ có trống phách linh đình như một đám rước, ông còn bắn cả 21 phát đại bác vang trời. Cho đến nay, chỉ có ông là nhà thơ Việt Nam duy nhất đã bắn đại bác trang trọng như thế." (Trích Chân dung và đối thoại - Trần Đăng Khoa) Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Tố Hữu'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Tố Hữu'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tho-to-huu-tai-ban-2024/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tho-to-huu-tai-ban-2024/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Kim Đồng'],
            'isbn'           => '8935244883060',
            'title'          => 'Bộ Tiểu Thuyết Thanh Gươm Diệt Quỷ - Người Dẫn Lối Của Gió',
            'slug'           => 'bo-tieu-thuyet-thanh-guom-diet-quy-nguoi-dan-loi-cua-gio',
            'image'          => '/images/vanhoc/bo-tieu-thuyet-thanh-guom-diet-quy-nguoi-dan-loi-cua-gio/1.jpg',
            'price'          => 50000.0,
            'discount_price' => 43000.0,
            'stock_quantity' => 50,
            'page_count'     => '236',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '19 x 13 cm',
            'weight'         => '250',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Nhờ cuộc gặp gỡ vào thời niên thiếu với Kumeno Masachika - một kiếm sĩ sử dụng Hơi thở của gió, Sanemi đã biết đến và gia nhập đội Diệt quỷ. Tuy tính khí hoàn toàn trái ngược, lúc nào cũng cự nự nhau nhưng họ vẫn chung chí hướng nỗ lực rèn luyện để hướng đến vị trí “Trụ cột”. Masachika vừa là tiền bối, vừa là “đối thủ”, đồng thời cũng là người đầu tiên nhìn ra khía cạnh đặc biệt ẩn sâu dưới vẻ ngoài gai góc của Sanemi. Mọi chuyện tưởng chừng suôn sẻ, cho đến một ngày họ nhận được mệnh lệnh phối hợp thực hiện nhiệm vụ… Chuyện chưa từng được kể về Phong trụ Shinazugawa Sanemi và nhiều nhân vật thú vị khác như Hashibira Inosuke, Hà trụ Tokito Muichiro… sẽ được hé mở trong tuyển tập 5 câu chuyện với đủ sắc thái cảm xúc!! Ngoài ra, “Học viện Diệt quỷ” cũng tái xuất với những mẩu chuyện vui nhộn của cấp hai và cấp ba! AYA YAJIMA “Tôi phát ngất vì độ đáng yêu của những nhân vật trong tranh minh họa bìa mất thôi! Dễ thương quá mức rồi… Hình minh họa trong sách cũng hết chỗ chê, các bạn nhất định phải xem nhé!” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Koyoharu Gotouge'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Koyoharu Gotouge'],
            ]);
        }
        if (isset($authors['Aya Yajima'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Aya Yajima'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tieu-thuyet-thanh-guom-diet-quy-nguoi-dan-loi-cua-gio/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Trẻ'],
            'isbn'           => '8934974187622',
            'title'          => 'Bộ Tôi Thấy Hoa Vàng Trên Cỏ Xanh (Tái Bản 2023)',
            'slug'           => 'bo-toi-thay-hoa-vang-tren-co-xanh-tai-ban-2023',
            'image'          => '/images/vanhoc/bo-toi-thay-hoa-vang-tren-co-xanh-tai-ban-2023/1.jpg',
            'price'          => 150000.0,
            'discount_price' => 128000.0,
            'stock_quantity' => 50,
            'page_count'     => '378',
            'publish_year'   => '2023',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '20 x 13 x 1.8 cm',
            'weight'         => '390',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh Những câu chuyện nhỏ xảy ra ở một ngôi làng nhỏ: chuyện người, chuyện cóc, chuyện ma, chuyện công chúa và hoàng tử , rồi chuyện đói ăn, cháy nhà, lụt lội,... Bối cảnh là trường học, nhà trong xóm, bãi tha ma. Dẫn chuyện là cậu bé 15 tuổi tên Thiều. Thiều có chú ruột là chú Đàn, có bạn thân là cô bé Mận. Nhưng nhân vật đáng yêu nhất lại là Tường, em trai Thiều, một cậu bé học không giỏi. Thiều, Tường và những đứa trẻ sống trong cùng một làng, học cùng một trường, có biết bao chuyện chung. Chúng nô đùa, cãi cọ rồi yêu thương nhau, cùng lớn lên theo năm tháng, trải qua bao sự kiện biến cố của cuộc đời. Tác giả vẫn giữ cách kể chuyện bằng chính giọng trong sáng hồn nhiên của trẻ con. 81 chương ngắn là 81 câu chuyện hấp dẫn với nhiều chi tiết thú vị, cảm động, có những tình tiết bất ngờ, từ đó lộ rõ tính cách người. Cuốn sách, vì thế, có sức ám ảnh. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Nguyễn Nhật Ánh'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Nguyễn Nhật Ánh'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-toi-thay-hoa-vang-tren-co-xanh-tai-ban-2023/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-toi-thay-hoa-vang-tren-co-xanh-tai-ban-2023/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-toi-thay-hoa-vang-tren-co-xanh-tai-ban-2023/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-toi-thay-hoa-vang-tren-co-xanh-tai-ban-2023/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935235247918',
            'title'          => 'Bộ Trăm Năm Cô Đơn (Tái Bản 2026)',
            'slug'           => 'bo-tram-nam-co-don-tai-ban-2026',
            'image'          => '/images/vanhoc/bo-tram-nam-co-don-tai-ban-2026/1.jpg',
            'price'          => 235000.0,
            'discount_price' => 188000.0,
            'stock_quantity' => 50,
            'page_count'     => '496',
            'publish_year'   => '2026',
            'language'       => 'Tiếng Việt',
            'dimensions'     => '24 x 15.5 x 2.4 cm',
            'weight'         => '700',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Trăm Năm Cô Đơn TRĂM NĂM CÔ ĐƠN - BI KỊCH SỐ PHẬN VÀ VÒNG LẶP CỦA LỊCH SỬ Điều gì sẽ xảy ra khi một gia tộc sống suốt một thế kỷ trong vòng xoáy của định mệnh? Trăm Năm Cô Đơn không chỉ là một cuốn tiểu thuyết, mà còn là một hành trình đưa người đọc lạc vào thế giới của chủ nghĩa hiện thực huyền ảo – nơi những điều kỳ lạ nhất lại mang đầy chân lý nhân sinh. VỀ TÁC GIẢ: Gabriel Garcia Marquez (1927 – 2014) - Nhà văn Colombia, bậc thầy của văn học hiện thực huyền ảo và là một trong những tác giả vĩ đại nhất thế kỷ 20. - Ông giành Giải Nobel Văn học năm 1982, với phong cách viết cuốn hút, đậm chất sử thi và giàu yếu tố kỳ diệu, biến những câu chuyện đời thường thành những tác phẩm bất hủ. - Tác phẩm tiêu biểu: Trăm Năm Cô Đơn, Tình Yêu Thời Thổ Tả, Ngài Đại Tá Chờ Thư, Ký Sự Về Một Cái Chết Được Báo Trước... TÓM TẮT NỘI DUNG SÁCH Trăm Năm Cô Đơn kể về bảy thế hệ của dòng họ Buendía tại làng Macondo – một thế giới kỳ ảo nơi thực và mộng hòa lẫn. José Arcadio Buendía sáng lập Macondo - một con người đam mê khám phá nhưng bị ám ảnh bởi những phát minh kỳ lạ và dần hóa điên. Con trai ông, Đại tá Aureliano Buendía, lao vào cuộc nội chiến vô nghĩa, trong khi dòng họ Buendía tiếp tục chìm trong bi kịch, tình yêu ngang trái và sự lặp lại của số phận. Qua sáu thế hệ, gia tộc này chìm đắm trong những cuộc tình oan trái, những giấc mơ dang dở và sự cô đơn nối tiếp không hồi kết. Cho đến thế hệ cuối cùng, Aureliano Babilonia, khám phá bản thảo tiên tri về gia tộc mình. Khi anh đọc đến những dòng cuối, một cơn cuồng phong quét qua, xóa sổ Macondo vĩnh viễn. Những nhân vật huyền thoại như Úrsula – người phụ nữ kiên cường kéo dài sự sống của gia tộc, Remedios – nàng tiên sắc đẹp vĩnh hằng, hay Aureliano Buendía – vị đại tá bất khả chiến bại nhưng mãi mãi cô độc… tất cả tạo nên một câu chuyện đầy mê hoặc, nơi sự sống và cái chết hòa lẫn trong huyền thoại và hiện thực. Quyển sách mang đến cho độc giả: - Một kiệt tác với phong cách hiện thực huyền ảo độc đáo, mê hoặc mọi thế hệ độc giả. - Một câu chuyện về tình yêu, quyền lực, chiến tranh và định mệnh – phản ánh sâu sắc xã hội Mỹ Latinh. - Những triết lý nhân sinh đầy ám ảnh về sự cô đơn, sự tồn tại và vòng lặp của lịch sử. Tại sao độc giả nên đọc? - Tác phẩm kinh điển – một trong những cuốn sách quan trọng nhất của thế kỷ 20. - Được dịch ra hơn 40 ngôn ngữ, bán hơn 50 triệu bản trên toàn cầu. - Là cuốn sách mà bất cứ ai đam mê văn học cũng nên đọc một lần trong đời. Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Gabriel Garcia Márquez'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Gabriel Garcia Márquez'],
            ]);
        }
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tram-nam-co-don-tai-ban-2026/2.jpg', 'sort_order' => 1,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tram-nam-co-don-tai-ban-2026/3.jpg', 'sort_order' => 2,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tram-nam-co-don-tai-ban-2026/4.jpg', 'sort_order' => 3,
            'created_at' => $now,        ]);
        DB::table('book_images')->insert([
            'book_id' => $bookId, 'image_path' => '/images/vanhoc/bo-tram-nam-co-don-tai-ban-2026/5.jpg', 'sort_order' => 4,
            'created_at' => $now,        ]);

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['NXB Trẻ'],
            'isbn'           => '8934974174240',
            'title'          => 'Và Rồi Chẳng Còn Ai - And Then There Were None (Từ Tựa Cũ: Mười Người Da Đen Nhỏ)',
            'slug'           => 'va-roi-chang-con-ai-and-then-there-were-none-tu-tua-cu-muoi-nguoi-da-den-nho',
            'image'          => '/images/vanhoc/va-roi-chang-con-ai-and-then-there-were-none-tu-tua-cu-muoi-nguoi-da-den-nho/1.jpg',
            'price'          => 110000.0,
            'discount_price' => 94000.0,
            'stock_quantity' => 50,
            'page_count'     => '296',
            'publish_year'   => '2021',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20 x 13 cm',
            'weight'         => '300',
            'cover_type'     => 'Bìa Mềm',
            'description'    => '“Mười…” Mười người bị lừa ra một hòn đảo nằm trơ trọi giữa biển khơi thuộc vịnh Devon, tất cả được bố trí cho ở trong một căn nhà. Tác giả của trò bịp này là một nhân vật bí hiểm có tên “U.N.Owen”. “Chín…” Trong bữa ăn tối, một thông điệp được thu âm sẵn vang lên lần lượt buộc tội từng người đã gây ra những tội ác bí mật. Vào cuối buổi tối hôm đó, một vị khách đã thiệt mạng. “Tám…” Bị kẹt lại giữa muôn trùng khơi vì giông bão cùng nỗi ám ảnh về một bài vè đếm ngược, từng người, từng người một… những vị khách trên đảo bắt đầu bỏ mạng. “Bảy…” Ai trong số mười người trên đảo là kẻ giết người, và liệu ai trong số họ có thể sống sót? “Một trong những tác phẩm gây tò mò hay nhất, xuất sắc nhất của Christie.” – Tạp chí Observer “Kiệt tác của Agatha Christie.” – Tạp chí Spectator Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Agatha Christie'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Agatha Christie'],
            ]);
        }

        $bookId = DB::table('books')->insertGetId([
            'category_id'    => $categoryId,
            'publisher_id'   => $publishers['Văn Học'],
            'isbn'           => '8935235241855',
            'title'          => 'Xứ Tuyết',
            'slug'           => 'xu-tuyet',
            'image'          => '/images/vanhoc/xu-tuyet/1.jpg',
            'price'          => 112000.0,
            'discount_price' => 90000.0,
            'stock_quantity' => 50,
            'page_count'     => '186',
            'publish_year'   => '2024',
            'language'       => 'Tieng Viet',
            'dimensions'     => '20.5 x 14 x 0.9 cm',
            'weight'         => '300',
            'cover_type'     => 'Bìa Mềm',
            'description'    => 'Xứ Tuyết “Xứ tuyết”, một trong những tác phẩm quan trọng trong sự nghiệp sáng tác của nhà văn Nhật Bản Kawabata Yasunari, sẽ sớm ra mắt độc giả trong thời gian tới. Năm 1968, nhà văn Kawabata Yasunari được trao giải Nobel Văn chương, trở thành người Nhật đầu tiên nhận vinh dự này. Trong tuyên bố trao giải Nobel, “Xứ tuyết” cùng “Rập rờn cánh hạc” và “Cố đô” là ba tác phẩm được Ủy ban Nobel Văn chương nhắc đến như căn cứ để xem xét sự nghiệp của Kawabata Yasunari. “Xứ tuyết” được chuyển ngữ bởi dịch giả Uyên Thiểm, người đã chuyển ngữ nhiều tác phẩm sang tiếng Việt như: Tiếng núi, Người đẹp say ngủ, Hồ (Kawabata Yasunari), Bí mật của Naoko (Higashino Keigo), Kitchen (Banana Yoshimoto), Giáo sư và công thức toán (Yoko Ogawa), Sa môn Không Hải (Yumemakura Baku) và Tazaki Tsukuru không màu và những năm tháng hành hương (Haruki Murakami). “Cảnh đêm uy nghi như thể âm thanh của cả một vùng tuyết đang đông cứng rền lên từ đáy sâu lòng đất. Không có trăng. Khi anh ngước nhìn lên, những vì sao nhiều đến không tưởng hiện ra rõ mồn một tới nỗi ngỡ như chúng đang rơi xuống với tốc độ của hư vô. Những vì sao càng tiến đến gần mắt, bầu trời càng chìm sâu hơn vào màu đêm ở xa. Những ngọn núi của vùng ranh giới đã trộn lẫn vào nhau, không còn phân biệt được nữa, nhưng đổi lại chúng mang một màu đen như hun và dày dặn, thả một đối trọng dưới chân trời sao. Tất cả là một sự hài hòa trong vắt và tĩnh lặng. [...] Nhưng mặc cho màu núi đen, chẳng hiểu sao anh lại nhìn ra rõ ràng một màu tuyết trắng. Thế rồi anh dần có cảm giác như thể những ngọn núi là thứ gì đó trong suốt, buồn bã. Trời và núi chẳng hề hài hòa với nhau.” Xem thêm',
            'status'         => 'active',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
        if (isset($authors['Kawabata Yasunari'])) {
            DB::table('book_authors')->insertOrIgnore([
                'book_id' => $bookId, 'author_id' => $authors['Kawabata Yasunari'],
            ]);
        }

    }
}