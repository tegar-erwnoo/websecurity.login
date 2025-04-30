|Nama|NIM|Kelas|Matkul|
|----|---|-----|------|
|Muhamad Tegar Hermawanto|312310404|TI.23.A4|Pemograman Web 2|

6.1 Persiapan Awal
Instalasi XAMPP → supaya punya server lokal (Apache + MySQL).
Aktifkan Apache dan MySQL di XAMPP Control Panel.
 ![image](https://github.com/user-attachments/assets/636d9117-bf53-48f8-b57d-4186572cf314)

6.2 Membuat Database dan Tabel (MySQL)
	Buka localhost/phpMyAdmin
 ![image](https://github.com/user-attachments/assets/0e8c7a32-1009-499c-b30d-cea7499502e4)

	Buat database baru : login_db
![image](https://github.com/user-attachments/assets/2a5c70f1-884a-4607-8bd4-92fe5d5e1da2)

	Buat tabel users
![image](https://github.com/user-attachments/assets/311532a5-e061-419a-b135-574815d7e166)

6.3 Membuat Form Login dan Register (HTML)
	Buat halaman HTML sederhana untuk form login dan register
 ![image](https://github.com/user-attachments/assets/b3b7d654-5941-430e-8d07-270b612f416b)
![image](https://github.com/user-attachments/assets/f2510fbb-5a90-4bab-bc16-0d20b262da3f)

	Di dalam form, gunakan method POST.
 ![image](https://github.com/user-attachments/assets/1d8e03fd-ca49-4bc2-b3b1-7937a0e3843e)
![image](https://github.com/user-attachments/assets/0158aac9-c925-4e5d-962b-b882dd7a4472)

	Form akan mengirimkan data ke file PHP untuk diproses.
 ![image](https://github.com/user-attachments/assets/8688f635-f34a-4707-ac04-7570d7f1dd69)

6.4 Membuat Koneksi ke Database (PHP)
	Buat file database.php.
 ![image](https://github.com/user-attachments/assets/3e2de4d8-6980-415f-b53a-2604b9eb07fa)

	Gunakan mysqli_connect() untuk menyambungkan PHP dengan MySQL.
 ![image](https://github.com/user-attachments/assets/bbd90d5f-883f-4af7-aaea-8a17d597acb3)

6.5 Membuat Proses Register (PHP)
	Ambil data dari form register.
 ![image](https://github.com/user-attachments/assets/7029c52d-a4a1-4de9-93c1-e344269aaaea)

name="username" → nanti di PHP diambil lewat $_POST['username']
name="password" → nanti di PHP diambil lewat $_POST['password']

 ![image](https://github.com/user-attachments/assets/df405acf-d971-43a4-ae34-1b817d1de43b)

$_POST['username'] = ambil isi inputan username
$_POST['password'] = ambil isi inputan password

	Hash password dengan password_hash().
 ![image](https://github.com/user-attachments/assets/e0a81a6c-493c-4009-b684-fc23a7aa9113)

Penjelasan:
	"INSERT INTO users (username, password) VALUES (?, ?)" → Query SQL untuk memasukkan data ke tabel users.
	bind_param("ss", $username, $hashedPassword) → Masukkan 2 string (s = string).
	execute() → Jalankan query.

	Simpan data ke tabel users di database.
 ![image](https://github.com/user-attachments/assets/71040616-4451-4585-b185-674a017c1d8a)

Penjelasan:
	1. Masukkan data ke kolom username dan password di tabel users.
	2. Tanda ? itu akan diisi nanti.
 ![image](https://github.com/user-attachments/assets/fd26c552-d083-490f-8a2b-6381f3c458a9)

Penjelasan:
	1. "ss" = tipe data String dan String.
	2. Pertama ? diisi $username.
	3. Kedua ? diisi $hashedPassword.
 ![image](https://github.com/user-attachments/assets/f035f2bc-517f-4e39-a176-dd0099ffc9db)

Kalau berhasil, data akan masuk ke tabel users.

6.6 Membuat Proses Login (PHP)
Ambil username dan password dari form login.
 ![image](https://github.com/user-attachments/assets/24db5bcc-6e37-41e9-8154-df45fb9a0594)
 
Di form login HTML, user akan mengisi username dan password.
 ![image](https://github.com/user-attachments/assets/7b2d3514-f511-40a0-9aeb-4bf3f67c9cb4)

Ini mengambil data input user lewat $_POST.

	Cek apakah username ada di database.
![image](https://github.com/user-attachments/assets/63faa2e0-7518-4b68-8d8f-23697bb388a8)
![image](https://github.com/user-attachments/assets/5a4621e5-96c5-4431-87a3-3220b11ded8d)

 
Kalau user ada → lanjut cek password. Kalau user tidak ada → tampilkan pesan error
Verifikasi password dengan password_verify().
![image](https://github.com/user-attachments/assets/3083c3f9-d675-4026-8246-28b1e3e2a060)
 
Ini memastikan input password user cocok dengan password hash di database.. 
Jika cocok, buat session login.
Kalau password benar, buatkan session supaya user tetap login.
![image](https://github.com/user-attachments/assets/d8991996-4d6a-4b45-b878-0b60fc78abb6)
 
Ini menyimpan username ke dalam session PHP dan redirect ke halaman Welcome.

6.7 Membuat Halaman Welcome dan Logout
	Setelah login, redirect ke halaman welcome.php.
Setelah user berhasil login (di file login.php), kita arahkan user ke halaman welcome.php. Ini adalah kode di login.php (bagian setelah password cocok):
![image](https://github.com/user-attachments/assets/9c5a4673-41f9-4f82-9aa9-712577095052)

Jadi user yang berhasil login langsung masuk ke halaman welcome.php.
Membuat File welcome.php
 ![image](https://github.com/user-attachments/assets/7d7ead19-0d63-47ff-836c-6bd2772e12bb)

Penjelasan:
1. session_start(); → Untuk membaca session.
2. if (!isset($_SESSION['username'])) → Kalau user belum login, langsung redirect ke login.html.
3. Tampilkan username yang sudah login.

	Buat file logout.php untuk menghancurkan session.

 ![image](https://github.com/user-attachments/assets/4b6bc413-2de9-4432-aae5-d7f0d8bf7074)

Setelah klik "Logout", user akan diarahkan balik ke form login.

6.8 Hasil Akhir: Tampilan Sistem Login
Pada tahap ini, sistem login sederhana telah selesai dibuat menggunakan HTML + PHP + MySQL. Fitur-fitur yang sudah berfungsi:
	Form Login untuk masuk ke akun
 ![image](https://github.com/user-attachments/assets/4a0d5e5f-1441-432f-ad8e-a58b5c3c052b)

	Form Register untuk membuat akun baru
 ![image](https://github.com/user-attachments/assets/7652aa1c-5f31-49fe-b409-fdaad44aec10)

	Form welcome untuk halaman web
 ![image](https://github.com/user-attachments/assets/b02d06ae-5921-4caf-9ef6-d1f4d08870b2)

	Logout untuk keluar dari sistem.
 ![image](https://github.com/user-attachments/assets/0e5ddd32-ba60-4aa2-98a5-a7fac0c4ac51)
