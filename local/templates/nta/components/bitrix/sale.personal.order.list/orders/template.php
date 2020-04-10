<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset; ?>

<div class="section-list_enum">

    <div class="section-header">
        <span>№</span>
        <span>Дата</span>
        <span>Сумма</span>
        <span>Статус</span>
        <span>Действия</span>
    </div>

<? foreach ($arResult["ORDERS"] as $arItem): ?>

    <div class="section-item">
        <div class="cabinet-order_num" data-title="№">
            <?=$arItem["ORDER"]["ID"];?>
        </div>
        <div class="cabinet-order_date" data-title="Дата">
            <?=$arItem["DATE"];?>
        </div>
        <div class="cabinet-order_price" data-title="Сумма">
            <?=$arItem["PRICE"];?> р.
        </div>
        <div class="cabinet-order_status"  data-title="Статус">
            <?=$arItem["STATUS"];?>
        </div>
        <div class="cabinet-order_actions" data-title="Действия">
            <div class="cabinet-order_actions-box">
                <a data-fancybox data-type="ajax" href="#" data-src="/local/ajax/order.info.php?id=<?=$arItem["ORDER"]["ID"];?>">Подробнее</a>
                <div>
                    <span class="cabinet-order_back">Повторить</span>
                </div>
            </div>
        </div>
    </div>

<? endforeach; ?>

</div>
