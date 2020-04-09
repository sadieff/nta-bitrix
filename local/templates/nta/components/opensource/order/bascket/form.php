<?php

use Bitrix\Main\Error;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Web\Json;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var OpenSourceOrderComponent $component */

$APPLICATION->AddChainItem("Корзина");
?>

<form action="" data-action="feedback.oneclick.php" method="post" name="os-order-form" class="cert_form_js" id="os-order-form">

    <input type="hidden" name="person_type_id" value="<?=$arParams['PERSON_TYPE_ID']?>">
    <input type="hidden" name="save" value="y">

    <div class="card">
        <div class="container">
            <div class="catalog-new_title">
                Корзина
            </div>
            <div class="row">
                <div class="col-lg-7">

                    <? foreach ($arResult['BASKET'] as $arBasketItem): ?>

                    <div class="card-item" data-product-id="<?= $arBasketItem['ID'] ?>">
                        <div class="card-item_info">
                            <a href="<?= $arBasketItem['DETAIL_PAGE_URL'] ?>" class="card-item_title">
                                <?= $arBasketItem['NAME'] ?>
                            </a>
                            <div class="card-item_wrap">
                                <div class="card-item_image">
                                    <img src="<?= $arBasketItem['PREVIEW_PICTURE'] ?>" alt="">
                                </div>
                                <div class="card-item_property">
                                    <div class="element-shop_option">
                                        <? if($arBasketItem["USE"] != "Камеры"): ?>
                                        <label class="input-checkbox">
                                            <input type="checkbox" name="camera" <? if($arBasketItem["PROPERTIES"]["camera"]["VALUE"] == "Y"): ?>checked="checked"<? endif; ?>>
                                            <span>Камера</span>
                                        </label>
                                        <? endif; ?>

                                        <? if($arBasketItem["USE"] != "Камеры" && $arBasketItem["USE"] != "Мотошины" && $arBasketItem["USE"] != "Сельскохозяйственные"): ?>
                                        <label class="input-checkbox">
                                            <input type="checkbox" name="lenta" <? if($arBasketItem["PROPERTIES"]["lenta"]["VALUE"] == "Y"): ?>checked="checked"<? endif; ?>>
                                            <span>Ободная лента</span>
                                        </label>
                                        <? endif; ?>

                                        <? if($arBasketItem["USE"] != "Камеры" && $arBasketItem["USE"] != "Мотошины"): ?>
                                        <label class="input-checkbox">
                                            <input type="checkbox" name="kolco" <? if($arBasketItem["PROPERTIES"]["kolco"]["VALUE"] == "Y"): ?>checked="checked"<? endif; ?>>
                                            <span>Уплотнительное кольцо</span>
                                        </label>
                                        <? endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-item_price">
                            <div class="element-shop_price-ttl card-item_articul">
                                Артикул: <?= $arBasketItem['ARTICLE']; ?>
                            </div>

                            <div class="element-shop_pricebox">
                                <div class="element-shop_price-ttl">
                                    Цена
                                </div>

                                <div class="element-shop_price card-sum_js" data-unit-price="<?= $arBasketItem['PRICE']; ?>">
                                    <?= $arBasketItem['BASE_PRICE_FORMATED']; ?> р.
                                </div>
                            </div>

                            <div class="section-item_count">
                                <div class="section-item_count-wrap">
                                    <span class="count-minus card-minus_js">-</span>
                                    <input type="text" name="quantity" value="<?= $arBasketItem['QUANTITY'] ?>" class="card-quantity_js">
                                    <span class="count-plus card-plus_js">+</span>
                                </div>
                            </div>

                            <div class="card-item_del card-delete_js">
                                <span></span>
                            </div>

                        </div>

                    </div>

                    <? endforeach; ?>

                </div>

                <div class="col-lg-5">

                    <div class="card-order">
                        <div class="card-order_box">
                            <div class="card-order_title">
                                Оформление заказа
                            </div>
                            <div class="card-order_step step-1">
                                <div class="card-order_ttl">
                                    <span>1</span> Оформление заказа
                                </div>

                                <div class="card-order_content">

                                    <div class="card-order_items">

                                        <div class="card-order_item">
                                            <label>Имя</label>
                                            <input type="text" data-rules="required" name="name" <? if(!empty($arResult['USER']['NAME'])): ?> value="<?=$arResult['USER']['NAME'];?>" readonly<? endif; ?>>
                                        </div>

                                        <div class="card-order_item">
                                            <label>Телефон</label>
                                            <input type="text" data-rules="required" name="phone" <? if(!empty($arResult['USER']['PHONE'])): ?> value="<?=$arResult['USER']['PHONE'];?>" readonly<? endif; ?>>
                                        </div>

                                    </div>

                                    <div class="card-order_item">
                                        <label>Электронная почта</label>
                                        <input type="text" data-rules="required" name="email" <? if(!empty($arResult['USER']['EMAIL'])): ?> value="<?=$arResult['USER']['EMAIL'];?>" readonly<? endif; ?>>
                                    </div>

                                    <? if (!$USER->IsAuthorized()): ?>

                                    <input type="hidden" name="list">

                                    <div class="card-order_auth">
                                        Для вашего удобства Вы можете <span class="open-login_js">Войти</span> или <span class="open-reg_js">Зарегистрироваться</span>
                                    </div>

                                    <div class="card-order_buttons">
                                        <div class="go section-detail_button element-shop_one-click">
                                            Купить в 1 клик
                                        </div>
                                        <div class="element-shop_bay next-step_js">
                                            Продолжить
                                        </div>
                                    </div>
                                    <? endif; ?>

                                </div>

                            </div>


                            <div class="card-order_step">
                                <div class="card-order_ttl">
                                    <span>2</span> Доставка
                                </div>

                                <div class="card-order_content <? if (!$USER->IsAuthorized()): ?>step-hidden<? endif; ?>">
                                    <div class="card-order_delivery">

                                        <? foreach ($arResult['DELIVERY_LIST'] as $key => $arDelivery):?>
                                            <label class="input-radio">
                                                <input type="radio" value="<?=$arDelivery['ID'];?>" name="delivery_id" <? if($arDelivery['ID'] == 2): ?>checked="checked"<? endif; ?>>
                                                <span><?= $arDelivery['NAME'] ?></span>
                                            </label>
                                        <? endforeach; ?>
                                    </div>

                                    <div class="card-order_stock">
                                        <div class="card-order_item">
                                            <label>Выберите склад</label>
                                            <div class="input-select">
                                                <select>
                                                    <option value="1">Московская область ногинский р-н Курорт</option>
                                                    <option value="1">Московская область ногинский р-н Курорт</option>
                                                    <option value="1">Московская область ногинский р-н Курорт</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-order_step">
                                <div class="card-order_ttl">
                                    <span>3</span> Оплата
                                </div>
                                <div class="card-order_content <? if (!$USER->IsAuthorized()): ?>step-hidden<? endif; ?>">

                                    <div class="card-order_stock">
                                        <div class="card-order_item">
                                            <div class="input-select">
                                                <select name="pay_system_id">
                                                    <? foreach ($arResult['PAY_SYSTEM_LIST'] as $arPaySystem): ?>
                                                        <option value="<?= $arPaySystem['ID'] ?>"><?= $arPaySystem['NAME'] ?></option>
                                                    <? endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-order_item">
                                            <div class="card-order_file">
                                                <input type="file" name="file">
                                                <span>прикрепить реквизиты</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="card-order_pay <? if (!$USER->IsAuthorized()): ?>step-hidden<? endif; ?>">
                                <div class="card-total_item">
                                    <div class="card-total_title">
                                        Товары <span class="total_js">3</span> позиции
                                    </div>
                                    <div class="card-total_value">
                                        <div class="card-total_sum">
                                            <span class="card-total_js"><?= $arResult['SUM_BASE_FORMATED'] ?></span> р.
                                        </div>
                                    </div>
                                </div>
                                <div class="card-total_item">
                                    <div class="card-total_title">
                                        Ваша скидка
                                        <a href="#" data-fancybox data-src="#pricelevel" class="card-total_popup"></a>
                                    </div>
                                    <div class="card-total_title">
                                        0%
                                    </div>
                                </div>

                                <div class="card-result">
                                    <div class="card-result_item">
                                        Итого:
                                    </div>
                                    <div class="card-result_item">
                                        <span class="card-total_js"><?=$arResult['SUM_FORMATED'] ?></span> р.
                                    </div>
                                </div>

                                <div class="card-button_box">
                                    <label class="input-checkbox">
                                        <input type="checkbox" name="agreement" checked="checked">
                                        <span>Я согласен с Политикой обработки данных и Пользовательским соглашением</span>
                                    </label>

                                    <button class="card-apply_js card-button element-shop_bay">Подтвердить заказ</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- card -->

    <div class="element-features card-features">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-4 col-md-6">
                    <div class="element-features_item">
                        <div class="element-features_icon icon-1"></div>
                        <div class="element-features_text">
                            <div class="element-features_title">
                                Дешевле
                            </div>
                            <div class="element-features_dsc">
                                Можно покупать<br> дешевле - узнай как!
                            </div>
                        </div>
                    </div>
                    <div class="element-features_popup modal">
                        <div class="element-features_item">
                            <div class="element-features_icon icon-1"></div>
                            <div class="element-features_text">
                                <div class="element-features_title">
                                    Дешевле
                                </div>
                                <div class="element-features_dsc">
                                    Товарищи! рамки и место обучения кадров в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям. Таким образом новая модель организационной деятельности требуют от нас анализа существенных финансовых и административных условий. Товарищи! постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="element-features_item">
                        <div class="element-features_icon icon-2"></div>
                        <div class="element-features_text">
                            <div class="element-features_title">
                                Бесплатно
                            </div>
                            <div class="element-features_dsc">
                                Мы бесплатно доставим заказ до терминала ТК
                            </div>
                        </div>
                    </div>
                    <div class="element-features_popup modal">
                        <div class="element-features_item">
                            <div class="element-features_icon icon-2"></div>
                            <div class="element-features_text">
                                <div class="element-features_title">
                                    Бесплатно
                                </div>
                                <div class="element-features_dsc">
                                    Товарищи! рамки и место обучения кадров в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям. Таким образом новая модель организационной деятельности требуют от нас анализа существенных финансовых и административных условий. Товарищи! постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="element-features_item">
                        <div class="element-features_icon icon-3"></div>
                        <div class="element-features_text">
                            <div class="element-features_title">
                                Ходимость
                            </div>
                            <div class="element-features_dsc">
                                Мы знаем реальную ходимость шин!
                            </div>
                        </div>
                    </div>
                    <div class="element-features_popup modal">
                        <div class="element-features_item">
                            <div class="element-features_icon icon-3"></div>
                            <div class="element-features_text">
                                <div class="element-features_title">
                                    Ходимость
                                </div>
                                <div class="element-features_dsc">
                                    Товарищи! рамки и место обучения кадров в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям. Таким образом новая модель организационной деятельности требуют от нас анализа существенных финансовых и административных условий. Товарищи! постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- element-features -->

    <div class="modal" id="pricelevel">
        <div class="modal-title">
            Скидка
        </div>
        <div class="modal-tab_box">
            <div class="modal-dsc">
                С другой стороны консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании систем массового участия. Повседневная практика показывает, что сложившаяся структура организации позволяет выполнять важные задания по разработке дальнейших направлений развития.
            </div>
        </div>
    </div>

    <!-- default -->

    <?/*
    <h2><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_PROPERTIES_TITLE')?>:</h2>
    <table>
        <?php foreach ($arResult['PROPERTIES'] as $propCode => $arProp): ?>
            <tr>
                <td>
                    <label for="<?= $arProp['FORM_LABEL'] ?>"><?= $arProp['NAME'] ?></label>
                    <? foreach ($arProp['ERRORS'] as $error):
                        ?>
                        <div class="error"><?= $error->getMessage() ?></div>
                    <? endforeach; ?>
                </td>
                <td>
                    <?php
                    switch ($arProp['TYPE']):
                        case 'LOCATION':
                            ?>
                            <div class="location">
                                <select class="location-search" name="<?= $arProp['FORM_NAME'] ?>"
                                        id="<?= $arProp['FORM_LABEL'] ?>">
                                    <option
                                            data-data='<?echo Json::encode($arProp['LOCATION_DATA'])?>'
                                            value="<?= $arProp['VALUE'] ?>"><?=$arProp['LOCATION_DATA']['label']?></option>
                                </select>
                            </div>
                            <?
                            break;

                        case 'ENUM':
                            foreach ($arProp['OPTIONS'] as $code => $name):?>
                                <label class="enum-option">
                                    <input type="radio" name="<?= $arProp['FORM_NAME'] ?>" value="<?= $code ?>">
                                    <?= $name ?>
                                </label>
                            <?endforeach;
                            break;

                        case 'DATE':
                            $APPLICATION->IncludeComponent(
                                'bitrix:main.calendar',
                                '',
                                [
                                    'SHOW_INPUT' => 'Y',
                                    'FORM_NAME' => 'os-order-form',
                                    'INPUT_NAME' => $arProp['FORM_NAME'],
                                    'INPUT_VALUE' => $arProp['VALUE'],
                                    'SHOW_TIME' => 'Y',
                                    //'HIDE_TIMEBAR' => 'Y',
                                    'INPUT_ADDITIONAL_ATTR' => 'placeholder="выберите дату"'
                                ]
                            );
                            break;

                        case 'Y/N':
                            ?>
                            <input id="<?= $arProp['FORM_LABEL'] ?>" type="checkbox"
                                   name="<?= $arProp['FORM_NAME'] ?>"
                                   value="Y">
                            <?
                            break;

                        default:
                            ?>
                            <input id="<?= $arProp['FORM_LABEL'] ?>" type="text"
                                   name="<?= $arProp['FORM_NAME'] ?>"
                                   value="<?= $arProp['VALUE'] ?>">
                        <? endswitch; ?>
                </td>
            </tr>
        <? endforeach; ?>
    </table>

    <h2><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_DELIVERIES_TITLE')?>:</h2>
    <? foreach ($arResult['DELIVERY_ERRORS'] as $error):

        ?>
        <div class="error"><?= $error->getMessage() ?></div>
    <? endforeach;
    foreach ($arResult['DELIVERY_LIST'] as $arDelivery):?>
        <label>
            <input type="radio" name="delivery_id"
                   value="<?= $arDelivery['ID'] ?>"
                <?= $arDelivery['CHECKED'] ? 'checked' : '' ?>
            >
            <?= $arDelivery['NAME'] ?>,
            <?= $arDelivery['PRICE_DISPLAY'] ?>
        </label>
        <br>
    <? endforeach; ?>

    <h2><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_PAY_SYSTEMS_TITLE')?>:</h2>
    <? foreach ($arResult['PAY_SYSTEM_ERRORS'] as $error):
        ?>
        <div class="error"><?= $error->getMessage() ?></div>
    <? endforeach;
    foreach ($arResult['PAY_SYSTEM_LIST'] as $arPaySystem): ?>
        <label>
            <input type="radio" name="pay_system_id"
                   value="<?= $arPaySystem['ID'] ?>"
                <?= $arPaySystem['CHECKED'] ? 'checked' : '' ?>
            >
            <?= $arPaySystem['NAME'] ?>
        </label>
        <br>
    <? endforeach; ?>

    <h2><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_BASKET_TITLE')?></h2>
    <table>
        <tr>
            <th><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_BASKET_NAME_COLUMN')?></th>
            <th><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_BASKET_COUNT_COLUMN')?></th>
            <th><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_BASKET_UNIT_PRICE_COLUMN')?></th>
            <th><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_BASKET_DISCOUNT_COLUMN')?></th>
            <th><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_BASKET_TOTAL_COLUMN')?></th>
        </tr>
        <? foreach ($arResult['BASKET'] as $arBasketItem): ?>
            <tr>
                <td>
                    <?= $arBasketItem['NAME'] ?>
                    <? if (!empty($arBasketItem['PROPERTIES'])): ?>
                        <div class="basket-properties">
                            <? foreach ($arBasketItem['PROPERTIES'] as $arProp): ?>
                                <?= $arProp['NAME'] ?>
                                <?= $arProp['VALUE'] ?>
                                <br>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>
                </td>
                <td><?= $arBasketItem['QUANTITY_DISPLAY'] ?></td>
                <td><?= $arBasketItem['BASE_PRICE_DISPLAY'] ?></td>
                <td><?= $arBasketItem['PRICE_DISPLAY'] ?></td>
                <td><?= $arBasketItem['SUM_DISPLAY'] ?></td>
            </tr>
        <? endforeach; ?>
    </table>

    <h2><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_ORDER_TOTAL_TITLE')?></h2>
    <h3><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_PRODUCTS_PRICES_TITLE')?>:</h3>
    <table>
        <tr>
            <td><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_PRODUCTS_BASE_PRICE')?></td>
            <td><?= $arResult['PRODUCTS_BASE_PRICE_DISPLAY'] ?></td>
        </tr>
        <tr>
            <td><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_PRODUCTS_PRICE')?></td>
            <td><?= $arResult['PRODUCTS_PRICE_DISPLAY'] ?></td>
        </tr>
        <tr>
            <td><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_PRODUCTS_DISCOUNT')?></td>
            <td><?= $arResult['PRODUCTS_DISCOUNT_DISPLAY'] ?></td>
        </tr>
    </table>

    <h3><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_DELIVERY_PRICES_TITLE')?>:</h3>
    <table>
        <tr>
            <td><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_DELIVERY_BASE_PRICE')?></td>
            <td><?= $arResult['DELIVERY_BASE_PRICE_DISPLAY'] ?></td>
        </tr>
        <tr>
            <td><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_DELIVERY_PRICE')?></td>
            <td><?= $arResult['DELIVERY_PRICE_DISPLAY'] ?></td>
        </tr>
        <tr>
            <td><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_DELIVERY_DISCOUNT')?></td>
            <td><?= $arResult['DELIVERY_DISCOUNT_DISPLAY'] ?></td>
        </tr>
    </table>

    <h3><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_SUM_TITLE')?>:</h3>
    <table>
        <tr>
            <td><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_TOTAL_BASE_PRICE')?></td>
            <td><?= $arResult['SUM_BASE_DISPLAY'] ?></td>
        </tr>
        <tr>
            <td><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_TOTAL_DISCOUNT')?></td>
            <td><?= $arResult['DISCOUNT_VALUE_DISPLAY'] ?></td>
        </tr>
        <tr>
            <td><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_TOTAL_PRICE')?></td>
            <td><?= $arResult['SUM_DISPLAY'] ?></td>
        </tr>
    </table>

    <input type="hidden" name="save" value="y">
    <br>
    <button type="submit"><?= Loc::getMessage('OPEN_SOURCE_ORDER_TEMPLATE_MAKE_ORDER_BUTTON')?></button>
    <br>
    <br>*/?>

</form>
