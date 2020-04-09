<?
//error_reporting(E_ALL);
//ini_set('display_errors','On');
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$arResult['FORM_ID'] = $arParams["FORM_ID"];
$arResult['MAIL_ID'] = $arParams["MAIL_ID"];

$status = $FIELDS = [];
$filesize = true;

CModule::IncludeModule("form");

foreach ($arParams['FIELDS'] as $key => $item):
	if(is_array($_REQUEST[$key])){
		$FIELDS[$item] = implode(",", $_REQUEST[$key]);
	}else {
		$FIELDS[$item] = $_REQUEST[$key];
	}
endforeach;

if($arParams["UPLOAD"]) {

	if($_FILES[$arParams["UPLOAD"]["INPUT"]]['name']){
		$FIELDS[$arParams["UPLOAD"]["FIELD"]] = array(
			"name" => $_FILES[$arParams["UPLOAD"]["INPUT"]]['name'],
		    "size" => $_FILES[$arParams["UPLOAD"]["INPUT"]]['size'],
		    "tmp_name" => $_FILES[$arParams["UPLOAD"]["INPUT"]]['tmp_name'],
		    "type" => $_FILES[$arParams["UPLOAD"]["INPUT"]]['type']
		);
		if($_FILES[$arParams["UPLOAD"]["INPUT"]]['size'] > 10 * 1024 * 1024) $filesize = false; // ограничение на 10 мб
	}
}

if($filesize) { 
	if($result = CFormResult::Add($arParams["FORM_ID"], $FIELDS)) {
		$status = 1;
		if (CFormResult::Mail($result)) $arResult['EMAIL'] = "Почтовое событие успешно создано";
		else {
			global $strError; 
			$arResult['EMAIL'] = $strError;
		}
	}else{
		$status = 2;
		global $strError;
	    $arResult['ADD'] = $strError;
	}
} else {
	$status = 3;
}

// https://dev.1c-bitrix.ru/api_help/main/reference/cevent/send.php прикреплять файлы

$arResult["STATUS"] = $status;
$arResult['RESULT'] = $result;
$arResult['FIELDS'] = $FIELDS;
$arResult["html"] = array();

$this->IncludeComponentTemplate(); ?>