// Contoh membuat fungsi sendiri
void fungsiBerkedip(int pinLED, int jeda) {
  digitalWrite(pinLED, HIGH);  // Menghidupkan LED yang terhubung ke pinLED
  delay(jeda);                 // Menunggu selama 'jeda' milidetik
  digitalWrite(pinLED, LOW);   // Mematikan LED
  delay(jeda);                 // Menunggu selama 'jeda' milidetik
}

// Contoh prosedur
int penambahan(int angka1, int angka2) {
  int angka3 = angka1 + angka2;  // Menjumlahkan angka1 dan angka2
  return angka3;  // Mengembalikan hasil penjumlahan
}