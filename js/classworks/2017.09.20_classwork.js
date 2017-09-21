/**
 * Created by pfyod on 19.09.2017.
 */

//1

var namePlanets = ["Венера", "Меркурий", "Земля", "Марс",];

namePlanets.push("Юпитер");
document.writeln("<hr>" + "Количество элементов в массиве: " + namePlanets.length + "<br>");

for (var i = 0; i <= namePlanets.length - 1; i++) {
    document.writeln(i + " элемент массива = " + namePlanets[i] + "<br>");
}

//2 slice

var namePlanets = ["Венера", "Меркурий", "Земля", "Марс"];

namePlanets = namePlanets.slice(2, 3);
document.writeln("<hr>" + "Количество элементов в массиве: " + namePlanets.length + "<br>");

for (var i = 0; i <= namePlanets.length - 1; i++) {
    document.writeln(i + " элемент массива = " + namePlanets[i] + "<br>" + "<hr>");
}

//3 splice del

var arr = ["Я", "изучаю", "JavaScript"];

arr.splice(1, 1);

document.writeln(arr + "<hr>"); //Я,JavaScript

//4 splice change

var arr = ["Я", "сейчас", "изучаю", "JavaScript"];
var arr2 = "ручка";
var arr3 = [1, 2, 3, 4]

arr.splice(1, 2, arr2, arr3);//Я,ручка,1,2,3,4,JavaScript

document.writeln(arr + "<hr>"); //Я,JavaScript

//5 splice cut вырезая из массива образуется массив

var arr = ["Я", "сейчас", "изучаю", "JavaScript"];

var removed = arr.splice(0, 2);

document.writeln(removed + "<hr>");//массив

//6 reverse

var arr = ["Я", "изучаю", "JavaScript"];

document.writeln(arr);

arr.reverse();

document.writeln("<br>" + arr + "<hr>");

//7 sort

var namePlanets = ["Венера", "Меркурий", "я", "Земля", "Марс", 10, 11];

document.writeln(namePlanets + "<br>");

namePlanets.sort();

document.writeln(namePlanets + "<br>");


var namePlanets = [5, 8, 7, 6, -4, 2, 3, 1, 4, 10, 11, "b"];

document.writeln(namePlanets + "<br>");

namePlanets.sort();

document.writeln(namePlanets + "<hr>");

//8 Object

var flag;

var human = {
    name: "Dmitriy",
    job: "Designer",
    age: 26
}

//метод
human.go = function () {
    document.write(this.name + " go.<br/>");
    var a = true;
    return a;
}

human.sit = function () {
    document.write(this.name + " sit.<br/>");
    var a = true;
}

human.think = function () {
    if (flag == true)
        document.write(this.name + "start thinking <br>");
    else
        document.write(this.name + "cant start thinking ")
}

human.go();