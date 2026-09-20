# Script export database để import lên Railway
# Chạy lệnh này trong PowerShell tại thư mục D:\PhuongLe_Bookstore

mysqldump -h 127.0.0.1 -u root -p88888888 bookshop_db > bookshop_backup.sql

Write-Host "✅ Export xong! File: bookshop_backup.sql"
Write-Host "Giờ dùng MySQL Workbench kết nối Railway và import file này."
