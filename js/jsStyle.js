var numberPolygon = 1;
$(document).ready(function () {
    $(".room").click(function () {
        var newPoylgen = document.createElementNS("http://www.w3.org/2000/svg", "polygon");
        newPoylgen.setAttribute("points", "0,0 210,0 210,210 0,210");
        newPoylgen.setAttribute("fill", "5e5545");
        newPoylgen.setAttribute("id", numberPolygon);
        numberPolygon++;

        newPoylgen.setAttribute("transform", "translate(5,5)");
        newPoylgen.addEventListener("mousedown", mousedownPolygon);
        newPoylgen.addEventListener("mousemove", mousemovePolygon);
        newPoylgen.addEventListener("mouseup", mouseupPolygon);
        newPoylgen.addEventListener("dblclick", dbclickPolygon);




        $("#room").append(newPoylgen);
    });
});
var selectedElement = null;
var currentX = 0;
var currentY = 0;
function mousedownPolygon(e) {
    currentX = e.clientX;
    currentY = e.clientY;
    selectedElement = e.target;
    e.target.setAttribute("style", "stroke:red;stroke-width:7");

}
function mousemovePolygon(e) {
    // if there is an active element, move it around by updating its coordinates           
    if (selectedElement) {

        var result = (selectedElement.getAttribute("transform").match(/\d+/g) || []).map(n => parseInt(n));
        var dx = result[0] + e.clientX - currentX;
        var dy = result[1] + e.clientY - currentY;
        currentX = e.clientX;
        currentY = e.clientY;
        selectedElement.setAttribute("transform", "translate(" + dx + "," + dy + ")");
    }
}
function mouseupPolygon(e) {
    e.target.setAttribute("style", "stroke:red;stroke-width:1");

    selectedElement = null;
}
function dbclickPolygon(e) {

    e.target.setAttribute("style", "stroke:red;stroke-width:12");
    console.log("ok");
}
/*********************************************************** */
/**** */


// for inc and dec heigth and width :
$("#custom").hide();
$("#decHrect").click(function () {
    $("#inputHrect").attr("value", parseInt(custom.attr("height")) - 1);
    custom.attr("height", $("#inputHrect").attr("value"));
})
$("#decWrect").click(function () {
    $("#inputWrect").attr("value", parseInt(custom.attr("width")) - 1);
    custom.attr("width", $("#inputWrect").attr("value"));

})
$("#incWrect").click(function () {
    $("#inputWrect").attr("value", parseInt(custom.attr("width")) + 1);
    custom.attr("width", $("#inputWrect").attr("value"));

})
$("#incHrect").click(function () {
    $("#inputHrect").attr("value", parseInt(custom.attr("height")) + 1);
    custom.attr("height", $("#inputHrect").attr("value"));

})
// for inc and dec heigth and width :

