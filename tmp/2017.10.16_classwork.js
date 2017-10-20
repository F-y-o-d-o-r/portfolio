//Добавить стили через js сначала все вместе потом по одному

var a1 = document.body.getElementsByTagName('a')[0];

a1.style.cssText = "display:inline-block;\
text-decoration:none;\
background-color:grey;\
height: 50px;\
width: 100px;\
color:white;\
line-height:50px;\
text-align:center;\
border-radius:5px;"

document.body.insertAdjacentHTML('afterBegin', '<a href="#">Кнопка 2</a>');

var a2 = document.body.getElementsByTagName('a')[0];

a2.style.display = 'inline-block';
a2.style.textDecoration = 'none';
a2.style.backgroundColor = 'grey';
a2.style.height = '50px';
a2.style.width = '100px';
a2.style.lineHeight = '50px';
a2.style.textAlign = 'center';
a2.style.borderRadius = '5px';
a2.style.color = 'white';

for (var i = 3; i < 10; i++) {
    document.body.insertAdjacentHTML('beforeEnd', '<a href="#">Кнопка ' + i + '</a>');
    var a3 = document.body.lastElementChild;
    var color = Math.floor(Math.random() * (999 - 100 + 1) + 100);
    console.log(color);
    a3.style.cssText = "display:block;\
    text-decoration:none;\
    background-color:#" + color + ";\
    height: 50px;\
    width: 100px;\
    color:white;\
    line-height:50px;\
    text-align:center;\
    border-radius:5px;\
    margin-top:10px;\
    margin-left:" + i * 50 + "px;"
}

//2
//Создать функцию, которая показывает сообщение в указанном месте
//(x, y, ширина, текст) на 3 секунды и убирает его.
//setTimeout(
//    function() { }, 3000);
//}

function obj(x, y, width1, text) {
    var div = document.createElement('div');
    div.style.cssText = "width:" + width1 + ";" +
        "background-color:grey;" +
        "color:white;" +
        "text-align:center;" +
        "position:absolute;" +
        "left:" + x + ";" +
        "top:" + y + ";";

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

obj((prompt("Отступ слева", "100px")), (prompt("Отступ сверху", "300px")), (prompt("Ширина", "200px")), (prompt("Какой текст вывести", "Какой-то текст")));