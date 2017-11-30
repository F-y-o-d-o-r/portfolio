/**
 * Created by fyodor.popov on 27.11.2017. fyodor.work@gmail.com
 */

var job = "fireman_0.png|fireman|Mum's eyes popped to see me bringing home the fireman.|Мама очень удивилась, когда он увидела, что я веду домой пожарника.||farmer_0.png|farmer|They work for a farmer.|Они работают у фермера.||farmer_0.png|farmer|Joe was just a simple farmer.|Джо был простым фермером.||farmer_0.png|farmer|He is a sober, hardworking farmer.|Он трезвый, работящий крестьянин.||policeman_0.png|policeman|The policeman blew his whistle.|Полицейский свистнул в свисток.||taxidriver_0.png|taxi driver|'Where to?' the taxi driver asked me.|'Куда?' - спросил меня таксист.||taxidriver_0.png|taxi driver|The taxi driver said I was the first pickup that he'd had all evening.|Таксист сказал, что я его первый пассажир за весь вечер.||teacher_0.png|teacher|She was certified as a teacher.|Она получила диплом учителя.||teacher_0.png|teacher|Experience is a great teacher.|Опыт — великий учитель.||doctor_0.png|doctor|You want to see a doctor.|Тебе следует пойти к врачу.||doctor_0.png|doctor|My head reels, doctor.|Доктор, у меня кружится голова.||doctor_0.png|doctor|Let me by, I'm a doctor.|Пропустите меня, я доктор.";
function func_table() {
  var el_tbod = document.getElementById("tbod");
  var job_arr1 = job.split("||");
  for (var i = 0; i < job_arr1.length; i++) {
    var el_tr = document.createElement("tr");
    var el_td = "";
    var job_arr2 = job_arr1[i].split("|");
    for (var j = 0; j < job_arr2.length; j++) {
      if (job_arr2[j].indexOf('.png') !== -1) {
        el_td += "<td><img src='img_job/" + job_arr2[j] + "' alt='' /></td>";
      }
      else {
        el_td += "<td>" + job_arr2[j] + "</td>";
      }
    }
    el_tr.style.cursor = "pointer";
    el_tr.setAttribute("onclick", "func_tr_click(this);");
    el_tr.innerHTML = el_td;
    el_tbod.appendChild(el_tr);


  }

  return document.getElementById('tbod').innerHTML;
}


var top_bottom = "top";
function sortTable(num) {
  var r_tbody = document.getElementById('tbod');
  var ar_tr = r_tbody.getElementsByTagName('tr');
  var ar_tr_dom = new Array();
  for (var i = 0; i < ar_tr.length; i++) {
    ar_tr_dom[i] = ar_tr[i];
  }
  ar_tr_dom.sort(sortTr);
  function sortTr(tr1, tr2) {
    if (isNaN(tr1.childNodes[num].innerHTML) && isNaN(tr2.childNodes[num].innerHTML)) {
      tr1 = tr1.childNodes[num].innerHTML;
      tr2 = tr2.childNodes[num].innerHTML
    }
    else {
      tr1 = parseInt(tr1.childNodes[num].innerHTML);
      tr2 = parseInt(tr2.childNodes[num].innerHTML);
    }
    if (top_bottom == "bottom") {
      if (tr1 > tr2) {
        return 1;
      }
      else if (tr1 == tr2) {
        return 0;
      }
      else {
        return -1;
      }
    }
    else if (top_bottom == "top") {
      if (tr1 < tr2) {
        return 1;
      }
      else if (tr1 == tr2) {
        return 0;
      }
      else {
        return -1;
      }
    }

  }

  while (r_tbody.childNodes.length) {
    r_tbody.removeChild(r_tbody.childNodes[0]);
  }
  for (var i = 0; i < ar_tr_dom.length; i++) {
    r_tbody.appendChild(ar_tr_dom[i]);
  }
}

var win;
function func_tr_click(elem) {
  win = window.open('', '', 'width=400, height=400, left=' + (screen.width / 2 - 200) + ', top=' + (screen.height / 2 - 200) + ', scrollbars=1');
  win.document.write("<html><head></head><body>");
  win.document.write(elem.childNodes[0].innerHTML + "<br>");
  win.document.write("<span style='color:red; font-weight:bold;'>" + elem.childNodes[1].innerHTML + "</span><br>");
  win.document.write("<span style='background-color:lavender;'>" + elem.childNodes[2].innerHTML + "</span><br>");
  win.document.write("<span style='background-color:gold;'>" + elem.childNodes[3].innerHTML + "</span><br>");
  win.document.write("</body></html>");
}
//ДОМАШНЯЯ РАБОТА
//В предоставленный код (сверху таблицы) добавьте форму с поисковым полем и кнопкой (+ элемент <span>-ошибка : <span id="title_error" style="color:red; visibility:hidden;">Error format</span>)
//Необходимо  при  onclick на кнопке + onkeypress при Enter на поисковом поле (в т.ч. – отмена стандартного события на данном поле), используя регулярные выражения, провести клиентскую валидацию введенного пользователем значения (для данного этапа – допускаются только: латиница, кириллица, цифры и символ нижнего подчеркивания).
function validateText(text) {
  document.getElementById("tbod").innerHTML = '';//очищаем от старого поиска
  func_table();
  var reg = /^[а-яэ\w]+$/ig;
  if (reg.test(text)) {
    document.getElementById('title_error').style.visibility = "hidden";
    searchInTheText(text);//если введено верно, то передаем в функцию поиска и выделения совпадений
  } else {
    document.getElementById('title_error').style.visibility = "visible";//если ошибка, то показываем сообщение
  }
}
//…при удачной валидации введенного в поисковое поле формы текста, используя регулярные выражения, реализуйте алгоритм поиска и выделения его совпадения с текстом во всех столбцах:
function searchInTheText(text1) {
  var rBody = "(" + text1 + ")";
  var rKey = "gi";
  var r = new RegExp(rBody, rKey);
  var td = document.getElementById('tbod').getElementsByTagName('*');//берём массив всех элементов таблицы
  for (var i = 0; i < td.length; i++) {
    if (td[i].tagName === "TD") {//ищем все тд и ищем в них совпадения, выделяем
      td[i].style.backgroundColor = '';
      var t = td[i].innerText;
      var arr = t.match(r);
      if (arr) {
        //console.log("Найдено " + arr.length + " соответствий!");
        td[i].innerHTML = t.replace(r, "<b style='background-color: gold'><u>$1</u></b>");
      }
      else {
        //console.log("Соответствий нет!");
        document.forms[0].elements[0].focus();  // Фокусируемся на поле ввода
        console.log('no');
        td[i].style.backgroundColor = '';
      }
    }
  }
}