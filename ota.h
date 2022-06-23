#include <WiFi.h>
#include "time.h"
#include <WiFiClient.h>
#include <WebServer.h>
#include <ESPmDNS.h>
#include <HTTPUpdateServer.h>


#ifndef STASSID
#define STASSID "Workshop Elka"
#define STAPSK  "gapakekabel"
#endif

const char* ssid = STASSID;
const char* password = STAPSK;
const char* host = "192.168.0.127";

WebServer httpServer(80);
HTTPUpdateServer httpUpdater;


void wifiSetup(){
  // Connect to Wi-Fi////////////////////////////////////
  Serial.print("Connecting to ");
  //setting koneksi Wifi
  Serial.println(ssid);
  WiFi.hostname("Indoor");
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("Wifi Terhubung");
}

void otaSetup(){
  httpUpdater.setup(&httpServer);
  httpServer.begin();

  MDNS.addService("http", "tcp", 80);
  Serial.println(WiFi.localIP());
  
}

void runOTA(){
   httpServer.handleClient();
}
