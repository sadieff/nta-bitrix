<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости"); ?>

    <div class="news-page">
        <div class="container">
            <div class="page-title">
                Новости
            </div>

            <div class="ajax-container_js">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "news.listing", // шаблон
                    array(
                        "IBLOCK_TYPE" => "content", // тип информационного блока
                        "IBLOCK_ID"   => "3", // ID информационного блока
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

    <div class="category-list_type news-page_list category-list_small">
        <div class="container">
            <div class="category-list_enum category-list_scroll">
                <a href="#" class="category-list_item active">Все новости</a>
                <a href="#" class="category-list_item">Новости 2019</a>
                <a href="#" class="category-list_item">Новости 2018</a>
                <a href="#" class="category-list_item">Новости 2017</a>
                <a href="#" class="category-list_item">Новости 2016</a>
                <a href="#" class="category-list_item">Новости 2015</a>
                <a href="#" class="category-list_item">Новости 2014</a>
            </div>
        </div>
    </div> <!-- category-list -->

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>