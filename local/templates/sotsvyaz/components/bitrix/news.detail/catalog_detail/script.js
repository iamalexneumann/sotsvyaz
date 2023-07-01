BX.ready(function() {
    const catalogChars = document.querySelectorAll('.catalog-detail__characteristics .sp-text');

    catalogChars.forEach((charItem) => {
        if (charItem.offsetHeight > 500) {
            charItem.classList.add('sp-text_higest');

            const expandButton = document.createElement('button');
            expandButton.classList.add('btn', 'btn-sm', 'btn-outline-primary', 'mt-3', 'catalog-detail__chars-more-btn');
            expandButton.textContent = BX.message('MORE_BTN_TEXT');
            charItem.parentNode.insertBefore(expandButton, charItem.nextSibling);

            expandButton.addEventListener('click', () => {
                charItem.style.height = 'auto';
                charItem.classList.remove('sp-text_higest');
                charItem.parentNode.querySelector('.catalog-detail__chars-more-btn').remove();
            });
        }
    });
});