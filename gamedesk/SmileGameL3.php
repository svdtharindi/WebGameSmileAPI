<?php
session_start();

if(!isset($_SESSION["sessionName"]))/*if session is not created this will direct to login page which means if user has not entered correct login details before going to any other page session in login page will not be created so !isset is true because of that then user will direct to login page without giving acess to game page by using header*/
{header('Location:login.php');}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SMILE GAME L3 </title>
	<style>
		body{text-align: center;
		
	background-image: url("images/Smile Game2.png");}
        h1 {
            color:black;
        }


        

        .h2-62 {
            line-height: 2.5;
        }


        .button-62:not([disabled]):focus {
            box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
        }

        .button-62:not([disabled]):hover {
            box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
        }
		
		
		.classenter{
			position: absolute;
			bottom: 20px;
			left:400px;
			color: white;
		}
		
		/*style for smile game api image*/
		.imgquest{
			position: absolute;
			top:150px;
			right: 300px;
				
			border-style:outset;
			border-color:white;
			border-radius:30px; 
			border-width: thick;
			
			border-radius: 50px;
		}
		
		
		.btn {
            
			border-radius: 50px;
			border-color:  #ff645a;
			height: 50px;
		    color: white;
		    background-color:#ff645a;
		    width: 160px;
			position: absolute;
    		bottom: 49px;
            margin-left: inherit;
            left: 70px;
        }
		
		
		.d1{align-content: flex-end;
			background-color: #F0D3F1;
			height: 400px;
			width:200px;
			position: absolute;
    		top: 130px;
			border-radius:30px; 
			 border-width: thick;
			border-style:outset;
			border-color:white;
			
			
		}
		h2{color: #A700B0;
		}
		
		
		
		#overlay {
			
  position: fixed;
  display: none;
  width: 55%;
  height: 50%;
  top: 100px;
  left: 500px;
  right: 100px;
  bottom: 100px;
  background-color: #83827C;
  z-index: 2;
  cursor: pointer;
}
		
		#overlay2 {
			
  position:absolute;
  display: none;
  width: 60%;
  height: 70%;
  top: 160px;
  left: 250px;
  right: 300px;
  bottom: 100px;
			border-radius: 50px;
			background-image:url("images/pauseblock6.jpg");
			background-size:cover;
			background-repeat: no-repeat;
			background-position: right top;
			border: hidden;
 /* background-color: rgb(0,0,0); /* Black fallback color */
  /*background-color: rgba(0,0,0, 0.5); /* Black w/opacity */
  z-index: 2;
  cursor: pointer;
			
			
			
			
}
		.b6{
			border-radius: 50px;
			border-color:  #ffaa1b;
			height: 50px;
		color: white;
		background-color:#FCCC07;
		width: 100px;
		}
		.butnNextlevel{position: absolute;
			
			left: 100px;
			border-radius: 50px;
			border-color:  #ffaa1b;
			height: 50px;
		color: white;
		background-color:#FCCC07;
		width: 300px;
			}
		.buttoninfo{
			position: absolute;
			top: 5px;
			left: 700px;
			border-radius: 50px;
			border-color:  #ffaa1b;
			height: 50px;
		color: white;
		background-color:#FCCC07;
		width: 100px;
			
		}
		.buttoninfo2{
			position: absolute;
			top: 5px;
			left: 800px;
			border-radius: 50px;
			border-color:  #ffaa1b;
			height: 50px;
		color: white;
		background-color:#32DB99;
		width: 100px;
		}
		.buttoninfo3{
			position: absolute;
			top: 5px;
			left: 900px;
			border-radius: 50px;
			border-color:  #ffaa1b;
			height: 50px;
		color: white;
		background-color:#DB3245;
		width: 100px;
		}
		.boxmarks{
			
			border-radius:30px; 
			 border-width: thick;
			border-style:outset;
			border-color:white;
			height: 100px;
			font-size: 80px;
			max-width: 200px;
			position: absolute;
			top:1px;
			left:1px;background-color: #F0D3F1;
			
		}
		
		
		.btnsubmarks{
			border-radius: 30px;
			border-color:  #ffaa1b;
			height: 50px;
		color: white;
		background-color:#DB3245;
		width: 100px;
			height:100px;
		}
		
		.boxenter{
			border-radius:10px; 
			 border-width: thick;
			border-style:outset;
			border-color:white;
			height: 30px;
			width:150px;
			font-family: "poiret-one";
			
		}
		.buttoninfoenter{
			
			border-radius: 50px;
			border-color:  #ffaa1b;
			height: 50px;
		color: white;
		background-color:#E77794;
		width: 100px;
		}
		
		.tablelogicon{
			/*position: relative;*/
			position: absolute;
			top:5px;
			bottom: 600px;
			
			right: 10px;
			border-radius: 5px;
			border-color:  #ffaa1b;
			height: 25px;
			width: 100px;
			background-color:white;
			border-radius: 5px;
			border-color:  white;
			color: #6f4d89;
			
		}
		
		
		/*stylings for timer*/
		.base-timer {
  position: relative;
	right: 1px;
   top: 10px;
width: 200px;
  height: 200px;
}

