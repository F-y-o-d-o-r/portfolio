/**
 * Created by fyodor on 16.10.2017. fyodor.work@gmail.com
 */

//1. Создать функцию, которая показывает сообщение в указанном месте (x, y, ширина, текст) на 3 секунды и убирает его. Для задания временного промежутка:
/*    setTimeout(
 function() { }, 3000);
 }*/

function obj(x, y, width1, text) {
    var div = document.createElement('div');
    div.style.cssText = "width:" + width1 + "px;" +
        "background-color:grey;" +
        "color:white;" +
        "text-align:center;" +
        "display:block;" +
        "height:50px;" +
        "line-height:50px;" +
        "border-radius:5px;" +
        "position:absolute;" +
        "left:" + x + "px;" +
        "top:" + y + "px;";

    //можно задать стили по другому
    //width = width1;
    //div.style.backgroundColor = 'grey';
    //div.style.color = 'white';
    //div.style.textAlign = 'center';
    //div.style.position = 'absolute';
    //div.style.right = x;
    //div.style.top = y;

    div.textContent = text;
    document.body.insertBefore(div, null);

    setTimeout(
        function () {
            div.remove()
        }, 3000
    )
}

obj((prompt("Отступ слева (px)", "100")), (prompt("Отступ сверху (px)", "300")), (prompt("Ширина (px)", "200")), (prompt("Какой текст вывести", "Какой-то текст")));

//2. Создать страницу с различными элементами и прописать по ним CSS. Выводить в див список стилей при наведении мышки на любой элемент на странице и очищать див при потере фокуса.

//создадим
var div = document.createElement('div');
var p = document.createElement('p');
var h1 = document.createElement('h1');
var h2 = document.createElement('h2');
var h3 = document.createElement('h3');
var span = document.createElement('span');
var div2 = document.createElement('div');
//присвоим стили
div.style.cssText = "height:100px; width:100px; background-color:blue; cursor:pointer;";
p.style.cssText = "height:100px; width:100px; background-color:red; margin:0; cursor:pointer;";
h1.style.cssText = "height:100px; width:100px; background-color:green; margin:0; cursor:pointer;";
h2.style.cssText = "height:100px; width:100px; background-color:yellow; margin:0; cursor:pointer;";
h3.style.cssText = "height:100px; width:100px; background-color:black; margin:0; cursor:pointer;";
span.style.cssText = "height:100px; width:100px; background-color:gold; cursor:pointer;";
document.body.style.display = 'flex';
document.body.style.justifyContent = 'space-around';
document.body.style.flexWrap = 'wrap';
div2.style.cssText = "height:100px; background-color:grey; color:white;width: 100%; margin-top:20px; text-align:center; line-height:100px;";
//выведем
document.body.appendChild(div);
document.body.insertBefore(p, null);
document.body.insertBefore(h1, null);
document.body.insertBefore(h2, null);
document.body.insertBefore(h3, null);
document.body.insertBefore(span, null);
document.body.insertBefore(div2, null);
//можно выводить все стили через getComputedStyle, но я вывожу только те что присвоил
div.onmouseover = function on() {
    div2.innerText = this.style.cssText;
};
h1.onmouseover = function on() {
    div2.innerText = this.style.cssText;
};
h2.onmouseover = function on() {
    div2.innerText = this.style.cssText;
    div2.style.display = "block";
};
h3.onmouseover = function on() {
    div2.innerText = this.style.cssText;
};
span.onmouseover = function on() {
    div2.innerText = this.style.cssText;
};
p.onmouseover = function on() {
    div2.innerText = this.style.cssText;
};
//прячем стили
div.onmouseout = h1.onmouseout = h2.onmouseout = h3.onmouseout = span.onmouseout = p.onmouseout = function fff() {
    div2.innerText = '';
};

