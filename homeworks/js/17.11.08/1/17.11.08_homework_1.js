/**
 * Created by fyodor on 09.11.2017. fyodor.work@gmail.com
 */

//Используя мeтод setInterval реализуйте алгоритм движения шарика внутри некого блока
var ball = document.getElementsByClassName('ball')[0];
var toRight = 0;
var tr = true;
setInterval('ballTime()', 1);
function ballTime() {
    if (toRight < 602 && tr) {
        if (toRight < 598) {
            tr = true;
            ball.style.left = toRight + 'px';
            toRight += 2;
        } else {
            tr = false;
            ball.style.backgroundColor = 'green';
        }
    } else if (toRight > 0 && !tr) {
        if (toRight > 2) {
            tr = false;
            ball.style.left = toRight + 'px';
            toRight -= 2;
        } else {
            tr = true;
            ball.style.backgroundColor = '';
        }
    }
}
//2nd variant
//loading dots
var dots = document.getElementsByTagName('span')[0];
console.log(dots.innerText.length);
setInterval('dot()', 1000);
function dot() {
    dots.innerText += '.';
    if (dots.innerText.length > 5) {
        dots.innerText = '';
    }
}
//двигающийся фон
var line = document.getElementsByClassName('loader')[0];
var toRight2 = -90;
setInterval('lineInt()', 1);
function lineInt() {
    line.style.left = toRight2 + 'px';
    toRight2 += 2;
    if (toRight2 > 750) {
        toRight2 = -90;
    }
}
