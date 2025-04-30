
-- Membuat database
CREATE DATABASE IF NOT EXISTS login_db;
USE login_db;

-- Membuat tabel users
CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);
