CREATE DATABASE lottery;

USE lottery;

--empresa
DROP TABLE IF EXISTS info;

CREATE TABLE info (
  info_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  info_nombre VARCHAR(100),
  logo VARCHAR(10)
) ENGINE = InnoDB;

INSERT INTO
  info
VALUES
  (1, "Lottery", null);

--user
DROP TABLE IF EXISTS user;

CREATE TABLE user (
  user_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_name VARCHAR(100),
  user_photo VARCHAR(10),
  user_user VARCHAR(100),
  user_pass VARCHAR(100),
  user_type INT(1)
) ENGINE = InnoDB;

INSERT INTO
  user
VALUES
  (
    1,
    "Administrador",
    null,
    "admin",
    "admin",
    1
  );

--lottery_table
DROP TABLE IF EXISTS lottery_table;

CREATE TABLE lottery_table (
  lottery_table_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  lottery_table_name VARCHAR(100),
  lottery_table_date VARCHAR(100),
  lottery_table_create VARCHAR(100),
  lottery_table_rows INT,
  lottery_table_columns INT,
  lottery_table_init BOOLEAN DEFAULT false,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES user (user_id) ON DELETE CASCADE
) ENGINE = InnoDB;

-- gift
DROP TABLE IF EXISTS gift;

CREATE TABLE gift (
  gift_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  gift_name VARCHAR(50),
  gift_descr TEXT,
  gift_img VARCHAR(10),
  gift_winner VARCHAR(10),
  gift_row INT,
  gift_column INT,
  lottery_table_id INT,
  FOREIGN KEY (lottery_table_id) REFERENCES lottery_table (lottery_table_id) ON DELETE CASCADE
) ENGINE = InnoDB;