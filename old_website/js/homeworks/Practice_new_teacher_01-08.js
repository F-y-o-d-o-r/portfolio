/**
 * Created by fyodor on 15.10.2017. fyodor.work@.gmail.com
 */

//1. Назначить переменные
var numb = 5;
var num2 = 6;
var sum;
var str = 'string';
//Присвоить переменным значения (числовые и текстовые)
//Вычислить длину текстовых, вывести длину каждого
console.log(str.length);
//Сложить числовые – вывести общую сумм
console.log(sum = numb + num2);
//Перевести числовые в текст – вывести все одной строкой через запятую
console.log("" + numb + num2);
console.log(String(numb) + num2);
//Написать функцию деления любого числа на 3, добавления к результату слова «метров».
function delenie(x) {
    return (x / 3) + ' метров'
};
var x = delenie(15);
console.log(x);
//Вывести через функцию результат по каждому числовому значению

//2
//1. Вычисления площади треугольника
//в зависимости от длины стороны а.
//    Результат вывести на страницу.
function ploschadTreugolnika(a) {
    var s;
    return s = ((a * a) * Math.sqrt(3)) / 4;
}
console.log(ploschadTreugolnika(4));
//2. Вывести на страницу рисунок,
//    аналогичный представленному справа.
//    От начального количества до 1 и снова
//до начального.
var n = 4;
for (var i = 1; i <= 4; i++, n--) {
    for (var j = 1; j <= n; j++) {
        //document.write('x')
        document.body.insertAdjacentHTML('beforeEnd', 'x')
    }
    //document.write('<br>');
    document.body.insertAdjacentHTML('beforeEnd', '<br>')
}
n = 1;
for (var i = 1; i <= 3; i++, n++) {
    for (var j = 0; j <= n; j++) {
        //document.write('x')
        document.body.insertAdjacentHTML('beforeEnd', 'x')
    }
    //document.write('<br>');
    document.body.insertAdjacentHTML('beforeEnd', '<br>')
}
//3. Создать выпадающий список с числами от 1 до 31 и список <ol> с названиями месяцев из массива. Предварительно создать массив с названиями месяцев и использовать его.
var month = ['сентябрь', 'октябрь', 'ноябрь', 'декабрь', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август'];
//document.write('<select>');
var zzz = '';
for (var i = 1; i <= 31; i++) {
    zzz += '<option>' + i + '</option>';
    //document.write('<option>' + i + '</option>')
}
//document.write('</select>');
document.body.insertAdjacentHTML('beforeEnd', '<select>' + zzz + '</select>');
//document.write('<ol>');
var y = '';
for (var i = 0; i <= month.length-1; i++) {
    //document.write('<li>' + month[i] + '</li>');
    y += '<li>' + month[i] + '</li>';
}
//document.write('</ol>');
document.body.insertAdjacentHTML('beforeEnd', '<ol>' + y + '</ol>');

//4
//1. Пройти по числам от заданного до 10. При прохож-дении чисел 2, 4 или 6 выдать число словом. При про-хождении числа 2 прекратить прохождение дальше. Если числа не встретились, выдать "работа окончена".
var mm = [7,4,2,7,4,9,0,1,10,6];
for (var i = 0; i < mm.length; i++) {
    if (mm[i] === 2) {
        console.log('два');
        //break;
    } else if  (mm[i] === 4) {
        console.log('четыре');
    } else if  (mm[i] === 6) {
        console.log('шесть');
    }
} console.log('работа окончена');
//2. Создать массив с числовыми значениями. Значком * выдать значения ячеек массива. Количество линий по количеству ячеек массива.
//*********
//****
//*******************
//**************************
//***************
var mass = [1,4,6,3];
var g = '';
for(var i = 0; i < mass.length; i++) {
    for(var j = 0; j < mass[i]; j++){
        g += '*'
    }g +='<br>';
}
document.body.insertAdjacentHTML('beforeEnd', g);
//document.write(g);
//3. Создать объект с набором свойств. Собрать свой-ства в массив и выдать названия и значения на экран.
var ob = {
    'one':'ones',
    'two':'twos',
    'three':'threes'
};
var mass = [];
for (var key in ob) {
    mass.push(key);
}
var w = '';
for (var i = 0; i < mass.length; i++){
    w += mass[i] + ' - ' + ob[mass[i]] + '<br>';
}
document.body.insertAdjacentHTML('beforeEnd', w);

//5
//1. Вычисления суммы чисел массива, деленных на первое число массива. В случае, если первое число 0 – выдать вместо результата текст ошибки: «результат – бесконечность». Если еще и сумма равна 0 – выдать: «результат – не число».
//2. Создать объект с 10-ю свойствами, заполненными значениями. Перебрать все свойства и выдать только те, что заполнены числом 0.
//3. Создать массив количеством введенного пользователем значения. Заполнить массив значениями по номеру ячейки, умноженному на 2 плюс 1. Числа, заканчивающиеся на 3 увеличить на 1. Узнать последнюю цифру числа можно переведя число в строку.

//6
//1. Функция заполнения объекта oneYear свойства-ми-месяцами (January, February, March…) со значениями – номерами месяца. Названия месяцев брать из массива. Подсказка: oneYear[mon[i]]
//2. Функция вывода на страницу N <div> блоков шириной i*50 пикселей с чередующимся желтым/синим фоном. В каждый блок вставить надпись «Ширина = » i*50.
//3. Функция, имеющая встроенную функцию вычисления площади круга, вычисляющая площади N кругов радиусом i*40. Добавить функцию вычисления площади квадрата для N квадратов, присвоить ее переменной и вывести результат обеих функций.


//7
//1. При помощи цикла for выведите чётные числа от 1 до 20. Подсказка: чётность проверяется по остатку при делении на 2, используя оператор «деление с остатком» %.
//2. Цикл, который предлагает prompt ввести число, большее 100. Если посетитель ввёл другое число – попросить ввести ещё раз, и так далее.
//    Цикл должен спрашивать число пока либо посетитель не введёт число, большее 100, либо не нажмёт кнопку Cancel (ESC).
//3. Создать форму с несколькими элементами текстовых полей и чекбоксов и кнопкой. Скриптом заполнить пустые поля, отметить все чекбоксы, исправить надпись на кнопке «Отправить».
//4. Создать форму с полями (заполнеными), селектами, чекбоксом и кнопкой. Скриптом добавить несколько пунктов в селект, установить у селекта возможность множественного выбора, отметить все опции через одну (1,3,5…). Сменить имя элемента select, и кнопки. Добавить к содержимому текстовых полей в конце надпись «в Украине». Изменить тип элемента с чекбокса на радиокнопку.
//5. Создать скрипт проверки скорости вычисления квадрата числа через метод Math.sqr и умножения числа на самого себя. Выяснить на множественном примере, какой из способов быстрее. На сколько.


//8
//1. При помощи цикла for выведите чётные числа от 1 до 20. Подсказка: чётность проверяется по остатку при делении на 2, используя оператор «деление с остатком» %.
//2. Цикл, который предлагает prompt ввести число, большее 100. Если посетитель ввёл другое число – попросить ввести ещё раз, и так далее.
//    Цикл должен спрашивать число пока либо посетитель не введёт число, большее 100, либо не нажмёт кнопку Cancel (ESC).