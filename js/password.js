'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {

        const $elms = {
            form: d.getElementById('js-form'),
            inPswd: d.getElementById('form-password'),
            re_inPswd: d.getElementById('form-re_password')
        };

        let pswd = {
            origin:'',
            re: ''
        }

        $elms.inPswd.addEventListener('change', e => pswd.origin =  e.target.value);
        $elms.re_inPswd.addEventListener('change', e => pswd.re =  e.target.value);

        $elms.form.addEventListener('submit', e => submitHandler(e));

        /**
         * フォーム送信時の処理
         * @param {Event} e フォーム送信イベントのオブジェクト
         * @return {void}
         */
        const submitHandler = e => {
            if (pswd.origin !== pswd.re) {
                e.preventDefault();
                alert('パスワードが一致しません。');
            }
        };

    });
})(document, window);