# Dokumentasi Project (cara install/cara setup/endpoin/screenshot)
UAS Manajemen Basis Data dan Praktikum Manajemen Basis Data - Kelompok 5 - Teknik Informatika B
# Anggota Kelompok 5

1. Diani Eka Putri (1207050027)
2. Fikri Taufiqurrahman (1207050039)
3. Firhan Abdurrahman Gani (1207050040)

Penjelasan Aplikasi : Aplikasi CRUD dengan Microsoft SQL Server dan PHP

# Cara install Microsoft SQL Server PDO Driver (PDO_SQLSRV) untuk PHP (Windows)
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
# Cara Setup Microsoft SQL Server
# 1. Buat Tabel Basis Data
![WhatsApp Image 2022-12-24 at 06 28 40](https://user-images.githubusercontent.com/75468041/209426436-54b4c941-ff83-41c6-93fb-2dfa5b402d92.jpeg)
# 2. Konfigurasi dan Koneksi SQL Server (dbConfig.php)

File dbConfig.php tersebut digunakan untuk menentukan kredensial server SQL dan membuat koneksi dengan server MS SQL menggunakan kelas PDO.
* $serverName– Nama server SQL
* $dbUsername– Nama pengguna basis data
* $dbPassword– Kata sandi pengguna basis data
* $dbName– Nama basis data
![WhatsApp Image 2022-12-24 at 06 32 25](https://user-images.githubusercontent.com/75468041/209426472-07bbe8d1-018f-4ab1-bc7e-ccf57fa9b3a1.jpeg)
# 3. Operasi CRUD dengan SQL Server (userAction.php)
File userAction.php melakukan operasi CRUD menggunakan PHP dan server database SQL. Blok kode dijalankan berdasarkan tindakan yang diminta.
![WhatsApp Image 2022-12-24 at 06 32 56](https://user-images.githubusercontent.com/75468041/209426645-beaf7803-d60d-4cfc-b5d3-45a85300ec2a.jpeg)
# Add/Edit Record:
Ketika formulir add/edit dikirim dan parameter userSubmit ada di metode $_POST, pointer dimasukkan ke dalam blok kode ini.
* Ambil nilai dari kolom input menggunakan metode PHP $_POST .
* Validasi input data dengan PHP.
* Jika yang ada MemberID disediakan, perbarui data di server SQL menggunakan metode prepare() dan execute() dari kelas PDO. Jika tidak, masukkan data ke server SQL menggunakan metode PDO class.
# Hapus Catatan:
Jika penghapusan diminta dalam action_type, hapus data dari server SQL berdasarkan id yang diteruskan dalam string kueri.
* Setelah manipulasi data di server MSSQL, status disimpan di SESSION dengan PHP dan dialihkan kembali ke halaman masing-masing.

# Read & Delete Records (index.php)
Dalam file index.php, records diambil dari server SQL menggunakan PHP dan dicantumkan dalam format tabel dengan opsi Tambah, Edit, dan Hapus.
* Ambil semua record dari tabel Anggota menggunakan metode prepare(), execute(), dan fetchAll() dari PDO class.
* List data dalam tabel HTML menggunakan PHP.
* Link Add redirects ke addEdit.php, halaman untuk melakukan operasi Create.
* Link Edit redirects ke addEdit.php, halaman untuk melakukan operasi Update.
* Link Delete redirects ke userAction.php, file dengan action_type=delete dan idparams. Dalam userAction.php file, catatan dihapus dari server SQL berdasarkan pengidentifikasi unik ( MemberID).
![WhatsApp Image 2022-12-24 at 06 28 05](https://user-images.githubusercontent.com/75468041/209426695-3ab8e719-102f-4b1d-96b5-40f94e22ffae.jpeg)
# Create & Update Records (addEdit.php)
addEdit.php berfungsi untuk Create dan Update pada form.
* Awalnya, form HTML ditampilkan untuk memungkinkan input informasi anggota.
* Jika parameter id ada di URL, data anggota yang ada akan diambil dari database MS SQL berdasarkan MemberID ini dan form akan diisi sebelumnya (menggunakan metode prepare() , execute() , dan fetch() dari PDO class).
* Setelah pengiriman form, data pada form akan diposting ke file userAction.php untuk insert/update records di server SQL.
![WhatsApp Image 2022-12-24 at 06 32 40](https://user-images.githubusercontent.com/75468041/209426855-1284480a-03dd-4a66-98f8-09cd0992f239.jpeg)

# Cara menjalankan Aplikasi
* Buka aplikasi XAMPP Control Panel
* Lalu start Action pada modul Apache
* Setelah itu, Buka browser yang terinstall
* Terakhir, Masuk ke halaman http://localhost/<nama folder aplikasi dalam htdocs>. misalnya: http://localhost/crud_sqlserver

# Tampilan Aplikasi
1. Tampilan Awal (Read)
![WhatsApp Image 2022-12-23 at 23 06 37](https://user-images.githubusercontent.com/75468041/209427785-38b4bbdf-a45d-4e40-96d6-486052cde616.jpeg)
2. Tambah Data (Create)
![WhatsApp Image 2022-12-23 at 23 06 49](https://user-images.githubusercontent.com/75468041/209427178-dc3ea61f-fdee-465a-b7c7-db3ebbeaf1dd.jpeg)
![WhatsApp Image 2022-12-24 at 06 27 13](https://user-images.githubusercontent.com/75468041/209427806-244a04cc-80e8-4d38-9edb-9b1155619885.jpeg)
3. Edit Data (Update)
![WhatsApp Image 2022-12-24 at 06 35 28](https://user-images.githubusercontent.com/75468041/209427247-93bf6834-d626-420f-8288-5a9cdea6dfeb.jpeg)
4. Hapus Data (Delete)
![WhatsApp Image 2022-12-23 at 23 06 37](https://user-images.githubusercontent.com/75468041/209427786-49af9362-a3e3-4287-a4bf-0a5db040bb76.jpeg)
