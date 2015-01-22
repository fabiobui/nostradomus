#include <OneWire.h> 
#include <SoftwareSerial.h>
#include <RCSwitch.h>

// pins
// RX 3 is physical pin 2 on attiny85
// TX 4 is physical pin 3 on attiny85
// ONE_WIERE_BUSS pin 0 on attiny85
// STATUS_LED = 1 green led pin 6 on attiny85
// FAN = 2 red led pin7 on attiny

#define ONEWIRE_BUSS 5
#define SERIAL_RX 0
#define SERIAL_TX 1
#define STATUS_LED  6
#define FAN 7

float celsius = 0;
String inputString = "";         // a string to hold incoming data

// set default value
int t_max = 22; 
int t_min = 19;
boolean main_sw = false; // general switch
int force_fan_sw  = 0; // force fan switch 0=auto
boolean fan_sw  = false; // fan switch status
boolean season  = false; // winter sesaon
boolean fan_status = false;

RCSwitch mySwitch = RCSwitch();
SoftwareSerial TinySerial(SERIAL_RX, SERIAL_TX); // RX, TX
 
OneWire TemperatureSensor(ONEWIRE_BUSS);  // Dallas one wire data buss pin, a 4.7K resistor pullup is needed

void blink(void){
    digitalWrite(STATUS_LED,HIGH);
    delay (250);
    digitalWrite(STATUS_LED,LOW);
    delay (175);
}

void readCommand(void){
     // send data only when you receive data:
   while (TinySerial.available() > 0) {
       char inChar = (char)TinySerial.read(); 
       inputString += inChar;
    //  TinySerial.println(inputString);
    // if the incoming character is a newline, set a flag
         if ((int)inChar == 13) {
         // TinySerial.println(inputString);  
         // first char is command, following chars are values
         // Example: H21 set temperatature high (max) to 21
         //          F1, fan on F2 fan off, F0 = auto (temperature driven)
         //          S0, season wintrer, S1 season summer
             char command = inputString[0];
             boolean swchar = (inputString[1]=='1');
             inputString = inputString.substring(1, inputString.length() - 1);
             switch (command) {
               case 'H':
                 if (inputString.toInt()>0) {
                    t_max = inputString.toInt();
                 }                 
               break;
               case 'L':
                 if (inputString.toInt()>0) {
                    t_min = inputString.toInt();
                 }                 
               break;
               case 'S':
                 season = swchar;
               break;  
               case 'F':
                 force_fan_sw = inputString.toInt();
               break;
               case 'M':
                 main_sw = swchar;
               break;                
             }
               
            inputString = "";
         }
    }  
}
 
void setup(void) {
  // Transmitter is connected to Arduino Pin #10  
    mySwitch.enableTransmit(10);

  // Optional set pulse length.
    mySwitch.setPulseLength(463);
  
  // Optional set protocol (default is 1, will work for most outlets)
  // mySwitch.setProtocol(2);
  
  // Optional set number of transmission repetitions.
  // mySwitch.setRepeatTransmit(15);  
   
    pinMode(STATUS_LED, OUTPUT);
    pinMode(FAN, OUTPUT);
    TinySerial.begin(9600);
 //   TinySerial.println(F("DS18x20 Temperature Switch"));
    inputString.reserve(200);
    sendRF(false); // default OFF
    
    blink();
    blink();
} 
 
 
void readTemp(void){
    byte i;
    byte data[12];
    int16_t raw;
    
    //ritardo di mezzo secondo
    delay(500);
 
    TemperatureSensor.reset();       // reset one wire buss
    TemperatureSensor.skip();        // select only device
    TemperatureSensor.write(0x44);   // start conversion
 
    delay(1000);                     // wait for the conversion
 
    TemperatureSensor.reset();
    TemperatureSensor.skip();
    TemperatureSensor.write(0xBE);   // Read Scratchpad
    for ( i = 0; i < 9; i++) {       // 9 bytes
      data[i] = TemperatureSensor.read();
    }
 
    // Convert the data to actual temperature
    raw = (data[1] << 8) | data[0];
    celsius = (float)raw / 16.0;
}

void sendRF(boolean send_st){
  if(send_st)
     mySwitch.sendTriState("FFFFF11F1000");
  else  
     mySwitch.sendTriState("FFFFF11F0010");
}

 
void loop()
{
    delay(10);
    readTemp();    
    TinySerial.print("T=");
    TinySerial.print(celsius);
    
    delay(10);
    readCommand();

// general switch ON ?   
    if(main_sw){
       digitalWrite(STATUS_LED,HIGH);
       TinySerial.print("|MS=ON");
       if(force_fan_sw==1)  {
           fan_sw = true;
           force_fan_sw = 0;
        } else if(force_fan_sw==2) {
            fan_sw = false;
            force_fan_sw = 0;
        } else { // auto mode
          if(season){ 
       // summer
             if(celsius>t_min) fan_sw = true;
             if(celsius<t_max) fan_sw = false;             
          } else {
       // winter   
            if(celsius<t_min) fan_sw = true;
            if(celsius>t_max) fan_sw = false;
          }
        }       
    } else {
       // force off everywhere
       digitalWrite(STATUS_LED,LOW);
       digitalWrite(FAN,LOW);
       TinySerial.print("|MS=OFF");
       if (fan_status) sendRF(false);
       fan_sw = false;
       fan_status = false;
       force_fan_sw = false;       
    }
    if(fan_sw && !fan_status){
       blink(); 
       digitalWrite(STATUS_LED,HIGH);
       sendRF(true);
       fan_status = true;       
    } 
    if(!fan_sw && fan_status){
       blink(); 
       blink();
       digitalWrite(STATUS_LED,HIGH);
       sendRF(false);
       fan_status = false;       
    } 

    if(fan_status){
      TinySerial.print("|FAN=ON");
      digitalWrite(FAN,HIGH);
    } else {
      TinySerial.print("|FAN=OFF");
      digitalWrite(FAN,LOW);
    }
    
    if(season)
      TinySerial.print("|S=summer");
    else
      TinySerial.print("|S=winter"); 
    TinySerial.print("|Tmin=");
    TinySerial.print(t_min);
    TinySerial.print("|Tmax=");
    TinySerial.println(t_max);        

}
