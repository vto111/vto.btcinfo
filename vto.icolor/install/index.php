<?php
use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
Class Vto_icolor extends CModule
{
    function __construct()
    {
        $arModuleVersion = array();
        include (__DIR__."/version.php");
        $this->MODULE_ID = 'vto.icolor';
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERION_DATE"];
        $this->MODULE_NAME = Loc::getMessage("VTO_ICOLOR_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("VTO_ICOLOR__DESCRIPTION");

        $this->PARTNER_NAME = Loc::getMessage("VTO_ICOLOR_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("VTO_ICOLOR_PARTNER_URI");

    }
}

function DoInstall(){

    global $APPLICATION;

    if(true){

    \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);

            } else {
        $APPLICATION->ThrowException(Loc::getMessage("VTO_ICOLOR_ERROR_INSTALL_VERSION"));
    }
}

function DoUninstall(){

    if(true){

    \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);

            } /*else {
        //$APPLICATION->ThrowException(Loc::getMessage("VTO_ICOLOR_ERROR_INSTALL_VERSION"));
    }*/
}

?>