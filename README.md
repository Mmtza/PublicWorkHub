# Portal Berita

<strong>Portal Berita</strong> adalah sebuah platform digital yang dirancang untuk menyediakan akses cepat dan mudah ke berbagai informasi berita terkini dari berbagai sumber dan topik. Aplikasi ini biasanya dikembangkan untuk memenuhi kebutuhan konsumen dalam mengakses berita terbaru, terlepas dari perangkat yang mereka gunakan, seperti smartphone, tablet, atau komputer. Website ini juga merupakan sebuah projek akhir dari Program Kampus Merdeka MSIB-5.

## Our Team
- Bagus Muhammad Mumtaza as Project Manager. Github: [Mmtza](https://github.com/Mmtza)
- Febi Febiyanti as Report Writer 
- Erick Darmawan Boeniarto as Frontend Developer. Github: [erickdb](https://github.com/erickdb)
- Muhammad Anwar Fauzan as Backend Developer. Github: [Anuraaaa](https://github.com/Anuraaaa)
- Ahmad Riziq as Database Analyst. Github: [ahmadriziq03](https://github.com/ahmadriziq03)

## MVP (Minimum Variable Product)
### Portal Berita dan Informasi Kemasyarakatan Interaktif
- Landing Page
- Single Page Berita
- Login
- Register
- Responsif Desktop & Mobile
- Dashboard Penulis:
    - Main Dashboard
    - Management Berita (CRUD only penulis)
- Dashboard Admin:
	- Main Dashboard
	- Management Berita (CRUD all berita)
	- Management User (CRUD all user)
- User login redirect to landing
- Penulis login redirect to dashboard
- Admin login redirect to dashboard

### Extra Feature:
- Search Berita
- Komentar (Include jumlah)
- Like (Include jumlah)
- Kategori
- Jumlah Pengunjung
- Share Berita
- Artikel Populer (Base on Jumlah Pengunjung + Jumlah Komentar + Jumlah Like)

### User: 
- User is Logged in
- Penulis
- Admin

## Software and Tools
### Bahasa Pemrograman
- PHP

### Database
- MySQL

### Framework and Library
- Laravel
- Bootstrap
- Breeze

### Package Manager
- Composer

## How to Install the package?

### If you Local
- Have a composer
- Run command compose update or composer install to get the package from composer
- Have a database named in .env file
- Run php artisan migrate
- Run php artisan serve to running a laravel