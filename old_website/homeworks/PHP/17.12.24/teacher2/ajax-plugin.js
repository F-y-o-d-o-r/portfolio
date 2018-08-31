var req;
var elem;
//!!! - ГЛОБАЛЬНАЯ (т.к. для post_send(get_send) и func_response) elem - ЭЛЕМЕНТ ДЛЯ ВЫВОДА
//################################################# ФОРМИРОВАНИЕ И ОТПРАВКА POST
//!!!ВЫЗОВ - например, post_send(elemm, 'function.php', ['param'], [param.value])
function post_send(elemm, program, param_arr, value_arr) {                   //!!! - элемент - elemm, скрипт - program, массивы - param_arr, value_arr
  elem = elemm;                                                              //!!! - поступивший elemm присваиваем глобальному elem
  req = new XMLHttpRequest();                                                // ПЕРВЫЙ ЭТАП - создаем объект XMLHttpRequest()
  req.open('POST', program, true);                                           // ВТОРОЙ ЭТАП – создаем запрос POST– запрос
                                                                             //создаем - POST – запрос, program - выполняемый POST- скрипт php, true – асинхронная передача (false - синхронная – до получения ответа от сервера пользователь ничего не сможет сделать на странице – поэтому применяется крайне редко)
                                                                             // !!! - скрипт - program
  req.onreadystatechange = func_response;                                    // ТРЕТИЙ ЭТАП – инициализируем функцию приема результата (в т.ч. – проверки при приеме)
                                                                             //!!! - инициализация функции проверки и приема// func_response – задание функции проверки и получения ответных данных (отрабатывается позже)
  req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); // ЧЕТВЕРТЫЙ ЭТАП – добавляет http-заголовок (только для POST!!!)
                                                                             //!!! - заголовок
  var str = '';                                                              //!!! - начальный str=''
  for (var i = 0; i < param_arr.length; i++) {                               //!!! - массивы - перебор
    // ПЯТЫЙ ЭТАП – «упаковываем» (создаем) http - запрос
    // отправляемые входные данные необходимо «упаковать» в строку типа http
    str += param_arr[i] + '=' + encodeURIComponent(value_arr[i]) + '&';      //!!! - накапливаем str
  }
  req.send(str);                                                             // ШЕСТОЙ ЭТАП – передаем запрос POST на сервер
                                                                             //!!! - отправка
}
//################################################# ФОРМИРОВАНИЕ И ОТПРАВКА GET
//!!!ВЫЗОВ - например, get_send(elemm, 'function.php', ['param'], [param.value])
function get_send(elemm, program, param_arr, value_arr) {                  //!!! - элемент - elemm, скритпт - program, массивы - param_arr, value_arr
  elem = elemm;                                                            //!!! - поступивший elemm присваиваем глобальному elem
  req = new XMLHttpRequest();
  var str = '?';                                                           //!!! - начальный str='?'
  for (var i = 0; i < param_arr.length; i++) {                             //!!! - массивы - перебор
    str += param_arr[i] + '=' + encodeURIComponent(value_arr[i]) + '&';    //!!! - накапливаем str
  }
  req.open('GET', program + str, true);                                    //!!! - скритпт - program + str
  req.onreadystatechange = func_response;                                  //!!! - инициализация функции проверки и приема
  req.send();                                                              //!!! - отправка
}
//################################################# ФОРМИРОВАНИЕ И ОТПРАВКА jQuery
//!!!ПРИ ИСПОЛЬЗОВАНИИ ПОДКЛЮЧИТЕ jQuery!!!
//!!!ВЫЗОВ - jquery_send(elemm, 'post', 'function.php', ['param'], [param.value])
function jquery_send(elemm, method, program, param_arr, value_arr) {
  var str = '';                                                                //!!! - начальный str=''
  for (var i = 0; i < param_arr.length; i++) {                                 //!!! - массивы - перебор
    str += param_arr[i] + '=' + encodeURIComponent(value_arr[i]) + '&';        //!!! - накапливаем str
  }
  $.ajax({
    type: method, url: program, data: str, success: function (data) {
      $(elemm).html(data);
    } //!!! - ВЫВОД В ЭЛЕМЕНТ ТУТ - function(data){$('elemm').html(data);
  });
}
//################################################# ПРИЕМ ОТ СЕРВЕРА И ВЫВОД В ЭЛЕМЕНТ
function func_response() {                                                 //!!! - функция проверки и приема
  // ПЕРВЫЙ ЭТАП – проверка кода готовности сервера и кода ответа сервера
  if (req.readyState == 4 && req.status == 200) {                          //!!! - проверка условий "успех"// свойство readyState - код готовности сервера, значение 4 – «обработка запроса» (первое стандартное условие для получения ответа)
    // свойство status – код ответа сервера, значение 200 – «запрос обработан успешно» (второе стандартное условие для получения ответа)
    elem_r = document.getElementById(elem);                                //!!! - получаем элемен для вывода// ВТОРОЙ ЭТАП – получение ответа сервера
    elem_r.innerHTML = req.responseText;                                   //!!! - ВЫВОД В ЭЛЕМЕНТ (переданный в post_send(get_send) elemm)
                                                                           // свойство responseText – получение ответа сервера в виде строки и вывод
  }
}