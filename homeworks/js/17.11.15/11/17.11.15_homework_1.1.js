/**
 * Created by fyodor popov on 16.11.2017. fyodor.work@gmail.com
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
    el_tr.innerHTML = el_td;
    el_tbod.appendChild(el_tr);
  }
}

//Подключите рассмотренную на занятии функцию сортировки к шапке столбика «Профессия»:
//по возрастанию и по убыванию
//отслеживаем клики
var profButt = document.querySelector('table tbody tr td:nth-child(2)');
profButt.style.cursor = 'pointer';
profButt.style.backgroundColor = 'lightgrey';
profButt.addEventListener('click', sortTable);
//функция сортировки
var clickNum = 0;//первый - второй - первый клик - сортировка - обратная сортировка
function sortTable() {
  var rows = document.getElementById('tbod').children;//взяли все ряды
  var arr_sort = [];
  for (var i = 0; i < rows.length; i++) {
    arr_sort[i] = rows[i];
  }
  if (clickNum === 0) {
    clickNum = 1;
    console.log('1');
    arr_sort.sort(sort1);
  } else {
    clickNum = 0;
    console.log('2');
    arr_sort.sort(sort2);
  }
  function sort1(tr1, tr2) {//сортировка
    tr1 = tr1.childNodes[1].innerHTML;
    tr2 = tr2.childNodes[1].innerHTML;
    if (tr1 > tr2) {//<обратная сортировка
      return 1;
    }
    else if (tr1 === tr2) {
      return 0;
    }
    else {
      return -1;
    }
  }

  for (var j = 0; j < arr_sort.length; j++) {
    tbod.appendChild(arr_sort[j]);//переносит старые, не дублирует
  }
  function sort2(tr1, tr2) {//обратная сортировка
    tr1 = tr1.childNodes[1].innerHTML;
    tr2 = tr2.childNodes[1].innerHTML;
    if (tr1 < tr2) {
      return 1;
    }
    else if (tr1 === tr2) {
      return 0;
    }
    else {
      return -1;
    }
  }

  for (var j = 0; j < arr_sort.length; j++) {
    tbod.appendChild(arr_sort[j]);//переносит старые, не дублирует
  }
}