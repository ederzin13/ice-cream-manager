SET foreign_key_checks = 0;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    encrypted_password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'client') DEFAULT 'client' NOT NULL,
    UNIQUE KEY uq_users_email (email)
) ENGINE=InnoDB;

SET foreign_key_checks = 1;