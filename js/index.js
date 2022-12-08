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
        let setPosition = 0;

        w.addEventListener('scroll', () => scrollHandler());

        const scrollHandler = () => {

            if (setPosition < document.documentElement.scrollTop) {
                if (w.scrollY >= (w.innerHeight * viewIndex) - (w.innerHeight / 3)) {
                    if (viewIndex < 6) {
                        if ($elms.contentArea(viewIndex)) $elms.contentArea(viewIndex).classList.add('content__area--is-active');
                        let className = d.body.classList[1];
                        d.body.classList.remove(className);
                        const newClass = className.replace(className[className.length - 1], viewIndex);
                        d.body.classList.add(newClass);
                        viewIndex++;
                    } else {
                        if (viewIndex === 6){
                            $elms.contentArea(viewIndex).classList.add('content__area--is-active');
                            let className = d.body.classList[1];
                            d.body.classList.remove(className);
                            const newClass = className.replace(className[className.length - 1], viewIndex);
                            d.body.classList.add(newClass);
                        }
                    }
                }
            } else {
                if (w.scrollY <= (w.innerHeight * viewIndex) + (w.innerHeight / 3)) {
                    if (viewIndex >= 2) {
                        let className = d.body.classList[1];
                        d.body.classList.remove(className);
                        const newClass = className.replace(className[className.length - 1], viewIndex);
                        d.body.classList.add(newClass);
                        viewIndex--;
                    } else {
                        if (viewIndex === 1) {
                            let className = d.body.classList[1];
                            d.body.classList.remove(className);
                            const newClass = className.replace(className[className.length - 1], viewIndex);
                            d.body.classList.add(newClass);
                            viewIndex = 2;
                        }
                    }
                }
            }

            setPosition = document.documentElement.scrollTop;

        };


    });
})(document, window);