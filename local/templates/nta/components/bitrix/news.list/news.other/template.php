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
$i = 1;
?>

<?foreach($arResult["ITEMS"] as $arItem):?>

    <div class="<? if($i == 3): ?>col-lg-4 d-md-none d-lg-block<? else: ?>col-lg-4 col-md-6<? endif; ?>">
        <div class="news-item">
            <a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="news-item_image">
                <img src="<?=$arItem["IMAGE"];?>" alt="">
            </a>
            <div class="news-item_date">
                <?=$arItem["DATE"];?>
            </div>
            <a href="#" class="news-item_title">
                <?=$arItem["NAME"];?>
            </a>
            <div class="news-item_dsc">
                <?=$arItem["PREVIEW_TEXT"];?>
            </div>
        </div>
    </div>

<? $i++;
endforeach;?>