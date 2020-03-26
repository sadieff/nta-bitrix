<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

if(empty($arResult))
	return "";

$arrExclude = array(
	'/services/'
);

$strReturn = '<ul>';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if(!in_array($arResult[$index]["LINK"], $arrExclude)){		
		if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
		{
			$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>';
		}
		else
		{
			$strReturn .= '<li>'.$title.'</li>';
		}
	}
}

$strReturn .= '</ul>';

return $strReturn;
