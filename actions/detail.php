<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
$element = explode("?", $_REQUEST["ELEMENT_CODE"]);
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "news", // шаблон
    Array(
        "IBLOCK_ID" => "11",  // ID информационного блока
        "IBLOCK_TYPE" => "content",  // тип информационного блока
        "ELEMENT_CODE" => $element[0],  // параметр передаваемой страницы
        "SECTION_TITLE" => "акции",
        "SECTION_URI" => "/actions/",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "SET_BROWSER_TITLE" => "Y",
        "SET_META_DESCRIPTION" => "Y",
        "SET_TITLE" => "Y",
        "ADD_ELEMENT_CHAIN" => "Y",
        "PROPERTY_CODE" => array(
            0 => "NAME",  // включить свойство из инфоблока
        ),
    ),
    false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>