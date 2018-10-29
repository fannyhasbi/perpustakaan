-- Database for Perpustakaan
-- @author Fanny Hasbi
-- @link https://github.com/fannnyhasbi/perpustakaan

--
-- Table buku
--
CREATE TABLE buku (
  id INT NOT NULL AUTO_INCREMENT,
  judul VARCHAR(100) NOT NULL,
  pengarang VARCHAR(100) NOT NULL,
  tahun SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  penerbit VARCHAR(100) NOT NULL,
  kategori VARCHAR(100),
  PRIMARY KEY (id)
);

INSERT INTO buku (judul, pengarang, tahun, penerbit, kategori) VALUES
('Laskar Pelangi', 'Andrea Hirata', 2008, 'Bentang Pustaka', NULL),
('Bumi Manusia', 'Pramoedya Ananta Toer', 2005, 'Lentera Dipantara', NULL),
('5 cm', 'Donny Dhirgantoro', 2005, 'Grasindo', NULL),
('Sang Pemimpi', 'Andrea Hirata', 2006, 'Bentang Pustaka', NULL),
('Perahu Kertas', 'Dee Lestari', 2009, 'Bentang Pustaka', NULL);


--
-- Table anggota
--
CREATE TABLE anggota (
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  nama VARCHAR(100) NOT NULL,
  status TINYINT(1) NOT NULL DEFAULT 0,
  alamat VARCHAR(255) NULL,
  PRIMARY KEY (id)
);

INSERT INTO anggota (username, password, nama, status, alamat) VALUES
('fannyhasbi', '$2y$10$5R0201EoaIj2aNo4Egn3e.UqCkh2cXzw1aLYaeuBbmVfAiMfdg4nC', 'Fanny Hasbi', 1, 'Brebes'),
('example', '$2y$10$eAkRJ8lPmvC.WSCF2t.6CeikVqD5cHxsN3g5fBzqFBSEVvAQ8sFLK', 'Example Member', 0, 'Semarang'),
('budi', '$2y$10$eAkRJ8lPmvC.WSCF2t.6CeikVqD5cHxsN3g5fBzqFBSEVvAQ8sFLK', 'Budi', 0, 'Salatiga'),
('alice', '$2y$10$eAkRJ8lPmvC.WSCF2t.6CeikVqD5cHxsN3g5fBzqFBSEVvAQ8sFLK', 'Alice ', 0, 'Jakarta');

CREATE TABLE pinjam (
  id INT NOT NULL AUTO_INCREMENT,
  id_anggota INT NOT NULL,
  id_buku INT NOT NULL,
  tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (id_anggota) REFERENCES anggota(id),
  FOREIGN KEY (id_buku) REFERENCES buku(id)
);