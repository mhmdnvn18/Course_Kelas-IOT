#include <ESP32Servo.h>  // Library untuk mengontrol servo pada ESP32

// Membuat objek servo bernama servoSatu
Servo servoSatu;

void setup() {
  // Menghubungkan servo ke pin GPIO 33 pada ESP32
  // Parameter kedua dan ketiga adalah rentang durasi pulsa (500 - 2400 mikrodetik) untuk kontrol sudut servo
  servoSatu.attach(33, 500, 2400);
}

void loop() {
  // Mengatur posisi servo ke sudut 0 derajat
  servoSatu.write(0);
  delay(500);  // Menunggu selama 500 ms

  // Mengatur posisi servo ke sudut 90 derajat
  servoSatu.write(90);
  delay(500);  // Menunggu selama 500 ms
}

/*
Penjelasan Program:
1. Library ESP32Servo:
   - Digunakan untuk mengontrol servo motor dengan ESP32 menggunakan sinyal PWM.
   
2. Objek `servoSatu`:
   - Dibuat menggunakan kelas `Servo` untuk mengontrol satu motor servo.

3. Fungsi `attach`:
   - Menghubungkan servo ke pin tertentu (pin GPIO 33 dalam contoh ini).
   - Rentang durasi pulsa (`500, 2400`) menentukan sudut minimum (0°) dan maksimum (180°).

4. Fungsi `write`:
   - Mengontrol posisi servo berdasarkan sudut yang diberikan dalam derajat (0° hingga 180°).

5. Fungsi `delay`:
   - Memberikan jeda waktu dalam milidetik untuk memungkinkan servo mencapai posisi yang diinginkan sebelum melanjutkan perintah berikutnya.

Perbaikan dan Saran Pengembangan:
1. **Gerakan Bertahap:**
   - Tambahkan pergerakan bertahap untuk membuat gerakan servo lebih halus.
   
2. **Pola Gerakan:**
   - Ciptakan pola gerakan tertentu seperti ayunan penuh (0° ke 180° dan kembali ke 0°).

3. **Catu Daya:**
   - Pastikan servo diberi daya eksternal untuk mencegah kelebihan beban pada ESP32.

4. **Debugging:**
   - Tambahkan komunikasi serial untuk memantau sudut servo dan memastikan program berjalan dengan baik.
*/
