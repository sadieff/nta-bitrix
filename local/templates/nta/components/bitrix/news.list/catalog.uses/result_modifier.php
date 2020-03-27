<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$i = 1;

foreach($arResult["ITEMS"] as $k => $arItem) {
    if($i <= 3) $gridClass = 'col-xl-4 col-lg-6 col-6';
    elseif ($i <= 6)  $gridClass = 'col-xl-3 col-lg-6 col-6';
    else $gridClass = 'col-xl-3 col-lg-4 col-12';

    $arResult["ITEMS"][$k]["GRID_CLASS"] = $gridClass;
    $i++;
}