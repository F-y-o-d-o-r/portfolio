var req;
var elem;                                                                  //!!! - ГЛОБАЛЬНАЯ (т.к. для post_send(get_send) и func_response) elem - ЭЛЕМЕНТ ДЛЯ ВЫВОДА
//################################################# ФОРМИРОВАНИЕ И ОТПРАВКА POST
//!!!ВЫЗОВ - например, post_send(elemm, 'function.php', ['param'], [param.value])
function post_send(elemm, program, param_arr, value_arr) {                 //!!! - элемент - elemm, скритпт - program, массивы - param_arr, value_arr
  elem = elemm;                                                                //!!! - поступивший elemm присваиваем глобальному elem
  req = new XMLHttpRequest();
  req.open('POST', program, true);                                           //!!! - скритпт - program
  req.onreadystatechange = func_response;                                      //!!! - инициализация функции проверки и приема
  req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); //!!! - заголовок
  var str = '';                                                                    //!!! - начальный str=''
  for (var i = 0; i < param_arr.length; i++) {                                    //!!! - массивы - перебор
    str += param_arr[i] + '=' + encodeURIComponent(value_arr[i]) + '&';             //!!! - накапливаем str
  }
  req.send(str);                                                             //!!! - отправка
}
//################################################# ФОРМИРОВАНИЕ И ОТПРАВКА GET
//!!!ВЫЗОВ - например, get_send(elemm, 'function.php', ['param'], [param.value])
function get_send(elemm, program, param_arr, value_arr) {                  //!!! - элемент - elemm, скритпт - program, массивы - param_arr, value_arr
  elem = elemm;                                                                //!!! - поступивший elemm присваиваем глобальному elem
  req = new XMLHttpRequest();
  var str = '?';                                                               //!!! - начальный str='?'
  for (var i = 0; i < param_arr.length; i++) {                                    //!!! - массивы - перебор
    str += param_arr[i] + '=' + encodeURIComponent(value_arr[i]) + '&';            //!!! - накапливаем str
  }
  req.open('GET', program + str, true);                                        //!!! - скритпт - program + str
  req.onreadystatechange = func_response;                                      //!!! - инициализация функции проверки и приема
  req.send();                                                                //!!! - отправка
}
//################################################# ФОРМИРОВАНИЕ И ОТПРАВКА jQuery
//!!!ПРИ ИСПОЛЬЗОВАНИИ ПОДКЛЮЧИТЕ jQuery!!!
//!!!ВЫЗОВ - jquery_send(elemm, 'post', 'function.php', ['param'], [param.value])
function jquery_send(elemm, method, program, param_arr, value_arr) {
  var str = '';                                                                //!!! - начальный str=''
  for (var i = 0; i < param_arr.length; i++) {                                    //!!! - массивы - перебор
    str += param_arr[i] + '=' + encodeURIComponent(value_arr[i]) + '&';             //!!! - накапливаем str
  }
  $.ajax({
    type: method, url: program, data: str, success: function (data) {
      $(elemm).html(data);
    } //!!! - ВЫВОД В ЭЛЕМЕНТ ТУТ - function(data){$('elemm').html(data);
  });
}
//################################################# ПРИЕМ ОТ СЕРВЕРА И ВЫВОД В ЭЛЕМЕНТ
function func_response() {                                                 //!!! - функция проверки и приема
  if (req.readyState == 4 && req.status == 200) {                                //!!! - проверка условий "успех"
    elem_r = document.getElementById(elem);                                  //!!! - получаем элемен для вывода
    elem_r.innerHTML = req.responseText;                                   //!!! - ВЫВОД В ЭЛЕМЕНТ (переданный в post_send(get_send) elemm)
  }
}
