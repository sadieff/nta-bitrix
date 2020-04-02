<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


foreach($arResult["ITEMS"] as $k => $arItem) {

    $date = explode(" ", $arItem["ACTIVE_FROM"]);
    $arResult["ITEMS"][$k]["DATE"] = $date[0];

    if(!empty($arItem["PREVIEW_PICTURE"])) {
        $image = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width' => 405, 'height' => 466), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult["ITEMS"][$k]['IMAGE'] = $image["src"];
    }
    else $arResult["ITEMS"][$k]['IMAGE'] = "/local/templates/nta/images/default.jpg";

}