//3. Создать на странице блок див и назначить ему все отступы. Получить по заданному элементу все метрики. Вычислить размеры полезного содержимого при задании ему ширины и высоты.
//создадим div
document.body.insertAdjacentHTML('beforeEnd', '<div id = "div">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem culpa cum deleniti dolores, error excepturi harum hic iure laudantium libero molestias numquam quasi quibusdam recusandae sit sunt tempore veritatis, voluptates!</div>');
//назначим отступы и стили
document.getElementById('div').style.cssText = "margin-top:50px; margin-left:50px; margin-right:50px; background-color:lightgrey; padding-top:50px;padding-left:50px; padding-right:50px; padding-bottom:50px; border:5px solid red; height:300px; width:500px; overflow: auto;";
//Вычислить размеры полезного содержимого при задании ему ширины и высоты.
//если вы имелли ввиду текст за вычетом паддигов и бордера, то это ниже, если что-то другое дайте знать
//посчитаем
var divL = document.getElementById('div');
var aaa = document.createElement('div')
document.body.appendChild(aaa);

function poleznayaVisota(visota, shirina) {
    document.getElementById('div').style.height = visota + "px";
    document.getElementById('div').style.width = shirina + "px";
    var visot = divL.clientHeight - (parseInt(divL.style.paddingTop) + parseInt(divL.style.paddingBottom));
    var shirin = divL.clientWidth - (parseInt(divL.style.paddingLeft) + parseInt(divL.style.paddingRight));
    aaa.innerHTML = 'Высота полезного содержимого равна введенной высоте, если див не меньше текста, но мы на всякий случай посчитали это: ' + visot + 'px' + '<br>' + 'если появилась полоса прокрутки, то полезная высота больше и составляет: ' + (divL.scrollHeight - (parseInt(divL.style.paddingTop) + parseInt(divL.style.paddingBottom))) + 'px' + '<br>' + 'Ширина полезного содержимого тоже равна введенной ширине, если не появилась горизонтальная полоса прокрутки, но мы на всякий случай посчитали и это: ' + shirin + 'px' + '<br>' + 'если появилась горизонтальная полоса прокрутки, то полезная высота больше и составляет: ' + (divL.scrollWidth - (parseInt(divL.style.paddingLeft) + parseInt(divL.style.paddingRight))) + 'px' + '<br>' + 'Если вы имели ввиду всю высоту элемента, то это просто offsetHeight: ' + divL.offsetHeight + 'px, ' + 'вся длина: ' + divL.offsetWidth + 'px' + '<br>' + 'Площадь: ' + ((divL.scrollWidth - (parseInt(divL.style.paddingLeft) + parseInt(divL.style.paddingRight)))) * ((divL.scrollHeight - (parseInt(divL.style.paddingTop) + parseInt(divL.style.paddingBottom)))) + '<br>' + 'тут не понятно что вы имеете ввиду под полузным содержимым...';
}
//ввод данных для вычисления
document.body.insertAdjacentHTML('beforeEnd', '<button onclick="question()" style="height: 20px; margin-top: 50px">Ввести новую высоту и ширину дива</button>')

function question() {
    poleznayaVisota(prompt('Введите высоту цифрами (px)', '100'), prompt('Введите ширину цифрами (px)', '100'));
}
//получим все метрики
var metrics = '<h2>Метрики:</h2><br>';
metrics += 'offsetParent: ' + document.getElementById('div').offsetParent.nodeName + '<br>';
metrics += 'offsetLeft: ' + document.getElementById('div').offsetLeft + '<br>';
metrics += 'offsetTop: ' + document.getElementById('div').offsetTop + '<br>';
metrics += 'offsetWidth: ' + document.getElementById('div').offsetWidth + '<br>';
metrics += 'offsetHeight: ' + document.getElementById('div').offsetHeight + '<br>';
metrics += 'clientTop: ' + document.getElementById('div').clientTop + '<br>';
metrics += 'clientLeft: ' + document.getElementById('div').clientLeft + '<br>';
metrics += 'clientWidth: ' + document.getElementById('div').clientWidth + '<br>';
metrics += 'clientHeight: ' + document.getElementById('div').clientHeight + '<br>';
metrics += 'scrollWidth: ' + document.getElementById('div').scrollWidth + '<br>';
metrics += 'scrollHeight: ' + document.getElementById('div').scrollHeight + '<br>';
metrics += 'scrollLeft: ' + document.getElementById('div').scrollLeft + '<br>';
metrics += 'scrollTop: ' + document.getElementById('div').scrollTop + '<br>';
//выведем полученные метрики
var x = document.createElement('div');
x.innerHTML = metrics;
document.body.appendChild(x);
