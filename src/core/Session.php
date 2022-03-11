<?php
/**
 * セッション情報を管理する
 * スーパーグローバル変数$_SESSIONのラッパークラス
 */

class Session
{
    protected static $sessionStarted = false;
    protected static $sessionIdRegenerated = false;

    /**
     * 初期化処理
     * $sessionStartedがfalseだった場合はセッションを開始する。
     * 複数回呼び出されないよう、自分自身を監視する。
     * https://www.php.net/manual/ja/function.session-start.php
     */
    public function __construct()
    {
      if ( ! self::$sessionStarted ) {
        session_start();

        self::$sessionStarted = true;
      }
    }

    /**
     * セッションに値を設定する。
     */
    public function set( $name, $value )
    {
      $_SESSION[$name] = $value;
    }

    /**
     * セッションに値が設定されている場合、その値をreturnする。
     */
    public function get( $name, $default = null )
    {
      if (isset( $_SESSION[$name] ) ) {
        return $_SESSION[$name];
      }

      return $default;
    }

    /**
     * 独自に設定したセッション情報を破棄する。
     */
    public function remove( $name )
    {
      unset($_SESSION[$name]);
    }

    /**
     * セッションそのものの情報を空にする。
     */
    public function clear()
    {
      $_SESSION = array();
    }

    /**
     * セッションを再度発行する。
     * 複数回呼び出されないよう、自分自身を監視する。
     */
    public function regenerate( $destroy = true )
    {
      if ( ! self::$sessionIdRegenerated ) {
        session_regenerate_id( $destroy );

        self::$sessionIdRegenerated = true;
      }
    }

    /**
     * 認証用セッション
     *
     * @param bool
     */
    public function setAuthenticated( $bool )
    {
      $this->set('_authenticated', (bool)$bool);

      $this->regenerate();
    }

    /**
     * 認証の有無を判断する
     */
    public function isAuthenticated()
    {
      return $this->get('_authenticated', false);
    }
}
