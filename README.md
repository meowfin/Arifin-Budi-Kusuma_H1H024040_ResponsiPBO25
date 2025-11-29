**Nama**        : Arifin Budi Kusuma
**NIM**         : H1H024040
**Shift Awal**  : B
**Shift Akhir** : B

Deskripsi Proyek
PokéCare adalah aplikasi berbasis web sederhana yang dibangun menggunakan PHP Native. Aplikasi ini mensimulasikan peran seorang Trainer di Pokémon Research & Training Center (PRTC). Pengguna dapat melatih Pokémon spesifik (Venonat), meningkatkan level dan stats-nya, serta melihat riwayat pelatihan.
Sistem ini menerapkan konsep **Object-Oriented Programming (OOP)** secara menyeluruh untuk pengelolaan data dan logika permainan.

Fitur Utama
1. **Beranda (Dashboard):** Menampilkan status terkini Pokémon (Nama, Tipe, Level, HP, dan Jurus Spesial).
2. **Training Center:** Fitur untuk melatih Pokémon dengan pilihan tipe latihan (Attack, Defense, Speed) dan intensitas yang dapat diatur.
3. **Sistem Leveling:** Setiap latihan memberikan XP yang meningkatkan Level dan Max HP Pokémon.
4.  **Riwayat Latihan (History):** Mencatat log aktivitas latihan secara mendetail (Waktu, Jenis, Perubahan Stats).
5.  **Penyimpanan Sesi:** Data Pokémon tidak hilang saat berpindah halaman (menggunakan PHP Session).

Penerapan konsep OOP
Proyek ini menerapkan 4 pilar utama OOP:
1.  **Encapsulation:**
    - Seluruh properti Pokémon (`$name`, `$hp`, `$level`) bersifat `protected` di dalam class `Pokemon`.
    - Akses dan modifikasi data hanya dapat dilakukan melalui method getter atau method `train()`.

2. **Inheritance (Pewarisan):**
    -  Class `Venonat` (Child) mewarisi seluruh properti dan method dasar dari Class `Pokemon` (Parent). Hal ini mengurangi duplikasi kode.

3.  **Abstraction:**
    - Class `Pokemon` adalah `abstract class` yang mendefinisikan kerangka kerja.
    - Method `specialMove()` dan `train()` bersifat abstrak, memaksa class turunan untuk mengimplementasikan logika spesifiknya sendiri.

4.  **Polymorphism:**
    - Implementasi method `specialMove()` pada class `Venonat` menghasilkan output unik ("Psybeam"). Jika ada Pokémon lain, outputnya akan berbeda meskipun nama methodnya sama.

Cara Menjalankan Aplikasi
1. Pastikan komputer telah terinstall Laragon (saya menggunakan Laragon) atau web server PHP lainnya.
2. Clone repository ini atau download folder proyek.
3. Pindahkan folder proyek ke dalam direktori 'www' (biasanya di 'C:\laragon\www').
4. Buka aplikasi Laragon dan klik tombol 'Start All'.
5. Tunggu sampai muncul tulisan "Apache" (atau Nginx) dan "MySQL" berjalan (biasanya ada port 80 dan 3306).
6. Buka browser dan akses alamat: 'http://localhost/Nama_Folder_Kamu/'.
   Contoh: http://localhost/Arifin_Budi_Kusuma_H1H024040_ResponsiPBO25/
7. Aplikasi siap digunakan.
![demo](https://github.com/user-attachments/assets/64c7deef-ee76-4d8f-9f45-71b6b2ff4176)
