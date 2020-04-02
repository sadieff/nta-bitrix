<?
header("Content-type: application/json; charset=utf-8");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$APPLICATION->IncludeComponent("bitrix:main.register",
    "ajax.register",
    Array(
        "USER_PROPERTY_NAME" => "",
        "SEF_MODE" => "Y",
        "SHOW_FIELDS" => Array(
            "PERSONAL_PHONE",
            "WORK_DEPARTMENT",
            "WORK_COMPANY",
        ),
        "REQUIRED_FIELDS" => Array(),
        "AUTH" => "Y",
        "USE_BACKURL" => "Y",
        "SUCCESS_PAGE" => "",
        "SET_TITLE" => "Y",
        "SEF_FOLDER" => "/",
        "VARIABLE_ALIASES" => Array()
    )
);