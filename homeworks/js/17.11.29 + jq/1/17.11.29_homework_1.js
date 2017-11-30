/**
 * Created by fyodor popov on 30.11.2017. fyodor.work@gmail.com
 */
//Домашнее задание. Урок №17-1_1: Библиотека jQuery : селектора. function, обработчики событий, методы css. Используя js -
//код открытия спойлеров при наведении (файл html.html), перепишите его, только используя jq.

/*
var arr_li = document.body.getElementsByTagName("li");
for (var i = 0; i < arr_li.length; i++) {
  arr_li[i].setAttribute("onmouseover", "func_over(this);");
}

function func_over(elem) {
  for (var i = 0; i < arr_li.length; i++) {
    if (arr_li[i] === elem) {
      arr_li[i].childNodes[1].style.visibility = "visible";
    } else {
      arr_li[i].childNodes[1].style.visibility = "hidden";
    }
  }
}*/

//вариант 1
/*$(function () {
  $('body').on('mouseover', 'li', function () {
    $(this).children().eq(1).attr('class', 'show');
    return false;
  });
  $('body').on('mouseleave', 'li', function () {
    $(this).children().eq(1).attr('class', 'hide');
    return false;
  });
});*/
//вариант 2
$(function () {
  $('body').on('mouseover', 'li', function () {
    $(this).children('.hide').attr('class', 'show');
    //return false;
  });
  $('body').on('mouseleave', 'li', function () {
    $(this).children('.show').attr('class', 'hide');
    //return false;
  });
});
//вариант 3
/*
$(function () {
  $('body').on('mouseover', 'li', function () {
    $(this).children().eq(1).removeClass('hide');
    return false;
  });
  $('body').on('mouseleave', 'li', function () {
    $(this).children().eq(1).addClass('hide');
    return false;
  });
});*/
