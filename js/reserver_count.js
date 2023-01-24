'use strict';
import Ajax from '/stevens/js/lib/ajax.js';
((d) => {

    const $reserverElms = d.querySelectorAll('[data-js-ajax]');
    let sendData = [];
    $reserverElms.forEach($elm => sendData.push($elm.dataset.jsAjax));

    const connect = () => new Ajax ({
        methodType: 'POST',
        url: '/stevens/page/reserve/ajax_get_reserver.php',
        resDataType: 'json',
        reqContentType: 'application/json',
        sendData: sendData,
        timeout: 1000
    }).done(data => {
        data.forEach((reserver, i) => $reserverElms[i].innerText = reserver)
    }).fail(data => {
        if (data) {
            console.log(data);
        }
    });
    connect();
    setInterval(connect, 1000);

})(document);


