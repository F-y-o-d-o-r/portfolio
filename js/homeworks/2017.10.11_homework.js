/**
 * Created by fyodor on 12.10.2017. fyodor.work@gmail.com
 */

// Написать JavaScript программы для создания длинных списков.
// Создадим кнопку 1 и ol
var ol = document.createElement('ol');
var button = document.createElement('button');
button.innerHTML = 'Ввести ещё данных <br> (теги работают)';
button.className = 'button';

// добавим элементы на страницу
// 1 variant:
// document.body.insertAdjacentElement('afterBegin', ol);
// 2 variant:
document.body.insertBefore(button, document.body.firstChild);
document.body.insertBefore(ol, document.body.lastElementChild);

//создадим и добавим вторую кнопку другим способом
document.body.firstElementChild.insertAdjacentHTML('afterEnd', '<button>Ввести ещё данных <br> (теги выводятся как текст)</button>');

//создадим и добавим третью кнопку
document.body.getElementsByTagName('button')[1].insertAdjacentHTML('afterEnd', '<button>Ввести ещё данных  <br>(определенное количество, теги работают)</button>');

//1я кнопка
function list() {
    var x = prompt("Что добавить в список", 'Вставьте числа или слова или теги');
    if (!x) {
        alert('Вы ничего не ввели!!!');
        return;
    } else if (x) {
        document.body.querySelector('ol').insertAdjacentHTML('beforeEnd', '<li>' + x + '</li>');
        list();
    }
};

//2я кнопка
function list2() {
    var y = prompt("Что добавить в список", 'Вставьте числа или слова или теги');

    if (!y) {
        alert('Вы ничего не ввели!!!');
        return;
    } else if (y) {
        var li = document.createElement('li');
        li.textContent = y;
        document.body.querySelector('ol').appendChild(li);
        list2();
    }
};

//3я кнопка
function list3() {
    var z = prompt("Что добавить в список", 'Вставьте числа или слова или теги');
    var count = +prompt("Сколько раз?", 'Вставьте число!');
    var plusOrNot = confirm("Добавить счётчик?");
    var result = "";

    if (!z) {
        alert('Вы ничего не ввели!!!');
        return;
    } else if (isNaN(count)) {
        alert('Вы ввели не число!!!')
    } else if (z && plusOrNot === true) {
        for (var i = 1; i <= count; i++) { //сразу в документ добавляется (может быть дольше)
            document.body.querySelector('ol').insertAdjacentHTML('beforeEnd', '<li>' + z + " " + i + '</li>');
        }
    } else if (z) { //сначала пишется в резалт потом в документ добавляется
        for (var i = 0; i < count; i++) {
            result += '<li>' + z + '</li>';
        }
        document.body.querySelector('ol').insertAdjacentHTML('beforeEnd', result);
    }
};

//вешаем функции на кнопки
document.body.getElementsByTagName('button')[0].onclick = list;
document.body.getElementsByTagName('button')[1].onclick = list2;
document.body.getElementsByTagName('button')[2].onclick = list3;