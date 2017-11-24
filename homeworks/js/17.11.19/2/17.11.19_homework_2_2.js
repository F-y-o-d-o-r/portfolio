/**
 * Created by fyodor popov on 20.11.2017. fyodor.work@gmail.com
 */

document.addEventListener("DOMContentLoaded", search2);//запускаем при загрузке страницы
function search2() {
  var textVal = decodeURIComponent(location.search.substr(9));//берём то что передали - слово которое нужно искать
  var pos = document.getElementById('div0').innerHTML.indexOf(textVal);//на какой позиции совпадение
  var i = 0;//для перебора элементов внутри текстового поля
  if (!textVal) {//если нет текста то..ато уходит в вечный цикл
    alert('Введите текст');
  } else {
    while (pos !== -1) {//перебираем весь текст пока есть совпадения
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


//я понял что всё заворачивается в функции и тогда не мешает, плюс добавляем if для проверки есть ли на странице..есть ещё такая штука, но я не понял как её использовать только при загрузке например только второй страницы..document.addEventListener('DOMContentLoaded', function(){ // Аналог $(document).ready(function(){ ..должен быть какой-то способ делать это, мне кажется, полностью из наружного файла без навешивания функции вконце страницы...в любом случае спасибо, буду теперь пытаться делать это таким способом чтобы работало на разных страницах, всё равно в конце, как я понимаю, всё компилируется в один минифицированных файл, так что без этого никак..
