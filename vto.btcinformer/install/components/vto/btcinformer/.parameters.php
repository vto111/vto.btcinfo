<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
 $arSourceData = array(
   "blockchain.info",
   "bitcoincharts.com",
     
 );
 $arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "TEMPLATE_FOR_DESCRIPTION_BTC" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("TEMPLATE_FOR_DESCRIPTION_BTC_NAME_BEFORE"), 
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => GetMessage("TEMPLATE_FOR_DESCRIPTION_BTC_NAME_BEFORE_DEFAULT"), 
            ),
        
        "TEMPLATE_FOR_DESCRIPTION_USD" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("TEMPLATE_FOR_DESCRIPTION_BTC_NAME_AFTER"), 
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => GetMessage("TEMPLATE_FOR_DESCRIPTION_BTC_NAME_AFTER_DEFAULT"), 
            ),
        "LINK_SOURCE_DATA" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("NAME_LINK_SOURCE_DATA"), 
            "TYPE" => "LIST",
            "MULTIPLE" => "N",
            "VALUES" => $arSourceData, 
            ),
        ),
     
    );
