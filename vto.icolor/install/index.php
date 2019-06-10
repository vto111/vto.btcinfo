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

    function InstallDB($install_wizard = true)
    {
        global $DB, $DBType, $APPLICATION;

        /*RegisterModule("bitrix.siteinfoportal");
        RegisterModuleDependences("main", "OnBeforeProlog", "bitrix.siteinfoportal", "CSiteInfoportal", "ShowPanel");*/

        return true;
    }

    function UnInstallDB($arParams = Array())
    {
        global $DB, $DBType, $APPLICATION;

        if(!array_key_exists("savedata", $arParams) || ($arParams["savedata"] != "Y")) {
            return true;
        }

        /*UnRegisterModuleDependences("main", "OnBeforeProlog", "bitrix.siteinfoportal", "CSiteInfoportal", "ShowPanel");
        UnRegisterModule("bitrix.siteinfoportal");*/

        return true;
    }

    function DoInstall()
    {

        global $APPLICATION;

        if ($this->isVersionD7()) {

            \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
            $this->InstallDB();

        } else {
            $APPLICATION->ThrowException(Loc::getMessage("VTO_ICOLOR_ERROR_INSTALL_VERSION"));
        }

        $APPLICATION->IncludeAdminFile(Loc::getMessage("VTO_ICOLOR_INSTALL_TITLE"), $this->GetPath() . "/install/step.php");


    }

    /**
     * @throws \Bitrix\Main\SystemException
     */
    function DoUninstall()
    {

        global $APPLICATION, $step;

        $step = IntVal($step);

        if ($step < 2) {


            $APPLICATION->IncludeAdminFile(Loc::getMessage("VTO_ICOLOR_UNINSTALL_TITLE"), $this->GetPath() . "/install/unstep1.php");


        } elseif ($step == 2) {

            $this->UnInstallDB(array(
                "savedata" => $_REQUEST["savedata"],
            ));

            \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
            $APPLICATION->IncludeAdminFile(Loc::getMessage("VTO_ICOLOR_UNINSTALL_TITLE"), $this->GetPath() . "/install/unstep2.php");


            }

        }


}



?>