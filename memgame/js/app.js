var card = {
    showing: false, //Determines If any card has been shown?
    currentlyOpened: "", //The card id against which another card is needed to be compared
    onlyClicked: ""
};
var squares = ["4", "9", "36", "25", "49", "64", "100", "121"];
var moves = 0;
var grab = $("#moves-val");
var watchCompletion = 0; //When sum of all ids is 460, the game has ended. Note:(Necessary Condition) the sum of id and watchCompletion will take place only if a pair has been matched 
var stars = 3; // The number of stars at start of the game.
var interval; //Global variable to store setInterval() so that clearInterval() can be called on it.


function initializeTimer() {  //Concept taken from stackOverflow
    var sec = 0;

    function pad(val) {
        return val > 9 ? val : "0" + val;
    }
    interval = setInterval(function () {
        $("#seconds").html(pad(++sec % 60));
        $("#minutes").html(pad(parseInt(sec / 60, 10)));
        card.seconds = pad(++sec % 60);
        card.minutes = pad(parseInt(sec / 60, 10));
    }, 1000);
}


function initializeDisplay() {
    grab.text(String(moves));
    initializeTimer();
}



function shuffle(array) { //This function is not my proprietory code. Taken from stackoverflow.
    var currentIndex = array.length,
        temporaryValue, randomIndex;

    while (currentIndex !== 0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}


function domShuffle() {
    var domArray = $("#parent").children().toArray();
    $("#parent").empty();
    var shuffled = shuffle(domArray);
    shuffled.forEach(function (element) {
        $("#parent").append(element);
    });

    initializeDisplay();
}

function updateStarsValue() {
    if (moves >= 20) {

        stars -= 1;
    }

    if (moves >= 30) {

        stars -= 1;
    }

}


//The following function takes care of the modal. 
function modalDisplay() {
    $("#seeOffModal").empty(); //used to clear out the modal content before filling the DOM of it.
    $("#seeOffModal").append("<h2 id='heading'>Congratulations! You Win!</h2>");
    if (stars > 0) {

        $("#seeOffModal").append("<p>&#10940; Your Current Rating: " + stars + " <i class='fa fa-star'></i></p>");
        $("#seeOffModal").append("<p>&#10940; Time Taken: " + card.minutes + " : " + card.seconds);
        $("#seeOffModal").append("<p>&#10940; Moves Consumed: " + moves);

        $("#seeOffModal").modal({
            fadeDuration: 100
        });

    } else {

        $("#seeOffModal").append("<p>&#10940; Oops! You do not have rating, better luck next time!</p>");
        $("#seeOffModal").append("<p>&#10940; Time Taken: " + card.minutes + " : " + card.seconds);
        $("#seeOffModal").append("<p>&#10940; Moves Consumed: " + moves);

        $("#seeOffModal").modal({
            fadeDuration: 100
        });

    }

    $("#seeOffModal").append("<a id='anchor' href='./index.html' >PLay Again!</a>");


}


function updateWatchCompletion(secondElement, firstElement) {
    var x = Number(secondElement);
    var y = Number(firstElement);
    watchCompletion += (x + y) //Utilizing the Associative property of addition, when all cards are matched the value containd by watchCompletion will be 460.
    if (watchCompletion === 460) { //call the modalDisplay()
        clearInterval(interval);
        updateStarsValue(); //To determine the number of stars the user has.
        modalDisplay();

    }
}


function removeAttribute(id) {

    updateWatchCompletion(id, card.currentlyOpened); //Function updating the watchCompletion on occurrence of the match 
    $("#" + id).removeAttr("onclick");
    $("#" + id).removeAttr("id");
    $("#" + card.currentlyOpened).removeAttr("id");
    $("#" + card.currentlyOpened).removeAttr("onclick");


}


function resetCardObject() {
    card.showing = false;
    card.currentlyOpened = "";
    card.onlyClicked = "";
}


function resetGameState(id) {
    $("#" + card.currentlyOpened).removeClass("show");
    $("#" + card.currentlyOpened).removeClass("open");

    resetCardObject();

    $("#" + id).removeClass("show");
    $("#" + id).removeClass("open");
}


function updateMove() {
    moves += 1;
    grab.text(String(moves));
    var starGrab;

    if (moves >= 20) {
        starGrab = $("#star-1");
        starGrab.empty();
        starGrab.append("<i class='fa fa-star-o'></i>");
    }

    if (moves >= 30) {
        starGrab = $("#star-2");
        starGrab.empty(); //empties the filled star code.
        starGrab.append("<i class='fa fa-star-o'></i>"); // Appends the hollow star code.
    }


}


function findPair(id) {
    var secondElement;
    var tempVar = String(id * id); //Need to use String for performing matching with inArray().
    //Below is the simple logic to find the pairs
    if (jQuery.inArray(tempVar, squares) !== -1) { // inArray() returns the indexOf found value else -1


        secondElement = id * id;


    } else {


        secondElement = Math.sqrt(id); // By logic secondElement == card.currentlyOpened if some card is already opened and the second card is opened.
    }

    if (!card.showing) { //If no other card is opened


        $("#" + id).addClass("show");
        card.showing = true;
        card.currentlyOpened = id;
        card.onlyClicked = id; //Very Imp to prohibit move updates on same card clicks.
        updateMove(); //To update number of moves


    } else { // Will execute if some card is being shown


        if (card.currentlyOpened == secondElement) { // If the second click is made, some card is being shown nd second element calculated is the currently opened element.
            $("#" + id).addClass("show");
            $("#" + id).addClass("open");
            $("#" + card.currentlyOpened).addClass("open"); // As the match happened, open the priviously selected card.
            updateMove(); //To update number of moves
            removeAttribute(id); //Required so as to alienate matched cards from being modified by JS. Also a place where the watch completion can receive values.
            resetCardObject(); // Matched.. No need for DOM changes any further, reset the card's suitable parameters.


        } else {

            $("#" + id).addClass("show");

            if(card.onlyClicked !== id) { //This else part is called when some part is clicked earlier. If second click is on the same card then this part will execute.

            	updateMove(); //To update number of moves

	            setTimeout(function () {
	                resetGameState(id)
	            }, 200); //will be called when some card is already opened and the second card doesn't matches with the previously opened one.
            }


        }
    }
}