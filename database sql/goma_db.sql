CREATE DATABASE IF NOT EXISTS GOMA;

USE GOMA;

CREATE TABLE IF NOT EXISTS Client (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) NOT NULL,
    nif int NOT NULL,
    phone varchar(50) NOT NULL,
    address varchar(100) NOT NULL,
    city varchar(50) NOT NULL,
    country varchar(50) NOT NULL
    )