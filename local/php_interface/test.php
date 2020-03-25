<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");
$blockElement = new CIBlockElement;

$requestElements  = $blockElement::GetList(
    array("SORT" => "ASC"),
    array("IBLOCK_ID" => 8, "PROPERTY_STAROE_POLN_NAIMENOVANIE" => false),
    false,
    false,
    array("ID", "IBLOCK_ID", "NAME")
);
$products = [];
$i = 0;
while ($element = $requestElements -> GetNextElement()) {
    $i++;
    //$item = $element->GetFields();
}
$found = 1280 - $i;
echo "Найдено: ".$found;