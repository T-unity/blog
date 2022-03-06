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
    // $_SERVER["REQUEST_URI"]::ページにアクセスするために指定された URI。例えば、 '/index.html'
    return $_SERVER[ 'REQUEST_URI' ];
  }

  /**
   * ホスト名以降の、特定のindex.phpまでのpathを特定する
   */
  public function getBaseUrl()
  {
    // $_SERVER["SCRIPT_NAME"]::現在のスクリプトのパス。 スクリプト自身のページを指定するのに有用です。
    $script_name = $_SERVER["SCRIPT_NAME"];
    $request_uri = $this->getRequestUri();

    /**
     * https://www.php.net/manual/ja/function.strpos.php
     */
    if ( strpos( $request_uri, $script_name ) === 0 ) {
      return $script_name;
    } elseif ( strpos( $request_uri, dirname( $script_name ) ) ) {
      return rtrim( dirname( $script_name ), '/' );
      // https://www.php.net/manual/ja/function.dirname.php
      // https://www.php.net/manual/ja/function.rtrim.php
    }

    return '';
  }

}
