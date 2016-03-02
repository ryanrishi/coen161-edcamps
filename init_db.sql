# purge old database
DROP DATABASE edcamps;

CREATE DATABASE edcamps;

USE edcamps;

CREATE TABLE activities(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(20),
  description VARCHAR(160)
);

CREATE TABLE campsites(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  address_id INT,
  phone VARCHAR(10)
);

CREATE TABLE addresses(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  address_1 VARCHAR(80),
  address_2 VARCHAR(80),
  address_3 VARCHAR(30),
  city VARCHAR(20),
  state VARCHAR(20),
  zip INT
);

CREATE TABLE inventory(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(20),
  price DECIMAL(13,4),
  remaining INT
);

CREATE TABLE users(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(20) NOT NULL,
  phone VARCHAR(10)
);

CREATE TABLE campers(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(20) NOT NULL,
  parent1_id INT NOT NULL,
  parent2_id INT
);
