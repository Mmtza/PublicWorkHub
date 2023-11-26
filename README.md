# Public Work Hub: Situs Berita, Pengaduan, dan Lowongan Kerja untuk Masyarakat

<strong>Public Work Hub</strong> adalah sebuah platform digital yang dirancang untuk menyediakan akses cepat dan mudah ke berbagai informasi berita, lowongan pekerjaan, pengaduan masyarakat. Aplikasi ini biasanya dikembangkan untuk memenuhi kebutuhan konsumen dalam mengakses berita terbaru, mencari lowongan pekerjaan, dan pengaduan masyarakat terlepas dari perangkat yang mereka gunakan, seperti smartphone, tablet, atau komputer. Website ini juga merupakan sebuah projek akhir dari Program Kampus Merdeka MSIB-5.

## Our Team
- Bagus Muhammad Mumtaza as Project Manager. Github: [Mmtza](https://github.com/Mmtza)
- Erick Darmawan Boeniarto as Frontend Developer. Github: [erickdb](https://github.com/erickdb)
- Muhammad Anwar Fauzan as Backend Developer. Github: [Anuraaaa](https://github.com/Anuraaaa)
- Febi Febiyanti as Report Writer 
- Ahmad Riziq as Database Analyst.

## MVP (Minimum Variable Product)
### Public Work Hub: Situs Berita, Pengaduan, dan Lowongan Kerja untuk Masyarakat
- Landing Page
- Single Page Berita
- Login
- Register
- Responsif Desktop & Mobile
- Dashboard User:
	- Main Dashboard
	- Form Pengaduan Masyarakat
- Dashboard Penyedia Loker:
	- Main Dashboard
	- Form Penyedia Loker
- Dashboard Penulis:
    - Main Dashboard
    - Management Berita (CRUD only penulis)
- Dashboard Admin:
	- Main Dashboard
	- Management Berita (CRUD all berita)
	- Management User (CRUD all user)
	- Management loker (CRUD all loker)
	- Management pengaduan (CRUD all pengaduan)
- User login redirect to landing
- User login can access dashboard
- Penulis login redirect to dashboard
- Penyedia loker redirect to dashboard
- Admin login redirect to dashboard

### Extra Feature:
- Search Berita
- Komentar (Include jumlah)
- Like (Include jumlah)
- Kategori
- Jumlah Pengunjung
- Share Berita
- Artikel Populer (Base on Jumlah Pengunjung + Jumlah Komentar + Jumlah Like)
- Chatbox, chat from applyer loker to penyedia loker. chat from penyedia loker to applyer loker

### User: 
- User
> Name: user
> Email: user@gmail.com
> Password: user12345
- Penulis
> Name: penulis
> Email: penulis@gmail.com
> Password: penulis12345
- Penyedia Loker
> Name: penyedialoker
> Email: penyedialoker@gmail.com
> Password: penyedialoker12345
- Admin
> Name: admin
> Email: admin@gmail.com
> Password: admin12345

## Software and Tools
### Bahasa Pemrograman
- PHP
- Javascript

### Database
- MySQL

### Framework and Library
- Laravel
- Bootstrap
- Breeze
- DataTables
- JQuery
- QuillJS

### Package Manager
- Composer

## How to Install the package?

### If you Local
- Have a composer
- Run command composer update or composer install to get the package from composer
- Run command npm install to get the package from packege.json
- Copy .env.example to .env
- Have a database named in .env file
- Run php artisan migrate
- Run php artisan db:seed to seeding data
- php artisan sweetalert:publish to publish sweet alert to frontend 
- Run php artisan serve to running a laravel
- Run npm run dev to running js script
