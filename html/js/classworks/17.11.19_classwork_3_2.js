function func_load() {
    var str_url = decodeURIComponent(location.href);
    var str_id = str_url.substr(str_url.indexOf('=') + 1);
    document.getElementById(str_id).style.color = 'red';
}
//Дано :
//Две страницы : index.html, page.html, на каждой из них два одинаковых div (c id div1, div2)
//Файл script.js (пустой)

//Необходимо :
//Click на определенном div (с определенным id) на странице index.html -> с использованием метода location.href переход на страницу page.html с выделением на ней фоновым //цветом div с тем же id.
//Функция выделения на странице page.html должна быть описана во внешнем файле script.js и вызываться при полной загрузке страницы.
