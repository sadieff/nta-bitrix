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
        array("IBLOCK_ID" => $arParams["FILTER_SECTION_IBLOCK_ID"], "CODE" => $arResult["VARIABLES"]["SECTION_CODE"]),
        false,
        false,
        array("PROPERTY_CUSTOM_FILTER", "NAME")
    );
    while ($section = $request -> GetNextElement()){
        $item = $section->GetFields();
        $find = json_decode($item["~PROPERTY_CUSTOM_FILTER_VALUE"]);
        $find = $find->CHILDREN[0]->DATA->value;
        $APPLICATION->AddChainItem($item["NAME"]);
    }

    /* получим список разделов, у которых есть элементы, попадающие под фильтр */
    $mapSection = [];
    $arSection = [];
    $Result = CIBlockElement::GetList(
        array("SORT" => "ASC"),
        array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "PROPERTY_USE" => $find),
        array("IBLOCK_SECTION_ID"),
        //false,
        false,
        array("ID", "IBLOCK_SECTION_ID", "NAME")
    );

    while ($element = $Result -> GetNextElement()){
        $item = $element->GetFields();
        $prop["PROPERTY"] = $element->GetProperties();
        $mapSection[$item["IBLOCK_SECTION_ID"]] = $item["IBLOCK_SECTION_ID"];

    }

    $cache->endDataCache($mapSection);

}
?>

<div class="catalog-main_slider no-counter owl-carousel">
    <div class="catalog-slider_item">
        <picture>
            <source srcset="/local/templates/nta/images/banner-2-mobile.jpg" media="(max-width: 600px)"/>
            <img src="/local/templates/nta/images/banner-2.jpg" alt="">
        </picture>
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="catalog-slider_ttl">
                        Шины для<br> трактора
                    </div>
                    <div class="catalog-slider_text">
                        Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь.
                    </div>
                </div>
                <div class="col-md-5 col-lg-4 col-xl-3">
                    <div class="catalog-slider_menu">
                        <ul>
                            <li><a href="#" class="active">Шины для спецтехники</a></li>
                            <li><a href="#">Вилочных погрузчиков</a></li>
                            <li><a href="#">Сельскохозяйственные</a></li>
                            <li><a href="#">Крупногабаритные</a></li>
                            <li><a href="#">Лесные шины</a></li>
                            <li><a href="#">Мотошины</a></li>
                            <li><a href="#">Велошины</a></li>
                            <li><a href="#">Камеры</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="catalog-slider_item">
        <picture>
            <source srcset="/local/templates/nta/images/banner-2-mobile.jpg" media="(max-width: 600px)"/>
            <img src="/local/templates/nta/images/banner-2.jpg" alt="">
        </picture>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="catalog-slider_ttl">
                        Шины для<br> трактора
                    </div>
                    <div class="catalog-slider_text">
                        Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь.
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="catalog-slider_menu">
                        <ul>
                            <li><a href="#" class="active">Шины для спецтехники</a></li>
                            <li><a href="#">Вилочных погрузчиков</a></li>
                            <li><a href="#">Сельскохозяйственные</a></li>
                            <li><a href="#">Крупногабаритные</a></li>
                            <li><a href="#">Лесные шины</a></li>
                            <li><a href="#">Мотошины</a></li>
                            <li><a href="#">Велошины</a></li>
                            <li><a href="#">Камеры</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- main-slider -->

<div class="filter-home catalog-filter">
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

</div> <!-- filter-home -->


<div class="category-section category-section_padding">
    <div class="container">
            <?
            if(!empty($mapSection)):
                global $sectionFilter;
                $sectionFilter = array('ID' => $mapSection, 'DEPTH_LEVEL' => 2);
                $APPLICATION->IncludeComponent("bitrix:catalog.section.list",
                    "brands.listing",
                    Array(
                        "FILTER_NAME" => "sectionFilter",
                        "PARENT_IMAGE" => CFile::GetPath($arSection["PICTURE"]),
                        "PARENT_BRAND" => $arSection["NAME"],
                        "VIEW_MODE" => "TEXT",
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
                );
            endif;?>

        <div class="row">
            <!--div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-6">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-2">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Cultor SKID STEER 50
                    </div>
                    <div class="catalog-new_price">
                        от 175 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                </div>
            </div>
        </div-->


        <div class="catalog-new_more-box">
            <a href="#" class="catalog-new_link">
                Показать еще
            </a>
        </div>

        <div class="catalog-navigation">
            <a href="#" class="catalog-navigation_prev">
                Предыдущая страница
            </a>
            <ul>
                <li class="current"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
            <a href="#" class="catalog-navigation_next">
                Предыдущая страница
            </a>
        </div>
    </div>
</div>

<div class="catalog-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="catalog-info_title">
                    Короткий интересный подзаголовок о компании
                </div>
                <div class="catalog-info_dsc">
                    Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём.
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="catalog-info_image">
                    <img src="/local/templates/nta/images/image-21.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div> <!-- catalog-info -->

