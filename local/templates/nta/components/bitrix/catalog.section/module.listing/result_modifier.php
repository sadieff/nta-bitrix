<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

foreach ($arResult['ITEMS'] as $key => $arItem) {

    $price =  number_format($arItem["PRICES"]["BASE"]["DISCOUNT_VALUE_VAT"], 0, ',', ' ');
    $arResult['ITEMS'][$key]['PRICE'] = $price;

    $arResult['ITEMS'][$key]['TITLE'] = reduce($arItem["NAME"], 45);

    if(!empty($arItem["PREVIEW_PICTURE"])){
        $image = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>95, 'height'=>95), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['ITEMS'][$key]['IMAGE'] = $image["src"];
    }
    else $arResult['ITEMS'][$key]['IMAGE'] = "/local/templates/nta/images/default.jpg";

}