<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true); ?>

<div class="section-detail element-detail">
    <div class="container">
        <div class="section-detail_title">
            <?=$arResult["NAME"];?>
        </div>
        <div class="row">
            <div class="col-xl-5 col-lg-4 col-md-5">
                <div class="section-detail_image">
                    <div class="section-detail_brand">
                        <img src="/local/templates/nta/images/image-8.jpg" alt="">
                    </div>
                    <!--div class="section-detail_type">
                        <img src="/local/templates/nta/images/icon-1.png" alt="">
                    </div-->
                    <img src="<?=$arResult['IMAGE'];?>" alt="">
                </div>
            </div>
            <div class="col-xl-7 col-lg-8 col-md-7">

                <div class="element">
                    <div class="element-params">
                        <div class="element-params_ttl">
                            Характеристики
                        </div>
                        <div class="element-options_enum">
                            <? foreach ($arResult['ARR_MAP_OPTIONS'] as $arOption):
                                if(empty($arResult["PROPERTIES"][$arOption]["VALUE"])) continue;?>
                                <div class="element-options_item">
                                    <span><?=$arResult["PROPERTIES"][$arOption]["NAME"];?>:</span><span><?=$arResult["PROPERTIES"][$arOption]["VALUE"];?></span>
                                </div>
                            <? endforeach; ?>

                            <!--div class="element-options_hidden">
                                <div class="element-options_item">
                                    <span>Слойность:</span><span>10PR</span>
                                </div>
                                <div class="element-options_item">
                                    <span>Тип ТТ/ТL:</span><span>TL</span>
                                </div>
                                <div class="element-options_item">
                                    <span>Стуктура:</span><span>Диагональная</span>
                                </div>
                            </div>

                            <div class="element-options_more">
                                Все характеристики
                            </div-->

                            <div class="element-storage">
                                <div class="element-storage_title">
                                    Наличие на складах <span></span>
                                </div>

                                <div class="element-storage_box">
                                    <div class="element-storage_item">
                                        <div class="element-storage_ttl">
                                            Санкт-Петербург
                                        </div>
                                        <div class="element-storage_quantity">
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="element-storage_item">
                                        <div class="element-storage_ttl">
                                            Ростов-на-Дону
                                        </div>
                                        <div class="element-storage_quantity">
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="element-storage_item">
                                        <div class="element-storage_ttl">
                                            Уфа
                                        </div>
                                        <div class="element-storage_quantity">
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="element-storage_item">
                                        <div class="element-storage_ttl">
                                            Новосибирск
                                        </div>
                                        <div class="element-storage_quantity">
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="element-storage_item">
                                        <div class="element-storage_ttl">
                                            Липецк
                                        </div>
                                        <div class="element-storage_quantity">
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="element-storage_item">
                                        <div class="element-storage_ttl">
                                            Краснодар
                                        </div>
                                        <div class="element-storage_quantity">
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="element-storage_item">
                                        <div class="element-storage_ttl">
                                            Пермь
                                        </div>
                                        <div class="element-storage_quantity">
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="element-storage_item">
                                        <div class="element-storage_ttl">
                                            Новокузнецк
                                        </div>
                                        <div class="element-storage_quantity">
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span class="active"></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>

                                <a href="#" class="section-detail_button">
                                    Подробнее о модели
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="element-shop">
                        <div class="element-shop_box">

                            <div class="element-shop_price-ttl">
                                Цена
                            </div>

                            <div class="element-shop_price">
                                <?=$arResult['PRICE'];?> р.
                            </div>

                            <div class="section-item_count">
                                <div class="section-item_count-wrap">
                                    <span class="count-minus">-</span>
                                    <input type="text" name="quantity" value="1">
                                    <span class="count-plus">+</span>
                                </div>
                            </div>

                            <div class="element-shop_options">
                                <div class="element-shop_option">
                                    <label class="input-checkbox">
                                        <input type="checkbox">
                                        <span>+ Камера</span>
                                    </label>
                                    <label class="input-checkbox">
                                        <input type="checkbox">
                                        <span>+ Ободная лента</span>
                                    </label>
                                    <label class="input-checkbox">
                                        <input type="checkbox">
                                        <span>+ Уплотнительное кольцо</span>
                                    </label>
                                </div>
                            </div>

                            <div class="element-shop_bay">
                                Купить
                            </div>
                            <div class="section-detail_button element-shop_one-click">
                                Купить в 1 клик
                            </div>
                            <div class="element-shop_compare">
                                <div class="section-item_compare add-compare_js">
                                    В сравнение
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> <!-- section-detail -->

<div class="element-features">
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

<div class="product-analog">
    <div class="container">
        <div class="container">
            <div class="catalog-new_title">
                Аналоги
            </div>

            <div class="catalog-new_carousel catalog-new_js owl-carousel">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        <span class="catalog-new_price-old">199 500 р.</span>
                        <span class="catalog-new_price-sale">199 500 р.</span>
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        199 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        199 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        199 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        199 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        199 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- product-analog -->

<div class="product-views">
    <div class="container">
        <div class="container">
            <div class="catalog-new_title">
                Просмотренные товары
            </div>

            <div class="catalog-new_carousel catalog-new_js owl-carousel">
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        <span class="catalog-new_price-old">199 500 р.</span>
                        <span class="catalog-new_price-sale">199 500 р.</span>
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        199 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        199 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        199 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        199 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
                <div class="catalog-new_item">
                    <div class="catalog-new_brand">
                        <img src="/local/templates/nta/images/image-20.jpg" alt="">
                    </div>
                    <div class="catalog-new_image icon-1">
                        <img src="/local/templates/nta/images/product-2.png" alt="">
                    </div>
                    <div class="catalog-new_ttl">
                        Мотошины Mitas
                        120/90-18 65R
                        MC23ROCKRIDER TT
                    </div>
                    <div class="catalog-new_articul">
                        Артикул: <span>50022348800</span>
                    </div>
                    <div class="catalog-new_price">
                        199 500 р.
                    </div>
                    <a href="#" class="catalog-new_more">
                        Подробнее
                    </a>
                    <div class="catalog-new_compare-box">
                        <div class="section-item_compare add-compare_js">
                            В сравнение
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- product-views -->