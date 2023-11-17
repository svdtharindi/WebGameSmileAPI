<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>home</title>
	<style>
	body{
		
	background-image: url("images/Home Page2.png");
		
		}
		
	/*button container*/
	div.c1 {
    position: absolute;
    width: 50%;
    bottom: 49px;
    margin-left: inherit;
    left: 70px;
}
	/*button styling*/
		.b1{border-radius: 50px;
			border-color:  #ff40bd;
			height: 50px;
		color: white;
		background-color:#6f4d89;
		width: 160px;}
		
		.b2{border-radius: 50px;
			border-color:  #ffaa1b;
			height: 50px;
		color: white;
		background-color:#ffaa1b;
		width: 160px;}
		
		.b3{border-radius: 50px;
			border-color:  #5dc9c0;
			height: 50px;
		color: white;
		background-color:#5dc9c0;
		width: 160px;}
		
		.b4{border-radius: 50px;
			border-color:  #ff645a;
			height: 50px;
		color: white;
		background-color:#ff645a;
		width: 160px;}
		
		.img1{
			
			
		
			
			padding-left:  80px;
			width: 700px;
			max-height: 300px;
			
		}
		.container{
			
			position: absolute;
			top: 150px;
			width: 800px;
		/*bottom: 10px;	*/
			
			
		}
	</style>
	
</head>

<body>
	

<p>&nbsp;</p>

	
	<div class="container" >
  <h2></h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
		
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img class="img1" src="images/welcome.png"  >
      </div>

      <div class="item">
        <img class="img1" src="images/about.png" >
      </div>
    
      <div class="item">
        <img class="img1" src="images/developer.png"  >
      </div>
		
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
	<div class="c1">
<table align="left" width="600" height="30" border="0" >
  <tbody>
    <tr >
		<!---td height="50" width="160"><a href="register.php"><input class="b2" type="button" name="button" id="button1" value="Register"></a></td>
		 <td height="50" width="160"><a href="login.php"><input class="b3" type="button" name="button" id="button2" value="Login"></a></td><td height="50" width="160"><input  class="b4"type="button" name="button" id="button3" value="About us"></td--->
      <td height="50" width="160"><a href="GamePage.php"><input class="b1" type="button" name="button" id="button" value="View Games"></a></td>
      
     
      
    </tr>
  </tbody>
</table>
		</div>
	
	
	
</body>
</html>
