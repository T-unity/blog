<?php

class ClassLoader
{
  protected $dirs;

  public function register() {
    spl_autoload_register( array( $this, 'loadClass' ) );
    // https://www.php.net/manual/ja/function.spl-autoload-register.php
  }

  public function registerDir($dir)
  {
    $this->dirs[] = $dir;
  }

  public function loadClass($class)
  {
    foreach ( $this->dirs as $dir ) {
      $file = $dir . '/' . $class . '.php';
      if ( is_readable( $file ) ) { // https://www.php.net/manual/ja/function.is-readable.php
        require $file;
        return;
      }
    }
  }
}
