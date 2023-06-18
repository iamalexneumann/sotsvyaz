document.addEventListener('DOMContentLoaded', function () {
    const arrInputsTel = document.querySelectorAll('input[type=tel]');

    arrInputsTel.forEach(input => {
        Inputmask({
            'mask': '9 (999) 999-99-99',
        }).mask(input);
    })
});