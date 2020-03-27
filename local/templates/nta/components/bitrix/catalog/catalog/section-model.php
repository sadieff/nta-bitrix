<?
$APPLICATION->AddViewContent('BREADCRUMB_CLASS', 'breadcrumb-absolute breadcrumb-hide-home');
if(!empty($arSection["PICTURE"])){
    $picture = CFile::ResizeImageGet($arSection["PICTURE"], array('width'=>371, 'height'=>467), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
else $picture["src"] = "/local/templates/nta/images/default.jpg";;
?>

<div class="section-detail">
    <div class="container">
        <div class="section-detail_title">
            <?=$arSection["UF_TITLE"];?>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="section-detail_image">
                    <div class="section-detail_brand">
                        <img src="/local/templates/nta/images/image-8.jpg" alt="">
                    </div>
                    <!--div class="section-detail_type">
                        <img src="/local/templates/nta/images/icon-1.png" alt="">
                    </div-->
                    <img src="<?=$picture["src"];?>" alt="">
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="section-detail_ttl">
                    Описание товара
                </div>
                <div class="section-detail_dsc">
                    <?=$arSection["~DESCRIPTION"];?>
                </div>

                <? if(!empty($arSection["UF_MODULE_DSC"])): ?>
                <div class="section-detail_ttl">
                    <?=$arSection["UF_MODULE_DSC"];?>
                </div>
                <? endif; ?>

                <? if(!empty($arSection["UF_MODEL_INFO"])): ?>
                <ul class="section-detail_info">
                    <? foreach($arSection["UF_MODEL_INFO"] as $arInfo): ?>
                    <li><?=$arInfo;?></li>
                    <? endforeach; ?>
                </ul>
                <? endif; ?>
                <div class="section-detail_buttons">
                    <a href="#" class="section-detail_sizes">Размеры</a>
                    <a href="#" class="section-detail_button">Подробнее о бренде Cultor</a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- section-detail -->

<div class="section-list section-detail_list">
    <div class="container">
        <div class="section-list_title">
            Товары данное модели
        </div>

        <div class="section-list_enum">

            <? $APPLICATION->IncludeComponent(
                "bitrix:catalog.section",
                "module.listing",
                array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
                    "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
                    "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
                    "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
                    "PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
                    "PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
                    "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
                    "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
                    "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
                    "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                    "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
                    "BASKET_URL" => $arParams["BASKET_URL"],
                    "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                    "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                    "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                    "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                    "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                    "FILTER_NAME" => $arParams["FILTER_NAME"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "SET_TITLE" => $arParams["SET_TITLE"],
                    "MESSAGE_404" => $arParams["~MESSAGE_404"],
                    "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                    "SHOW_404" => $arParams["SHOW_404"],
                    "FILE_404" => $arParams["FILE_404"],
                    "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
                    "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
                    "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
                    "PRICE_CODE" => $arParams["~PRICE_CODE"],
                    "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
                    "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

                    "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                    "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
                    "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
                    "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
                    "PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

                    "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                    "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                    "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                    "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                    "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                    "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                    "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                    "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                    "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                    "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                    "LAZY_LOAD" => $arParams["LAZY_LOAD"],
                    "MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
                    "LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

                    "OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
                    "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
                    "OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
                    "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
                    "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
                    "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
                    "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
                    "OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

                    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                    "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                    "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
                    "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                    'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                    'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

                    'LABEL_PROP' => $arParams['LABEL_PROP'],
                    'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
                    'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
                    'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
                    'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
                    'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
                    'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
                    'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
                    'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
                    'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
                    'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
                    'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

                    'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
                    'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
                    'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
                    'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
                    'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
                    'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
                    'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
                    'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
                    'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
                    'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
                    'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
                    'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
                    'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
                    'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
                    'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
                    'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
                    'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

                    'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
                    'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
                    'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

                    'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
                    "ADD_SECTIONS_CHAIN" => "Y",
                    'ADD_TO_BASKET_ACTION' => $basketAction,
                    'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
                    'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
                    'COMPARE_NAME' => $arParams['COMPARE_NAME'],
                    'USE_COMPARE_LIST' => 'Y',
                    'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
                    'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
                    'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
                ),
                $component
            ); ?>

            <!--div class="section-header">
                <span>Фото</span>
                <span>Наименование</span>
                <span class="prop-1">Посадочный<br> диаметр</span>
                <span class="prop-2">Типоразмер</span>
                <span class="prop-3">Слойность</span>
                <span class="prop-quantity">Наличие</span>
                <span>Кол-во</span>
                <span>Стоимость</span>
            </div>

            <div class="section-item">
                <div class="section-item_image">
                    <img src="/local/templates/nta/images/product-1.png" alt="">
                </div>
                <a href="#" class="section-item_name">
                    Cultor Skid Steer 50
                </a>
                <div class="section-item_property prop-1" data-title="Посадочный диаметр">
                    16.5
                </div>
                <div class="section-item_property prop-2" data-title="Типоразмер">
                    10-16.5
                </div>
                <div class="section-item_property prop-3" data-title="Слойность">
                    10PR
                </div>
                <div class="section-item_quantity">
                    <span class="step-3"></span>
                </div>
                <div class="section-item_count">
                    <div class="section-item_count-wrap">
                        <span class="count-minus">-</span>
                        <input type="text" name="quantity" value="1" >
                        <span class="count-plus">+</span>
                    </div>
                </div>
                <div class="section-item_price">
                    175 500 р.
                </div>
                <div class="section-item_actions">
                    <div class="section-item_button add-bascket_js">
                        Купить
                    </div>
                    <div class="section-item_compare add-compare_js">
                        В сравнение
                    </div>
                </div>
            </div>
            <div class="section-item">
                <div class="section-item_image">
                    <img src="/local/templates/nta/images/product-1.png" alt="">
                </div>
                <a href="#" class="section-item_name">
                    Cultor Skid Steer 50
                </a>
                <div class="section-item_property prop-1" data-title="Посадочный диаметр">
                    16.5
                </div>
                <div class="section-item_property prop-2" data-title="Типоразмер">
                    10-16.5
                </div>
                <div class="section-item_property prop-3" data-title="Слойность">
                    10PR
                </div>
                <div class="section-item_quantity">
                    <span class="step-3"></span>
                </div>
                <div class="section-item_count">
                    <div class="section-item_count-wrap">
                        <span class="count-minus">-</span>
                        <input type="text" name="quantity" value="1" >
                        <span class="count-plus">+</span>
                    </div>
                </div>
                <div class="section-item_price">
                    175 500 р.
                </div>
                <div class="section-item_actions">
                    <div class="section-item_button add-bascket_js">
                        Купить
                    </div>
                    <div class="section-item_compare add-compare_js">
                        В сравнение
                    </div>
                </div>
            </div>
            <div class="section-item">
                <div class="section-item_image">
                    <img src="/local/templates/nta/images/product-1.png" alt="">
                </div>
                <a href="#" class="section-item_name">
                    Cultor Skid Steer 50
                </a>
                <div class="section-item_property prop-1" data-title="Посадочный диаметр">
                    16.5
                </div>
                <div class="section-item_property prop-2" data-title="Типоразмер">
                    10-16.5
                </div>
                <div class="section-item_property prop-3" data-title="Слойность">
                    10PR
                </div>
                <div class="section-item_quantity">
                    <span class="step-3"></span>
                </div>
                <div class="section-item_count">
                    <div class="section-item_count-wrap">
                        <span class="count-minus">-</span>
                        <input type="text" name="quantity" value="1" >
                        <span class="count-plus">+</span>
                    </div>
                </div>
                <div class="section-item_price">
                    175 500 р.
                </div>
                <div class="section-item_actions">
                    <div class="section-item_button add-bascket_js">
                        Купить
                    </div>
                    <div class="section-item_compare add-compare_js">
                        В сравнение
                    </div>
                </div>
            </div>
            <div class="section-item">
                <div class="section-item_image">
                    <img src="/local/templates/nta/images/product-1.png" alt="">
                </div>
                <a href="#" class="section-item_name">
                    Cultor Skid Steer 50
                </a>
                <div class="section-item_property prop-1" data-title="Посадочный диаметр">
                    16.5
                </div>
                <div class="section-item_property prop-2" data-title="Типоразмер">
                    10-16.5
                </div>
                <div class="section-item_property prop-3" data-title="Слойность">
                    10PR
                </div>
                <div class="section-item_quantity">
                    <span class="step-3"></span>
                </div>
                <div class="section-item_count">
                    <div class="section-item_count-wrap">
                        <span class="count-minus">-</span>
                        <input type="text" name="quantity" value="1" >
                        <span class="count-plus">+</span>
                    </div>
                </div>
                <div class="section-item_price">
                    175 500 р.
                </div>
                <div class="section-item_actions">
                    <div class="section-item_button add-bascket_js">
                        Купить
                    </div>
                    <div class="section-item_compare add-compare_js">
                        В сравнение
                    </div>
                </div>
            </div>
            <div class="section-item">
                <div class="section-item_image">
                    <img src="/local/templates/nta/images/product-1.png" alt="">
                </div>
                <a href="#" class="section-item_name">
                    Cultor Skid Steer 50
                </a>
                <div class="section-item_property prop-1" data-title="Посадочный диаметр">
                    16.5
                </div>
                <div class="section-item_property prop-2" data-title="Типоразмер">
                    10-16.5
                </div>
                <div class="section-item_property prop-3" data-title="Слойность">
                    10PR
                </div>
                <div class="section-item_quantity">
                    <span class="step-3"></span>
                </div>
                <div class="section-item_count">
                    <div class="section-item_count-wrap">
                        <span class="count-minus">-</span>
                        <input type="text" name="quantity" value="1" >
                        <span class="count-plus">+</span>
                    </div>
                </div>
                <div class="section-item_price">
                    175 500 р.
                </div>
                <div class="section-item_actions">
                    <div class="section-item_button add-bascket_js">
                        Купить
                    </div>
                    <div class="section-item_compare add-compare_js">
                        В сравнение
                    </div>
                </div>
            </div>
            <div class="section-item">
                <div class="section-item_image">
                    <img src="/local/templates/nta/images/product-1.png" alt="">
                </div>
                <a href="#" class="section-item_name">
                    Cultor Skid Steer 50
                </a>
                <div class="section-item_property prop-1" data-title="Посадочный диаметр">
                    16.5
                </div>
                <div class="section-item_property prop-2" data-title="Типоразмер">
                    10-16.5
                </div>
                <div class="section-item_property prop-3" data-title="Слойность">
                    10PR
                </div>
                <div class="section-item_quantity">
                    <span class="step-3"></span>
                </div>
                <div class="section-item_count">
                    <div class="section-item_count-wrap">
                        <span class="count-minus">-</span>
                        <input type="text" name="quantity" value="1" >
                        <span class="count-plus">+</span>
                    </div>
                </div>
                <div class="section-item_price">
                    175 500 р.
                </div>
                <div class="section-item_actions">
                    <div class="section-item_button add-bascket_js">
                        Купить
                    </div>
                    <div class="section-item_compare add-compare_js">
                        В сравнение
                    </div>
                </div>
            </div>
            <div class="section-item">
                <div class="section-item_image">
                    <img src="/local/templates/nta/images/product-1.png" alt="">
                </div>
                <a href="#" class="section-item_name">
                    Cultor Skid Steer 50
                </a>
                <div class="section-item_property prop-1" data-title="Посадочный диаметр">
                    16.5
                </div>
                <div class="section-item_property prop-2" data-title="Типоразмер">
                    10-16.5
                </div>
                <div class="section-item_property prop-3" data-title="Слойность">
                    10PR
                </div>
                <div class="section-item_quantity">
                    <span class="step-3"></span>
                </div>
                <div class="section-item_count">
                    <div class="section-item_count-wrap">
                        <span class="count-minus">-</span>
                        <input type="text" name="quantity" value="1" >
                        <span class="count-plus">+</span>
                    </div>
                </div>
                <div class="section-item_price">
                    175 500 р.
                </div>
                <div class="section-item_actions">
                    <div class="section-item_button add-bascket_js">
                        Купить
                    </div>
                    <div class="section-item_compare add-compare_js">
                        В сравнение
                    </div>
                </div>
            </div>
            <div class="section-item">
                <div class="section-item_image">
                    <img src="/local/templates/nta/images/product-1.png" alt="">
                </div>
                <a href="#" class="section-item_name">
                    Cultor Skid Steer 50
                </a>
                <div class="section-item_property prop-1" data-title="Посадочный диаметр">
                    16.5
                </div>
                <div class="section-item_property prop-2" data-title="Типоразмер">
                    10-16.5
                </div>
                <div class="section-item_property prop-3" data-title="Слойность">
                    10PR
                </div>
                <div class="section-item_quantity">
                    <span class="step-3"></span>
                </div>
                <div class="section-item_count">
                    <div class="section-item_count-wrap">
                        <span class="count-minus">-</span>
                        <input type="text" name="quantity" value="1" >
                        <span class="count-plus">+</span>
                    </div>
                </div>
                <div class="section-item_price">
                    175 500 р.
                </div>
                <div class="section-item_actions">
                    <div class="section-item_button add-bascket_js">
                        Купить
                    </div>
                    <div class="section-item_compare add-compare_js">
                        В сравнение
                    </div>
                </div>
            </div>
            <div class="section-item">
                <div class="section-item_image">
                    <img src="/local/templates/nta/images/product-1.png" alt="">
                </div>
                <a href="#" class="section-item_name">
                    Cultor Skid Steer 50
                </a>
                <div class="section-item_property prop-1" data-title="Посадочный диаметр">
                    16.5
                </div>
                <div class="section-item_property prop-2" data-title="Типоразмер">
                    10-16.5
                </div>
                <div class="section-item_property prop-3" data-title="Слойность">
                    10PR
                </div>
                <div class="section-item_quantity">
                    <span class="step-3"></span>
                </div>
                <div class="section-item_count">
                    <div class="section-item_count-wrap">
                        <span class="count-minus">-</span>
                        <input type="text" name="quantity" value="1" >
                        <span class="count-plus">+</span>
                    </div>
                </div>
                <div class="section-item_price">
                    175 500 р.
                </div>
                <div class="section-item_actions">
                    <div class="section-item_button add-bascket_js">
                        Купить
                    </div>
                    <div class="section-item_compare add-compare_js">
                        В сравнение
                    </div>
                </div>
            </div>
            <div class="section-item">
                <div class="section-item_image">
                    <img src="/local/templates/nta/images/product-1.png" alt="">
                </div>
                <a href="#" class="section-item_name">
                    Cultor Skid Steer 50
                </a>
                <div class="section-item_property prop-1" data-title="Посадочный диаметр">
                    16.5
                </div>
                <div class="section-item_property prop-2" data-title="Типоразмер">
                    10-16.5
                </div>
                <div class="section-item_property prop-3" data-title="Слойность">
                    10PR
                </div>
                <div class="section-item_quantity">
                    <span class="step-3"></span>
                </div>
                <div class="section-item_count">
                    <div class="section-item_count-wrap">
                        <span class="count-minus">-</span>
                        <input type="text" name="quantity" value="1" >
                        <span class="count-plus">+</span>
                    </div>
                </div>
                <div class="section-item_price">
                    175 500 р.
                </div>
                <div class="section-item_actions">
                    <div class="section-item_button add-bascket_js">
                        Купить
                    </div>
                    <div class="section-item_compare add-compare_js">
                        В сравнение
                    </div>
                </div>
            </div-->
        </div>

    </div>
</div> <!-- section-list -->