<?php
/**
 * リクエスト情報を制御するクラス
 * HTTPメソッドの判定、値の取得、リクエストされたURLの取得など
 */
class Request
{
  /**
   * @return bool
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

  /**
   * スーパーグローバル変数$_SERVERに含まれるリクエストURIを返却する。
   * @return string
   */
  public function getRequestUri()
  {
    // $_SERVER["REQUEST_URI"]::ページにアクセスするために指定された URI。例えば、 '/index.html'
    return $_SERVER[ 'REQUEST_URI' ];
  }

  /**
   * ホスト名以降の、特定のindex.phpまでのpathを特定する
   *
   * @return string
   */
  public function getBaseUrl()
  {
    // $_SERVER["SCRIPT_NAME"]::現在のスクリプトのパス。
    $script_name = $_SERVER["SCRIPT_NAME"];
    $request_uri = $this->getRequestUri();

    // $_SERVER["SCRIPT_NAME"] === $_SERVER[ 'REQUEST_URI' ]の場合、値を加工せずreturn
    if ( strpos( $request_uri, $script_name ) === 0 ) {
      return $script_name;

    // 何らかの数値が返ってきた場合、文字列の最後から/を取り除いてreturn
    } elseif ( strpos( $request_uri, dirname( $script_name ) ) ) {
      return rtrim( dirname( $script_name ), '/' );
      // https://www.php.net/manual/ja/function.dirname.php
      // https://www.php.net/manual/ja/function.rtrim.php
    }

    return '';
  }

  /**
   * @return string
   */
  public function getPathInfo()
  {
    $base_url = $this->getBaseUrl();
    $request_uri = $this->getRequestUri();

    if ( false !== ( $pos = strpos( $request_uri, '?' ) ) ) {
      // クエリストリングの?以降を取り除く（GETパラメータを取り除く）
      $request_uri = substr( $request_uri, 0, $pos );
    }

    $path_info = (string)substr( $request_uri, strlen($base_url) );

    return $path_info;
  }

}
