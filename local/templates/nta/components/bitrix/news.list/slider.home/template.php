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

<div class="main-slider owl-carousel">
    <? foreach($arResult["ITEMS"] as $arItem): ?>

    <div class="main-sliders_item">
        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" alt="">
        <div class="container">

            <? if(!empty($arItem["NAME"])): ?>
            <div class="main-slider_title">
                <?=$arItem["NAME"];?>
            </div>
            <? endif; ?>

            <? if(!empty($arItem["PROPERTIES"]["DSC"]["VALUE"])): ?>
            <div class="main-slider_dsc">
                <?=$arItem["PROPERTIES"]["DSC"]["VALUE"];?>
            </div>
            <? endif; ?>

            <? if(!empty($arItem["PROPERTIES"]["IMAGES"]["VALUE"])): ?>
            <div class="main-slider_logo">
                <? foreach ($arItem["PROPERTIES"]["IMAGES"]["VALUE"] as $arImage): ?>
                    <img src="<?=CFile::GetPath($arImage);?>" alt="">
                <? endforeach; ?>
            </div>
            <? endif; ?>

            <? if(!empty($arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["BUTTON_LINK"]["VALUE"])):?>
            <a href="<?=$arItem["PROPERTIES"]["BUTTON_LINK"]["VALUE"];?>" class="main-slider_button"><?=$arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"];?></a>
            <? endif; ?>

        </div>
    </div>
    <? endforeach; ?>
</div> <!-- main-slider -->
