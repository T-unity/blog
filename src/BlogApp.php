<?php

class BlogApp extends Application
{
  protected $login_action = array( 'account', 'signin' );

  public function getRootDir(): string
  {
    return dirname( __FILE__ );
  }

  public function registerRoutes()
  {
    return array();
  }

  protected function configure()
  {
    $this->db_manager->connect( 'master', array(
      // 'dsn'      => 'mysql:dbname=php; host=localhost',
      'dsn'      => 'mysql:dbname=php; host=db',
      'user'     => 'user',
      'password' => 'pass',
    ) );
  }
}
