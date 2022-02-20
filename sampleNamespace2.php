<?php
$path = 'sampleNamespace';
require_once $path . '.php';

$sample_class = new Food\Sweets\Cake();
$sample_class->product();

Food\Sweets\Cake::price();
