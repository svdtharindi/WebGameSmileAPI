<?php
session_start();

if(!isset($_SESSION["sessionName"]))/*if session is not created this will direct to login page which means if user has not entered correct login details before going to any other page session in login page will not be created so !isset is true because of that then user will direct to login page without giving acess to game page by using header*/
{header('Location:login.php');}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!---Open trivia DB (no date) Open Trivia DB: Free to use, user-contributed trivia question database. Available at: https://opentdb.com/api_config.php (Accessed: April 16, 2023). ----->
	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="A one-page Javascript quiz game.">
    <style>* {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

body {
    background:  #502273;
    margin: 0;
}

.card {
    background: #243572;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin: 15px;
    padding: 50px 50px 0px 50px;
    margin: 20px 50px 20px 50px;
    background: #243572;
    border-radius: 10px;
}

.card h1 {
    color: white;
    font-weight: 800;
    margin: auto;
    margin-bottom: 20px;
}

.btn {
    display: block;
    background: #1E2E61;
    border: none;
    border-radius: 10px;
    color: white;
    width: 100%;
    display: block;
    font-size: 15px;
    margin: auto;
    background: #1E2E61;
    margin-bottom: 10px;
    border-radius: 10px;
    border: none;
    padding: 20px;
    outline: none;
    font-size: 15px;
    padding: 20px;
    width: 100%;
}

.btn:hover {
    color: black;
    border: none;
    background: #B9D1FF;
    border: none;
    color: black;
    cursor: pointer;
}

.number {
    padding: 10px 0px 10px 0px;
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
		.b5{border-radius: 50px;
			border-color:  #ff40bd;
			height: 50px;
		color: white;
		background-color:#6f4d89;
		width: 200px;;
    		top: 10px;
		right: auto;}
	
	</style>
    
    <title>Quiz Game</title>
</head>

<body id="body">
	<a href="GamePage.php"><input class="b5" type="button" name="button" id="button3" value="&#8678;  Back"></a>
    <main>
        <section class="card" id="card">
            <h1 id="title"></h1>
            <div id="buttons"></div>
            <h1 id="question-number"></h1>
        </section>
    </main>
    <script>
		/*Open trivia DB (no date) Open Trivia DB: Free to use, user-contributed trivia question database. Available at: https://opentdb.com/api_config.php (Accessed: April 16, 2023). */
		
		const BASE_URL = "https://opentdb.com/api.php?amount=11";
const TOTAL_CATEGORIES_URL = "https://opentdb.com/api_category.php";
let index = 0;
let score = 0;
// fetches the raw data from the API
async function fetchData(url) {
    const response = await fetch(url);
    return response.json();
}
// fetches the categories data from the API
async function fetchCategoriesFromAPI() {
    const data = await fetchData(TOTAL_CATEGORIES_URL);
    return data.trivia_categories;
}
// fetches questions from the API and returns an object of questions with answers
async function fetchQuestionsFromAPI(url) {
    const data = await fetchData(url);
    if (data.response_code === 0) {
        const questions = data.results;
        const list = [];
        questions.forEach(element => {
            const question = {
                question: decodeChars(element.question),
                answers: shuffle(element.incorrect_answers.concat(element.correct_answer)), // will have to decode characters later on
                correct: decodeChars(element.correct_answer)
            }
            list.push(question);
        });
        return list;
    }
    return false;
}
// Fisher-Yates array shuffling algorithm
function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * i)
        const temp = array[i]
        array[i] = array[j]
        array[j] = temp
    }
    return array;
}
// decodes special HTML characters
function decodeChars(specialCharacterString) {
    const text = document.createElement('textarea');
    text.innerHTML = specialCharacterString;
    return text.value;
}
// sets the title for the h1 tag
function setTitle(string) {
    const title = document.getElementById('title');
    title.innerText = string;
}
// removes buttons from the div tag
function removeButtons() {
    const div = document.getElementById('buttons');
    while (div.firstChild) {
        div.removeChild(div.firstChild);
    }
}
// sets the question number at the bottom of the quiz
function setQuestionNumber() {
    let questionNumber = index + 1;
    const h1Element = document.getElementById('question-number');
    h1Element.classList.add('number');
    h1Element.innerText = questionNumber + '/10';
}
// sets the buttons for each question
function setQuestionButtons(list, answers, correct) {
    const div = document.getElementById('buttons');
    setQuestionNumber();
    answers.forEach(element => {
        const button = document.createElement('button');
        const text = document.createTextNode(decodeChars(element)); // decoding special characters from answers
        button.appendChild(text);
        button.classList.add('btn');
        div.appendChild(button);
        button.addEventListener('click', () => questionButtonEventHandler(button, correct, list));
    });
}
// event handler for the question buttons
function questionButtonEventHandler(button, correctAnswer, list) {
    const pressedButton = button.innerText;
    if (pressedButton === correctAnswer) {
        score++;
        alert('Correct!');
    } else {
        alert('Wrong.\nCorrect Answer: ' + correctAnswer);
    }
    index++;
    removeButtons();
    startQuiz(list);
}
// removes the question number from the bottom
function removeQuestionNumber() {
    const h1Element = document.getElementById('question-number');
    h1Element.classList.remove('number');
    h1Element.innerText = '';
}
// shows the restart button at the end of the quiz
function showRestartButton() {
    removeQuestionNumber();
    const div = document.getElementById('buttons');
    const button = document.createElement('button');
    const text = document.createTextNode('Restart');
    button.classList.add('btn');
    button.appendChild(text);
    div.appendChild(button);
    button.addEventListener('click', () => document.location.reload(true));
}
// starts the quiz and will load one question at a time
function startQuiz(questionList) {
    const numberOfQuestions = questionList.length - 1;
    if (index === numberOfQuestions) {
        setTitle('Your score was ' + score + '/10');
        showRestartButton();
        return;
    }
    setTitle(questionList[index].question);
    setQuestionButtons(questionList, questionList[index].answers, questionList[index].correct);
}
// sets the categories from the API as buttons
async function setCategoryButtons() {
    const categories = await fetchCategoriesFromAPI();
    const buttonList = document.getElementById('buttons');
    for (const category of categories) {
        const button = document.createElement('button');
        const text = document.createTextNode(category.name);
        button.setAttribute('id', category.id);
        button.classList.add('btn');
        button.appendChild(text);
        buttonList.appendChild(button);
        button.addEventListener('click', () => categoryButtonEventHandler(button));
    }
}
// event handler for the category buttons
async function categoryButtonEventHandler(button) {
    const url = BASE_URL + '&category=' + button.id;
    const list = await fetchQuestionsFromAPI(url);
    if (list === false) {
        alert('Could not load quiz. Try again later.');
        return;
    }
    removeButtons();
    startQuiz(list);
}
function main() {
    setTitle('Quiz Categories');
    setCategoryButtons();
}
main();</script>
	
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