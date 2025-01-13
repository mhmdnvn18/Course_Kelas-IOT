# ✔️Road To become an IoT Developer by Kelas-IoT

![6 1  Pinout ESP32](https://github.com/user-attachments/assets/6a577bfd-475c-4789-a74b-b50a14fb7368)
[0. Materi Referensi.pdf](https://github.com/user-attachments/files/18367548/0.Materi.Referensi.pdf)


## ✔️Internet of Things
1. [Konsep IoT](https://github.com/mhmdnvn18/Course_Kelas-IOT/tree/ea43fd66eec50c829149b21a21eca8324f0db535/Materi/1.%20Pengenalan%20Konsep%20IoT)
2. Bentuk Sinyal
3. Teknik PWM
4. Alur Data
5. Microcontroler ESP32
6. Pinout ESP32
7. Development Board dan Production Board
8. Framework Arduino

## ✔️Simulation
[13. LED Blink](https://wokwi.com/projects/419641623892913153)
[14. LED Lampu Lalu Lintas](https://wokwi.com/projects/419641824616586241)
[15. Komentar](https://wokwi.com/projects/419642631528391681)
[16. Tipe Data dan Variabel](https://wokwi.com/projects/419641824616586241)
[17. Membuat Variabel](https://wokwi.com/projects/419643856768534529)
[18. Komunikasi Serial](https://wokwi.com/projects/419645667062704129)
[19. Menampilkan Nilai Variabel](https://wokwi.com/projects/419646239809627137)
[20. Cara Memasukan Nilai ke Variabel](https://wokwi.com/projects/419647160008498177)
[21. Variabel Global dan Lokal](https://wokwi.com/projects/419647688959538177)
[22. Operator Aritmatika](https://wokwi.com/projects/419650232364606465)
[23. Pengkondisian If](https://wokwi.com/projects/419650786391297025)
[24. Increment dan Decrement](https://wokwi.com/projects/419652145334370305)
[25. Perulangan While](https://wokwi.com/projects/419652433756758017)
[26. Perulangan Do While](https://wokwi.com/projects/419653063528414209)
[27. Perulangan For](https://wokwi.com/projects/419653360048954369)
[28. Membuat Fungsi dan Prosedur](https://wokwi.com/projects/419684348956709889)
[29. Argument Pada Fungsi](https://wokwi.com/projects/419687501780853761)
[30. Membuat Prosedur](https://wokwi.com/projects/419688001045714945)
[31. Menggunakan Include](https://wokwi.com/projects/419688664583622657)
[32. RGB LED](https://wokwi.com/projects/419694921024312321)
[33. Function pada RGB LED](https://wokwi.com/projects/419695922644152321)
[34. Menggunakan Servo](https://wokwi.com/projects/419697464486228993)
[35. Menggunakan servo lebih dari satu](https://wokwi.com/projects/419698628708811777)
[36. Menggunakan Buzzer](https://wokwi.com/projects/419704443953759233)
[37. Menggunakan LCD I2C](https://wokwi.com/projects/419705552639491073)
[38. Menggunakan Lebih dari satu LCD I2C](https://wokwi.com/projects/419733602682043393)
[39. Menggunakan Potensiometer](https://wokwi.com/projects/419734492265646081)
[40. Menampilkan Nilai Potensiometer ke LCD](https://wokwi.com/projects/419735837387376641)
[41. Mengubah nilai Potensiometer menjadi persen](https://wokwi.com/projects/419736968618472449)
[42. Mengendalikan LED berdasarkan Nilai Potensiometer](https://wokwi.com/projects/419737834612267009)
[43. Membaca nilai Push Button](https://wokwi.com/projects/419738318100211713)
[44. Membaca Nilai Push Button](https://wokwi.com/projects/419738318100211713)
[45. Membuat Push Button sebagai Switch](https://wokwi.com/projects/419783989933998081)
[46. Membaca Nilai LDR](https://wokwi.com/projects/419784339881591809)
[47. Membuat Lampu Otomatis Berdasarkan Kondisi Cahaya](https://wokwi.com/projects/419785204957895681)
[48. Membaca Suhu dan Kelembaban Ruangan dengan DHT22](https://wokwi.com/projects/419785486708196353)
[49. Menampilkan Suhu dan Kelembaban ke LCD](https://wokwi.com/projects/419786110856330241)


61. Menghubungkan ESP32 ke Wifi https://wokwi.com/projects/419886634230360065
62. Menampilkan ke LCD https://wokwi.com/projects/419888271614534657
63. Menampilkan Indikator WiFi ke RGB LED https://wokwi.com/projects/419890088780254209
64. Menghubungkan ESP32 ke Broker MQTT https://wokwi.com/projects/419892393814839297
65. Membuat fungsi reconnect https://wokwi.com/projects/419894575274716161
66. Melakukan Subscribe https://wokwi.com/projects/419895477510499329
67. Mengendalikan LED menggunakan MQTT https://wokwi.com/projects/419899162970266625
68. Mengendalikan Servo dengan MQTT https://wokwi.com/projects/419900615486167041





> [!NOTE]
> Library Nusabot Simple Timer berfungsi untuk mengeksekusi sebuah fungsi (function) secara berkala setiap beberapa detik, tanpa menggunakan delay. Hal ini sangat berguna dalam skenario seperti melakukan publish data secara terjadwal.
> **Mengapa fungsi publish tidak diletakkan di 'void loop'?**
> - Jika publish dilakukan langsung di 'void loop', maka proses tersebut akan dieksekusi terlalu cepat dan berulang-ulang.
> Hal ini dapat mengakibatkan pemborosan bandwidth karena banyaknya data serupa yang dikirim secara terus-menerus. Akibatnya, data menjadi tidak efisien dan berpotensi menghasilkan data sampah.
> **Mengapa tidak menggunakan delay?**
> - Dalam proyek IoT yang bersifat real-time, penggunaan delay sebaiknya dihindari sama sekali, kecuali pada kondisi tertentu seperti:
>   1. Sebelum pengiriman data.
>   2. Sesudah pembacaan data sensor.
>   3. Saat menghubungkan perangkat ke WiFi atau broker MQTT.
> - Delay akan menyebabkan ESP32 berhenti sementara (freeze) dan tidak menjalankan proses lain. Jika pengiriman atau penerimaan data terjadi bersamaan dengan waktu delay, data tersebut dapat terlewat atau tidak sampai ke tujuan.
> Sebagai solusinya, gunakan library Nusabot Simple Timer untuk mengatur eksekusi fungsi secara periodik tanpa menghambat proses lainnya.
> https://github.com/nusabot-iot/NusabotSimpleTimer



> [!TIP]
> [Basic writing and formatting syntax in Github](https://docs.github.com/en/get-started/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax)
