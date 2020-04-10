<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$i = 0;?>
<? //p($arResult); ?>

<div class="modal modal-order" id="modal-order">
    <div class="modal-title">
        Заказ №<?=$arResult["ID"];?> от <?=$arResult["DATE"];?>
    </div>
    <div class="modal-tab_box">
        <div class="modal-order_status">
            Статус заказа: <span><?=$arResult["STATUS"];?></span>
        </div>

        <div class="modal-order_enum">
            <div class="modal-order_title">
                    <span class="model-title_num">
                        №
                    </span>
                <span class="modal-title_name">
                        Наименование
                    </span>
                <span class="modal-title_count">
                        Количество
                    </span>
                <span class="modal-title_price">
                        Сумма
                    </span>
            </div>

            <? foreach ($arResult["BASKET"] as $arItems): ?>

                <div class="modal-order_item">
                    <div class="modal-order_num" data-title="№">
                        <?=++$i;?>
                    </div>
                    <div class="modal-order_name" data-title="Наименование">
                        <?=$arItems["NAME"];?>
                    </div>
                    <div class="modal-order_count" data-title="Количество">
                        <?=$arItems["QUANTITY"];?> шт.
                    </div>
                    <div class="modal-order_price" data-title="Сумма">
                        <?=$arItems["PRICE"];?> р.
                    </div>
                </div>
            <? endforeach; ?>

        </div>

        <div class="modal-order_total">
            Итого: <?=$arResult["TOTAL_COUNT"];?> шт.<br> на сумму <span><?=$arResult["PRICE_FORMATED"];?></span>
        </div>

        <div class="modal-order_button_box">
            <button class="go">Повторить заказ</button>
        </div>
    </div>
</div>



