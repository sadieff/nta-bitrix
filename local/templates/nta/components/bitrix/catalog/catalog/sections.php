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

<div class="main-slider owl-carousel">
    <div class="main-sliders_item">
        <img src="/local/templates/nta/images/image-1.jpg" alt="">
        <div class="container">
            <div class="main-slider_title">
                Эксклюзивный дилер Mitas в России
            </div>
            <div class="main-slider_dsc">
                Индустриальные, сельскохозяйственные, лесные, для погрузчиков, мотошины, велошины
            </div>
            <div class="main-slider_logo">
                <img src="/local/templates/nta/images/image-14.jpg" alt="">
                <img src="/local/templates/nta/images/image-15.jpg" alt="">
            </div>
            <a href="#" class="main-slider_button">Начать подбор</a>
        </div>
    </div>
    <div class="main-sliders_item">
        <img src="/local/templates/nta/images/image-2.jpg" alt="">
        <div class="container">
            <div class="main-slider_title">
                Официальный дилер мировых лидеров
            </div>
            <div class="main-slider_dsc">
                По производству высококачественных индустриальных, сельскохозяйственных и OTR шин
            </div>
            <div class="main-slider_logo">
                <img src="/local/templates/nta/images/image-14.jpg" alt="">
                <img src="/local/templates/nta/images/image-15.jpg" alt="">
            </div>
            <a href="#" class="main-slider_button">Начать подбор</a>
        </div>
    </div>
    <div class="main-sliders_item">
        <img src="/local/templates/nta/images/image-1.jpg" alt="">
        <div class="container">
            <div class="main-slider_title">
                Официальный дилер мировых лидеров
            </div>
            <div class="main-slider_dsc">
                По производству высококачественных индустриальных, сельскохозяйственных и OTR шин
            </div>
        </div>
    </div>
    <div class="main-sliders_item">
        <img src="/local/templates/nta/images/image-2.jpg" alt="">
        <div class="container">
            <div class="main-slider_title">
                Официальный дилер мировых лидеров
            </div>
            <div class="main-slider_dsc">
                По производству высококачественных индустриальных, сельскохозяйственных и OTR шин
            </div>
        </div>
    </div>
</div> <!-- main-slider -->

<div class="category-list category-list_small">
    <div class="container">
        <div class="category-list_title">
            Популярные размеры
        </div>
        <div class="category-list_enum">
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
            <a href="#" class="category-list_item">10-16,5</a>
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
            <a href="#" class="category-list_item active">Шины для трактора</a>
            <a href="#" class="category-list_item">Шины для самосвала</a>
            <a href="#" class="category-list_item">Шины для фронтальных погрузчиков</a>
            <a href="#" class="category-list_item">Шины для JCB</a>
            <a href="#" class="category-list_item">Шины для комбайна</a>
            <a href="#" class="category-list_item">Шины для крана</a>
            <a href="#" class="category-list_item">Шины для экскаваторов-погрузчиков</a>
            <a href="#" class="category-list_item">Шины для катка</a>
            <a href="#" class="category-list_item">Шины для грейдера</a>
            <a href="#" class="category-list_item">Шины для мини погрузчиков</a>
        </div>
    </div>
</div> <!-- category-list -->

<div class="catalog-new">
    <div class="container">
        <div class="catalog-new_title">
            Новые поступления
        </div>

        <div class="catalog-new_carousel catalog-new_js owl-carousel">
            <div class="catalog-new_item">
                <div class="catalog-new_brand">
                    <img src="/local/templates/nta/images/image-20.jpg" alt="">
                </div>
                <div class="catalog-new_image icon-1">
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
            <div class="catalog-new_item">
                <div class="catalog-new_brand">
                    <img src="/local/templates/nta/images/image-20.jpg" alt="">
                </div>
                <div class="catalog-new_image icon-3">
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
            <div class="catalog-new_item">
                <div class="catalog-new_brand">
                    <img src="/local/templates/nta/images/image-20.jpg" alt="">
                </div>
                <div class="catalog-new_image icon-4">
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
