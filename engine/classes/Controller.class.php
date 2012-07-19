<?php

abstract class Controller {
  protected $oEngine = null;
  protected $sTemplate = null;

  public function __construct(Engine $oEngine) {
    $this->oEngine = $oEngine;
  }

  public function execAction() {

  }

  public function __call($sName,$aArgs) {
    $this->oEngine->callModule($sName,$aArgs);
  }

  public function getTemplate() {
    if(is_null($this->sTemplate)) {
      $this->sTemplate = './application/views/default/controllers/'.$this->getControllerName().'/index.haml';
    }
    return $this->sTemplate;
  }

  protected function getControllerName() {
    return Router::getControllerName();
  }
}
