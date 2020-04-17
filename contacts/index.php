<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/map.js');
$APPLICATION->SetTitle("Контакты");

/* реквезиты */
$arResult = $APPLICATION->IncludeComponent("get:element.property", "", Array( "IBLOCK_ID" => "12", "ELEMENT" => "3444","OUTPUT" => "RETURN" ), false );
$arContacts = $APPLICATION->IncludeComponent("get:element.property", "", Array( "IBLOCK_ID" => "17", "ELEMENT" => "3470","OUTPUT" => "RETURN" ), false );
?>

    <div class="contacts-page">
        <div class="container">
            <div class="catalog-new_title">
                <?=$arContacts["NAME"];?>
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
                <?=$arContacts["PROPERTIES"]["TITLE"]["VALUE"];?>
            </div>
            <div class="appeal-content content_">
                <?=$arContacts["~PREVIEW_TEXT"];?>
            </div>
            <div class="appeal-content_images">
                <? foreach ($arContacts["PROPERTIES"]["IMAGES"]["VALUE"] as $arGallery):
                    $imageSmall = CFile::ResizeImageGet($arGallery, array('width' => 155, 'height' => 132), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    $imageBig   = CFile::ResizeImageGet($arGallery, array('width' => 1300, 'height' => 1300), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    ?>

                    <div class="appeal-content_item">
                        <a href="<?=$imageBig["src"];?>" data-fancybox="images" class="appeal-content_photo">
                            <img src="<?=$imageSmall["src"];?>" alt="">
                        </a>
                    </div>

                <? endforeach; ?>
            </div>
        </div>
    </div> <!-- appeal -->

    <div class="contacts-feedback">
        <div class="container">
            <div class="contacts-feedback_wrapper">
                <div class="contacts-feedback_title">
                    Написать нам
                </div>
                <form action="feedback.contacts.php">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contacts-feedback_item">
                                <input type="text" name="name" placeholder="ФИО" data-rules="required">
                            </div>
                            <div class="contacts-feedback_item">
                                <input type="text" name="email" placeholder="Email">
                            </div>
                            <div class="contacts-feedback_item">
                                <input type="text" name="phone" placeholder="Телефон" data-rules="required">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contacts-feedback_item">
                                <textarea name="msg" placeholder="Сообщение" data-rules="required"></textarea>
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