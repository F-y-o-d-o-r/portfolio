/**
 * Created by pfyod on 24.08.2017.
 */
var today = new Date();
var god = today.getFullYear();
var day = today.getDay();
alert(today);
alert(day);

var dr = new Date(1958, 4, 21)//номер дня недели для  даты 21 мая 1958 года.
dr = dr.getDay();
alert(dr);

//скрипт отмечает точную дату и время вашего прибытия на страницу
Now = new Date();
var mp1 = Now.getMonth() + 1; //добавляем к месяцу + 1 для правильного отображения
document.write("<font color='#d2691e'>Today is " + Now.getDate() + " - " + mp1 + "." + "<br>" + "You are here from: " + Now.getHours() + ":" + Now.getMinutes() + ":" + Now.getSeconds());

//пример строкового вывода дня недели на основе введенных пользователем: года, месяца и числа.
alert("Вычислим какой сегодня день недели на основании введённой даты")
var year = prompt("Какой сейчас год?", "XXXX");
var m = prompt("Какой сейчас месяц?", "май или 5");
if (m == "январь" || m == "1" || m == "января") month = 0;
if (m == "февраль" || m == "2" || m == "февраля") month = 1;
if (m == "март" || m == "3" || m == "марта") month = 2;
if (m == "апрель" || m == "4" || m == "апреля") month = 3;
if (m == "май" || m == "5" || m == "мая") month = 4;
if (m == "июнь" || m == "6" || m == "июня") month = 5;
if (m == "июль" || m == "7" || m == "июля") month = 6;
if (m == "август" || m == "8" || m == "августа") month = 7;
if (m == "сентябрь" || m == "9" || m == "сентября") month = 8;
if (m == "октябрь" || m == "10" || m == "октября") month = 9;
if (m == "ноябрь" || m == "11" || m == "ноября") month = 10;
if (m == "декабрь" || m == "12" || m == "декабря") month = 11;
var day = prompt("Какоe сейчас число?", "1-31");
var dr = new Date(year, month, day);
dn = dr.getDay();
if (dn == 0) {
    alert("Воскресенье");
}
if (dn == 1) {
    alert("Понедельник");
}
if (dn == 2) {
    alert("Вторник");
}
if (dn == 3) {
    alert("Среда");
}
if (dn == 4) {
    alert("Четверг");
}
if (dn == 5) {
    alert("Пятница");
}
if (dn == 6) {
    alert("Суббота");
}

//часы, минуты, секунды
var date = new Date();
document.write(date.getFullYear() + "<br>" + date.getHours() + "." + date.getMinutes() + "." + date.getSeconds() + "<br>");
var my_date = new Date(1981, 10, 24);
document.write("<br>" + my_date.getFullYear() + "<br>" + my_date.getHours() + "." + my_date.getMinutes() + "." + my_date.getSeconds() + "<br>");

//getTime() Возвращает количество миллисекунд, которые прошли с полночи 1 Января 1970 года до заданной в объекте даты
var date = new Date();
document.write(date.getTime() + "<br>"); //до текущей секунды
var date = new Date(1981, 10, 24);
document.write(date.getTime()); //до 24.10.81

//setFullYear()
var date = new Date();
document.write(date + "<br />");
date.setFullYear(1981);
document.write(date + "<br />");
date.setFullYear(1981, 11, 11);
document.write(date + "<br />");

//setMonth()
var date = new Date();
document.write(date + "<br />");
date.setMonth(3);
document.write(date + "<br />");
date.setMonth(3, 28); //месяц и дата
document.write(date + "<br />");

//setDate
var date = new Date();
date.setDate(32), date.setHours(12), date.setMinutes(12), date.setSeconds(12);
document.write(date);
date.setHours(11, 11, 11, 111);

