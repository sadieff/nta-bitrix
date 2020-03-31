<?php

use Bitrix\Main\Error;
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\Order;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
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
/** @var OpenSourceOrderComponent $component */
$APPLICATION->AddChainItem("Оформление заказа");
?>

<div class="order">
    <div class="container">
        <div class="catalog-new_title">
            Оформление заказа
        </div>

        <div class="order-success">
            <div class="order-success_title">
                Заказ подтвержден!
            </div>
            <div class="order-success_number">
                Ваш заказ № <?=$arResult['ID'];?>
            </div>
            <div class="order-success_dsc">
                Мы отправили вам письмо с деталями вашего заказа на электронную почту mail@mail.ru. В ближайшее время с вами свяжется наш менеджер для подтверждения заказа.<br><br> Спасибо что выбрали наш магазин!
            </div>
        </div>

        <div class="order-info">
            <div class="order-info_content">
                <div class="order-result">
                    <div class="order-result_item">
                        Итого:
                    </div>
                    <div class="order-result_item">
                        <div class="order-result_total">
                            <?=number_format($arResult['PRICE'], 0, ',', ' ');?> р.
                        </div>
                    </div>

                </div>
                <div class="order-info_box">
                    <div class="order-info_ttl">
                        Контактное лицо
                    </div>
                    <div class="order-info_text">
                        Зерно Константин Николаевич
                    </div>
                    <div class="order-info_text">
                        +7 (495) 332 74 11
                    </div>
                    <div class="order-info_text">
                        <a href="#">zernokostya@yandex.ru</a>
                    </div>
                </div>
                <div class="order-info_box">
                    <div class="order-info_ttl">
                        Адрес доставки
                    </div>
                    <div class="order-info_text">
                        109382, Россия, г. Москва,
                    </div>
                    <div class="order-info_text">
                        ул. Совхозная, дом 1 стр. 1
                    </div>
                </div>
                <div class="order-info_box">
                    <div class="order-info_ttl">
                        Ваш персональный менеджер
                    </div>
                    <div class="order-manager">
                        <div class="order-manager_image">
                            <img src="/local/templates/nta/images/manager.png" alt="">
                        </div>
                        <div class="order-manager_info">
                            <div class="order-manager_title">
                                Зерно Валерия Николаевна
                            </div>
                            <div class="order-manager_phone">
                                +7 (495) 332 74 11
                            </div>
                            <div class="order-manager_email">
                                zernokostya@yandex.ru
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-info_enum">
                <div class="order-info_ttl">
                    Позиции в заказе
                </div>

                <? foreach ($arResult['BASKET'] as $arItem): ?>

                <div class="order-item">
                    <div class="card-item_image">
                        <img src="/local/templates/nta/images/product-4.png" alt="">
                    </div>
                    <div class="order-item_content">
                        <div class="order-item_count">
                            <?=$arItem["QUANTITY"];?> шт.
                        </div>
                        <div class="order-item_title">
                            <?=$arItem["NAME"];?>
                        </div>
                        <div class="order-item_options">
                            <label class="input-checkbox">
                                <input type="checkbox" checked="checked">
                                <span>Камера</span>
                            </label>
                            <label class="input-checkbox">
                                <input type="checkbox" checked="checked">
                                <span>Ободная лента</span>
                            </label>
                            <label class="input-checkbox">
                                <input type="checkbox" checked="checked">
                                <span>Уплотнительное кольцо</span>
                            </label>
                        </div>
                    </div>
                </div>

                <? endforeach; ?>

            </div>

            <div class="order-print">
                Распечатать
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
