/**
 * Created by fyodor popov on 13.11.2017. fyodor.work@gmail.com
 */

//Условия :
// 1.Начальная таблица (элементы table, tr, td) присутствует на странице. 2.Количество строк = количеству столбцов. 3.Отсутствуют любые id (начальные стили можете оформить селектором td в секции style элемента head). 4.Их число  - значения не имеет (!!!т.е., алгоритм должен работать при добавке новой tr (но с соблюдением условия п.2 - количество строк = количеству столбцов (т.е., при такой добавке добавьте еще по одной td в каждую из строк))). 5.При загрузке страницы (или при вызове соответствующей функции) «диагональ» должна получать отличительный фоновый цвет. 6.Алгоритм необходимо реализовать на основе getElements-модели.

//добавить кнопку выхова функции
var button = document.createElement('button');
button.className = 'button';
button.setAttribute('onclick', 'funcAdd()');
button.innerText = 'Добавить строки (диагональ слева направо)';
document.body.insertBefore(button, null);
//формируем таблицу по запросу
var tb = document.getElementById('tb');
var x = 1;//считаем число для вывода в ячейку
function funcAdd() {
    var lines = +prompt('Вы хотите добавить колличество строк?', '5');
    if (lines) {
        tb.innerHTML = '';
        for (var i = 0; i < lines; i++) {
            var tr = document.createElement('tr');
            x = 1;//считаем число для вывода в ячейку
            for (var j = 0; j < lines; j++) {
                var td = document.createElement('td');
                td.innerText = String(i + 1) + x;//считаем число для вывода в ячейку
                tr.appendChild(td);
                ++x;//считаем число для вывода в ячейку
                if (i === j) {//считаем желтую ячейку диагонали
                    td.style.backgroundColor = 'gold';
                }
            }
            document.getElementById('tb').appendChild(tr);
        }
    } else alert("Приходите ещё")
}

//2.Условия те же, но направление диагонали обратное :
//добавить кнопку выхова функции
var button = document.createElement('button');
button.className = 'button';
button.setAttribute('onclick', 'funcAddBack()');
button.innerText = 'Добавить строки (диагональ справа налево)';
document.body.insertBefore(button, null);
//формируем таблицу по запросу
var x = 1;//считаем число для вывода в ячейку
var z;//считаем желтую ячейку диагонали
function funcAddBack() {
    var lines = +prompt('Вы хотите добавить колличество строк?', '5');
    if (lines) {
        tb.innerHTML = '';
        z = lines;//считаем желтую ячейку диагонали
        for (var i = 0; i < lines; i++) {
            var tr = document.createElement('tr');
            x = 1;//считаем число для вывода в ячейку
            for (var j = 0; j < lines; j++) {
                var td = document.createElement('td');
                td.innerText = String(i + 1) + x;//считаем число для вывода в ячейку
                if (j + 1 === z) {//считаем желтую ячейку диагонали
                    td.style.backgroundColor = 'gold';
                }
                tr.appendChild(td);
                ++x;//считаем число для вывода в ячейку
            }
            document.getElementById('tb').appendChild(tr);
            --z;//считаем желтую ячейку диагонали
        }
    } else alert("Приходите ещё")
}

//3.Реализуйте тот же алгоритм, но ВЕРСТКА таблицы должна базироваться НЕ  НА ОСНОВЕ html-элементов table, tr, td, а НА ОСНОВЕ CSS-СТИЛЕЙ display:table-row, display:table-cell.
//добавить кнопку выхова функции
var button = document.createElement('button');
button.className = 'button';
button.setAttribute('onclick', 'funcAddAnother()');
button.innerText = 'Добавить строки (диагональ слева направо, НА ОСНОВЕ html-элементов)';
document.body.insertBefore(button, null);
//формируем таблицу по запросу
var tb = document.getElementById('tb');
var x = 1;//считаем число для вывода в ячейку
function funcAddAnother() {
    var lines = +prompt('Вы хотите добавить колличество строк?', '5');
    if (lines) {
        tb.innerHTML = '';
        for (var i = 0; i < lines; i++) {
            var divTr = document.createElement('div');
            divTr.className = 'div_tr';
            x = 1;//считаем число для вывода в ячейку
            for (var j = 0; j < lines; j++) {
                var divTd = document.createElement('div');
                divTd.className = 'div_td';
                divTd.innerText = String(i + 1) + x;//считаем число для вывода в ячейку
                divTr.appendChild(divTd);
                ++x;//считаем число для вывода в ячейку
                if (i === j) {//считаем желтую ячейку диагонали
                    divTd.style.backgroundColor = 'gold';
                }
            }
            document.getElementById('tb').appendChild(divTr);
        }
    } else alert("Приходите ещё")
}
//добавить кнопку выхова функции
var button = document.createElement('button');
button.className = 'button';
button.setAttribute('onclick', 'funcAddAnotherBack()');
button.innerText = 'Добавить строки (диагональ справа налево, НА ОСНОВЕ html-элементов)';
document.body.insertBefore(button, null);
//формируем таблицу по запросу
var tb = document.getElementById('tb');
var x = 1;//считаем число для вывода в ячейку
var z;//считаем желтую ячейку диагонали
function funcAddAnotherBack() {
    var lines = +prompt('Вы хотите добавить колличество строк?', '5');
    if (lines) {
        tb.innerHTML = '';
        z = lines;//считаем желтую ячейку диагонали
        for (var i = 0; i < lines; i++) {
            var divTr = document.createElement('div');
            divTr.className = 'div_tr';
            x = 1;//считаем число для вывода в ячейку
            for (var j = 0; j < lines; j++) {
                var divTd = document.createElement('div');
                divTd.className = 'div_td';
                divTd.innerText = String(i + 1) + x;//считаем число для вывода в ячейку
                divTr.appendChild(divTd);
                ++x;//считаем число для вывода в ячейку
                if (j + 1 === z) {//считаем желтую ячейку диагонали
                    divTd.style.backgroundColor = 'gold';
                }
            }
            document.getElementById('tb').appendChild(divTr);
            --z;//считаем желтую ячейку диагонали
        }
    } else alert("Приходите ещё")
}