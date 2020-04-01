<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['SECTIONS'] as $key => &$arSection){

    if(!empty($arSection["PICTURE"])) {
        $image = CFile::ResizeImageGet($arSection["PICTURE"]["ID"], array('width' => 224, 'height' => 209), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['SECTIONS'][$key]['IMAGE'] = $image["src"];
    }
    else $arResult['SECTIONS'][$key]['IMAGE'] = "/local/templates/nta/images/default.jpg";

    /* get min price for category */

    $Result = CIBlockElement::GetList(
        array("CATALOG_PRICE_1" => "ASC"),
        array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "IBLOCK_SECTION_ID" => $arSection["ID"], "!CATALOG_PRICE_1" => false),
        false,
        array(
            "nPageSize" => 1
        ),
        array("ID", "IBLOCK_ID", "CATALOG_GROUP_1")
    );

    while ($element = $Result -> GetNextElement()){
        $price = explode('.', $element->fields["CATALOG_PRICE_1"]);
        $arResult['SECTIONS'][$key]['MINPRICE'] = $price[0];
    }

}