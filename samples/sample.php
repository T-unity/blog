<?php

function echo_variable($var) {
  // echo $var;
  return $var;
}
// function echo_variable() {
  // return 'called function';
  // echo 'called function';
// }
// echo_variable('test');

function this_is_callback( $callback_func ) {
  echo $callback_func('This is callback function');
  // $callback_func('This is callback function');
  // $callback_func();
}
this_is_callback('echo_variable');
// this_is_callback('echo_variable');
