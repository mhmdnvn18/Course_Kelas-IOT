70. Melakukan Publish Data https://wokwi.com/projects/419923559150619649
71. Publish Data Potensiometer https://wokwi.com/projects/419961018911862785
72. Publish data hanya jika ada perubahan nilai https://wokwi.com/projects/419962568402282497
73. Publish data suhu kelembabapn dengan retain https://wokwi.com/projects/419963398096521217
74. Mengatur LastWILL untuk status Online atau Offline https://wokwi.com/projects/419968688532378625



# ✔️ Road to Becoming an IoT Developer by Kelas-IoT

![Pinout ESP32](https://github.com/user-attachments/assets/6a577bfd-475c-4789-a74b-b50a14fb7368)  
[Download Materi Referensi 📄](https://github.com/user-attachments/files/18367548/0.Materi.Referensi.pdf)

---

## ✔️ Internet of Things

1. [Konsep IoT](https://github.com/mhmdnvn18/Course_Kelas-IOT/tree/ea43fd66eec50c829149b21a21eca8324f0db535/Materi/1.%20Pengenalan%20Konsep%20IoT)
2. Bentuk Sinyal
3. Teknik PWM
4. Alur Data
5. Microcontroller ESP32
6. Pinout ESP32
7. Development Board dan Production Board
8. Framework Arduino

---

## ✔️ Simulation Examples

### 📘 Dasar-Dasar Pemrograman
- [LED Blink](https://wokwi.com/projects/419641623892913153)
- [LED Lampu Lalu Lintas](https://wokwi.com/projects/419641824616586241)
- [Komentar](https://wokwi.com/projects/419642631528391681)
- [Tipe Data dan Variabel](https://wokwi.com/projects/419641824616586241)
- [Membuat Variabel](https://wokwi.com/projects/419643856768534529)

### 📘 Komunikasi Serial
- [Komunikasi Serial](https://wokwi.com/projects/419645667062704129)
- [Menampilkan Nilai Variabel](https://wokwi.com/projects/419646239809627137)
- [Cara Memasukkan Nilai ke Variabel](https://wokwi.com/projects/419647160008498177)

### 📘 Kendali Perangkat
- [RGB LED](https://wokwi.com/projects/419694921024312321)
- [Function pada RGB LED](https://wokwi.com/projects/419695922644152321)
- [Menggunakan Servo](https://wokwi.com/projects/419697464486228993)
- [Menggunakan Buzzer](https://wokwi.com/projects/419704443953759233)
- [Menggunakan LCD I2C](https://wokwi.com/projects/419705552639491073)

### 📘 Sensor dan Aktuator
- [Membaca Nilai Potensiometer](https://wokwi.com/projects/419734492265646081)
- [Membaca Nilai Push Button](https://wokwi.com/projects/419738318100211713)
- [Membaca Nilai LDR](https://wokwi.com/projects/419784339881591809)
- [Membaca Suhu dan Kelembaban dengan DHT22](https://wokwi.com/projects/419785486708196353)

### 📘 IoT dan MQTT
- [Menghubungkan ESP32 ke WiFi](https://wokwi.com/projects/419886634230360065)
- [Menampilkan Indikator WiFi ke RGB LED](https://wokwi.com/projects/419890088780254209)
- [Menghubungkan ESP32 ke Broker MQTT](https://wokwi.com/projects/419892393814839297)
- [Membuat Fungsi Reconnect MQTT](https://wokwi.com/projects/419894575274716161)
- [Mengendalikan LED menggunakan MQTT](https://wokwi.com/projects/419899162970266625)

---

## 📚 Library yang Digunakan

Berikut adalah beberapa library yang digunakan dalam proyek ini:

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

> 💡 **Referensi Tambahan:**  
> [Basic Writing and Formatting Syntax in GitHub](https://docs.github.com/en/get-started/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax)
