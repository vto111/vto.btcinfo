<?php

$arCource = array();
$choosen_source = 0;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arSourceDataValue = array(
   "https://blockchain.info/ru/ticker",
   "http://api.bitcoincharts.com/v1/markets.json",
     
 );

if($arParams["LINK_SOURCE_DATA"]){
    $source_data = $arSourceDataValue[$arParams["LINK_SOURCE_DATA"]];
    $choosen_source = $arParams["LINK_SOURCE_DATA"];
    
} else {
    $source_data = $arSourceDataValue[0];
}
if ($json = file_get_contents($source_data)) {
        
            $arCource = json_decode($json, true);
        }

if($choosen_source == 0){
    $arResult["cource"] = $arCource["USD"]["last"];
} elseif ($choosen_source == 1) {
    
    foreach ($arCource as $key=>$cource_coin){
        if($cource_coin["symbol"] == "bitstampUSD"){
            $arResult["cource"] = $cource_coin["ask"];
    
        }    
    }
} else {
    $arResult["cource"] = $arCource["USD"]["last"];
}
        
$arResult['DESCRIPTION_BTC'] = $arParams["TEMPLATE_FOR_DESCRIPTION_BTC"];
$arResult['DESCRIPTION_USD'] = $arParams["TEMPLATE_FOR_DESCRIPTION_USD"];

$this->IncludeComponentTemplate();
?>
