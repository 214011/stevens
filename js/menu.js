'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {

        /**
         * 別ページからページ内リンクにアクセスしてきた時の処理（初期化）
         */
        const init = ((url) => {
            console.log(url);
            const fps = 60;

            const loop = () => {
                const loopId = setTimeout(() => requestAnimationFrame(loop), 1000 / fps);
                console.log(loopId)
                // if (loopId >= 15) {
                //     clearTimeout(loopId)
                // }
                w.scroll({
                    top: 0,
                    behavior: 'auto'
                });
            };
            requestAnimationFrame(loop);
        })(location.href);

        let linkItem = [];
        Array.from(d.getElementsByClassName('menu__link-list--item')).forEach($elm => linkItem.push($elm.getElementsByClassName('btn')[0]));

        linkItem.forEach($elm => $elm.addEventListener('click', e => clickHandler(e)));

        const clickHandler = (e) => {

            e.preventDefault();

            const $target = e.currentTarget;
            const $targetElm = d.getElementById($target.href.slice($target.href.indexOf('#') + 1, $target.href.length));

            const positionTop = $targetElm.getBoundingClientRect().top;

            w.scroll({
                top: positionTop - 150,
                behavior: 'smooth'
            })

        };

    });
})(document, window);