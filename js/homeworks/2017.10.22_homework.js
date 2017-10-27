/**
 * Created by fyodor on 22.10.2017. fyodor.work@gmail.com
 */
/*Создать JavaScript по одному из вариантов в папке test. Запустите index.html и посмотрите примеры.
 *Нужно выбрать вариант, составить план выполнения задания и выполнить задание по плану.
 *    Для движения объектов используйте:
 *    var timerId = setInterval(function() {
 *        ... // тело функции для выполнения действий
 *    }, 50);
 */
//нарисовать +
//перемещение платформы +- не рабоотает в фаефокс
//шарик двигается пока не наталкнётся, изменяет направление

var circle = document.getElementById('circle');
var rect = document.getElementById('rect');
var vvv = 1;
var y = true;
var x = true;
var z = true;//отслежуем с какой стороны летит шарик чтобы задать угол отбива от биты
(function () {
})();

var timerId = setInterval(function () {
    //ищем совпадение шарика с битой
    for(var i = 0; i < 150; i++) {
        if(((parseInt(getComputedStyle(circle).left)) == parseInt(getComputedStyle(rect).left) + i) && (parseInt(getComputedStyle(circle).top) > 855) && z === true){
            console.log('true');
            x = false;
            y = true;
        } else if (((parseInt(getComputedStyle(circle).left)) == parseInt(getComputedStyle(rect).left) + i) && (parseInt(getComputedStyle(circle).top) > 855) && z === false){
            console.log('false');
            x = false;
            y = false;
        }
    }
    console.log(parseInt(getComputedStyle(rect).left));

    //летаем шарик по x
    if (parseInt(getComputedStyle(circle).left) > 980) {
        y = false;
        z = false;
    }
    if (parseInt(getComputedStyle(circle).left) < 0) {
        y = true;
        z = true;
    }
    if (y === true) {
        circle.style.left = (parseInt(getComputedStyle(circle).left) + 1) + 'px';
    } else if (y === false) {
        circle.style.left = (parseInt(getComputedStyle(circle).left) - 1) + 'px';
    }
//летаем шарик по y
    if (parseInt(getComputedStyle(circle).top) > 900) {
        x = false;
        alert("Ты проиграл");
        circle.style.top = '30px';
        circle.style.left = '30px';
    }
    if (parseInt(getComputedStyle(circle).top) < 0) {
        x = true;
    }
    if (x === true) {
        circle.style.top = (parseInt(getComputedStyle(circle).top) + 1) + 'px';
    } else if (x === false) {
        circle.style.top = (parseInt(getComputedStyle(circle).top) - 1) + 'px';
    }
}, 5);
//перемещение платформы
document.onkeydown = function (e) {
    if (e.keyCode === 39 && (parseInt(getComputedStyle(rect).left) < 840)) {//направо
        rect.style.left = (parseInt(getComputedStyle(rect).left) + 15) + 'px';
    } else if (e.keyCode === 37 && (parseInt(getComputedStyle(rect).left) > 5)) {//налево
        rect.style.left = (parseInt(getComputedStyle(rect).left) - 15) + 'px';
    } else return;
    console.log(getComputedStyle(rect).left);
};