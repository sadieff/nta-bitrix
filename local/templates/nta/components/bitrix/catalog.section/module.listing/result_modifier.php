<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$arResult["STRORAGES_MAP"] = array(
    "STORAGE_OBUHOVO",
    "STORAGE_NEVA",
    "STORAGE_ROSTOV",
    "STORAGE_KUBAN",
    "STORAGE_LIPECK",
    "STORAGE_PERM",
    "STORAGE_UFA",
    "STORAGE_NOVOSIB",
    "STORAGE_NOVOCUZ",
);

foreach ($arResult['ITEMS'] as $key => $arItem) {

    $price =  number_format($arItem["PRICES"]["BASE"]["DISCOUNT_VALUE_VAT"], 0, ',', ' ');
    $arResult['ITEMS'][$key]['PRICE'] = $price;

    $arResult['ITEMS'][$key]['TITLE'] = reduce($arItem["NAME"], 45);

    if(!empty($arItem["PREVIEW_PICTURE"])){
        $image = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>95, 'height'=>95), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['ITEMS'][$key]['IMAGE'] = $image["src"];
    }
    else $arResult['ITEMS'][$key]['IMAGE'] = "/local/templates/nta/images/default.jpg";

    $value = $arItem["~CATALOG_QUANTITY"];
    if(empty($value) || $value == 0) $position = 0;
    elseif ($value >= 2) $position = 1;
    elseif ($value >= 5) $position = 2;
    elseif ($value >= 13) $position = 3;
    elseif ($value >= 23) $position = 4;
    else $position = 5;
    $arResult['ITEMS'][$key]['STROGAE_POSITION'] = $position;

}