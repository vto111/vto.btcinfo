<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
 $arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "TEMPLATE_FOR_DESCRIPTION_BTC" => array(
            "PARENT" => "BASE",
            "NAME" => "Строка описания до значения",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "1 Bitcoin = ",
            ),
        
        "TEMPLATE_FOR_DESCRIPTION_USD" => array(
            "PARENT" => "BASE",
            "NAME" => "Строка описания после значения",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "$",
            ),
        ),
     
    );
