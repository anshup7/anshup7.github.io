<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "tarushi99";
$dbname = "new";
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
//Select Database
mysql_select_db($dbname) or die(mysql_error());
  $querystring="select*from students";
//execute the query
$queryresult=mysql_query($querystring);

$display_string = "<table class=\"table table-bordered\">";    // For pagination which ever page of php called is through ajax u use the same div id but different data display concept to display the data which is req by u -->

$display_string .= "<tr>";
$display_string .= "<th>Name</th>";
$display_string .= "<th>Surname</th>";
$display_string .= "<th>Email</th>";
$display_string .= "<th>Month</th>";
$display_string .= "<th>Day</th>";
$display_string .= "<th>Year</th>";
$display_string .= "<th>Hostel</th>";
$display_string .= "<th>Roomno</th>";
$display_string .= "<th>Course</th>";
$display_string .= "<th>Branch</th>";
$display_string .= "<th>Acadyear</th>";
$display_string .= "<th>UnivRollNo</th>";
$display_string .= "<th>Username</th>";
$display_string .= "<th>Password</th>";
$display_string .= "<th>ReenteredPassword</th>";
$display_string .= "</tr>";

while($row=mysql_fetch_array($queryresult)){
  $deletekeytd=$row["univrollno"];      #stores the deletion key for deletion of the values in the database for td tag
    $display_string .= "<tr>";  
$display_string .= "<td class=\"showdel\">".$row["name"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["surname"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["email"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["month"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["day"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["year"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["block"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["roomno"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["course"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["branch"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["acadyear"]."</td>";
$display_string .= "<td id=\"$deletekeytd\" class=\"showdel\">".$row["univrollno"]."</td>";   #will give me the name for deletion of the entry in the database
$display_string .= "<td class=\"showdel\">".$row["username"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["passcode"]."</td>";
$display_string .= "<td class=\"showdel\">".$row["repasscode"]."</td>";

$display_string .= "<td><button class=\"btn btn-primary\" id=\"$deletekeytd\" onclick=\"ajaxDelete(this);\">RemoveUser</td>";  #passing this tag dom object 
$display_string .= "</tr>";

}

$display_string.="</table>";
echo $display_string;
 ?>


    
