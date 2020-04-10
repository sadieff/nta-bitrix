<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["DATE"] = $arResult["DATE_INSERT"]->format("d.m.Y");

if($arResult["STATUS_ID"] == "N") $status = "Не оплачен";
if($arResult["STATUS_ID"] == "F") $status = "Выполнен";

$arResult["STATUS"] = $status;
$count = 0;

foreach ($arResult["BASKET"] as $key => $arItems) {
    $arResult["BASKET"][$key]["PRICE"] = number_format($arItems["PRICE"], 0, ',', ' ');
    $count = $arItems["QUANTITY"] + $count;
}

$arResult["TOTAL_COUNT"] = $count;