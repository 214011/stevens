'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {


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


        // スクロールイベントを起動
        w.addEventListener('scroll', () => scrollHandler());


        /**
         * バックグラウンド画像をスクロール範囲によって変更する関数
         * @param {number} i viewIndexの数値
         * @return {void} 返り値なし
         */
        const bgChange = (i) => {
            let className = d.body.classList[1];
            d.body.classList.remove(className);
            const newClass = className.replace(className[className.length - 1], i);
            d.body.classList.add(newClass);
        };

        /**
         * @type {number} バックグラウンド画像を動的に変更するための変数（数値）
         */
        let viewIndex = 2;

        /**
         * @type {number} スクロールが上にされているか下にされているかを判定するための変数
         */
        let setPosition = 0;

        /**
         * スクロールイベントのイベントハンドラ
         * @return {void} 返り値なし
         */
        const scrollHandler = () => {

            if (setPosition < document.documentElement.scrollTop) {
                if (w.scrollY >= (w.innerHeight * viewIndex) - (w.innerHeight / 3)) {
                    if (viewIndex < 6) {
                        if ($elms.contentArea(viewIndex)) $elms.contentArea(viewIndex).classList.add('content__area--is-active');
                        bgChange(viewIndex);
                        viewIndex++;
                    } else {
                        if (viewIndex === 6){
                            $elms.contentArea(viewIndex).classList.add('content__area--is-active');
                            bgChange(viewIndex);
                        }
                    }
                }
            } else {
                if (w.scrollY <= (w.innerHeight * viewIndex) + (w.innerHeight / 3)) {
                    if (viewIndex >= 2) {
                        bgChange(viewIndex);
                        viewIndex--;
                    } else {
                        if (viewIndex === 1) {
                            bgChange(viewIndex);
                        }
                    }
                }
            }

            setPosition = document.documentElement.scrollTop;

        };


    });
})(document, window);