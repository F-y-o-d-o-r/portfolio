/**
 * Created by pfyod on 19.08.2017.
 */
//homework1
alert("Задание 1." + "\n" + "Давай знакомиться.");
name = prompt("Введите свою фамилию", "Фамилия");
firstname = name;
name = prompt("Введите своё имя", "Имя");
secondname = name;
name = prompt("Введите своё отчество", "Отчество");
surname = name;
var answer = confirm("Вы : " + " " + firstname + " " + secondname + " " + surname + "?" + "\n" + "Всё верно?");
if (answer) alert("Молодец," + "\n" + firstname + " " + secondname + " " + surname)
else alert("Ошибка в данных!");

//homework2
alert("Задание 2." + "\n" + "Введите текущее время в часах и минутах.");
name = prompt("Введите количество часов", "XX");
hours = parseInt(name);
name = prompt("Введите количество минут", "XX");
minutes = parseInt(name);
if (minutes != 59)
    alert("Через минуту будет: " + hours + " часов " + (1 + minutes) + " минут");
else alert("Через минуту будет: " + (1 + hours) + " часов" + " 00 минут");


//homework3
alert("Задание 3." + "\n" + "Немного посчитаем.");
name = prompt("Введите первое число:", "XX");
pervoe = parseInt(name);
name = prompt("Введите второе число:", "XX");
vtoroe = parseInt(name);
name = prompt("Введите знак", "+, -, * или /");
if (name == "+") {
    alert(pervoe + vtoroe);
} else if (name == "-") {
    alert(pervoe - vtoroe);
}
else if (name == "*") {
    alert(pervoe * vtoroe);
}
else if (name == "/") {
    alert(pervoe / vtoroe);
} else if (name != "+", "-", "*", "/") {
    alert("Вы ввели неправильный знак! Обновите страницу!");
}
