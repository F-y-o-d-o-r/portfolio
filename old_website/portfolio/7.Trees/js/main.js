window.onload = function () {
  document.getElementById('open_me').addEventListener('click', open);
  document.getElementById('close_me').addEventListener('click', close);
  //var scene = document.getElementById('scene');
  //var parallaxInstance = new Parallax(scene);
  //ocument.getElementsByTagName('main')[0].addEventListener("mousemove", move);
}
function open() {
  var x = -46;
  var int = setInterval(function () {
    if (document.getElementsByClassName('menu_first_open')[0].style.bottom !== '0%') {
      x += 1;
      document.getElementsByClassName('menu_first_open')[0].style.bottom = x + '%';
      window.scrollBy(0,10);
    } else clearInterval(int);
  }, 20);
  new WOW().init();
  document.getElementsByTagName('section')[0].style.display = 'block';
  document.getElementsByTagName('section')[0].style.opacity = '1';
}

function close() {
  var x = 0;
  var int2 = setInterval(function () {
    if (x !== -46) {
      x -= 1;
      document.getElementsByClassName('menu_first_open')[0].style.bottom = x + '%';
      window.scrollBy(0,-10);
    } else {
      clearInterval(int2);
      document.getElementsByTagName('section')[0].style.display = 'none';
      document.getElementsByTagName('section')[0].style.opacity = '0';
    }
  }, 20)

}
//parallax
$('#scene').mousemove(function(e){
  var amountMovedX =((e.pageX -500) * - 1 / 200);
  var amountMovedY =((e.pageY -500 ) * - 1 / 200);
  $(this).css('background-position', amountMovedX + 'px ' + amountMovedY + 'px');
});

$(document).ready(function() {
//Обработка нажатия на кнопку "Вверх"
  $("#vverh").click(function () {
//Необходимо прокрутить в начало страницы
    var curPos = $(document).scrollTop();
    var scrollTime = curPos / 1.73;
    $("body,html").animate({"scrollTop": 0}, scrollTime);
  });
});