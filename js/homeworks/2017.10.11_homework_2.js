/**
 * Created by fyodor on 13.10.2017. fyodor.work@gmail.com
 */

//2017.10.11_homework_2
//+1. Создать страницу с пустым содержимым. Джаваскриптом установить на ней элементы <h3>,<p>, <ul>список с элементами списка. Склонировать список в элемент <p>. Склонировать получившийся элемент <p> в элемент <h3>. Создать клон получившегося <h3> в конце документа с добавлением ему атрибутов name и id. Создать ниже еще один клон последнего <h3> без дочерних элементов и с измененным id.

//Джаваскриптом установить на ней элементы <h3>,<p>, <ul>список с элементами списка.
document.body.insertAdjacentHTML('afterBegin', '<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, laboriosam.</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, ullam?</p><ul><li>Lorem ipsum dolor sit amet.</li><li>Lorem ipsum dolor sit amet.</li><li>Lorem ipsum dolor sit amet.</li><li>Lorem ipsum dolor sit amet, consectetur.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li><li>Lorem ipsum dolor.</li><li>Lorem ipsum dolor sit.</li></ul>');


//Склонировать список в элемент <p>.
var clon = document.body.getElementsByTagName('ul')[0].cloneNode(true);
document.body.getElementsByTagName('p')[0].insertBefore(clon, null);

//Склонировать получившийся элемент <p> в элемент <h3>.
clon = document.body.getElementsByTagName('p')[0].cloneNode(true);
document.body.getElementsByTagName('h3')[0].insertBefore(clon, null);

//Создать клон получившегося <h3> в конце документа с добавлением ему атрибутов name и id.
clon = document.body.getElementsByTagName('h3')[0].cloneNode(true);
clon.setAttribute('name', 'h3Clone');
clon.setAttribute('id', 'clone');
document.body.insertBefore(clon, null);

//Создать ниже еще один клон последнего <h3> без дочерних элементов и с измененным id.
clon = document.body.getElementsByTagName('h3')[0].cloneNode(false);
clon.setAttribute('id', 'changeId');
document.body.insertBefore(clon, null);
//не понятно тут нужен ли текст внутри h3 или нет, но при клонировании false текст пропадает тоже, на всякий случай сделал и с текстом без дочерних элементов
clon = document.body.getElementsByTagName('h3')[0].cloneNode(false);
clon.setAttribute('id', 'changeId2variant');
clon.innerHTML = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, laboriosam.';
clon.setAttribute('name', 'h3Clone');
document.body.insertBefore(clon, null);


//2. Создать вручную документ с пустым списком <ul>. Джаваскриптом после списка вставить N (запрос у пользователя) элементов <hr> множественной вставкой с помощью insertAdjacent. Между этими элементами вставить текстовые узлы и комментарии с нумерацией (например «текст 1» и «комментарий 1»). В конце вставить список городов элементами <li> в существующий пустой список <ul> с помощью DocumentFragment.

//красота
/*var hr = document.createElement('hr');
 document.body.insertBefore(hr, null);*/
document.body.insertAdjacentHTML('beforeEnd', "<h3 style='color: darkgreen'>Второе задание</h3><br>");
document.body.style.backgroundColor = '#fff5ea';

//Создать вручную документ с пустым списком <ul>.
document.body.insertAdjacentHTML('beforeEnd', "<ul></ul>");

//Джаваскриптом после списка вставить N (запрос у пользователя) элементов <hr> множественной вставкой с помощью insertAdjacent.
var numHr = prompt('Сколько hr вставить?', 'Укажите количество цифрами!');
var result = '';

if (!numHr) {//проверяем ввел ли
    alert('Вы ничего не ввели!!!');
} else if (isNaN(numHr)) {//проверяем число ли
    alert('Вы ввели не число!!!')
} else if (numHr) { //сначала пишется в резалт потом в документ добавляется
    for (var i = 0; i < numHr; i++) {
        result += '<hr>';
    }
    //document.body.insertAdjacentHTML('beforeEnd', result); можно так
    document.body.getElementsByTagName('ul')[4].insertAdjacentHTML('afterEnd', result);//а можно так
}

//Между этими элементами вставить текстовые узлы и комментарии с нумерацией (например «текст 1» и «комментарий 1»).
//как я понял "между этими элементами" это между созданными hr:
var hr = document.body.getElementsByTagName('hr');
for (var i = 0; i < hr.length; i++) {
    hr[i].insertAdjacentText('afterEnd', 'текст ' + (i + 1));
    //2 variant: hr[i].insertAdjacentText('afterEnd', 'текст ' + (i + 1));
    hr[i].insertAdjacentHTML('afterEnd', '<!--комментарий ' + (i + 1) + '-->');
}

//В конце вставить список городов элементами <li> в существующий пустой список <ul> с помощью DocumentFragment.
var fragment = document.createDocumentFragment();
var towns = ['Киев', 'Чернигов', 'Мариуполь', 'Чикаго', 'Славутич'];
for (var i = 0; i < 5; i++) {
    var x = document.createElement('li');
    x.innerHTML = towns[i];
    fragment.appendChild(x);
}
document.body.getElementsByTagName('ul')[4].insertBefore(fragment, null);



