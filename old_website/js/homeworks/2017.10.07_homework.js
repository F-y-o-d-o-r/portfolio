/**
 * Created by fyodor on 08.10.2017.   fyodor.work@gmail.com
 */

//Создать вручную HTML с разными элементами на странице (p,div,span,a,h1..h6,img,pre и т.п.) и добавленными у некоторых классами.
//Написать JavaScript программу для:

//1. Проставления атрибутов тегам на странице с названием тега (pAtr,divAtr,spanAtr,aAtr и т.п.) со значением количества символов в имени тега х4 (pAtr=“4”,divAtr=“12” и т.п.). А также всем добавить атрибут alt со значением “custom”. Добавить классы тегам по имени тега (pclass, divclass…)

var allTags = document.body.getElementsByTagName('*');//берём все теги в боди

for (var i = 0; i < allTags.length; i++) {
    allTags[i].setAttribute((allTags[i].nodeName + "Atr"), (allTags[i].nodeName.length * 4));
    allTags[i].setAttribute('alt', 'cusom');
    allTags[i].className = allTags[i].nodeName + 'class';
}

//2. Пройти по всем элементам и если у элемента есть класс – добавить еще один класс (с именем bestclass). Перед каждым элементом <a> разместить элемент <hr> с атрибутом line=“long”.

//var allTags = document.body.getElementsByTagName('*');//берём все теги в body (задано выше)

for (var i = 0; i < allTags.length; i++) {
    if (allTags[i].className !== null) {
        //allTags[i].className += ' bestclass'; 1 вариан
        allTags[i].classList.add('bestclass'); //2 вариант
    }
}

//var hr = document.createElement('hr');
//document.body.insertBefore(hr, document.getElementsByClassName('bestclass')[3]);

for (var i = 0; i < allTags.length; i++) {
    if (allTags[i].tagName == 'A') {
        var hr = document.createElement('hr');
        hr.setAttribute('line', 'long');
        hr.setAttribute('color', 'gold');
        document.body.insertBefore(hr, allTags[i]);
        i++
    }
}
