'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {

        let linkItem = [];
        Array.from(d.getElementsByClassName('menu__link-list--item')).forEach($elm => linkItem.push($elm.getElementsByClassName('btn')[0]));

        linkItem.forEach($elm => $elm.addEventListener('click', e => clickHandler(e)));

        const clickHandler = (e) => {

            e.preventDefault();

            const $target = e.currentTarget;
            const $targetElm = d.getElementById($target.href.slice($target.href.indexOf('#') + 1, $target.href.length));

            const rect = $targetElm.getBoundingClientRect().top;


            $targetElm.scrollIntoView({
                behavior: "smooth",
                block: "start",
                inline: "center"
            });

        };

    });
})(document, window);