/* global $ */

$(document).ready(function () {
  moment.locale('de'); // Set locale to German

  function updateClock() {
    const now = moment();
    const hours = now.format('HH');
    const minutes = now.format('mm');
    const seconds = now.format('ss');

    $('.time .hours').text(hours);
    $('.time .minutes').text(minutes);
    $('.time .seconds').text(seconds);

    const binaryHoursFirstDigit = parseInt(hours[0], 10).toString(2).padStart(2, '0');
    const binaryHoursSecondDigit = parseInt(hours[1], 10).toString(2).padStart(4, '0');
    const binaryMinutesFirstDigit = parseInt(minutes[0], 10).toString(2).padStart(4, '0');
    const binaryMinutesSecondDigit = parseInt(minutes[1], 10).toString(2).padStart(4, '0');
    const binarySecondsFirstDigit = parseInt(seconds[0], 10).toString(2).padStart(4, '0');
    const binarySecondsSecondDigit = parseInt(seconds[1], 10).toString(2).padStart(4, '0');
    //console.log(binaryHoursSecondDigit);

    updateBinaryClock('.hours .bit-5, .hours .bit-6', binaryHoursFirstDigit);
    updateBinaryClock('.hours .bit-1, .hours .bit-2, .hours .bit-3, .hours .bit-4', binaryHoursSecondDigit);

    updateBinaryClock('.minutes .bit-5, .minutes .bit-6, .minutes .bit-7, .minutes .bit-8', binaryMinutesFirstDigit);
    updateBinaryClock('.minutes .bit-1, .minutes .bit-2, .minutes .bit-3, .minutes .bit-4', binaryMinutesSecondDigit);

    updateBinaryClock('.seconds .bit-5, .seconds .bit-6, .seconds .bit-7, .seconds .bit-8', binarySecondsFirstDigit);
    updateBinaryClock('.seconds .bit-1, .seconds .bit-2, .seconds .bit-3, .seconds .bit-4', binarySecondsSecondDigit);

    const date = now.format('dddd, D MMMM YYYY');
    $('.date .day .number').text(now.format('DD'));
    $('.date .day .name').text(now.format('dd'));
    $('.date .month .number').text(now.format('MM'));
    $('.date .month .name').text(now.format('MMM'));
    $('.date .year .number').text(now.format('YYYY'));

    updateWorldTimes();
  }

  function updateBinaryClock(selector, binaryString) {
    $(selector).each(function (index) {
      if (binaryString[index] === '1') {
        $(this).addClass('filled');
      } else {
        $(this).removeClass('filled');
      }
    });
  }

  /*
   * moment.js and moment-timezone are used to get the current time in different timezones
   * https://github.com/moment/moment-timezone
   */
  function updateWorldTimes() {
    const cities = [
      { name: 'London', timezone: 'Europe/London' },
      { name: 'New-York', timezone: 'America/New_York' },
      { name: 'Tokyo', timezone: 'Asia/Tokyo' }
    ];

    cities.forEach(city => {
      const cityTime = moment.tz(city.timezone);
      const timeString = cityTime.format('HH:mm [Uhr]');
      const dateString = cityTime.format('DD MMMM');
      $(`.world-times-list .${city.name.toLowerCase()}.time`).text(timeString);
      $(`.world-times-list .${city.name.toLowerCase()}.date`).text(dateString);
    });
  }

  function updateGreeting() {
    const now = moment();
    const hour = now.hour();
    let greeting;

    if (hour < 12) {
      greeting = "Guten Morgen";
    } else if (hour < 18) {
      greeting = "Guten Tag";
    } else {
      greeting = "Guten Abend";
    }

    $('h1').text(greeting);
  }

  updateGreeting();
  setInterval(updateGreeting, 60000); // Update every minute

  updateClock();
  setInterval(updateClock, 1000);
});
