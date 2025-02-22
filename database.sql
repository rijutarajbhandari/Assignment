CREATE DATABASE assignment_db;
USE assignment_db;

CREATE TABLE posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    icon VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    desp TEXT NOT NULL
);

INSERT INTO posts(icon,title,descp) VALUES
("C:/xampp/htdocs/EBPearls/Assignment/img/secpay.jpg","Secure Payments","We provide the best security for payments"),
("C:/xampp/htdocs/EBPearls/Assignment/img/fasttrans.jpg","Fast Transactions","All transactions are completed within seconds"),
("C:/xampp/htdocs/EBPearls/Assignment/img/globalaccess.jpg","Global Access","Send and receive money from anywhere in the world");

