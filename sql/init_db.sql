# Use this when running locally
# purge old database

-- DROP DATABASE edcamps;

-- CREATE DATABASE edcamps;

-- USE edcamps;

# Use this when running on DC
USE sdb_rrishi;
DROP TABLE activities;
DROP TABLE campsites;
DROP TABLE addresses;
DROP TABLE inventory;
DROP TABLE users;
DROP TABLE campers;
DROP TABLE camp_sessions;
DROP TABLE registrations;
DROP TABLE questions;

# Use everthing else on both DC and when running locally
CREATE TABLE activities(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name TINYTEXT NOT NULL,
  description TEXT NOT NULL,
  image_url TEXT
);

CREATE TABLE campsites(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name TINYTEXT NOT NULL,
  office_address_id INT NOT NULL,
  campsite_address_id INT NOT NULL,
  phone TINYTEXT
);

CREATE TABLE addresses(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  address_1 TINYTEXT NOT NULL,
  address_2 TINYTEXT,
  address_3 TINYTEXT,
  city TINYTEXT NOT NULL,
  state TINYTEXT NOT NULL,
  zip INT
);

CREATE TABLE inventory(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name TINYTEXT NOT NULL,
  price DECIMAL(13,4) NOT NULL,
  image_url TEXT,
  remaining INT
);

CREATE TABLE users(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name TINYTEXT NOT NULL,
  last_name TINYTEXT NOT NULL,
  email TINYTEXT NOT NULL,
  phone TINYTEXT
);

CREATE TABLE campers(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name TINYTEXT NOT NULL,
  last_name TINYTEXT NOT NULL,
  dob DATE NOT NULL,
  grade INT NOT NULL,
  notes TEXT,
  parent1_id INT NOT NULL,
  parent2_id INT
);

CREATE TABLE camp_sessions(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  campsite_id INT NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  base_price DECIMAL(13,4) NOT NULL
);

CREATE TABLE registrations(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  camper_id INT NOT NULL,
  session_id INT NOT NULL # relates to camp_sessions table
);

CREATE TABLE questions(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  question TEXT,
  answer TEXT
);
