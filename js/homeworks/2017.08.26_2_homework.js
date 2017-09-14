/**
 * Created by pfyod on 24.08.2017.
 */
//homework 1
alert("Задание 1 \nТернаная операция");
 var date = new Date();
 var ask = prompt("Привет! \nСколько лет тебе исполняется или иcполнилось в этом году?", "1 - 157");
 var yearsOld = date.getFullYear() - ask;
 (ask > 3) ? alert("Ты родился в " + yearsOld + " году") : alert("Ты слишком мал, иди поспи. \nТы родился в " + yearsOld + " году");


//homework 2
alert("Задание 2\nВариант 1/2\nSwith + тернарный оператор");
var date = new Date();
var year = prompt("В каком году ты родился?", "XXXX");
var m = prompt("В каком месяце ты родился?", "1-12");
m = +m;
switch (m) {
    case 1:
        month = 0;
        break;
    case 2:
        month = 1;
        break;
    case 3:
        month = 2;
        break;
    case 4:
        month = 3;
        break;
    case 5:
        month = 4;
        break;
    case 6:
        month = 5;
        break;
    case 7:
        month = 6;
        break;
    case 8:
        month = 7;
        break;
    case 9:
        month = 8;
        break;
    case 10:
        month = 9;
        break;
    case 11:
        month = 10;
        break;
    case 12:
        month = 11;
        break;
    default:
        alert("Введите месяц");
}

var day = prompt("Какого числа ты родился?", "1-31");
var user_date = new Date(year, month, day);
var data = date.getFullYear() - user_date.getFullYear();//posle dr
var data2 = data - 1;//do dr

((user_date.getMonth() == date.getMonth()) && (user_date.getDate() == date.getDate())) ? alert("С днём рождения!") :
    (date.setFullYear(1972) < user_date.setFullYear(1972)) ? alert("Тебе исполнилось " + data2 + " лет") :
    alert("Тебе исполнилось " + data + " лет");

 //вариант 2
 alert("Задание 2\nВариант 2/2\nТернарный оператор");
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

 (m == mpo1 && x == mp) ? alert("С днём рождения!") :
 (m < mpo1) ? alert("Вам " + a + " лет") :
 (m == mpo1 && x < mp) ? alert("Вам " + a + " лет") :
 (m == mpo1 && x > mp) ? alert("Вам " + b + " лет") :
 (m > mpo) ? alert("Вам " + b + " лет") : alert("Что-то пошло не по плану...");