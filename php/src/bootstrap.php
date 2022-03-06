<?php

// require( './core/ClassLoader.php' );
require( 'core/ClassLoader.php' );
// require( 'php/src/core/ClassLoader.php' );

$loader = new ClassLoader();
$loader->registerDir( dirname( __FILE__ ) . '/core' );
$loader->registerDir( dirname( __FILE__ ) . '/models' );
$loader->register();
