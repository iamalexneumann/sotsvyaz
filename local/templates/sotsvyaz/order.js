const minusBtns = document.querySelectorAll('.quantity__btn_minus');
const plusBtns = document.querySelectorAll('.quantity__btn_plus');
const quantityFields = document.querySelectorAll('.quantity__field');

function handleMinusClick(event) {
    const quantityField = event.target.nextElementSibling;
    let currentValue = parseInt(quantityField.value);

    if (currentValue > 1) {
        quantityField.value = currentValue - 1;
    }
}

function handlePlusClick(event) {
    const quantityField = event.target.previousElementSibling;
    let currentValue = parseInt(quantityField.value);

    if (currentValue < 1000) {
        quantityField.value = currentValue + 1;
    }
}

function handleQuantityInput(event) {
    const quantityField = event.target;

    if (quantityField.value === '') {
        quantityField.value = '1';
    } else {
        let parsedValue = parseInt(quantityField.value);

        if (isNaN(parsedValue) || parsedValue <= 0) {
            quantityField.value = '1';
        } else if (parsedValue > 1000) {
            quantityField.value = '1000';
        } else {
            quantityField.value = parsedValue;
        }
    }
}

minusBtns.forEach((minusBtn) => {
    minusBtn.addEventListener('click', handleMinusClick);
});

plusBtns.forEach((plusBtn) => {
    plusBtn.addEventListener('click', handlePlusClick);
});

quantityFields.forEach((quantityField) => {
    quantityField.addEventListener('input', handleQuantityInput);
});

const cartModal = new bootstrap.Modal('#cartModal');
const orderButtons = document.querySelectorAll('#order-btn');

orderButtons.forEach(orderButton => {
    orderButton.addEventListener('click', (event) => {
        event.preventDefault();
        const productId = orderButton.dataset.productId;
        const productQuantity = orderButton.parentElement.querySelector('.quantity__field').value;

        BASKET.add(productId, productQuantity, {ok: ''}, () => cartModal.show());
    });
});