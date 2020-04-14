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
$this->setFrameMode(true);
if($arParams["AJAX"] == "y") ob_start();?>

<div class="section-list_enum">

<? if($arParams["AJAX"] != "y"): ?>
    <div class="section-header">
        <span>Фото</span>
        <span>Наименование</span>
        <span class="prop-1">Посадочный<br> диаметр</span>
        <span class="prop-2">Типоразмер</span>
        <span class="prop-3">Слойность</span>
        <span class="prop-quantity">Наличие</span>
        <span>Кол-во</span>
        <span>Стоимость</span>
    </div>
<? endif; ?>

<? foreach ($arResult['ITEMS'] as $arItem): ?>

    <div class="section-item product-js">
        <div class="section-item_image">
            <img src="<?=$arItem["IMAGE"];?>" alt="">
        </div>
        <a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="section-item_name">
            <?=$arItem["TITLE"];?>
        </a>
        <div class="section-item_property prop-1" data-title="Посадочный диаметр">
            <?=$arItem["PROPERTIES"]["DIAMETR_POSADOCHNYY_DYUYM"]["VALUE"];?>
        </div>
        <div class="section-item_property prop-2" data-title="Типоразмер">
            <?=$arItem["PROPERTIES"]["TIPORAZMER_2_US"]["VALUE"];?>
        </div>
        <div class="section-item_property prop-3" data-title="Слойность">
            <?=$arItem["PROPERTIES"]["SLOYNOST"]["VALUE"];?>
        </div>
        <div class="section-item_quantity">
            <span class="step-<?=$arItem['STROGAE_POSITION'];?>"></span>
        </div>
        <div class="section-item_count">
            <div class="section-item_count-wrap">
                <span class="count-minus">-</span>
                <input type="text" name="quantity" value="1" >
                <span class="count-plus">+</span>
            </div>
        </div>
        <div class="section-item_price">
            <?=$arItem["PRICE"];?> р.
        </div>
        <div class="section-item_actions">
            <div class="section-item_button add-bascket_js" data-product="<?=$arItem["ID"];?>">
                Купить
            </div>
            <div class="section-item_compare add-compare_js" data-product="<?=$arItem["ID"];?>">
                В сравнение
            </div>
        </div>
    </div>

<? endforeach; ?>

</div>

<?=$arResult["NAV_STRING"];?>

<? if($arParams["AJAX"] == "y") getAjaxContent(ob_get_contents()); ?>