<?php

abstract class Module {
  protected $oEngine = null;

  public function __construct(Engine $oEngine) {
    $this->oEngine = $oEngine;
  }

  abstract public function init();

  public function shutdown() {

  }
}
