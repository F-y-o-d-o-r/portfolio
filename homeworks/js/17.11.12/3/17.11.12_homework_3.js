/**
 * Created by fyodor popov on 13.11.2017. fyodor.work@gmail.com
 */
//…В продолжение примера, рассмотренного на занятии (формирование контента таблицы из <span>)
//На странице разместите еще 2-а блока <div> (+ к <div> с 3-мя <span> с названием товара) с некоторыми id, в которых :
//-1-й – 3-и <img> с изображением товара;
//-2-й – 3-и <span> с ценой товара.
//При загрузке страницы (или по гипперсылке) – из содержимого 3-х <div> должно формироваться содержимое таблицы, как изображено на рисунке :
function func_table() {
    var arr_span = document.getElementById('tovar').getElementsByTagName('span');
    var arr_img = document.body.querySelectorAll('div img');
    var arr_price = document.getElementById('price').getElementsByTagName('span');
    var arr_inner = new Array();
    var arr_inner_img = new Array();
    var arr_inner_price = new Array();
    for (var i = 0; i < arr_span.length; i++) {
        arr_inner[i] = arr_span[i].innerHTML;
    }
    for (var i = 0; i < arr_img.length; i++) {
        arr_inner_img[i] = arr_img[i].outerHTML;
    }
    for (var i = 0; i < arr_price.length; i++) {
        arr_inner_price[i] = arr_price[i].innerHTML;
    }
    var el_tbody = document.getElementById('tbody');
    for (var j = 0; j < arr_inner.length; j++) {
        var el_tr = document.createElement('tr');
        var el_td = '<td>' + arr_inner[j] + '</td>' + '<td>' + arr_inner_img[j] + '</td>' + '<td>' + arr_inner_price[j] + '</td>';
        el_tr.innerHTML = el_td;
        el_tbody.appendChild(el_tr)
    }

}