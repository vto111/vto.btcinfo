<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arSourceDataValue = array(
   "https://blockchain.info/ru/ticker",
   "http://api.bitcoincharts.com/v1/markets.json",
     
 );

if($arSourceDataValue[$arParams["LINK_SOURCE_DATA"]]){
    $source_data = $arSourceDataValue[$arParams["LINK_SOURCE_DATA"]];
} else {
    $source_data = $arSourceDataValue[0];
}
if ($json = file_get_contents($source_data)) {
        
            $arResult = json_decode($json, true);
        }
        
$arResult['DESCRIPTION_BTC'] = $arParams["TEMPLATE_FOR_DESCRIPTION_BTC"];
$arResult['DESCRIPTION_USD'] = $arParams["TEMPLATE_FOR_DESCRIPTION_USD"];

$this->IncludeComponentTemplate();
?>
