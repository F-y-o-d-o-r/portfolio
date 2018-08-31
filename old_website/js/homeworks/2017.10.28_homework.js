/**
 * Created by fyodor on 28.10.2017. fyodor.work@gmail.com
 */
//1. Распарсить файл json.txt в объект с вложенными объектами. Создать программу с использованием рекурсии для прохода по всем вложенным объектам и вывода информации из них. Попробуйте организовать красивый вывод данных с отступами в зависимости от количества вложений (чем глубже – тем больше отступ).
//var object = {
//    "product": "Live JSON generator",
//    "version": 3.1,
//    "releaseDate": "2014-06-25T00:00:00.000Z",
//    "demo": true,
//    "person": {
//        "id": 12345,
//        "name": "John Doe",
//        "phones": {
//            "home": "800-123-4567",
//            "mobile": "877-123-1234"
//        },
//        "email": [
//            "jd@example.com",
//            "jd@example.org"
//        ],
//        "dateOfBirth": "1980-01-02T00:00:00.000Z",
//        "registered": true,
//        "emergencyContacts": [
//            {
//                "name": "Jane Doe",
//                "phone": "888-555-1212",
//                "relationship": "spouse"
//            },
//            {
//                "name": "Justin Doe",
//                "phone": "877-123-1212",
//                "relationship": "parent"
//            }
//        ]
//    }
//};
var json = '{"product": "Live JSON generator","version": 3.1,"releaseDate": "2014-06-25T00:00:00.000Z","demo": true,"person":{"id":12345,"name":"John Doe","phones":{"home": "800-123-4567","mobile": "877-123-1234"},"email":["jd@example.com","jd@example.org"],"dateOfBirth":"1980-01-02T00:00:00.000Z","registered":true,"emergencyContacts":[{"name":"Jane Doe","phone": "888-555-1212","relationship": "spouse"},{"name": "Justin Doe","phone":"877-123-1212","relationship": "parent"}]}}';
//Распарсить файл json.txt в объект с вложенными объектами.
var objOfJson = JSON.parse(json);
//Создать программу с использованием рекурсии для прохода по всем вложенным объектам и вывода информации из них.
var v = '';
document.body.insertAdjacentHTML('beforeEnd', '<b>Без отступов</b><br><br>');
//1вариант рабочий
function vivod(x) {
    if (typeof x === 'object') {
        for (var key in x) {
            v += "<i>Ключ: </i>" + key + "<i>; значение:  </i>" + x[key] + '.<br> ';
            vivod(x[key]);
        }
    }
}
vivod(objOfJson);
var div = document.createElement('div');
div.innerHTML = v;
document.body.appendChild(div);
//2 вариант
/*function vivod(x) {
 if (typeof x === 'object') {
 j += 30;
 var div = document.createElement('div');
 document.body.appendChild(div);
 for (var key in x) {
 div.style.marginLeft = j + 'px';
 var p = document.createElement('p');
 p.innerHTML = "<i>Ключ: </i>" + key + "<i>; значение:  </i>" + x[key] + '.';
 div.appendChild(p);
 vivod(x[key]);
 }
 }*/
//2 вариант c отступами
/*document.body.insertAdjacentHTML('beforeEnd', '<br><b>C отступами</b><br>');
 var j = 0;
 function vivod3(x) {
 if (typeof x === 'object') {
 j += 30;
 var div = document.createElement('div');
 div.style.marginLeft = j + 'px';
 document.body.appendChild(div);
 for (var key in x) {
 var span = document.createElement('span');
 span.innerHTML = "<i>Ключ: </i>" + key + "<i>; значение:  </i>" + x[key] + '<br>';
 div.appendChild(span);
 vivod3(x[key]);
 }
 }
 }
 vivod3(objOfJson);*/
//3 вариант
/*var j = 0;
 function vivod(x) {
 j += 50;
 var div = document.createElement('div');
 document.body.appendChild(div);
 //div.style.marginLeft = j + 'px';
 for (var key in x) {
 div.style.marginLeft = j + 'px';
 var p = document.createElement('p');
 p.innerHTML = "<i>Ключ: </i>" + key + "<i>; значение:  </i>" + x[key] + '.';
 div.appendChild(p);
 if (typeof x[key] === 'object') {
 vivod(x[key])
 }
 }
 }*/
//3 вариант c отступами
var j = 0;
document.body.insertAdjacentHTML('beforeEnd', '<br><b>C отступами</b><br><br>');
function vivod4(x) {
    var div = document.createElement('div');
    div.style.marginLeft = j + 'px';
    document.body.appendChild(div);
    j += 20;
    for (var key in x) {
        var span = document.createElement('span');
        span.innerHTML = "<i>Ключ: </i>" + key + "<i>; значение:  </i>" + x[key] + '<br>';
        div.appendChild(span);
        if (typeof x[key] === 'object') {
            vivod4(x[key]);
            j -= 20;
        }
    }
}
vivod4(objOfJson);
//Попробуйте организовать красивый вывод данных с отступами в зависимости от количества вложений (чем глубже – тем больше отступ).
//как добавлять в каждый внутренний объект по дополнительному табу?
// var j = 0;
//с отступами
/*document.body.insertAdjacentHTML('beforeEnd', '<br><b>C отступами</b><br>');

 function vivod2(x) {
 if (typeof x === 'object') {
 var p = document.createElement('p');
 document.body.appendChild(p);
 j += 20;
 p.style.marginLeft = j + 'px';
 for (var key in x) {
 var span = document.createElement('span');
 span.innerHTML += "<i>Ключ: </i>" + key + "<i>; значение:  </i>" + x[key] + '.<br> ';
 p.appendChild(span);
 vivod2(x[key]);
 }
 }
 }
 vivod2(objOfJson);*/
/*var str = JSON.stringify(objOfJson, '', '...');
 //console.log(str);
 div.innerText += str;*/

//2. Создать программу для вывода данных из вложенных массивов (создать массив самостоятельно).
//создать массив самостоятельно
/*var arr = ["Яблоко", "Апельсин", [1, 2, 3, ['Черешня', 5]], "Груша"];
 //Создать программу для вывода данных из вложенных массивов
 var vv2 = '';

 function vivodMassiva(y) {
 if (typeof y === 'object') {
 for (var i = 0; i < y.length; i++) {
 vv2 += "<i>Ключ: </i>" + i + "<i>; значение:  </i>" + y[i] + '.<br> ';
 vivodMassiva(y[i]);
 }
 }
 }
 vivodMassiva(arr);
 console.log(vv2);
 div.innerHTML += vv2;*/
//2 вариант
document.body.insertAdjacentHTML('beforeEnd', '<br><b>Задание 2</b><br><br>');
var arr = ["Яблоко", "Апельсин", [1, 2, 3, ['Черешня', 5]], "Груша"];
function vivodMassiva2(y) {
    var divX = document.createElement('div');
    document.body.appendChild(divX);
    for (var i = 0; i < y.length; i++) {
        divX.innerHTML += "<i>Ключ: </i>" + i + "<i>; значение:  </i>" + y[i] + '.<br> ';
        if (typeof y[i] === 'object') {
            vivodMassiva2(y[i])
        }
    }
}
vivodMassiva2(arr);