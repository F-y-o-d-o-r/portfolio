/**
 * Created by fyodor popov on 19.11.2017. fyodor.work@gmail.com
 */
//При вводе поискового параметра – поиск и выделение соответствия на этой странице + появление ранее скрытой гиперссылки
//Используйте функцию Range-поиска и выделения, рассмотренную на соответствующем занятии.

//вешаем событие
var but = document.forms[0].elements[1];//button
but.addEventListener('click', clean);
but.addEventListener('click', zapusk);
var content = div0.innerHTML;//берём весь текст в котором ищем чтобы можно было очистить выделение спанами
var textVal;//текст в инпуте

function zapusk() {
  textVal = but.previousElementSibling.value;//берём текст в инпуте
  var pos = content.indexOf(textVal);//на какой позиции совпадение
  var i = 0;//для перебора элементов внутри текстового поля
  if (!textVal) {//если нет текста то..ато уходит в вечный цикл
    alert('Введите текст');
  } else {
    while (pos !== -1) {//перебираем весь текст пока есть совпадения
      document.getElementById('link').style.display = 'inline';//при совпадении появляется ссылка внизу
      var el_sp = document.getElementById('div0').childNodes[i];//берём текстовый узел в параграфе
      var newSpan = document.createElement('span');//создаём элемент в который обернём найденый элемент
      newSpan.style.backgroundColor = 'gold';
      var rng = document.createRange();//создаём выделение
      rng.setStart(el_sp, pos);
      rng.setEnd(el_sp, pos + textVal.length);
      rng.surroundContents(newSpan);
      i += 2;//если дальше есть такой же элемент, то перескочим выделенный спан и поищем дальше. +2 тк спан + внутри него текст
      newSpan = document.getElementById('div0').childNodes[i];//берём новую позицию для поиска, за спаном созданным
      var content_new = newSpan.textContent;//берём текст внутри следующего узла
      pos = content_new.indexOf(textVal);
    }
  }
}
function clean() {//очищаем выделения перед повторным поиском
  document.getElementById('div0').innerHTML = content;
}
//При щелчке на гиперссылку – переход на другую страницу (где также находится некий div с текстом для поиска в нем) и выделение найденного такого же фрагмента текста (если есть) уже на этой странице
document.getElementById('link').addEventListener('click', redirect);//вешаем событие на ссылку

function redirect() {//передаем введённый текст в инпуте на другую страниц
  location.href = '17.11.19_homework_2_2.html?textVal=' + textVal;
}

console.log('1');