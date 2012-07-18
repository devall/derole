<?php

class Router {

  public function exec() {
    $this->oEngine = new Engine();
    $this->oEngine->initModules();

    $this->_execController();

    $this->Viewer_display('./application/views/default/controllers/index/index.haml');
  }

  protected function _execController() {
    // выполняем контроллер
  }

  public function __call($sName,$aArgs) {
    return $this->oEngine->callModule($sName,$aArgs);
  }
}
