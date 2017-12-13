/**
 * Created by pfyod on 04.12.2017.
 */
$(document).ready(function () {
  $('body').on('keypress', '[name="seats_count"]', function (e) {
    if (event.which === 13) {
      func_go($(this).val());
      e.preventDefault();
    }
  });
  $('body').on('click', '[class="form_but"]', function () {
    var val = $('.form_tex').val();
    func_go(val);
  });

  function func_go(seats_count) {
    var r = /^\d+$/;
    if (r.test(seats_count) && seats_count !== "") {
      $('#not_number').css('visibility', 'hidden');
      if ($(':input[name="rd"]:checked').val() === 'Create') {
        func_create(seats_count);
      } else if (r.test(seats_count) && seats_count !== "") {
        func_select(seats_count);
      }
    } else $('#not_number').css('visibility', 'visible');
  }

  function func_create(seats_count) {
    var el_tbody = $('#tbody');
    $(el_tbody).html('');
    var el_tr = '';
    var el_td = '';
    for (var i = 1; i <= seats_count; i++) {
      if (i % 10 !== 0) {//При создании мест они выстаивались бы не в одну строку, а были бы «разделены» на «десятки»
        el_td += "<td value = '0'>" + i + "</td>";
      } else {
        el_td += "<td value = '0'>" + i + "</td>";
        el_tr = '<tr>' + el_td + "</tr>";
        $(el_tbody).append(el_tr);
        el_td = '';
      }
    }
    el_tr = '<tr>' + el_td + "</tr>"
    $(el_tbody).append(el_tr);
  }

  function func_select(seats_count) {
    func_free();
    func_seats_select(seats_count);
  }

  function func_free() {
    arr_free = new Array();
    count_free = 0;
    $('td').each(function () {
      if ($(this).attr('value') === '0') {
        arr_free[count_free] = this;
        count_free++;
      }
    })
  }

  function func_seats_select(seats_count) {
    if (seats_count <= arr_free.length) {
      $('#not_enough').css('visibility', 'hidden');
      count_free = Math.floor(Math.random() * arr_free.length);
      for (var i = 0; i < seats_count; i++) {
        $(arr_free[count_free]).css('background-color', 'red');
        $(arr_free[count_free]).attr("value", "1");
        arr_free.splice(count_free, 1);
        count_free = Math.floor(Math.random() * arr_free.length);
      }
    } else {
      $('#not_enough').css('visibility', 'visible');
    }
  }

  var arr_free = new Array();
  var count_free = 0;
});