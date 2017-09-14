//https://learn.javascript.ru/form-elements

//1

function vvod() {
    fio.innerText = fio.innerText + prompt("Введите Ф.И.О.", "");
    age.innerText = age.innerText + prompt("Введите возраст", "");
    email.innerText = email.innerText + prompt("Введите e-mail", "");
}

//2

function vvod2() {
    var d = prompt("Введите Ф.И.О.", "");

    fio1.innerHTML = fio1.innerHTML + "<font color='Pink'>" + d + "</font>";

    d = prompt("Введите возраст", "");

    age1.innerHTML = age1.innerHTML + "<font color='Blue'>" + d + "</font>";

    d = prompt("Введите e-mail", "");

    email1.innerHTML = email1.innerHTML + "<font color='Red'><em>" + d + "</em></font>";

    fio1.style.backgroundColor = "LightBlue";
    fi01.style.fontFamily = "sans-serif";
    age1.style.backgroundColor = "Aquamarine";
    email1.style.backgroundColor = "LightBlue";
    email1.style.backgroundColor = "sans-serif";
}

//3

function add() {
    my.inf.value = my.inf.value + my.fio.value + "\n";
    my.inf.value = my.inf.value + my.age.value + "\n";//age 2d variant the same as 1st

    var elements = document.getElementsByName("gender");
    for (var i = 0, len = elements.length; i < len; ++i) {
        if (elements[i].checked) {
            my.inf.value = my.inf.value + "Пол: " + elements[i].value + "\n";
        }
    }

    if (my.Checkbox1.checked == true)
        my.inf.value = my.inf.value + "Английский\n";
    if (my.Checkbox2.checked == true)
        my.inf.value = my.inf.value + "Французский\n";
    if (my.Checkbox3.checked == true)
        my.inf.value = my.inf.value + "Немецкий\n";
    my.inf.value = my.inf.value + "\n";

    my.Reset1.disabled = false;

}

//4

function checkAll() {
    var ans = "не верно";
    var p1 = document.getElementById("c1");
    var p2 = document.getElementById("c2");
    var p3 = document.getElementById("c3");
    var p4 = document.getElementById("result");

    if (p1.checked && !p2.checked && p3.checked) ans = "Верно";

    p4.value = ans;

}
