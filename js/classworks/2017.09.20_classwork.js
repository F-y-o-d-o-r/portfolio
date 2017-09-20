/**
 * Created by pfyod on 19.09.2017.
 */
var namePlanets = ["Венера", "Меркурий", "Земля", "Марс",];

namePlanets.push("Юпитер");
document.writeln("<hr>" + "Количество элементов в массиве: " + namePlanets.length + "<br>");

for (var i = 0; i <= namePlanets.length - 1; i++) {
    document.writeln(i + " элемент массива = " + namePlanets[i] + "<br>");
}