<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск"); ?>

    <div class="container">
        <div class="filter-home_title">
            Поиск
        </div>
    </div>

    <div class="search-filter filter-home catalog-filter">
        <div class="container">
            <?$APPLICATION->IncludeComponent(
                "bitrix:catalog.smart.filter",
                "main",
                array(
                    "COMPONENT_TEMPLATE" => "module.listing",
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_ID" => "1",
                    "SECTION_ID" => "",
                    "SECTION_CODE" => "",
                    "FILTER_NAME" => "arrFilter",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "TEMPLATE_THEME" => "blue",
                    "FILTER_VIEW_MODE" => "horizontal",
                    "DISPLAY_ELEMENT_COUNT" => "Y",
                    "SEF_MODE" => "Y",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_GROUPS" => "Y",
                    "SAVE_IN_SESSION" => "N",
                    "INSTANT_RELOAD" => "Y",
                    "PAGER_PARAMS_NAME" => "arrPager",
                    "PRICE_CODE" => array(
                        0 => "BASE",
                    ),
                    "CONVERT_CURRENCY" => "Y",
                    "XML_EXPORT" => "N",
                    "SECTION_TITLE" => "-",
                    "SECTION_DESCRIPTION" => "-",
                    "POPUP_POSITION" => "left",
                    "SEF_RULE" => "/filter/#SMART_FILTER_PATH#/apply/",
                    "SECTION_CODE_PATH" => "",
                    "SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
                    "CURRENCY_ID" => "RUB"
                ),
                false
            );?>

        </div>

    </div> <!-- filter-home -->

    <div class="search-list section-list -section-detail_list">
        <div class="container">
            <div class="section-list_enum">
                <? global $arrFilter;
                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section",
                    "module.listing",
                    array(
                        "IBLOCK_ID" => "1",
                        "IBLOCK_TYPE" => "catalog",
                        "FILTER_NAME" => "arrFilter",
                        "PRICE_CODE" => array("BASE"),
                        "PRICE_VAT_INCLUDE" => "Y",
                        "PRICE_VAT_SHOW_VALUE" => "N",
                        "SECTION_ID" => "",
                        "SECTION_CODE" => "",
                        "SECTION_USER_FIELDS" => array(),
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "SHOW_ALL_WO_SECTION" => "Y",
                        "META_KEYWORDS" => "",
                        "META_DESCRIPTION" => "",
                        "BROWSER_TITLE" => "",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "SET_TITLE" => "N",
                        "SET_STATUS_404" => "N",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "N",
                    ),
                    $component
                ); ?>
            </div>
        </div>
    </div> <!-- section-list -->

    <div class="search-filter_bottom filter-home catalog-filter">
        <div class="container">
            <? $APPLICATION->IncludeComponent(
				"bitrix:catalog.smart.filter",
				"main",
				array(
					"COMPONENT_TEMPLATE" => "module.listing",
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => "1",
					"SECTION_ID" => "",
					"SECTION_CODE" => "",
					"FILTER_NAME" => "arrFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"TEMPLATE_THEME" => "blue",
					"FILTER_VIEW_MODE" => "horizontal",
					"DISPLAY_ELEMENT_COUNT" => "Y",
					"SEF_MODE" => "Y",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"SAVE_IN_SESSION" => "N",
					"INSTANT_RELOAD" => "Y",
					"PAGER_PARAMS_NAME" => "arrPager",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"CONVERT_CURRENCY" => "Y",
					"XML_EXPORT" => "N",
					"SECTION_TITLE" => "-",
					"SECTION_DESCRIPTION" => "-",
					"POPUP_POSITION" => "left",
                    "SEF_RULE" => "/search/filter/#SMART_FILTER_PATH#/apply/",
                    "SECTION_CODE_PATH" => "",
                    //"SMART_FILTER_PATH" => "#SMART_FILTER_PATH#/apply/",
                    "SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
					"CURRENCY_ID" => "RUB"
				),
				false
			); ?>

        </div>

    </div> <!-- filter-home -->

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>