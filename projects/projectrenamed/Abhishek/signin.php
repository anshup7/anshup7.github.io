<?php
   $dbhost="localhost";
   $dbname="new";
   $dbpass="tarushi99";
   $dbuser="root";
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
//Select Database
mysql_select_db($dbname) or die(mysql_error());
$admintablequery="select*from admintable";

$adminqueryresult=mysql_query($admintablequery);
 while($row=mysql_fetch_array($adminqueryresult))
 {  $adminuname=$row["adminusername"]; 
    $adminpword=$row["adminpassword"];
 }
  //fetched data until here for admintable check if user has logged in or not
 
  
  if(isset ($_POST["signinusername"]))   //here I had not used $ sign in front of_POST so it was posing an error
  {    $susername=$_POST["signinusername"];
       $spassword=$_POST["signinpassword"];
          if($susername==$adminuname&&$spassword==$adminpword)
		  {  echo "Forwarding to the admin panel is possible"; //Write the code here to transfer to the admin panel
		  }
          else
		  {  echo "Forwarding to the admin panel is not possible"; //write the code here to transfer to the simple home page
		  }
  }
  
  elseif(isset($_POST["firstname"]))
    {
       $firstname=$_POST["firstname"];  //after completing the prototype write the function used to eliminate sql injection threats
       $surname=$_POST["surname"];     //don't forget to give the else statement below
       $email=$_POST["mail"];
       $month=$_POST["Month"];
       $day=$_POST["Day"];
       $year=$_POST["Year"];
	   $block=$_POST["hostel"];
	   $roomno=$_POST["roomno"];
	   $course=$_POST["course"];
	   $branch=$_POST["branch"];
	   $acadyear=$_POST["acadyear"];
	   $univrollno=$_POST["univno"];
	   $username=$_POST["username"];
	   $passcode=$_POST["password"];
	   $repasscode=$_POST["repassword"];
        $whoregistering=$_POST["radioon"];
        $checkusermembership="select count(*) AS ab from students where univrollno=\"$univrollno\""; #frome here to next comment already existence is seen
          $checktrueness=mysql_query($checkusermembership);  
          $storeexistence= mysql_fetch_array($checktrueness);  
          $storeexc=$storeexistence["ab"]; 
              if($storeexc>=1){
                  echo "<h1 align=\"center\">You are already a member</h1>";
                  }                                                                                                                               #already existence lookup ends here
              
          else if($whoregistering=="Student"){
			    $studentregisterquery="insert into students values(\"$firstname\",\"$surname\",\"$email\",\"$month\",\"$day\",\"$year\",\"$block\",\"$roomno\",\"$course\",\"$branch\",\"$acadyear\",\"$univrollno\",\"$username\",\"$passcode\",\"$repasscode\")";
                $execute=mysql_query($studentregisterquery);
                  
		   }
		   else{ echo "do";}
  }
        
        else{ echo "do";}
       

   ?>
	  

