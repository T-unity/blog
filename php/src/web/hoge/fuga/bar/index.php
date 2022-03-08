<?php

require( '../../../../bootstrap.php' );

$bar = new Request();

/**
 * ブラウザにURLを打ち込みむ際、以下のようなパターンで入力してみる
 *
 * http://localhost/hoge/fuga/bar/
 * http://localhost/hoge/fuga/bar/index.php
 * http://localhost/hoge/fuga/bar/index.php?hoge=fuga
 */
/////////////////////////////////
///////////// DEBUG /////////////
echo '<pre>';
echo '///// SCRIPT_NAME //////' . "\n";
var_dump($_SERVER["SCRIPT_NAME"]);
echo '-----------' . "\n";

echo '///// REQUEST_URI //////' . "\n";
var_dump($_SERVER[ 'REQUEST_URI' ]);
echo '-----------' . "\n";

echo '///// $bar->getRequestUri() //////' . "\n";
var_dump($bar->getRequestUri());
echo '-----------' . "\n";

echo '///// $bar->getPathInfo() //////' . "\n";
var_dump($bar->getPathInfo());
echo '-----------' . "\n";

echo '///// $bar->getBaseUrl() //////' . "\n";
var_dump($bar->getBaseUrl());
echo '</pre>';
///////////// DEBUG /////////////
/////////////////////////////////
