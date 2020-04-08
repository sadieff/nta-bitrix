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

<?foreach($arResult["ITEMS"] as $arItem):?>

    <a href="<?=$arItem["IMAGE_BIG"];?>" data-fancybox="cert" class="about-cert_item">
        <div class="about-cert_image">
            <img src="<?=$arItem["IMAGE_SMALL"];?>" alt="">
        </div>
        <div class="about-cert_title">
            <?=$arItem["NAME"];?>
        </div>
    </a>

<?endforeach;?>