/**
 * Created by pfyod on 21.09.2017.
 */

function cup(name, image, color, price) {
    this.name = name;
    this.image = image;
    this.color = color;
    this.price = price;
    this.product = function product() {
       // document.body.style.color = 'red';
        document.body.innerHTML += "<div><h1>" + this.name + "</h1>" + this.image + "<br><h2>" + this.color + "</h2><h3>" + "<button>" + this.price + " грн.</button></h3>" +"</div>";
    }
}

var cup_green = new cup('Самая зелёная чашка в городе','<img height="300px" src="../../../img/cups/cup_green.png" alt="cup__green">','Зелёная',230);
cup_green.product();

var cup_brown = new cup('Самая коричневая чашка в городе','<img height="300px" src="../../../img/cups/cup_brown.png" alt="cup__brown">','Коричневая',340);
cup_brown.product();

var cup_blue = new cup('Самая голубая чашка в городе','<img height="300px" src="../../../img/cups/cup_blue.png" alt="cup__blue">','Голубая',275);
cup_blue.product();

var cup_paper = new cup('Самая бумажная чашка в городе','<img height="300px" src="../../../img/cups/cup_paper.png" alt="cup__blue">','Бумажная',2735);
cup_paper.product();