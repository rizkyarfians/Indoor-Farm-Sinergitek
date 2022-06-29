#include <HTTPClient.h>
#include <ArduinoJson.h>
#include "sensor.h"

void sendDataSensor(){
  StaticJsonDocument<200> val;
  String jsonVal;
  val["device_id"] = "hidro-1";
  val["suhu_udara"] = suhu();
  val["kelembapan_udara"] =kelembapan();
  val["intensitas_cahaya"] = intensitasCahaya();
  val["tds"] = tdsSensorRead();
  val["ec"] = ecSensorRead();
  serializeJson(val,jsonVal);
  String Link;
  Link = "http://192.168.0.127/api-mbkm/indoor/sensor-insert.php";
  HTTPClient http;
  http.begin(Link);
  http.addHeader("Content-Type", "application/json");   
  int httpResponse = http.POST(jsonVal);
  if(httpResponse > 0){
    String response = http.getString();
    Serial.println(response);
    Serial.println(httpResponse);
  }
  
  Serial.println(httpResponse);
  Serial.println(http.GET());
  Serial.print("JSON : ");
  Serial.println(jsonVal);
  http.end();
}
