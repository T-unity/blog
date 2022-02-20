<?php

require 'core/ClassLoader.php';

$loader = new ClassLoader();
// var_dump($loader);
$loader->registerDir( dirname( __FILE__ ) . '/core' );
$loader->registerDir( dirname( __FILE__ ) . '/models' );
$loader->register();
var_dump($loader);
