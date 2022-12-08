// function toggleMenu() {
//     var menu = document.getElementById("a1");
//     console.log(menu);
//     menu.classList.toggle("hide");
// }



var opt={
    "oLanguage":{"sUrl":"/dataTables.json"},
    "bJQueryUI":true,
    "sPaginationType":"full_numbers",
    "order": [ 0, 'desc' ]
   /*
   更改字顏色
    ,"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
     switch(aData[0]){
         case '2017-02-05':
             $(nRow).css('color', 'red')
             break;
         case 'BBBB':
             $(nRow).css('color', 'green')
             break;
         case 'CCCC':
             $(nRow).css('color', 'blue')
             break;
     }
 }
 */
};


$(document).ready(function () {
    $("#table_1").DataTable(opt);
});

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("bg-gray-300");
        var panel = this.nextElementSibling;
        if (panel.style.display == "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
