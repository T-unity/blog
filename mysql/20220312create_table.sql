-- ユーザー毎のアカウント情報
CREATE TABLE user(
  id int NOT NULL auto_increment,
  user_name VARCHAR(30) NOT NULL,
  user_id VARCHAR(30) NOT NULL,
  password VARCHAR(40) NOT NULL,
  created_at DATETIME,
  PRIMARY KEY(id),
  UNIQUE KEY user_name_index(user_name)
) ENGINE=InnoDB;

-- フォロー情報
CREATE TABLE following(
  user_id int,
  following_id int,
  PRIMARY KEY(user_id, following_id)
) ENGINE=InnoDB;

-- 投稿情報
CREATE TABLE post(
  id int NOT NULL auto_increment,
  user_id int NOT NULL,
  body VARCHAR(255) NOT NULL,
  created_at DATETIME,
  PRIMARY KEY(id),
  INDEX user_id_index(user_id)
) ENGINE=InnoDB;

-- 外部キー制約の追加
ALTER TABLE following ADD FOREIGN KEY (user_id) REFERENCES user(id);
ALTER TABLE following ADD FOREIGN KEY (following_id) REFERENCES user(id);
ALTER TABLE post ADD FOREIGN KEY (user_id) REFERENCES user(id);
