$(document).ready(function() {

    /* ajax пагинация */
    $(document).on('click', '.navigation_js a', function (e) {
        console.log('here');
        e.stopPropagation();
        e.preventDefault();

        var uri = $(this).attr('href')+'&ajaxmode=y';

        $('.ajax-container_js').addClass('load'); // отображаем пользователю процесс загрузки

        $.ajax({
            url: uri,
            data: '',
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.ajax-container_js .navigation_js').remove(); // удаляем старую навигацию
                $('.ajax-container_js').append(data); // грузим страницу с новой навигацией
                $('.ajax-container_js,.ajax-loader').removeClass('load'); // убираем загрузку
            }
        });
    });

    /* при загрузке страницы получим количество товаров в корзине */

    $.ajax({
        url:'/local/ajax/getcardcount.php',
        data: '',
        type:'post',
        dataType: 'JSON',
        success:function(data){
            if(data.count > 0) {
                $('.header-bascket span, .header-top_cart span').css('display', 'block');
                $('.header-bascket span, .header-top_cart span').text(data.count);
            }
        }
    });

    /* добавление товара в корзину */

    $.ajax({
        url:'/local/ajax/getcardcount.php',
        data: '',
        type:'post',
        dataType: 'JSON',
        success:function(data){
            if(data.count > 0) {
                $('.header-bascket span, .header-top_cart span').css('display', 'block');
                $('.header-bascket span, .header-top_cart span').text(data.count);
            }
        }
    });

    $(document).on('click', '.add-bascket_js', function () {

        $(this).addClass('active');

        let data = {};
        let product = $(this).closest('.product-js');
        data.product = +$(this).data('product');
        data.quantity = +product.find('input[name=quantity]').val();

        if(product.find('input[name=camera]').prop("checked")) data.camera = "Y";
        if(product.find('input[name=lenta]').prop("checked")) data.lenta = "Y";
        if(product.find('input[name=kolco]').prop("checked")) data.kolco = "Y";

        $.ajax({
            url:'/local/ajax/addtocard.php',
            data: data,
            type:'post',
            dataType: 'JSON',
            success:function(data){
                $('.header-bascket span, .header-top_cart span').css('display', 'block');
                $('.header-bascket span, .header-top_cart span').text(data.count);
            }
        });

    });

    /* добавление товара в сравнение */

    $.ajax({
        url:'/local/ajax/addtocompare.php',
        data: '',
        type:'post',
        dataType: 'JSON',
        success:function(data){
            if(data.count > 0) {
                $('.header-top_compare span, .header-top_compare span').css('display', 'block');
                $('.header-top_compare span, .header-top_compare span').text(data.count);
            }
        }
    });

    $(document).on('click', '.add-compare_js', function () {

        let product = +$(this).data('product');

        $.ajax({
            url:'/local/ajax/addtocompare.php',
            data: {action: "ADD_TO_COMPARE_LIST", id: product},
            type:'post',
            dataType: 'JSON',
            success:function(data){
                $('.header-top_compare span, .header-top_compare span').css('display', 'block');
                $('.header-top_compare span, .header-top_compare span').text(data.count);
            }
        });

    });

    /* фильтр */

    $('.filter-content_list input').each(function(){
        $(this).change(function(){
            filter_cange();
        });
    });

    $('.filter-form_button-box,.filter-content_add').on('click', function(){ // Перейдем по ссылке из фильтра
        document.location.href = document.location.pathname + $('#mainfilter').data('success');
    });

    /* отправляем запросы при изменении фильтра */
    function filter_cange(){

        var data = $('#mainfilter').serialize();
        $.ajax({
            url: document.location.pathname,
            data: data,
            type: 'get',
            dataType: 'json',
            success: function(data){
                $('#mainfilter').data('success', data.FILTER_URL);
                filter_update(data);
            }
        });

    }

    /* изменим фильтр в соответствии с ответом сервера */
    function filter_update(data) {
        $.each(data.ITEMS, function(index, item) { // обойдем блоки

            $.each(item.VALUES, function(index, element) { // обойдем элементы
                if(element.DISABLED === true) {
                    $('#'+element.CONTROL_ID).prop("disabled", true);
                }
                else {
                    $('#'+element.CONTROL_ID).prop("disabled", false);
                }
            });

        });
    }

});

