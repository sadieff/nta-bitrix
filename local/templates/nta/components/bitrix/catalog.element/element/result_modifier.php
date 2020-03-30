<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$price =  number_format($arResult["PRICES"]["BASE"]["DISCOUNT_VALUE_VAT"], 0, ',', ' ');
$arResult['PRICE'] = $price;

/* resize picture */
if(!empty($arResult["PREVIEW_PICTURE"])){
    $image = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"]["ID"], array('width'=>371, 'height'=>463), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMAGE'] = $image["src"];
}
else $arResult['IMAGE'] = "/local/templates/nta/images/default.jpg";

/* array map options for views on the page element */
$arResult['ARR_MAP_OPTIONS'] = array(
    "ARTICLE",
    "BREND",
    "MODEL",
    "USE",
    "TIPORAZMER_2_US",
    "TIP_TT_TL",
    "CML2_MANUFACTURER",
    "KONSTRUKTSIYA",
    "GLUBINA",
    "SLOYNOST",
);