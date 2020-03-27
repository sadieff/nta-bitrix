<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

CModule::IncludeModule("iblock");

$cache = Bitrix\Main\Data\Cache::createInstance();
if ($cache->initCache($cacheTime, $cacheId, $cacheDir))
{
    $arSection = $cache->getVars();
}
elseif ($cache->startDataCache())
{
    $arSection = [];

    $result = CIBlockSection::GetList(
        array(),
        array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "CODE" => $arResult["VARIABLES"]["SECTION_CODE"]),
        false,
        array('UF_*')
    );
    while ($data = $result -> GetNext()){
        $arSection = $data;
    }

    $cache->endDataCache($arSection);
}

if($arSection["DEPTH_LEVEL"] == 1) include 'section-brand.php';
else include 'section-model.php';