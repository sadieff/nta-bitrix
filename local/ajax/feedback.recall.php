<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$APPLICATION->IncludeComponent("form:form.handler",
    ".default",
    Array(
        "FORM_ID" => "2",
        "MAIL_ID" => "49",
        "FIELDS" => array(
            "name" => "form_text_5",
            "phone" => "form_text_6",
        ),
    ),
    false
); ?>