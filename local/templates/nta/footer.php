<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<footer>
    <div class="footer-menu">
        <div class="container">
            <nav>
                <?$APPLICATION->IncludeComponent("bitrix:menu",
                    "main",
                    Array(
                        "ROOT_MENU_TYPE" => "bottom",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "bottom",
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
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="footer-logo"></div>
                    <div class="footer-social">
                        <a href="#" class="ig"></a>
                        <a href="#" class="fb"></a>
                        <a href="#" class="in"></a>
                        <a href="#" class="tw"></a>
                    </div>
                    <div class="footer-links">
                        <a href="/about/personal-data/">Соглашение об обработке персональных данных</a><br>
                        <a href="/about/privacy-policy/">Политика конфиденциальности</a>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="footer-contacts">
                        <div class="footer-phone_wrap">
                            <? $APPLICATION->IncludeFile(
                                "/local/include/footer.phone.php",
                                Array(),
                                Array("MODE"=>"php") // text, html, php
                            ); ?>
                        </div>
                        <div class="footer-recall recall_js">
                            Заказать звонок
                        </div>
                        <div class="footer-time">
                            <? $APPLICATION->IncludeFile(
                                "/local/include/footer.time.php",
                                Array(),
                                Array("MODE"=>"php") // text, html, php
                            ); ?>
                        </div>
                        <? $APPLICATION->IncludeFile(
                            "/local/include/footer.email.php",
                            Array(),
                            Array("MODE"=>"php") // text, html, php
                        ); ?>
                        <div class="footer-social mobile">
                            <? $APPLICATION->IncludeFile(
                                "/local/include/footer.social.php",
                                Array(),
                                Array("MODE"=>"php") // text, html, php
                            ); ?>
                        </div>
                        <div class="footer-links mobile">
                            <a href="/about/personal-data/">Соглашение об обработке персональных данных</a><br>
                            <a href="/about/privacy-policy/">Политика конфиденциальности</a>
                        </div>
                        <div class="footer-copy">
                            © 1999 - 2020 ООО Национальный<br> шинный альянс
                        </div>
                        <div class="footer-dev">
                            Developed by LEAD Spectrum
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> <!-- footer -->

<div class="modal" id="login">

    <div class="modal-tab">
        <div class="modal-tab_titles">
            <div class="modal-tab_title active login-tab_js">
                Вход
            </div>
            <div class="modal-tab_title reg-tab_js">
                Регистрация
            </div>
        </div>
        <div class="modal-tab_box">
            <div class="modal-tab_content active">

                <form action="login.php?login=yes">
                    <input type="hidden" name="AUTH_FORM" value="Y" />
                    <input type="hidden" name="TYPE" value="AUTH" />
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Логин
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="USER_LOGIN" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Пароль
                        </div>
                        <div class="modal-input_input">
                            <input type="password" name="USER_PASSWORD" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-button_box">
                        <button class="go">Войти</button>
                        <div>
                            <a href="#" class="open-getpass_js modal-button_link">Востановисть доступ</a>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-tab_content">
                <div class="modal-dsc">
                    Для регистрации заполните поля ниже<br>
                    и нажмите Зарегистрироваться
                </div>
                <form action="register.php">
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Логин
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="REGISTER[LOGIN]" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Телефон
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="REGISTER[PERSONAL_PHONE]" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            ИНН
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="REGISTER[WORK_DEPARTMENT]" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Компания
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="REGISTER[WORK_COMPANY]" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Почта
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="REGISTER[EMAIL]" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Пароль
                        </div>
                        <div class="modal-input_input">
                            <input type="password" name="REGISTER[PASSWORD]" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Подтвердите пароль
                        </div>
                        <div class="modal-input_input">
                            <input type="password" name="REGISTER[CONFIRM_PASSWORD]" autocomplete="off" data-rules="required">
                        </div>
                    </div>

                    <div class="modal-input">
                        <label class="input-checkbox">
                            <input type="checkbox" name="agreement" checked="checked">
                            <span>Я согласен с Политикой обработки данных и Пользовательским соглашением</span>
                        </label>
                    </div>

                    <div class="modal-button_box">
                        <button class="go">Зарегистрироваться</button>
                    </div>

                    <input type="hidden" name="register_submit_button" value="Регистрация" />
                </form>

            </div>
        </div>
    </div>

</div> <!-- modal login -->

<div class="modal" id="getpassword">
    <div class="modal-title">
        Востановление доступа
    </div>
    <div class="modal-tab_box">
        <div class="modal-dsc">
            Для восстановления доступа напишите вашу почту, указанную при регистрации, и мы вышлем Вам письмо с интсрукцией по востановлению
        </div>
        <form action="">
            <div class="modal-input">
                <div class="modal-input_label">
                    Почта
                </div>
                <div class="modal-input_input">
                    <input type="text" name="email" autocomplete="off" data-rules="required">
                </div>
            </div>
            <div class="modal-button_box">
                <button class="go">Востановить доступ</button>
                <div>
                    <a href="#" class="open-login_js modal-button_link">вернуться назад</a>
                </div>
            </div>
        </form>
    </div>

</div>

<div class="modal" id="recall">
    <div class="modal-title">
        Обратный звонок
    </div>
    <div class="modal-tab_box">
        <div class="modal-dsc">
            Оставьте заявку и наш менеджер Вам перезвонит.
        </div>
        <form action="feedback.recall.php">
            <div class="modal-input">
                <div class="modal-input_label">
                    ФИО
                </div>
                <div class="modal-input_input">
                    <input type="text" name="name" autocomplete="off" data-rules="required">
                </div>
            </div>
            <div class="modal-input">
                <div class="modal-input_label">
                    Телефон
                </div>
                <div class="modal-input_input">
                    <input type="text" name="phone" autocomplete="off" data-rules="required">
                </div>
            </div>
            <div class="modal-button_box">
                <button class="go">Заказать звонок</button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="oneclick">
    <div class="modal-title">
        Быстрая покупка
    </div>
    <div class="modal-tab_box">
        <div class="modal-dsc">
            Оставьте контактные данные
        </div>
        <form action="feedback.oneclick.php">
            <div class="modal-input">
                <div class="modal-input_label">
                    ФИО
                </div>
                <div class="modal-input_input">
                    <input type="text" name="properties[NAME]" autocomplete="off" data-rules="required">
                </div>
            </div>
            <div class="modal-input">
                <div class="modal-input_label">
                    Телефон
                </div>
                <div class="modal-input_input">
                    <input type="text" name="properties[PHONE]" autocomplete="off" data-rules="required">
                </div>
            </div>
            <div class="modal-input">
                <div class="modal-input_label">
                    Email
                </div>
                <div class="modal-input_input">
                    <input type="text" name="properties[EMAIL]" autocomplete="off" data-rules="required">
                </div>
            </div>
            <div class="modal-button_box">
                <button class="go">Сделать заказ</button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="success">
    <div class="modal-title">
        Поздравляем!
    </div>
    <div class="modal-tab_box">
        <div class="modal-dsc">
            Регистрация почты завершена.<br>
            Для подтверждения учетной записи перейдите по ссылке в письме и дождитесь проверки администратора
        </div>
        <div class="modal-button_box">
            <a href="/" class="modal-button_back">
                На главную страницу
            </a>
        </div>
    </div>
</div>

<div class="ajax-loader"></div>

</body>
</html>