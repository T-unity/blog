<?php
// $path = 'sampleNamespace';
// require_once $path . '.php';
require_once 'sampleNamespace.php';

use Food\Sweets as Sweets;

$sample_class = new Sweets\Cake();

// $sample_class = new Food\Sweets\Cake();
$sample_class->product();

Food\Sweets\Cake::price();
