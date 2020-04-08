<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/map.js');
$APPLICATION->SetTitle("Контакты");

$arResult = $APPLICATION->IncludeComponent("get:element.property", "",
    Array(
        "IBLOCK_ID" => "12",
        "ELEMENT" => "3444",
        "OUTPUT" => "RETURN",
    ),
    false
); ?>

    <div class="contacts-page">
        <div class="container">
            <div class="catalog-new_title">
                Контакты
            </div>
            <div class="contacts-page_enum">

                <? foreach ($arResult["PROPERTIES"]["PROPERTY"]["VALUE"] as $key => $arProp): ?>

                    <div class="company-info_item">
                        <div class="company-info_ttl">
                            <span><?=$arResult["PROPERTIES"]["PROPERTY"]["DESCRIPTION"][$key];?></span>
                        </div>
                        <div class="company-info_value">
                            <?=$arProp;?>
                        </div>
                    </div>

                <? endforeach; ?>

            </div>
        </div>
    </div> <!-- contacts-page -->

    <? $APPLICATION->IncludeFile(
        "/local/include/map.php",
        Array(
            "TITLE" => "Сеть представительств - Москва",
        ),
        Array("MODE"=>"php")
    ); ?>

    <div class="appeal">
        <div class="container">
            <div class="appeal-title">
                Уважаемые коллеги и партнеры!
            </div>
            <div class="appeal-content content_">
                <p>Кроме этого, демократы в конгрессе предъявили президенту США обвинения в воспрепятствовании работе Палаты представителей: глава Белого дома запретил высокопоставленным сотрудникам администрации отвечать на вызовы законодателей и выступать на слушаниях в комитетах в рамках процедуры импичмента.</p>
            </div>
            <div class="appeal-content_images">
                <div class="appeal-content_item">
                    <a href="/local/templates/nta/images/image-27.jpg" data-fancybox="/local/templates/nta/images" class="appeal-content_photo">
                        <img src="/local/templates/nta/images/image-27.jpg" alt="">
                    </a>
                </div>
                <div class="appeal-content_item">
                    <a href="/local/templates/nta/images/image-28.jpg" data-fancybox="/local/templates/nta/images" class="appeal-content_photo center">
                        <img src="/local/templates/nta/images/image-28.jpg" alt="">
                    </a>
                </div>
                <div class="appeal-content_item">
                    <a href="/local/templates/nta/images/image-29.jpg" data-fancybox="/local/templates/nta/images" class="appeal-content_photo">
                        <img src="/local/templates/nta/images/image-29.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div> <!-- appeal -->

    <div class="contacts-feedback">
        <div class="container">
            <div class="contacts-feedback_wrapper">
                <div class="contacts-feedback_title">
                    Написать нам
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contacts-feedback_item">
                                <input type="text" name="name" placeholder="ФИО">
                            </div>
                            <div class="contacts-feedback_item">
                                <input type="text" name="email" placeholder="Email">
                            </div>
                            <div class="contacts-feedback_item">
                                <input type="text" name="phone" placeholder="Телефон">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contacts-feedback_item">
                                <textarea name="msg" placeholder="Сообщение"></textarea>
                            </div>
                            <div class="contacts-feedback_btn_box">
                                <label class="input-checkbox">
                                    <input type="checkbox" name="agreement" checked="checked">
                                    <span>Принимаю <a href="#">политику конфиденциальности</a></span>
                                </label>
                                <button class="go contacts-feedback_button">
                                    Отправить
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- contacts-feedback -->

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>