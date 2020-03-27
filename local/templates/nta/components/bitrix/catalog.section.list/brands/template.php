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
        <a href="<?=$arSection["SECTION_PAGE_URL"];?>" class="brands-home_item <?if($arSection["UF_BRAND_SELECT"] == 1):?>active<?endif;?>">
            <span>
                <img src="<?=$arSection["PICTURE"]["SRC"];?>" alt="">
            </span>
        </a>
    <? endforeach; ?>
