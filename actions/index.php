<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Акции"); ?>


    <div class="news-page">
        <div class="container">
            <div class="page-title">
                Акции
            </div>

            <div class="ajax-container_js">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "news.listing", // шаблон
                    array(
                        "IBLOCK_TYPE" => "content", // тип информационного блока
                        "IBLOCK_ID"   => "11", // ID информационного блока
                        "NEWS_COUNT"  => "13",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX" => $_GET["ajaxmode"],
                        "SET_TITLE" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_ORDER1" => "DESC",
                        "PAGER_TEMPLATE" => "pagenation",
                        "FIELD_CODE" => array("DETAIL_PICTURE"),
                        "PROPERTY_CODE" => array(
                            0 => "NAME", // включить свойство из инфоблока
                        ),
                    ),
                    false
                ); ?>
            </div>

        </div>
    </div> <!-- news-page -->

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>