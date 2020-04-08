<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule("iblock");

$cache = Bitrix\Main\Data\Cache::createInstance(); 
if ($cache->initCache($cacheTime, $cacheId, $cacheDir)) 
{ 
    $arResult = $cache->getVars(); 
} 
elseif ($cache->startDataCache()) 
{ 
    $prop = $arResult = []; 

	$Result = CIBlockElement::GetList(
		array("SORT" => "ASC"), 
		array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ID" => $arParams["ELEMENT"]),
		false,
		false,
		array()
	);
	while ($element = $Result -> GetNextElement()):
		$item = $element->GetFields();
		$prop["PROPERTIES"] = $element->GetProperties();
		$arResult = array_merge($item, $prop);
	endwhile;

    $cache->endDataCache($arResult); 
} 

if($arParams["OUTPUT"] == "RETURN") return $arResult;
    else $this->IncludeComponentTemplate();
