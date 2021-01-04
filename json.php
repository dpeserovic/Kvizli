<?php
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');
ini_set('memory_limit', '2048M');
include('connection.php');
session_start();

$sJsonID="";

if(isset($_GET['json_id']))   
{
	$sJsonID=$_GET['json_id'];
}

$oJson=array();

switch($sJsonID)
{
	case 'loadQuestion':
	$difficulty=$_GET["difficulty"];
	$sQuery="SELECT * FROM kvizli.questions WHERE difficulty=".$difficulty;
	$oRecord=$oConnection->query($sQuery);
	while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
	{
		$oQuestion=new Question
		(
			$oRow['id'],
			$oRow['question'],
			$oRow['difficulty']
		);
		array_push($oJson, $oQuestion); 
	}
	break;

	case 'loadAnswers':
	$question_id=$_GET["question_id"];
	$sQuery="SELECT * FROM kvizli.answers WHERE question_id=".$question_id;
	$oRecord=$oConnection->query($sQuery);
	while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
	{
		$oAnswer=new Answer
		(
			$oRow['question_id'],
			$oRow['correct_answer'],
			$oRow['incorrect_answer1'],
			$oRow['incorrect_answer2'],
			$oRow['incorrect_answer3']
		);
		array_push($oJson, $oAnswer); 
	}
	break;

	case 'loadGuestsHighscores':
	$sQuery="SELECT * FROM kvizli.guests_highscores ORDER BY amount_won DESC";
	$oRecord=$oConnection->query($sQuery);
	while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
	{
		$oGuestHighscore=new GuestHighscore
		(
			$oRow['nickname'],
			$oRow['amount_won'],
			$oRow['date']		
		);
		array_push($oJson, $oGuestHighscore); 
	}
	break;

	case 'loadUserHighscore':
	$user_id = $_SESSION["id"];
	$sQuery="SELECT * FROM kvizli.users_highscores WHERE user_id=".$user_id;
	$oRecord=$oConnection->query($sQuery);
	while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
	{
		$oUserHighscore=new UserHighscore
		(
			$oRow['user_id'],
			$oRow['nickname'],
			$oRow['amount_won'],
			$oRow['counter']

		);
		array_push($oJson, $oUserHighscore); 
	}
	break;

	case 'loadUsersHighscores':
	$sQuery="SELECT * FROM kvizli.users_highscores WHERE amount_won>0 ORDER BY amount_won DESC, counter";
	$oRecord=$oConnection->query($sQuery);
	while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
	{
		$oUserHighscore=new UserHighscore
		(
			$oRow['user_id'],
			$oRow['nickname'],
			$oRow['amount_won'],
			$oRow['counter']
		);
		array_push($oJson, $oUserHighscore);
	}
	break;

	case 'getUsers':
	$sQuery="SELECT * FROM kvizli.users WHERE isAdmin IS NULL";
	$oRecord=$oConnection->query($sQuery);
	while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
	{
		$oUser=new User
		(
			$oRow['id'],
			$oRow['name'],
			$oRow['surname'],
			$oRow['nickname'],
			$oRow['email'],
			$oRow['password'],
			$oRow['isAdmin']
		);
		array_push($oJson, $oUser); 
	}
	break;

	case 'getUser':
	$user_id=$_GET["user_id"];
	$sQuery="SELECT * FROM kvizli.users WHERE id=".$user_id;
	$oRecord=$oConnection->query($sQuery);
	while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
	{
		$oUpdateUser=new User
		(
			$oRow['id'],
			$oRow['name'],
			$oRow['surname'],
			$oRow['nickname'],
			$oRow['email'],
			$oRow['password'],
			$oRow['isAdmin']
		);
		array_push($oJson, $oUpdateUser); 
	}
	break;

	case 'deleteUser':
	$user_id=$_GET["user_id"];
	$sQuery="DELETE FROM kvizli.users WHERE id=".$user_id;
	$sQuery2="DELETE FROM kvizli.users_highscores WHERE user_id=".$user_id;
	$oRecord=$oConnection->query($sQuery);
	$oRecord=$oConnection->query($sQuery2);
	break;

	case 'promoteUser':
	$user_id=$_GET["user_id"];
	$sQuery="UPDATE users SET isAdmin=1 WHERE id=".$user_id;
	$oRecord=$oConnection->query($sQuery);
	break;
}

echo json_encode($oJson);
?>