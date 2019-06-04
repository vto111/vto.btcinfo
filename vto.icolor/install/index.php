<?php
use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
Class vto_icolor extends CModule
{
    function __construct()
    {
        $arModuleVersion = array();
        include(__DIR__ . "/version.php");
        $this->MODULE_ID = 'vto.icolor';
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERION_DATE"];
        $this->MODULE_NAME = Loc::getMessage("VTO_ICOLOR_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("VTO_ICOLOR__DESCRIPTION");

        $this->PARTNER_NAME = Loc::getMessage("VTO_ICOLOR_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("VTO_ICOLOR_PARTNER_URI");

    }

    public function isVersionD7()
    {
        return CheckVersion(\Bitrix\Main\ModuleManager::getVersion('main'), '14.00.00');
    }

    public function GetPath($notDocumentRoot = false){
        if ($notDocumentRoot)
            return str_ireplace(\Bitrix\Main\Application::getDocumentRoot(), '', dirname(__DIR__));
        else
            return dirname(__DIR__);
    }

    function DoInstall()
    {

        global $APPLICATION;

        if ($this->isVersionD7()) {

            \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);

        } else {
            $APPLICATION->ThrowException(Loc::getMessage("VTO_ICOLOR_ERROR_INSTALL_VERSION"));
        }

        $APPLICATION->IncludeAdminFile(Loc::getMessage("VTO_ICOLOR_INSTALL_TITLE"), $this->GetPath() . "/install/step.php");


    }

    function DoUninstall()
    {

        global $APPLICATION;

        $context = \Bitrix\Main\Application::getInstance()->getContext();
        $request = $context->getRequest();

        if ($request["step"] < 2) {

            $APPLICATION->IncludeAdminFile(Loc::getMessage("VTO_ICOLOR_UNINSTALL_TITLE"), $this->GetPath() . "/install/unstep1.php");

        } elseif ($request["step"] == 2) {
            if ($request["savedata"] != "Y") {

            }


            \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);

        } else {
            $APPLICATION->ThrowException(Loc::getMessage("VTO_ICOLOR_ERROR_INSTALL_VERSION"));

        }

    }

}

?>