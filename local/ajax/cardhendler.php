<?

/**
 * Обработка запросов из карзины
 * Скрипт получает: тип операции type и другие параметры
 * Скрипт возвращает: статус обработки
 */

header("Content-type: application/json; charset=utf-8");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");
CModule::IncludeModule("iblock");

if($_POST["type"] == "quantity") { // запрос на изменение количества

    $arFields = array(
        "QUANTITY" => $_POST["value"],
    );
    CSaleBasket::Update($_POST["productId"], $arFields);

}
elseif ($_POST["type"] == "delete") { // удаление товара

    CSaleBasket::Delete($_POST["productId"]);

}

$arResult["status"] = "success";
echo json_encode($arResult);
