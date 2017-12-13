/**Created by fyodor on 28.09.20 fyodor.work@gmail.com**/

var what_to_count = function what_to_count() {
    if (window_door.value == 'windows') {
        document.getElementsByClassName('choose_window_type')[0].style.display = 'block';
        document.getElementsByClassName('choose_door_type')[0].style.display = 'none';
        document.querySelector('#image_window').style.display = 'block';
        document.querySelector('#door_window').style.display = 'none';
        return;
    } else document.getElementsByClassName('choose_window_type')[0].style.display = 'none';
    document.getElementsByClassName('choose_door_type')[0].style.display = 'block';
    document.querySelector('#image_window').style.display = 'none';
    document.querySelector('#door_window').style.display = 'block';
};

//change window image
function num1_win() {
    document.querySelector('#rem0').style.display = 'inline-block';
    document.querySelector('#rem1').style.display = 'none';
    document.querySelector('#rem2').style.display = 'none';
    document.querySelector('#rem3').style.display = 'none';
    document.querySelector('#image_window input').style.display = 'none';

}
function num2_win() {
    document.querySelector('#rem0').style.display = 'inline-block';
    document.querySelector('#rem1').style.display = 'inline-block';
    document.querySelector('#rem2').style.display = 'none';
    document.querySelector('#rem3').style.display = 'none';
    document.querySelector('#image_window input').style.display = 'block';
}
function num3_win() {
    document.querySelector('#rem0').style.display = 'inline-block';
    document.querySelector('#rem1').style.display = 'inline-block';
    document.querySelector('#rem2').style.display = 'inline-block';
    document.querySelector('#rem3').style.display = 'none';
    document.querySelector('#image_window input').style.display = 'block';
}
function num4_win() {
    document.querySelector('#rem0').style.display = 'inline-block';
    document.querySelector('#rem1').style.display = 'inline-block';
    document.querySelector('#rem2').style.display = 'inline-block';
    document.querySelector('#rem3').style.display = 'inline-block';
    document.querySelector('#image_window input').style.display = 'block';
}

//change door image
function num1_door() {
    document.querySelector('#rem_door0').style.display = 'inline-block';
    document.querySelector('#rem_door1').style.display = 'none';
    document.querySelector('#rem_door2').style.display = 'none';
    document.querySelector('#image_window input').style.display = 'none';
}
function num2_door() {
    document.querySelector('#rem_door0').style.display = 'inline-block';
    document.querySelector('#rem_door1').style.display = 'inline-block';
    document.querySelector('#rem_door2').style.display = 'none';
    document.querySelector('#image_window input').style.display = 'block';
}
function num3_door() {
    document.querySelector('#rem_door0').style.display = 'inline-block';
    document.querySelector('#rem_door1').style.display = 'inline-block';
    document.querySelector('#rem_door2').style.display = 'inline-block';
    document.querySelector('#image_window input').style.display = 'block';
}


//change window type image
var i = 0;
var image = document.getElementById("rem0");
var image1 = document.getElementById("rem1");
var image2 = document.getElementById("rem2");
var image3 = document.getElementById("rem3");
var image4 = document.getElementById("rem_door1");
var image5 = document.getElementById("rem_door2");
var image6 = document.getElementById("rem_door0");
var how_to_open = '';
var how_to_open1 = '';
var how_to_open2 = '';
var how_to_open3 = '';
var how_to_open4 = '';
var how_to_open5 = '';
var how_to_open6 = '';

var imgs_door = new Array('img/door_choose/door-l.png', 'img/door_choose/door-lu.png');


