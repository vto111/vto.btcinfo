<?

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Config\Option;

$module_id = 'vto.icolor';

Loc::loadMessages($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/options.php");
Loc::loadMessages(__FILE__);

\Bitrix\Main\Loader::includeModule($module_id);

$request = \Bitrix\Main\HttpApplication::getInstance()->getContext()->getRequest();

$arTabs = array(
    array(
        'DIV'=> 'edit1',
        'TAB'=> Loc::getMessage('VTO_ICOLOR_TAB_SETTINGS'),
        'OPTIONS'=> array(
            array('field_text', Loc::getMessage('VTO_ICOLOR_FIELD_TEXT_TITLE'),
                '',
                array('textarea', 10, 50)),
            array('field_line', Loc::getMessage('VTO_ICOLOR_FIELD_LINE_TITLE'),
                '',
                array('text', 10)),
            array('field_line', Loc::getMessage('VTO_ICOLOR_FIELD_LINE_TITLE'),
                '',
                array('multiselectbox', array('var1'=>'var1', 'var2'=>'var2', 'var3'=>'var3', 'var4'=>'var4', ))),
        ),
    ),
    array(
        'DIV'=> 'edit2',
        'TAB'=> Loc::getMessage('MAIN_TAB_RIGHTS'),
        'TITLE'=> Loc::getMessage('MAIN_TAB_TITLE_RIGHTS'),

        ),

);

/*if ($request->isPost() && $request['Update'] && check_bitrix_sessid())
{

}*/

$tabControl = new CAdminTabControl('tabControl', $arTabs);
?>

<? $tabControl->Begin(); ?>

<form method="post" action='<?echo $APPLICATION->GetCurPage()?>?mid=<?=htmlspecialcharsbx($request['mid'])?>&amp;lang=<?=$request['lang']?>' name="vto_icolor">

<? foreach ($arTabs as $arTab):
    if($arTab['OPTIONS']):?>
    <? $tabControl->BeginNextTab(); ?>
    <? __AdmSettingsDrawList($module_id, $arTab['OPTIONS']); ?>

<? endif;
endforeach; ?>

<?
 $tabControl->BeginNextTab();

 $tabControl->Buttons();
?>

<input type="submit" name="Update" value="<?echo GetMessage("MAIN_SAVE")?>">
<input type="reset" name="reset" value="<?echo GetMessage("MAIN_RESET")?>">

</form>

<? $tabControl->End(); ?>