/**
 * Created by fyodor popov on 16.11.2017. fyodor.work@gmail.com
 */

//При щелчке (события onclick не прописываются «жестко» в исходном коде html, а «подвешиваются динамически» при загрузке страницы) на ПЕРВОЙ любой ячейке («ПЕРВАЯ КОНТРОЛЬНАЯ ТОЧКА»), она окрашивается, например, в желтый цвет :
//При щелчке на ВТОРОЙ любой ячейке («ВТОРАЯ КОНТРОЛЬНАЯ ТОЧКА»), она окрашивается, например, в красный цвет :
var tb = document.getElementById('tb');
tb.addEventListener('click', whatTd);
var clicks = 0;//считаем первый - второй клик
var rng, rng2, start1, finish1;
function whatTd(e) {
  if (e.target.tagName === 'TD' && clicks === 0) {
    rng = document.createRange();
    e.target.style.backgroundColor = 'gold';
    start1 = e.target;
    ++clicks;
  } else if (e.target.tagName === 'TD' && clicks === 1) {
    e.target.style.backgroundColor = 'red';
    finish1 = e.target;
    if (Number(finish1.innerHTML) > Number(start1.innerHTML)) { //если сначала меньшее число
      rng.setStartBefore(start1);
      rng.setEndAfter(finish1);
      setTimeout(resort, 1000);
      --clicks;
    } else { //если сначала большее число
      rng.setStartBefore(finish1);
      rng.setEndAfter(start1);
      setTimeout(resort, 1000);
      --clicks;
    }
  }
  function resort() {//удалим что было и выложим по новой оставшееся
    rng.deleteContents();//удалим выделенное
    tb = document.getElementById('tb').children;
    var tmpArr = [];//сюда поместим все оставшиеся td
    for (var i = 0; i < tb.length; i++) {
      for (var j = 0; j < tb[i].children.length; j++) {
        tmpArr.push(tb[i].children[j]);
      }
    }
    //выведем в новую таблицу
    var out = '<tr>';
    var tr = 0;
    for (var i = 0; i < tmpArr.length; i++) {
      out += '<td>' + tmpArr[i].innerHTML + '</td>';
      tr++;
      if (tr % 5 === 0) {
        out += '</tr>';
      }
    }
    document.getElementById('tb').innerHTML = out;
  }
}