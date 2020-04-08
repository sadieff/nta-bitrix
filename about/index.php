<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->AddViewContent('BREADCRUMB_CLASS', 'breadcrumb-white');
$APPLICATION->SetTitle("Доставка и оплата");

$arCompany = $APPLICATION->IncludeComponent("get:element.property", "",
    Array(
        "IBLOCK_ID" => "14",
        "ELEMENT" => "3455",
        "OUTPUT" => "RETURN",
    ),
    false
); ?>

    <div class="static-banner about-static_banner">
        <picture>
            <? $sliderMobile  = CFile::ResizeImageGet($arCompany["PREVIEW_PICTURE"], array('width'=>480, 'height'=>851), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
            <? $sladerDesctop = CFile::ResizeImageGet($arCompany["DETAIL_PICTURE"], array('width'=>1920, 'height'=>490), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
            <source srcset="<?=$sliderMobile["src"];?>" media="(max-width: 600px)"/>
            <img src="<?=$sladerDesctop["src"];?>" alt=""  class="static-banner_image">
        </picture>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner-title">
                        <?=$arCompany["NAME"];?>
                    </div>
                    <div class="banner-dsc banner-about_dsc">
                        <?=$arCompany["PROPERTIES"]["ADVANTAGES_TITLE"]["~VALUE"];?>
                    </div>
                    <div class="static-banner_list">
                        <ul>
                            <? foreach ($arCompany["PROPERTIES"]["ADVANTAGES"]["VALUE"] as $arAdvantage): ?>
                                <li><?=$arAdvantage;?></li>
                            <? endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="static-banner_video">
                        <?=$arCompany["PROPERTIES"]["VIDEO_TITLE"]["~VALUE"];?>
                        <? if(!empty($arCompany["PROPERTIES"]["VIDEO"]["~VALUE"])): ?>
                            <a  data-fancybox="" href="https://www.youtube.com/watch?v=<?=$arCompany["PROPERTIES"]["VIDEO"]["~VALUE"];?>"></a>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- static-banner -->

    <div class="about-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 order-md-1 order-2">
                    <div class="content_">
                        <?=$arCompany["~DETAIL_TEXT"];?>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 order-md-2 order-1">
                    <div class="about-page_image">
                        <? $photo = CFile::ResizeImageGet($arCompany["PROPERTIES"]["DIRECTOR_PHOTO"]["VALUE"], array('width'=>370, 'height'=>537), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
                        <img src="<?=$photo["src"];?>" alt="">
                    </div>
                    <div class="about-page_dsc">
                        Генеральный директор
                    </div>
                    <div class="about-page_title">
                        <?=$arCompany["PROPERTIES"]["DIRECTOR"]["VALUE"];?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- about -->

    <div class="filter-home about-page_filter">
        <div class="container">
            <div class="filter-home_title">
                Наши бренды
            </div>
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

    <div class="excellence">
        <div class="container">
            <div class="excellence-title">
                Наши преимущества
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-4 col-md-6">
                    <div class="excellence-item">
                        <div class="excellence-item_dsc icon-1">
                            <span>01</span>
                        </div>
                        <div class="excellence-item_content">
                            <div class="excellence-item_title">
                                Эксклюзивный дилер Mitas
                            </div>
                            <div class="excellence-item_text">
                                на всей территории России - индустриальные, сельскохозяйственные и мотошины
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="excellence-item">
                        <div class="excellence-item_dsc icon-2">
                            <span>02</span>
                        </div>
                        <div class="excellence-item_content">
                            <div class="excellence-item_title">
                                товарный запас
                            </div>
                            <div class="excellence-item_text">
                                товарный запас<br> компании составляет<br> более 10 000 000 $
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="excellence-item">
                        <div class="excellence-item_dsc icon-3">
                            <span>03</span>
                        </div>
                        <div class="excellence-item_content">
                            <div class="excellence-item_title">
                                Широкий ассортимент
                            </div>
                            <div class="excellence-item_text">
                                шин на промышленную, сельскохозяйственную, карьерную, складскую и другие виды специальной техники
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- excellence -->

    <div class="about about-page">
        <div class="container">
            <div class="catalog-new_title">
                Сертификаты
            </div>
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
    </div> <!-- about -->

    <div class="company-info">
        <div class="container">
            <div class="catalog-new_title">
                Реквизиты компании
            </div>
            <div class="company-info_enum">
                <div class="company-info_item">
                    <div class="company-info_ttl">
                        <span>Полное наименование организации</span>
                    </div>
                    <div class="company-info_value">
                        Общество с ограниченной ответственносьтю “Национальный Шинный Альянс”
                    </div>
                </div>
                <div class="company-info_item">
                    <div class="company-info_ttl">
                        <span>Почтовый адрес</span>
                    </div>
                    <div class="company-info_value">
                        109382, г. Москва, ул. Совхозная, д. 1, стр.1
                    </div>
                </div>
                <div class="company-info_item">
                    <div class="company-info_ttl">
                        <span>Идентификационный номер ИНН</span>
                    </div>
                    <div class="company-info_value">
                        7728863936
                    </div>
                </div>
                <div class="company-info_item">
                    <div class="company-info_ttl">
                        <span>Код причины постановки на учет КПП</span>
                    </div>
                    <div class="company-info_value">
                        772801001
                    </div>
                </div>
                <div class="company-info_item">
                    <div class="company-info_ttl">
                        <span>ОГРН</span>
                    </div>
                    <div class="company-info_value">
                        5137746153420
                    </div>
                </div>
            </div>
            <div class="company-info_button_box">
                <a href="#" class="company-info_link">
                    Скачать <span>*PDF 3.2mb</span>
                </a>
            </div>
        </div>
    </div> <!-- company-info -->

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>