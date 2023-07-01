BX.ready(function() {
    const catalogItems = document.querySelectorAll('.catalog-item__products .products-list');
    catalogItems.forEach((catalogItem) => {
        if (catalogItem.offsetHeight > 150) {
            const parent = catalogItem.closest('.catalog-item__products');

            catalogItem.classList.add('products-list_higest');

            const expandButton = document.createElement('button');
            expandButton.classList.add('btn', 'products__more-btn');
            expandButton.textContent = BX.message('MORE_BTN_TEXT');
            parent.appendChild(expandButton);

            expandButton.addEventListener('click', () => {
                catalogItem.style.height = 'auto';
                catalogItem.classList.remove('products-list_higest');
                parent.querySelector('.products__more-btn').remove();
            });
        }
    });
});