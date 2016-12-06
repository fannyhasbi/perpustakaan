# Perpustakaan
Aplikasi ini adalah aplikasi berbasis web yang dibuat dengan bahasa HTML, CSS, PHP, MySQL dan menggunakan framework [Bootstrap](http://getbootstrap.com/ "Get Bootstrap"). Aplikasi Perpustakaan ini dibuat untuk mempermudah pencatatan peminjaman buku, sehingga mengurangi kemungkinan kesalahan rekap data.

## Goal
* Mempermudah pencatatan peminjaman buku
* Menampilkan koleksi buku di perpustakaan

## Pages
Terdapat 3 halaman utama, yaitu:
* anggota.php
* buku.php
* pinjam.php

### anggota.php
Menampilkan semua anggota perpustakaan yang sudah terdaftar dan yang nantinya menjadi syarat utama untuk bisa meminjam buku. Semua data di halaman ini adalah user atau pengunjung yang sudah mendaftarkan diri menjadi anggota dan mempunyai akun masing-masing untuk login.

### buku.php
Menampilkan semua buku yang terdapat di perpustakaan saat ini.
Di halaman ini, anggota bisa melihat sinopsis setiap buku yang ada. Anggota juga bisa langsung melakukan peminjaman buku pada halaman ini.

### pinjam.php
Terdapat 2 tabel data, yaitu:
* Buku yang belum dikembalikan
* Buku yang sudah dikembalikan

## Admin
Admin diberikan beberapa hak khusus yang tidak bisa dilakukan oleh user biasa, yaitu

### Menonaktifkan User
User yang dinonaktifkan tidak akan bisa login dan meminjam buku. Admin juga bisa mengaktifkan user di halaman yang sama, yaitu `./admin/anggota.php`

### Menambah Buku
Menambahkan buku kemudian membuat halaman sinposis buku yang baru didaftarkan ke `./buku/` dan bisa dilihat oleh semua pengunjung.

### Menghapus buku
Menghapus dan mengurangi jumlah buku bisa dilakukan di halaman `./admin/hapus_buku.php`

> Aplikasi ini masih belum menggunakan Object Oriented Programming (OOP) sepenuhnya
> sehingga masih belum efektif dalam menggunakan beberapa fungsi.
