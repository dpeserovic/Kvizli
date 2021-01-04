<?php
include('connection.php');
session_start();

$data = json_decode(file_get_contents("php://input"));

$query = "INSERT INTO questions(question, difficulty) VALUES (:question, :difficulty)";
$oStatement = $oConnection->prepare($query);
$oData = array
(
	'question' => $data->question,
	'difficulty' => $data->difficulty
);
try
{
	$oStatement=$oConnection->prepare($query);
	$oStatement->execute($oData);
	echo 1;
}
catch(PDOException $error)
{
	echo $error;
	echo 0;
}

$query2 = "INSERT INTO answers(correct_answer, incorrect_answer1, incorrect_answer2, incorrect_answer3) VALUES
(:correct_answer, :incorrect_answer1, :incorrect_answer2, :incorrect_answer3)";
$oStatement = $oConnection->prepare($query2);
$oData = array
(
	'correct_answer' => $data->correct_answer,
	'incorrect_answer1' => $data->incorrect_answer1,
	'incorrect_answer2' => $data->incorrect_answer2,
	'incorrect_answer3' => $data->incorrect_answer3
);
try
{
	$oStatement=$oConnection->prepare($query2);
	$oStatement->execute($oData);
	echo 1;
}
catch(PDOException $error)
{
	echo $error;
	echo 0;
}

$query3 = "INSERT INTO guests_highscores(nickname, amount_won) VALUES (:nickname, :amount_won)";
$oStatement = $oConnection->prepare($query3);
$oData = array
(
	'nickname' => $data->nickname,
	'amount_won' => $data->amount_won
);
try
{
	$oStatement=$oConnection->prepare($query3);
	$oStatement->execute($oData);
	echo 1;
}
catch(PDOException $error)
{
	echo $error;
	echo 0;
}

$user_id = $_SESSION["id"];
$nickname = $_SESSION["nickname"];
$query4 = "INSERT INTO users_highscores(user_id, nickname, amount_won) VALUES (:user_id, :nickname, :amount_won)
ON DUPLICATE KEY UPDATE user_id=:user_id, nickname=:nickname, amount_won=:amount_won";
$oStatement = $oConnection->prepare($query4);
$oData = array
(
	'user_id' => $user_id,
	'nickname' => $nickname,
	'amount_won' => $data->amount_won
);
try
{
	$oStatement=$oConnection->prepare($query4);
	$oStatement->execute($oData);
	echo 1;
}
catch(PDOException $error)
{
	echo $error;
	echo 0;
}

$query5 = "UPDATE users_highscores SET counter=:counter WHERE user_id=".$user_id;
$oStatement = $oConnection->prepare($query5);
$oData = array
(
	'counter' => $data->counter
);
try
{
	$oStatement=$oConnection->prepare($query5);
	$oStatement->execute($oData);
	echo 1;
}
catch(PDOException $error)
{
	echo $error;
	echo 0;
}

$query6 = "UPDATE users SET name=:name, surname=:surname, nickname=:nickname, email=:email WHERE id=:id";
$oStatement = $oConnection->prepare($query6);
$oData = array
(
	'id' => $data->id,
	'name' => $data->name,
	'surname' => $data->surname,
	'nickname' => $data->nickname,
	'email' => $data->email
);
try
{
	$oStatement=$oConnection->prepare($query6);
	$oStatement->execute($oData);
	echo 1;
}
catch(PDOException $error)
{
	echo $error;
	echo 0;
}

$query7 = "UPDATE users_highscores SET nickname=:nickname WHERE user_id=:id";
$oStatement = $oConnection->prepare($query7);
$oData = array
(
	'user_id' => $data->user_id,
	'nickname' => $data->nickname
);
try
{
	$oStatement=$oConnection->prepare($query7);
	$oStatement->execute($oData);
	echo 1;
}
catch(PDOException $error)
{
	echo $error;
	echo 0;
}
?>