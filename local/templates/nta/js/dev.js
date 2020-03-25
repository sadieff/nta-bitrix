$(document).ready(function() {

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