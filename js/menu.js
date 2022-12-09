'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {

        /**
         * URLのIDから要素を取得する関数
         * @param {string} url IDが含まれたURL（href属性）
         * @return {HTMLElement}
         */
        const getElementByUrlId = (url) => d.getElementById(url.slice(url.indexOf('#') + 1, url.length));

        /**
         * 別ページからページ内リンクにアクセスしてきた時の処理（初期化）
         * @param {string} url URLを取得
         * @return {void} 返り値なし
         */
        const init = (url) => {
            // もしurlに「 #(id) 」が含まれていたなら
            if (url.includes('#')) {

                /**
                 * アニメーションのループ関数
                 * @return {void} 返り値なし
                 */
                const loop = () => {

                    // アニメーション呼び出し＆IDを定数に格納
                    const loopId = requestAnimationFrame(loop);

                    // もしloopIdが1以上
                    if (loopId >= 1) {
                        // アニメーションループ停止
                        cancelAnimationFrame(loopId);

                        // URLにリクエストされたIDを要素として取得
                        const $urlElm = getElementByUrlId(url);
                        // 取得した要素の絶対位置を取得
                        const $positionTop = $urlElm.getBoundingClientRect().top;
                        // 要素より-150pxした位置にスクロールさせる処理
                        w.scroll(0, w.scrollY + $positionTop - 150);

                    } else {
                        // 上記以外はページのトップに固定
                        w.scroll(0, 0);
                    }

                };

                // 最初のアニメーション呼び出し
                requestAnimationFrame(loop);

            }
        };
        init(location.href);


        /**
         * ページ内リンクの要素を格納する配列を用意
         * @type {HTMLElement[]}
         */
        let $linkItem = [];

        // メインコンテンツのページ内リンクを取得＆$linkItemの配列に格納
        Array.from(d.getElementsByClassName('menu__link-list--item')).forEach($elm => $linkItem.push($elm.getElementsByClassName('btn')[0]));
        // フッターコンテンツのページ内リンクを取得＆$linkItemの配列に格納
        Array.from(d.getElementById('menu__link-list').getElementsByTagName('li')).forEach($elm => $linkItem.push($elm.children[0]));

        // 配列に格納されたページ内リンクの要素をまとめてクリックイベントを起動
        $linkItem.forEach($elm => $elm.addEventListener('click', e => clickHandler(e)));

        /**
         * ページ内リンクをクリックした時のイベントハンドラ
         * @param {MouseEvent} e クリックイベントのオブジェクト
         * @return {void} 返り値なし
         */
        const clickHandler = (e) => {

            // リンクのジャンプを止める
            e.preventDefault();

            // クリックイベントをまとめて起動しているのでクリックしているターゲットとなる要素を取得
            const $target = e.currentTarget;
            const $targetElm = getElementByUrlId($target.href);

            // init関数内で記述した同じ定数名だが変数のスコープ（影響範囲）が別ブロックのため宣言できできる
            const $positionTop = $targetElm.getBoundingClientRect().top;

            w.scroll({
                top: w.scrollY + $positionTop - 150,
                behavior: 'smooth'
            });

        };


        const $toTop = d.getElementById('js-toTop');

        $toTop.addEventListener('click', () => w.scroll({top: 0, behavior: 'smooth'}))


    });
})(document, window);