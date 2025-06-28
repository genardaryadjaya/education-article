MANUAL BOOK WEBSITE ARTIKEL EDUKASI

1. LOGIN DAN REGISTER
- Buka halaman utama aplikasi
- Klik tombol Register untuk membuat akun baru
- Isi data nama, email, password, captcha, lalu klik Daftar
- Setelah berhasil daftar, login menggunakan email dan password yang sudah dibuat
- Jika sudah punya akun, langsung klik Login dan masukkan email serta password

2. DASHBOARD
- Setelah login, Anda akan diarahkan ke halaman Dashboard
- Dashboard menampilkan statistik total artikel, kategori, user, admin, draft, dan tabel jumlah artikel per kategori

3. ARTIKEL
- Klik menu Artikel di navbar untuk melihat daftar semua artikel yang ada
- Semua user bisa melihat seluruh artikel yang sudah dibuat oleh siapapun
- Untuk menambah artikel, klik tombol Tambah Artikel, isi form, lalu klik Simpan
- Artikel bisa dipublish langsung atau disimpan sebagai draft
- User hanya bisa mengedit dan menghapus artikel miliknya sendiri
- Admin bisa mengedit dan menghapus semua artikel

4. KATEGORI
- Menu Kategori hanya muncul dan bisa diakses oleh admin
- Admin bisa menambah, mengedit, dan menghapus kategori
- User biasa tidak bisa mengakses menu kategori

5. TENTANG
- Menu Tentang berisi informasi tentang aplikasi, fitur, teknologi yang digunakan, dan kontak

6. HAK AKSES
- Admin bisa mengelola semua artikel, kategori, dan melihat semua data
- User biasa hanya bisa menulis, mengedit, menghapus artikel miliknya sendiri, dan melihat semua artikel
- User biasa tidak bisa mengelola kategori

7. DATA DUMMY
- Data dummy (user, kategori, artikel) akan otomatis terisi jika menjalankan perintah php artisan migrate fresh --seed
- User admin default email admin at dummy dot com password password
- User biasa default email user at dummy dot com password password

8. GANTI LEVEL USER
- Untuk mengubah level user menjadi admin atau user, buka phpMyAdmin, pilih tabel users, edit kolom level menjadi admin atau user sesuai kebutuhan

9. RESET DATA
- Untuk mengulang data dummy, jalankan perintah php artisan migrate fresh --seed di terminal

10. UPLOAD GAMBAR ARTIKEL
- Saat menambah atau mengedit artikel, Anda bisa mengupload gambar sendiri
- Jika tidak mengupload gambar, maka artikel dummy akan menggunakan gambar placeholder otomatis

11. FITUR LAIN
- Terdapat fitur publish dan unpublish artikel
- Artikel yang sudah dipublish akan tampil di halaman utama (landing page)
- Artikel draft hanya bisa dilihat oleh pemilik atau admin


PENJELASAN SINGKAT

Website Artikel Edukasi adalah aplikasi berbasis Laravel yang memungkinkan user untuk menulis, mengedit, dan mempublikasikan artikel edukasi. Terdapat dua level user yaitu admin dan user biasa. Admin memiliki hak akses penuh untuk mengelola kategori dan semua artikel, sedangkan user biasa hanya bisa mengelola artikel miliknya sendiri. Data dummy dapat di-generate otomatis menggunakan seeder, sehingga aplikasi siap digunakan untuk demo atau pengembangan lebih lanjut.
