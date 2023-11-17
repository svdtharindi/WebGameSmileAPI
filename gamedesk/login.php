<?php 
//starting the session
session_start();/*in this we use stateless protocol(http)so we need sessions to ensure user details.session can hold                         only one user at a time.by adding sessions to relevent pages we can ensure that user can acess those                       pages only if she has logged in*/


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
	<style>
	body{
		
	background-image: url("images/Log in2.png");
		}
	
	form {
    position: absolute;
    width: 10%;
    bottom: 5px;
    margin-left: auto;
    left: 554px;
    color: white;
		}
		
	.btn{border-radius: 50px;
			border-color:  white;
			height: 50px;
		color: white;
		background-color:goldenrod;
		width: 160px;}
		
		
		.link{
			
			color: goldenrod;
		}
		.words{
			font-size: 20px;
			text-align: left;
			
			
		}
		
	</style>
	
	
	
	<script type="text/javascript">
	//adding changing (roll over image)image with mouse pointer
		function mouseOver(){
			document.pic.src="../images/h10.jpg";
			
			
		}
		function mouseOut(){
			document.pic.src="../images/h9.jpg";
			
		}
		
	
	
	</script>
	
	
</head>

<body>
	
	  <!--login form---->
	<div class="f1">
<form align=center id="form1" name="form1" method="post" action="login.php">
  <table  width="60%" border="0">
    <tbody>
     <tr>
        <td ></td>
        <td ><a href="register.php" class="link">Not registered?click here</a></td>
      </tr>
      <tr>
        <td class="words" >Email </td>
        <td ><input type="email" name="email" id="email" ></td>
      </tr>
      <tr>
        <td class="words" >Password</td>
        <td><input type="password" name="password" id="password"></td>
		</tr>
		<tr></tr>
	
	<tr>
		<td width="30%"></td>
     <td width="70%"><input  type="submit" name="submit" id="submit" value="Login" class="btn" ></td>
      </tr>
      <tr>
		  <td width="10%"></td>
        <td width="90%"><p>
          <?php
			if(isset($_POST["submit"]))//only if user has click the submit button the rest will happen
			{
					//read values from text fields
					$username =$_POST["email"];
					$password =$_POST["password"];
					$valid=false;//initially assign false to $valid variable
			
				
				
				
						//validating form using hard coded values
				
			
						
						/*if(($username=="test@gmail.com")&&($password=="12345"))
							{$valid=true;}
						else
							{$valid=false;}
				
						if($valid)//if$valid=true it will directed to orders page
			
									{//creating the session
										/*when ever the user loggin we create sessions
											here is the place where $valid=true which 
											means user has entered correct login details
											so this is the place we should create a
											session.when user entered correct login details 
											this will create a session and direct to the given location in header*/
				
											/*$_SESSION["sessionName"]=$username;/*I have created a name for session as 
																					"sessionName" and assigned user  
																					name to the session name*/
				
			
										/*	header('Location:GamePage.php');//if$valid=true it will directed to  GamePage
									}
				
							else
									{
										echo "check username and password";
									}*/
				
				
				
				
				
				
				//validating form using sql data base data
				
				$con=mysqli_connect("localhost","root","","gamedb");//to open create new connection in the my sql server .
				/*these are things that should be inside double quotations--- (hostname or ip address,mysql username,mysql password,database name)*/
				
				if(!$con)//to check whether page is not connected to data base or not
				{
				die("cannot connect to DB server");
				}
				
				$sql="SELECT * FROM `registerdetais` WHERE `Email`='".$username."' AND `Password`='".$password."'";
				
				
				$result=mysqli_query($con,$sql);/*mysqli_query($con,$sql)t is to execute query against the data base then the return value(true or false) of that is assigned to variable called $result*/
				
				if(mysqli_num_rows($result)>0)/*mysqli_num_rows($result) return the number of rows with given username and password .checking the number of rows in database table with the relevent username and password are greater than 0 which means check whether user has alredy registered with that username and password*/
					
					{$valid=true;}
				else
					{$valid=false;}
				
				if($valid)//if$valid=true it will directed to orders page
			
									{//creating the session
										/*when ever the user loggin we create sessions
											here is the place where $valid=true which 
											means user has entered correct login details
											so this is the place we should create a
											session.when user entered correct login details 
											this will create a session and direct to the given location in header*/
				
											$_SESSION["sessionName"]=$username;/*I have created a name for session as 
																					"sessionName" and assigned user  
																					name to the session name*/
				
			
											header('Location:GamePage.php');//if$valid=true it will directed to  GamePage
									}
				
							else
									{
										echo "check username and password";
									}
				
				
				
				
				
				
			}
			
			
			?>
          
          
          
          </p></td>
      </tr>
      </tbody>
  </table>
</form>
	
</div>
</body>
</html>
