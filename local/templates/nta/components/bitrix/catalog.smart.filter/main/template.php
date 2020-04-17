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

<form id="mainfilter" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="post" class="filter-form">

    <? foreach ($arResult["ITEMS"] as $arItem):?>

        <div class="filter-item mm">
            <div class="filter-item_title">
                <?=$arItem["NAME"];?> <span></span>
            </div>
            <div class="filter-overlay"></div>
            <div class="filter-item_wrap">
                <div class="filter-select">
                    <span>Все</span>
                </div>
                <? if(!empty($arItem["VALUES"])): ?>
                <div class="filter-content">
                    <div class="filter-content_buttons">
                        <a href="#" class="filter-content_add filter-apply">
                            Подобрать
                        </a>
                        <div class="filter-content_clear">
                            Сбросить
                        </div>
                    </div>
                    <? if(in_array($arItem["CODE"], $arResult["UNITS"])): ?>
                    <div class="filter-content_system">
                        <span>Показать в</span>
                        <div class="filter-content_system-wrap">
                            <label class="input-radio">
                                <input type="radio" value="in" class="sys-type" name="prim-system-<?=$arItem["ID"]?>">
                                <span>дюймах</span>
                            </label>
                            <label class="input-radio">
                                <input checked="checked" type="radio" value="mm" class="sys-type" name="prim-system-<?=$arItem["ID"]?>">
                                <span>миллиметрах</span>
                            </label>
                        </div>
                    </div>
                    <? endif; ?>
                    <div class="filter-content_list">
                        <? foreach ($arItem["VALUES"] as $arValue): ?>

                            <label class="input-checkbox">
                                <input type="checkbox" name="<?=$arValue["CONTROL_NAME"];?>" value="Y" id="<?=$arValue["CONTROL_ID"];?>">
                                <? if(in_array($arItem["CODE"], $arResult["UNITS"])): ?>
                                <span class="in"><?=$arValue["VALUE"];?></span>
                                <span class="mm"><?= round($arValue["VALUE"] * 25.4);?></span>
                                <? else: ?>
                                <span><?=$arValue["VALUE"];?></span>
                                <? endif; ?>
                            </label>

                        <? endforeach; ?>
                    </div>
                </div>
                <? endif; ?>
            </div>
        </div>

    <? endforeach; ?>

    <div class="filter-form_button-box">
        <a href="#" class="filter-form_button filter-apply">
            Подобрать
        </a>
    </div>

    <input type="hidden" value="y" name="ajax">
</form>