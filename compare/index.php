<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка и оплата");?>

<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.compare.result",
    "compare",
    //"",
    array(
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => 1,
        "BASKET_URL" => "/basket/",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "PRICE_CODE" => array("BASE"),
        "USE_PRICE_COUNT" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "PRICE_VAT_SHOW_VALUE" => "N",
        "CONVERT_CURRENCY" => "N",
        "HIDE_NOT_AVAILABLE" => "N",
        "TEMPLATE_THEME" => "blue",
        "PROPERTY_CODE" => array(
            "TIPORAZMER_2_US",
            "TIP_TT_TL",
            "ARTICLE",
            "CML2_MANUFACTURER",
            "KONSTRUKTSIYA",
            "GLUBINA",
            "SLOYNOST",
            "BREND",
            "DIAMETR_POSADOCHNYY_DYUYM",
            "DIAMETR_NARUZHNYY_MM",
            "SHIRINA_MM",
            "USE"
        ),
        "COMPARE_PROPERTY" => array(
            "TIPORAZMER_2_US",
            "TIP_TT_TL",
            "CML2_MANUFACTURER",
            "KONSTRUKTSIYA",
            "GLUBINA",
            "SLOYNOST",
            "BREND",
            "DIAMETR_POSADOCHNYY_DYUYM",
            "DIAMETR_NARUZHNYY_MM",
            "SHIRINA_MM",
            "USE"
        ),
        "FIELD_CODE" => array(
            "PREVIEW_PICTURE",
        ),
    ),
    false
);?>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>