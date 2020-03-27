<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->AddChainItem("Ошибка 404");
$APPLICATION->SetTitle("404 Not Found"); ?>

    <div class="container">
        <div class="page-404">
            <div class="page-404_title">
                Страница не найдена
            </div>
            <div class="page-404_image">
                <img src="/local/templates/nta/images/404.jpg" alt="">
            </div>
            <div class="page-404_text">
                Страница к которой вы обращаетесь не существует.<br>
                Воспользуйтесь меню сайта, чтобы попасть куда надо!
            </div>
        </div>
    </div>

    <div class="filter-home">
        <div class="container">
            <div class="filter-home_title">
                Поиск
            </div>
            <div class="filter-form">
                <div class="filter-item mm">
                    <div class="filter-item_title">
                        Применяемость <span></span>
                    </div>
                    <div class="filter-overlay"></div>
                    <div class="filter-item_wrap">
                        <div class="filter-select">
                            <span>Все</span>
                        </div>
                        <div class="filter-content">
                            <div class="filter-content_buttons">
                                <div class="filter-content_add">
                                    Подобрать
                                </div>
                                <div class="filter-content_clear">
                                    Сбросить
                                </div>
                            </div>
                            <div class="filter-content_system">
                                <span>Показать в</span>
                                <div class="filter-content_system-wrap">
                                    <label class="input-radio">
                                        <input type="radio" value="in" class="sys-type" name="prim-system">
                                        <span>дюймах</span>
                                    </label>
                                    <label class="input-radio">
                                        <input checked="checked" type="radio" value="mm" class="sys-type" name="prim-system">
                                        <span>миллиметрах</span>
                                    </label>
                                </div>
                            </div>
                            <div class="filter-content_list">
                                <label class="input-checkbox">
                                    <input disabled="disabled" type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input disabled="disabled" checked="checked" type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input checked="checked" type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="filter-item mm">
                    <div class="filter-item_title">
                        Типоразмер <span></span>
                    </div>
                    <div class="filter-overlay"></div>
                    <div class="filter-item_wrap">
                        <div class="filter-select">
                            <span>Все</span>
                        </div>
                        <div class="filter-content">
                            <div class="filter-content_buttons">
                                <div class="filter-content_add">
                                    Подобрать
                                </div>
                                <div class="filter-content_clear">
                                    Сбросить
                                </div>
                            </div>
                            <div class="filter-content_system">
                                <span>Показать в</span>
                                <div class="filter-content_system-wrap">
                                    <label class="input-radio">
                                        <input type="radio" value="in" class="sys-type" name="razm-system">
                                        <span>дюймах</span>
                                    </label>
                                    <label class="input-radio">
                                        <input checked="checked" type="radio" value="mm" class="sys-type" name="razm-system">
                                        <span>миллиметрах</span>
                                    </label>
                                </div>
                            </div>
                            <div class="filter-content_list">
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input checked="checked" type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input checked="checked" type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="filter-item">
                    <div class="filter-item_title">
                        Производитель <span></span>
                    </div>
                    <div class="filter-overlay"></div>
                    <div class="filter-item_wrap">
                        <div class="filter-select">
                            <span>Все</span>
                        </div>
                        <div class="filter-content">
                            <div class="filter-content_buttons">
                                <div class="filter-content_add">
                                    Подобрать
                                </div>
                                <div class="filter-content_clear">
                                    Сбросить
                                </div>
                            </div>
                            <div class="filter-content_list">
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span>Mitas</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span>Continental</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span>Cultor</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="filter-item mm">
                    <div class="filter-item_title">
                        Посадочный диаметр <span></span>
                    </div>
                    <div class="filter-overlay"></div>
                    <div class="filter-item_wrap">
                        <div class="filter-select">
                            <span>Все</span>
                        </div>
                        <div class="filter-content">
                            <div class="filter-content_buttons">
                                <div class="filter-content_add">
                                    Подобрать
                                </div>
                                <div class="filter-content_clear">
                                    Сбросить
                                </div>
                            </div>
                            <div class="filter-content_system">
                                <span>Показать в</span>
                                <div class="filter-content_system-wrap">
                                    <label class="input-radio">
                                        <input type="radio" value="in" class="sys-type" name="diam-system">
                                        <span>дюймах</span>
                                    </label>
                                    <label class="input-radio">
                                        <input checked="checked" type="radio" value="mm" class="sys-type" name="diam-system">
                                        <span>миллиметрах</span>
                                    </label>
                                </div>
                            </div>
                            <div class="filter-content_list">
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                                <label class="input-checkbox">
                                    <input type="checkbox">
                                    <span class="in">10-16.5</span>
                                    <span class="mm">121-165</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="filter-form_button-box">
                    <button class="filter-form_button">
                        Подобрать
                    </button>
                </div>
            </div>

        </div>

        <div class="brands-home">
            <a href="#" class="brands-home_item">
                <span>
                    <img src="/local/templates/nta/images/image-5.jpg" alt="">
                </span>
            </a>
            <a href="#" class="brands-home_item">
                <span>
                    <img src="/local/templates/nta/images/image-6.jpg" alt="">
                </span>
            </a>
            <a href="#" class="brands-home_item active">
                <span>
                    <img src="/local/templates/nta/images/image-3.jpg" alt="">
                </span>
            </a>
            <a href="#" class="brands-home_item active">
                <span>
                    <img src="/local/templates/nta/images/image-4.jpg" alt="">
                </span>
            </a>
            <a href="#" class="brands-home_item">
                <span>
                    <img src="/local/templates/nta/images/image-7.jpg" alt="">
                </span>
            </a>
            <a href="#" class="brands-home_item">
                <span>
                    <img src="/local/templates/nta/images/image-8.jpg" alt="">
                </span>
            </a>
            <a href="#" class="brands-home_item">
                <span>
                    <img src="/local/templates/nta/images/image-9.jpg" alt="">
                </span>
            </a>
        </div>
    </div> <!-- filter-home -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>