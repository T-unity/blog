<?php
  require '../bootstrap.php';
  require '../BlogApp.php';
  // セッションをスタートする前に何かしらを出力してはいけない。
  // 以下echoのコメントアウトを外すと関連するエラーが見れる。
  // echo '<h1>' . 'Blog app' . '</h1>';

  $app = new BlogApp(true);
  $app->run();

  // $app = new BlogApp(false);
  echo '<h1>' . 'Blog app' . '</h1>';

  $script_name = $_SERVER["SCRIPT_NAME"];
  echo '<pre>';
  var_dump( $script_name );
  var_dump( dirname( $script_name ) );
  echo '</pre>';
