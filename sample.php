<?php

function echo_variable($var) {
  // echo $var;
  return $var;
  // return 'called function';
}

echo_variable('test');

function this_is_callback( $callback_func ) {
  echo $callback_func('This is callback function');
  // echo $callback_func();
}

this_is_callback('echo_variable');
