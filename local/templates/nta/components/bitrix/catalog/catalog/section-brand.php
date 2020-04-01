<?php
//$APPLICATION->AddChainItem($arSection["UF_TITLE"]);
if(!empty($arSection["DETAIL_PICTURE"])) $APPLICATION->AddViewContent('BREADCRUMB_CLASS', 'breadcrumb-white');
$this->setFrameMode(true); ?>

<? if(!empty($arSection["DETAIL_PICTURE"])): ?>
    <div class="static-banner static-banner_brands">
        <img src="<?=CFile::GetPath($arSection["DETAIL_PICTURE"]);?>" alt="" class="static-banner_image">
        <div class="container">
            <div class="banner-title">
                <?=$arSection["~UF_BANNER_TITLE"];?>
            </div>
            <div class="banner-dsc">
                <?=$arSection["~UF_BANNER_DSC"];?>
            </div>
            <div class="static-banner_button">
                <a href="#" class="static-banner_link">
                    Модели и размеры
                </a>
            </div>
        </div>
        <div class="static-banner_brand">
            <img src="<?=CFile::GetPath($arSection["PICTURE"]);?>" alt="">
        </div>
    </div> <!-- static-banner -->
<?endif;?>

<div class="page-brand_info">
    <div class="container">
        <div class="row">
            <div class="<?if(!empty($arSection["UF_SLIDER"])):?>col-lg-7<?else:?>col-lg-12<?endif;?>">
                <div class="page-brand_title">
                    <?=$arSection["UF_TITLE"];?>
                </div>
                <div class="page-brand_content content_">
                    <?=$arSection["~DESCRIPTION"];?>
                </div>
            </div>
            <?if(!empty($arSection["UF_SLIDER"])):?>
                <div class="col-lg-4 offset-lg-1">
                    <div class="page-brand_carousel owl-carousel">
                        <? foreach($arSection["UF_SLIDER"] as $arImage):
                            $image = CFile::ResizeImageGet($arImage, array('width' => 372, 'height' => 323), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
                            <div class="page-brand_carousel-item">
                                <img src="<?=$image["src"];?>" alt="">
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            <?endif;?>
        </div>
    </div>
</div> <!-- page-brand_info -->

<div class="filter-home catalog-filter">
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
                "SEF_RULE" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
                "SECTION_CODE_PATH" => "",
                "SMART_FILTER_PATH" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
                "CURRENCY_ID" => "RUB"
            ),
            false
        );?>

    </div>

</div> <!-- filter-home -->

<div class="category-section page-brand_section">
    <div class="container">
        <? $APPLICATION->IncludeComponent("bitrix:catalog.section.list",
            "brands.listing",
            Array(
                "PARENT_IMAGE" => CFile::GetPath($arSection["PICTURE"]),
                "PARENT_BRAND" => $arSection["NAME"],
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
                "TOP_DEPTH" => "1",
                "SECTION_FIELDS" => "",
                "ADD_SECTIONS_CHAIN" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_NOTES" => "",
                "CACHE_GROUPS" => "N"
            )
        ); ?>

        <!-- https://tuning-soft.ru/articles/bitrix/pagination-by-sections.html -->

    </div>
</div> <!-- category-section -->
