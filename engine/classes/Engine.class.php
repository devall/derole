<?php

class Engine {
  protected $aModules = array();

  public function __construct() {
    $this->loadModules();
    $this->initModules();
  }

  public function loadModules() {
    $aConfig = array('Session','User');
    foreach($aConfig as $sModuleName) {
      $this->_loadModule($sModuleName);
    }
  }
  public function initModules() {
    foreach($this->aModules as $oModule) {
      $oModule->Init();
    }
  }

  public function callModule($sName,$aArgs) {
    $aName = explode('_',$sName);
    if(count($aName) < 2) {
      throw new Exception('Вызван несуществующий метод');
    }

    $sModuleName = $aName[0];
    if(isset($this->aModules[$sModuleName])) {
      return $this->aModules[$sModuleName];
    } else {
      $oModule = $this->_loadModule($sModuleName,true);

      return call_user_func_array(array($oModule,$aName[1]),$aArgs);
    }
    return false;
  }

  protected function _loadModule($sModuleName, $bInit=false) {
    if(file_exists('./engine/modules/'.strtolower($sModuleName).'/'.$sModuleName.'.class.php')) {
      require_once('./engine/modules/'.strtolower($sModuleName).'/'.$sModuleName.'.class.php');
    } elseif(file_exists('./application/modules/'.strtolower($sModuleName).'/'.$sModuleName.'.class.php')) {
      require_once('./application/modules/'.strtolower($sModuleName).'/'.$sModuleName.'.class.php');
    } else {
      throw new Exception('Вызыванный модуль не существует');
    }

    $sModuleName = 'Module'.$sModuleName;
    $oModule = new $sModuleName($this);
    if($bInit) {
      $oModule->init();
    }

    $this->aModules[$sModuleName] = $oModule;

    return $oModule;
  }
}
