/**
 * Created by pfyod on 19.09.2017.
 */

//1. Создайте массив из 1000 элементов. Первые 100 элементов =0, вторая сотня =2 ….последняя сотня =9.

document.writeln("<b>" + "Создайте массив из 1000 элементов. Первые 100 элементов =0, вторая сотня =2 ….последняя сотня =9." + "</b>");
var mass = new Array(1000);
document.writeln("<p>")
for (var i = 0; i <= 99; i++) {
    mass[i] = 0;
}

for (var i = 100; i <= 199; i++) {
    mass[i] = 2;
}

for (var i = 200; i <= 299; i++) {
    mass[i] = 3;
}

for (var i = 300; i <= 399; i++) {
    mass[i] = 3;
}

for (var i = 400; i <= 499; i++) {
    mass[i] = 4;
}

for (var i = 500; i <= 599; i++) {
    mass[i] = 5;
}

for (var i = 600; i <= 699; i++) {
    mass[i] = 6;
}

for (var i = 700; i <= 799; i++) {
    mass[i] = 7;
}

for (var i = 800; i <= 899; i++) {
    mass[i] = 8;
}

for (var i = 899; i <= 999; i++) {
    mass[i] = 9;
}


for (var i = 0; i < mass.length; i++) {
    document.writeln(mass[i])
}
document.writeln("</p> <hr>")
document.writeln("<br>")

//2. Создайте функцию, которая сравнивает два массива на предмет отсутствия одинаковых значений.

document.writeln("<b>" + "Создайте функцию, которая сравнивает два массива на предмет отсутствия одинаковых значений." + "</b>" + "<br>");
var mass1 = ["Сентябрь", "Октябрь", "Ноябрь", 11, 12, 13];
var mass2 = ["Пушкин", "Лермонтов", "Октябрь", 125, "Муровей", 11];
var mass3 = [];

/*var mass1 = [1, 3, 2];
 var mass2 = [5, 4, 3];*/
var answer = "";
var answer2 = "";
var answer3 = "";


//одинаковые значения
function same() {
    for (var i = 0; i < mass1.length; ++i) {
        for (var j = 0; j < mass2.length; ++j) {
            if (mass1[i] == mass2[j]) {
                answer += mass1[i] + " ,";
            }
        }
    }
    alert("Одинаковые значения в двух массивах: " + "\n" + answer);
}

document.writeln("<b>" + "Массив 1: " + "</b>" + mass1 + "<br>");
document.writeln("<b>" + "Массив 2: " + "</b>" + mass2 + "<br>");

//2 - разные значения - вариант 1

function diff() {
    var mass1 = ["Сентябрь", "Октябрь", "Ноябрь", 11, 12, 13];
    var mass2 = ["Пушкин", "Лермонтов", "Октябрь", 125, "Муровей", 11];
    for (var i = 0; i < mass1.length; ++i) {
        for (var j = 0; j < mass2.length; ++j) {
            if (mass1[i] == mass2[j]) {
                delete mass1[i];
                delete mass2[j];
            }
        }
    }
    mass3 = mass1 + "," + mass2;
    alert("Разные значения в двух масивах: " + "\n" + mass3)
}

//2 - разные значения - вариант 2

function diff2() {
    for (var i = 0; i < mass1.length; ++i) {
        for (var j = 0; j < mass2.length; ++j) {
            if (mass1[i] != mass2[j]) {
                answer3 += mass1[i] + " не равен " + mass2[j] + "<br>"
            } else answer3 += mass1[i] + "<b>" + " равен " + "</b>" + mass2[j] + "<br>"
        }
    }
    document.body.innerHTML += answer3;
}