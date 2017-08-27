## Neighborhood Map

The customized map of my locality.

## OverView

The app uses two APIs vis-a-vis “Google Maps API” and the “Wiki API”. The app shows the 
markers and the list of places representing that markers. The search-bar is provided where 
the user can enter the search text and search button is also provided. 

The application also uses the Knockout.js library to enforce bleeding edge organization of 
the application code. 
The use of “Wiki API” provides some knowledge about the locality in which I  live in.


## Functionalities Provided

```
1: The​ ​ search​ ​ bar​ ​ for​ ​ entering​ ​ the​ ​ text​ ​ to​ ​ be​ ​ searched. 
2: The​ ​ search​ ​ button​ ​ which​ ​ is​ ​ exploiting​ ​ the​ ​ awesome​ ​ features​ ​ of​ ​ Knockout​ ​ to​ ​ enable 
   and​ ​ disable​ ​ the​ ​ button​ ​ based​ ​ on​ ​ the​ ​ text​ ​ presence​ ​ in​ ​ the​ ​ search​ ​ bar. 
3: Animation​ ​ feature​ ​ on​ ​ the​ ​ Map​ ​ Markers. 
4: Bounce​ ​ of​ ​ the​ ​ Map​ ​ markers​ ​ when​ ​ clicked. 
5: Infowindow​ ​ functionalities​ ​ on​ ​ the​ ​ Map​ ​ Markers​ ​ when​ ​ clicked. 
6: Use​ ​ of​ ​ ​ Media​ ​ queries​ ​ to​ ​ enable​ ​ the​ ​ page​ ​ responsiveness.​ ​ The​ ​ app​ ​ is​ ​ compatible​ ​ to 
   be​ ​ used​ ​ on​ ​ select​ ​ mobile​ ​ devices​ ​ as​ ​ well​ ​ as​ ​ computer​ ​ screens. 
```


### Using the Application

A two step walk-through to use the application:
If​ ​ nothing​ ​ is​ ​ written​ ​ in​ ​ the​ ​ text​ ​ field:

```
The​ ​ application​ ​ will​ ​ show​ ​ all​ ​ the​ ​ list​ ​ representing​ ​ markers.​ ​ If​ ​ the​ ​ user​ ​ clicks​ ​ on​ ​ any 
of​ ​ the​ ​ list​ ​ element,​ ​ the​ ​ wiki​ ​ API’s​ ​ data​ ​ will​ ​ be​ ​ shown​ ​ in​ ​ the​ ​ alert​ ​ box.​ ​ Also​ ​ clicking​ on 
any​ ​ of​ ​ the​ ​ markers​ ​ opens​ ​ the​ ​ InfoWindow(shows​ ​ the​ ​ Marker​ ​ location)​ ​ ​ with​ ​ ​ bounce 
animation​ ​ on​ ​ the​ ​ marker.​ ​ The​ ​ “Search​ ​ Button”​ ​ will​ ​ not​ ​ work​ ​ during​ ​ this​ ​ time. 
```

If​ ​ text​ ​ is​ ​ entered​ ​ in​ ​ the​ ​ search​ ​ box:  

```
The​ ​ search(The​ ​ search​ ​ function​ ​ on​ ​ this​ ​ button​ ​ is​ ​ case-insensitive.)​ ​ button​ ​ will​ ​ work. 
Clicking​ ​ the​ ​ button​ ​ will​ ​ find​ ​ the​ ​ matching​ ​ DOM​ ​ elements.​ ​ When​ ​ any​ ​ of​ ​ the 
“Searched”​ ​ DOM​ ​ elements​ ​ are​ ​ clicked​ ​ the​ ​ map​ ​ markers​ ​ update​ ​ accordingly.  
```


## Built With

* [Knockout.js](http://knockoutjs.com/) - The JS library used


## Authors

* **Anshuman Upadhyay** - *Profile* - [Github Pages](https://anshup7.github.io/profile)

## License

This project is free and open source.

## Acknowledgments

* Hat tip to anyone who's code was used
* Udacity Mentors

