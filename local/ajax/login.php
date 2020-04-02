<?
header("Content-type: application/json; charset=utf-8");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$APPLICATION->IncludeComponent("bitrix:system.auth.form",
    "ajax",
    Array(
        "REGISTER_URL" => "register.php",
        "FORGOT_PASSWORD_URL" => "",
        "PROFILE_URL" => "profile.php",
        "SHOW_ERRORS" => "Y"
    )
);