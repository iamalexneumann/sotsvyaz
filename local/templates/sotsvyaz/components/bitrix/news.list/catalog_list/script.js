function incrementValue(event) {
    event.preventDefault();
    let fieldName = event.target.getAttribute('data-field');
    let parent = event.target.closest('div');
    let inputField = parent.querySelector('input[name="' + fieldName + '"]');
    let currentVal = parseInt(inputField.value, 10);

    if (!isNaN(currentVal)) {
        if (currentVal < 1000) {
            inputField.value = currentVal + 1;
        } else {
            inputField.value = 1000;
        }
    } else {
        inputField.value = 1;
    }
}

function decrementValue(event) {
    event.preventDefault();
    let fieldName = event.target.getAttribute('data-field');
    let parent = event.target.closest('div');
    let inputField = parent.querySelector('input[name="' + fieldName + '"]');
    let currentVal = parseInt(inputField.value, 10);

    if (!isNaN(currentVal) && currentVal > 1) {
        inputField.value = currentVal - 1;
    } else {
        inputField.value = 1;
    }
}

document.querySelectorAll('.quantity').forEach(function(group) {
    let inputField = group.querySelector('input[name="quantity"]');

    inputField.addEventListener('keypress', function(event) {
        if (event.key < '0' || event.key > '9') {
            event.preventDefault();
        }
    });

    inputField.addEventListener('paste', function(event) {
        let clipboardData = event.clipboardData.getData('text/plain');

        if (!/^\d+$/.test(clipboardData)) {
            event.preventDefault();
        }
    });

    inputField.addEventListener('drop', function(event) {
        let draggedText = event.dataTransfer.getData('text');

        if (!/^\d+$/.test(draggedText)) {
            event.preventDefault();
        }
    });

    group.addEventListener('click', function(event) {
        if (event.target.classList.contains('quantity__btn_plus')) {
            incrementValue(event);
        } else if (event.target.classList.contains('quantity__btn_minus')) {
            decrementValue(event);
        }
    });
});


let orderButtons = document.querySelectorAll('.catalog-item__btn-order');

orderButtons.forEach(orderButton => {
    orderButton.addEventListener('click', (event) => {
        event.preventDefault();

        let productId = orderButton.dataset.productId;
        let productQuanity = orderButton.parentNode.querySelector('.quantity__field').value;

        BASKET.add(productId, productQuanity, {ok: ''}, () => {
            let cartModal = new bootstrap.Modal('#cartModal');
            cartModal.show();
        });
    });
});