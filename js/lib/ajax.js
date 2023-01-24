/**
 * @author Junpei Nomura
 * @version v.1.0.0α
 * 試作段階
 */

/**
 * AJAX（AsynchronousJAvascripXml）通信をするクラス
 */
export default class Ajax {

    // プライベートプロパティを宣言
    /**
     * @type {XMLHttpRequest} Ajax通信をするためのインスタンス(オブジェクト)を生成
     */
    #XHR = new XMLHttpRequest();

    /**
     * @type {string} HTTPリクエストのタイプ
     */
    #method = 'GET';

    /**
     * @type {string} HTTPリクエストを飛ばしたいURL
     */
    #reqURL = '';

    /**
     * @type {string} レスポンスのデータタイプを指定
     */
    #resDataType = 'text';

    /**
     * @type {string} Ajax通信に成功した結果のレスポンスの文字列
     */
    #response = '';

    /**
     * @type {string} Ajax通信に失敗した結果のレスポンスの文字列
     */
    #errorResponse;

    /**
     * @type {string} HTTPリクエストのコンテンツタイプ
     */
    #contentType = 'application/x-www-form-urlencoded';

    /**
     * @type {Object | Array | string | number} メソッドがPOSTだった場合に送信するデータ
     */
    #sendData = null;

    /**
     * @type {boolean} 非同期通信の場合はtrue同期通信の場合はfalse
     */
    #async = true;

    /**
     * @type {string | null} 認証が必要なHTTPリクエストを送信する場合のユーザ名を指定します。
     */
    #username = null;

    /**
     * @type {string | null} 認証が必要なHTTPリクエストを送信する場合のパスワードを指定します。
     */
    #password = null;

    /**
     * @type {number} 指定した秒数後にレスポンスを受け取る(1000 = 1秒)
     */
    #timeout = 0;

    /**
     * Ajaxオブジェクトのコンストラクター
     * @param {{
     * methodType:
     *      'GET'
     *      | 'POST'
     *      | 'HEAD'
     *      | 'PUT'
     *      | 'DELETE'
     *      | 'CONNECT'
     *      | 'OPTIONS'
     *      | 'TRACE'
     *      | 'PATCH',
     * url: string,
     * resDataType: 'arraybuffer' | 'blob' | 'document' | 'json' | 'text',
     * reqContentType:
     *      'application/x-www-form-urlencoded'
     *      | 'multipart/form-data'
     *      | 'text/plain'
     *      | 'text/csv'
     *      | 'text/html'
     *      | 'text/css'
     *      | 'text/javascript'
     *      | 'application/octet-stream'
     *      | 'application/json'
     *      | 'application/pdf'
     *      | 'application/vnd.ms-excel'
     *      | 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
     *      | 'application/vnd.ms-powerpoint'
     *      | 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
     *      | 'application/msword'
     *      | 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
     *      | 'image/jpeg'
     *      | 'image/png'
     *      | 'image/gif'
     *      | 'image/bmp'
     *      | 'image/x-ms-bmp'
     *      | 'image/svg+xml'
     *      | 'application/zip'
     *      | 'application/x-lzh'
     *      | 'application/x-tar'
     *      | 'audio/mpeg'
     *      | 'video/mp4'
     *      | 'video/mpeg',
     * sendData: {} | [] | string | number,
     * async: boolean,
     * username: string,
     * password: string,
     * timeout: number
     * }} reqObj Ajax通信を行うための情報
     */
    constructor (reqObj) {

        if (typeof reqObj.methodType === 'undefined') {
            console.error(new Error('There is not MethodType in property of reqObj.'));
        } else {
            this.#method = reqObj.methodType;
        }

        if (typeof reqObj.url === 'undefined') {
            console.error(new Error('There is not url in property of reqObj.'));
        } else {
            this.#reqURL = reqObj.url;
        }

        if (typeof reqObj.resDataType !== 'undefined') {
            this.#resDataType = reqObj.resDataType;
        } else {
            this.#resDataType = 'text';
        }

        if (typeof reqObj.reqContentType !== 'undefined') {
            this.#contentType = reqObj.reqContentType
        } else {
            this.#contentType = 'application/x-www-form-urlencoded';
        }

        if (typeof reqObj.sendData === 'object' || typeof reqObj.sendData === 'string' ||  typeof reqObj.sendData === 'number') {
            this.#sendData = reqObj.sendData;
        } else {
            this.#sendData =  null;
        }

        if (typeof reqObj.async !== 'undefined') {
            this.#async = reqObj.async;
        } else {
            this.#async = true;
        }

        if (typeof reqObj.username !== 'undefined') {
            this.#username = reqObj.username;
        } else {
            this.#username = null;
        }

        if (typeof reqObj.password !== 'undefined') {
            this.#password = reqObj.password;
        } else {
            this.#password = null;
        }

        this.#timeout = reqObj.timeout | 0;




        if ( this.#XHR.readyState === 0 ) {

            this.#XHR.open(this.#method, this.#reqURL, this.#async, this.#username, this.#password);

            if ( this.#XHR.readyState === 1 ) {

                if (this.#method === 'POST' || this.#method === 'post') {
                    this.#XHR.setRequestHeader('Content-Type', `${this.#contentType}; charset=UTF-8`);
                }

                this.#XHR.responseType = this.#resDataType;

                // console.log(`readyState:${this.#XHR.readyState}`);
                // レスポンスボディを飛ばす
                if (typeof this.#sendData === 'object'  && this.#contentType === 'application/json') {
                    this.#sendData = JSON.stringify(this.#sendData);
                    this.#XHR.send(this.#sendData);
                } else {
                    this.#XHR.send(this.#sendData);
                }

                let httpRes = new Promise((resolve,reject) => setTimeout( () => {

                    if (this.#XHR.readyState === 4 && this.#XHR.status === 200) {

                        resolve(this.#XHR.response);

                    } else {

                        reject(this.#XHR);

                    }

                },this.#timeout)).then((res) => {

                    this.#response = res;

                }).catch((error) => {

                    this.#errorResponse = error;

                });

            }

        }



    }

    /**
     * Ajax通信に成功した時の処理
     * @param {(response: string) => void} callback ユーザ定義のコールバック関数
     * @returns {this} Ajaxオブジェクトを返す
     */
    done = (callback) => {
        setTimeout(() => {
            if (this.#response !== '') callback(this.#response);
        },this.#timeout);
        return this;
    }

    /**
     * Ajax通信に失敗した時の処理
     * @param {(errorResponse: string) => void} callback ユーザ定義のコールバック関数
     * @returns {this} Ajaxオブジェクトを返す
     */
    fail = (callback) => {
        setTimeout(() => {
            if (typeof this.#errorResponse !== 'undefined') {
                if (this.#errorResponse !== '') {
                    callback(this.#errorResponse);
                }
            }
        },this.#timeout);
        return this;
    }

}