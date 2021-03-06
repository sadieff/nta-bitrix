<? require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/map.js');
?>

    <? $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "slider.home",
        array(
            "IBLOCK_TYPE" => "sliders",
            "IBLOCK_ID"   => "5",
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

    <div class="catalog-home">
        <div class="container">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "catalog.uses",
                array(
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_ID"   => "6",
                    "NEWS_COUNT"  => "10",
                    "SINGLE_IMAGE" => "N",
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

    <div class="advantage">
        <div class="container">
            <div class="advantage-wrap">
                <div class="advantage-title">
                    Почему нас выбирают?
                </div>
                <div class="advantage-content">
                    <div class="advantage-item">
                        <span class="advantage-item_num">10</span>
                        <span class="advantage-item_dsc">лет успешной<br> работы</span>
                    </div>
                    <div class="advantage-item">
                        <span class="advantage-item_num">9</span>
                        <span class="advantage-item_dsc">филиалов</span>
                    </div>
                    <div class="advantage-item">
                        <span class="advantage-item_num">21</span>
                        <span class="advantage-item_dsc">региональных<br> склада шин</span>
                    </div>
                    <div class="advantage-item">
                        <span class="advantage-item_num">586</span>
                        <span class="advantage-item_dsc">диллеров по<br> всей России</span>
                    </div>
                    <div class="advantage-item">
                        <span class="advantage-item_num">1200</span>
                        <span class="advantage-item_dsc">единиц номенклатурных<br> позиций</span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- advantage -->

    <? $APPLICATION->IncludeFile(
        "/local/include/map.php",
        Array(
             "TITLE" => "Региональная сеть",
        ),
        Array("MODE"=>"php")
    ); ?>

    <div class="about">
        <div class="container">
            <div class="about-title_wrap">
                <div class="about-title active">
                    О компании
                </div>
                <div class="about-title">
                    Сертификаты
                </div>
            </div>

            <div class="about-content_wrap">
                <div class="about-content active">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <div class="about-content_text">
                                <? $APPLICATION->IncludeFile(
                                    "/local/include/about.content.php",
                                    Array(),
                                    Array("MODE"=>"php") // text, html, php
                                ); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="about-content_image_wrap">
                                <div class="about-content_image">
                                    <? $APPLICATION->IncludeFile(
                                        "/local/include/about.image.php",
                                        Array(),
                                        Array("MODE"=>"php") // text, html, php
                                    ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-content">
                    <div class="about-cert owl-carousel">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "cert.item", // шаблон
                            array(
                                "IBLOCK_TYPE" => "content", // тип информационного блока
                                "IBLOCK_ID"   => "15", // ID информационного блока
                                "NEWS_COUNT"  => "9", // колличество выводимых элементов
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "SET_TITLE" => "N",
                                "SORT_BY1" => "ACTIVE_FROM",
                                "SORT_ORDER1" => "DESC",
                                "PROPERTY_CODE" => array(
                                    0 => "NAME", // включить свойство из инфоблока
                                ),
                            ),
                            false
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- about -->

    <div class="home-news about">
        <div class="container">
            <!--div class="home-news_title">
                Наши новости
            </div-->

            <div class="about-title_wrap">
                <div class="about-title active">
                    Новости
                </div>
                <div class="about-title">
                    Статьи
                </div>
            </div>

            <div class="about-content_wrap">
                <div class="about-content active">

                    <div class="home-news_enum">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "news.home", // шаблон
                            array(
                                "IBLOCK_TYPE" => "content", // тип информационного блока
                                "IBLOCK_ID"   => "3", // ID информационного блока
                                "NEWS_COUNT"  => "3", // колличество выводимых элементов
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "SET_TITLE" => "N",
                                "SORT_BY1" => "ACTIVE_FROM",
                                "SORT_ORDER1" => "DESC",
                                "PROPERTY_CODE" => array(
                                    0 => "NAME", // включить свойство из инфоблока
                                ),
                            ),
                            false
                        ); ?>
                    </div>
                    <div class="home-news_more">
                        <a href="/news/">Все новости</a>
                    </div>
                </div>

                <div class="about-content">

                    <div class="home-news_enum">

                        <? $APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "news.home", // шаблон
                            array(
                                "IBLOCK_TYPE" => "content", // тип информационного блока
                                "IBLOCK_ID"   => "10", // ID информационного блока
                                "NEWS_COUNT"  => "3", // колличество выводимых элементов
                                "VIEW_DATE" => "N",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "SET_TITLE" => "N",
                                "SORT_BY1" => "ACTIVE_FROM",
                                "SORT_ORDER1" => "DESC",
                                "PROPERTY_CODE" => array(
                                    0 => "NAME", // включить свойство из инфоблока
                                ),
                            ),
                            false
                        ); ?>
                    </div>
                    <div class="home-news_more">
                        <a href="/articles/">Все статьи</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- home-news -->

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>