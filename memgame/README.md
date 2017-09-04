## Memory Matching Game

The card predicting and matching game.

## OverView

The app uses concepts of Vanilla Js and Jquery to derive its functionality. The interface of the app is completely based on CSS3, HTML and Jquery. The app also uses a third party plugin [JqueryModal](http://jquerymodal.com/) for buiding sleek and simple modal.


## Functionalities Provided


* Random Swapping of the Cards. 
* Number of moves counter. 
* Clock timer to count the time a user has spent. 
* Modal showing the score-card after a user wins the game.  


## The Concepts Important for Correct working

**How to know the cards form a pair?**


>The square concept is used. In each pair First element's id's square is the id of the second element of that pair.

			<li class="card" id="3" onclick="findPair(this.id)"> <!--First element -->
                <i class="fa fa-paper-plane-o "></i>  
            </li>
			<li class="card" id="9" onclick="findPair(this.id)">    <!-- Second Element -->
                <i class="fa fa-paper-plane-o "></i>
            </li> 

>Note: The squares and their square roots are taken unique


**How to find the other right card on the Grid?**


>This is done by a simple tweak. A squares array is formed which contains all the squares that exist as id(s).
  
	var squares = ["4","9","36","25","49","64","100","121"];  

>Now whenever a card is clicked, the id of *this* element is squared and checked in the *squares* array. If the square is present then the DOM is triggered by this found value, else the square root is taken.

	var tempVar = String(id * id); //Need to use String for performing matching with inArray().`
	//Below is the simple logic to find the pairs
	if(jQuery.inArray(tempVar, squares) !== -1) { // inArray() returns the indexOf found value else -1


		secondElement = id * id;


	} else {


		secondElement = Math.sqrt(id); 
	}



## Steps to open the Application

* Download the folder memgame.zip
* Unzip the folder by using the *Extract Here* option in the right click dropdown
* Open the index.html file in your browser.

## Dependencies

* [JqueryModal](http://jquerymodal.com/) - The JS Addon used
* [Jquery](https://api.jquery.com/) - Jquery API
* [FontAwesome](http://fontawesome.io/) - Fontawesome Icons


## Authors

* **Anshuman Upadhyay** - *Profile* - [Github Pages](https://anshup7.github.io/profile)

## License

This project is free and open source.

## Acknowledgments

* Hat tip to anyone who's code was used.
* Udacity Mentors.
* The awesome Jquery Modal Documentation.
