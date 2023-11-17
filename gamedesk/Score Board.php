<?php
session_start();

if(!isset($_SESSION["sessionName"]))/*if session is not created this will direct to login page which means if user has not entered correct login details before going to any other page session in login page will not be created so !isset is true because of that then user will direct to login page without giving acess to game page by using header*/
{header('Location:login.php');}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Score Board</title>
	<style>
		
		body{
		
	background-image: url("images/Score Board2.png");
		}
		
		.t1{
			width: 600px;
			height:400px;
			background-color: none;
		border-color:  white;
		color:white;
			font-family:Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", "serif";
	
			position: relative;
    		top: 150px;
		
		}
	</style>
</head>

<body>
	
	
	

<table class="t1" align="center" width="200"  >
	  <tbody>
		  <tr>
			  <td><h1>Ranking</h1></td>
                <td><h1>UserName</h1></td>
                <td><h1>Marks</h1></td>
            </tr>
	    <?php
  
/* Connection Variable ("Servername",
"username","password","database") */
$con = mysqli_connect("localhost", 
        "root", "", "gamedb");
  
/* Mysqli query to fetch rows 
in descending order of marks */
$result = mysqli_query($con, "SELECT userName, 
marks FROM leaderboard ORDER BY marks DESC");
  
/* First rank will be 1 and 
    second be 2 and so on */
$ranking = 1;
  
/* Fetch Rows from the SQL query */
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>{$ranking}</td>
        <td>{$row['userName']}</td>
        <td>{$row['marks']}</td></tr>";
        $ranking++;
    }
}
?>
		
  </tbody>
</table>
</body>
</html>
