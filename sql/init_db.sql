# purge old database
DROP DATABASE edcamps;

CREATE DATABASE edcamps;

USE edcamps;

CREATE TABLE activities(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  description VARCHAR(160) NOT NULL
);

CREATE TABLE campsites(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  office_address_id INT NOT NULL,
  campsite_address_id INT NOT NULL,
  phone VARCHAR(10)
);

CREATE TABLE addresses(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  address_1 VARCHAR(80) NOT NULL,
  address_2 VARCHAR(80),
  address_3 VARCHAR(30),
  city VARCHAR(20) NOT NULL,
  state VARCHAR(20) NOT NULL,
  zip INT
);

CREATE TABLE inventory(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  price DECIMAL(13,4) NOT NULL,
  remaining INT
);

CREATE TABLE users(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(20) NOT NULL,
  email VARCHAR(30) NOT NULL,
  phone VARCHAR(10) NOT NULL
);

CREATE TABLE campers(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(20) NOT NULL,
  dob DATE NOT NULL,
  grade INT NOT NULL,
  notes VARCHAR(40),
  parent1_id INT NOT NULL,
  parent2_id INT
);

CREATE TABLE camp_sessions(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  campsite_id INT NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL
);
