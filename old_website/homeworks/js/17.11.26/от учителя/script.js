/**
 * Created by fyodor.popov on 27.11.2017. fyodor.work@gmail.com
 */

//Реализуйте алгоритм, при котором бы при onclick на любом div на первой странице тот же самый div на второй странице (с интервалом-задержкой, например в 1 сек.) приобретает background-color:red, а оставшийся приобретает начальный background-color:gold:
/*
 document.body.addEventListener('click', changeColor);//отлавливаем событие
 function changeColor(e) {//передаём параметры в куки
 if (e.target === document.getElementById('div1')) {
 e.target.className = 'class2';
 document.getElementById('div2').className = 'class1';
 setCookie('div2', 'class1', 1);
 setCookie('div1', 'class2', 1);
 } else if (e.target === document.getElementById('div2')) {
 e.target.className = 'class2';
 document.getElementById('div1').className = 'class1';
 setCookie('div2', 'class2', 1);
 setCookie('div1', 'class1', 1);
 }
 }
 */

function setCookie(name, val, expMonth) {//меняем куки
  var cook = name + "=" + escape(val) + ";";
  if (expMonth !== 0) {
    var d = new Date();
    d.setMonth(d.getMonth() + expMonth);
    cook += "expires=" + d.toUTCString() + ";" + 'path=/;';
  }
  document.cookie = cook;
  setTimeout(function () {
    getCookieValue(name);
  }, 1000)
}
function getCookieValue(name) {//считываем и применяем куки
  var cookieValue = document.cookie;
  var r = new RegExp("\\b" + name + "\\b");
  var cookieStart = cookieValue.search(r);
  if (cookieStart === -1)
    cookieValue = null;
  else {
    cookieStart = cookieValue.indexOf("=", cookieStart) + 1;
    var cookieEnd = cookieValue.indexOf(";", cookieStart);
    if (cookieEnd === -1)
      cookieEnd = cookieValue.length;
    cookieValue = unescape(cookieValue.substring(cookieStart, cookieEnd));
  }
  return cookieValue;
  //document.getElementById(name).className = cookieValue;
  //console.log(name, cookieValue);
}

var arr_div = document.body.getElementsByTagName("div");
//setInterval предполагалось повесить только на вторую - явно в код, но, если так(через внешний файл), то :
if (document.getElementsByTagName("title")[0].innerHTML === "17.11.26_homework_2-page1") {   //...внес измения в title или(если хотите, чтобы title были на обоих одинаковы), то var s=location.pathname; alert(s.substr(s.lastIndexOf("/")+1)) - имя страницы (однозначно будет разным)
  for (var i = 0; i < arr_div.length; ++i) {
    arr_div[i].setAttribute("onclick", "func_click(this.getAttribute('id'))");
  }
}

function func_click(id) {
  setCookie('div_result', '', -1);
  setCookie('div_result', id, 1);
  for (var i = 0; i < arr_div.length; ++i) {
    if (arr_div[i].getAttribute("id") === id) {
      arr_div[i].style.backgroundColor = "red";
    }
    else {
      arr_div[i].style.backgroundColor = "gold";
    }
  }
}

if (document.getElementsByTagName("title")[0].innerHTML === "17.11.26_homework_2-page2") {
  setInterval("func_interval()", 1000);
}
function func_interval() {
  if (getCookieValue("div_result")) {
    for (var i = 0; i < arr_div.length; ++i) {
      if (arr_div[i].getAttribute("id") === getCookieValue("div_result")) {
        document.getElementById(arr_div[i].getAttribute("id")).style.backgroundColor = "red";
      }
      else {
        document.getElementById(arr_div[i].getAttribute("id")).style.backgroundColor = "gold";
      }
    }
  }
}