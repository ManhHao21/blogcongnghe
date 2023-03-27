# Cài đặt code về máy cá nhân
### B1: clone code trên git
### b2: mở terminal, cd vào thư mục
chạy: valet link csdlhdnd(tên miền)
mở notepad run adm thay (thêm) tên mền trong host
### b3: tạo database (tạo trùng tên vs tên miền)
### b4: copy file env.examble thành 1 file env
chỉnh sửa localhost và db và password db
### b5: chạy lệnh composer install trong terminal
### b6: sau đó chạy
php artisan key:generate
php artisan migrate:fresh --seed