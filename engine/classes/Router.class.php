<?php

class Router {
  protected $oController = null;
  static protected $sController = '';

  public function exec() {
    $this->oEngine = new Engine();

    $this->_defineController();
    $this->_execController();

    $this->Viewer_display($this->oController->getTemplate());
  }

  protected function _defineController() {
    $sRequest = trim($_SERVER['REQUEST_URI'],'/');
    $aRequest = $sRequest ? explode('/',$sRequest) : array();

    $iOffset = 1;
    for($i=0; $i<$iOffset; $i++)
      array_shift($aRequest);

    self::$sController = array_shift($aRequest);

    if(self::$sController == '')
      self::$sController = 'index';
  }

  protected function _execController() {
    if(!file_exists('./application/controllers/'.self::$sController.'.php'))
      throw new Exception('Контроллера не существует. Страница ошибки');

    require_once('./application/controllers/'.self::$sController.'.php');

    $sControllerName = 'Controller'.ucfirst(self::$sController);
    $this->oController = new $sControllerName($this->oEngine);
    $this->oController->execAction();
  }

  public function __call($sName,$aArgs) {
    return $this->oEngine->callModule($sName,$aArgs);
  }

  ///

  static public function getControllerName() {
    return self::$sController;
  }
}
