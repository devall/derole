<?php

require_once('./engine/libs/php/HamlPHP/src/HamlPHP/HamlPHP.php');
require_once('./engine/libs/php/HamlPHP/src/HamlPHP/Storage/FileStorage.php');

class ModuleViewer extends Module {
  protected $oHamlPHP = null;

  public function init() {
    $oStorage = new FileStorage('./application/cache/views');
    $oHamlPHP = new HamlPHP($oStorage);
    $this->oHamlPHP = $oHamlPHP->getCompiler();
  }

  public function display($sTemplate) {
    $aVars['content'] = $this->oHamlPHP->parseFile($sTemplate);

    extract($aVars);

    ob_start();
    echo $this->oHamlPHP->parseFile('./application/views/default/layout.haml');
    $sView = ob_get_contents();
    ob_end_clean();

    eval(' ?>'.$sView.'<?php ');

  }

}
