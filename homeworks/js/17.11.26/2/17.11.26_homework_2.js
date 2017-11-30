/**
 * Created by fyodor.popov on 27.11.2017. fyodor.work@gmail.com
 */

//Реализуйте алгоритм, при котором бы при onclick на любом div на первой странице тот же самый div на второй странице (с интервалом-задержкой, например в 1 сек.) приобретает background-color:red, а оставшийся приобретает начальный background-color:gold:
setCookie('div1', 'class1', 1);
setCookie('div2', 'class1', 1);

if (document.getElementsByTagName("title")[0].innerHTML === "17.11.26_homework_2") {
  document.body.addEventListener('click', changeColor);//отлавливаем событие
}

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

function setCookie(name, val, expMonth) {//меняем куки
  var cook = name + "=" + escape(val) + ";";
  if (expMonth !== 0) {
    var d = new Date();
    d.setMonth(d.getMonth() + expMonth);
    cook += "expires=" + d.toUTCString() + ";" + 'path=/;';
  }
  document.cookie = cook;
}

if (document.getElementsByTagName("title")[0].innerHTML === "17.11.26_homework_2_2") {
  setInterval("getCookieValue('div1')", 1000);
  setInterval("getCookieValue('div2')", 1000);
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
    if (cookieEnd === -1) {
      cookieEnd = cookieValue.length;
    }
    cookieValue = unescape(cookieValue.substring(cookieStart, cookieEnd));
  }
  document.getElementById(name).className = cookieValue;
}

//setInterval("func_interval()", 1000);