<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "tarushi99";
$dbname = "new";
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
//Select Database
mysql_select_db($dbname) or die(mysql_error());
$storedeleteval=$_POST["usephp"];
  $querystring="delete from students where univrollno=\"$storedeleteval\""; #this value is the id which has been set by php  isi main time laga kyunki double 
  #quotes bhul gaya tha
//execute the query
$queryresult=mysql_query($querystring);

if($queryresult)
  { echo "<h1 >Success!</h1>";}
  ?>
