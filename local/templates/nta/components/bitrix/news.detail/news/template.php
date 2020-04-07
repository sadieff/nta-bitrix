<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>

<div class="news-detail">
    <div class="container">
        <div class="news-detail_wrap">
            <div class="news-detail_title">
                <?=$arResult["NAME"];?>
            </div>
            <div class="news-detail_date">
                <?=$arResult["DATE"];?>
            </div>
        </div>

        <? if(!empty($arResult['DETAIL_IMAGE'])): ?>
        <div class="news-detail_image">
            <img src="<?=$arResult['DETAIL_IMAGE'];?>" alt="">
        </div>
        <? endif; ?>

        <div class="news-detail_wrap">
            <? if(!empty($arResult["PROPERTIES"]["DESCRIPTION"]["~VALUE"])): ?>
            <div class="news-detail_intro">
                <?=$arResult["PROPERTIES"]["DESCRIPTION"]["~VALUE"]["TEXT"];?>
            </div>
            <? endif; ?>

            <div class="news-detail_content content_">
                <?=$arResult["~DETAIL_TEXT"];?>
            </div>

            <div class="news-detail_social">
                <span>Поделиться новость:</span>
                <a href="#" class="news-detail_icon icon-ok"></a>
                <a href="#" class="news-detail_icon icon-fb"></a>
                <a href="#" class="news-detail_icon icon-vk"></a>
                <a href="#" class="news-detail_icon icon-tw"></a>
            </div>
        </div>

        <div class="news-detail-button_box">
            <a href="/news/" class="about-button">
                Все новости
            </a>
        </div>

        <div class="catalog-navigation">

            <? if(is_array($arResult["TORIGHT"])): ?>
                <a href="<?=$arResult["TORIGHT"]["URL"]?>" class="catalog-navigation_prev">
                    Предыдущая страница
                </a>
            <? else: ?>
                <a href="#" class="catalog-navigation_prev inactive">
                    Предыдущая страница
                </a>
            <? endif; ?>

            <? if(is_array($arResult["TOLEFT"])): ?>
                <a href="<?=$arResult["TOLEFT"]["URL"]?>" class="catalog-navigation_next">
                    Следующая страница
                </a>
            <? else: ?>
                <a href="#" class="catalog-navigation_next inactive">
                    Следующая страница
                </a>
            <? endif; ?>
        </div>

    </div>
</div> <!-- news-detail -->

<div class="news-other">
    <div class="container">

        <div class="news-other_wrap">
            <div class="news-other_title">
                Другие <?=$arParams["SECTION_TITLE"];?>
            </div>
            <a href="<?=$arParams["SECTION_URI"];?>" class="news-other_more">
                Все <?=$arParams["SECTION_TITLE"];?>
            </a>
        </div>

        <div class="row">
            <?
            global $arrFilter;
            $arrFilter = array('!ID' => $arResult["ID"]);
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "news.other", // шаблон
                array(
                    "IBLOCK_TYPE" => "content", // тип информационного блока
                    "IBLOCK_ID"   => $arParams["IBLOCK_ID"], // ID информационного блока
                    "NEWS_COUNT"  => "3",
                    "FILTER_NAME" => "arrFilter",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AJAX" => $_GET["ajaxmode"],
                    "SET_TITLE" => "N",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "DESC",
                    "FIELD_CODE" => array("DETAIL_PICTURE"),
                    "PROPERTY_CODE" => array(
                        0 => "NAME", // включить свойство из инфоблока
                    ),
                ),
                false
            ); ?>
        </div>
    </div>
</div> <!-- news-other -->