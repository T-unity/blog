<?php

require( '../../../../bootstrap.php' );

$bar = new Request();

var_dump($bar->getRequestUri());
var_dump($bar->getBaseUrl());