.base-timer__svg {
  transform: scaleX(-1);
}

.base-timer__circle {
  fill: none;
  stroke: none;
}

.base-timer__path-elapsed {
  stroke-width: 7px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 7px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: rgb(65, 184, 131);
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}

.base-timer__label {
  position: absolute;
  width: 200px;
  height: 200px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
}</style>
	<script>
		
        var quest = "";
        var solution = -1;

        let newgame = function(x) {
           
            startup();
			}
		
		
		
		
        let handleInput = function(x) {

            let inp = document.getElementById("input");
            var note = document.getElementById("note");
            if ((inp.value == solution)	){
				clearInterval(timerInterval);
		  document.getElementById("demo2").innerHTML = "correct answer"
               // note.innerHTML = 'Correct! <a href=smilel2.php><button class="buttoninfo"  >Next level?</button> </a> ';
				document.getElementById("classenter").innerHTML ='<h1 style="color: white;background-color: #CE4FA2;">you won all the levels!!!</h1>  ';
				
            } else {
               // note.innerHTML = 'Not Correct! ';
				 document.getElementById("demo2").innerHTML = "Incorrect!!"
            }
        }


        let startQuest = function(data) {
            var parsed = JSON.parse(data);
            quest = parsed.question;
            solution = parsed.solution;
            let img = document.getElementById("quest");
            img.src = quest;
            let note = document.getElementById("note");
            note.innerHTML = "Quest is ready TRY IT NOW."
			note.innerHTML = "";
        }

        let fetchText = async function() {
            let response = await fetch('https://marcconrad.com/uob/smile/api.php');
            let data = await response.text();
            startQuest(data);
        }

        let startup = function() {
            fetchText();
        }
    </script>

	
	
</head>

<body>
	
	<form action="SmileGameL1.php" method="post" enctype="multipart/form-data" name="form1" id="form1" class="form1c" >
	<table>
	 <tr>
		  <td>marks</td>
		  <td width="162"><input name="nummarks" type="text" required="required" id="nummarks" class="boxmarks" ></td>
		 <td class="csubmit2"><input type="submit" name="submit2" id="submit2" value="Save Marks"  class="btnsubmarks"></td>
		
	 </tr>
		</table>
		
		<!---script>
		var score2=55;
		 //document.getElementById("nummarks").innerHTML=score;
			document.getElementById("nummarks").value=score2;
			</script--->
			<?php
	
	if(isset($_POST["submit2"]))//only if user has click the submit button the rest will happen
	{
		//read values from text fields
		$marks=$_POST["nummarks"];
		//$marks=$_POST[score];
	  
		
		         
		$con=mysqli_connect("localhost","root","","gamedb");//to open create new connection in the my sql server .
				/*these are things that should be inside double quotations--- (hostname or ip address,mysql username,mysql password,database name)*/
				
				if(!$con)//to check whether page is not connected to data base or not
				{
				die("cannot connect to DB server");
				}
				
				/*$sql="INSERT INTO `registerdetais` (`name`, `age`, `gender`, `contactNo`, `imagepath`, `Email`, `Password`) VALUES ('".$Name."', '".$Age."', '".$Gender."', '".$ContactNumber."', '".$ProfilepicPath."', '".$username."', '".$password."');";*/
		
		
		
		
		
		
		$sql="UPDATE `leaderboard` SET `marks`= '".$marks."' WHERE `Email`='".$_SESSION["sessionName"]."';";
		
		
		
		      if(mysqli_query($con,$sql))
			  {echo"<h1 style='color: black;position: absolute;top: 80px;left:350px;background-color: yellow;border-radius:6px;'>marks updated sucessfully!!!!!</h1>";}
		else{
			echo"marks not updated ";
		}
		
	
	}
	?>
	</form>
	<h1  style="background-color: yellow; "></h1>
	
  <button class="buttoninfo" onclick="on()">how to play</button>
	<button class="buttoninfo2" onclick="resume()">Resume&nbsp; &#10148;</button>
	<button  class="buttoninfo3" onclick="pause()">pause&nbsp; &#10074;&#10074;</button>
 
  <div>
    <h class="attempt"></h>
    <p class="result"></p>
  </div>
	
	 <script>
		
        startup();
	</script>
	
	
	
	<h3 id="demo"></h3>
<div class="d1">
	<div id="alert"></div>
	<div id="app"></div>
<h3  >Level 3</h3>

	
	<h3 id="hh3"  class="hh3" > </h3>

