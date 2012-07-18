<?php

require_once('./engine/libs/php/HamlPHP/src/HamlPHP/HamlPHP.php');
require_once('./engine/libs/php/HamlPHP/src/HamlPHP/Storage/FileStorage.php');
class ModuleViewer extends Module {
  protected $oViewer = null;

  public function init() {
    $oStorage = new FileStorage(dirname(__FILE__).'/tmp/');
    $oViewer = new HamlPHP($oStorage);
    $this->oViewer = $oViewer->getCompiler();
  }

  public function display($sTemplate) {
    echo $this->oViewer->parseFile($sTemplate);
  }

}
