/**
 * Created by pfyod on 24.08.2017.
 */
//homework 1
alert("Задание 1");
var date = new Date();
var ask = prompt("Привет! \nСколько лет тебе исполняется или иcполнилось в этом году?", "1 - 157");
var yearsOld = date.getFullYear() - ask;
alert("Ты родился в " + yearsOld + " году");


//homework 2
alert("Задание 2 \nВариант 1/3");
var date = new Date();
var year = prompt("В каком году ты родился?", "XXXX");
var m = prompt("В каком месяце ты родился?", "январь или 1");

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

var day = prompt("Какого числа ты родился?", "1-31");
var user_date = new Date(year, month, day);
var data = date.getFullYear() - user_date.getFullYear();//posle dr
var data2 = data - 1;//do dr

if ((user_date.getMonth() == date.getMonth()) && (user_date.getDate() == date.getDate())) {
    alert("С днём рождения!");
}
else if (date.setFullYear(1972) < user_date.setFullYear(1972)) {
    alert("Тебе исполнилось " + data2 + " лет");
}
else {
    alert("Тебе исполнилось " + data + " лет");
}

/*document.write(date.setFullYear(1972) + "<br>");
 document.write(user_date.setFullYear(1972));*/

//Вариант 2 без др упрощённый с вопросом
alert("Задание 2 \nВариант 2/3 (упрощённый)");
var date = new Date();
var year = prompt("В каком году ты родился?", "XXXX");
/*var m = prompt("В каком месяце ты родился?", "январь или 1");
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
 var day = prompt("Какого числа ты родился?", "1-31");*/
var user_date = new Date(year);
var data = date.getFullYear() - user_date.getFullYear();//posle dr
var data2 = data - 1;//do dr
var yet = confirm("У тебя уже был день рождения в этом году?");

if (yet == true) {
    alert("Тебе исполнилось " + data + " лет");
}
else {
    alert("Тебе исполнилось " + data2 + " лет");
}

//вариант 3
alert("Задание 2 \nВариант 3/3");
var str = prompt("Введите год вашего рождения:", "4 цифры");
y = parseInt(str);
var str = prompt("Введите месяц вашего рождения:", "цифры");
m = parseInt(str);
var str = prompt("Введите день вашего рождения:", "цифры");
x = parseInt(str);

var now = new Date();
var mp = now.getDate();
var mpo = now.getMonth();
var mpo1 = mpo + 1;

a = now.getFullYear() - y;
b = a - 1;

if (m == mpo1 && x == mp) alert("С днём рождения!");
if (m < mpo1) alert("Вам " + a + " лет");
if (m == mpo1 && x < mp) alert("Вам " + a + " лет");
if (m == mpo1 && x > mp) alert("Вам " + b + " лет");
if (m > mpo) alert("Вам " + b + " лет");

/*
 //Вариант 3 Яна
 alert("Задание 2 \nВариант 3");
 var str = prompt("Введите день вашего рождения");
 x = parseInt(str);
 var str = prompt("Введите месяц вашего рождения");
 m = parseInt(str);
 var str = prompt("Введите год вашего рождения");
 y = parseInt(str);

 a = 2017 - y;
 b = a - 1;

 var now = new Date();
 var mp = now.getDate();
 var mpo = now.getMonth();
 var mpo1 = mpo + 1;

 if (m == mpo1 && x == mp) alert("Happy berthday!");
 if (m < mpo1 && a!== 1 && a!== 2 && a!== 3) alert("Вам " + a + " лет");
 if (m == mpo1 && x < mp && a!==1 && a!==2 && a!==3) alert("Вам " + a + " лет");
 if (m == mpo1 && x > mp && a!==1 && a!==2 && a!==3) alert("Вам " + b + " лет");
 if (m > mpo && a!==1 && a!==2 && a!==3) alert("Вам " + b + " лет");
 if (a == 1)alert("Вам " + a + " год");
 if (a == 2)alert("Вам " + a + " года");
 if (a == 3)alert("Вам " + a + " года");*/

//Вариант 4 Вячеслав (не рабочий)
/*alert("Задание 2 \nВариант 4 (не рабочий)");
 var str = prompt("Введите день вашего рождения", "0");
 x = parseInt(str);
 var str = prompt("Введите месяц вашего рождения", "0");
 y = parseInt(str);
 var str = prompt("Введите год вашего рождения", "0");
 z = parseInt(str);

 var dateBorn = new Date();
 var mBorn = dateBorn.getMonth();
 var mBorn1 = mBorn + 1;

 if ((mBorn1 - y) >= 0 && (dateBorn.getDate() - x) > 0) {
 alert("Ваш возраст " + (dateBorn.getFullYear() - z));
 }   else if ((mBorn1 - y) == 0 && (dateBorn.getDate() - x) == 0) {
 alert("С днём рождения!");
 }   else {
 alert("Ваш возраст " + (dateBorn.getFullYear() - z - 1));
 }*/
