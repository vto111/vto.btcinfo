<?php
use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
Class vto_btcinformer extends CModule
{
    function __construct()
    {
        $arModuleVersion = array();
        include(__DIR__ . "/version.php");
        $this->MODULE_ID = 'vto.btcinformer';
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERION_DATE"];
        $this->MODULE_NAME = Loc::getMessage("VTO_BTCINFORMER_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("VTO_BTCINFORMER__DESCRIPTION");

        $this->PARTNER_NAME = Loc::getMessage("VTO_BTCINFORMER_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("VTO_BTCINFORMER_PARTNER_URI");

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
            $APPLICATION->ThrowException(Loc::getMessage("VTO_BTCINFORMER_ERROR_INSTALL_VERSION"));
        }

        //$APPLICATION->IncludeAdminFile(Loc::getMessage("VTO_BTCINFORMER_INSTALL_TITLE"), $this->GetPath() . "/install/step.php");


    }

    /**
     * @throws \Bitrix\Main\SystemException
     */
    function DoUninstall()
    {

        global $APPLICATION;


            \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
            //$APPLICATION->IncludeAdminFile(Loc::getMessage("VTO_BTCINFORMER_UNINSTALL_TITLE"), $this->GetPath() . "/install/unstep.php");


            

        }


}



?>