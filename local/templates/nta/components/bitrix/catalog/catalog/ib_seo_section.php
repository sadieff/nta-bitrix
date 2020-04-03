<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->AddViewContent('BREADCRUMB_CLASS', 'breadcrumb-white');

$cache = Bitrix\Main\Data\Cache::createInstance();
if ($cache->initCache($cacheTime, $cacheId, $cacheDir))
{
    $mapSection = $cache->getVars();
}
elseif ($cache->startDataCache())
{
    /* Получаем значение, по которому фильтровать */
    $request = CIBlockElement::GetList(
        array("SORT" => "ASC"),
        array("IBLOCK_ID" => $arParams["SEO_IBLOCK_ID"], "CODE" => $arResult["VARIABLES"]["SECTION_CODE"]),
        false,
        false,
        array()
    );
    while ($section = $request -> GetNextElement()){

        $item = $section->GetFields();
        $item["PROPERTIES"] = $section->GetProperties();

        $imageDesctop = CFile::ResizeImageGet($item["PREVIEW_PICTURE"], array('width'=>1920, 'height'=>391), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $imageMobile = CFile::ResizeImageGet($item["DETAIL_PICTURE"], array('width'=>480, 'height'=>645), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $item["IMAGE_DESCTOP"] = $imageDesctop["src"];
        $item["IMAGE_MOBILE"] = $imageMobile["src"];
        $APPLICATION->AddChainItem($item["NAME"]);

        $arElement = $item;

    }
}
?>

<div class="catalog-slider">
    <picture>
        <? if(!empty($item["IMAGE_MOBILE"])): ?>
            <source srcset="<?=$item["IMAGE_MOBILE"];?>" media="(max-width: 600px)"/>
        <? endif; ?>
        <img src="<?=$item["IMAGE_DESCTOP"];?>" class="static-banner_image" alt="">
    </picture>
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="catalog-slider_ttl">
                    <? if(!empty($item["PROPERTIES"]["BANNER_TITLE"]["VALUE"])): ?>
                        <?=$item["PROPERTIES"]["BANNER_TITLE"]["~VALUE"];?>
                    <? else: ?>
                        <?=$item["NAME"];?>
                    <? endif; ?>
                </div>
                <div class="catalog-slider_text">
                    <?=$item["~PREVIEW_TEXT"];?>
                </div>
            </div>
            <div class="col-md-5 col-lg-4 col-xl-3">
                <div class="catalog-slider_menu">
                    <ul>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "catalog.seo.list", // шаблон
                            array(
                                "IBLOCK_TYPE" => "catalog", // тип информационного блока
                                "IBLOCK_ID"   => "9", // ID информационного блока
                                "NEWS_COUNT"  => "99", // колличество выводимых элементов
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "SET_TITLE" => "N",
                                "PROPERTY_CODE" => array(
                                    0 => "NAME", // включить свойство из инфоблока
                                ),
                            ),
                            false
                        ); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- main-slider -->

<div class="filter-home">
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
                "SEF_RULE" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
                "SECTION_CODE_PATH" => "",
                "SMART_FILTER_PATH" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
                "CURRENCY_ID" => "RUB"
            ),
            false
        );?>

    </div>

    <div class="brands-home">
        <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list",
            "brands",
            Array(
                "VIEW_MODE" => "TEXT",
                "SHOW_PARENT_NAME" => "Y",
                "IBLOCK_TYPE" => "",
                "IBLOCK_ID" => "1",
                "SECTION_USER_FIELDS" => array('UF_*'),
                "SECTION_ID" => "",
                "SECTION_CODE" => "",
                "SECTION_URL" => "",
                "COUNT_ELEMENTS" => "Y",
                "TOP_DEPTH" => "1",
                "SECTION_FIELDS" => "",
                "ADD_SECTIONS_CHAIN" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_NOTES" => "",
                "CACHE_GROUPS" => "N"
            )
        );?>
    </div>
</div> <!-- filter-home -->

<div class="news-detail">
    <div class="container">
        <div class="news-detail_content content_">
            <?=$item["~DETAIL_TEXT"];?>
        </div>
    </div>
</div>