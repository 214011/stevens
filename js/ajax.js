/**
 * AJAX（AsynchronousJAvascripXml）通信をするクラス
 */
class Ajax {

    //

    // プライベートプロパティを宣言
    /**
     * @type {XMLHttpRequest} Ajax通信をするためのインスタンス(オブジェクト)を生成
     */
    #XHR = new XMLHttpRequest();

    /**
     * @type {string} HTTPリクエストのタイプ
     */
    #method = '';

    /**
     * @type {string} HTTPリクエストを飛ばしたいURL
     */
    #reqURL = '';

    /**
     * @type {string} Ajax通信に成功した結果のレスポンスの文字列
     */
    #response = '';

    /**
     * @type {string} Ajax通信に失敗した結果のレスポンスの文字列
     */
    #errorResponse = '';

    #contentType;

    #sendData

    /**
     * @type {number} 指定した秒数後にレスポンスを受け取る(1000 = 1秒)
     */
    #timeout;


    /**
     * Ajaxオブジェクトのコンストラクター
     * @param {{
     * methodType: 'GET' | 'POST',
     * url: string,
     * dataType: 'arraybuffer' | 'blob' | 'document' | 'json' | 'text',
     * contentType: 'application/x-www-form-urlencoded' | 'multipart/form-data' | 'application/json',
     * sendData: {},
     * timeout: number
     * }} reqObj Ajax通信を行うための情報
     */
    constructor (reqObj) {

        this.#method = reqObj.methodType;
        this.#reqURL = reqObj.url;

        if (reqObj.contentType) {
            this.#contentType = reqObj.contentType
        } else {
            this.#contentType = 'application/x-www-form-urlencoded';
        }

        if (reqObj.sendData) {
            this.#sendData = reqObj.sendData;
        } else {
            this.#sendData =  null;
        }

        this.#timeout = reqObj.timeout | 0;



        if ( this.#XHR.readyState === 0 ) {

            this.#XHR.open(this.#method, this.#reqURL, true, null, null);

            if ( this.#XHR.readyState === 1 ) {

                this.#XHR.setRequestHeader('Content-Type', this.#contentType);
                this.#XHR.responseType = reqObj.dataType;

                this.#XHR.send(this.#sendData);

                let httpRes = new Promise((resolve,reject) => setTimeout( () => {

                    if ( this.#XHR.readyState === 4 && this.#XHR.status === 200 ) {


                        resolve(this.#XHR.response);

                    } else {

                        reject(this.#XHR.response);

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
     * @param {(response: string) => any} callback ユーザ定義のコールバック関数
     * @returns {this} Ajaxオブジェクトを返す
     */
    done = (callback) => {
        setTimeout(() => callback(this.#response), this.#timeout);
        return this;
    }

    /**
     * Ajax通信に失敗した時の処理
     * @param {(errorResponse: string) => any} callback ユーザ定義のコールバック関数
     * @returns {this} Ajaxオブジェクトを返す
     */
    fail = (callback) => {
        setTimeout(() => {callback(this.#errorResponse)}, this.#timeout);
        return this;
    }

}