<?php
session_start();

if(!isset($_SESSION["sessionName"]))/*if session is not created this will direct to login page which means if user has not entered correct login details before going to any other page session in login page will not be created so !isset is true because of that then user will direct to login page without giving acess to game page by using header*/
{header('Location:login.php');}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
</head>
	
<body>
	
	
	<form action="updateProfile.php" method="post">
<table width="200" border="1">
  <tbody>
	  <th>Profile</th>
	  <?php
	
	$con=mysqli_connect("localhost","root","","gamedb");//to open create new connection in the my sql server .
				/*these are things that should be inside double quotations--- (hostname or ip address,mysql username,mysql password,database name)*/
	if(!$con)//to check whether page is not connected to data base or not
				{
				die("cannot connect to DB server");
				}
				
	
	$sql="SELECT * FROM `registerdetais` WHERE `ID`='".$_GET["ID"]."'";/*by adding session name we can get relevent details of the user that has  logged in.earlier I have assignes email adress as the session name */
	
	$result=mysqli_query($con,$sql);/*mysqli_query($con,$sql)t is to execute query against the data base then the return value(true or false) of that is assigned to variable called $result,in here to check whether how many results are there with $result*/
	if(mysqli_num_rows($result)>0){/*mysqli_num_rows($result) return the number of rows with given username and password .checking the number of rows in database table with the relevent username and password are greater than 0 which means check whether user has alredy registered with that username and password*/
	/*in here to check whther there is record or not*/
		
		//obtain each row by row
	$row=mysqli_fetch_assoc($result);{/*"mysqli_fetch_assoc()"fetch a result row as an assosiative array,the fetch row represent as a string array*/
	
	/*if you want to print things with html tags in php all the double quotations "" within html tags should be replaced by singhe quotes'' */
	echo"<tr>
      <td>this space for profile pic
		<div class='imagecontainer'><img src='".$row["imagepath"]."' height='50' widtht='50'></div></td>
      <td>&nbsp;</td>
    </tr>
	   
	<tr>
      <td>User name:</td>
      <td>".$row["Email"]."</td>
    </tr>
	
	  <tr>
      <td>Bio(description):</td>
      <td>".$row["description"]."</td>
    </tr>
	
    <tr>
      <td>Name:</td>
      <td>".$row["name"]."</td>
    </tr>
    <tr>
      <td>Age:</td>
      <td>".$row["age"]."</td>
    </tr>
    <tr>
      <td>Contact Number</td>
      <td>".$row["contactNo"]."</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	   <tr>
      <td><button>Edit profile</button></td>
      <td><button>Back</button></td></td>
    </tr>";
	
	}
	}
	?>
    
  </tbody>
</table>
		</form>

</body>
</html>