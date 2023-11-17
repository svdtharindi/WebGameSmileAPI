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
	
	<style>
	body{
		
	background-image: url("images/profile2.png");
		}
		.table1{
			
			background: none;
			align-content: center;
			position: absolute;
            top: 150px;
			left: 300px;
			color: white;
		}
		.imagecontainer
		{align-self: flex-start;}
		.f2{
			position: absolute;
			bottom:60px;
		}
		.f2{
			position: absolute;
			top: 15px;
		}
		.btnf2{
			border-radius: 50px;
			border-color:  #ff40bd;
			height: 50px;
		color: white;
		background-color:#6f4d89;
		width: 160px;
		}
	</style>
		
	
	
</head>
	
<body>
	
	<form class="f2" action="Home.php">
	<table><tr>
      <td><button class="btnf2">Edit profile</button></td>
      <td><a href="Home.php"><button class="btnf2">&#8678;Back to home</button></a></td></td>
    </tr></table>

</form>
	
	<form>
<table class="table1" width="800" border="0" align="center" height="400">
  <tbody>
	 
	  <?php
	
	$con=mysqli_connect("localhost","root","","gamedb");//to open create new connection in the my sql server .
				/*these are things that should be inside double quotations--- (hostname or ip address,mysql username,mysql password,database name)*/
	if(!$con)//to check whether page is not connected to data base or not
				{
				die("cannot connect to DB server");
				}
				
	
	$sql="SELECT * FROM `registerdetais` WHERE `Email`='".$_SESSION["sessionName"]."'";/*by adding session name we can get relevent details of the user that has  logged in.earlier I have assignes email adress as the session name */
	
	$result=mysqli_query($con,$sql);/*mysqli_query($con,$sql)t is to execute query against the data base then the return value(true or false) of that is assigned to variable called $result,in here to check whether how many results are there with $result*/
	if(mysqli_num_rows($result)>0){/*mysqli_num_rows($result) return the number of rows with given username and password .checking the number of rows in database table with the relevent username and password are greater than 0 which means check whether user has alredy registered with that username and password*/
	/*in here to check whther there is record or not*/
		
		//obtain each row by row
	while($row=mysqli_fetch_assoc($result)){/*"mysqli_fetch_assoc()"fetch a result row as an assosiative array,the fetch row represent as a string array*/
	
	/*if you want to print things with html tags in php all the double quotations "" within html tags should be replaced by singhe quotes'' */
	echo"<tr>
      
	  <td colspan='2'>
		<div align ='center' class='imagecontainer'><img src='".$row["imagepath"]."' height='150' widtht='100'></div></td>
     
</tr>
	   
	<tr>
      <td><h3>User name:</h3></td>
      <td>".$row["Email"]."</td>
    </tr>
	
	  <tr>
      <td><h3>Bio(description):</h3></td>
      <td>".$row["description"]."</td>
    </tr>
	
    <tr>
      <td><h3>Name:</h3></td>
      <td>".$row["name"]."</td>
    </tr>
    <tr>
      <td><h3>Age:</h3></td>
      <td>".$row["age"]."</td>
    </tr>
    <tr>
      <td><h3>Contact Number</h3></td>
      <td>".$row["contactNo"]."</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	   ";
	
	}
	}
	?>
    
  </tbody>
</table>
		</form>

</body>
</html>