<?php

abstract class Application
{
    protected $debug = false;
    protected $request;
    protected $response;
    protected $session;
    protected $db_manager;


    /**
     * デバッグ情報の出力有無を制御する
     */
    public function __construct(bool $debug = false )
    {
        $this->setDebugMode($debug);
        $this->initialize();
        $this->configure();
    }

    /**
     * デバッグモードを制御
     */
    protected function setDebugMode(bool $debug ): void
    {
        if ( $debug ) {
            $this->debug = true;
            ini_set( 'display_errors', 1 );
            error_reporting( -1 );
        } else {
            $this->debug = false;
            ini_set( 'display_errors', 0 );
        }
    }

    protected function initialize(): void
    {
        $this->request    = new Request();
        $this->response   = new Response();
        $this->session    = new Session();
        $this->db_manager = new DbManager();
        $this->router     = new Router($this->registerRoutes());
    }

    protected function configure()
    {
      //
    }

    // 抽象メソッドの定義。Applicationクラスを継承した場合必ず以下2つのメソッド定義が保証される。
    // https://www.php.net/manual/ja/language.oop5.abstract.php
    abstract public function getRootDir(); // スクリプトの親ディレクトリへのpathをreturn::return dirname( __FILE__ );
    abstract protected function registerRoutes(); //

    public function isDebugMode() :bool
    {
      return $this->debug;
    }

    public function getRequest()
    {
      return $this->request;
    }

    public function getResponse()
    {
      return $this->response;
    }

    public function getSession()
    {
      return $this->session;
    }

    public function getDbManager()
    {
      return $this->db_manager;
    }

    public function getControllerDir()
    {
      return $this->getRootDir() . '/controllers';
    }

    public function getViewDir()
    {
      return $this->getRootDir() . '/views';
    }

    public function getModelDir()
    {
      return $this->getRootDir() . '/models';
    }

    public function getWebDir()
    {
      return $this->getRootDir() . '/web';
    }

    public function run()
    {
      try {
        $params = $this->router->resolve( $this->request->getPathInfo() );
        if ( $params === false ) {
          throw new HttpNotFoundException( 'No route found for ' . $this->request->getPathInfo() );
        }

        $controller = $params['controller'];
        $action = $params['action'];
        $this->runAction($controller, $action, $params);

      // https://www.php.net/manual/ja/language.exceptions.php
      // 該当するページが見つからなかった場合は404ページを出力する
      } catch ( HttpNotFoundException $e ) {
        $this->render404Page($e);

      //
      } catch ( UnauthorizedActionException $e ) {
        list($controller, $action) = $this->login_action;
        $this->runAction($controller, $action);
      }

      $this->response->send();
    }

    public function runAction($controller_name, $action, $params = array())
    {
      $controller_class = ucfirst( $controller_name ) . 'Controller';

      $controller = $this->findController( $controller_class );
      if ($controller === false) {
        throw new HttpNotFoundException( $controller_class . ' controller is not found.' );
      }

      $content = $controller->run( $action, $params );

      $this->response->setContent($content);
    }

    protected function findController($controller_class)
    {
      if (!class_exists($controller_class)) {
        $controller_file = $this->getControllerDir() . '/' . $controller_class . '.php';
        if (!is_readable($controller_file)) {
          return false;
        } else {
          require_once $controller_file;

          if (!class_exists($controller_class)) {
            return false;
          }
        }
      }

      return new $controller_class($this);
    }

    protected function render404Page($e)
    {
      $this->response->setStatusCode(404, 'Not Found');
      $message = $this->isDebugMode() ? $e->getMessage() : 'Page not found.';
      $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

      $this->response->setContent(<<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>404</title>
</head>
<body>
    {$message}
</body>
</html>
EOF
        );
    }
}
