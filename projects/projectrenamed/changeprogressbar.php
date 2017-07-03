

<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "tarushi99";
$dbname = "new";
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
//Select Database
mysql_select_db($dbname) or die(mysql_error());

$querystring="select count(*) as \"people\" from students";
//execute the query
$queryresult=mysql_query($querystring); //As it would be containing the single row and I have changed its row hence need not use the while loop here. 
$rowp=mysql_fetch_array($queryresult);
$value=$rowp["people"];  //its better to store fetched value in the variable as it poses certain problems while using it for html string
$value/=20;
$value*=100;
$progressdisplay ="<div class=\"progressbar\">";
$progressdisplay.="<div class=\"progress-bar progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"10\" style=\"width:$value%\">$value%";
$progressdisplay.="</div>";
$progressdisplay.="</div>";
echo $progressdisplay;
?>
				
			