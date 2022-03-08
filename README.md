## コマンドとか

## DBに接続
$ docker compose exec db bash
$ mysql -u $MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE

MySQLクライアント使ってもOK。
<!-- https://tableplus.com/download -->
接続情報はmysqlのDockerfileを参照


## phpコンテナに入る（ほぼ入らない）
$ docker compose exec php bash
