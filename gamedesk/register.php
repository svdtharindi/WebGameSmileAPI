
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
	<style>
	body{
		
	background-image: url("images/Register page2.png");
		}
		
		.btn{border-radius: 50px;
			border-color:  white;
			height: 50px;
		color: white;
		background-color:goldenrod;
		width: 160px;}
		
		.form1c{
			color:whitesmoke;
			align-content: center;
			position: absolute;
			width: 1000px;
    		top: 130px;
			/*background-color: #505b65;*/
			left:100px;
			border-radius: 5%;
			
		
		}
		
		.form2{
			color: white;
			align-content: center;
			position: absolute;
			width: 1500px;
    		bottom: 10px;
		left:520px;}
		.input{
			background-color: grey;
			color: white;
		}
	</style>
	
	<!--Js coading-->
	<script type="text/javascript">
	function ValidateEmail()
		{
			
			var email=document.getElementById("email").value;
			var len=email.length;
			var at=email.indexOf('@');
			var dot=email.lastIndexOf(".");
			if((at<2)||((dot-at)<2)||(len-dot)<2)
				{
					alert("please enter a valid email");
				return false;
				}
			else
			{
			 return true;
				
			}
		}
		function validatePassword()
		{
			var pword=document.getElementById("password").value;
			var cpword=document.getElementById("Cpassword").value;
			var len=pword.length;
			if (pword==cpword)
			{
				return true;
			}
			else{
				alert("incorrect!! please confirm password again");
				return false;
			}
		}
		function validateContact()
		{
			var contact=document.getElementById("telContact").value;
			var len=contact.length;
			if(len!=10||isNaN(contact))
				{alert("enter a valid contact number");
				return false;}
			else {return true;}
			
		}
		
		function validaterdio()
		{if((document.getElementById("RadioGroup1_0").checked)||(document.getElementById("RadioGroup1_1").checked)||(document.getElementById("RadioGroup1_2").checked))
			{return true;}
			else{alert("please select gender");
				return false;}
		}
		
		//validate all the functions using one function
		function validateAll()
		{
			if(ValidateEmail()&&validatePassword()&&validateContact()&&validaterdio())
				{alert("registration sucessful");
					return true;}
			else{event.preventDefault();}
		}
	
	
	</script>
	
</head>

<body>
	
	
	<form action="login.php" method="post" enctype="multipart/form-data" name="form2" id="form2" class="form2" >
		 <td><br><input type="submit" name="submit2" id="submit2" value="Go to login page &#8680;"  class="btn" style="background-color:orangered;"></td>
	</form>
			  
	<!--form with a table for login details-->
	
<form action="register.php" method="post" enctype="multipart/form-data" name="form1" id="form1" class="form1c" >
	<!--<action should be put.enctype should be put if there are any files uploads taken.this atribute defines/specifies how the form data need to be encoded when submitting it to the server.to do this method should be "post"-->
	<table align="center" width="100%" border="0">
  <tbody>
    <tr>
      <th colspan="2" scope="col"></th>
      </tr>
	  
	  
	  
	  
	  
    <tr>
      <td width="180"><b>Name:</b></td>
      <td width="162"><input name="textName" type="text" required="required" id="textName"class="input"></td>
    </tr>
    <tr>
      <td><b>Age:</b></td>
      <td><input name="textAge" type="text" required="required" id="textAge" class="input"></td>
    </tr>
    <tr>
      <td><b>Gender:</b></td>
      <td><p>
        <label>
            <input name="RadioGroup1" type="radio" required="required" id="RadioGroup1_0" value="radio1" >
            Female</label>
          <br>
          <label>
            <input name="RadioGroup1" type="radio" required="required" id="RadioGroup1_1" value="radio2">
            Male</label>
          <br>
          <label>
            <input name="RadioGroup1" type="radio" required="required" id="RadioGroup1_2" value="radio3">
            Other</label>
          <br>
      </p></td>
    </tr>
    <tr>
      <td><b>Contact Number:</b></td>
      <td><input name="telContact" type="tel" required="required" id="telContact" class="input"></td>
    </tr>
   
    <tr>
      <td><b>Profile picture:</b></td>
      <td><input type="file" name="fileField" id="fileField multiple"></td><!--multiple allows to upload multiple files-->
    </tr>
	  <tr>
		  <td><b>Description(bio):</b></td>
		  <td width="162"><input name="txtDescription" type="text" required="required" id="txtDescription" class="input"></td>
	 </tr>
    
    <tr>
      <td><b>Email Address:</b></td>
      <td><input name="email" type="email" autofocus="autofocus" required="required" id="email" class="input"></td>
    </tr>
    <tr>
      <td height="32"><b>Password:</b></td>
      <td><input name="password" type="password" autofocus="autofocus" required="required" id="password" maxlength="10" minlength="5" class="input"></td>
    </tr>
    <tr>
      <td><b>Confirm Password:</b></td>
      <td><input name="Cpassword" type="password" autofocus="autofocus" required="required" id="Cpassword" class="input"></td>
    </tr>
    <tr>
		
      <td><br><input type="reset" name="reset" id="reset" value="Reset" class="btn"></td>
      <td><br><input type="submit" name="submit" id="submit" value="Submit" onClick="validateAll()" class="btn"></td>
		
    </tr>
  </tbody>
</table>

<!--</form>
	
</body>-->
	
	<?php
	
	if(isset($_POST["submit"]))//only if user has click the submit button the rest will happen
	{
		//read values from text fields
		$Name=$_POST["textName"];
		$Age=$_POST["textAge"];
		$Gender=$_POST["RadioGroup1"];
		$ContactNumber=$_POST["telContact"];
		
		$ProfilepicPath="uploads/".basename($_FILES["fileField"]["name"]);/*"uploads"is the file I created in www directory to save images.".basename" will return the file name from path*/
		move_uploaded_file($_FILES["fileField"]["tmp_name"],$ProfilepicPath);/*"move_uploaded_file(file to be moved,new location)" use to move an uploaded file from tempory location to a new location this command can only used with http post method*/
		$description =$_POST["txtDescription"];
		
		$username =$_POST["email"];
		$password =$_POST["password"];
		         
		$con=mysqli_connect("localhost","root","","gamedb");//to open create new connection in the my sql server .
				/*these are things that should be inside double quotations--- (hostname or ip address,mysql username,mysql password,database name)*/
				
				if(!$con)//to check whether page is not connected to data base or not
				{
				die("cannot connect to DB server");
				}
				
				/*$sql="INSERT INTO `registerdetais` (`name`, `age`, `gender`, `contactNo`, `imagepath`, `Email`, `Password`) VALUES ('".$Name."', '".$Age."', '".$Gender."', '".$ContactNumber."', '".$ProfilepicPath."', '".$username."', '".$password."');";*/
		
		
		
		$sql="INSERT INTO `registerdetais` (`name`, `age`, `gender`, `contactNo`, `imagepath`, `description`, `Email`, `Password`) VALUES ('".$Name."', '".$Age."', '".$Gender."', '".$ContactNumber."', '".$ProfilepicPath."', '".$description."', '".$username."', '".$password."');";
		        mysqli_query($con,$sql);
	
		    // header("Location:login.php");
	
	}
	?>
	

	
</body>
	
</html>
