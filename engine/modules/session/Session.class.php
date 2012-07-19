<?php

class ModuleSession extends Module {
  public function init() {
    $this->start();
  }

  protected function start() {
    session_start();
  }
}
