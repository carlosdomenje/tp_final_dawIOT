/*==================[ file header ]==========================================*/
// File:    main.cpp
// Author:  Agustin Bassi (https://github.com/agustinBassi)
// Licence: GPLV3+
// Version: 1.0.0
// Date:    July 2020
/*==================[inclusions]=============================================*/

#include <WiFi.h>
#include <PubSubClient.h>

/*==================[macros and definitions]=================================*/

// APPLICATION SETTINGS
#define LED_ONBOARD                 2
#define INIT_DELAY                  3000
#define SERIAL_BAURDATE             115200
#define WIFI_CONNECTION_DELAY       500
#define MQTT_RETRY_CONNECTION_DELAY 5000
#define BLINK_TIME                  100
#define DEFAULT_PUBLISH_TIME        5000
#define MIN_PUBLISH_TIME            1000
#define MAX_PUBLISH_TIME            10000

/*==================[internal data declaration]==============================*/

// Client to establish WiFi connection
WiFiClient WifiClient;
// Client MQTT, needs a WiFi connection
PubSubClient MqttClient(WifiClient);
// Variable to change report time
static uint32_t PublishTime = DEFAULT_PUBLISH_TIME;

/*==================[internal functions declaration]=========================*/

void Gpio_BlinkLed           (uint8_t led, uint32_t milliseconds);
void Wifi_EstablishConnection(void);
void Mqtt_ConnectToBroker    (void);
void Mqtt_PublishTopic       (String topic, String payload);
void Mqtt_SubscribeCallback  (char* topic, byte* payload, unsigned int length);
void App_Init                (void);
void App_Loop                (void);

/*==================[internal data definition]===============================*/

// Device indentification
const String DEVICE_ID           = WiFi.macAddress();
// Wifi settings
const String WIFI_SSID           = "SiidWIFI";
const String WIFI_PASS           = "00917896";
// Mqtt server settings
const String MQTT_SERVER         = "192.168.90.115";
const int    MQTT_PORT           = 1883;
const String MQTT_USER           = "amuhptdk";
const String MQTT_PASS           = "UEbeNKC89hUZ";
// Mqtt message settings
const String MQTT_TOPIC_STATUS   = DEVICE_ID + "/status";
const String MQTT_TOPIC_LED      = DEVICE_ID + "/led";
const String MQTT_TOPIC_RANDOM   = DEVICE_ID + "/value";

uint8_t counter = 0;
/*==================[external data definition]===============================*/

/*==================[internal functions definition]==========================*/

void Gpio_BlinkLed(uint8_t led, uint32_t milliseconds){
    // Blink on board led when topic is sended
    digitalWrite(led, true);
    delay(milliseconds);
    digitalWrite(led, false);
}

void Wifi_EstablishConnection(){
    // Print network SSID
    Serial.println();
    Serial.print("Connecting to ");
    Serial.println(WIFI_SSID);
    // Try to connect
    WiFi.begin(WIFI_SSID.c_str(), WIFI_PASS.c_str());
    // Wait until connection is established
    while (WiFi.status() != WL_CONNECTED) {
        delay(WIFI_CONNECTION_DELAY);
        Serial.print(".");
    }
    // Report IP address
    Serial.println("");
    Serial.println("WiFi connected");
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP());
}

void Mqtt_ConnectToBroker(){
    // Loop until we're reconnected
    while (!MqttClient.connected()) {
        Serial.print("Attempting MQTT connection...");
        // Attempt to connect
        if (MqttClient.connect(DEVICE_ID.c_str())) {
            Serial.println("connected");
            // Subscribe to topic
            MqttClient.subscribe(MQTT_TOPIC_LED.c_str());
            // Publish that device is ready
            //Mqtt_PublishTopic((String)MQTT_TOPIC_STATUS, "up");
        } else {
            Serial.print("failed, rc = ");
            Serial.print(MqttClient.state());
            Serial.println(". Try again in MQTT_RETRY_CONNECTION_DELAY ms.");
            // Wait 5 seconds before retrying
            delay(MQTT_RETRY_CONNECTION_DELAY);
        }
    }
}

void Mqtt_PublishTopic(String topic, String payload){
    // Print in console the topic-payload that will be sent
    Serial.print("Sending MQTT Topic-Payload: ");
    Serial.print(topic);
    Serial.print(" -> ");
    Serial.println(payload);
    // Publish message
    MqttClient.publish( topic.c_str(), payload.c_str(), true );
}

void Mqtt_SubscribeCallback(char* topic, byte* payload, unsigned int length){
    // At first check if topic arrived is some of expected topics
    if (strcmp(topic, MQTT_TOPIC_LED.c_str()) == 0){
        // put null char to payload buffer
        payload[length] = '\0';
        // Compare the topic payload to expected values
        if( (strcmp((char *)payload, "on") == 0) || (strcmp((char *)payload, "off") == 0) ){
            bool status = false;   
            // set the LED status depending on the payload
            if(strcmp((char *)payload, "on") == 0){
                status = true;         
            } 
            digitalWrite(LED_ONBOARD, status);
            if (status){
                Mqtt_PublishTopic(MQTT_TOPIC_STATUS, "on");
            }else{
                 Mqtt_PublishTopic(MQTT_TOPIC_STATUS, "off");
            }
            
            // Report the action in console
            Serial.print("Changing the LED status to: ");
            Serial.println(status);
        } else {
            Serial.println("Invalid LED status. It must be 'on' or 'off'.");
        }
    } else {
        Serial.println("Unknown topic received!");
    }
}

void App_Init(){
    // wait a moment before start
    delay(INIT_DELAY);
    // Configure serial port at 115200 baudrios
    Serial.begin(SERIAL_BAURDATE);
    // Configure pins of buttons and leds
    pinMode(LED_ONBOARD, OUTPUT);
    // print to console Init message
    Serial.println("Welcome to Cloud MQTT connection test!");
    // Set MQTT Server
    MqttClient.setServer(MQTT_SERVER.c_str(), MQTT_PORT);
    // Configure a callback to receive topics
    MqttClient.setCallback(Mqtt_SubscribeCallback);
    // Connect to WiFi
    Wifi_EstablishConnection();
    // Leave built in led on
    digitalWrite(LED_ONBOARD, false);
}

void App_Loop(){
    // Check if MQTT client is not connected to server.
    if (!MqttClient.connected()) {
        // Try to connect with MQTT Server.
        Mqtt_ConnectToBroker();
    }
    MqttClient.loop();
    // Loop for incoming messages.
    if (counter >= 50){
        counter = 0;
        int aleatorio = random(20,50);
        String aleatorioString = String(aleatorio);
        char alea[6];
        aleatorioString.toCharArray(alea, 6);

        Mqtt_PublishTopic(MQTT_TOPIC_RANDOM, alea);
    }
    counter++;
    
    

    // Wait 5 s.
    delay(100);
    
}
    
/*==================[external functions definition]==========================*/

void setup(){
    App_Init();
}

void loop(){
    App_Loop();
}

/*==================[end of file]============================================*/