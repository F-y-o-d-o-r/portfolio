function func_go(seats_count) {
  not_number.style.visibility = "hidden";
  if (form_seats.elements[0].checked) {
    if (!isNaN(seats_count) && seats_count !== "") {
      func_create(seats_count);
    }
    else {
      not_number.style.visibility = "visible";
    }
  }
  else if (form_seats.elements[1].checked) {
    if (!isNaN(seats_count) && seats_count !== "") {
      func_select(seats_count);
    }
    else {
      not_number.style.visibility = "visible";
    }
  }
}

function func_create(seats_count_create) {
  var el_tbody = document.getElementById("tbody");
  while (el_tbody.childNodes.length) {
    el_tbody.removeChild(el_tbody.childNodes[0]);
  }
  var el_tr = document.createElement("tr");
  var el_td = "";
  for (var i = 0; i < seats_count_create; i++) {
    el_td += "<td value='0'>" + (i + 1) + "</td>";
  }
  el_tr.innerHTML = el_td;
  el_tbody.appendChild(el_tr);
}

var arr_free = new Array();
var count_free = 0;
function func_select(seats_count_select) {
  arr_free = new Array();
  count_free = 0;
  func_seats_free();
  func_seats_select(seats_count_select);
}

function func_seats_free() {
  var arr_td = document.getElementById("tbody").getElementsByTagName("td");
  for (var i = 0; i < arr_td.length; i++) {
    if (arr_td[i].getAttribute("value") == "0") {
      arr_free[count_free] = arr_td[i];
      count_free++;
    }
  }
}

function func_seats_select(seats_select_value) {
//alert(seats_select_value+" - "+arr_free.length);
  not_enough.style.visibility = "hidden";
  if (seats_select_value <= arr_free.length) {
    //count_free=0;  //!!!random
    //!!!
    count_free = Math.floor(Math.random() * arr_free.length);
    //!!!
    for (var i = 0; i < seats_select_value; i++) {
      arr_free[count_free].style.backgroundColor = "red";
      arr_free[count_free].setAttribute("value", "1");
      //!!!
      arr_free.splice(count_free, 1);
      //!!!
      //count_free++;  //!!!random
      //!!!
      count_free = Math.floor(Math.random() * arr_free.length);
      //!!!
    }
  }
  else {
    not_enough.style.visibility = "visible";
  }
}



