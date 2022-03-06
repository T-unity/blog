<?php
  echo '<h1>' . 'Document root' . '</h1>';

  require( '../core/Request.php' );

  $req = new Request();

  // var_dump($_SERVER);
  var_dump($req);
