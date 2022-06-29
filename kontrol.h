#include "time.h"
#include<ArduinoJson.h>
#include <HTTPClient.h>

const char* ntpServer = "pool.ntp.org";
const long  gmtOffset_sec = 21600;
const int   daylightOffset_sec = 3600;
const int relayLED = 2;
const int relayPompa = 4;


///=======BTS7960=======/                                 
int Rpwm = 12;
int Lpwm = 13;
int Ren = 14;

const int R_freq = 30000;
const int R_channel = 0;
const int R_res = 8;

const int L_freq = 30000;
const int L_channel = 1;
const int L_res = 8;

///=======L298N=======/
int motor1Pin1 = 27;
int motor1Pin2 = 26;
int motor2Pin1 = 25;
int motor2Pin2 = 33;



void kontrolSetup(){
  pinMode(relayLED, OUTPUT);
  pinMode(relayPompa, OUTPUT);
  pinMode(motor1Pin1, OUTPUT);
  pinMode(motor1Pin2, OUTPUT);
  pinMode(motor2Pin1, OUTPUT);
  pinMode(motor2Pin2, OUTPUT);
  digitalWrite(relayPompa, HIGH);
  configTime(gmtOffset_sec, daylightOffset_sec, ntpServer);
  pinMode(Rpwm, OUTPUT);
  pinMode(Lpwm, OUTPUT);
  pinMode(Ren, OUTPUT);

  ledcSetup(R_channel, R_freq, R_res);
  ledcSetup(L_channel, L_freq, L_res);
  ledcAttachPin(Rpwm, R_channel);
  ledcAttachPin(Lpwm, L_channel);
}

void pumpABMix() {
  digitalWrite(motor1Pin1, LOW);
  digitalWrite(motor1Pin2, HIGH);
  digitalWrite(motor2Pin1, HIGH);
  digitalWrite(motor2Pin2, LOW);
  delay(10000);
  digitalWrite(motor1Pin1, LOW);
  digitalWrite(motor1Pin2, LOW);
  digitalWrite(motor2Pin1, LOW);
  digitalWrite(motor2Pin2, LOW);
  delay(5000);

}

void BTS7960_ON () {
  digitalWrite(Ren, HIGH);
  ledcWrite(R_channel, 255);
  ledcWrite(L_channel, 0);
}

void BTS7960_OFF () {
  digitalWrite(Ren, HIGH);
  ledcWrite(R_channel, 0);
  ledcWrite(L_channel, 0);
}

void timerRelay() {
  struct tm timeinfo;
  StaticJsonDocument<200> control;
  String jsonKontrol;
  if (!getLocalTime(&timeinfo)) {
    Serial.println("Failed to obtain time");
    control["get_time"] = "failed";
    return;
    
  }
  char timeHour[3];
  char minutes[3];
  strftime(timeHour, 3, "%H", &timeinfo);
  strftime(minutes, 3, "%M", &timeinfo);
  String jam = String(timeHour);
  String menit = String(minutes);
  
  control["device_id"] = "hidro-1";
  control["pompa_air"] = true;
  control["get_time"] = "success";
  control["menit"] = menit;
  control["jam"] = jam;
  if(jam.toInt() >= 6 && jam.toInt() <= 15) {
    digitalWrite(relayLED, LOW);
    BTS7960_ON();
    control["led"] = true;
    control["kipas"] = 255;
    control["menit"] = menit.toInt();
    control["jam"] = jam.toInt();
  }
  else {
    BTS7960_OFF();
      digitalWrite(relayLED, HIGH);
    control["led"] = false;
    control["kipas"] = 0;
    control["pompa_a"] = false;
    control["pompa_b"] = false;
  }
  if((jam.toInt() == 10 && menit.toInt() == 30)  || (jam.toInt() == 15 && menit.toInt() == 30)){
      pumpABMix();
      control["pompa_a"] = true;
      control["pompa_b"] = true;
   }
  serializeJson(control,jsonKontrol);
  String Link;
  Link = "http://192.168.0.127/api-mbkm/indoor/kontrol-insert.php";
  HTTPClient http;
  http.begin(Link);
  http.addHeader("Content-Type", "application/json");   
  int httpResponse = http.POST(jsonKontrol);
  if(httpResponse > 0){
    String response = http.getString();
  }
  
  Serial.println(httpResponse);
  Serial.println(http.GET());
  http.end();
}
