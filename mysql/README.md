## コマンドとか

## DBに接続

```
$ docker compose exec db bash
$ mysql -u $MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE
```

MySQLクライアント使ってもOK。
<!-- https://tableplus.com/download -->
接続情報はmysqlのDockerfileを参照


## DB、テーブル作成

 - DB作成

（コンテナにログインしてるの前提）
```
mysql -u root
// mysql> CREATE DATABASE `some_db_name_ex_hoge` DEFAULT CHARACTER SET utf8mb4;

e.g)
mysql> CREATE DATABASE `post` DEFAULT CHARACTER SET utf8mb4;
```

 - テーブル作成

```
// テーブル作成用のSQL

CREATE TABLE `post` (
  id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  content VARCHAR(200),
  created_at DATETIME,
) engine=innodb default charset=utf8mb4';

上のSQLはちと微妙なのでとりあえず以下で。

CREATE TABLE `post_t` (
  `pst_id` int NOT NULL auto_increment PRIMARY KEY,
  `pst_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

```
上で作った`some_db_name_ex_hoge`を開いて上のSQLを入力する。

```
mysql -u root some_db_name_ex_hoge
mysql> 上記のSQLを入力
```

※たぶん何かしらのSQLクライアント使った方が便利
