/**
 * Created by Student on 19.08.2017.
 */


document.write('hellow');
document.write('<p>fff</p>');

document.write("<p>абзац 1</p>");
document.writeln("<p>абзац 2"); //ln - add line wrapping
document.write("абзац 2</p>");
document.write("<p>абзац 3</p>");

// \n - give line wrapping
var t = "text";
alert(t);
var t = "text_1";
alert(t + " text_2");
var t = "text_1";
alert(t + "\n" + "text_2");

// confirm
var result = confirm("Is it ok or not?");
if (result) alert("Yes," + "\n" + "its ok!");
else alert("Yes, its not ok!");

// prompt
var str = prompt("2*2=", "0");
if (str == "4") alert("right!")
else alert("not right!");
str = prompt("enter first number:", "0");
x = parseInt(str);
str = prompt("enter second number", "0");
y = parseInt(str);
s = x + y;
alert("summ is " + s);



// Date
var today = new Date();
var god = today.getFullYear();
alert(god);

// Date
var dr = new Date(1958, 4, 21);
dn = dr.getDay();
alert(dn);

// what day of the week is today
var dr = new Date(2017, 7, 19);
dn = dr.getDay();
if (dn == 0) alert("Today is Sunday");
if (dn == 1) alert("Today is Munday");
if (dn == 2) alert("Today is Tuseday");
if (dn == 3) alert("Today is Wensday");
if (dn == 4) alert("Today is Thersday");
if (dn == 5) alert("Today is Friday");
if (dn == 6) alert("Today is Saturday");

// Date
var date = new Date();
document.write(date.getTime())
getTime();