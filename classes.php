<?php
class Configuration
{
	public $host="localhost";
	public $dbName="kvizli";
	public $username="root";
	public $password="";	
}

class User
{
	public $id="N/A";
	public $name="N/A";
	public $surname="N/A";
	public $nickname="N/A";
	public $email="N/A";
	public $password="N/A";
	public $isAdmin="N/A";

	public function __construct($id=null, $name=null, $surname=null, $nickname=null, $email=null, $password=null, $isAdmin=null)
	{
		if($id) $this->id=$id;
		if($name) $this->name=$name;
		if($surname) $this->surname=$surname;
		if($nickname) $this->nickname=$nickname;
		if($email) $this->email=$email;
		if($password) $this->password=$password;
		if($isAdmin) $this->isAdmin=$isAdmin;
	}
}

class Question
{
	public $id="N/A";
	public $question="N/A";
	public $difficulty="N/A";

	public function __construct($id=null, $question=null, $difficulty=null)
	{
		if($id) $this->id=$id;
		if($question) $this->question=$question;
		if($difficulty) $this->difficulty=$difficulty;
	}
}

class Answer
{
	public $question_id="N/A";
	public $correct_answer="N/A";
	public $incorrect_answer1="N/A";
	public $incorrect_answer2="N/A";
	public $incorrect_answer3="N/A";

	public function __construct($question_id=null, $correct_answer=null, $incorrect_answer1=null, $incorrect_answer2=null, $incorrect_answer3=null)
	{
		if($question_id) $this->question_id=$question_id;
		if($correct_answer) $this->correct_answer=$correct_answer;
		if($incorrect_answer1) $this->incorrect_answer1=$incorrect_answer1;
		if($incorrect_answer2) $this->incorrect_answer2=$incorrect_answer2;
		if($incorrect_answer3) $this->incorrect_answer3=$incorrect_answer3;
	}
}

class UserHighscore
{
	public $user_id="N/A";
	public $nickname="N/A";
	public $amount_won=0;
	public $counter=0;

	public function __construct($user_id=null, $nickname=null, $amount_won=null, $counter=null)
	{
		if($user_id) $this->user_id=$user_id;
		if($nickname) $this->nickname=$nickname;
		if($amount_won) $this->amount_won=$amount_won;
		if($counter) $this->counter=$counter;
	}
}

class GuestHighscore
{
	public $nickname="N/A";
	public $amount_won="N/A";
	public $date="N/A";

	public function __construct($nickname=null, $amount_won=null, $date=null)
	{
		if($nickname) $this->nickname=$nickname;
		if($amount_won) $this->amount_won=$amount_won;
		if($date) $this->date=$date;
	}
}
?>