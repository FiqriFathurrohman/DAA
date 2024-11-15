# **Dokumen Persyaratan Bisnis (BRD)**  
### **Proyek:** Aplikasi Cek Jadwal Kuliah  
**Versi:** 1.0
**Tanggal:** 15 November 2024  
**Pembuat:** FIQRI FATHURROHMAN

---

## **1. Tujuan Proyek**
- **Objektif**: Aplikasi ini bertujuan mempermudah mahasiswa untuk mendaftar beasiswa, dan mengecek status beasiswaa. dan dari pihak universitas pun bisa mengawasi mahasiswa yg mendapatkan beasiswa.

---

## **2. Fitur Utama**

### **Untuk Mahasiswa**
- **UNTUK MAHASISWA**: 
    *MENDAFTAR
    1. NAMA(MASUKKAN NAMA MAHASISWA)
    2. NIM(MASUKKAN NOMOR INDUK MAHASISWA)
    3. JENIS BEASISWA(MSUKKAN JENIS BEASISWA NYA PAKAI TEST, PRESTASI AKADEMI, ATAU PRESTASI NON AKADEMIK )
    4. IPS (MASUKKAN INDEX PRESTASI SEMESTER)
    5. STATUS(MENAMPILKAN Accepted/Rejected/In Process) 


    *MELIHAT STATUS
    1. NAMA (MASUKKAN NAMA MAHASISWA)
    2. NIM (MASUKKAN NOMOR INDUK MAHASISWA)
    3. IPS (MENAMPILAKN INDEX PRESTASI SEMESTER )
    3. STATUS (PROCCED ATAU NOT PROCCED TERGANTUNG MINUMUM IPS YG TELAH DI TETAPKAN UNIVERSITAS)

### **Untuk Admin**
- **Pengelolaan Jadwal**: Menambahkan, Mengubah, Dan Menghapus data .

---

## **3. Persyaratan Fungsional**

### **Sistem Login**
- **Akses Berdasarkan Peran**: Mahasiswa dan Admin memiliki hak akses yang berbeda, di mana Mahasiswa hanya diperbolehkan untuk melihat data, sementara Admin memiliki hak untuk menambah, mengubah, dan menghapus data.

### **Pengaturan & Tampilan Jadwal**
- **Admin**: Mengelola data  (input, update, delete).
- **Mahasiswa**: Hanya melihat data mahasiswa dan status beasiswa saja.

---

## **4. Persyaratan Non-Fungsional**

- **Kegunaan**: Aplikasi ini dirancang agar dapat digunakan dengan mudah oleh Admin maupun Mahasiswa, sehingga keduanya dapat mengakses data dengan lebih efisien..
- **Keamanan**:
  -Hanya Admin yang memiliki izin untuk mengelola data.
  - Mahasiswa hanya diperbolehkan untuk melihat data tanpa hak untuk mengelola atau mengubahnya.

---

## **5. Model, Migrasi, Seeder, dan Resource yang Perlu Dibuat Pada Container `docker exec -it sample bash`**

### **SCHOLARSHIP**
- **Model**: `Scholarship`.  Menyimpa semua data mahasiswa(NAMA, NIM, IPS, JENIS BEASISWA).
- **Migration**: 
Struktur tabel berikut ini akan dibuat pada database:
    * id:bigint unsigned (primerykey)
    * mahasiswa_name : varchar (50).
    * mahasiswa_id : int (50).
    * scholarship_type: varchar(100).
    * ips : decimal (1,2).
    * status : enum ('Accepted', 'Rejected', 'In Process')
- **Seeder**: Data awal untuk pengujian app beasiswa.
- **Resource**: Endpoint API untuk data beasiswa, dapat diakses oleh mahasiswa dan admin.
  
### **Permissions**
- **Model**: `Permission`. Mengelola daftar permissions yang mengatur hak akses mahasiswa dan admin.
  
- **Seeder**: `PermissionsSeeder`, bertugas menambahkan permissions dan menetapkannya ke role `mahasiswa`

  - **Permissions untuk Mahasiswa**:
    - `view_schedules`: Mengizinkan mahasiswa melihat status beasiswa.
    - `view_any_schedules`: Mengizinkan mahasiswa melihat rincian beasiswa.

#### Mengapa Migration Permissions Tidak Dibuat? 

Karena saat membuat proyek baru dengan perintah `composer create-project --prefer-dist raugadh/fila-starter .`, migrasi untuk tabel permissions sudah disediakan oleh spatie/laravel-permission. Paket ini secara otomatis mengatur tabel dan kolom yang diperlukan untuk permissions dan roles, sehingga tidak perlu membuat migrasi permissions secara manual.

---

## **6. Analisis Permissions untuk Mahasiswa dan Admin**

Pada proyek aplikasi cek jadwal kuliah ini, permissions diperlukan untuk membatasi akses mahasiswa terhadap fitur yang sesuai dengan kebutuhan dan peran mereka, sementara admin memiliki akses penuh ke seluruh sistem. Permissions ini memastikan mahasiswa hanya dapat melihat informasi beasiswa tanpa dapat melakukan perubahan.

### **Permissions yang Diperlukan**

Mahasiswa hanya memerlukan akses terbatas untuk melihat informasi terkait data beasiswa , tanpa hak untuk menambah, mengedit, atau menghapus data. Berikut adalah permissions yang akan diberikan kepada role mahasiswa:

1. **Permissions untuk Mahasiswa**
   - `view_schedules`: Mengizinkan mahasiswa melihat data beasiswa.
   - `view_any_schedules`: Mengizinkan mahasiswa melihat rincian dari semua app beasiswa yang tersedia.

### **Implementasi Model dan Seeder untuk Permissions**

#### **Model: `Permission`**

Model `Permission` disediakan oleh paket Spatie Laravel Permission. Model ini akan menyimpan data permissions dengan atribut berikut:
- `id`: Primary key dari permission.
- `name`: Nama dari permission (contoh: `view_schedules`).
- `guard_name`: Guard untuk permission (default: `web`).

#### **Seeder: PermissionsSeeder**
Seeder PermissionsSeeder akan digunakan untuk membuat dan menetapkan permissions kepada role mahasiswa, memungkinkan mereka mengakses informasi jadwal sesuai dengan hak yang ditentukan. Admin akan memiliki akses penuh secara default, sehingga tidak diperlukan seeder khusus untuk admin.

---
