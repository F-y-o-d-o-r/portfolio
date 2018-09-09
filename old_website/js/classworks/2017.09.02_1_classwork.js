//1
document.write("1" + "<br>" + "<br>");
for (var i = 0; i < 5; i++) {
    document.write(i + "<br>");
}

//2
document.write("<hr>" + "2" + "<br>" + "<br>");
for (var i = 1; i <= 9; i++) {
    if (i % 2 == 0) continue;
    document.write(i + "<br>");
}

//3
document.write("<hr>" + "3" + "<br>" + "<br>");
function funcFor() {
    var text = "";
    var i;
    for (i = 0; i <= 3; i++) {
        text += "Выводится " + i + "-e число<br/>";
    }
    document.write(text);
}

//4
document.write("<hr>" + "4" + "<br>" + "<br>");
var a = 0;
while (a <= 9) {
    a++;
    if (a % 2 == 0) continue;
    document.write(a + "<br>");
}

//5
document.write("<hr>" + "5 (бесконечный цикл - отключен)" + "<br>" + "<br>");
/*while (1) {
 console.log("Hello");
 }*/

//6
document.write("<hr>" + "6" + "<br>" + "<br>");
var a = 0;
do {
    a++;
    if (a % 2 == 0) continue;
    document.write(a + "<br>");
}
while (a <= 9);

//7
document.write("<hr>" + "7" + "<br>" + "<br>");
var n = 10;
var s;

document.write("<table>");

for (i = 1; i <= n; i = i + 1) {
    document.write("<tr>");
    for (j = 1; j <= n; j = j + 1) {
        st = (i + j) % 2;
        if (st == 0) s = "class='r1'";
        else s = "class='r2'";
        document.write("<td " + s + "></td>");
    }
    document.write("</tr>");
}

document.write("</table>");

//8 Functions - beginning
document.write("<hr>" + "Функции 8" + "<br>" + "<br>");

function showMessage() {
    document.write("Hellow world!" + "<br>")
}

showMessage();
showMessage();

//9
document.write("<hr>" + "9" + "<br>" + "<br>");

function sayHello(name) {
    document.write("Hello " + name + "!<br>")
}

sayHello("Petya");
var n = "Mike";
sayHello(n);
sayHello();

//10
document.write("<hr>" + "10 - параметры по умолчанию2" + "<br>" + "<br>");
function sayHello(name) {
    name = name || "Guest";
    document.write("Hello, " + name + "!");
}
sayHello();

//11
document.write("<hr>" + "11" + "<br>" + "<br>");

sayHello("Петя");

function sayHello(name, sign) {
    name = name || "Guest";
    sign = sign || "…";

    document.write("Hello, " + name + sign);

}

sayHello("Вася", "!");


//12
document.write("<hr>" + "12" + "<br>" + "<br>")
function sum(n1, n2) {
    return n1 + n2;
    //Код, который здесь, уже не выполнится, после return выходим из функции
}

var res = sum(5, 3);

document.write(res + "<br>");
document.write(sum(2, 4) + "<br>");
document.write('5+6=' + sum(5, 6) + '<br />');
document.write('10+4=' + sum(10, 4) + '<br />');

//13
document.write("<hr>" + "13" + "<br>" + "<br>");

function newcolor(color) {
    alert("Вы выбрали " + color)
    document.bgColor = color
}

//14 ВСЕГДА ТЕКУЩЕЕ ЗНАЧЕНИЕ
document.write("<hr>" + "14" + "<br>" + "<br>");
var phrase = 'Привет';

function say(name) {
    document.write(phrase + ', ' + name + '<br>');
}

say('Вася');
// Привет, Вася

phrase = 'Пока';

say('Вася');
// Пока,Вася

//15
document.write("<hr>" + "15" + "<br>" + "<br>");

function sayHiBye(firstName, lastName) {
    document.writeln("Привет, " + getFullName());
    document.writeln("Пока, " + getFullName());
    function getFullName() {
        return firstName + " " + lastName;
    }

}

sayHiBye("Вася", "Пупкин");


// Привет, Вася Пупкин ; Пока, Вася Пупкин

//16
document.write("<hr>" + "16" + "<br>" + "<br>");

function plus(a) {
    a = a + 10;
    document.write('Вывод функции: ' + a + '<br />');
}

var a = 25;

document.write('Значение переменной до вызова функции: ' + a + '<br />');

// Вызовем функцию передав ей в качестве аргумента переменную a
plus(a);

document.write('Значение переменной после вызова функции: ' + a + '<br />');

//17
document.write("<hr>" + "17" + "<br>" + "<br>");

//Объявим глобальные переменные var1 и var2
var var1 = "var1 существует";
var var2;

function func1() {
    //Присвоим var2 значение внутри функции func1
    var var2 = "var2 существует";
}
//Из другой функции выведем содержимое переменной var1 и var2 на страницу
function func2() {
    //Выводим содержимое переменной var1
    document.write(var1 + '<br />');
    //Выводим содержимое переменной var2
    document.write(var2);
}
document.writeln(func2());

//18
document.write("<hr>" + "18" + "<br>" + "<br>");

function checkAge(age) {
    return (age > 18) ? true : confirm('Родители разрешили?');
}
checkAge(19);

//19
document.write("<hr>" + "19" + "<br>" + "<br>");

function checkAge2(age) {
    return (age > 18) || confirm('Родители разрешили?');
}

//checkAge2(15);

//20
document.write("<hr>" + "20" + "<br>" + "<br>");

function min(a, b) {
    return (a < b) ? a : b;
}
document.writeln(min(2, 5));
document.writeln(min(3, -1));
document.writeln(min(1, 1));
document.write("<hr>");
//21
/*
document.write("<hr>" + "21" + "<br>" + "<br>");

function pow(x, n) {
    var result = x;
    for (var i = 1; i < n; i++) {
        result = result * x;
    }
    return result;
}

var x = prompt("x?", "");
var n = prompt("n?", "");
var x = 3;

(n <= 1) ? alert('Степень ' + n + ' не поддерживается, введите целую степень, большую 1') : alert(pow(x, n));

document.writeln(pow(3, 2));
document.writeln(pow(3, 3));
document.writeln(pow(1, 100));*/
