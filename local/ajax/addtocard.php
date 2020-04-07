<?

/**
 * Добавление товара в корзину
 * Скрипт получает: ID товара и количество
 * Скрипт возвращает: статус добавления и общее количество товаров в корзине
 */

header("Content-type: application/json; charset=utf-8");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");
CModule::IncludeModule("iblock");

$blockElement = new CIBlockElement;

$props = [];
if(!empty($_POST["camera"])) $props[] = ['NAME' => 'Камера', 'CODE' => 'camera', 'VALUE' => 'Y'];
if(!empty($_POST["lenta"])) $props[] = ['NAME' => 'Ободная лента', 'CODE' => 'lenta', 'VALUE' => 'Y'];
if(!empty($_POST["kolco"])) $props[] = ['NAME' => 'Уплотнительное кольцо', 'CODE' => 'kolco', 'VALUE' => 'Y'];

$fields = [
    'PRODUCT_ID' => $_POST["product"], // ID товара, обязательно
    'QUANTITY' => $_POST["quantity"], // количество, обязательно
    'PROPS' => $props
];

Bitrix\Catalog\Product\Basket::addProduct($fields);

$arResult["status"] = "success";

/* посчитаем количество товара в корзине */

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
