((d) => {
    window.addEventListener('DOMContentLoaded', () => {


        /**
         * @type {
         *      {
         *          hamburgerTrigger: HTMLElement,
         *          hamburgerHook: HTMLCollection,
         *      }
         * }
         * 取得するDOM要素の格納オブジェクト
         */
        const $elms = {
            hamburgerTrigger: d.getElementById('js-hamburger__trigger'),
            hamburgerHook: d.getElementsByClassName('js-hamburger__hook')
        };


        $elms.hamburgerTrigger.addEventListener('click', (e) => {
            Array.from($elms.hamburgerHook).forEach($elm => $elm.classList.toggle('ham-is-active'))
        });


    });
})(document);