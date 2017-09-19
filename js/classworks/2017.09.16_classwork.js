//1
document.write("<hr>" + 1 + "<br>");

var ar = new Array(1.2, 3, 4);
document.write(ar + "<br>");
ar[0] = "19.11.13";
ar[1] = " вторник";
ar[2] = " " + 20;
ar[3] = " часов";
document.write(ar);

//2
document.write("<hr>" + 2 + "<br>");

var smartphoneColors = [];
smartphoneColors[0] = "Black";
smartphoneColors[1] = "White";
smartphoneColors[2] = "Grey";
smartphoneColors[3] = "Blue";

document.write("2й элемент = " + smartphoneColors[1] + "<br>");
document.write("4й элемент = " + smartphoneColors[3]);

//http://innerhtml.ru/

//3
document.write("<hr>" + 3 + "<br>");

var volumeHDDs = ["500Gb", "1Tb", "2Tb"];
var lengthArray = volumeHDDs.length;
document.write(lengthArray + "<br>");
document.write(volumeHDDs.length);

//4
document.write("<hr>" + 4 + "<br>");

var arr = [];
arr[1] = 5;
arr[999] = 6;
document.write(arr[0] + "<br>");
document.write(arr.length);

//5
document.write("<hr>" + 5 + "<br>");

var arr = [1, 2, 3, 4, 5];
arr.length = 2;
document.write(arr + "<br>");

arr.length = 5;
document.write(arr[3]);

//6 Получение последнего элемента массива
document.write("<hr>" + 6 + "_Получение последнего элемента массива<br>");

var x = [5, 10, 23, 12];
var lastValue = x[x.length - 1];
document.write(lastValue);

//7
document.write("<hr>" + 7 + "_перебор массива<br>");

var nameStudents = ["Petya", "Vasya", "Kolya", "Lyusya"];
for (var i = 0; i <= nameStudents.length - 1; i++) {
    document.write(i + 1 + " элемент масива = " + nameStudents[i] + "<br>");
}

//8 Цикл For in и массивы - homework
document.write("<hr>" + 8 + "_Цикл For in и массивы - homework<br>");

var arr1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
var arr2 = ["Chernigov", 2, "3", "Odessa", "Cheboksri", 5, "Irkytsk"];
var str = "";

for (var i in arr1) {
    for (var j in arr2) {
        if (arr1[i] == arr2[j]) {
            str += arr1[i] + ", ";
        }
    }
}
document.write(str);

//9 Копирование массива (link for one massive)
document.write("<hr>" + 9 + "_Копирование массива (link for one massive)<br>");

var arr = [1, 2, 3];
var arr2 = arr;
arr2[0] = 5;
document.write(arr[0]);
document.write(arr2[0]);

//9 Копирование массива (+)
document.write("<hr>" + 9.2 + "_Копирование массива (+)<br>");

var arr = [1, 2, 3];
var arr2 = [];
for (var i = 0; i < arr.length; i++) arr2[i] = arr[i];
arr2[0] = 5;
document.write(arr[0]);
document.write(arr2[0]);

//10 to look!
document.write("<hr>" + 10 + "_to look!<br>");

var ar = ['a', 'b', 'c', 'd', 'e'];
document.write(ar + "<br>");
var test = ar[0];
ar[0] = ar[4];
ar[4] = test;
var test = ar[1];
ar[1] = ar[3];
ar[3] = test;
document.write(ar);

var ar = [1, 2, 3, 4, 5];
document.writeln("<br>" + ar + "<br>");
var test = ar[0];
ar[0] = ar[4];
ar[4] = test;
test = ar[1];
ar[1] = ar[3];
ar[3] = test;
document.writeln(ar);

//10-2 to look!
document.write("<hr>" + 10.2 + "_to look!<br>");

var arr = [1, 2, 3, 4, 5];
var arr2 = [];
for (var i = 0; i < arr.length; i++) {
    arr2[i] = arr[arr.length - 1 - i];
}

document.write(arr + "<br>");
document.write(arr2);

//11 Поиск в массиве ?
document.write("<hr>" + 11 + "_Поиск в массиве. Создайте функцию find(arr, value), которая ищет в массиве arr значение value и возвращает его номер, если найдено, или -1, если не найдено.<a href='https://learn.javascript.ru/array#поиск-в-массиве'>поиск-в-массиве</a><br>");

var arr = ["test", 2, 1.5, 2, false];

function find(array, value) {
    for (var i = 0; i < array.length; i++) {
        if (array[i] == value) return x = i;
    }
    return -1;
}
document.write(find(arr, 2));

//продолжение

//12
document.write("<hr>pt2_" + 12 + "<br>");


var dr = new Date();
dn = dr.getDay();
var dayn = new Array("воскресенье", "понедельлник", "вторник", "среда", "четверг", "пятница", "суббота");
document.write(dayn[dn]);


//13
document.write("<hr>" + "num = (now.getSeconds()) % 10<br>");

var ch = [];

ch[0] = "1";
ch[1] = "2";
ch[2] = "3";
ch[3] = "4";
ch[4] = "5";
ch[5] = "6";
ch[6] = "7";
ch[7] = "8";
ch[8] = "9";
ch[9] = "10";

var num = 0;

function rand() {
    var now = new Date();
    num = (now.getSeconds()) % 10;
    alert("Подсказка: " + +(num + 1));
}

function ugaday() {
    rand()
    otv = ""
    while (ch[num] != otv) {
        otv = prompt("Угадай цифру: 1,2,3,4... до 10?");
        if (otv == ch[num]) {
            alert("Угадали")
        } else {
            alert("Нет, попробуйте еще раз");
            break;
        }
    }
}

//14
/*document.write("<hr>" + 14 + "<br>");*/

url = ["https://www.google.com.ua", "https://www.rambler.ru", "https://bing.com"];
function rand1() {
    var now = new Date();
    num1 = (now.getSeconds()) % 3;
    location.href = url[num1]
}

//15
/*document.write("<hr>" + 15 + "<br>");*/

