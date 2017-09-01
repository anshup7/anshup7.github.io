var table = $("#pixel_canvas");


function fillColor(id) {      //This functions is called whenever the user clicks a cell and background is applied to that cell.
    var color = $("#colorPicker").val();
    $("#" + id).css("background-color", color); //Updates the color of the cell.
}

function makeGrid() {

    var currentRow;
    var j = 1;
    table.empty(); //Clears the DOM first before drawing the canvas
    var counter = Math.floor(((Math.random()) * 100)); //counter is used to make the cell id unique
    var gridHeight = $("#input_height").val();
    var gridWidth = $("#input_width").val();

    if(gridHeight > 50 ||  gridWidth > 50) {
        alert("You have crossed size limit of 50X50");
        return;
    }
    for (var i = 1; i <= gridHeight; i++) {
        table.append("<tr class='row' id='row_" + i + "'>");
        currentRow = $("#row_" + i); //The selection of the current row is done at this line.
        while (j <= gridWidth) {

            currentRow.append("<td class='col' id='col_" + i + "" + counter + "' onclick='fillColor(this.id)'></td>");
            counter += 1;
            j += 1;

        }
        table.append("</tr>");
        j = 1;
    }
    return;
}