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

// Получим цену товара.

$requestElements  = $blockElement::GetList(
    array("SORT" => "ASC"),
    array("IBLOCK_ID" => 1, "ID" => $_POST["product"]),
    false,
    false,
    array("ID", "IBLOCK_ID", "CATALOG_QUANTITY", "CATALOG_GROUP_1")
);
$element = $requestElements -> GetNextElement();
$item = $element->GetFields();

$price = $item["CATALOG_PRICE_1"];

$fields = [
    'PRODUCT_ID' => $_POST["product"], // ID товара, обязательно
    'QUANTITY' => $_POST["quantity"], // количество, обязательно
    'PRICE' => $price,
    'CUSTOM_PRICE' => 'Y',
];

Bitrix\Catalog\Product\Basket::addProduct($fields);

$arResult["status"] = "success";
//$arResult["fields"] = $fields;

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
