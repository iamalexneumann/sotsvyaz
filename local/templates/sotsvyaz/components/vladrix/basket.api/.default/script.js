let BASKET = {
    instance: {
        instanceId: "",
        totalQuantity: 0,
        totalPrice: 0,
        totalPriceWithoutDiscount: 0,
        percentDiscount: 0,
        discountSum: 0,
        items: [],
    },

    init: function () {
        this.sync();
    },

    /**
     * Get BASKET items
     *
     * @returns {[]}
     */
    getItems: function () {
        return this.instance.items;
    },

    /**
     * Get common count of all products in BASKET
     *
     * @returns {number}
     */
    getTotalQuantity: function () {
        return this.instance.totalQuantity;
    },

    /**
     * Get total sum of BASKET
     *
     * @returns {number}
     */
    getTotalPrice: function () {
        return this.instance.totalPrice;
    },

    /**
     * Get discount sum of BASKET
     *
     * @returns {number}
     */
    getDiscountSum: function () {
        return this.instance.discountSum;
    },

    /**
     * Get discount sum of BASKET
     *
     * @returns {number}
     */
    getTotalPriceWithoutDiscount: function () {
        return this.instance.totalPriceWithoutDiscount;
    },

    /**
     * Get percent of discount of BASKET
     *
     * @returns {number}
     */
    getPercentDiscount: function () {
        return this.instance.percentDiscount;
    },

    /**
     * @returns {string}
     */
    getInstanceId: function () {
        return this.instance.instanceId;
    },

    /**
     * Get item of BASKET with product and quantity
     *
     * @param itemId
     * @returns {*}
     */
    getItem: function (itemId) {
        return this.instance.items[itemId];
    },

    /**
     * Get quantity of product in item of BASKET
     *
     * @param itemId
     * @returns {number}
     */
    getItemQuantity: function (itemId) {
        return this.getItem(itemId).quantity;
    },

    /**
     * Get common price of products in item of BASKET

     * @param itemId
     * @returns {number}
     */
    getItemSubTotal: function (itemId) {
        return this.getItem(itemId).subTotal;
    },

    /**
     * Added product to BASKET
     *
     * @param productId
     * @param quantity
     * @param properties
     * @param callback
     */
    add: function (productId, quantity, properties, callback) {
        BASKET.sendRequest({
            'VXBASKET_ADD': 'Y',
            'PRODUCT_ID': productId,
            'QUANTITY': parseInt(quantity) || 1,
            'PROPERTIES': properties || {},
        }, function (response) {
            if (response.message) {
                BASKET.alert(response.message);
            }

            if (response.success) {
                BASKET.sync(response.basket);

                callback && typeof (callback) === "function" ? callback(response) : null;
            } else if ( ! response.message) {
                BASKET.alert(BX.message("ERROR_BASKET_UPDATE"))
            }
        });
    },

    /**
     * Update quantity of item in BASKET
     *
     * @param itemId
     * @param quantity
     * @param callback
     */
    update: function (itemId, quantity, callback) {
        BASKET.sendRequest({
            'VXBASKET_UPDATE': 'Y',
            'ITEM_ID': itemId,
            'QUANTITY': parseInt(quantity) || 1
        }, function (response) {
            if (response.message) {
                BASKET.alert(response.message);
            }

            if (response.success) {
                BASKET.sync(response.basket);

                callback && typeof (callback) === "function" ? callback(response) : null;
            } else if ( ! response.message) {
                BASKET.alert(BX.message('ERROR_BASKET_UPDATE'))
            }
        });
    },

    /**
     * Increment count of item from BASKET
     *
     * @param itemId
     * @param callback
     */
    increment: function (itemId, callback) {
        const qnt = this.getItemQuantity(itemId) + 1;
        this.update(itemId, qnt, callback);
    },

    /**
     * Decrement count of item from BASKET
     *
     * @param itemId
     * @param callback
     */
    decrement: function (itemId, callback) {
        const qnt = this.getItemQuantity(itemId) - 1;

        if (qnt < 1) {
            this.delete(itemId, callback);
        } else {
            this.update(itemId, qnt, callback);
        }
    },

    /**
     * Delete BASKET item
     *
     * @param itemId
     * @param callback
     */
    delete: function (itemId, callback) {
        BASKET.sendRequest({
            'ITEM_ID': itemId,
            'VXBASKET_DELETE': 'Y',
        }, function (response) {
            if (response.success) {
                BASKET.sync(response.basket);

                callback && typeof (callback) === "function" ? callback(response) : null;
            } else if ( ! response.message) {
                BASKET.alert(BX.message('ERROR_BASKET_UPDATE'))
            }
        });
    },

    /**
     * Reset BASKET data
     *
     * @param callback
     */
    reset: function (callback) {
        BASKET.sendRequest({
            'VXBASKET_RESET': 'Y',
        }, function (response) {
            if (response.success) {
                BASKET.sync(response.basket);

                callback && typeof (callback) === "function" ? callback(response) : null;
            } else if ( ! response.message) {
                BASKET.alert(BX.message('ERROR_BASKET_UPDATE'))
            }
        });
    },

    /**
     * Get basket data and update DOM
     *
     * @param instance
     * @param callback
     */
    sync: function (instance, callback) {
        if (instance) {
            this.instance = instance;
            this.updateDom();
            callback && typeof (callback) === "function" ? callback(response) : null;
        } else {
            BASKET.sendRequest({
                'VXBASKET_FETCH': 'Y',
            }, function (response) {
                BASKET.instance = response.basket;
                BASKET.updateDom();
                callback && typeof (callback) === "function" ? callback(response) : null;
            });
        }
    },

    /**
     * Updating DOM by BASKET data
     */
    updateDom: function () {
        document.querySelectorAll('[data-basket-total-quantity]').forEach(elem => elem.textContent = BASKET.formatNum(BASKET.getTotalQuantity(), 0, '', ' '));
        document.querySelectorAll('[data-basket-total-price]').forEach(elem => elem.textContent = BASKET.formatNum(BASKET.getTotalPrice(), 0, '', ' '));
        document.querySelectorAll('[data-basket-total-discount]').forEach(elem => elem.textContent = BASKET.formatNum(BASKET.getDiscountSum(), 0, '', ' '));
        document.querySelectorAll('[data-basket-total-price-dirty]').forEach(elem => elem.textContent = BASKET.formatNum(BASKET.getTotalPriceWithoutDiscount(), 0, '', ' '));
    },

    /**
     * Sending any request for BASKET
     *
     * @param data
     * @param callback
     */
    sendRequest: function (data, callback) {
        BX.ajax({
            url: location.href,
            data: data,
            method: 'POST',
            dataType: 'json',
            timeout: 30,
            async: true,
            scriptsRunFirst: true,
            emulateOnload: true,
            start: true,
            cache: false,
            onsuccess: function (response) {
                callback && typeof (callback) === "function" ? callback(response) : null;
            },
            onfailure: function () {
                // BASKET.alert(BX.message('ERROR'));
                console.error(BX.message('ERROR'));
            }
        });
    },

    /**
     * Custom bitrix popup alert
     *
     * @param message
     * @param callback
     */
    alert: function (message, callback) {
        const callbackExist = callback && typeof (callback) === "function";

        let alertPopUp = new BX.PopupWindow('vxPopup_Alert', window.body, {
            autoHide: !callbackExist,
            closeByEsc: !callbackExist,
            titleBar: false,
            minWidth: 320,
            offsetLeft: 0,
            lightShadow: true,
            closeIcon: false,
            padding: 15,
            overlay: {
                opacity: 90
            },
            buttons: [
                new BX.PopupWindowButton({
                    text: "OK",
                    className: "vxBtn",
                    events: {
                        click: function () {
                            this.popupWindow.destroy();
                            if (callbackExist) {
                                callback();
                            }
                        }
                    },
                })
            ]
        });
        alertPopUp.setAnimation('fading');
        alertPopUp.setContent(BX.create('div', {
            style: {
                'font-size': '16px',
                'padding': '10px 20px',
                'text-align': 'center',
            },
            html: message
        }));
        alertPopUp.show();
    },

    /**
     * Changing format of number
     *
     * @param number
     * @param decimals
     * @param dec_point
     * @param thousands_sep
     * @returns {string}
     */
    formatNum: function (number, decimals = 0, dec_point = '', thousands_sep = ' ') {
        let n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            toFixedFix = function (n, prec) {
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                let k = Math.pow(10, prec);
                return Math.round(n * k) / k;
            },
            s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    },
};