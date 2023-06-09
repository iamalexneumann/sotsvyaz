BX.ready(function () {
    const checkoutModal = new bootstrap.Modal('#checkoutModal');
    const triggerClass = 'js-checkout-open';
    const ajaxFormClassName = 'js-checkout-ajax-form';
    const delay = async (ms) => await new Promise(resolve => setTimeout(resolve, ms));

    BX.bindDelegate(
        document.body,
        'click',
        {className: triggerClass},
        BX.proxy(function (e) {
            if (!e) {
                e = window.event;
            }

            checkoutModal.show();
            return BX.PreventDefault(e);
        })
    );

    BX.bindDelegate(
        document.body,
        'submit',
        {className: ajaxFormClassName},
        BX.proxy(function (e) {
            e.preventDefault();

            let formData = Array.from((new FormData(e.target)).entries()).reduce((memo, pair) => ({
                ...memo,
                [pair[0]]: pair[1],
            }), {});

            BX.ajax({
                url: location.href,
                data: formData,
                method: this.method,
                dataType: 'json',
                timeout: 30,
                async: true,
                scriptsRunFirst: true,
                emulateOnload: true,
                start: true,
                cache: false,
                onsuccess: function (response) {
                    if (response.message) {
                        document.querySelector('.js-checkout-ajax-form').innerHTML = '<div class="alert alert-success" role="alert">' + response.message + '</div>';
                        ym(94079335,'reachGoal','order');
                        const actionWithDelay = delay(3000).then(() => location.reload());
                    }
                },
                onfailure: function () {
                    BASKET.alert(BX.message('ERROR'), function () {
                        document.querySelector('.js-checkout-ajax-form').innerHTML = '<div class="alert alert-alert-danger" role="alert">' + BX.message('ERROR') + '</div>';
                        const actionWithDelay = delay(3000).then(() => location.reload());
                    });
                }
            });
        })
    );
});