# Penjelasan Kriteria Penilaian

## Bagian 1: Pemrograman Client-side (Bobot: 30%)

### 1. Manipulasi DOM dengan JavaScript (15%)
Pada bagian ini, saya membuat form input dengan minimal empat elemen, yaitu:
- Input teks untuk nama
- Input email
- Radio button untuk jenis kelamin
- Checkbox untuk hobi

Data dari form ini kemudian ditampilkan dalam tabel HTML menggunakan manipulasi DOM dengan JavaScript. Setiap data yang dimasukkan pengguna akan diolah dan langsung ditampilkan pada tabel tanpa perlu memuat ulang halaman.

### 2. Event Handling (15%)
Saya menggunakan JavaScript untuk menangani tiga jenis event, yaitu:
- Event `submit` untuk validasi data form sebelum dikirim ke server.
- Event `change` untuk memperbarui data di tabel ketika ada perubahan pada input form.
- Event `click` pada tombol untuk melakukan tindakan tambahan, seperti membersihkan form atau menghapus data dari tabel.

Validasi input dilakukan untuk memastikan semua data terisi dengan benar sebelum diteruskan ke server.

---

## Bagian 2: Pemrograman Server-side (Bobot: 30%)

### 1. Manajemen Data dengan PHP (20%)
Pada bagian ini, saya menggunakan metode `POST` untuk mengirimkan data dari form ke server. Data yang diterima kemudian diproses dengan:
- Validasi server-side untuk memastikan data sesuai format yang diharapkan.
- Menyimpan data ke database, termasuk informasi tambahan seperti tipe browser dan alamat IP pengguna.

### 2. PHP Berbasis OOP (10%)
Saya membuat kelas PHP berbasis OOP dengan dua metode utama:
- **Method untuk menyimpan data ke database.**
- **Method untuk mengambil data dari database.**

Kelas ini digunakan untuk memisahkan logika bisnis dari logika presentasi, sehingga kode lebih modular dan mudah dipelihara.

---

## Bagian 3: Manajemen Basis Data (Bobot: 20%)

### 1. Pembuatan Tabel Database (5%)
Saya mendesain tabel database dengan struktur yang mendukung data yang diperlukan, seperti nama, email, jenis kelamin, hobi, tipe browser, dan alamat IP pengguna.

### 2. Konfigurasi Koneksi Database (5%)
Koneksi ke database dikonfigurasi menggunakan file `db.php` untuk menyimpan detail koneksi, seperti hostname, username, password, dan nama database. File ini diimpor di setiap file PHP yang membutuhkan akses ke database.

### 3. Manipulasi Data di Database (10%)
Fungsi untuk menambah, mengubah, dan menghapus data diimplementasikan menggunakan query SQL, seperti:
- `INSERT` untuk menambahkan data baru.
- `UPDATE` untuk memperbarui data yang ada.
- `DELETE` untuk menghapus data tertentu.

---

## Bagian 4: Manajemen State (Bobot: 20%)

### 1. Manajemen Session (10%)
Saya menggunakan fungsi `session_start()` untuk menginisialisasi sesi di PHP. Informasi pengguna, seperti nama dan email, disimpan dalam variabel sesi untuk menjaga state pengguna selama sesi berlangsung.

### 2. Manajemen State dengan Cookies dan Browser Storage (10%)
- **Cookies:** Saya membuat fungsi untuk membuat, mengambil, dan menghapus cookies, yang digunakan untuk menyimpan data pengguna secara sementara.
- **Browser Storage:** Saya menggunakan local storage untuk menyimpan data yang tidak sensitif secara lokal di browser pengguna.

---

## Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)

### 1. Langkah Hosting (5%)
Saya meng-host aplikasi web ini dengan mengikuti langkah-langkah berikut:
1. Menyiapkan server lokal untuk pengembangan.
2. Membuat akun pada penyedia hosting.
3. Mengunggah file aplikasi ke server menggunakan FTP.
4. Mengkonfigurasi domain dan database pada hosting.

### 2. Memilih Provider Hosting (5%)
Saya memilih penyedia hosting yang menawarkan:
- Harga terjangkau.
- Dukungan PHP dan MySQL.
- Dokumentasi dan dukungan teknis yang baik.

### 3. Keamanan Aplikasi (5%)
Saya memastikan keamanan aplikasi dengan:
- Menggunakan HTTPS untuk komunikasi data.
- Membersihkan input pengguna untuk mencegah SQL Injection.
- Mengimplementasikan validasi server-side.

### 4. Konfigurasi Server (5%)
Konfigurasi server mencakup:
- Pengaturan file `.htaccess` untuk mengatur URL rewriting.
- Membatasi izin file dan folder untuk keamanan.
- Menyesuaikan konfigurasi PHP, seperti ukuran upload file maksimal.

---

Dokumentasi ini dibuat untuk menjelaskan setiap langkah dan bagian dari aplikasi web yang telah dikembangkan, sesuai dengan kriteria penilaian UAS Pemrograman Web 2024/2025.
