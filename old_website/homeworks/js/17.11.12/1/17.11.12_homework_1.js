/**
 * Created by fyodor on 13.11.2017. fyodor.work@gmail.com
 */
//Исходная ситуация (!!!для данной задачи - стили фонового цвета определены «внутри» каждого из элементов div, остальные стили можете (размеры, позицию) можете определить в любом месте за пределами элемента div (например, в секции <style> элемента <head> или во внешнем файле стилей)): + «пустой» div изначально отсутствует):

//1.При нажатии на закрашенный квадратик – внизу появляется пустой div:
var color;
function operFunc(el) {
    if (document.getElementById('new_div')) {
        document.getElementById('new_div').style.backgroundColor = '';
        color = el.style.backgroundColor;
    } else {
        color = el.style.backgroundColor;
        var div = document.createElement('div');
        div.setAttribute('id', 'new_div');
        div.setAttribute('onclick', 'colorChange(this)');
        document.body.insertBefore(div, null);
    }
}
//2.При нажатии на пустой div он окрашивается в цвет ранее нажатого вверху:
function colorChange(el) {
    el.setAttribute('style', 'background-color:' + color);
}
//3.При повторном нажатии на закрашенный квадратик вверху – нижний приобретает «исходный» цвет (белый) (здесь термин «приобретает» может означать, например, не изменение его стиля, а его удаление и создание заново):
//4.При повторном нажатии на пустой div он опять окрашивается в цвет ранее нажатого вверху: