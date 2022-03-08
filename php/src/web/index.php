<?php
  require( '../bootstrap.php' );
  $req = new Request();

  echo '<h1>' . 'Document root' . '</h1>';


  /////////////////////////////////
  // strposの挙動を確認
  // https://www.php.net/manual/ja/function.strpos.php
  $haystack = 'abcdefgh';
  // 以下のニードルは、いずれで比較してもint(1)が返ってくる
  // $needle = 'b';
  // $needle = 'bc';
  $needle = 'bcd';
  $check = strpos( $haystack, $needle );
  echo '<pre>';
  var_dump($check);
  echo '</pre>';
  echo '------------------' . "\n";
  /////////////////////////////////

  /////////////////////////////////
  // substrの挙動を確認
  // https://www.php.net/manual/ja/function.substr.php
  // $string = substr("abcdef", -1);
  // $string = substr("abcdef", 1);
  // $string = substr("123456789", 1);
  // $string = substr("123456789", -4, 2);
  // $string = substr("123456789", -10, );
  $string = substr("123456789", 10, );
  echo '<pre>';
  var_dump($string);
  echo '</pre>';
  /////////////////////////////////


  // require( '../core/Request.php' );

  echo '<pre>';

  // var_dump($_GET);
  // var_dump($_POST);
  // var_dump($_SERVER);
  // var_dump($_SERVER["SCRIPT_NAME"]);
  // var_dump($_SERVER[ 'REQUEST_URI' ]);

  var_dump( __FILE__ );

  var_dump($req);
  // var_dump($req->getGet('get'));
  // var_dump($req->getRequestUri());
  var_dump($req->getBaseUrl());

  echo '</pre>';
