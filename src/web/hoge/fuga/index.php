<?php

  $script_name = $_SERVER["SCRIPT_NAME"];
  echo '<pre>';
  var_dump( $script_name );
  var_dump( dirname( $script_name ) );
  var_dump( dirname( __FILE__ ) );
  echo '</pre>';
