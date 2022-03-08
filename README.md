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

# 権限周り怪しいので確認する

 - DB作成
   
（コンテナにログインしてるの前提）
```
mysql -u root
mysql> CREATE DATABASE `some_db_name_ex_hoge` DEFAULT CHARACTER SET utf8;
```

 - テーブル作成

```
// テーブル作成用のSQL

CREATE TABLE `post` (
  id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  content VARCHAR(200),
  created_at DATETIME,
) engine=innodb default charset=utf8';
```
上で作った`some_db_name_ex_hoge`を開いて上のSQLを入力する。

```
mysql -u root some_db_name_ex_hoge
mysql> 上記のSQLを入力 
```

## phpコンテナに入る（ほぼ入らない）
$ docker compose exec php bash
