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




?>