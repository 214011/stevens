'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {

        const $elms = {
            reserveCalender: d.getElementsByClassName('js-reserve__calender'),
            calenderItem: d.getElementsByClassName('js-reserve__calender--item')
        };

        const formatMonth = (i) => {
			const month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
            if (i > month.length - 1) {
                i = 0;
            }
			return month[i];
		};

        let today = new Date();
		let currentM_f = new Date(`${today.getFullYear()}-${formatMonth(today.getMonth())}-1`);

        let dayCount = 0;
        let todayIndex = [0, 0];
        // r=row（行）, c=column（列）
        for (let r = 0; r < 6; r++) {
            for (let c = 0; c < 7; c++) {
                if (r === 0 && c >= currentM_f.getDay()) {
                    dayCount++;
                } else if (dayCount < today.getDate()) {
                    dayCount++;
                    todayIndex = [r, c];
                }
            }
        }


        const CLASS_CURRENT = 'calender__currentDay';

        const calender = $elms.reserveCalender[0];
        const todayCell = calender.children[todayIndex[0]].children[todayIndex[1]].children[0];

        const addCurrentClass = ($elm) => $elm.classList.add(CLASS_CURRENT);
        const init = () => Array.from($elms.calenderItem).forEach($elm => $elm.classList.remove(CLASS_CURRENT));

        addCurrentClass(todayCell);

        const MOUSE_EVENT = ['mouseover', 'mouseout'];

        for (let i = 0; i < $elms.calenderItem.length; i++) {
            MOUSE_EVENT.forEach(eName => $elms.calenderItem[i].addEventListener(eName, e =>  isHover(eName, e)));
        }

        const isHover = (eName, e) => {
            if (eName === MOUSE_EVENT[0]) {
                const $target = e.currentTarget;
                init();
                addCurrentClass($target);
            } else {
                init();
                addCurrentClass(todayCell);
            }
        };

    });
})(document, window);