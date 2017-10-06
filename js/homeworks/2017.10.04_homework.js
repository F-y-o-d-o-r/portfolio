/**
 * Created by fyodor on 05.10.2017. fyodor.work@gmail.com
 */

//1. Собрать со страницы элементы с одинаковым именем и вывести маркированными списками во второй по порядку элемент <p> (по списку на каждое имя).
var nameFirst = '';
var nameSecond = '';

var inputs = document.body.getElementsByTagName('*');//взяли все потомки body
var p = document.getElementsByTagName('p')[1];//взяли абзац куда вставить

//первое имя
var ul = document.createElement('ul');//создали каркас маркированного списка
p.appendChild(ul);//вставили каркас маркированного списка в нужный параграфф

//второе имя
var ul2 = document.createElement('ul');//создали каркас маркированного списка
p.appendChild(ul2);//вставили каркас маркированного списка в нужный параграфф

//выбираем нужные элементы
for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].getAttribute('name') == 'first') {
        nameFirst += "<li style='background-color: #a0ffec'>" + inputs[i].innerHTML + "</li>";
    } else if (inputs[i].getAttribute('name') == 'second') {
        nameSecond += "<li style='background-color: #fbcdff'>" + inputs[i].innerHTML + "</li>";
    }
}
//вставляем в уже созданные списки
document.body.getElementsByTagName('ul')[0].innerHTML = nameFirst;
document.body.getElementsByTagName('ul')[1].innerHTML = nameSecond;

//ещё один вариант решения
//var variant2 = document.getElementsByName('first');

//2. Собрать все текстовые узлы со страницы, склеить их и поставить их в место первого узла, добавив всей надписи полужирный вариант начертания.

//вариант 1, бади
var temp = document.createElement('p');
document.body.appendChild(temp);

var res2 = '';

var nodes = document.body.childNodes;

for (var i = 0; i < nodes.length; i++) {
    if (nodes[i].nodeType == 3) {
        res2 += nodes[i].data;
    }
}

nodes[0].data = 'ВАРИАНТ 1. ' + res2;


//вариант 2, со внутреностями
nodes[0].data += "ВАРИАНТ 2" + document.body.textContent;

//делаем первый текстовый узел жирным. тк к текстовому узлу нельзя применять стили сначала весь бади делаем жирным, потом первый узел оставляем жирным, а остальные возвращаем назад
document.body.style.fontWeight = 'bold';

for (var i = 0; i < document.body.childNodes.length; i++) {
    if (i == 0 || document.body.childNodes[i].nodeType == 3) {
        i++
    } else document.body.childNodes[i].style.fontWeight = 'normal';
    i++
}
document.body.getElementsByTagName('blockquote')[0].style.fontWeight = 'normal';


//3d variant
/*
 var res2 = '';



 var all = document.body.childNodes;

 for (var i = 0; i < all.length; i++) {
 if (all[i].nodeType == 1) {
 for (j = 0; j < all[i].childNodes.length; j++) {
 if (all[j].nodeType == 3) {
 res2 += '<b>' + all[i].childNodes[j].data + '<b>';
 }
 }
 }
 else if (all[i].nodeType == 3) {
 res2 += '<b>' + all[i].data + '<b>';
 }
 }

 console.log(res2);*/
