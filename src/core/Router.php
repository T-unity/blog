<?php

class Router
{
  protected $routes;

  public function __construct( $definitions )
  {
      $this->routes = $this->compileRoutes( $definitions );
  }

  public function compileRoutes($definitions)
  {
    $routes = array();

    foreach ( $definitions as $url => $params ) {
      $tokens = explode( '/', ltrim( $url, '/' ) );
      foreach ( $tokens as $i => $token ) {
        if ( 0 === strpos( $token, ':' ) ) {
          $name = substr( $token, 1 );
          $token = '(?P<' . $name . '>[^/]+)';
        }
        $tokens[$i] = $token;
      }

      $pattern = '/' . implode('/', $tokens);
      $routes[$pattern] = $params;
    }

    return $routes;
  }

  /**
   * @return array|false
   */
  public function resolve(string $path_info )
  {
    // $path_infoに/が入っていない場合は/を付与する
    if ( '/' !== substr( $path_info, 0, 1 ) ) {
      $path_info = '/' . $path_info;
    }

    foreach ( $this->routes as $pattern => $params ) {
      if ( preg_match( '#^' . $pattern . '$#', $path_info, $matches ) ) {
        $params = array_merge( $params, $matches );

        return $params;
      }
    }

    return false;
  }
}
