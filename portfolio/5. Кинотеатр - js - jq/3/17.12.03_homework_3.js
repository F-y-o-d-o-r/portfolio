/**
 * Created by fyodor popov on 03.12.2017. fyodor.work@gmail.com
 */
//3.Весь js-код оформите в виде ооп-кода (объект, свойства-переменные, методы-функции).
//4.В имеющуюся форму (name="form_seats") добавьте первым элементом :
//… и дополните имеющийся алгоритм (ооп-код) таким образом, чтобы :
//-при выборе в выпадающем меню пункта big – введенное для создания количество мест разбивалось на 20-ки :
//-при выборе в выпадающем меню пункта little (оно же – по умолчанию) – введенное для создания количество мест разбивалось на 10-ки

var cinema = (function () {
  $(document).ready(function () {
    $('body').on('keypress', '[name="seats_count"]', function (e) {
      if (event.which === 13) {
        cinema.func_go($('.form_tex').val());
        e.preventDefault();
      }
    });
    $('body').on('click', '[class="form_but"]', function () {
      var val = $('.form_tex').val();
      cinema.func_go(val);
    });
    $('body').on('change', '[name="select_little_big"]', function () {
      if ($('[name="select_little_big"] :selected').val() === '10') {
        cinema.x = 10;
      } else {
        cinema.x = 20;
      }
    });
  });

  return {
    func_go: function (seats_count) {
      var r = /^\d+$/;
      if (r.test(seats_count) && seats_count !== "") {
        $('#not_number').css('visibility', 'hidden');
        if ($(':input[name="rd"]:checked').val() === 'Create') {
          cinema.func_create(seats_count);
        } else if (r.test(seats_count) && seats_count !== "") {
          cinema.func_select(seats_count);
        }
      } else $('#not_number').css('visibility', 'visible');
    },
    func_create: function (seats_count) {
      var el_tbody = $('#tbody');
      $(el_tbody).html('');
      var el_tr = '';
      var el_td = '';
      for (var i = 1; i <= seats_count; i++) {
        if (i % cinema.x !== 0) {//При создании мест они выстаивались бы не в одну строку, а были бы «разделены» на «десятки»
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
    },
    func_select: function (seats_count) {
      cinema.func_free();
      cinema.func_seats_select(seats_count);
    },
    func_free: function () {
      arr_free = new Array();
      count_free = 0;
      $('td').each(function () {
        if ($(this).attr('value') === '0') {
          arr_free[count_free] = this;
          count_free++;
        }
      })
    },
    func_seats_select: function (seats_count) {
      if (seats_count <= arr_free.length) {
        $('#not_enough').css('visibility', 'hidden');
        cinema.count_free = Math.floor(Math.random() * arr_free.length);
        for (var i = 0; i < seats_count; i++) {
          $(arr_free[cinema.count_free]).css('background-color', 'red');
          $(arr_free[cinema.count_free]).attr("value", "1");
          arr_free.splice(cinema.count_free, 1);
          cinema.count_free = Math.floor(Math.random() * arr_free.length);
        }
      } else {
        $('#not_enough').css('visibility', 'visible');
      }
    },
    //arr_free: new Array(),
    count_free: 0,
    x: 10//кол-во в строке элементов
  }
})();