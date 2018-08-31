function func_go(seats_count) {
  var r = /^\d+$/;
  if (r.test(seats_count)) {
    not_number.style.visibility = 'hidden';
    if (form_seats.elements[0].checked) {
      func_create(seats_count);
    } else {
      func_select(seats_count);
    }
  } else not_number.style.visibility = 'visible';
}

function func_create(seats_count) {
  tbody.innerHTML = '';
  var el_tr = document.createElement('tr');
  var el_td = '';
  for (var i = 1; i <= seats_count; i++) {
    el_td += "<td value = '0'>" + i + "</td>";
  }
  el_tr.innerHTML = el_td;
  tbody.appendChild(el_tr);
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
    count_free = 0;
    for (var i = 0; i < seats_count; i++) {
      arr_free[count_free].style.backgroundColor = "red";
      arr_free[count_free].setAttribute("value", "1");
      count_free++;
    }
  } else {
    not_enough.style.visibility = 'visible';
  }
}


var arr_free = new Array();
var count_free = 0;