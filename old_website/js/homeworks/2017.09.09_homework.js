/**
 * Created by pfyodor on 14.09.2017.
 */

function todo() {
    result1.value = "Пожалуйста проверьте данные: " + "\n" + "\n";

    if (login.value == false) {
        result1.value += "ВЫ НЕ ВВЕЛИ ЛОГИН!" + "\n";
    } else result1.value += "Ваш новый логин: " + login.value + "\n";

    if (pass.value == false) {
        result1.value += "ВЫ НЕ ВВЕЛИ ПАРОЛЛЬ!" + "\n";
    } else result1.value += "Ваш новый пароль: " + pass.value + "\n";

    if (town.value == false) {
        result1.value += "ВЫ НЕ ВВЕЛИ ГОРОД ПРОЖИВАНИЯ!" + "\n";
    } else result1.value += "Ваш город проживания: " + town.value + "\n";

    if (cat.checked == true)
        result1.value += "Вы любите кошек" + "\n";
    if (dog.checked == true)
        result1.value += "Вы любите собак" + "\n";
    if (dog.checked != true && cat.checked !== true)
        result1.value += "ВЫ НЕ ВВЕЛИ ВАШЕГО ЛЮБИМОГО ЖИВОТНОГО!" + "\n";

    var gender = document.getElementsByName("gender");

    for (var i = 0, len = gender.length; i < len; ++i) {
        if (gender[i].checked) {
            result1.value += "Ваш пол: " + gender[i].value;
        }
    }
    res.style.right = "0px";
}
