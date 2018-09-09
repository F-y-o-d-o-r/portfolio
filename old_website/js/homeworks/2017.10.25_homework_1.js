/**
 * Created by fyodor on 27.10.2017. fyodor.work@gmail.com
 */
//1. Создать страницу с блоком DIV имеющим возможность установки фокуса. При фокусе на этом блоке принимать и обрабатывать различные события: клик мышки (какая кнопка, координаты), нажатия клавиш (определять букву клавиши, код клавиши, дополнительные клавиши: Ctrl, Alt, Shift), скроллинг (вывести свойства события), установка и снятие фокуса. Всю информацию выдавать в другой див с прокруткой или в TEXTAREA.
//Создать страницу с блоком DIV имеющим возможность установки фокуса
var div = document.createElement('div');
div.classList.add('div', 'div1');
document.body.insertBefore(div, null);
div.setAttribute('tabindex', 1);
//Всю информацию выдавать в другой див с прокруткой или в TEXTAREA
var div2 = document.createElement('div');
div2.classList.add('div', 'out');
document.body.insertBefore(div2, null);
div2 = document.getElementsByClassName('div')[1];
//
div = document.getElementsByClassName('div')[0];
div.addEventListener('keydown', getChar);//дополнительлные клавиши
div.addEventListener('keypress', getChar);//символ
//нажатия клавиш (определять букву клавиши, код клавиши, дополнительные клавиши: Ctrl, Alt, Shift)
var text = '';
function getChar(e) {
    if (e.keyCode > 32) {//спецсимволы
        text = e.type + ': Код клавиши: ' + e.keyCode + ". " + 'Символ: ' + String.fromCharCode(e.keyCode || e.charCode) + '.' + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    } else if (e.shiftKey) {
        text = e.type + ': Дополнительная клавиша: ' + 'Shift' + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    } else if (e.ctrlKey) {
        text = e.type + ': Дополнительная клавиша: ' + 'Ctrl' + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    } else if (e.altKey) {
        text = e.type + ': Дополнительная клавиша: ' + 'Alt' + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    } else if (e.metaKey) {
        text = e.type + ': Дополнительная клавиша: ' + 'Meta' + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    } else if (e.keyCode === 20) {
        text = e.type + ': Дополнительная клавиша: ' + 'CapsLock' + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    } else if (e.keyCode === 9) {
        text = e.type + ': Дополнительная клавиша: ' + 'Tab' + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    } else if (e.keyCode === 32) {
        text = e.type + ': Дополнительная клавиша: ' + 'Пробел' + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    }
}
//клик мышки (какая кнопка, координаты)
div.addEventListener('mousedown', mouse);
div.setAttribute('oncontextmenu', 'return false');
var where = '';
function mouse(e) {
    if (e.which === 1) {
        where = 'Координаты клика на странице. X: ' + e.clientX + ' Y:' + e.clientY;
        text = 'Левая кнопка мыши' + '\n' + where + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    } else if (e.which === 2) {
        where = 'Координаты клика на странице. X: ' + e.clientX + ' Y:' + e.clientY;
        text = 'Колесо мыши' + '\n' + where + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    } else if (e.which === 3) {
        where = 'Координаты клика на странице. X: ' + e.clientX + ' Y:' + e.clientY;
        text = 'Правая кнопка мыши' + '\n' + where + '\n';
        div2.innerText += text;
        div2.scrollTop += 100;
    }
}
//скроллинг (вывести свойства события)
div.addEventListener('wheel', mw);
function mw(e) {
    text = 'Вы вращаете колесом мышки.(wheel) ' + 'Прокрутили ' + e.deltaY + ' пикселей' + '\n';
    div2.innerText += text;
    div2.scrollTop += 100;
}
div2.addEventListener('scroll', ms);
function ms() {
    var scrolled = div2.scrollTop;
    text = 'До верха дива(scroll): ' + scrolled + 'px' + '\n';
    div2.innerText += text;
}
//установка и снятие фокуса//почему не меняется время???????!!!
var ttt = new Date();
div.onblur = function () {
    console.log(ttt.getSeconds());
    text = 'Див потерял фокус в ' + ttt.getHours() + '.' + ttt.getMinutes() + '.' + ttt.getSeconds() + '\n';
    div2.innerText += text;
    div2.scrollTop += 100;
};
div.onfocus = function () {
    text = 'Див получил фокус в ' + ttt.getHours() + '.' + ttt.getMinutes() + '.' + ttt.getSeconds() + '\n';
    div2.innerText += text;
    console.log(ttt.getSeconds());
    div2.scrollTop += 100;
};

//2. Перехватить события мышки и при движении мышки отображать круг под стрелкой курсора.
var div3 = document.createElement('div');//тут будем перехватывать
div3.classList.add('div', 'div3');
document.body.insertBefore(div3, null);
div3.addEventListener('mousemove', mo);
//кружок под мышку
var div4 = document.createElement('div');
div4.className = 'underMouse';
div3.insertBefore(div4, null);
function mo(e) {
    div4.style.display = 'block';
    div4.style.left = (event.pageX - 8) + "px";
    div4.style.top = (event.pageY - 8) + "px";
}
//пропадает при уходе
div3.addEventListener('mouseleave', function (e) {
    div4.style.display = 'none';
});
//Не давать поставить курсор в поля формы.
div3.insertAdjacentHTML('beforeEnd', '<br><br><input type="text"><br><br><input type="text">');
//var inputs = document.getElementsByTagName('input');
div3.addEventListener('mousedown', inp, true);
function inp(e) {
    e.preventDefault()
}

//3. В текстовом поле при вводе вместо цифр выводить названия цифр (вместо 1 писать «один»).
//создадим див
var div5 = document.createElement('div');
div5.classList.add('div', 'div5');
document.body.insertBefore(div5, null);
//создадим инпут
var input3 = document.createElement('input');
input3.className = 'input';
input3.setAttribute('size', '50');
div5.insertBefore(input3, null);

//возьмем инпут
var inp = document.body.getElementsByClassName('input')[0];
//навесим обработчик
div5.addEventListener('keypress', inputChange);
function inputChange(e) {
    if (e.keyCode === 49) {
        e.preventDefault();
        inp.value += 'один '
    } else if (e.keyCode === 50) {
        e.preventDefault();
        inp.value += 'два '
    } else if (e.keyCode === 51) {
        e.preventDefault();
        inp.value += 'три '
    } else if (e.keyCode === 52) {
        e.preventDefault();
        inp.value += 'четыре '
    } else if (e.keyCode === 53) {
        e.preventDefault();
        inp.value += 'пять '
    } else if (e.keyCode === 54) {
        e.preventDefault();
        inp.value += 'шесть '
    } else if (e.keyCode === 55) {
        e.preventDefault();
        inp.value += 'семь '
    } else if (e.keyCode === 56) {
        e.preventDefault();
        inp.value += 'восемь '
    } else if (e.keyCode === 57) {
        e.preventDefault();
        inp.value += 'девять '
    } else if (e.keyCode === 48) {
        e.preventDefault();
        inp.value += 'ноль '
    }
}