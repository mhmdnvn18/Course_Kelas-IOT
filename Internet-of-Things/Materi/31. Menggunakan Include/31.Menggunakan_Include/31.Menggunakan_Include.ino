#include "function.h"


void setup() {
  Serial.begin(9600);  // Memulai komunikasi serial untuk menampilkan hasil perhitungan di Serial Monitor

  // Contoh fungsi bawaan di Arduino IDE
  // Jika terdapat () kosong pada kode, maka kode tersebut adalah fungsi
  // Didalam () adalah parameter yang diperlukan untuk fungsi tersebut. Contoh: (33, OUTPUT)
  pinMode(33, OUTPUT);  // Mengatur pin 33 sebagai OUTPUT
  pinMode(32, OUTPUT);  // Mengatur pin 32 sebagai OUTPUT
  
  // Perulangan for untuk memanggil fungsi berkedip pada pin 33 sebanyak 4 kali
  for (int angka = 1; angka < 5; angka++) {
    fungsiBerkedip(33, 500);  // Memanggil fungsi dengan parameter pin 33 dan jeda 500 ms
    
    // Variabel untuk menerima hasil dari prosedur penambahan
    int hasil;
    hasil = penambahan(10, 20);  // Memanggil prosedur dengan dua parameter (10 dan 20)
    Serial.println(hasil);  // Menampilkan hasil penjumlahan di Serial Monitor
  }
}

void loop() {
  // Delay adalah 'fungsi' untuk membuat jeda program
  delay(10);  // Menunggu selama 10 ms, tidak ada proses lain dalam loop
  
  // Memanggil fungsi berkedip untuk pin 32 dengan jeda 1000 ms
  fungsiBerkedip(32, 1000);
}



/*
Penjelasan Program:

1. **Fungsi (void):**
   - Fungsi `fungsiBerkedip` tidak mengembalikan nilai apapun (void).
   - Digunakan untuk melakukan tugas tertentu, seperti menghidupkan dan mematikan LED.

2. **Prosedur dengan nilai balik:**
   - Fungsi `penambahan` adalah contoh prosedur dengan nilai balik (return).
   - Prosedur ini menerima dua parameter (`angka1` dan `angka2`), menjumlahkan keduanya, dan mengembalikan hasil penjumlahan.

3. **Penggunaan di `setup`:**
   - Fungsi `fungsiBerkedip` dipanggil untuk mengontrol LED.
   - Prosedur `penambahan` dipanggil untuk menghitung hasil penjumlahan dan mencetak hasilnya ke Serial Monitor.

4. **Output Program:**
   - LED pada pin 33 akan berkedip 4 kali dengan jeda 500 ms.
   - Hasil penjumlahan 10 + 20 (yaitu 30) akan ditampilkan 4 kali di Serial Monitor.
   - Setelah `setup` selesai, loop akan menjalankan fungsi berkedip untuk LED pada pin 32 dengan jeda 1000 ms secara terus-menerus.

Keunggulan Program:
- Kombinasi penggunaan fungsi (void) dan prosedur (dengan nilai balik) meningkatkan modularitas dan fleksibilitas kode.
- Memanfaatkan parameter untuk membuat fungsi lebih umum dan dapat digunakan kembali.
*/
