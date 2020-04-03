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

/* storages */

$arResult["STRORAGES"] = [];
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

foreach ($arResult["STRORAGES_MAP"] as $storageItem) {

    $value = $arResult["PROPERTIES"][$storageItem]["VALUE"];

    if(empty($value) || $value == 0) $position = 0;
    elseif ($value >= 2) $position = 1;
    elseif ($value >= 5) $position = 2;
    elseif ($value >= 13) $position = 3;
    elseif ($value >= 23) $position = 4;
    else $position = 5;

    $arResult["STRORAGES"][] = array(
        "NAME" =>  $arResult["PROPERTIES"][$storageItem]["HINT"],
        "VALUE" => $value ? $value : 0,
        "POSITION" => $position,
    );
}

//p($arResult["STRORAGES"]);