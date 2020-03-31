<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!doctype html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?$APPLICATION->ShowTitle();?></title>

    <?$APPLICATION->ShowHead();?>

    <link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH;?>/favicon.png" type="image/png">

    <?
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/carousel/assets/owl.carousel.min.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/fb/jquery.fancybox.min.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/main.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/dev.css');

    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.9.1.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/carousel/owl.carousel.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/scroll/jquery.jscrollpane.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/scroll/jquery.mousewheel.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fb/jquery.fancybox.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/card.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/main.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/dev.js');
    ?>

</head>
<body>

    <div id="panel">
        <?$APPLICATION->ShowPanel();?>
    </div>

    <header>
        <div class="header-wrap">
            <div class="header-top">
                <div class="header-top_hidden">
                    <div class="container">
                        <div class="header-top_wrap">
                            <a href="#" class="header-top_logo"></a>
                            <a href="#" class="header-top_select">
                                Подбор шин
                            </a>
                            <div class="header-top_call">
                                <div class="header-top_phone">
                                    +7 (495) 252 04-45
                                </div>
                                <div class="header-top_recall">
                                    Заказать звонок
                                </div>
                            </div>
                            <a href="#" class="header-top_mail">
                                info@nta-tyre.ru
                            </a>
                            <a href="#" class="header-top_cabinet">
                                Личный кабинет
                            </a>
                            <a href="#" class="header-top_compare">
                                Сравнить
                                <span>2</span>
                            </a>
                            <a href="/basket/" class="header-top_cart">
                                Корзина
                                <span>3</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-top_start">
                    <div class="container">
                        <div class="header-top_wrap">
                            <div class="header-top_search">
                                <input type="text" name="srch" placeholder="Поиск">
                                <button></button>
                            </div>
                            <a href="#" class="header-top_cabinet">
                                Личный кабинет
                            </a>
                            <a href="#" class="header-top_compare">
                                Сравнить
                                <span>2</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="menu-open">
                    <span></span>
                </div>

                <div class="header-main row">
                    <div class="col-xl-5 col-lg-5 col-md-6 offset-2 offset-md-0 col-8">
                        <a href="/" class="header-logo"></a>
                    </div>
                    <div class="offset-xl-1 col-xl-6 offset-lg-1 col-lg-6 col-md-6 col-2 header-contacts">
                        <div class="header-contacts_wrap">
                            <a href="tel:+74952520445" class="header-phone">
                                +7 (495) 252 04-45
                            </a>
                            <a href="mailto:info@nta-tyre.ru" class="header-email">
                                info@nta-tyre.ru
                            </a>
                        </div>
                        <div class="header-recall">
                            <div class="header-recall_button">
                                Заказать звонок
                            </div>
                        </div>
                        <div class="header-shop">
                            <a href="/basket/" class="header-bascket">
                                Корзина <span>3</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="header-nav">

                    <div class="header-nav_box">
                        <div class="header-search">
                            <input type="text" name="srch" placeholder="Поиск">
                            <button></button>
                        </div>

                        <div class="header-cabinet">
                            <div>
                                <div class="header-login popup-login_js">
                                    Личный кабинет
                                </div>
                            </div>
                            <div>
                                <div class="header-nav_compare popup-login_js">
                                    Сравнение <span>2</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header-nav_contacts">
                        <a href="tel:+7(495)25204-45" class="header-nav_phone">
                            +7 (495) 252 04-45
                        </a>
                        <div class="header-nav_contacts_box">
                            <a href="mailto:info@nta-tyre.ru" class="header-email">
                                info@nta-tyre.ru
                            </a>
                            <div class="header-nav_recall">
                                Заказать звонок
                            </div>
                        </div>
                    </div>
                    <nav>
                        <?$APPLICATION->IncludeComponent("bitrix:menu",
                            "main",
                            Array(
                                "ROOT_MENU_TYPE" => "top",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "top",
                                "USE_EXT" => "Y",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "Y",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => ""
                            )
                        );?>
                    </nav>
                </div>
            </div>
        </div>
    </header> <!-- header -->

    <? if(!CSite::InDir('/index.php')): ?>

    <div class="breadcrumb <?=$APPLICATION->ShowViewContent("BREADCRUMB_CLASS");?>">
        <div class="container">
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb",
                "breadcrumb",
                Array(
                    "START_FROM" => "0",
                    "PATH" => "",
                    "SITE_ID" => "s1"
                )
            );?>
        </div>
    </div> <!-- breadcrumb -->

    <? endif; ?>