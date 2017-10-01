/**
 * Created by pfyod on 28.09.2017.
 */

//1. Создать элемент с текстом и кнопкой вручную. Создать джаваскрипт, который при клике на кнопку заставляет текст исчезнуть (не удаляет). При этом кнопка становится выше и/или шире.Можно использовать метод style выбранного элемента для изменения стилей.

function hide() {
    var paragraph;
    document.getElementsByTagName("p")[0].style.display = 'none';
    document.getElementsByTagName("button")[0].innerHTML = 'Текст спрятан';
}

//2. При нажатии кнопки отобразить на кнопке дату и время.

var date = new Date();

function nowTimeIs() {
    document.getElementsByTagName("button")[1].innerHTML = 'Cейчас ровно ' + date.getHours() + ':' + date.getMinutes() + '. Сегодня ' + date.getFullYear() + "." + date.getMonth() + "." + date.getDate() + "." + " Хорошего дня!";
}

//3. Создать вручную форму из нескольких текстовых полей, при помещении курсора на которые поле выделяется синим бордюром и подписывается снизу или сбоку описанием поля

//???? как сделать через цикл без выбора отдельлного элемента ???
/*var x = document.getElementsByClassName('input1')[i];
 var y = document.getElementsByClassName('input1').onfocus;
 function test() {
 for (var i = 0; i < x.length; i++) {
 if (x[i] == y) {
 console.log(1)
 } else console.log(2);
 }
 }*/


//вариант через цикл
/*var f = document.getElementsByClassName('input1');
xxx = function fff() {
    for (var i = 0; i < f.length; i++) {
        if (f[i].onfocus != true) {
            f[i].onfocus.style.border = 'solid red 2px'
        } else f[i].style.border = 'solid grey 2px'
    }
}*/

/*var f = document.getElementsByClassName('input1');

 for (var i = 0; i < f.length; i++) {
 if (f[i].onfocus != true) {
 f[i].onfocus = func;
 } else if (f[i].onblur == true){
 f[i] = func1;
 } else alert(1);
 }
 function func() {
 this.style.border = '2px solid blue';
 }

 function func1() {
 this.style.border = '2px solid grey';
 }*/

//DOM Level 2 вариант

/*document.myform.addEventListener('focus', test1, true);

 function test1() {
 this.input.style.border = '2px solid blue';
 }*/

//3 вариант 1
ddd.onfocus = function () {
    this.style.border = '2px solid blue';
    document.getElementsByTagName('label')[0].style.display = 'block';
}

ddd.onblur = function () {
    this.style.border = '1px solid grey';
    document.getElementsByTagName('label')[0].style.display = 'none';
}

ddd1.onfocus = function () {
    this.style.border = '2px solid blue';
    document.getElementsByTagName('label')[1].style.display = 'block';
}

ddd1.onblur = function () {
    this.style.border = '1px solid grey';
    document.getElementsByTagName('label')[1].style.display = 'none';
}
ddd2.onfocus = function () {
    this.style.border = '2px solid blue';
    document.getElementsByTagName('label')[2].style.display = 'block';
}

ddd2.onblur = function () {
    this.style.border = '1px solid grey';
    document.getElementsByTagName('label')[2].style.display = 'none';
}