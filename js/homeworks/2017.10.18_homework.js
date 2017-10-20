/**
 * Created by fyodor on 19.10.2017. fodor.work@gmail.com
 */
//1. Разобрать JSON получить объект и вывести его содержимое. Определить количество вложенных объектов и вывести их. Собрать вложенные объекты и перевести их в JSON формат по отдельности.
//{
//    "widget": {
//    "debug": "on",
//        "window": {
//            "title": "Sample Konfabulator Widget",
//            "name": "main_window",
//            "width": 500,
//            "height": 500
//    },
//    "image": {
//            "src": "Images/Sun.png",
//            "name": "sun1",
//            "hOffset": 250,
//            "vOffset": 250,
//            "alignment": "center"
//    },
//    "text": {
//            "data": "Click Here",
//            "size": 36,
//            "style": "bold",
//            "name": "text1",
//            "hOffset": 250,
//            "vOffset": 100,
//            "alignment": "center",
//            "onMouseUp": "sun1.opacity = (sun1.opacity / 100) * 90;"
//    }
//  }
//}
//так как вы дали не JSON а объект, вручную сделал из него JSON
var json1 = '{"widget":{"debug":"on","window":{"title": "Sample Konfabulator Widget","name": "main_window","width": 500,"height": 500 },    "image": { "src": "Images/Sun.png", "name": "sun1",        "hOffset": 250,        "vOffset": 250,        "alignment": "center" },    "text": { "data": "Click Here", "size": 36, "style": "bold",        "name": "text1",        "hOffset": 250,        "vOffset": 100,        "alignment": "center", "onMouseUp": "sun1.opacity = (sun1.opacity / 100) * 90;" } }}';
//Разобрать JSON получить объект
var obj = JSON.parse(json1);
//вывести его содержимое.
var out2 = '<b>Содержимое объекта</b><br>' ;
var insObj = 0;
var insObjIns = 0;
for (var key in obj) {
    if (typeof obj[key] == 'object') {
        insObj++
        out2 += " <i>Ключ: </i>" + key + " <i>; значение:  </i>" + obj[key] + "<br>";
        for (var key2 in obj[key]) {
            out2 += " <i>Ключ:  </i>" + key2 + "<i>; значение: </i>" + obj[key][key2] + "<br>";
            if (typeof obj[key][key2] == 'object') {
                insObj++
                insObjIns++
                for (var key3 in obj[key][key2]) {
                    out2 += "<i>Ключ: </i>" + key3 + "<i>; значение: </i>" + obj[key][key2][key3] + "<br>";
                }
            }
        }

    } else out2 += "<i>Ключ: </i>" + key + "<i>; значение: </i>" + obj[key] + "<br>";
}
document.body.insertAdjacentHTML('beforeEnd', '<div>' + out2 + '</div>');
//Определить количество вложенных
document.body.insertAdjacentHTML('beforeEnd', '<br><div>' + 'Всего объектов: ' + insObj + '<br>Вложеных объектов: ' + insObjIns + '</div><br>');
//Вывести вложенные объекты
var out3 = '';
for (var key in obj) {
    if (typeof obj[key] == 'object') {
        for (var key2 in obj[key]) {
            if (typeof obj[key][key2] == 'object') {
                out3 += '<b>' + key2 + '</b><br>';
                for (var key3 in obj[key][key2]) {
                    out3 += "<i>Ключ: </i>" + key3 + "<i>; значение: </i>" + obj[key][key2][key3] + "<br>";
                }
            }
        }

    } else out2 += "<i>Ключ: </i>" + key + "<i>; значение: </i>" + obj[key] + "<br>";
}
document.body.insertAdjacentHTML('beforeEnd', '<div>' + out3 + '</div>');
//Собрать вложенные объекты и перевести их в JSON формат по отдельности.
var jsonOut1 = JSON.stringify(obj.widget.window, '', 4);
var jsonOut2 = JSON.stringify(obj.widget.image, '', 4 );
var jsonOut3 = JSON.stringify(obj.widget.text, '', 4);

document.body.insertAdjacentHTML('beforeEnd', ['<br><b>JSON формат трех объектов по отдельности: </b><br>' + jsonOut1,jsonOut2,jsonOut3]);
//console.log(jsonOut1,jsonOut2,jsonOut3);

//2. Создать форму с разными элементами (input, select, textbox, radio, checkbox). Заполнить элементы формы джаваскриптом. Все поля должны быть задействованы при заполнении. Добавить кнопку на форму для очистки формы. Действие – очистка всех полей, приведение их к пустым значениям.
//Заполнить элементы формы джаваскриптом.
var form = document.forms[0];
//inputs
form.one.value = 'FormValue1';
form.elements.two.value = 'FormValue2';
form.elements[2].value = 'FormValue3';
form.elements[3].value = 'FormValue4';
form.elements[4].value = 'FormValue5';
//selects
form.elements.select1.options[0].text = 'option1';
form.elements.select1.options[0].value = 'option1';
form.elements.select1.options[1].text = 'option2';
form.elements.select1.options[1].value = 'option2';
form.elements.select1.options[1].selected = true;
form.elements.select1.options[2].text = 'option3';
form.elements.select1.options[2].value = 'option3';
form.elements.select1.options[2].selected = true;
form.elements.select1.options[3].text = 'option4';
form.elements.select1.options[3].value = 'option4';
form.elements.select1.options[4].text = 'option5';
form.elements.select1.options[4].value = 'option5';
var xxx = new Option('created option', 'option6', true, true);
form.elements.select1.append(xxx);

//textarea
form.elements[6].value = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolore exercitationem, nihil numquam provident quidem reiciendis similique tenetur vero voluptates?';
//radio
form.elements.radio[3].checked = true;
//checkbox
form.elements.checkthisout[1].checked = true;
form.elements.checkthisout[3].checked = true;
//Добавить кнопку на форму для очистки формы. Действие – очистка всех полей, приведение их к пустым значениям.
var reset = document.createElement('input');
reset.setAttribute('type','reset');
form.appendChild(reset);