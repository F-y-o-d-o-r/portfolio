/**
 * Created by pfyod on 03.10.2017.
 */
function about() {
    document.querySelector('.about').style.left = "50%";
    document.querySelector('.contacts').style.left = "-50%";
    document.querySelector('.portfolio').style.left = "-50%";
    document.querySelector('.menu').style.left = "-50%";
    document.querySelector('.about').style.opacity = "1";
    document.querySelector('.contacts').style.opacity = "0";
    document.querySelector('.portfolio').style.opacity = "0";
    document.querySelector('.menu').style.opacity = "0";
    document.querySelector('nav ul li:nth-of-type(1) a').style.textDecoration = "underline";
    document.querySelector('nav ul li:nth-of-type(2) a').style.textDecoration = "";
    document.querySelector('nav ul li:nth-of-type(3) a').style.textDecoration = "";
}

function contacts() {
    document.querySelector('.contacts').style.left = "50%";
    document.querySelector('.about').style.left = "-50%";
    document.querySelector('.portfolio').style.left = "-50%";
    document.querySelector('.menu').style.left = "-50%";
    document.querySelector('.about').style.opacity = "0";
    document.querySelector('.contacts').style.opacity = "1";
    document.querySelector('.portfolio').style.opacity = "0";
    document.querySelector('.menu').style.opacity = "0";
    document.querySelector('nav ul li:nth-of-type(3) a').style.textDecoration = "underline";
    document.querySelector('nav ul li:nth-of-type(1) a').style.textDecoration = "";
    document.querySelector('nav ul li:nth-of-type(2) a').style.textDecoration = "";
}

function portfolio() {
    document.querySelector('.portfolio').style.left = "50%";
    document.querySelector('.contacts').style.left = "-50%";
    document.querySelector('.about').style.left = "-50%";
    document.querySelector('.menu').style.left = "-50%";
    document.querySelector('.about').style.opacity = "0";
    document.querySelector('.contacts').style.opacity = "0";
    document.querySelector('.portfolio').style.opacity = "1";
    document.querySelector('.menu').style.opacity = "0";
    document.querySelector('nav ul li:nth-of-type(2) a').style.textDecoration = "underline";
    document.querySelector('nav ul li:nth-of-type(1) a').style.textDecoration = "";
    document.querySelector('nav ul li:nth-of-type(3) a').style.textDecoration = "";
}

function menu() {
    document.querySelector('.menu').style.left = "50%";
    document.querySelector('.portfolio').style.left = "-50%";
    document.querySelector('.contacts').style.left = "-50%";
    document.querySelector('.about').style.left = "-50%";
    document.querySelector('.menu').style.opacity = "1";
    document.querySelector('.about').style.opacity = "0";
    document.querySelector('.contacts').style.opacity = "0";
    document.querySelector('.portfolio').style.opacity = "0";
    document.querySelector('.menu').style.opacity = "1";
    document.querySelector('nav ul li:nth-of-type(2) a').style.textDecoration = "";
    document.querySelector('nav ul li:nth-of-type(1) a').style.textDecoration = "";
    document.querySelector('nav ul li:nth-of-type(3) a').style.textDecoration = "";
}