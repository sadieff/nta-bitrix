$(document).ready(function(){

    var cert = new Cert({
        certClass : ".card", // Класс обертки корзины
        item: ".card-item", // Элемент корзины
        itemQuantity: ".card-quantity_js", // input с количеством в корзине
        itemQuantityMinus: ".card-minus_js", // Уменьшить количество товара
        itemQuantityPlus: ".card-plus_js", // Увеличить количество товара
        itemSum: ".card-sum_js", // Стоимость товара
        itemDelete: ".card-delete_js", // Удалить товар
        totalSum: ".card-total_js", // Общая сумма
        applyButton: ".card-apply_js", // Кнопка оформления заказа
        certForm: ".cert_form_js", // Класс формы
        formAction: "/local/ajax/cardhendler.php" // адрес для отправки данных
    });

});

class Cert{

    constructor(params) {

        this.opt = params;
        var that = this;

        /* Уменьшение количества товара */
        $(document).on('click', params.itemQuantityMinus, function(){ // TODO this.cartWrap.on('click'...

            var input = that.getFind($(this), params.itemQuantity);
            var productId = +that.getItem($(this)).data('product-id');
            var value = +input.val() - 1;

            if(value <= 0) return false;

            input.val(value);
            that.totalSum(params);
            that.request({"type": "quantity", "value": value, "productId": productId});

        });

        /* Увеличение количества товара */
        $(document).on('click', params.itemQuantityPlus, function(){

            var input = that.getFind($(this), params.itemQuantity);
            var productId = +that.getItem($(this)).data('product-id');
            var value = +input.val() + 1;

            input.val(value);
            that.totalSum();
            that.request({"type": "quantity", "value": value, "productId": productId});

        });

        /* Изменение количества в инпуте */
        $(params.itemQuantity).keyup(function(e){
            var input = that.getFind($(this), params.itemQuantity);
            var productId = that.getItem($(this)).data('product-id');
            var quantity = Number(input.val());
            if(!quantity > 0)  input.val("1");

            that.totalSum();
            that.request({"type": "quantity", "value": quantity, "productId": productId});
        });

        /* удаление товара */
        $(document).on('click', params.itemDelete, function() {
            var item = that.getItem($(this));
            var productId = item.data('product-id');
            that.getItem($(this)).slideUp(300);

            setTimeout( function(){
                item.remove();
                that.totalSum();
                that.request({"type": "delete", "productId": productId});
            }, "300");

        });

        /* оформление заказа */
        $(document).on('click', params.applyButton, function() {
            var data = $(params.certForm).serialize();
            that.request(data);
        });

    }

    // получение элемента корзины
    getItem(element){
        return element.closest(this.opt.item);
    }

    // Поиск внутри элемента корзины
    getFind(element, find){
        return element.closest(this.opt.item).find(find);
    }

    /* подсчет общей суммы */
    totalSum(){

        var total = 0;
        var that = this;
        var opt = this.opt;

        $(this.opt.item).each(function(){

            var quantity = +that.getFind($(this), opt.itemQuantity, opt).val();
            var price = +that.getFind($(this), opt.itemSum, opt).data('unit-price');
            console.log(quantity, price);
            total = total + (price * quantity);

        });

        $(opt.totalSum).text(total.toLocaleString());

    }

    /* отправка данных на сервер */
    request(data){

        $.ajax({
            url: this.opt.formAction,
            data: data,
            type:'post',
            dataType: 'JSON',
            success:function(data){
                console.log(data);
            }
        });

    }

}
