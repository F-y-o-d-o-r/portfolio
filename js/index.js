/**
 * Created by pfyod on 03.10.2017.
 */
function about() {
    document.querySelector('.about').style.bottom = "-200px";
    document.querySelector('.contacts').style.bottom = "-100vh";
    document.querySelector('.portfolio').style.bottom = "-100vh";
}

function contacts() {
    document.querySelector('.contacts').style.bottom = "-200px";
    document.querySelector('.about').style.bottom = "-100vh";
    document.querySelector('.portfolio').style.bottom = "-100vh";
}

function portfolio() {
    document.querySelector('.portfolio').style.bottom = "-200px";
    document.querySelector('.contacts').style.bottom = "-100vh";
    document.querySelector('.about').style.bottom = "-100vh";
}