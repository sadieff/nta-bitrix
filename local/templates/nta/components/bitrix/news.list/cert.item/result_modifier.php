<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


foreach($arResult["ITEMS"] as $k => $arItem) {

    $image_small = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width' => 327, 'height' => 464), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $image_big = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width' => 1500, 'height' => 1500), BX_RESIZE_IMAGE_PROPORTIONAL, true);

    $arResult["ITEMS"][$k]['IMAGE_SMALL'] = $image_small["src"];
    $arResult["ITEMS"][$k]['IMAGE_BIG'] = $image_big["src"];

}