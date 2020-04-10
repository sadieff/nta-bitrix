<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("sale");
CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());

$APPLICATION->IncludeComponent("form:form.handler",
    "card",
    Array(
        "FORM_ID" => "3",
        "MAIL_ID" => "50",
        "FIELDS" => array(
            "properties" => array(
                "NAME" => "form_text_7",
                "PHONE" => "form_text_8",
                "EMAIL" => "form_text_9",
            ),
            "list" => "form_text_10",
        ),
    ),
    false
); ?>