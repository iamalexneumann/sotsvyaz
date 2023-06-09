document.addEventListener('DOMContentLoaded', function () {
    const navbarTogglerBtn = document.querySelector('.navbar-toggler');
    navbarTogglerBtn.addEventListener('click', navbarToggler);
});

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
        callbackModalTitle.forEach(element => element.innerHTML = callbackModalTitleVal);
        callbackFormBtn.forEach(element => element.textContent = callbackModalTitleVal);
        callbackFormBtn.forEach(element => element.value = callbackModalTitleVal);
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