(function($){
    $(function(){
        $(document).on('click', '.go', function(e){

            e.stopPropagation();
            e.preventDefault();

            var $form = $(this).closest('form');
            var data = $form.serialize();
            var action = $form.attr('action');

            var rules = Object();

            var inputs = $form.find('input').add('textarea', $form.get(0));

            var validate = true;

            inputs.each(function(){

                var r = $(this).data('rules');

                if (r && r.length != 0){

                    rules[$(this).attr('name')] = r;

                    r = r.split(',');

                    for (i = 0; i < r.length; i++)
                    {
                        var rule = r[i];
                        if (validator[rule]){
                            if ( !validator[rule]($(this)) ){
                                validate = false;
                            }
                        }
                    }
                }
            });

            if (!validate) return;

            var btn = $(this).addClass('btn-desabled').removeClass('go');

            $.ajax({
                url: '/local/ajax/'+action,
                data: data,
                type:'post',
                dataType: 'JSON',
                success:function(data){

                    btn.addClass('go').removeClass('btn-desabled');

                    if(data.status == "success" && data.redirect) {
                        document.location.href = data.redirect;
                    }

                    if((data.status == "success" || data.status == "error")  && data.content) {
                        $.fancybox.open('<div class="modal">' +
                            '<div class="modal-title">'+data.title+'</div>' +
                            '<div class="modal-button_box">'+data.content+'</div>' +
                        '</div>');
                    }
                    else {
                        $.fancybox.open('<div class="modal">' +
                            '<div class="modal-title">'+data.title+'</div>' +
                            '<div class="modal-button_box">' +
                                '<div class="modal-dsc">'+data.text+'</div>' +
                            '</div>' +
                        '</div>');
                    }

                }
            });

            return false;
        });

        $('input').add('textarea').on('focus', function(){
            $(this).parent()
                .removeClass('wrong');
        }).each( function(){

            if ( $(this).data('rules') ){
                $(this).wrap('<div class="feild_wrapper"></div>');
                $(this).parent().append('<span class="error_label"></span>');
            }

        });
    });


    /* validator */

    var validator = {
        required:function($i){
            if ($i.val() == '' || $i.val() == $i.attr('placeholder')){
                fieldError.call( $i, lang.requiredError );

                return false;
            }
            return true;
        },
        email:function($i){

            if ($i.val() == '') return true;

            var r = new RegExp(".+@.+\..+","i");
            if ( ! r.test($i.val()) ){
                fieldError.call( $i, lang.emailError );
                return false;
            }
            return true;
        },
        phone:function($i){
            console.log('phone');
            var r = new RegExp("^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$","i");
            if ( ! r.test($i.val()) ){
                fieldError.call( $i, lang.phoneError );
                return false;
            }
            return true;
        }
    }

    var fieldError = function(message){

        if ( !$(this).parent().hasClass('feild_wrapper') ){

            $(this).wrap('<div class="feild_wrapper"></div>');
            $(this).parent().append('<span class="error_label"></span>');

        }

        $(this).parent().addClass('wrong');
        $(this).siblings('.error_label').text( message );

        return false;
    }

    var lang = {
        success: 			'Ваша заявка успешно отправлена',
        error: 				'Произошла ошибка, попробуйте еще раз',
        name: 				'Имя',
        phone:				'Телефон',
        email: 				'Email',
        programs: 			'Программы',
        requiredError:		'Это поле не может быть пустым',
        emailError:			'Поле Email должно содержать корректный адрес',
        phoneError:			'Укажите корректный номер телефона'
    };
})(jQuery);