//1

function change_interface() {
    document.body.style.background = my.color.value;
    document.body.style.color = my.color_text.value;
    var el = document.getElementsByTagName("p");
    for (var i = 0; i < el.length; i++) {
        el[i].style.fontSize = my.size.value + 'px';
    }
}

//2

function execute1() {
    var a = parseFloat(calc1.x1.value);
    var b = parseFloat(calc1.y1.value);
    switch (calc1.op1.value) {
        case '+':
            calc1.res1.value = a + b;
            break;
        case '-':
            calc1.res1.value = a - b;
            break;
        case '*':
            calc1.res1.value = a * b;
            break;
        case '/':
            if (b == 0) {
                alert('no!')
            } else calc1.res1.value = a / b;
    }
}

//3
function execute() {
    var a = parseFloat(calc.x.value);
    var b = parseFloat(calc.y.value);
    var elements = document.getElementsByName("op");
    for (var i = 0, len = elements.length; i < len; ++i) {
        if (elements[i].checked) {
            if (elements[i].value == "+") {
                calc.res.value = a + b;
            }
            if (elements[i].value == "-") {
                calc.res.value = a - b;
            }
            if (elements[i].value == "*") {
                calc.res.value = a * b;
            }
            if (elements[i].value == "/") {
                if (b == 0) {
                    alert("На ноль делить нельзя!")
                } else {
                    calc.res.value = a / b;

                }
            }

        }
    }
}

//4

function validfn(fnm) {
    fnlen = fnm.length;
    if (fnlen == 0) {
        console.log("enter your name");
        document.dataentry.fn.focus()
    }
}

function validphone(phone) {
    len = phone.length;
    digits = "0123456789";
    if (len != 7 && len != 9) {
        console.log("Неверное количество знаков в номере");
        document.dataentry.phone.focus()
    }
    for (i = 0; i < 3; i++) {
        if (digits.indexOf(phone.charAt(i)) < 0) {
            alert("Это должны быть цифры");
            document.dataentry.phone.focus();
            break;
        }
    }
}