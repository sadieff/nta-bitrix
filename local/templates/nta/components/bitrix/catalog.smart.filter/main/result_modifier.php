<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

unset($arResult["ITEMS"]["BASE"]);

$arResult["UNITS"] = array(
    "TIPORAZMER_1_INT",
);

/**
 * Задача: засунуть свойство 27 (типоразмер 2 (миллиметры)) в свойство
 * номер 33, (типоразмер 1 (дюймы))
 * Дополнительно добавим им разные классы
 */
// Типоразмеру 1 поставить класс type-in
foreach ($arResult["ITEMS"][33]["VALUES"] as $key => $arItem) {
    $arResult["ITEMS"][33]["VALUES"][$key]["CLASS"] = "type-in";
}

// Типоразмеру 2 поместить внутрь Типоразмер 1 поставить класс type-mm
foreach ($arResult["ITEMS"][27]["VALUES"] as $key => $arItem) {
    $arItem["CLASS"] = "type-mm";
    $arResult["ITEMS"][33]["VALUES"][$arItem["VALUE"]] = $arItem;
}
unset($arResult["ITEMS"][27]);

if (isset($arParams["TEMPLATE_THEME"]) && !empty($arParams["TEMPLATE_THEME"]))
{
	$arAvailableThemes = array();
	$dir = trim(preg_replace("'[\\\\/]+'", "/", dirname(__FILE__)."/themes/"));
	if (is_dir($dir) && $directory = opendir($dir))
	{
		while (($file = readdir($directory)) !== false)
		{
			if ($file != "." && $file != ".." && is_dir($dir.$file))
				$arAvailableThemes[] = $file;
		}
		closedir($directory);
	}

	if ($arParams["TEMPLATE_THEME"] == "site")
	{
		$solution = COption::GetOptionString("main", "wizard_solution", "", SITE_ID);
		if ($solution == "eshop")
		{
			$templateId = COption::GetOptionString("main", "wizard_template_id", "eshop_bootstrap", SITE_ID);
			$templateId = (preg_match("/^eshop_adapt/", $templateId)) ? "eshop_adapt" : $templateId;
			$theme = COption::GetOptionString("main", "wizard_".$templateId."_theme_id", "blue", SITE_ID);
			$arParams["TEMPLATE_THEME"] = (in_array($theme, $arAvailableThemes)) ? $theme : "blue";
		}
	}
	else
	{
		$arParams["TEMPLATE_THEME"] = (in_array($arParams["TEMPLATE_THEME"], $arAvailableThemes)) ? $arParams["TEMPLATE_THEME"] : "blue";
	}
}
else
{
	$arParams["TEMPLATE_THEME"] = "blue";
}

$arParams["FILTER_VIEW_MODE"] = (isset($arParams["FILTER_VIEW_MODE"]) && toUpper($arParams["FILTER_VIEW_MODE"]) == "HORIZONTAL") ? "HORIZONTAL" : "VERTICAL";
$arParams["POPUP_POSITION"] = (isset($arParams["POPUP_POSITION"]) && in_array($arParams["POPUP_POSITION"], array("left", "right"))) ? $arParams["POPUP_POSITION"] : "left";
