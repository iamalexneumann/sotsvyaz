BX.ready(function() {
    new ShowMore('.seo-text_top', {
        config: {
            type: 'text',
            limit: 256,
            element: 'div',
            more: BX.message('FOOTER_SHOW_MORE_MORE_BTN'),
            less: BX.message('FOOTER_SHOW_MORE_LESS_BTN'),
            btnClass: 'show-more-btn',
        }
    });

    new ShowMore('.seo-text_bottom', {
        config: {
            type: 'text',
            limit: 1024,
            element: 'div',
            more: BX.message('FOOTER_SHOW_MORE_MORE_BTN'),
            less: BX.message('FOOTER_SHOW_MORE_LESS_BTN'),
            btnClass: 'show-more-btn',
        }
    });

    const navbarTogglerBtn = document.querySelector('.navbar-toggler');
    navbarTogglerBtn.addEventListener('click', navbarToggler);

    function navbarToggler() {
        const navbarTogglerIcon = document.querySelector('.navbar-toggler__icon .fa-solid');

        if (navbarTogglerIcon.classList.contains('fa-bars')) {
            navbarTogglerIcon.classList.remove('fa-bars');
            navbarTogglerIcon.classList.add('fa-xmark');
        } else {
            navbarTogglerIcon.classList.remove('fa-xmark');
            navbarTogglerIcon.classList.add('fa-bars');
        }
    }

    const callbackModal = document.querySelector('#callbackModal');
    if (callbackModal) {
        callbackModal.addEventListener('show.bs.modal', function (event) {
            const callbackModalButton = event.relatedTarget
            const callbackModalTitleVal = callbackModalButton.getAttribute('data-bs-modal-title');
            const callbackModalTitle = callbackModal.querySelectorAll('.modal-title');
            const callbackFormBtn = callbackModal.querySelectorAll('.btn');
            const callbackFormChekboxText = callbackModal.querySelectorAll('.form-check-label span');
            callbackModalTitle.forEach(element => element.innerHTML = callbackModalTitleVal);
            callbackFormBtn.forEach(element => element.value = callbackModalTitleVal);
            callbackFormChekboxText.forEach(element => element.textContent = callbackModalTitleVal);
        })
    }

    function trackScroll() {
        const scrolled = window.pageYOffset;
        const coords = document.documentElement.clientHeight;

        if (scrolled > coords) {
            goTopBtn.style.opacity = '1';
        }
        if (scrolled < coords) {
            goTopBtn.style.opacity = '0';
        }
    }

    function backToTop(evt) {
        evt.preventDefault();
        window.scroll(0, 0);
    }

    const goTopBtn = document.querySelector('.to-top-btn');

    window.addEventListener('scroll', trackScroll);
    goTopBtn.addEventListener('click', backToTop);
});