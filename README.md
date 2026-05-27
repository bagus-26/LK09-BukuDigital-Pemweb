# BukuDigital - Sistem Manajemen Literatur


**Nama:** Bagus Artandyo Witjaksono
**Nim:** 24102029
**Matkul:** Pemograman Web
**Dosen Pengampu**: Ahsanun Naseh Khudori, S.Kom., M.Kom



BukuDigital adalah aplikasi berbasis web untuk mengelola arsip dan literatur perpustakaan dengan mudah. Aplikasi ini menyediakan antarmuka pengguna yang bersih dan modern untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data buku.

Berikut adalah penjelasan mengenai alur penggunaan aplikasi berdasarkan antarmuka yang tersedia:

## Alur Aplikasi

### 1. Halaman Utama: Koleksi Literatur
<img width="1897" height="970" alt="Screenshot 2026-05-27 230001" src="https://github.com/user-attachments/assets/30b718db-d569-4987-91dc-32ff561e623f" />


Halaman ini merupakan beranda utama aplikasi (`/books`) yang menampilkan seluruh daftar koleksi buku yang telah tersimpan di dalam database.
- **Tampilan Grid**: Buku-buku ditampilkan dalam bentuk kartu (card) yang berisi informasi cover buku, label klasifikasi (contoh: Fiksi), judul, penulis, dan tahun terbit.
- **Fitur Pencarian**: Terdapat form pencarian di bagian atas untuk memudahkan pengguna mencari buku berdasarkan judul atau penulis.
- **Aksi Cepat**: Pada setiap kartu buku terdapat tombol aksi untuk melihat detail (ikon mata) dan mengubah data (ikon pensil).
- **Tambah Data**: Tombol "Tambah Data" di pojok kanan atas digunakan untuk memasukkan buku baru ke dalam sistem.

### 2. Menambah Data Buku Baru (Tambah Arsip)
<img width="1011" height="821" alt="Screenshot 2026-05-27 230039" src="https://github.com/user-attachments/assets/522db84a-b73d-4fd8-996f-bd6738e24a05" />


Ketika pengguna menekan tombol "Tambah Data", mereka akan diarahkan ke halaman **Tambah Arsip**.
- Formulir ini digunakan untuk memasukkan informasi literatur ke dalam database.
- Terdapat beberapa field wajib yang harus diisi, seperti:
  - Judul Lengkap
  - Penulis
  - Penerbit
  - Tahun Terbit
  - Klasifikasi (Pilihan Kategori)
  - Catatan / Sinopsis
- Pengguna juga dapat mengunggah gambar cover buku untuk melengkapi data arsip.

### 3. Melihat Detail Buku
<img width="1919" height="912" alt="Screenshot 2026-05-27 230016" src="https://github.com/user-attachments/assets/7a000f9f-c72c-4a4e-acf8-e8fe673f6a1b" />


Dengan menekan ikon "Lihat" (mata) pada halaman koleksi, pengguna akan dibawa ke halaman detail buku.
- Halaman ini menampilkan informasi buku secara lengkap beserta gambar cover dengan ukuran yang lebih besar.
- Menampilkan data spesifik seperti penerbit, tahun terbit, sinopsis, tanggal data masuk, dan ID buku.
- Dari halaman ini, pengguna dapat melakukan tindakan lebih lanjut seperti:
  - **Edit Data**: Mengarahkan ke form pembaruan arsip.
  - **Hapus**: Menghapus data buku dari sistem perpustakaan.
  - **Kembali**: Kembali ke halaman utama (Koleksi).

### 4. Memperbarui Data Buku (Perbarui Arsip)
<img width="1919" height="913" alt="Screenshot 2026-05-27 230030" src="https://github.com/user-attachments/assets/da335439-5021-44e5-b9c6-7d4a39dad0a0" />


Halaman ini dapat diakses melalui halaman detail buku atau langsung dari tombol aksi di halaman utama.
- Berfungsi untuk memperbarui informasi literatur yang sudah ada di sistem.
- Formulir akan otomatis terisi dengan data buku yang saat ini tersimpan (contoh: Sherlock Holmes, Sir. Arthur Conan Doyle, dll).
- Pengguna dapat memodifikasi teks maupun mengganti cover literatur jika diperlukan.
- Setelah data diperbarui, perubahan akan langsung tersimpan di database dan tampil di halaman Koleksi.
