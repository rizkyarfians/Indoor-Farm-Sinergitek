#include "DFRobot_VEML7700.h"
#include <Wire.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_BME280.h>
#include <math.h>
#include "DFRobot_EC10.h"

#define EC_PIN 32
#define TdsSensorPin 35
#define VREF 3.3     // analog reference voltage(Volt) of the ADC
#define SCOUNT  30           // sum of sample point

float voltage,ecValue,temperature = 25;
int analogBuffer[SCOUNT];    // store the analog value in the array, read from ADC
int analogBufferTemp[SCOUNT];
int analogBufferIndex = 0,copyIndex = 0;
float averageVoltage = 0,tdsValue = 0;

// ==============Sensor============= 

DFRobot_VEML7700 als;
DFRobot_EC10 ec;
Adafruit_BME280 bme; // I2C


void sensorSetup(){
  als.begin();   // Init
  ec.begin();
  pinMode(TdsSensorPin,INPUT);
  bool status;
 status = bme.begin(0x76);  
 if (!status) {
    Serial.println("Could not find a valid BME280 sensor, check wiring!");
    while (1);
 }
}

int ecSensorRead(){ 
      voltage = analogRead(EC_PIN)/4096.0*3300;  // read the voltage
      float y;
      y = 0.0658* ecValue +0.1302;
      Serial.print("voltage:");
      Serial.print(voltage);
      //temperature = readTemperature();  // read your temperature sensor to execute temperature compensation
      ecValue =  ec.readEC(voltage,temperature);  // convert voltage to EC with temperature compensation
      Serial.print("  temperature:");
      Serial.print(temperature,1);
      Serial.print("^C  EC:");
      Serial.print(ecValue,1);
      Serial.println("ms/cm");
      Serial.print(y);
      Serial.println("ms/cm");
      delay(1000);
      return y;
}

int getMedianNum(int bArray[], int iFilterLen) 
{
      int bTab[iFilterLen];
      for (byte i = 0; i<iFilterLen; i++)
      bTab[i] = bArray[i];
      int i, j, bTemp;
      for (j = 0; j < iFilterLen - 1; j++) 
      {
      for (i = 0; i < iFilterLen - j - 1; i++) 
          {
        if (bTab[i] > bTab[i + 1]) 
            {
        bTemp = bTab[i];
            bTab[i] = bTab[i + 1];
        bTab[i + 1] = bTemp;
         }
      }
      }
      if ((iFilterLen & 1) > 0)
    bTemp = bTab[(iFilterLen - 1) / 2];
      else
    bTemp = (bTab[iFilterLen / 2] + bTab[iFilterLen / 2 - 1]) / 2;
      return bTemp;
}


int tdsSensorRead()
{
  static unsigned long analogSampleTimepoint = millis();
   if(millis()-analogSampleTimepoint > 40U)     //every 40 milliseconds,read the analog value from the ADC
   {
     analogSampleTimepoint = millis();
     analogBuffer[analogBufferIndex] = analogRead(TdsSensorPin);    //read the analog value and store into the buffer
     analogBufferIndex++;
     if(analogBufferIndex == SCOUNT) 
         analogBufferIndex = 0;
   }   
   static unsigned long printTimepoint = millis();
   
      printTimepoint = millis();
      for(copyIndex=0;copyIndex<SCOUNT;copyIndex++)
        analogBufferTemp[copyIndex]= analogBuffer[copyIndex];
      averageVoltage = getMedianNum(analogBufferTemp,SCOUNT) * (float)VREF / 4096.0; // read the analog value more stable by the median filtering algorithm, and convert to voltage value
      float compensationCoefficient=1.0+0.02*(temperature-25.0);    //temperature compensation formula: fFinalResult(25^C) = fFinalResult(current)/(1.0+0.02*(fTP-25.0));
      float compensationVolatge=averageVoltage/compensationCoefficient;  //temperature compensation
      tdsValue=(133.42*compensationVolatge*compensationVolatge*compensationVolatge - 255.86*compensationVolatge*compensationVolatge + 857.39*compensationVolatge)*0.5; //convert voltage value to tds value;
      float tdsCal;
      tdsCal = (1.1724 * tdsValue) + 12.343;
      Serial.print("TDS Value:");
      Serial.print(tdsCal);
      Serial.println("ppm");
      delay(1000);
      return tdsCal;
      
}


float intensitasCahaya(){
  float lux;
  als.getALSLux(lux);   // Get the measured ambient light value
  lux = (1.0159*(lux)) - 3.5433;
  return lux;
}

int suhu(){
  float suhu = bme.readTemperature();
  suhu = (0.1351 * suhu) + 26.754;
  return suhu;
}

int kelembapan(){
  float kelembapan = bme.readHumidity();
  kelembapan = (1.2901*kelembapan) - 18.716;
  return kelembapan;
}
