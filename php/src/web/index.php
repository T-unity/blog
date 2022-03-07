<?php
  echo '<h1>' . 'Document root' . '</h1>';

  require( '../bootstrap.php' );

  // require( '../core/Request.php' );

  $req = new Request();

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
