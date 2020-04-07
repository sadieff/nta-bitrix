<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/map.js');
?>

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
                                <h3>Короткий интересный подзаголовок<br> о компании</h3>
                                <p>Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём.</p>
                                <div class="about-button_box">
                                    <a href="#" class="about-button">
                                        Подробнее
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="about-content_image_wrap">
                                <div class="about-content_image">
                                    <img src="/local/templates/nta/images/image-10.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-content">
                    <div class="about-cert owl-carousel">
                        <a href="/local/templates/nta/images/cert-1.jpg" data-fancybox="/local/templates/nta/images" class="about-cert_item">
                            <div class="about-cert_image">
                                <img src="/local/templates/nta/images/cert-1.jpg" alt="">
                            </div>
                            <div class="about-cert_title">
                                Сертификат качества
                            </div>
                        </a>
                        <a href="/local/templates/nta/images/cert-2.jpg" data-fancybox="/local/templates/nta/images" class="about-cert_item">
                            <div class="about-cert_image">
                                <img src="/local/templates/nta/images/cert-2.jpg" alt="">
                            </div>
                            <div class="about-cert_title">
                                Название сертификаты
                            </div>
                        </a>
                        <a href="/local/templates/nta/images/cert-1.jpg" data-fancybox="/local/templates/nta/images" class="about-cert_item">
                            <div class="about-cert_image">
                                <img src="/local/templates/nta/images/cert-1.jpg" alt="">
                            </div>
                            <div class="about-cert_title">
                                Сертификат качества
                            </div>
                        </a>
                        <a href="/local/templates/nta/images/cert-2.jpg" data-fancybox="/local/templates/nta/images" class="about-cert_item">
                            <div class="about-cert_image">
                                <img src="/local/templates/nta/images/cert-2.jpg" alt="">
                            </div>
                            <div class="about-cert_title">
                                Название сертификаты
                            </div>
                        </a>
                        <a href="/local/templates/nta/images/cert-1.jpg" data-fancybox="/local/templates/nta/images" class="about-cert_item">
                            <div class="about-cert_image">
                                <img src="/local/templates/nta/images/cert-1.jpg" alt="">
                            </div>
                            <div class="about-cert_title">
                                Сертификат качества
                            </div>
                        </a>
                        <a href="/local/templates/nta/images/cert-2.jpg" data-fancybox="/local/templates/nta/images" class="about-cert_item">
                            <div class="about-cert_image">
                                <img src="/local/templates/nta/images/cert-2.jpg" alt="">
                            </div>
                            <div class="about-cert_title">
                                Название сертификаты
                            </div>
                        </a>
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
                        <div class="news-item">
                            <a href="#" class="news-item_image">
                                <img src="/local/templates/nta/images/image-10.jpg" alt="">
                            </a>
                            <a href="#" class="news-item_title">
                                Mitas представит свои шины EM на Bauma
                            </a>
                            <div class="news-item_dsc">
                                Прага, 4 апреля 2019 - Mitas, входящий в группу Trelleborg, представит свои шины для дорожно-строительной техники на…
                            </div>
                        </div>
                        <div class="news-item">
                            <a href="#" class="news-item_image">
                                <img src="/local/templates/nta/images/image-10.jpg" alt="">
                            </a>
                            <a href="#" class="news-item_title">
                                Mitas представит свои шины EM на Bauma
                            </a>
                            <div class="news-item_dsc">
                                Прага, 4 апреля 2019 - Mitas, входящий в группу Trelleborg, представит свои шины для дорожно-строительной техники на…
                            </div>
                        </div>
                        <div class="news-item">
                            <a href="#" class="news-item_image">
                                <img src="/local/templates/nta/images/image-10.jpg" alt="">
                            </a>
                            <a href="#" class="news-item_title">
                                Mitas представит свои шины EM на Bauma
                            </a>
                            <div class="news-item_dsc">
                                Прага, 4 апреля 2019 - Mitas, входящий в группу Trelleborg, представит свои шины для дорожно-строительной техники на…
                            </div>
                        </div>
                    </div>
                    <div class="home-news_more">
                        <a href="#">Все статьи</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- home-news -->

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>