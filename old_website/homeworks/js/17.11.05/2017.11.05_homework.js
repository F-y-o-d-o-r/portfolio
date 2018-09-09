//Задание 1
//Li
var liAll = document.querySelectorAll('#left li');
//Вешаем событие
//Функция изменения картинок при наведении
document.getElementById('container').onmouseover = function func(e) {
    if (e.target === liAll[0]) {
        document.images["menu_image"].src = 'pk.jpg';
    } else if (e.target === liAll[1]) {
        document.images["menu_image"].src = 'pr.jpg';
    } else if (e.target === liAll[2]) {
        document.images["menu_image"].src = 'se.jpg';
    } else {
        document.images["menu_image"].src = 'nofoto.jpg';
    }
};

//Задание 2
var divAll = document.querySelectorAll('#left1 div');
document.body.onmouseover = function func1(e) {
    if (e.target === divAll[1] || e.target === divAll[2] || e.target === document.querySelector('img[name=go_image_pk]')) {
        document.images["menu_image1"].src = 'pk.jpg';
    } else if (e.target === divAll[4] || e.target === divAll[5]) {
        document.images["menu_image1"].src = 'pr.jpg';
    } else if (e.target === divAll[7] || e.target === divAll[8]) {
        document.images["menu_image1"].src = 'se.jpg';
    } else {
        document.images["menu_image1"].src = 'nofoto.jpg';
    }
};
//При наведении на первый пункт + onclick на стрелочке – перебор изображений (по аналогии с примером, рассмотренным на занятии)
//массив с картинками
var pictArr = new Array('pk.jpg', 'pk1.jpg', 'pk2.jpg');
var i = 0;
//функция переключения
document.querySelector('img[name=go_image_pk]').onclick = function (e) {
    i++;
    if (i === pictArr.length) i = 0;
    document.images['menu_image1'].src = pictArr[i];
};

//Задание 3
//С использованием метода setInterval разработайте следующий алгоритм – при первоначальной загрузке страницы цвет надписи «Click me» начинает меняться каждую секунду - «красный - синий», «синий - красный»
function funcColor() {
    var d = new Date();
    var sec = d.getSeconds();
    if (sec % 2) {
        div2_null.style.color = 'blue';
    } else {
        div2_null.style.color = 'red';
    }
};
var stop = setInterval('funcColor()', 1000);
//при событии onclick на надписи «Click me» должен останавливаться ранее запущенный интервальный запуск функции смены цвета надписи + надпись должна заменяться на «One moment...» (цвет ее может быть или красным, или синим (в зависимости от того, какой цвет будет иметь надпись «Click me» в момент onclick на ней))…
// + через 1 секунду (!!!не сразу при onclick, используйте метод setTimeout) ранее наложенный блок должен исчезать, открывая левый блок с пунктами меню :
div2_null.onclick = function () {
    clearInterval(stop);
    this.innerText = 'One moment...';
    setTimeout(function () {
        div1_null.style.display = 'none';
    }, 1000)
};
//Функция переключения
var divAll1 = document.querySelectorAll('#left2 div');
var img = document.querySelector('img[name=go_image_pk1]');
container2.onmouseover = function func2(e) {
    if (e.target === divAll1[1] || e.target === divAll1[2] || e.target === document.querySelector('img[name=go_image_pk1]')) {
        document.images["menu_image2"].src = 'pk.jpg';
    } else if (e.target === divAll1[4] || e.target === divAll1[5]) {
        document.images["menu_image2"].src = 'pr.jpg';
    } else if (e.target === divAll1[7] || e.target === divAll1[8]) {
        document.images["menu_image2"].src = 'se.jpg';
    } else {
        document.images["menu_image2"].src = 'nofoto.jpg';
    }
};
//массив с картинками
var pictArr1 = new Array('pk.jpg', 'pk1.jpg', 'pk2.jpg');
var i1 = 0;
//функция переключения
document.querySelector('img[name=go_image_pk1]').onclick = function (e) {
    i1++;
    if (i1 === pictArr.length) i1 = 0;
    document.images['menu_image2'].src = pictArr1[i1];
};