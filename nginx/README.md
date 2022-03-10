
## webサーバー系

srcフォルダがphpの中にあるのは構造的にイケてないのでdocker-compose.ymlと同じ階層にある構造の方が違和感少ない。

Nginxのconfをいじる必要がある。いじったら一旦docker compose downしてからもっかいdocker compose up -d --buildする。
なんかおかしいと思ったらとりあえず一回落としてもっかいビルドしてみる。
