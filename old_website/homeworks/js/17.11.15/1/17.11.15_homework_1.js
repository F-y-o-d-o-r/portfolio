/**
 * Created by fyodor popov on 16.11.2017. fyodor.work@gmail.com
 */

function sortTable(num) {
    var r_tbody = document.getElementById('price');
    arr = document.getElementById('price').getElementsByTagName('tr');
    var arr_sort = new Array();
    for (var i = 0; i < arr.length; i++) {
        arr_sort[i] = arr[i];
    }
    arr_sort.sort(sortTr);
    function sortTr(tr1, tr2) {
        if (isNaN(tr1.children[num].innerHTML) && isNaN(tr2.childNodes[num].innerHTML)) {
            tr1 = tr1.children[num].innerHTML;
            tr2 = tr2.children[num].innerHTML
        }
        else {
            tr1 = parseInt(tr1.children[num].innerHTML);
            tr2 = parseInt(tr2.children[num].innerHTML);
        }
        if (tr1 > tr2) {
            return 1;
        }
        else if (tr1 == tr2) {
            return 0;
        }
        else {
            return -1;
        }
    }

    for (var i = 0; i < arr_sort.length; i++) {
        //arr[i].innerHTML = arr_sort[i];//arr[i] - dom objects
        price.appendChild(arr_sort[i]);//переносит старые, не дублирует
    }
}
function cng() {
    if (form1.select1.selectedIndex !== 0) {
        sortTable(form1.select1.selectedIndex)
    }
}
//Дополните код, рассмотренный на занятии таким образом, чтобы последняя строка таблицы, содержащая, например, некую гиперссылку, имела вид «на всю ширину таблицы» (<tr><td colspan="3"><a href="#">Перейти на другую страницу</a></td></tr>):
//Данная дополнительная строка должна быть добавлена таким образом, чтобы сортировка по столбцу (в данном случае - «Товар») происходила в обычном порядке (визуально + отсутствие ошибок в отладчике), а добавленная строка так и оставалась в конце таблицы :
document.querySelector('table').insertAdjacentHTML('beforeEnd', '<tbody><tr><td colspan="3"><a href="#">Перейти на другую страницу</a></td></tr></tbody>');