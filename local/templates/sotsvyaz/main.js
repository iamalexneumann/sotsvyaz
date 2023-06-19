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