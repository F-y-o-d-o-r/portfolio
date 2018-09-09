/**
 * Created by fyodor popov on 03.12.2017. fyodor.work@gmail.com
 */

function func_go(seats_count) {
  var r = /^\d+$/;
  if (r.test(seats_count) && seats_count !== "") {
    not_number.style.visibility = 'hidden';
    if (form_seats.elements[0].checked) {
      func_create(seats_count);
    } else if (r.test(seats_count) && seats_count !== "") {
      func_select(seats_count);
    }
  } else not_number.style.visibility = 'visible';
}

function func_create(seats_count) {
  var el_tbody = document.getElementById("tbody");
  el_tbody.innerHTML = '';

  var el_td = '';
  for (var i = 1; i <= seats_count; i++) {
    if (i % 10 !== 0) {//При создании мест они выстаивались бы не в одну строку, а были бы «разделены» на «десятки»
      el_td += "<td value = '0'>" + i + "</td>";
    } else {
      var el_tr = document.createElement('tr');
      el_td += "<td value = '0'>" + i + "</td>";
      el_tr.innerHTML = el_td;
      el_tbody.appendChild(el_tr);
      el_td = '';
    }
  }
  var el_tr = document.createElement('tr');
  el_tr.innerHTML = el_td;
  el_tbody.appendChild(el_tr);
}

function func_select(seats_count) {
  func_free();
  func_seats_select(seats_count);
}

function func_free() {
  var arr_td = tbody.getElementsByTagName('td');
  arr_free = new Array();
  count_free = 0;
  for (var i = 0; i < arr_td.length; i++) {
    if (arr_td[i].getAttribute('value') === '0') {
      arr_free[count_free] = arr_td[i];
      count_free++;
    }
  }
}

function func_seats_select(seats_count) {
  if (seats_count <= arr_free.length) {
    not_enough.style.visibility = 'hidden';
    count_free = Math.floor(Math.random() * arr_free.length);
    for (var i = 0; i < seats_count; i++) {
      arr_free[count_free].style.backgroundColor = "red";
      arr_free[count_free].setAttribute("value", "1");
      arr_free.splice(count_free, 1);
      count_free = Math.floor(Math.random() * arr_free.length);
    }
  } else {
    not_enough.style.visibility = 'visible';
  }
}

var arr_free = new Array();
var count_free = 0;