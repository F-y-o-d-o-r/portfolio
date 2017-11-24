/**
 * Created by fyodor popov on 19.11.2017. fyodor.work@gmail.com
 */

//В модели checkbox реализуйте алгоритм, дающий возможность выбрать из, например, 5 имеющихся «флажков» любые 3-и (при выборе любых 3-х, оставшиеся невыбранными любые 2-а блокируются)
//сняли выбор с, например, одного из 3-х выбранных  – все разблокированы
//!!!ИСПОЛЬЗУЙТЕ ТОЛЬКО ОДИН ЦИКЛ for В КОДЕ…
var form1 = document.forms['form1'];
form1.addEventListener('change', check);//повесим событие
var col = 0;//считаем кол-во отмеченных чекбоксов
function check(e) {
  //считаем кол-во отмеченных чекбоксов
  if (e.target.checked) {
    ++col;
    console.log(col);
  } else {
    --col;
    console.log(col);
  }
  //ходимс по чекбоксам и блокируем когда надо
  for (var i = 0; i < form1.length; i++) {
    if (col >= 3) {
      if (!form1.elements[i].checked) {
        form1.elements[i].disabled = true;
      }
    } else if (col < 3) {
      form1.elements[i].disabled = false;
    }
  }
}
//так приятнее
document.body.style.backgroundColor = '#f5e7c6';