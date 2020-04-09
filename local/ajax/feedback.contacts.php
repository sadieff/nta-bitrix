<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$APPLICATION->IncludeComponent("form:form.handler",
    ".default",
    Array(
        "FORM_ID" => "1",
        "MAIL_ID" => "48",
        "FIELDS" => array(
            "name" => "form_text_1",
            "email" => "form_text_2",
            "phone" => "form_text_3",
            "msg" => "form_text_4",
        ),
    ),
    false
); ?>