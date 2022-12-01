'use strict';
((d, w) => {
    w.addEventListener('DOMContentLoaded', () => {

        const $elms = {
            calenderMonth: d.getElementsByClassName('calender--container__item--title'),
            reserveCalender: d.getElementsByClassName('js-reserve__calender')
        };

        const formatMonth = (i) => {
			const month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
            if (i > month.length - 1) {
                i = 0;
            }
			return month[i];
		};

        const formatYear = (monthIndex) => {
            const year = [];
            let date = new Date();
            for (let i = 0; i < 3; i++) {
                year.push(date.getFullYear() + i);
            }
            if (monthIndex > 11) {
                return year[1]
            } else {
                return year[0];
            }
        };

        let today = new Date();
		const currentMonthFirstDay = new Date(`${today.getFullYear()}-${formatMonth(today.getMonth())}-1`);
		const currentMonthLastDay = new Date(currentMonthFirstDay.getFullYear(), formatMonth(currentMonthFirstDay.getMonth()), 0);

		let nextMonth = new Date(`${formatYear(currentMonthFirstDay.getMonth() + 1)}-${formatMonth(currentMonthFirstDay.getMonth() + 1)}-1`);
		const nextMonthLastDay = new Date(nextMonth.getFullYear(), formatMonth(nextMonth.getMonth()), 0);

        $elms.calenderMonth[0].innerText = `${formatMonth(currentMonthFirstDay.getMonth())}月`;
        $elms.calenderMonth[1].innerText = `${formatMonth(nextMonth.getMonth())}月`;

        let forCurrent = 0;
        let currentDayIndex = [0, 0];
        for (let r = 0; r < 6; r++) {
            for (let c = 0; c < 7; c++) {
                const col = $elms.reserveCalender[0].children[r].children[c];
                if (currentMonthFirstDay.getDay() <= c && r === 0) {
                    forCurrent++;
                    if (today.getDate() === forCurrent) {
                        col.children[0].classList.add('calender__currentDay');
                        currentDayIndex = [r,c];
                    }
                } else if (r >= 1) {
                    if (forCurrent > currentMonthLastDay.getDate() - 1) {
                        continue;
                    } else {
                        forCurrent++;
                        if (today.getDate() === forCurrent) {
                            col.children[0].classList.add('calender__currentDay');
                            currentDayIndex = [r,c];
                        }
                    }
                } else {
                    continue;
                }
                col.children[0].addEventListener('mouseover', () => Array.from($elms.reserveCalender[0].children).forEach($row => Array.from($row.children).forEach($col => {if ($col.children[0]) $col.children[0].classList.remove('calender__currentDay')})));
                col.children[0].addEventListener('mouseout', () => Array.from($elms.reserveCalender[0].children).forEach(($row, r)=> Array.from($row.children).forEach(($col, c) => {if ($col.children[0] && r === currentDayIndex[0] && c === currentDayIndex[1]) $col.children[0].classList.add('calender__currentDay')})));
            }
        }




        const setCalender = (where, firstDay, lastDay) => {

            let dayCount = 0;

            for (let r = 0; r < 6; r++) {
                for (let c = 0; c < 7; c++) {
                    const col = where.children[r].children[c];
                    if (firstDay.getDay() <= c && r === 0) {
                        dayCount++;
                        col.children[0].innerText = dayCount;
                    } else if (r >= 1) {
                        if (dayCount > lastDay.getDate() - 1) {
                            col.innerHTML = '';
                        } else {
                            dayCount++;
                            col.children[0].innerText = dayCount;
                        }
                    } else {
                        col.innerHTML = '';
                    }
                }
            }

        };

        setCalender($elms.reserveCalender[0], currentMonthFirstDay, currentMonthLastDay);
        setCalender($elms.reserveCalender[1], nextMonth, nextMonthLastDay);


    });
})(document, window);