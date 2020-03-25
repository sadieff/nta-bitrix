<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<footer>
    <div class="footer-menu">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Каталог</a></li>
                    <li><a href="#">Доставка и оплата</a></li>
                    <li><a href="#">Гарантия</a></li>
                    <li><a href="#">О компании</a></li>
                    <li><a href="#">Новости</a></li>
                    <li><a href="#">Акции</a></li>
                    <li><a href="#">Статьи</a></li>
                </ul>
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
                        <a href="#">Соглашение об обработке персональных данных</a><br>
                        <a href="#">Политика конфиденциальности</a>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="footer-contacts">
                        <div class="footer-phone_wrap">
                            <a href="tel:+7(495)2520445" class="footer-phone">
                                + 7 (495) 252 04 45
                            </a>
                        </div>
                        <div class="footer-recall">
                            Заказать звонок
                        </div>
                        <div class="footer-time">
                            пн-чтв. с 9:00 до 18:00<br>
                            пт. с 9:00 до 17:00
                        </div>
                        <a href="mailto:info@nta-tyre.ru" class="footer-email">
                            info@nta-tyre.ru
                        </a>
                        <div class="footer-social mobile">
                            <a href="#" class="ig"></a>
                            <a href="#" class="fb"></a>
                            <a href="#" class="in"></a>
                            <a href="#" class="tw"></a>
                        </div>
                        <div class="footer-links mobile">
                            <a href="#">Соглашение об обработке персональных данных</a><br>
                            <a href="#">Политика конфиденциальности</a>
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

                <form action="">
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Логин
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="login" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Пароль
                        </div>
                        <div class="modal-input_input">
                            <input type="password" name="password" autocomplete="off" data-rules="required">
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
                <form action="">
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Логин
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="login" autocomplete="off" data-rules="required">
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
                    <div class="modal-input">
                        <div class="modal-input_label">
                            ИНН
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="inn" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Компания
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="company" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Почта
                        </div>
                        <div class="modal-input_input">
                            <input type="text" name="email" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Пароль
                        </div>
                        <div class="modal-input_input">
                            <input type="password" name="password" autocomplete="off" data-rules="required">
                        </div>
                    </div>
                    <div class="modal-input">
                        <div class="modal-input_label">
                            Подтвердите пароль
                        </div>
                        <div class="modal-input_input">
                            <input type="password" name="password" autocomplete="off" data-rules="required">
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

<div class="modal modal-order" id="modal-order">
    <div class="modal-title">
        Заказ №1 от 01.01.2020
    </div>
    <div class="modal-tab_box">
        <div class="modal-order_status">
            Статус заказа: <span>Выполнен</span>
        </div>

        <div class="modal-order_enum">
            <div class="modal-order_title">
                    <span class="model-title_num">
                        №
                    </span>
                <span class="modal-title_name">
                        Наименование
                    </span>
                <span class="modal-title_count">
                        Количество
                    </span>
                <span class="modal-title_price">
                        Сумма
                    </span>
            </div>
            <div class="modal-order_item">
                <div class="modal-order_num" data-title="№">
                    1
                </div>
                <div class="modal-order_name" data-title="Наименование">
                    Шина Культор 10-16.5 10PR SKID STEER 50 TL
                </div>
                <div class="modal-order_count" data-title="Количество">
                    20 шт.
                </div>
                <div class="modal-order_price" data-title="Сумма">
                    123 457 р.
                </div>
            </div>
            <div class="modal-order_item">
                <div class="modal-order_num" data-title="№">
                    1
                </div>
                <div class="modal-order_name" data-title="Наименование">
                    Шина Культор 10-16.5 10PR SKID STEER 50 TL
                </div>
                <div class="modal-order_count" data-title="Количество">
                    20 шт.
                </div>
                <div class="modal-order_price" data-title="Сумма">
                    123 457 р.
                </div>
            </div>
            <div class="modal-order_item">
                <div class="modal-order_num" data-title="№">
                    1
                </div>
                <div class="modal-order_name" data-title="Наименование">
                    Шина Культор 10-16.5 10PR SKID STEER 50 TL
                </div>
                <div class="modal-order_count" data-title="Количество">
                    20 шт.
                </div>
                <div class="modal-order_price" data-title="Сумма">
                    123 457 р.
                </div>
            </div>
            <div class="modal-order_item">
                <div class="modal-order_num" data-title="№">
                    1
                </div>
                <div class="modal-order_name" data-title="Наименование">
                    Шина Культор 10-16.5 10PR SKID STEER 50 TL
                </div>
                <div class="modal-order_count" data-title="Количество">
                    20 шт.
                </div>
                <div class="modal-order_price" data-title="Сумма">
                    123 457 р.
                </div>
            </div>
            <div class="modal-order_item">
                <div class="modal-order_num" data-title="№">
                    1
                </div>
                <div class="modal-order_name" data-title="Наименование">
                    Шина Культор 10-16.5 10PR SKID STEER 50 TL
                </div>
                <div class="modal-order_count" data-title="Количество">
                    20 шт.
                </div>
                <div class="modal-order_price" data-title="Сумма">
                    123 457 р.
                </div>
            </div>
        </div>

        <div class="modal-order_total">
            Итого: 160 шт.<br> на сумму <span>124 224 р.</span>
        </div>

        <div class="modal-order_button_box">
            <button class="go">Повторить заказ</button>
        </div>
    </div>
</div>

</body>
</html>