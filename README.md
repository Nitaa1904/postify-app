# Postify

Postify adalah sebuah aplikasi berbasis Laravel 9 yang berfungsi sebagai platform blog sederhana. Pengguna dapat membuat postingan, memberikan komentar, serta mendapatkan notifikasi melalui email dan Telegram. Aplikasi ini dibangun dengan konsep MVC menggunakan Laravel.

## ✨ Fitur Utama

✅ **CRUD** (Create, Read, Update, Delete) untuk postingan dan komentar  
✅ **Validasi input** pada form  
✅ **Relasi database** antara postingan dan komentar  
✅ **Otentikasi pengguna** (Login, Register, Logout)  
✅ **Notifikasi email** menggunakan Mailtrap  
✅ **Notifikasi Telegram** menggunakan bot API  
✅ **Templating dengan Blade dan Bootstrap**  
✅ **Soft Deletes** untuk penghapusan data sementara

---

## 📥 Instalasi

### 1️⃣ Clone Repository

```bash
git clone https://github.com/username/postify.git
cd postify
```

### 2️⃣ Install Dependencies

```bash
composer install
```

### 3️⃣ Konfigurasi Environment

Buat file `.env` berdasarkan `.env.example`:

```bash
cp .env.example .env
```

Lalu, atur konfigurasi database di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=postify
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Generate App Key

```bash
php artisan key:generate
```

### 5️⃣ Migrasi dan Seed Database

```bash
php artisan migrate --seed
```

### 6️⃣ Jalankan Server

```bash
php artisan serve
```

Akses aplikasi di **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 📂 Struktur Folder

```plaintext
app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
├── Models/
config/
database/
resources/
├── views/
routes/
├── web.php
```

---

## 📌 API Routes

| Method | URI                | Action  | Description            |
| ------ | ------------------ | ------- | ---------------------- |
| GET    | `/posts`           | index   | Menampilkan semua post |
| GET    | `/posts/create`    | create  | Form tambah post       |
| POST   | `/posts`           | store   | Simpan post baru       |
| GET    | `/posts/{id}`      | show    | Lihat detail post      |
| GET    | `/posts/{id}/edit` | edit    | Form edit post         |
| PUT    | `/posts/{id}`      | update  | Perbarui post          |
| DELETE | `/posts/{id}`      | destroy | Hapus post             |

---

## 📩 Notifikasi Email

Gunakan **Mailtrap** untuk mengatur pengiriman email. Tambahkan konfigurasi berikut ke dalam `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=noreply@postify.com
MAIL_FROM_NAME="Postify"
```

---

## 📢 Notifikasi Telegram

1. Buat bot di **BotFather** dan dapatkan **API Token**.
2. Tambahkan bot ke grup Telegram dan dapatkan **chat_id**.
3. Tambahkan konfigurasi berikut di `.env`:

```env
TELEGRAM_BOT_TOKEN=your_bot_token
TELEGRAM_CHAT_ID=your_chat_id
```

---

## 🔐 Otentikasi Pengguna

-   **Register:** `/register`
-   **Login:** `/login`
-   **Logout:** `/logout`

---

## 📜 Lisensi

Proyek ini dirilis di bawah **Lisensi MIT**. Silakan gunakan dan kontribusikan sesuai kebutuhan.

🚀 Dibuat dengan ❤️ oleh **Tim Postify**
