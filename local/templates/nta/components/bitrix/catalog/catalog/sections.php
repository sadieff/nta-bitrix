<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$APPLICATION->AddViewContent('BREADCRUMB_CLASS', 'breadcrumb-white');
$this->setFrameMode(true); ?>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "slider.home",
    array(
        "IBLOCK_TYPE" => "sliders",
        "IBLOCK_ID"   => "16",
        "NEWS_COUNT"  => "5",
        "SINGLE_IMAGE" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "SET_TITLE" => "N",
        "PROPERTY_CODE" => array(
            0 => "NAME",
        ),
    ),
    false
); ?>

<div class="category-list category-list_small">
    <div class="container">
        <div class="category-list_title">
            Популярные размеры
        </div>
        <div class="category-list_enum">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "catalog.params", // шаблон
                array(
                    "IBLOCK_TYPE" => "catalog", // тип информационного блока
                    "IBLOCK_ID"   => "7", // ID информационного блока
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
        </div>
    </div>
</div> <!-- category-list -->

<div class="filter-home">
    <div class="container">
        <div class="filter-home_title">
            Быстрый поиск шин по параметрам
        </div>

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
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
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

<div class="catalog-home catalog-list">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "catalog.uses",
            array(
                "IBLOCK_TYPE" => "catalog",
                "IBLOCK_ID"   => "6",
                "NEWS_COUNT"  => "10",
                "SINGLE_IMAGE" => "Y",
                "FIELD_CODE" => array("DETAIL_PICTURE"),
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "SET_TITLE" => "N",
                "PROPERTY_CODE" => array(
                    0 => "NAME",
                ),
            ),
            false
        ); ?>
    </div>
</div> <!-- catalog-home -->

<div class="category-list_type category-list_small">
    <div class="container">
        <div class="category-type_title">
            Шины по типу техники
        </div>
        <div class="category-list_enum">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "catalog.params", // шаблон
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
        </div>
    </div>
</div> <!-- category-list -->

<div class="catalog-new">
    <div class="container">
        <div class="catalog-new_title">
            Новые поступления
        </div>

        <div class="catalog-new_carousel catalog-new_js owl-carousel">
            <?
            global $filterNewModel;
            $filterNewModel = array('DEPTH_LEVEL' => 2);
            $APPLICATION->IncludeComponent("bitrix:catalog.section.list",
                "brands.carousel",
                Array(
                    "FILTER_NAME" => "filterNewModel",
                    "SORT_BY" => "TIMESTAMP_X",
                    "SORT_ORDER" => "ASC",
                    "VIEW_MODE" => "TEXT",
                    "ELEMENT_COUNT" => 8,
                    "SHOW_MORE_BUTTON" => "Y",
                    "SHOW_PARENT_NAME" => "Y",
                    "IBLOCK_TYPE" => "",
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "SECTION_USER_FIELDS" => array('UF_*'),
                    "SECTION_ID" => $arSection["ID"],
                    "SECTION_CODE" => "",
                    "SECTION_URL" => "",
                    "COUNT_ELEMENTS" => "Y",
                    "TOP_DEPTH" => "2",
                    "SECTION_FIELDS" => "",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_NOTES" => "",
                    "CACHE_GROUPS" => "N"
                )
            ); ?>
        </div>

        <div class="catalog-new_more-box">
            <a href="#" class="catalog-new_link">
                Показать еще
            </a>
        </div>
    </div>
</div> <!-- catalog-new -->

<div class="catalog-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <? $APPLICATION->IncludeFile(
                    "/local/include/catalog.content.php",
                    Array(),
                    Array("MODE"=>"php", "NAME" => "описание: текст") // text, html, php
                ); ?>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="catalog-info_image">
                    <? $APPLICATION->IncludeFile(
                        "/local/include/catalog.image.php",
                        Array(),
                        Array("MODE"=>"php", "NAME" => "описание: изображение") // text, html, php
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div> <!-- catalog-info -->
