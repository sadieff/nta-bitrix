<?

/**
 * Вывод количества товара в корзине
 * Скрипт возвращает: количество
 */

header("Content-type: application/json; charset=utf-8");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("sale");

$countBasketItems = CSaleBasket::GetList(
    array(),
    array(
        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
        "LID" => SITE_ID,
        "ORDER_ID" => "NULL"
    ),
    array()
);

$arResult["count"] = $countBasketItems;

echo json_encode($arResult);
