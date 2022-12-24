# Dokumentasi Project (cara install/cara setup/endpoin/screenshot)
UAS Manajemen Basis Data dan Praktikum Manajemen Basis Data - Kelompok 5 - Teknik Informatika B
# Anggota Kelompok 5

1. Diani Eka Putri (1207050027)
2. Fikri Taufiqurrahman (1207050039)
3. Firhan Abdurrahman Gani (1207050040)

Penjelasan Aplikasi : Aplikasi CRUD dengan Microsoft SQL Server dan PHP

# Cara nstal Microsoft SQL Server PDO Driver (PDO_SQLSRV) untuk PHP (Windows)
Driver Microsoft SQL Server untuk PHP memungkinkan Anda untuk mengintegrasikan dan terhubung dengan server SQL dalam aplikasi PHP. Dalam tutorial ini, kami akan menunjukkan cara menginstal dan mengaktifkan Driver MS SQL Server untuk PDO di PHP.
1. Download driver pada situs berikut https://learn.microsoft.com/en-us/sql/connect/php/download-drivers-php-sql-server?view=sql-server-ver16
![image](https://user-images.githubusercontent.com/75468041/209425986-129bc2fa-dd7a-4f95-9f98-a503f3b3a0c2.png)
2. Extract file yang telah di download dan pilih versi driver yang benar untuk server PHP Anda.
* (Anda dapat menjalankan phpinfo() dalam skrip PHP untuk memeriksa versi PHP dan arsitektur server Anda.) Misalnya, php_pdo_sqlsrv_74_ts_x64.dll adalah driver 64-bit PDO_SQLSRV untuk thread-safe (ts) PHP 7.4.
3. Salin file pustaka ke direktori ekstensi PHP Anda (php/ext/).
4. Edit file konfigurasi server PHP Anda (php.ini) dan tambahkan baris berikut untuk mengaktifkan ekstensi pdo_sqlsrv.
![image](https://user-images.githubusercontent.com/75468041/209425905-5338ec40-f278-41ad-85c5-5b3f6681ddc8.png)
5. Mulai ulang server PHP dan jalankan kode berikut untuk memeriksa apakah ekstensi PDO_SQLSRV diinstal di server.
![image](https://user-images.githubusercontent.com/75468041/209425885-b50c56e4-b364-4cd6-bfe1-59290df8273f.png)
6. Jika ekstensi pdo_sqlsrv berhasil diinstal dan diaktifkan, Anda akan melihat bagian berikut di layar info PHP Anda.
![image](https://user-images.githubusercontent.com/75468041/209425853-f989178f-4231-44a2-8d1c-d49e45596226.png)