<h2 id="demo2"></h2>
	
	<h3 id="demo4"></h3>
<div   class="dd">

<h3 id="hh4"  > </h3>
	<h3 id="hh5" class="attempt"></h3>


</div>
	
</div>
	
	
	
    <h1 align="center"></h1>

   <p align="center"> <img class="imgquest"  id="quest" /></p>
<div>
	
    <h3 class="h2-62" id="note">Not ready</h3>

    <h3 id="classenter" class="classenter">Enter the missing digit: <input class="boxenter" id="input" onchange="handleInput()" type="number" step="1" min="0" max="9"><button class="buttoninfoenter" id="btnent" onclick="handleInput()">enter </button></h3>
	
    </div>
	
	
	
	<script>
/*coading to add score and lives*/	
	



let button = document.getElementById("btnent")
let scorearea=document.getElementById("hh4")
let attempt = document.getElementById("hh5")

		let lives=5;
		var score=0;
		

button.addEventListener("click", checkGuess)

function checkGuess() {
    
	lives--
    

	if(lives<5)
		
		{attempt.innerHTML = "lives: " + lives;}
	
	
	if (lives <= 0) {
		{clearInterval(timerInterval);
			/*attempt.innerHTML = 'lives are over <button class="button-62" onClick="window.location.href=window.location.href" >Newgame</button>';*/
		 document.getElementById("classenter").innerHTML ='lives are over!! &nbsp <button class="b6" onClick="window.location.href=window.location.href" >Newgame</button>&nbsp &nbsp <a href="Home.php"><input  type="button" class="b6" name="button" id="button1" value="Exit game"></a>';
		}
		
	}
	
	if(lives==5)
		{score=500
		 scorearea.innerHTML ="score: " +score ;
		 document.getElementById("nummarks").value=score;
		}
	else if(lives==4)
		{score=400
		 scorearea.innerHTML ="score: " +score ;
		 document.getElementById("nummarks").value=score;
		}
	else if(lives==3)
		{score=300;
		 scorearea.innerHTML ="score: " +score ;
		 document.getElementById("nummarks").value=score;
		}
	else if(lives==2)
		{score=200;
		  scorearea.innerHTML ="score: " +score ;
		 document.getElementById("nummarks").value=score;
		}
	else if(lives==1)
		{score=100;
		  scorearea.innerHTML ="score: " +score ;
		 document.getElementById("nummarks").value=score;
		}
	else{score=0;
		 scorearea.innerHTML ="score: " +score ;
		 document.getElementById("nummarks").value=score;
		}
}
	

		
	
	</script>
	<!-----------codes for timer----------------->
	
	
	

	
	<script>
/* Credit: Mateusz Rybczonec Available at:https://jsfiddle.net/npvL7kcf/2/(Accessed: March 30, 2023)
https://stackoverflow.com/questions/70516219/jquery-onchange-update-timer-count-down*/

const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = 30;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
	document.getElementById("classenter").innerHTML ='time over!!&nbsp <button class="b6" onClick="window.location.href=window.location.href" >Newgame</button>&nbsp &nbsp <a href="Home.php"><input  type="button" class="b6" name="button" id="button1" value="Exit game"></a>';
	
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}
	
	  function pause()
    {
         //clearInterval() is used to pause the timer
        clearInterval(timerInterval);
		
		on2();
    }
    function resume()
    {    
        //setInterval() is used to resume the timer
       // a=setInterval(function(){disp()},1000);
		startTimer();
		off2();
    }
	
	
	
	</script>
	
	
	<div id="overlay" onclick="off()"></div>
	<div id="overlay2" onclick="off2()"></div>

<div style="padding:20px">
	<script>
function on() {
  document.getElementById("overlay").style.display = "block";
	document.getElementById("overlay").innerHTML ='<h1 color="white">How to play </h1><br> <p>First you have to identify the value belong to smile face by using the given calculations in the image.once you have found the correct answer select the correct answer.make sure to give the correct answer before timer end.if you sucessfully gave the correct answer you can go to the next level.all the best!!!!  </p> ';
	
	
}

function off() {
  document.getElementById("overlay").style.display = "none";/*function to hide the overlay*/
	//document.getElementById("overlay2").style.display = "none";
}
	
	
	
</script>
  
</div>
	<div style="padding:100px">

	<script>function on2() {document.getElementById("overlay2").style.display = "block";
	document.getElementById("overlay2").innerHTML ='<h1 align="center">game is paused </h1><br><h2>click resume to continue</h2>';
				   }
		function off2() {
  
	document.getElementById("overlay2").style.display = "none";
}
		
		
		</script>
		</div>
	<!---/*code to add user profile pic to make a logout icon*/--->
	
	<table class="tablelogicon" border="1" align="center">
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
    
</body>
</html>