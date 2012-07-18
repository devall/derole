<?php

set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__));

require_once('Router.class.php');
require_once('Module.class.php');

class Engine {

  public function __construct() {

  }

  public function initModules() {
    // Инициализация autoload модулей
  }

  public function callModule($sName,$aArgs) {
    $aName = explode('_',$sName);

    $sModuleName = $aName[0];
    if(isset($this->aModules[$sModuleName])) {
      return $this->aModules[$sModuleName];
    } else {
      $oModule = $this->_loadModule($sModuleName);

      return call_user_func_array(array($oModule,$aName[1]),$aArgs);
    }
    return false;
  }

  protected function _loadModule($sModuleName) {
    if(file_exists('./engine/modules/'.strtolower($sModuleName).'/'.$sModuleName.'.class.php')) {
      require_once('./engine/modules/'.strtolower($sModuleName).'/'.$sModuleName.'.class.php');
    } elseif(file_exists('./application/modules/'.strtolower($sModuleName).'/'.$sModuleName.'.class.php')) {
      require_once('./application/modules/'.strtolower($sModuleName).'/'.$sModuleName.'.class.php');
    } else {
      throw new Exception('Вызыванный модуль не существует');
    }

    $sModuleName = 'Module'.$sModuleName;
    $oModule = new $sModuleName($this);
    $oModule->init();

    $this->aModules[$sModuleName] = $oModule;

    return $oModule;
  }
}
