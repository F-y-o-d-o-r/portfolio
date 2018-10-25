//var elem;
var req;
//################################################# ФОРМИРОВАНИЕ И ОТПРАВКА POST
//!!!ВЫЗОВ - например, post_send(elemm, 'function.php', ['param'], [param.value])//onclick="post_send('tbody', 'function.php', ['search_what'], [search_what.value])"
//onclick="post_send('download-search', 'form-dowload.php', [], []);" - просто передача страницы целиком
export function post_send(elemm, program, param_arr, value_arr) {
  //!!! - элемент - elemm - id, скрипт - program, массивы - param_arr, value_arr
  //elem = elemm; //!!! - поступивший elemm присваиваем глобальному elem
  req = new XMLHttpRequest(); // ПЕРВЫЙ ЭТАП - создаем объект XMLHttpRequest()
  req.open('POST', program, true); // ВТОРОЙ ЭТАП – создаем запрос POST– запрос
  //создаем - POST – запрос, program - выполняемый POST- скрипт php, true – асинхронная передача (false - синхронная – до получения ответа от сервера пользователь ничего не сможет сделать на странице – поэтому применяется крайне редко)
  // !!! - скрипт - program
  req.onreadystatechange = func_response; // ТРЕТИЙ ЭТАП – инициализируем функцию приема результата (в т.ч. – проверки при приеме)
  //!!! - инициализация функции проверки и приема// func_response – задание функции проверки и получения ответных данных (отрабатывается позже)
  req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); // ЧЕТВЕРТЫЙ ЭТАП – добавляет http-заголовок (только для POST!!!)
  //!!! - заголовок
  var str = ''; //!!! - начальный str=''
  for (var i = 0; i < param_arr.length; i++) {
    //!!! - массивы - перебор
    // ПЯТЫЙ ЭТАП – «упаковываем» (создаем) http - запрос
    // отправляемые входные данные необходимо «упаковать» в строку типа http
    str += param_arr[i] + '=' + encodeURIComponent(value_arr[i]) + '&'; //!!! - накапливаем str
  }
  req.send(str); // ШЕСТОЙ ЭТАП – передаем запрос POST на сервер
  //!!! - отправка
}

export function func_response() {
  //!!! - функция проверки и приема
  // ПЕРВЫЙ ЭТАП – проверка кода готовности сервера и кода ответа сервера
  if (req.readyState === 4 && req.status === 200) {
    //!!! - проверка условий "успех"// свойство readyState - код готовности сервера, значение 4 – «обработка запроса» (первое стандартное условие для получения ответа)
    // свойство status – код ответа сервера, значение 200 – «запрос обработан успешно» (второе стандартное условие для получения ответа)
    //console.log('sent');
    // let form = new BackForm();
    // form.handleShow();
    // console.log('sent2');
    //var elem_r = document.getElementById(elem); //!!! - получаем элемен для вывода// ВТОРОЙ ЭТАП – получение ответа сервера
    //var elem_r = document.querySelector('body'); //!!! - получаем элемен для вывода// ВТОРОЙ ЭТАП – получение ответа сервера
    //elem_r.innerHTML = req.responseText; //!!! - ВЫВОД В ЭЛЕМЕНТ (переданный в post_send(get_send) elemm)
    // свойство responseText – получение ответа сервера в виде строки и вывод
  }
}
