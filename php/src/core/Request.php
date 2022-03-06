<?php
/**
 * リクエスト情報を制御するクラス
 * HTTPメソッドの判定、値の取得、リクエストされたURLの取得など
 */
class Request
{
  /**
   * HTTPメソッドを判定する
   */
  public function isPost()
  {
    if ( $_SERVER["REQUEST_METHOD"] === 'POST' ) {
      return true;
    }

    return false;
  }

  /**
   * HTTP GET メソッドから渡される連想配列
   * https://www.php.net/manual/ja/reserved.variables.get.php
   */
  public function getGet( $name, $default = null )
  {
    if ( isset( $_GET[$name] ) ) {
      return $_GET[$name];
    }

    return $default;
  }

  /**
   * HTTP POST メソッドから渡される連想配列
   * https://www.php.net/manual/ja/reserved.variables.post.php
   */
  public function getPost( $name, $default = null )
  {
    if ( isset( $_POST[$name] ) ) {
      return $_POST[$name];
    }

    return $default;
  }

  /**
   * ホスト名を取得
   * https://www.php.net/manual/ja/reserved.variables.server.php
   */
  public function getHost()
  {
    if ( !empty( $_SERVER[ 'HTTP_HOST' ] ) ) {
      return $_SERVER[ 'HTTP_HOST' ];
    }

    return $_SERVER[ 'SERVER_NAME' ];
  }

  /**
   * SSL化の判定
   */
  public function isSsl()
  {
    if ( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ) {
      return true;
    }

    return false;
  }

  public function getRequestUri()
  {
    return $_SERVER[ 'REQUEST_URI' ];
  }

}