// algoritem for change design 
$("#otherChange").click(function () {
    var elem = $("svg rect.rect");
    var elems = Array.from(elem);
    var ranx;
    var rany;
    var i = 0;
    var flagfor = true;
    for (i = 0; i < elems.length; i++) {
        flagfor = true;
        while (flagfor) {
            ranx = Math.floor((Math.random() * 400)) + 550;
            rany = Math.floor((Math.random() * 400)) + 250;
            if (rany < 651 - parseInt($(elems[i]).attr("height"))
                && ranx < 951 - parseInt($(elems[i]).attr("width"))) {
                $(elems[i]).attr("y", rany);
                $(elems[i]).attr("x", ranx);
                flagfor = false;
            }
        }


    }
    var arrRect = [];
    var arrRect1 = [];

    var x;
    var y;
    var id;

    for (i = 0; i < elems.length; i++) {
        id = parseInt($(elems[i]).attr("id"));
        x = parseInt($(elems[i]).attr("x"));
        y = parseInt($(elems[i]).attr("y"));
        widRect = parseInt($(elems[i]).attr("width"));
        heiRect = parseInt($(elems[i]).attr("height"));
        rect = new Array(x, y, x + widRect, y, x + widRect, y + heiRect, x, y + heiRect, id);
        arrRect.push(rect);
        arrRect1.push(rect);


    }
    var elem_NOT_MOVE = $("svg rect.rect1");
    elem_NOT_MOVE = Array.from(elem_NOT_MOVE);

    for (t = 0; t < elem_NOT_MOVE.length; t++) {
        id = parseInt($(elem_NOT_MOVE[t]).attr("id"));
        x = parseInt($(elem_NOT_MOVE[t]).attr("x"));
        y = parseInt($(elem_NOT_MOVE[t]).attr("y"));
        widRect = parseInt($(elem_NOT_MOVE[t]).attr("width"));
        heiRect = parseInt($(elem_NOT_MOVE[t]).attr("height"));
        rect = new Array(x, y, x + widRect, y, x + widRect, y + heiRect, x, y + heiRect, id);
        arrRect1.push(rect);
    }

    var flag = true;
    var flag1 = true;
    var flag2 = true;
    while (flag) {
        flag = false;
        flag1 = true;
        for (f = 0; f < arrRect.length && flag1; f++) {
            for (i = 0; i < 8 && flag1; i = i + 2) {
                for (j = 0; j < arrRect1.length && flag1; j++) {
                    if (arrRect[f][8] != arrRect1[j][8]) {
                        if ((arrRect[f][i] >= arrRect1[j][0] && arrRect[f][i] <= arrRect1[j][2] &&
                            arrRect[f][i + 1] >= arrRect1[j][1] && arrRect[f][i + 1] <= arrRect1[j][7])
                            || (arrRect[f][1] <= arrRect1[j][1] && arrRect[f][7] >= arrRect1[j][7] &&
                                arrRect[f][0] >= arrRect1[j][0] && arrRect[f][2] <= arrRect1[j][2])
                        ) {
                            while (flag1) {
                                ranx = Math.floor((Math.random() * 400)) + 550;
                                rany = Math.floor((Math.random() * 400)) + 250;
                                if (rany < 651 - parseInt($(elems[f]).attr("height"))
                                    && ranx < 951 - parseInt($(elems[f]).attr("width"))
                                ) {
                                    $(elems[f]).attr("y", rany);
                                    $(elems[f]).attr("x", ranx);
                                    widRect = parseInt($(elems[f]).attr("width"));
                                    heiRect = parseInt($(elems[f]).attr("height"));
                                    arrRect[f][0] = ranx;
                                    arrRect[f][1] = rany;
                                    arrRect[f][2] = ranx + widRect;
                                    arrRect[f][3] = rany;
                                    arrRect[f][4] = ranx + widRect;
                                    arrRect[f][5] = rany + heiRect;
                                    arrRect[f][6] = ranx;
                                    arrRect[f][7] = rany + heiRect;
                                    arrRect1[f][0] = ranx;
                                    arrRect1[f][1] = rany;
                                    arrRect1[f][2] = ranx + widRect;
                                    arrRect1[f][3] = rany;
                                    arrRect1[f][4] = ranx + widRect;
                                    arrRect1[f][5] = rany + heiRect;
                                    arrRect1[f][6] = ranx;
                                    arrRect1[f][7] = rany + heiRect;
                                    flag1 = false;
                                    flag = true;
                                    console.log(arrRect);
                                    console.log(arrRect1);


                                }
                            }
                        }
                        /////////

                    }

                }
            }
        }


    }
})
// algoritem for change design 
//insert data for mysql
$("#end").click(function () {
    var elemEnd = $("#polygon");
    var pointselem = elemEnd.attr("points");
    console.log(elemEnd);
    console.log(pointselem);
    var userLogin = document.getElementById("user");
    console.log(userLogin);

    userLogin = userLogin.innerHTML;
    var userl = parseInt(userLogin);


    $.post("insert.php", { polygon: "polygon", user: userl, polpoints: pointselem }, function (res, status) { });
    var SelemEnd2 = $(".END2");
    var elemsEnd2 = Array.from(SelemEnd2);
    var arrRectEnd_x = [];
    var arrRectEnd_y = [];
    var arrRectEnd_style = [];

    for (i = 0; i < elemsEnd2.length; i++) {
        arrRectEnd_x.push(parseInt($(elemsEnd2[i]).attr("x")));
        arrRectEnd_y.push(parseInt($(elemsEnd2[i]).attr("y")));
        arrRectEnd_style.push($(elemsEnd2[i]).attr("style"));
    }
    console.log(arrRectEnd_x);
    console.log(arrRectEnd_y);

    console.log(arrRectEnd_style);



    $.post("insert.php", { rect: "rect", user: userl, x: arrRectEnd_x, y: arrRectEnd_y, styles: arrRectEnd_style }, function (res, status) { });

});
//insert data for mysql
let counterTimeout = 0, counterInterval = 0;
var custom = "";
$("#room > *").dblclick(function () {
    $("#inputWrect").attr("value", $(this).attr("width"));
    $("#inputHrect").attr("value", $(this).attr("height"));
    custom = $(this);
    console.log(custom);
})
var x_btn;
var timerId;
function incX() {
    try{
        x_btn = parseInt(custom.attr("x")) + 15;
        custom.attr("x", x_btn);
    }
    catch(error){
        alert("dbclock in item");
    }
   
}
function incY() {
    try {
        x_btn = parseInt(custom.attr("y")) + 15;
        custom.attr("y", x_btn);
    }
    catch (error) {
        alert("dbclock in item");
    }
}
function decX() {
    try{
        x_btn = parseInt(custom.attr("x")) - 15;
        custom.attr("x", x_btn);
      }
    catch(error){
        alert("dbclock in item");
    }
}
function decY() {
    try{
        x_btn = parseInt(custom.attr("y")) - 15;
        custom.attr("y", x_btn);
    }
    catch (error) {
        alert("dbclock in item");
    }
}
$("#left").mousedown(function () {
    timerId = setInterval(decX, 200);
})
$("#left").mouseup(function () {
    clearInterval(timerId);
})
$("#left").mouseout(function () {
    clearInterval(timerId);
})
$("#left").click(function () {
    decX();
})
$("#up").mousedown(function () {
    timerId = setInterval(decY, 200);
})
$("#up").mouseup(function () {
    clearInterval(timerId);
})
$("#up").mouseout(function () {
    clearInterval(timerId);
})
$("#up").click(function () {
    decY();
})
$("#rigth").mousedown(function () {
    timerId = setInterval(incX, 200);
})
$("#rigth").mouseup(function () {
    clearInterval(timerId);
})
$("#rigth").mouseout(function () {
    clearInterval(timerId);
})
$("#rigth").click(function () {
    incX();
})
$("#down").mousedown(function () {
    timerId = setInterval(incY, 200);
})
$("#down").mouseup(function () {
    clearInterval(timerId);
})
$("#down").mouseout(function () {
    clearInterval(timerId);
})
$("#down").click(function () {
    incY();
})

$("#ok").click(function () {
    custom="";
})
$(".tools div").click(function () {
    console.log(this);
});

$("#show").click(function () {
    $("p").show();
});