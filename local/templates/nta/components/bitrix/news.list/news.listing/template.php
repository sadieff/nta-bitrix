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
$i = 0;
if($arParams["AJAX"] == "y") ob_start();
?>
<div class="row">

<? foreach($arResult["ITEMS"] as $arItem):?>

    <? if($i == 0): ?>

        <div class="col-lg-12">
            <a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="news-main">
                <div class="news-main_image">
                    <img src="<?=$arItem["DETAIL_IMAGE"];?>" alt="">
                </div>
                <div class="news-main_dsc">
                    <div class="news-main_date">
                        <?=$arItem["DATE"];?>
                    </div>
                    <div class="news-main_title">
                        <?=$arItem["NAME"];?>
                    </div>
                    <div class="news-main_text">
                        <?=$arItem["PREVIEW_TEXT"];?>
                    </div>
                </div>
            </a>
        </div>

    <? else: ?>

        <div class="col-lg-4 col-md-6">
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

    <? endif; ?>

<? $i++;
 endforeach;?>

</div>

<?=$arResult["NAV_STRING"];?>

<? if($arParams["AJAX"] == "y") getAjaxContent(ob_get_contents()); ?>