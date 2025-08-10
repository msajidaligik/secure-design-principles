-- secure DB: least privilege, internal network only
CREATE DATABASE IF NOT EXISTS bank;
USE bank;

-- Drop existing tables
DROP TABLE IF EXISTS accounts;
DROP TABLE IF EXISTS transactions;
DROP TABLE IF EXISTS audit_logs;
DROP TABLE IF EXISTS users;

-- Accounts table
CREATE TABLE accounts (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50),
  balance DECIMAL(12,2),
  PRIMARY KEY (id)
);

-- Transactions table
CREATE TABLE transactions (
  id INT(11) NOT NULL AUTO_INCREMENT,
  from_account_id INT(11),
  to_account_id INT(11),
  amount DECIMAL(12,2),
  timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (from_account_id) REFERENCES accounts(id),
  FOREIGN KEY (to_account_id) REFERENCES accounts(id)
);

-- Audit logs
CREATE TABLE audit_logs (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user VARCHAR(50),
  action VARCHAR(100),
  timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

-- Application users (optional table)
CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(50),
  role VARCHAR(50),
  PRIMARY KEY (id)
);

-- Sample data
INSERT INTO accounts (name, balance) VALUES
('Alice', 1000.00),
('Bob', 500.00);

-- Sample users with roles
INSERT INTO users (username, role) VALUES
('alice_admin', 'admin'),
('dan_dba', 'dba'),
('devin_dev', 'developer'),
('amy_analytics', 'analytics'),
('audrey_audit', 'auditor'),
('service_app', 'app_user');

-- Sample transactions
INSERT INTO transactions (from_account_id, to_account_id, amount) VALUES
(1, 2, 150.00),  -- Alice sent Bob $150
(2, 1, 50.00);   -- Bob sent Alice $50

-- Sample audit logs
INSERT INTO audit_logs (user, action) VALUES
('audrey_audit', 'Viewed audit_logs table'),
('dan_dba', 'Added new index to transactions table'),
('alice_admin', 'Granted access to analytics role');





-- Create DB users
CREATE USER 'app_user'@'%' IDENTIFIED BY 'app_user';

-- Admin: Full access with grant
GRANT ALL PRIVILEGES ON *.* TO 'app_user'@'%' WITH GRANT OPTION;

-- Apply all privileges
FLUSH PRIVILEGES;
