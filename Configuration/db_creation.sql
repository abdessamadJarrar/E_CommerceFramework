CREATE DATABASE IF NOT EXISTS E_Commerce_FrameWork;
USE E_Commerce_FrameWork;

CREATE TABLE Categories
(Id_c INT PRIMARY KEY AUTO_INCREMENT,
  Name_c VARCHAR(50) NOT NULL);

CREATE TABLE Products
(Id_p INT PRIMARY KEY AUTO_INCREMENT,
  Name_p VARCHAR(100) NOT NULL,
  Price_p FLOAT NOT NULL,
  Description_p TEXT,
  Id_c INT,
  CONSTRAINT Product_fk FOREIGN KEY(Id_c) REFERENCES Categories(Id_c));

CREATE TABLE Images
(Id_i INT PRIMARY KEY AUTO_INCREMENT,
  Url_i VARCHAR(100) NOT NULL,
  Type_i ENUM('Main','Secondary'),
  Id_p INT,
  CONSTRAINT Image_fk FOREIGN KEY(Id_p) REFERENCES Products(Id_p));

Create TABLE Users
(Id_u INT PRIMARY KEY AUTO_INCREMENT,
  Email_u VARCHAR(100) NOT NULL,
  Password_u CHAR(40) NOT NULL,
  First_Name_u VARCHAR(50),
  Last_Name_u VARCHAR(50),
  Sexe_u ENUM('MALE','FEMALE'),
  Countery_u VARCHAR(30),
  City_u VARCHAR(30),
  Phone_u VARCHAR(20),
  Adress_u VARCHAR(100),
  Date_of_Birth_u DATE);

CREATE TABLE Orders
(Id_o INT PRIMARY KEY AUTO_INCREMENT,
  Date_o DATETIME NOT NULL,
  Qte_o INT NOT NULL,
  Id_p INT,
  Id_u INT,
  CONSTRAINT Order_fk1 FOREIGN KEY(Id_p) REFERENCES Products(Id_p),
  CONSTRAINT Order_fk2 FOREIGN KEY(Id_u) REFERENCES users(Id_u));
