# ✔️ Road to Becoming an IoT Developer by Kelas-IoT  

![Pinout ESP32](https://github.com/user-attachments/assets/6a577bfd-475c-4789-a74b-b50a14fb7368)  
[Download Materi Referensi 📄](https://github.com/user-attachments/files/18367548/0.Materi.Referensi.pdf)  

---

## 📘 Internet of Things  

1. [Konsep IoT](https://github.com/mhmdnvn18/Course_Kelas-IOT/tree/ea43fd66eec50c829149b21a21eca8324f0db535/Materi/1.%20Pengenalan%20Konsep%20IoT)  
2. Bentuk Sinyal  
3. Teknik PWM  
4. Alur Data  
5. Microcontroller ESP32  
6. Pinout ESP32  
7. Development Board dan Production Board  
8. Framework Arduino  
9. Database  

---

# Kelas IoT - Daftar Materi Pembelajaran

## **1. Pengenalan Dasar**
- [Kelas IoT - 15] Komentar
- [Kelas IoT - 16] Tipe Data dan Variabel
- [Kelas IoT - 17] Membuat Variabel
- [Kelas IoT - 18] Komunikasi Serial
- [Kelas IoT - 19] Menampilkan Nilai Variabel
- [Kelas IoT - 20] Cara Memasukan Nilai ke Variabel
- [Kelas IoT - 21] Variabel Lokal dan Global
- [Kelas IoT - 22] Operator Aritmatika

---

## **2. Pengkondisian dan Perulangan**
- [Kelas IoT - 23] Pengkondisian If
- [Kelas IoT - 24] Increment dan Decrement
- [Kelas IoT - 25] Perulangan While
- [Kelas IoT - 26] Perulangan Do While
- [Kelas IoT - 27] Perulangan For

---

## **3. Fungsi dan Prosedur**
- [Kelas IoT - 28] Membuat Fungsi dan Prosedur
- [Kelas IoT - 29] Argument Pada Fungsi
- [Kelas IoT - 30] Membuat Prosedur
- [Kelas IoT - 31] Menggunakan Include

---

## **4. Komponen Elektronik**
### **4.1 LED dan Button**
- [Kelas IoT - 13] LED Berkedip
- [Kelas IoT - 14] Lampu Lalu Lintas
- [Kelas IoT - 43] Membaca Nilai Push Button
- [Kelas IoT - 44] Menyalakan LED dengan Push Button
- [Kelas IoT - 45] Membuat Push Button sebagai Switch
- [Kelas IoT - 42] Mengendalikan LED Berdasarkan Nilai Potensiometer

### **4.2 Potensiometer**
- [Kelas IoT - 39] Menggunakan Potensiometer
- [Kelas IoT - 40] Menampilkan Nilai Potensiometer ke LCD
- [Kelas IoT - 41] Mengubah Nilai Potensiometer Menjadi Persen

### **4.3 LDR dan Sensor**
- [Kelas IoT - 46] Membaca Nilai LDR
- [Kelas IoT - 47] Membuat Lampu Otomatis Berdasarkan Kondisi Cahaya

### **4.4 Servo dan Buzzer**
- [Kelas IoT - 34] Menggunakan Servo
- [Kelas IoT - 35] Menggunakan Servo Lebih dari Satu
- [Kelas IoT - 36] Menggunakan Buzzer

### **4.5 LCD**
- [Kelas IoT - 37] Menggunakan LCD I2C
- [Kelas IoT - 38] Menggunakan Lebih dari Satu LCD I2C

---

## **5. Sensor dan Data**
- [Kelas IoT - 48] Membaca Suhu dan Kelembaban Ruangan dengan DHT22
- [Kelas IoT - 49] Menampilkan Suhu dan Kelembaban ke LCD

---

## **6. MQTT**
- [Kelas IoT - 61] Menghubungkan ESP32 ke WiFi
- [Kelas IoT - 62] Menampilkan Indikator WiFi ke LCD
- [Kelas IoT - 63] Menampilkan Indikator WiFI ke LCD
- [Kelas IoT - 64] Menghubungkan ESP32 ke Broker MQTT
- [Kelas IoT - 65] Membuat Fungsi Reconnect
- [Kelas IoT - 66] Melakukan Subscribe
- [Kelas IoT - 67] Mengendalikan LED Menggunakan MQTT
- [Kelas IoT - 68] Mengendalikan Servo dengan MQTT
- [Kelas IoT - 69] Menggunakan Library NusabotSimpleTimer
- [Kelas IoT - 70] Melakukan Publish Data
- [Kelas IoT - 71] Publish Data Potensiometer
- [Kelas IoT - 72] Publish Data Hanya Jika Ada Perubahan Nilai Sensor
- [Kelas IoT - 73] Publish Data Suhu dan Kelembaban dengan Retain
- [Kelas IoT - 74] Mengatur LastWill untuk Status Online atau Offline
- [Kelas IoT - 79] Menghubungkan ESP32 ke Private Broker

---

## **7. RGB dan Fungsi Tambahan**
- [Kelas IoT - 32] RGB LED
- [Kelas IoT - 33] Function pada RGB LED


---

## 📚 Library yang Digunakan  

1. **Arduino MQTT**  
   [Repository](https://github.com/256dpi/arduino-mqtt)  
   Digunakan untuk komunikasi MQTT yang memungkinkan ESP32 berinteraksi dengan broker MQTT.  

2. **LiquidCrystal_I2C**  
   [Repository](https://github.com/johnrickman/LiquidCrystal_I2C)  
   Library untuk mengontrol LCD I2C, sehingga mempermudah integrasi display dalam proyek.  

3. **ESP32Servo**  
   [Dokumentasi](https://madhephaestus.github.io/ESP32Servo/annotated.html)  
   Mendukung kontrol presisi servo motor pada ESP32 tanpa mengganggu fungsi lain.  

4. **Nusabot Simple Timer**  
   [Repository](https://github.com/nusabot-iot/NusabotSimpleTimer)  
   Digunakan untuk eksekusi fungsi secara periodik tanpa menggunakan `delay`.  
5. **MQTT.js**
   [Repository](https://github.com/mqttjs)
   Digunanakan pada website IoT yang kita buat agar dapat berkomunikasi via MQTT

---

## 📌 Tips dan Catatan Penting  

### Library **Nusabot Simple Timer**  
- **Fungsi:** Mengeksekusi fungsi secara berkala tanpa menggunakan `delay`. Berguna untuk proses seperti publish data secara terjadwal.  
- **Keunggulan:**  
  - Menghindari penggunaan `delay` yang dapat menyebabkan freeze pada ESP32.  
  - Mendukung eksekusi multitasking secara lebih efisien.  

**Kenapa tidak menggunakan `delay`?**  
Penggunaan `delay` dapat menyebabkan proses berhenti sementara, sehingga:  
1. Data yang dikirim/diterima mungkin terlewat.  
2. Tidak cocok untuk aplikasi real-time.  

Gunakan library [Nusabot Simple Timer](https://github.com/nusabot-iot/NusabotSimpleTimer) sebagai solusi untuk eksekusi fungsi periodik tanpa menghambat proses lainnya.  

---

## 📋 Database  

### Apa itu Database?  
Database adalah kumpulan data yang terorganisir dan disimpan secara sistematis sehingga dapat dengan mudah diakses, dikelola, dan diperbarui. Dalam konteks pengembangan IoT, database digunakan untuk menyimpan data dari perangkat IoT secara real-time, sehingga data tersebut dapat digunakan untuk analisis, visualisasi, atau pengambilan keputusan.

### Kategori Database:  

1. **SQL (Structured Query Language):**  
   - SQL adalah bahasa yang digunakan untuk manajemen database relasional, di mana data disimpan dalam tabel dengan hubungan yang terdefinisi. SQL cocok untuk data yang terstruktur dan membutuhkan integritas data yang tinggi.  
   - **Keunggulan:**  
     - Mendukung transaksi dengan konsistensi data tinggi.  
     - Sangat baik untuk data yang kompleks dengan relasi antar-tabel.  
   - **Contoh Database SQL:**  
     - **PostgreSQL:** Database open-source yang andal dengan fitur canggih seperti dukungan JSON.  
     - **MariaDB:** Versi pengembangan dari MySQL yang menawarkan performa tinggi.  
     - **MySQL:** Salah satu database relasional paling populer dan banyak digunakan.  
     - **Microsoft SQL Server:** Database dengan fitur yang terintegrasi dengan ekosistem Windows.  

2. **NoSQL (Not Only SQL):**  
   - NoSQL adalah tipe database yang dirancang untuk menyimpan data tidak terstruktur atau semi-terstruktur, seperti dokumen, grafik, atau data waktu-nyata.  
   - **Keunggulan:**  
     - Skalabilitas yang tinggi.  
     - Cocok untuk data besar (Big Data) dan aplikasi dengan data yang terus berubah.  
   - **Contoh Database NoSQL:**  
     - **Redis:** Database key-value dengan performa sangat cepat untuk caching atau tugas real-time.  
     - **CouchDB:** Menggunakan format JSON untuk menyimpan data dan memiliki API RESTful.  
     - **Cassandra:** Dirancang untuk menangani volume data yang sangat besar dan skalabilitas horizontal.  
     - **Firebase:** Database NoSQL berbasis cloud untuk aplikasi real-time, sering digunakan di aplikasi mobile dan IoT.  
     - **MongoDB:** Database berbasis dokumen yang fleksibel dan sangat populer untuk pengembangan aplikasi modern.  

### Perbedaan SQL dan NoSQL:  

| **Fitur**              | **SQL**                           | **NoSQL**                         |  
|------------------------|-----------------------------------|-----------------------------------|  
| **Struktur Data**      | Terstruktur (tabel, kolom, baris) | Tidak terstruktur (JSON, dokumen) |  
| **Skalabilitas**       | Vertikal (menambah sumber daya server) | Horizontal (menambah lebih banyak server) |  
| **Kompleksitas Relasi** | Mendukung relasi kompleks         | Kurang cocok untuk relasi kompleks |  
| **Cocok untuk**         | Data yang stabil dan relasional   | Data besar atau dinamis           |  

---

> 💡 **Referensi Tambahan:**  
> [Basic Writing and Formatting Syntax in GitHub](https://docs.github.com/en/get-started/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax)  
