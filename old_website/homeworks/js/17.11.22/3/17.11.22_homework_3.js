/**
 * Created by fyodor popov on 24.11.2017. fyodor.work@gmail.com
 */
//Используя регулярные выражения, напишите js-аналог php-функции trim (удаление «начальных» и «конечных» пробелов в строке, которая должна передаваться в эту функцию в виде параметра), например :
//js-АНАЛОГ trim
//function js_trim(s) {
//…
//  s = 'a' + s + 'a'; //ПРОВЕРКА –ДОЛЖНО БЫТЬ ВЫВЕДЕНО aHello, Alexa
//  return s;
//}
//var str = '  Hello, Alex  ';  //ПРОВЕРКА – В ФУНКЦИЮ ПОСТУПАЕТ СТРОКА С «ПРОБЕЛАМИ» (НЕВАЖНО, СКОЛЬКО) С ОБОИХ СТОРОН
//alert(js_trim(str));

document.forms[0].elements[1].addEventListener('click', go);
function go() {
  var val = document.forms[0].elements[0].value;
  var out = document.getElementById('exit');
  var regexp = /^\s+\w+\s+$/gi;
  console.log(val);
  //var xxx = val.replace(/^\s+/, '').replace(/\s+$/, '');//вариант 1 замены
  var xxx = val.replace(/^\s+|\s+$/g, '');//вариант 2 замены
  out.innerHTML = '<pre>' + xxx + '</pre>';
}
