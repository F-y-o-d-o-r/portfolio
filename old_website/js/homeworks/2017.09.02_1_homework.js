/**
 * Created by pfyod on 04.09.2017.
 */
document.write("<section>");

document.write("<div class='block'>");
document.write("<p style='text-align: center; font-weight: bold'>For</p>");

var n = 10;
var s;

document.write("<table>");

for (i = 1; i <= n; i = i + 1) {

    document.write("<tr>");
    for (j = 1; j <= n; j = j + 1) {
        if (j <= i) s = "class='yellow'";
        else s = "class='blue'";
        document.write("<td " + s + "></td>");
    }

    document.write("</tr>");
}

document.write("</table>");

document.write("</div>");

//2nd
document.write("<div class='block'>");

document.write("<p style='text-align: center; font-weight: bold' class='p1'>While</p>");

var n = 10;
var s;
var i = 1;
var j;

document.write("<table>");

while (i <= n) {
    i++;
    document.write("<tr>");

    j = 1;
    while (j <= n) {
        j++;
        if (j <= i) s = "class='yellow'";
        else s = "class='blue'";
        document.write("<td " + s + "></td>");
    }

    document.write("</tr>");
}
document.write("</table>");

document.write("</div>");

//3d
document.write("<div class='block'>");

document.write("<p style='text-align: center; font-weight: bold' class='p1'>Do...While</p>");

var n = 10;
var s;
var i = 1;
var j;

document.write("<table>");

do {
    document.write("<tr>");

    j = 1;

    do {
        if (j <= i) s = "class='yellow'";
        else s = "class='blue'";
        document.write("<td " + s + "></td>");
        j++
    } while (j <= n);

    document.write("</tr>");
    i++;
} while (i <= n);


document.write("</table>");
document.write("<div>");

document.write("</section>");

//one more (puh)

document.write("<section>");

document.write("<div class='block'>");
document.write("<p style='text-align: center; font-weight: bold'>For (2nd variant)</p>");

var n = 10;
var s;

document.write("<table>");

for (i = 1; i <= n; i = i + 1) {

    document.write("<tr>");
    for (j = 1; j <= n; j = j + 1) {
        st = (j - i) < 0;
        document.writeln(st);
        if (st == 0) s = "class='yellow'";
        else s = "class='blue'";
        document.write("<td " + s + "></td>");
    }

    document.write("</tr>");
}

document.write("</table>");

document.write("</div>");
