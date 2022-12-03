'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {

        const $elms = {
            contactTable__tel: d.getElementsByClassName('js-contact-table__tel')
        };

        // イベント起動
        Array.from($elms.contactTable__tel).forEach(($elm, i) => $elm.addEventListener('input', e => inputHandler(e, i)));

        /**
         * @type {string[]} 電話番号を格納＆管理する配列
         */
        let telNumber = ['', '', ''];

        /**
         * input要素に入力したイベントハンドラ
         * @param {InputEvent} e イベント引数
         * @param {number} i インデックス番号
         */
        const inputHandler = (e, i) => {

            const $target = e.target;
            const inputVal = e.data;
            const inputType = e.inputType;

            // telNumberに入った情報を入力していくので下の処理以外は基本的に入力させない
            $target.value = '';

            if (inputType === 'deleteContentBackward') {
                telNumber[i] = telNumber[i].slice(0, -1);
                $target.value = telNumber[i];
            } else {
                if (/[0-9]/.test(inputVal)) {
                    if (telNumber[i].length < 4) {
                        telNumber[i] += inputVal;
                        $target.value = telNumber[i];
                    } else {
                        $target.value = telNumber[i];
                    }
                } else {
                    $target.value = telNumber[i];
                }
            }

        };

    });
})(document, window);