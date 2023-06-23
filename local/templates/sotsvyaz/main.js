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