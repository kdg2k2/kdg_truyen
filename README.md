# kdg_truyen

# Chức năng
    - Quản lý truyện
    

# Cài đặt
1. cài đặt xampp (https://www.mediafire.com/file/uv6xjogttswth11/xampp-windows-x64-7.4.29-1-VC15-installer.exe/file)
2. cài đặt composer (https://www.mediafire.com/file/bpgh8me7psazarq/Composer-Setup.exe/file)
3. clone project: https://github.com/kdg2k2/kdg_truyen
4. mở xampp khởi động apache + mysql (tạo 1 db tên: kdg_truyen kiểu utf8mb4_unicode_ci rồi import file trong folder_project/database/kdgtruyen.sql vào mysql)
5. mở cmd và cd vào folder_project rồi chạy tuần tự từng lệnh:


    php artisan config:cache


    php artisan cache:clear 


    php artisan route:clear 


    php artisan view:clear


    php artisan migration


# Sử dụng
Khởi chạy server với: php artisan serve