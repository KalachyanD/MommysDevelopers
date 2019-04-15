CREATE DATABASE forum;
GRANT ALL ON forum.* TO 'admin'@'localhost' IDENTIFIED BY 'password';
USE forum;
CREATE TABLE passwords(email VARCHAR(129), password VARCHAR(8));
INSERT INTO passwords(email, password) VALUES(admin,admin);