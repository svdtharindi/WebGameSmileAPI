<?php
session_start();

if(!isset($_SESSION["sessionName"]))/*if session is not created this will direct to login page which means if user has not entered correct login details before going to any other page session in login page will not be created so !isset is true because of that then user will direct to login page without giving acess to game page by using header*/
{header('Location:login.php');}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Game Page</title>
	<style>
	body{
		
	background-image: url("images/game page2.png");
		}
		
		div.c2 {
  position: relative;
  width: 50%;
  top: 200px;
			
			
			
 
}
		/*button styling*/
		.b1{border-radius: 50px;
			border-color:  white;
			height: 50px;
		color: white;
		background-color:#ffaa1b;
		width: 300px;
			position: absolute;
			top:200px;
			left:200px;
			
		}
		
		.b2{border-radius: 50px;
			border-color:  white;
			height: 50px;
		color: white;
		background-color:#5dc9c0;
		width: 300px;
			position: absolute;
			top:200px;
			right: 100px;
	}
		
		.b5{border-radius: 50px;
			border-color:  #ff40bd;
			height: 50px;
		color: white;
		background-color:#6f4d89;
		width: 200px;;
    		top: 10px;
		right: auto;}
		
		.tableiconG{
			position: sticky;
			background-color:white;
			bottom: 670px;
			left: 1050px;
			border-radius: 5px;
			border-color:  white;
			color: #6f4d89;
			
		}
		
			
		
		
</style>
		
		</style>
</head>

<body>
	
	
	
	<a href="Home.php"><input class="b5" type="button" name="button" id="button3" value="&#8678;  Back to home"></a>
	<a href="Score Board.php"><input class="b5" type="button" name="button" id="button3" value="view score board"></a>
	
	<a href="SmileGameL1.php"><input class="b1" type="button" name="button" id="button1" value="Smile Game"></a>
<a href="quize game.php"><input class="b2" type="button" name="button" id="button2" value="quize game"></a>
	
	<div class="c2">
<table  width="1100" height="30" border="0" >
  <tbody>
    <tr >
		<td width="166"></td>
      <td height="50" width="616"></td>
		<td width="10"></td>
      <td height="50" width="300"></td>
		 
		
  
    
	  
  </tbody>
</table>
		</div>
	<!---/*code to add user profile pic to make a logout icon*/--->
	
	<table  border="0" class="tableiconG">
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
	echo"
      
	 
	   <tr>
      <td><div align ='center' class='imagecontainer'><img src='".$row["imagepath"]."' height='50' widtht='50'></div></td>
      <td>".$row["Email"]."<br><br><a href='logout.php'><input class='b8' type='button' name='button' id='button2' value='logout'></a><a href='profile page.php'><input class='b7' type='button' name='button' id='button2' value='profile'></a></td>
    </tr>
	
	
	 
	
  ";
	
	}
	}
	?>
    
  </tbody>
</table>
	
</body>
</html>
