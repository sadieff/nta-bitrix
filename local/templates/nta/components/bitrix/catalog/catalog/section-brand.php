<?php
//$APPLICATION->AddChainItem($arSection["UF_TITLE"]);
if(!empty($arSection["DETAIL_PICTURE"])) $APPLICATION->AddViewContent('BREADCRUMB_CLASS', 'breadcrumb-white');
$this->setFrameMode(true); ?>

<? if(!empty($arSection["DETAIL_PICTURE"])): ?>
    <div class="static-banner static-banner_brands">
        <img src="<?=CFile::GetPath($arSection["DETAIL_PICTURE"]);?>" alt="" class="static-banner_image">
        <div class="container">
            <div class="banner-title">
                <?=$arSection["~UF_BANNER_TITLE"];?>
            </div>
            <div class="banner-dsc">
                <?=$arSection["~UF_BANNER_DSC"];?>
            </div>
            <div class="static-banner_button">
                <a href="#" class="static-banner_link">
                    Модели и размеры
                </a>
            </div>
        </div>
        <div class="static-banner_brand">
            <img src="<?=CFile::GetPath($arSection["PICTURE"]);?>" alt="">
        </div>
    </div> <!-- static-banner -->
<?endif;?>

<div class="page-brand_info">
    <div class="container">
        <div class="row">
            <div class="<?if(!empty($arSection["UF_SLIDER"])):?>col-lg-7<?else:?>col-lg-12<?endif;?>">
                <div class="page-brand_title">
                    <?=$arSection["UF_TITLE"];?>
                </div>
                <div class="page-brand_content content_">
                    <?=$arSection["~DESCRIPTION"];?>
                </div>
            </div>
            <?if(!empty($arSection["UF_SLIDER"])):?>
                <div class="col-lg-4 offset-lg-1">
                    <div class="page-brand_carousel owl-carousel">
                        <? foreach($arSection["UF_SLIDER"] as $arImage):
                            $image = CFile::ResizeImageGet($arImage, array('width' => 372, 'height' => 323), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
                            <div class="page-brand_carousel-item">
                                <img src="<?=$image["src"];?>" alt="">
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            <?endif;?>
        </div>
    </div>
</div> <!-- page-brand_info -->

<div class="filter-home catalog-filter">
    <div class="container">
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

</div> <!-- filter-home -->

<div class="category-section page-brand_section">
    <div class="container">
        <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list",
            "brands.listing",
            Array(
                "PARENT_IMAGE" => CFile::GetPath($arSection["PICTURE"]),
                "PARENT_BRAND" => $arSection["NAME"],
                "VIEW_MODE" => "TEXT",
                "SHOW_PARENT_NAME" => "Y",
                "IBLOCK_TYPE" => "",
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "SECTION_USER_FIELDS" => array('UF_*'),
                "SECTION_ID" => $arSection["ID"],
                "SECTION_CODE" => "",
                "SECTION_URL" => "",
                "COUNT_ELEMENTS" => "Y",
                "TOP_DEPTH" => "1",
                "SECTION_FIELDS" => "",
                "ADD_SECTIONS_CHAIN" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_NOTES" => "",
                "CACHE_GROUPS" => "N"
            )
        ); ?>

        <div class="catalog-new_more-box">
            <a href="#" class="catalog-new_link">
                Показать еще
            </a>
        </div>

        <!-- https://tuning-soft.ru/articles/bitrix/pagination-by-sections.html -->

        <div class="catalog-navigation">
            <a href="#" class="catalog-navigation_prev">
                Предыдущая страница
            </a>
            <ul>
                <li class="current"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
            <a href="#" class="catalog-navigation_next">
                Предыдущая страница
            </a>
        </div>
    </div>
</div> <!-- category-section -->
