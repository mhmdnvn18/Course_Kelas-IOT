//#include <ESP8266WiFi.h>  // Khusus ESP8266, gunakan library ini untuk ESP8266

#include <WiFi.h> // Library WiFi untuk ESP32


//Constanta array + Character + Variabel Array
// Konstanta untuk menyimpan nama WiFi (SSID) dan password
const char ssid[] = "Nama Wifi";      // Ganti dengan nama WiFi Anda
const char pass[] = "Password Wifi"; // Ganti dengan password WiFi Anda

void setup() {
  // Memulai komunikasi Serial untuk debugging
  Serial.begin(9600);

  // Memulai koneksi ke jaringan WiFi
  WiFi.begin(ssid, pass);

  // Menampilkan pesan saat mencoba menghubungkan
  Serial.print("Menghubungkan ke WiFi");
  
  // Loop hingga ESP32 berhasil terhubung ke WiFi
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print("."); // Menampilkan titik sebagai indikator proses koneksi
    delay(500);        // Delay untuk memperlambat pembacaan status
  }

  // Pesan sukses setelah terhubung ke WiFi
  Serial.println("\nBerhasil terhubung ke WiFi");
}

void loop() {
  // Tempatkan kode utama yang berjalan berulang kali di sini
  delay(10);
}

/*
Catatan:
1. Pastikan Anda mengganti nilai `ssid` dan `pass` dengan nama WiFi dan password jaringan Anda.
2. Jika Anda menggunakan ESP8266, gunakan library `ESP8266WiFi.h` sebagai pengganti `WiFi.h`.
3. Kode ini akan menampilkan titik-titik (.) saat mencoba menyambung ke WiFi.
4. Setelah berhasil terhubung, akan muncul pesan "Berhasil terhubung ke WiFi" pada Serial Monitor.
5. Gunakan baud rate 9600 pada Serial Monitor untuk melihat output dengan benar.
*/
