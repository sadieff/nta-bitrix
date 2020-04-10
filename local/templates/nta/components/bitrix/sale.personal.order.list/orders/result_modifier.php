<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
    Bitrix\Main\Localization\Loc,
    Bitrix\Main\Page\Asset,
    Bitrix\Main\Type\DateTime;

foreach ($arResult["ORDERS"] as $key => $arItem){
    if($arItem["ORDER"]["STATUS_ID"] == "N") $status = "Не оплачен";
    if($arItem["ORDER"]["STATUS_ID"] == "F") $status = "Выполнен";

    $arResult["ORDERS"][$key]["STATUS"] = $status;

    $price = explode(".", $arItem["ORDER"]["PRICE"]);
    $price =  number_format($price[0], 0, ',', ' ');
    $arResult["ORDERS"][$key]["PRICE"] = $price;

    $arResult["ORDERS"][$key]["DATE"] = $arItem["ORDER"]["DATE_INSERT"]->format("d.m.Y");

}