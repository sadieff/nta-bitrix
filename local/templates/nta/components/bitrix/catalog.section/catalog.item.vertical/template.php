<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

$this->setFrameMode(true); ?>

<? foreach ($arResult['ITEMS'] as $arItem): ?>

    <div class="catalog-new_item">
        <!--div class="catalog-new_brand">
            <img src="/local/templates/nta/images/image-20.jpg" alt="">
        </div-->
        <div class="catalog-new_image">
            <img src="<?=$arItem["IMAGE"];?>" alt="">
        </div>
        <div class="catalog-new_ttl">
            <?=$arItem["TITLE"];?>
        </div>
        <div class="catalog-new_articul">
            Артикул: <span><?=$arItem["PROPERTIES"]["ARTICLE"]["VALUE"];?></span>
        </div>
        <div class="catalog-new_price">
            <?=$arItem["PRICE"];?> р.
        </div>
        <a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="catalog-new_more">
            Подробнее
        </a>
        <div class="catalog-new_compare-box">
            <div class="section-item_compare add-compare_js">
                В сравнение
            </div>
        </div>
    </div>

<? endforeach; ?>
