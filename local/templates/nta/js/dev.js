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
        url:'/local/ajax/getCardCount.php',
        data: '',
        type:'post',
        dataType: 'JSON',
        success:function(data){
            $('.header-bascket span, .header-top_cart span').css('display', 'block');
            $('.header-bascket span, .header-top_cart span').text(data.count);
        }
    });

    /* добавление товара в корзину */

    $(document).on('click', '.add-bascket_js', function () {

        $(this).addClass('active');

        let product = +$(this).data('product');
        let quantity = +$(this).closest('.product-js').find('input[name=quantity]').val();

        $.ajax({
            url:'/local/ajax/addtocard.php',
            data: {product: product, quantity: quantity},
            type:'post',
            dataType: 'JSON',
            success:function(data){
                $('.header-bascket span, .header-top_cart span').css('display', 'block');
                $('.header-bascket span, .header-top_cart span').text(data.count);
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