## Neighborhood Map

The customized map of my locality.

## OverView

The app uses two APIs vis-a-vis [Google Maps API](https://developers.google.com/maps/documentation/javascript/?hl=vi) and the [Wiki API](https://www.mediawiki.org/wiki/API:Main_page). The app shows the 
markers and the list of places representing that markers. The search-bar is provided where 
the user can enter the search text and search button is also provided. 

The application also uses the Knockout.js library to enforce bleeding edge organization of 
the application code. 
The use of “Wiki API” provides some knowledge about the locality in which I  live in.


## Functionalities Provided


* The​ ​ search​ ​ bar​ ​ for​ ​ entering​ ​ the​ ​ text​ ​ to​ ​ be​ ​ searched. 
* The​ ​ search​ ​ button​ ​ which​ ​ is​ ​ exploiting​ ​ the​ ​ awesome​ ​ features​ ​ of​ ​ Knockout​ ​ to​ ​ enable 
   and​ ​ disable​ ​ the​ ​ button​ ​ based​ ​ on​ ​ the​ ​ text​ ​ presence​ ​ in​ ​ the​ ​ search​ ​ bar. 
* Animation​ ​ feature​ ​ on​ ​ the​ ​ Map​ ​ Markers and fact display through the map markers. 
* Bounce​ ​ of​ ​ the​ ​ Map​ ​ markers​ ​ when​ ​ clicked. 
* Infowindow​ ​ functionalities​ ​ on​ ​ the​ ​ Map​ ​ Markers​ ​ when​ ​ clicked. 
* Use​ ​ of​ ​ ​ Media​ ​ queries​ ​ to​ ​ enable​ ​ the​ ​ page​ ​ responsiveness.​ ​ The​ ​ app​ ​ is​ ​ compatible​ ​ to 
   be​ ​ used​ ​ on​ ​ select​ ​ mobile​ ​ devices​ ​ as​ ​ well​ ​ as​ ​ computer​ ​ screens. 




## Guide to Application Working
 >After unzipping the file, open the **index.html** file to load the application.

**If​ ​ nothing​ ​ is​ ​ written​ ​ in​ ​ the​ ​ text​ ​ field:**


>The​ ​ application​ ​ will​ ​ show​ ​ all​ ​ the​ ​ list​ ​ representing​ ​ markers.​ ​ If​ ​ the​ ​ user​ ​ clicks​ ​ on​ ​ any 
of​ ​ the​ ​ list​ ​ element,​ ​ the corresponding marker is animated and infoWindow is opened.​ ​ Also​ ​ clicking​ on 
any​ ​ of​ ​ the​ ​ markers​ ​ opens​ ​ the​ ​ InfoWindow(shows​ ​ the​ ​ Marker​ ​ location)​ ​ ​ with​ ​ ​ bounce 
animation​ ​ on​ ​ the​ ​ marker.​ ​ Clicking the **Filter** button reinitializes the map.


**If​ ​ text​ ​ is​ ​ entered​ ​ in​ ​ the​ ​ search​ ​ box:**


>The​ ​ Filter(The​ ​ Filter ​ function​ ​ on​ ​ this​ ​ button​ ​ is​ ​ case-insensitive.)​ ​ button​ ​ will​ ​ work. 
Clicking​ ​ the​ ​ button​ ​ will​ ​ find​ ​ the​ ​ matching​ ​ DOM​ ​ elements.​ ​ When​ ​ any​ ​ of​ ​ the 
“Filtered”​ ​ DOM​ ​ elements​ ​ are​ ​ clicked​ ​ the​ ​ map​ ​ markers​ ​ update​ ​ accordingly.  

## Steps to open the Application

* Download the folder nmap.zip
* Unzip the folder by using the *Extract Here* option in the right click dropdown
* Open the index.html file in your browser.

## Built With

* [Knockout.js](http://knockoutjs.com/) - The JS library used


## Authors

* **Anshuman Upadhyay** - *Profile* - [Github Pages](https://anshup7.github.io/profile)

## License

This project is free and open source.

## Acknowledgments

* Hat tip to anyone who's code was used.
* Udacity Mentors.
* The awesome Knockout Documentation.
