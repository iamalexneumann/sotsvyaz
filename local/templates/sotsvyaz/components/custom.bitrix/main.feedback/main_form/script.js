BX.ready(function () {
    const arrInputsTel = document.querySelectorAll('input[type=tel]');

    arrInputsTel.forEach(input => {
        Inputmask({
            'mask': '9 (999) 999-99-99',
        }).mask(input);
    })

    const modalForms = document.querySelectorAll('.main-form');

    modalForms.forEach(function(modalForm) {
        modalForm.addEventListener('submit', function(event) {
            ym(94079335, 'reachGoal', 'callback');
        });
    });
});