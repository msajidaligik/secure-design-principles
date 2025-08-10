-- insecure DB: overly-privileged users, DB port exposed
CREATE DATABASE IF NOT EXISTS bank;
USE bank;

CREATE TABLE IF NOT EXISTS accounts (
  id INT PRIMARY KEY,
  name VARCHAR(50),
  balance DECIMAL(12,2)
);

INSERT INTO accounts (id, name, balance) VALUES
(1, 'Alice', 1000.00),
(2, 'Bob', 500.00);

-- Overly privileged DB user (simulates poor practice)
CREATE USER IF NOT EXISTS 'bank_user'@'%' IDENTIFIED BY 'bankpass';
GRANT ALL PRIVILEGES ON bank.* TO 'bank_user'@'%';

-- App user (also overly privileged here)
CREATE USER IF NOT EXISTS 'app_user'@'%' IDENTIFIED BY 'app_pass';
GRANT ALL PRIVILEGES ON bank.* TO 'app_user'@'%';

FLUSH PRIVILEGES;
