'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {

        // 'content__area--is-active'

        /**
         * DOM要素を格納するオブジェクト
         */
        const $elms = {
            /**
             * @type {HTMLCollectionOf<Element>} トップページの画面の幅と高さの要素
             */
            indexContainer: d.getElementsByClassName('index__container'),
            /**
             * indexContainerが内包するcontent__areaを取得
             * @param {number} i 配列のインデックス
             * @return {Element}
             */
            contentArea: function (i) {return this.indexContainer[i].getElementsByClassName('content__area')[0]}
        };

        let viewIndex = 2;

        w.addEventListener('scroll', () => scrollHandler());

        const scrollHandler = () => {
            // console.log(w.scrollY)
            // console.log($elms.indexContainer[viewIndex].getBoundingClientRect().top)
            const $targetTop = $elms.indexContainer[viewIndex].getBoundingClientRect().top;
            if (w.scrollY >= (w.innerHeight * viewIndex) - (w.innerHeight / 3)) {
                if (viewIndex < 6) {
                    $elms.contentArea(viewIndex).classList.add('content__area--is-active');
                    console.log(viewIndex)
                    viewIndex++;
                } else {
                    if (viewIndex === 6) $elms.contentArea(viewIndex).classList.add('content__area--is-active');
                }
            }
        };
        console.log($elms.contentArea(2))


    });
})(document, window);