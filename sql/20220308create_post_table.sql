-- CREATE TABLE php.post_t (
--   pst_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
--   pst_name VARCHAR(50),
--   pst_content TEXT,
--   pst_created_at DATETIME,
-- ) ENGINE=innodb DEFAULT charset=utf8mb4 COLLATE=utf8_general_ci;

-- CREATE TABLE 'post' (
--   'id' INT NOT NULL PRIMARY KEY,
--   'name' VARCHAR(20),
--   'content' TEXT,
--   'created_at' DATETIME,
-- ) ENGINE=innodb DEFAULT charset=utf8mb4 COLLATE=utf8_general_ci;

-- create table post_t (
--   pst_id int not null auto_increment primary key
--   pst_name VARCHAR(50),
--   pst_content TEXT,
--   pst_created_at DATETIME,
-- ) ENGINE=innodb DEFAULT charset=utf8mb4 COLLATE=utf8_general_ci;

CREATE TABLE `post_t` (
  `pst_id` int NOT NULL PRIMARY KEY,
  `pst_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