var imgs = new Array('img/windows_choose/leaf-x.png', 'img/windows_choose/leaf-l.png', 'img/windows_choose/leaf-lu.png', 'img/windows_choose/leaf-r.png', 'img/windows_choose/leaf-ru.png'); // Добавте свои картинки через запятую
function imgsrc() {
    if (i < imgs.length - 1) {
        i++;
        image.src = imgs[i];
    } else i = 0;
    image.src = imgs[i];
    how_to_open = imgs[i];
    how_to_open4 = null;
    how_to_open5 = null;
    how_to_open6 = null;
}
function imgsrc1() {
    if (i < imgs.length - 1) {
        i++;
        image1.src = imgs[i];
    } else i = 0;
    image1.src = imgs[i];
    how_to_open1 = imgs[i];
    how_to_open4 = null;
    how_to_open5 = null;
    how_to_open6 = null;
}
function imgsrc2() {
    if (i < imgs.length - 1) {
        i++;
        image2.src = imgs[i];
    } else i = 0;
    image2.src = imgs[i];
    how_to_open2 = imgs[i];
    how_to_open4 = null;
    how_to_open5 = null;
    how_to_open6 = null;
}
function imgsrc3() {
    if (i < imgs.length - 1) {
        i++;
        image3.src = imgs[i];
    } else i = 0;
    image3.src = imgs[i];
    how_to_open3 = imgs[i];
}
//door
function imgsrc4() {
    if (i < imgs.length - 1) {
        i++;
        image4.src = imgs[i];
    } else i = 0;
    image4.src = imgs[i];
    how_to_open4 = imgs[i];
    how_to_open = null;
    how_to_open1 = null;
    how_to_open2 = null;
    how_to_open3 = null;
}
function imgsrc5() {
    if (i < imgs.length - 1) {
        i++;
        image5.src = imgs[i];
    } else i = 0;
    image5.src = imgs[i];
    how_to_open5 = imgs[i];
    how_to_open = null;
    how_to_open1 = null;
    how_to_open2 = null;
    how_to_open3 = null;
}
function imgsrc6() {
    if (i < imgs_door.length - 1) {
        i++;
        image6.src = imgs_door[i];
    } else i = 0;
    image6.src = imgs_door[i];
    how_to_open6 = imgs[i];
    how_to_open = null;
    how_to_open1 = null;
    how_to_open2 = null;
    how_to_open3 = null;
}


//what to count
var window_change = document.getElementsByName('window_change');
var door_change = document.getElementsByName('door_change');
var vivod_checkbox = "";

function price() {
//windows or doors choose
    if (window_door.value == 'windows') {
        for (var i = 0; i < window_change.length; ++i) {
            if (window_change[i].checked) {
                vivod_checkbox = window_change[i].title;
            } else continue;
        }
    }
    if (window_door.value == 'doors') {
        for (var i = 0; i < door_change.length; ++i) {
            if (door_change[i].checked) {
                vivod_checkbox = door_change[i].title;
            }
        }
    }




    //text exit
    var x = "";
    document.getElementsByClassName('wrapper')[0].lastElementChild.innerHTML = "<b>Что расcчитать: </b>" + window_door.value + "<br><b>Тип: </b>" + vivod_checkbox + "<br><b>Тип профиля: </b>" + profil_type.value + "<br><b>Стеклопакет: </b>" + glass.value + "<br><b>Фурнитура: </b>" + furniture.value + "<br><b>Ширина подоконника: </b>" + width_under.value + "<br><b>Ширина отлива: </b>" + width_2.value + "<br><b>Установка: </b>" + install.value + "<br><b>Ширина: </b>" + width.value + "<br><b>Высота окна: </b>" + height.value + "<br><b>Высота двери: </b>" + height_door.value + "<br>" + "<b>Общая ширина (окна): </b>" + height_all_window.value + "<br>" + "<b>Общая ширина (двери): </b>" + height_all_door.value + "<br><b></b>" + "<b>Открывание окна №1: </b>" + how_to_open + "<br><b>Открывание окна №2: </b>" + how_to_open1 + "<br><b>Открывание окна №3: </b>" + how_to_open2 + "<br><b>Открывание окна №4: </b>" + how_to_open3 + "<br><b>Открывание окна с дверью №1: </b>" + how_to_open4 + "<br><b>Открывание окна с дверью №2: </b>" + how_to_open5 + "<br><b>Открывание двери: </b>" + how_to_open6;
}