<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}
if (!empty($arParams["URL"])) $arResult["sUrlPath"] = $arParams["URL"];
if (!empty($arParams["PARENT_SECTION_CODE"]) && $arParams["AJAX_MODE"] == "Y") $arResult["sUrlPath"] = $arParams["URL"] . $arParams["PARENT_SECTION_CODE"] . "/";
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");

?>
<div class="navigation_js">
    <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>

        <div class="catalog-new_more-box">
            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>" class="catalog-new_link">
                Показать еще
            </a>
        </div>

    <? endif; ?>

    <div class="catalog-navigation">

        <? if ($arResult["NavPageNomer"] > 1): ?>

            <? if ($arResult["bSavePage"]): ?>
                <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>" class="catalog-navigation_prev">
                    Предыдущая страница
                </a>
            <? else: ?>

                <? if ($arResult["NavPageNomer"] > 2): ?>
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>" class="catalog-navigation_prev">
                        Предыдущая страница
                    </a>
                <? else: ?>
                    <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>" class="catalog-navigation_prev">
                        Предыдущая страница
                    </a>
                <? endif; ?>

            <? endif; ?>

        <? else: ?>
            <a class="catalog-navigation_prev inactive">
                Предыдущая страница
            </a>
        <? endif; ?>

        <ul>

            <? if ($arResult["bDescPageNumbering"] === true): ?>

                <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
                    <? if ($arResult["bSavePage"]): ?>
                        <li>
                            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>">-1-<?= GetMessage("nav_prev") ?></a>
                        </li>
                    <? else: ?>
                        <? if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"] + 1)): ?>
                            <li>
                                <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">-2-<?= GetMessage("nav_prev") ?></a>
                            </li>
                        <? else: ?>
                            <li>
                                <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>">-3-<?= GetMessage("nav_prev") ?></a>
                            </li>
                        <? endif ?>
                    <? endif ?>
                <? else: ?>
                    <li>
                        <?= GetMessage("nav_begin") ?>&nbsp;|&nbsp;<?= GetMessage("nav_prev") ?>&nbsp;|
                    </li>
                <? endif ?>

                <? while ($arResult["nStartPage"] >= $arResult["nEndPage"]): ?>
                    <? $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1; ?>

                    <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                        <li class="current">
                            <?= $NavRecordGroupPrint ?>
                        </li>
                    <? elseif ($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false): ?>
                        <li>
                            <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $NavRecordGroupPrint ?></a>
                        </li>
                    <? else: ?>
                        <li>
                            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $NavRecordGroupPrint ?></a>
                        </li>
                    <? endif ?>

                    <? $arResult["nStartPage"]-- ?>
                <? endwhile ?>

                <? if ($arResult["NavPageNomer"] > 1): ?>
                    <li class="next">
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_next") ?></a>
                    </li>
                    <li class="end">
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1"><?= GetMessage("nav_end") ?></a>
                    </li>
                <? else: ?>
                    <li class="end">
                        <?= GetMessage("nav_next") ?>&nbsp;|&nbsp;<?= GetMessage("nav_end") ?>
                    </li>
                <? endif ?>

            <? else: ?>

                <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>

                    <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                        <li class="current">
                            <a><?= $arResult["nStartPage"] ?></a>
                        </li>
                    <? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
                        <li>
                            <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
                        </li>
                    <? else: ?>
                        <li>
                            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
                        </li>
                    <? endif ?>
                    <? $arResult["nStartPage"]++ ?>
                <? endwhile ?>

            <? endif ?>

        </ul>

        <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>" class="catalog-navigation_next">
                Следующая страница
            </a>
        <? else: ?>
            <a class="catalog-navigation_next inactive">
                Следующая страница
            </a>
        <? endif ?>

    </div>
</div>