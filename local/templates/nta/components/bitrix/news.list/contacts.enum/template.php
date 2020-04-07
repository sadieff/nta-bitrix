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
$this->setFrameMode(true); ?>

<?foreach($arResult["ITEMS"] as $arItem):?>

    <li data-map="<?=$arItem["PROPERTIES"]["BALUN"]["~VALUE"];?>">
        <div class="map-title_text"><?=$arItem["NAME"];?></div>
        <div class="map-info">
            <div class="map-info_box">
                <? if(!empty($arItem["PROPERTIES"]["TITLE"]["~VALUE"])): ?>
                    <h3><?=$arItem["PROPERTIES"]["TITLE"]["~VALUE"];?></h3>
                <? else: ?>
                    <h3><?=$arItem["NAME"];?></h3>
                <? endif; ?>
                <p><?=$arItem["PROPERTIES"]["ADDRESS"]["~VALUE"]["TEXT"];?></p>
                <a href="tel:<?=$arItem["PROPERTIES"]["PHONE"]["~VALUE"];?>">
                    <?=$arItem["PROPERTIES"]["PHONE"]["~VALUE"];?>
                </a>
            </div>

            <? if(!empty($arItem["PROPERTIES"]["WORKTIME"]["~VALUE"]["TEXT"])): ?>
            <div class="map-info_box">
                <h3>График работы:</h3>
                <p><?=$arItem["PROPERTIES"]["WORKTIME"]["~VALUE"]["TEXT"];?></p>
            </div>
            <? endif; ?>
        </div>
    </li>

<? endforeach;?>