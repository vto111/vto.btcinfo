<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<? echo $arResult["DESCRIPTION_BTC"];?>

<?

if($arParams["LINK_SOURCE_DATA"] == 0){
    echo $arResult["USD"]["last"];
}
?>

<? 
if($arParams["LINK_SOURCE_DATA"] == 1){
foreach ($arResult as $key=>$cource_coin){
    if($cource_coin["symbol"] == "bitstampUSD"){
        echo $arResult[$key]["ask"];
    }
    
}
}
?>

<? echo $arResult["DESCRIPTION_USD"];?>

