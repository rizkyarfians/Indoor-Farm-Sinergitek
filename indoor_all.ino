#include "ota.h"
#include "kontrol.h"
#include "json.h"

void setup() {
  Serial.begin(115200);
  kontrolSetup();
  sensorSetup();
  otaSetup();
  wifiSetup();
}

void loop() {
  timerRelay();
  runOTA();
  WiFiClient client;
  if(!client.connect(host,80)){
    Serial.println("Connection Failed");
    return;
  }
  sendDataSensor();
  
  delay(10000);
}
