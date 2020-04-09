<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
header("Content-type: application/json; charset=utf-8"); 

if($arResult["STATUS"] == 1){
	$arResult["status"] = "success";
	$arResult["title"] = "Спасибо!";
	$arResult["dsc"] = "Ваша заявка принята";
	$arResult["content"] = "Наш специалист свяжется с Вами в ближайшее время";
}
elseif($arResult["STATUS"] == 2) {
    $arResult["status"] = "error";
	$arResult["title"] = "Ошибка!";
	$arResult["dsc"] = "Произошла ошибка";
	$arResult["content"] = "К сожалению, не удалось обработать ваш запрос";
}
elseif($arResult["STATUS"] == 3) {
    $arResult["status"] = "error";
	$arResult["title"] = "Ошибка!";
	$arResult["dsc"] = "Превышен размер файла";
	$arResult["content"] = "К сожалению, не удалось обработать вашу заявку, так как прикрепленный файл не может быть больше 10Мб";
}

echo json_encode($arResult);