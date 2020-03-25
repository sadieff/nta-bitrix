<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
header("Content-type: application/json; charset=utf-8");
$APPLICATION->RestartBuffer();
unset($arResult["COMBO"]);
//echo CUtil::PHPToJSObject($arResult, true);
echo json_encode($arResult);
?>