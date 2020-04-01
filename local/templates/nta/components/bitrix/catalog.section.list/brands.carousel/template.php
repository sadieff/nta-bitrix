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

<? foreach ($arResult['SECTIONS'] as &$arSection): ?>
    <div class="catalog-new_item">
        <div class="catalog-new_brand">
            <img src="<?=$arParams["PARENT_IMAGE"];?>" alt="">
        </div>
        <div class="catalog-new_image">
            <img src="<?=$arSection["IMAGE"];?>" alt="">
        </div>
        <div class="catalog-new_ttl">
            <?=$arParams["PARENT_BRAND"];?> <?=$arSection["NAME"];?>
        </div>
        <div class="catalog-new_price">
            от <?=$arSection["MINPRICE"];?> р.
        </div>
        <a href="<?=$arSection["SECTION_PAGE_URL"];?>" class="catalog-new_more">
            Подробнее
        </a>
    </div>
<? endforeach; ?>