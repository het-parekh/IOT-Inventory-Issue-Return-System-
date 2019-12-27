CREATE TABLE `Students` (
  `Rollno` int,
  `S_name` varchar(255),
  `c_ID` varchar(255),
  `Group` varchar(255),
  `Dept_name` varchar(255),
  PRIMARY KEY (`Rollno`, `Group`)
);

CREATE TABLE `components` (
  `c_ID` varchar(255) PRIMARY KEY,
  `c_Name` varchar(255),
  `Quantity` int,
  `price` int,
  `images` varchar(255)
);
INSERT INTO Components VALUES
    ('1','ARDUINO UNO R3','L',21,7945),
    ('12','BREAD BOARD','L',24,1490),
    ('15','JUMPER WIRES (ALL TYPES)','L',17,85),
    ('16','RASPBERRY PI MODEL 3B','L',10,29500),
    ('24','USB TO MICRO USB CABLE','L',4,240),
    ('36','SERVO MOTOR SG-90','L',11,1190),
    ('35','2-CHANNEL RELAY','M',6,700),
    ('4','16*2 LCD DISPLAY','M',17,1700),
    ('6','9V BATTERY','M',17,272),
    ('8','BATTERY HOLDER BOX','M',17,1190),
    ('19','HDMI TO VGA CONVERTER','M',10,2450),
    ('28','IR REMOTE','M',4,680),
    ('29','DHT-11 TEMPRATURE AND HUMIDITY SENSOR','M',14,1310),
    ('37','L298 DRIVER','M',4,500),
    ('38','DC MOTOR 500RPM WITH WHEEL','M',4,640),
    ('41','L293 DRIVER','M',5,400),
    ('45','MOTOR','M',10,650),
    ('48','PI CAMERA','M',3,1350),
    ('52','TP 4056 LI-ON CHARGER','M',2,130),
    ('62','SOLONOID 12V DC','M',1,300),
    ('70','GSM MODULE (SIM-900)','M',2,1560),
    ('2','ARDUINO PRO MINI','M',17,3740),
    ('3','7-SEGMENT LED DISPLAY','M',17,119),
    ('26','HC-SR-04 ULTRASONIC DISTANCE SENSOR','M',4,380),
    ('30','GAS SENSOR','M',4,1180),
    ('33','PIR MOTION SENSOR','M',5,450),
    ('50','ARDUINO MEGA 2560','M',1,700),
    ('53','2200 MaH BATTERY','M',1,1350),
    ('54','MQ-03 GAS SENSOR MODULE','M',1,150),
    ('57','MQ-135 GAS SENSOR MODULE','M',2,300),
    ('72','PH SENSOR','M',1,1850),
    ('74','HEART BEAT SENSOR','M',4,1180),
    ('34','SOIL MOISTURE SENSOR','S',4,600),
    ('42','CASTOR WHEELS','S',7,405),
    ('44','RFID KIT','S',10,1500),
    ('68','PARALLAX PAM','S',1,65),
    ('7','9V BATTERY CONNECTORS','S',17,85),
    ('9','4*4 MATRIX KETPAD','S',17,1275),
    ('11','LED (R-G-B)','S',17,238),
    ('14','DC JACK MALE','S',17,255),
    ('20','CARD READER','S',10,2250),
    ('22','WIFI MODULE (ESP 8266) NODE MCU','S',11,2580),
    ('23','WIFI ESP-01','S',4,720),
    ('25','HC-05 BLUETOOTH MODULE','S',9,2500),
    ('27','IR PROXIMITY SENSOR','S',4,208),
    ('32','FTDI TO TTL CONVERTER','S',4,560),
    ('43','RTC MODULE 1307','S',12,1030),
    ('47','LM317','S',1,10),
    ('51','SHAFT 6MM','S',1,25),
    ('58','WROOM ESP 32','S',1,550),
    ('59','ADXL 1335 ACCELROMETER SENSOR','S',1,250),
    ('69','GPS MODULE','S',1,450),
    ('71','10K POT','S',2,20),
    ('73','HEART BEAT MODULE','S',1,250),
    ('75','ADAFRUIT HML5883L','S',1,200),
    ('10','PUSH BUTTON SWITCHES','S',19,57),
    ('13','BUZZER','S',17,340),
    ('21','MICRO SD CARD (16GB)','S',10,3900),
    ('31','LIGHT DEPENDENT RESISTOR (LDR)','S',14,80),
    ('63','IRF 540 MOSFET','S',1,20),
    ('64','BC 547 TRANSISTOR','S',2,6),
    ('66','7805','S',1,10),
    ('67','7892','S',1,10),
    ('5','5V 1A DC ADAPTER',NULL,17,1615),
    ('17','RASPBERRY PI CASE',NULL,10,1300),
    ('18','RASPBERRY PI ADAPTER',NULL,10,2500),
    ('39','CHASIS',NULL,4,220),
    ('40','WHEELS',NULL,8,280),
    ('46','CABLE',NULL,3,105),
    ('55','SOLAR PANEL 4*4',NULL,1,350),
    ('56','ADAPTOR',NULL,3,210),
    ('65','ADAPTOR FOR GSM',NULL,1,130),
    ('49','1-CHANNEL RELAY',NULL,1,50),
    ('60','LED (RED)',NULL,65,65),
    ('61','LED (YELLOW)',NULL,10,10);

CREATE TABLE `issue` (
  `Dept_name` varchar(255),
  `Rollno` int NOT NULL,
  `Group_id` varchar(255) NOT NULL,
  `c_ID` varchar(255) NOT NULL,
  `issue_date` timestamp()
);

CREATE TABLE `Group` (
  `Rollno` int,
  `Group_id` varchar(255)
);
create table 'login_details'(
 username varchar(255),
 password varchar(255)
);
insert into login_details values('vishal01','vishal'),('raza02','raza');
ALTER TABLE `issue` ADD FOREIGN KEY (`c_ID`) REFERENCES `Students` (`Group`);
create TABLE log_history (
  issue_date time_stamp(),
  logs varchar(255),
  comp_name
  );
