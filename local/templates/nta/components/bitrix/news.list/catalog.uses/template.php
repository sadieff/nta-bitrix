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

<div class="catalog-row">

    <?foreach($arResult["ITEMS"] as $arItem):?>

        <div class="<?=$arItem["GRID_CLASS"];?>">
            <div class="catalog-section">
                <img src="<?=$arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"];?>" class="catalog-section_main" alt="">
                <div class="catalog-section_wrap">
                    <div class="catalog-section_title">
                        <?=$arItem["NAME"];?>
                    </div>
                    <div class="catalog-section_hidden">
                        <div class="catalog-section_button-box">
                            <a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="catalog-section_button">
                                Смотреть каталог
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?endforeach;?>

</div>
