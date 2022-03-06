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
   * URLパラメータから渡される連想配列
   * https://www.php.net/manual/ja/reserved.variables.get.php
   */
  public function getGet( $name, $default = null )
  {
    if ( isset( $_GET[$name] ) ) {
      return $_GET[$name];
    }

    return $default;
  }

}
