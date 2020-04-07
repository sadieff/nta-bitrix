<script data-skip-moving="true" src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=8d69c24a-14dd-41e7-91ff-60bee477e82c"></script>
<div class="map">
    <div class="container">
        <div class="map-title">
            <?=$TITLE;?>
        </div>
    </div>
    <div class="map-wrap">
        <div class="map-list">
            <div class="map-select">
                Выберите город...
            </div>
            <ul>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "contacts.enum", // шаблон
                    array(
                        "IBLOCK_TYPE" => "contacts", // тип информационного блока
                        "IBLOCK_ID"   => "13", // ID информационного блока
                        "NEWS_COUNT"  => "99", // колличество выводимых элементов
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "SET_TITLE" => "N",
                        "PROPERTY_CODE" => array(
                            0 => "NAME", // включить свойство из инфоблока
                        ),
                    ),
                    false
                ); ?>
            </ul>
        </div>

        <div id="map"></div>

        <div class="map-mobile_info">
            <div class="container">
                <div class="map-info">
                </div>
            </div>
        </div>
    </div>
</div>