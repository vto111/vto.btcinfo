<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($json = file_get_contents('https://blockchain.info/ru/ticker')) {
        
            $arResult = json_decode($json, true);
        }
        
$arResult['DESCRIPTION_BTC'] = $arParams["TEMPLATE_FOR_DESCRIPTION_BTC"];
$arResult['DESCRIPTION_USD'] = $arParams["TEMPLATE_FOR_DESCRIPTION_USD"];

$this->IncludeComponentTemplate();
?>
