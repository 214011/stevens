'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {

        const $elms = {
            formTel: function (i) {return d.getElementsByClassName('js-contact-table__tel')[i]}
        };

        console.log($elms.formTel(0))

    });
})(document, window);