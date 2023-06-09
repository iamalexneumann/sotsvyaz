BX.ready(function () {
    BX.bindDelegate(
        document.body,
        'change',
        {className: 'js-basket-item-qnt-input'},
        BX.proxy(function (e) {
            this.value = parseInt(this.value) > 0 ? parseInt(this.value) : 1;
            const basketItem = this.closest('.js-basket-item');
            const itemId = basketItem.dataset.id;

            BASKET.update(itemId, this.value, () => {
                basketItem.querySelector('.js-basket-item-subtotal').textContent = BASKET.formatNum(BASKET.getItemSubTotal(itemId), 0, '', ' ');
            })
        })
    );

    BX.bindDelegate(
        document.body,
        'click',
        {className: 'js-basket-item-qnt-inc'},
        BX.proxy(function (e) {
            const qntInput = this.closest('.js-basket-item').querySelector('.js-basket-item-qnt-input');
            BX.fireEvent(qntInput, 'change')
        })
    );

    BX.bindDelegate(
        document.body,
        'click',
        {className: 'js-basket-item-qnt-dec'},
        BX.proxy(function (e) {
            const qntInput = this.closest('.js-basket-item').querySelector('.js-basket-item-qnt-input');
            BX.fireEvent(qntInput, 'change')
        })
    );

    BX.bindDelegate(
        document.body,
        'click',
        {className: 'js-basket-item-remove'},
        BX.proxy(function (e) {
            BASKET.delete(this.dataset.id, () => {
                const item = this.closest('.js-basket-item');
                item.style.opacity = 0;
                setTimeout(() => item.remove(), 500);
            })
        })
    );

    BX.bindDelegate(
        document.body,
        'click',
        {className: 'js-basket-reset'},
        BX.proxy(function (e) {
            BASKET.reset(() => location.reload())
        })
    );
});