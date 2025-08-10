-- secure DB: least privilege, internal network only
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

-- Application user: only the operations the app needs
CREATE USER IF NOT EXISTS 'app_user'@'%' IDENTIFIED BY 'app_pass';
GRANT SELECT, UPDATE ON bank.accounts TO 'app_user'@'%';

-- Read-only viewer for BI: via a view
CREATE USER IF NOT EXISTS 'bank_reader'@'%' IDENTIFIED BY 'reader_pass';
CREATE OR REPLACE VIEW account_view AS
  SELECT id, name, balance FROM accounts;
GRANT SELECT ON bank.account_view TO 'bank_reader'@'%';

FLUSH PRIVILEGES;
