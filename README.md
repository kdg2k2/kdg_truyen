# Web đọc truyện kdg_truyen

# Chức năng
    - Đăng nhập, đăng kí, đăng xuất
    - Quên mật khẩu
    - Quản lý tác giả
    - Quản lý thể loại
    - Quản lý truyện
    - Quản lý người dùng
    - Phân quyền
    - Phân trang
    - Lịch sử đọc
    - Theo dõi
    - Thông báo (thông báo về truyện đang theo dõi)
    - Đánh giá
    - Chia sẻ
    - Bình luận
    - Báo lỗi
    - Tìm kiếm (theo tên truyện)
    - Lọc (theo thể loại, sắp xếp theo update, new...)
    - Cấp api cho android app: https://github.com/kdg2k2/KdgTruyen_android.git

# Cài đặt
1. cài đặt xampp (https://www.mediafire.com/file/uv6xjogttswth11/xampp-windows-x64-7.4.29-1-VC15-installer.exe/file)
2. cài đặt composer (https://www.mediafire.com/file/bpgh8me7psazarq/Composer-Setup.exe/file)
3. clone project: https://github.com/kdg2k2/kdg_truyen
4. mở xampp khởi động apache + mysql rồi truy cập vào phpadmin tạo 1 db tên kdgtruyen kiểu utf8mb4_unicode_ci 
5. Import db trong kdgtruyen/database/kdgtruyen.sql vào phpadmin
5. mở cmd và cd vào kdgtruyen rồi chạy tuần tự từng lệnh:


    php artisan config:cache


    php artisan cache:clear 


    php artisan route:clear 


    php artisan view:clear


# Sử dụng
Khởi chạy server với: php artisan serve