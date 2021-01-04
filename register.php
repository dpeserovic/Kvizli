<?php
include('connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$message = '';
$validation_error = '';

if(empty($form_data->name))
{
	$error[] = 'Enter name';
}
else
{
	$data[':name'] = $form_data->name;
}

if(empty($form_data->surname))
{
	$error[] = 'Enter surname';
}
else
{
	$data[':surname'] = $form_data->surname;
}

if(empty($form_data->nickname))
{
	$error[] = 'Enter nickname';
}
else
{
	$data[':nickname'] = $form_data->nickname;
}

if(empty($form_data->email))
{
	$error[] = 'Enter e-mail';
}
else
{
	if(!filter_var($form_data->email, FILTER_VALIDATE_EMAIL))
	{
		$error[] = 'Enter valid e-mail format';
	}
	else
	{
		$data[':email'] = $form_data->email;
	}
}

if(empty($form_data->password))
{
	$error[] = 'Enter password';
}
else
{
	$data[':password'] = password_hash($form_data->password, PASSWORD_DEFAULT);
}

if(empty($error))
{
	$query = "INSERT INTO users (name, surname, nickname, email, password) VALUES (:name, :surname, :nickname, :email, :password)";
	$statement = $oConnection->prepare($query);
	if($statement->execute($data))
	{
		$message = 'Success!';
	}
}
else
{
	$validation_error = implode(", ", $error);
}

$output = array(
	'error'  => $validation_error,
	'message' => $message
);

echo json_encode($output);
?>