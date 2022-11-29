'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {


        /**
         * DOM要素を格納するオブジェクト
         * @type {{
         *      pagerItem:  HTMLCollectionOf<Element>,
         * }}
         */
        const $elms = {
            pagerItem: d.getElementsByClassName('blog__pager--link_item')
        };

        /**
         * @type {number} 現在の表示ページのインデックス番号
         */
        let currentPage = 0;

        // 表示ページのインデックス番号を探す
        for (let i = 0; i < $elms.pagerItem.length; i++) {
            if ($elms.pagerItem[i].children[0].classList.contains('__blog-current')) {
                currentPage = i;
                break;
            }
        }

        const array_$pagerItem = Array.from($elms.pagerItem);

        array_$pagerItem.forEach($elm => {
            $elm.addEventListener('mouseover', () => pagerMouseover());
            $elm.addEventListener('mouseout', () => pagerMouseout());
        });

        /**
         * ページャーをホバーした時の処理
         * @return {void} 返り値なし
         */
        const pagerMouseover = () => array_$pagerItem.forEach($elm => $elm.children[0].classList.remove('__blog-current'));

        /**
         * ページャーのホバーを抜けた時の処理
         * @return {void} 返り値なし
         */
        const pagerMouseout = () => $elms.pagerItem[currentPage].children[0].classList.add('__blog-current');


    });
})(document, window);