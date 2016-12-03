# Perpustakaan
Aplikasi ini adalah aplikasi berbasis web yang dibuat dengan bahasa HTML, CSS, PHP dan MySQL. Aplikasi Perpustakaan ini dibuat untuk mempermudah pencatatan peminjaman buku, sehingga mengurangi kemungkinan kesalahan rekap data.

## Goal
* Mempermudah pencatatan peminjaman buku
* Menampilkan koleksi buku di perpustakaan

## Pages
Terdapat 6 halaman utama, yaitu:
* anggota.php
* buku.php
* input_anggota.php
* pinjam.php
* proses_pinjam.php
* admin

### anggota.php
Menampilkan semua anggota perpustakaan yang sudah terdaftar dan yang nantinya menjadi syarat utama untuk bisa meminjam buku.
Di dalam anggota.php juga bisa mendaftarkan anggota baru yang akan merujuk ke halaman input_anggota.php.

### buku.php
Menampilkan semua buku yang terdapat di perpustakaan saat ini.
Di halaman ini, anggota bisa melihat sinopsis setiap buku yang ada. Anggota juga bisa langsung melakukan peminjaman buku pada halaman ini.

### input_anggota.php
Pengunjung bisa mendaftarkan dirinya sendiri melalui halaman ini, dengan catatan dia mempunyai NIM.

### pinjam.php
Terdapat 2 tabel, yaitu:
* Buku yang belum dikembalikan
Berisi daftar nama anggota beserta buku yang belum dikembalikannya.

* Buku yang sudah dikembalikan
Berisi daftar nama anggota dan buku yang sudah dikembalikan beserta tanggal pengembaliannya.

### proses_pinjam.php
Pada halaman ini, anggota bisa meminjam buku yang dipilihnya. Halaman ini hanya bisa diakses melalui halaman buku.php.

### admin
Admin bisa melakukan berbagai macam hal, yaitu:
* Hapus anggota
* Hapus buku
* Tambah Buku

Aplikasi Perpustakaan ini dibuat dengan tampilan yang sederhana dan keamanan yang lemah. Aplikasi ini dibuat untuk tujuan pembelajaran.