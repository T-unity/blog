CREATE TABLE 'post_t' (
  'pst_id' INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'pst_name' VARCHAR(50),
  'pst_content' VARCHAR(200),
  'pst_created_at' DATETIME,
) ENGINE=innodb default charset=utf8mb4';
