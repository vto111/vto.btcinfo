<?php
use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
Class vto_btcinformer extends CModule
{   
    const MODULE_ID = 'vto.btcinformer';
    
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
    
    function InstallFiles($arParams = array())
	{		
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.self::MODULE_ID.'/install/components'))
		{
			if ($directory = opendir($p))
			{
				while (false !== $item = readdir($directory))
				{
					if ($item == '..' || $item == '.')
						continue;
					CopyDirFiles($p.'/'.$item, $_SERVER['DOCUMENT_ROOT'].'/bitrix/components/'.$item, $ReWrite = True, $Recursive = True);
				}
				closedir($directory);
			}
		}
		return true;
	}

	function UnInstallFiles()
	{		
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.self::MODULE_ID.'/install/components'))
		{
			if ($directory = opendir($p))
			{
				while (false !== $item = readdir($directory))
				{
					if ($item == '..' || $item == '.' || !is_dir($p0 = $p.'/'.$item))
						continue;

					$directory0 = opendir($p0);
					while (false !== $item0 = readdir($directory0))
					{
						if ($item0 == '..' || $item0 == '.')
							continue;
						DeleteDirFilesEx('/bitrix/components/'.$item.'/'.$item0);
					}
					closedir($directory0);
				}
				closedir($directory);
			}
		}
		return true;
	}
    
    function DoInstall()
    {

        global $APPLICATION;

        if ($this->isVersionD7()) {
            $this->InstallFiles();
            \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
            
        } else {
            $APPLICATION->ThrowException(Loc::getMessage("VTO_BTCINFORMER_ERROR_INSTALL_VERSION"));
        }

    }

    /**
     * @throws \Bitrix\Main\SystemException
     */
    function DoUninstall()
    {
        global $APPLICATION;
        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
        $this->UnInstallFiles();      
        
    }


}



?>