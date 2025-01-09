/*
  Seluruh kode program ini serta cara pengkabelan dan cara menggunakan
  sensor aktuator akan dipelajari secara bertahap
  benar-benar dari nol.

  Sensor dan aktuator apapun bisa digunakan.
*/


#include <WiFi.h>
#include <MQTT.h>
#include <ESP32Servo.h>
#include <NusabotSimpleTimer.h>
#include "DHTesp.h"

WiFiClient net;
MQTTClient client;
Servo servo;
NusabotSimpleTimer timer;
DHTesp dhtSensor;

const char ssid[] = "Wokwi-GUEST";
const char pass[] = "";

// Nomor pin GPIO
const int pinRed = 2;
const int pinGreen = 4;
const int pinBlue = 16;
const int pinLED = 13;
const int pinServo = 18;
const int pinPot = 33;
const int pinDHT = 25;

int pot, oldPot = 0;

String serial_number = "12345678";

void setup() {
  pinMode(pinRed, OUTPUT);
  pinMode(pinGreen, OUTPUT);
  pinMode(pinBlue, OUTPUT);
  pinMode(pinLED, OUTPUT);
  servo.attach(pinServo, 500, 2400);
  pinMode(pinPot, INPUT);
  dhtSensor.setup(pinDHT, DHTesp::DHT22);
  
  WiFi.begin(ssid, pass);
  client.begin("kelasiot.cloud.shiftr.io", net);

  client.onMessage(subscribe);
  timer.setInterval(1000, publishPot);
  timer.setInterval(2000, publishDHT);

  connect();
}

void loop() {
  client.loop();
  timer.run();
  if(!client.connected()){
    connect();
  }

  delay(10);
}

void subscribe(String &topic, String &data){
  if(topic == "kelasiot/"+ serial_number +"/led"){
    if(data == "nyala"){
      digitalWrite(pinLED, 1);
    } else if(data == "mati"){
      digitalWrite(pinLED, 0);
    }
  }

  if(topic == "kelasiot/"+ serial_number +"/servo"){
    int posServo = data.toInt();
    servo.write(posServo);
  }
}

void publishPot(){
  pot = analogRead(pinPot);

  if(pot != oldPot){
    client.publish("kelasiot/"+ serial_number +"/potentiometer", String(pot), true, 1);
    oldPot = pot;
  }
}

void publishDHT(){
  TempAndHumidity  data = dhtSensor.getTempAndHumidity();

  client.publish("kelasiot/"+ serial_number +"/suhu", String(data.temperature, 2), true, 1);
  client.publish("kelasiot/"+ serial_number +"/kelembaban", String(data.humidity, 1), true, 1);
}

void rgb(bool red, bool green, bool blue){
  digitalWrite(pinRed, red);
  digitalWrite(pinGreen, green);
  digitalWrite(pinBlue, blue);
}

void connect(){
  rgb(1,0,0); // Merah
  while(WiFi.status() != WL_CONNECTED){
    delay(500);
  }
  rgb(0,1,0); // Hijau

  client.setWill("kelasiot/status/12345678", "offline", true, 1);
  while(!client.connect("clientid-unik", "kelasiot", "vwt5TSCSrqqSuqPR")){
    delay(500);
  }
  rgb(0,0,1); // Biru
  client.publish("kelasiot/status/12345678", "online", true, 1);
  client.subscribe("kelasiot/#", 1);  // Subscribe menggunakan QoS 1
}