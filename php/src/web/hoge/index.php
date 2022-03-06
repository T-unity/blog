<?php
echo 'this is hoge';

require( '../../core/Request.php' );
$req = new Request();


echo '<pre>';
var_dump($req->getBaseUrl());
echo '</pre>';
