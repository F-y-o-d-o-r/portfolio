/**
 * Created by pfyod on 30.08.2017.
 */
var num = 1;
img1 = new Image();
img1.src = "../../../img/js/slider_1/pic1.jpg";
img2 = new Image();
img2.src = "../../../img/js/slider_1/pic2.jpg";
img3 = new Image();
img3.src = "../../../img/js/slider_1/pic3.jpg";
img4 = new Image();
img4.src = "../../../img/js/slider_1/pic4.jpg";
img5 = new Image();
img5.src = "../../../img/js/slider_1/pic5.jpg";

function slider() {
    num = num + 1;
    if (num > 5) {
        num = 1
    }
    document.slides.src = eval("img" + num + ".src");
}
function slider_back() {
    num = num - 1;
    if (num < 1) {
        num = 5
    }
    document.slides.src = eval("img" + num + ".src");
}