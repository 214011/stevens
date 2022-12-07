'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {

        /**
         * 別ページからページ内リンクにアクセスしてきた時の処理（初期化）
         */
        const init = ((url) => {
            if (url.includes('#')) {

                const loop = () => {

                    const loopId = requestAnimationFrame(loop);

                    if (loopId >= 1) {
                        const $targetElm = d.getElementById(url.slice(url.indexOf('#') + 1, url.length));
                        const positionTop = $targetElm.getBoundingClientRect().top;
                        w.scroll(0, w.scrollY + positionTop - 150);
                        cancelAnimationFrame(loopId);
                    } else {
                        w.scroll(0, 0);
                    }

                };

                requestAnimationFrame(loop);

            }
        })(location.href);



        let linkItem = [];
        Array.from(d.getElementsByClassName('menu__link-list--item')).forEach($elm => linkItem.push($elm.getElementsByClassName('btn')[0]));
        Array.from(d.getElementById('menu__link-list').getElementsByTagName('li')).forEach($elm => linkItem.push($elm.children[0]));

        linkItem.forEach($elm => $elm.addEventListener('click', e => clickHandler(e)));

        const clickHandler = (e) => {

            e.preventDefault();

            const $target = e.currentTarget;
            const $targetElm = d.getElementById($target.href.slice($target.href.indexOf('#') + 1, $target.href.length));

            const positionTop = $targetElm.getBoundingClientRect().top;

            w.scroll({
                top: w.scrollY + positionTop - 150,
                behavior: 'smooth'
            })

        };

    });
})(document, window);