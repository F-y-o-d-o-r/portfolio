/**
 * Created by pfyod on 26.09.2017.
 */

//1 - Создать на странице несколько числовых надписей (абзацы, заголовки, span и другие). Создать функции, заполняющие массив значениями элементов, на которых кликают мышкой (при клике на //15 добавить в массив 15). При клике на «вывести массив» сделать вывод всех значений.

mass = [];

var a = function push(number) {
    mass.push(number);
};

var b = function () {
    if (mass.length <= 0) {
        alert("Вы ничего не выбрали!")
    } else alert(mass);
};

var clear = document.getElementsByTagName('button')[1];
clear.onclick = function () {
    mass.length = 0
};


//3 - Создать событие, меняющее фон и надпись строчного элемента при наведении мышки.

var cc = function () {
    var color = "#" + ((1 << 24) * Math.random() | 0).toString(16);
    this.style.backgroundColor = color;
};

var randomVord = function () {
    this.innerHTML = Math.random().toString(36);
};

document.getElementsByTagName('span')[1].addEventListener("mouseover", cc, false);
document.getElementsByTagName('span')[1].addEventListener("mouseover", randomVord, false);

document.getElementsByTagName('span')[2].addEventListener("mouseover", cc, false);
document.getElementsByTagName('span')[2].addEventListener("mouseover", randomVord, false);

//2 - Создать событие при нажатии на кнопку. Меняет надпись на кнопке и создает рядом еще одну кнопку.

var numclick = 1;

ddd = function ddd() {
    document.getElementById('eee').innerHTML = 'Новое имя старой кнопки ' + numclick;
    numclick++;
    var f = document.getElementById('suda').innerHTML;
    document.getElementById('suda').innerHTML = f + '<button>Новая кнопка</button>';
};



// ниже не работает!!!!

/*document.getElementsByTagName('button')[2].addEventListener('click', randomVord, false);
 document.getElementsByTagName('button')[2].addEventListener('click', butt2, false);

 function butt2() {
 document.getElementsByTagName('section')[1].innerHTML += "<button>Новая кнопка</button>";
 }*/


//document.getElementById("newButton").addEventListener('click', randomVord, false);
/*
 document.getElementById("newButton").addEventListener('click', butt2, false);
 var ddd = document.getElementById("newButton");

 function butt2() {
 ddd.innerHTML += "<button>Новая кнопка</button>";
 }*/


/*var randomVordPlus = function () {
 this.innerHTML = Math.random().toString(36);
 document.getElementsByTagName('section')[1].innerHTML += "<button>Новая кнопка</button>";
 };
 document.getElementsByTagName('button')[2].onclick = randomVordPlus;*/

