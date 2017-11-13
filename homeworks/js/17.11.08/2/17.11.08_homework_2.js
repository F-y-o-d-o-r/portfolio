/**
 * Created by fyodor on 09.11.2017. fyodor.work@gmail.com
 */
var el = document.getElementById('list');
function funcChild() {
    for (var i = 0; i < el.childNodes.length; i++) {
        alert(el.childNodes[i].nodeName + el.childNodes[i].textContent)
    }
}
function funcInsert() {
    var bod = document.getElementById('body');
    var el_insert = document.getElementById('link');
    var span = document.createElement('span');
    span.innerText = 'span one';
    span.setAttribute('style', 'color:red; font-weight:bold');
    span.setAttribute('id', 'span1');
    body.insertBefore(span, el_insert)
}

function funcInsert2() {
    var bod = document.getElementById('body');
    var el_insert = document.getElementById('link');
    var span = document.createElement('span');
    span.innerText = 'span two';
    span.setAttribute('style', 'color:green; font-weight:bold');
    span.setAttribute('id', 'span2');
    body.insertBefore(span, el_insert.nextSibling)
}
function funcInsert3() {
    var bod = document.getElementById('body');
    var el_insert = document.getElementById('link');
    var span = document.createElement('img');
    span.setAttribute('id', 'img1');
    span.setAttribute('height', '100px');
    span.setAttribute('src', 'https://upload.wikimedia.org/wikipedia/commons/b/bf/Blue_Tiger_Im_IMG_9450.jpg');
    el_insert.appendChild(span);
}
var i = 2;
function funcInsert4() {
    var bod = document.getElementById('body');
    var el_insert = document.getElementById('link');
    var span = document.createElement('img');
    span.setAttribute('id', 'img' + i);
    span.setAttribute('height', '70px');
    span.setAttribute('src', 'https://upload.wikimedia.org/wikipedia/commons/b/bf/Blue_Tiger_Im_IMG_9450.jpg');
    el_insert.insertBefore(span, el_insert.firstChild);//childNodes[0]
    i++;
}
function funcInsert5() {
    if (document.getElementById('span1')) {
        span1.innerText = 'new text'
    } else {
        funcInsert();
        funcInsert5();
    }
}
// «неправильный» подход – ВСЕГДА БУДУТ ОСТАВАТЬСЯ узлы (за счет «ПЕРЕМЕЩЕНИЯ» ОСТАВШИХСЯ ЭЛЕМЕНТОВ «ВВЕРХ»)
/*function funcInsert6() {
 var el_parent = document.getElementById('link');
 for (var i = 0; i < el_parent.childNodes.length; i++) {//можно поставить i = 1 и решит проблему
 el_parent.removeChild(el_parent.childNodes[i])
 }
 }*/
/*function funcInsert6() {
 var el_parent = document.getElementById('link');
 while (el_parent.childNodes.length) { //-1 оставит ссылку
 el_parent.removeChild(el_parent.childNodes[0])
 }
 }*/

//дальнейший вызов функции их одновременного удаления таким образом, чтобы текст ссылки (Link) при данном удалении сохранялся
//!!!ДАННЫЙ АЛГОРИМ РАЗРАБОТАЙТЕ ИМЕННО НА child-МОДЕЛИ, НЕ ИСПОЛЬЗУЯ ДРУГИЕ МЕТОДЫ (НАПРИМЕР, «ПРЯМОЕ» ОБРАЩЕНИЕ ПО id ИЛИ getElements)
//вариант 1. удаляем только nodeType !== 3
function funcInsert6() {
    var el_parent = document.getElementById('link');
    while (el_parent.childNodes.length > 1) {
        for (var i = 0; i < el_parent.childNodes.length; i++) {
            if (el_parent.childNodes[i].nodeType !== 3) {
                el_parent.removeChild(el_parent.childNodes[i]);
            }
        }
    }
}
//вариант 2. удаляем только textContent !== 'See children'
function funcInsert7() {
    var el_parent = document.getElementById('link');
    while (el_parent.childNodes.length > 1) {
        for (var i = 0; i < el_parent.childNodes.length; i++) {
            if (el_parent.childNodes[i].textContent !== 'See children') {
                el_parent.removeChild(el_parent.childNodes[i]);
            }
        }
    }
}
//вариант 3. копируем то что было до изменения и потом вставляем
var el_parent = document.getElementById('link');
var zero = el_parent.innerHTML;
function funcInsert8() {
    while (el_parent.childNodes.length) {
        el_parent.removeChild(el_parent.childNodes[0])
    }
    el_parent.innerHTML = zero;
}
//вариант 4. учителя, универсальный
function func_dell_all() {
    var el_a = document.getElementById("link");
    var arr_img = new Array();
    var arr_img_count = 0;
    for (var i = 0; i < el_a.childNodes.length; i++) {
        if (el_a.childNodes[i].nodeName === "IMG") {
            arr_img[arr_img_count] = el_a.childNodes[i];
            arr_img_count++;
        }
    }
    for (var i = 0; i < arr_img.length; i++) {
        el_a.removeChild(arr_img[i]);
    }
}
//вариант 5. учителя, универсальный, переделал на пуш
function func_dell_all_2() {
    var el_a = document.getElementById("link");
    var arr_img = new Array();
    // var arr_img_count = 0;
    for (var i = 0; i < el_a.childNodes.length; i++) {
        if (el_a.childNodes[i].nodeName === "IMG") {
            arr_img.push(el_a.childNodes[i]);
            //arr_img[arr_img_count] = el_a.childNodes[i];
            // arr_img_count++;
        }
    }
    for (var i = 0; i < arr_img.length; i++) {
        el_a.removeChild(arr_img[i]);
    }
}



