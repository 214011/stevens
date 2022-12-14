'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {



        /**
         * DOM要素を格納するオブジェクト
         * @type {{
         *      hamburgerTrigger:  HTMLElement,
         *      hamburgerHook: HTMLCollectionOf<Element>
         * }}
         */
        const $elms = {
            hamburgerTrigger: d.getElementById('js-hamburger__trigger'),
            hamburgerHook: d.getElementsByClassName('js-hamburger__hook')
        };

        /**
         * ハンバーガーメニューのコンテンツを開閉する関数
         * @param {MouseEvent} e addEventListenerのイベントオブジェクト
         * @returns {void} 返り値なし
         */
        const hamburger = (e) => {

            const $target = e.currentTarget;
            const $Array_elms = Array.from($elms.hamburgerHook);

            $target.classList.toggle('ham-is-active');
            $Array_elms.forEach($elm => $elm.classList.toggle('ham-is-active'));

        };

        // ハンバーガーメニューを起動
        $elms.hamburgerTrigger.addEventListener('click', (e) => hamburger(e));



    });
})(document, window);