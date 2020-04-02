<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (count($arResult["ERRORS"]) > 0){
    foreach ($arResult["ERRORS"] as $key => $error)
        if (intval($key) == 0 && $key !== 0)
            $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

    $output = [];
    $output["status"] = "error";
    $output["title"] = "Ошибка!";
    $output["text"] = $arResult["ERRORS"];
    echo json_encode($output);
    exit;
}
else {
    $output = [];
    $output["status"] = "success";
    $output["title"] = "Поздравляем!";
    $output["content"] = '
        <div class="modal-dsc">
            Регистрация почты завершена.<br>
            Для подтверждения учетной записи перейдите по ссылке в письме и дождитесь проверки администратора
        </div>
        <div class="modal-button_box">
            <a href="/" class="modal-button_back">
                На главную страницу
            </a>
        </div>';
    echo json_encode($output);
}