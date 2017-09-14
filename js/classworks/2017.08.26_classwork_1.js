//1 next & previous slide
var num = 1;
img1 = new Image ();
img1.src = "https://www.jssor.com/demos/img/landscape/01.jpg";
img2 = new Image ();
img2.src = "https://www.jssor.com/demos/img/photography/010.jpg";
img3 = new Image ();
img3.src = "https://www.jssor.com/demos/img/photography/011.jpg";

function slideshow() {
    num = num + 1
    if (num == 4) {
        num = 1
    }
    document.slides.src = eval("img" + num + ".src")
}
function slideshowBack() {
    num = num - 1
    if (num < 1) {
        num = 3
    }
    document.slides.src = eval("img" + num + ".src")
}
//2 auto slider

var k = 1;

function ref() {
    k = 5;
}

function succpict() {
    var d = document
    if (k <= 4) {
        if (k == 1) {
            d.mypict.src = "https://www.jssor.com/demos/img/landscape/01.jpg";
            k++
        } else if (k == 2) {
            d.mypict.src = "https://www.jssor.com/demos/img/photography/010.jpg";
            k++
        } else if (k == 3) {
            d.mypict.src = "https://www.jssor.com/demos/img/photography/011.jpg";
            k++
        } else if (k == 4) {
            d.mypict.src = "https://www.jssor.com/demos/img/landscape/01.jpg";
            k = 1
        }
        setTimeout("succpict()", 2000)
    }
}

//3 what day is today?
var date1 = new Date();
var today = date1.getDay();
if (today <= 5) alert("Будний день")
else if (today == 6) alert("Суббота")
else alert("Выходной")

//4 ternarnaya operaciya
var mark = 5;
var answer = (mark == 5)?"Good!":"Bad";
alert(answer);

//5 switch

var candy = 3;
switch(candy) {
    case 1:
        alert("One candy");
        break;
    case 2:
    case 3:
        alert("Two ore three candies");
        break;
    case 4:
        alert("Four");
        break;
    default:
        alert("dont cknow");
}