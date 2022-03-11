<?php
/**
 * オートロード用のクラス
 */
class ClassLoader
{
  protected $dirs;

  /**
   * PHPにオートローダを登録する
   */
  public function register()
  {
    // https://www.php.net/manual/ja/function.spl-autoload-register.php
    spl_autoload_register( array( $this, 'loadClass' ) );
  }

  /**
   * 複数のディレクトリからPHPファイルを読み込めるようにする
   *
   * @param $dir オートロードの対象とするディレクトリへのフルパスを指定する
   */
  public function registerDir( $dir )
  {
    $this->dirs[] = $dir;
  }

  public function loadClass( $class )
  {
    foreach ( $this->dirs as $dir ) {
      $file = $dir . '/' . $class . '.php';
      if ( is_readable( $file ) ) {
        // https://www.php.net/manual/ja/function.is-readable.php
        // is_readable::ファイルが存在し、読み込み可能であるかどうかを知る
        require $file;

        return;
      }
    }
  }
}
