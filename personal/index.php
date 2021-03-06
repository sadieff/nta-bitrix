<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка и оплата");
global $USER;
$manager = $USER->GetByID($USER->GetID())->GetNext()['UF_MANAGER'];
$sale = $USER->GetByID($USER->GetID())->GetNext()['UF_SALE'];
if(!empty($manager)) {
    $arManager = $APPLICATION->IncludeComponent("get:element.property", "", Array( "IBLOCK_ID" => "18", "ELEMENT" => $manager,"OUTPUT" => "RETURN" ), false );
}
?>

    <div class="order">
        <div class="container">
            <div class="catalog-new_title">
                Личный кабинет
            </div>

            <div class="cabinet-container">
                <div class="cabinet-content">

                    <div class="cabinet-info">
                        <div class="cabinet-info_title">
                            Личные данные <span class="cabinet-info_edit">Редактировать</span>
                        </div>

                        <div class="cabinet-info_box">
                            <form action="">
                                <div class="cabinet-userdata_item">
                                    <label>Компания:</label>
                                    <div class="cabinet-userdata_input">
                                        <input type="text" value="<?=$USER->GetByID($USER->GetID())->GetNext()['WORK_COMPANY'];?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="cabinet-userdata_item">
                                    <label>ИНН:</label>
                                    <div class="cabinet-userdata_input">
                                        <input type="text" value="<?=$USER->GetByID($USER->GetID())->GetNext()['WORK_DEPARTMENT'];?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="cabinet-userdata_item mb blue">
                                    <label>Почта:</label>
                                    <div class="cabinet-userdata_input">
                                        <input type="text" value="<?=$USER->GetByID($USER->GetID())->GetNext()['EMAIL'];?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="cabinet-userdata_item">
                                    <label>Контактное лицо:</label>
                                    <div class="cabinet-userdata_input">
                                        <input type="text" value="<?=$USER->GetByID($USER->GetID())->GetNext()['TITLE'];?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="cabinet-userdata_item">
                                    <label>Телефон:</label>
                                    <div class="cabinet-userdata_input">
                                        <input type="text" value="<?=$USER->GetByID($USER->GetID())->GetNext()['PERSONAL_PHONE'];?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="cabinet-userdata_item blue">
                                    <label>Пароль:</label>
                                    <div class="cabinet-userdata_input">
                                        <input type="password" value="000000" readonly="readonly">
                                    </div>
                                </div>

                                <? if(!empty($sale) && $sale > 0): ?>
                                <div class="cabinet-sale">
                                    <div class="cabinet-sale_percent">
                                        <?=$sale;?>%
                                    </div>
                                    <div class="cabinet-sale_box">
                                        <div class="cabinet-sale_title">
                                            Ваша персональная скидка
                                        </div>
                                        <div class="cabinet-sale_dsc">
                                            Совершайте покупки, чтобы увеличить процент
                                        </div>
                                    </div>

                                    <a href="#" class="cabinet-sale_more">
                                        Хочу больше !
                                    </a>
                                </div>
                                <? endif; ?>

                            </form>
                        </div>
                    </div>

                    <? if(!empty($manager)): ?>
                    <div class="order-info_box">
                        <div class="order-info_ttl">
                            Ваш персональный менеджер
                        </div>
                        <div class="order-manager">
                            <div class="order-manager_image">
                                <img src="<?=CFile::GetPath($arManager["PREVIEW_PICTURE"]);?>" alt="">
                            </div>
                            <div class="order-manager_info">
                                <div class="order-manager_title">
                                    <?=$arManager["NAME"];?>
                                </div>
                                <div class="order-manager_phone">
                                    <?=$arManager["PROPERTIES"]["PHONE"]["VALUE"];?>
                                </div>
                                <div class="order-manager_email">
                                    <?=$arManager["PROPERTIES"]["EMAIL"]["VALUE"];?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <? endif; ?>

                </div>

                <div class="cabinet-info_enum">
                    <div class="cabinet-info_ttl">
                        Последние заказы
                    </div>

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:sale.personal.order.list",
                        "orders",
                        Array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "3600",
                            "CACHE_TYPE" => "A",
                            "CUSTOM_SELECT_PROPS" => array(""),
                            "DETAIL_HIDE_USER_INFO" => array("LOGIN","EMAIL","PERSON_TYPE_NAME"),
                            "DISALLOW_CANCEL" => "N",
                            "HISTORIC_STATUSES" => array("F"),
                            "NAV_TEMPLATE" => "",
                            "ORDERS_PER_PAGE" => "20",
                            "ORDER_DEFAULT_SORT" => "STATUS",
                            "PATH_TO_BASKET" => "/personal/cart",
                            "PATH_TO_CATALOG" => "/catalog/",
                            "PATH_TO_PAYMENT" => "/personal/order/payment/",
                            "PROP_1" => array(""),
                            "REFRESH_PRICES" => "N",
                            "RESTRICT_CHANGE_PAYSYSTEM" => array("0"),
                            "SAVE_IN_SESSION" => "Y",
                            "SEF_MODE" => "N",
                            "SET_TITLE" => "Y",
                            "STATUS_COLOR_F" => "gray",
                            "STATUS_COLOR_N" => "green",
                            "STATUS_COLOR_PSEUDO_CANCELLED" => "red"
                        )
                    );?>

                </div>

            </div>
        </div>
    </div> <!-- card -->

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>