$(document).ready(function() {
$("body").on("click", "#form_but", function() {seats.radio(form_seats.seats_count.value);});
$("body").on("keypress", "#form_tex", function() {if(event.which==13) {seats.radio(form_seats.seats_count.value);return false;}});
$("body").on("change", "[name='select_little_big']", function() {seats.little_big=form_seats.select_little_big.options[form_seats.select_little_big.selectedIndex].value;});
});

var seats={

   little_big:10,

   radio: function(seats_count) {
      if(!isNaN(seats_count) && seats_count!="") {
         $("#not_number").css("visibility", "hidden");
         if(form_seats.elements[1].checked) {
            this.create(seats_count);
         }
         else if(form_seats.elements[2].checked) {
            this.select(seats_count);
         }
      }
      else {
         $("#not_number").css("visibility", "visible");
      }
   },
};

seats.create=function(seats_count_create) {
      $("tr").remove();
      var el_td="";
      for(var i=1; i<=seats_count_create; i++) {
         el_td+="<td value='0'>"+i+"</td>";
         if(!(i%this.little_big) || i==seats_count_create) {
           el_td="<tr>"+el_td+"</tr>";
           $("tbody").append(el_td);
           el_td="";
         }
      }
}

seats.arr_free=new Array();
seats.count_free=0;

seats.select=function(seats_count) {
      seats.seats_free();
      seats.seats_select(seats_count);
}

seats.seats_free=function() {
      var arr_td=document.getElementById("tbody").getElementsByTagName("td");
      seats.arr_free=new Array();
      seats.count_free=0;
      for(var i=0; i<arr_td.length; i++) {
         if($(arr_td[i]).attr("value")=="0") {
           seats.arr_free[seats.count_free]=arr_td[i];
           seats.count_free++;
         }
      }
}

seats.seats_select=function(seats_count) {
   if(seats_count<=seats.arr_free.length) {
      $("#not_enough").css("visibility", "hidden");
      //this.count_free=0;  //!!!random
      //!!!
      seats.count_free=Math.floor(Math.random()*seats.arr_free.length);
      //!!!
      for(var i=1; i<=seats_count; i++) {
         $(seats.arr_free[seats.count_free]).css("background-color", "red");
         $(seats.arr_free[seats.count_free]).attr("value", "1");
         //!!!
         seats.arr_free.splice(seats.count_free, 1);
         //!!!
         //this.count_free++;  //!!!random
         //!!!
         seats.count_free=Math.floor(Math.random()*seats.arr_free.length);
         //!!!
      }
   }
   else {
      $("#not_enough").css("visibility", "visible");
   }
}

