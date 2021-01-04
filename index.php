<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900&display=swap" rel="stylesheet">
    <title>KVIZLI</title>
    <link rel="icon" href="img/K!.png">
	  <script src="assets/plugins/angular-1.7.8/angular.min.js"></script>
	  <script src="assets/plugins/angular-1.7.8/angular-route.min.js"></script>
	  <script src="assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/plugins/confetti.js-master/confetti.min.js"></script>
    <script src="js/app.js"></script>
	  <link rel="stylesheet" href="assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body ng-app="kvizliApp" ng-controller="kvizliController">
<div ng-view></div>

<?php
if(!isset($_SESSION["nickname"]))
{
}
elseif($_SESSION["isAdmin"]==1)
{
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PROFILE <?php echo $_SESSION["nickname"] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inptId">ID</label>
          <input type="text" class="form-control" id="inptId" value="<?php echo $_SESSION['id'] ?>" readonly>
        </div>
          <div class="form-group">
          <label for="inptName">Name</label>
          <input type="text" class="form-control" id="inptName" value="<?php echo $_SESSION["name"] ?>" readonly>
        </div>
          <div class="form-group">
          <label for="inptSurname">Surname</label>
          <input type="text" class="form-control" id="inptSurname" value="<?php echo $_SESSION["surname"] ?>" readonly>
        </div>
          <div class="form-group">
          <label for="inptNickname">Nickname</label>
          <input type="text" class="form-control" id="inptNickname" value="<?php echo $_SESSION["nickname"] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inptEmail">E-mail</label>
          <input type="text" class="form-control" id="inptEmail" value="<?php echo $_SESSION["email"] ?>" readonly>
        </div>
        <div ng-repeat="myProfile in arrayMyProfile">
        <div class="form-group">
          <label for="inptAmountWon">Amount won</label>
          <input type="text" class="form-control" id="inptAmountWon" value="{{myProfile.amount_won}}kn" readonly>
        </div>
        <div class="form-group">
          <label for="inptCounter">Counter</label>
          <input type="text" class="form-control" id="inptCounter" value="{{myProfile.counter}}" readonly>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-gray" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
}
else
{
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PROFILE <?php echo $_SESSION["nickname"] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inptId">ID</label>
          <input type="text" class="form-control" id="inptId" value="<?php echo $_SESSION['id'] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inptName">Name</label>
          <input type="text" class="form-control" id="inptName" value="<?php echo $_SESSION["name"] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inptSurname">Surname</label>
          <input type="text" class="form-control" id="inptSurname" value="<?php echo $_SESSION["surname"] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inptNickname">Nickname</label>
          <input type="text" class="form-control" id="inptNickname" value="<?php echo $_SESSION["nickname"] ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inptEmail">Email</label>
          <input type="text" class="form-control" id="inptEmail" value="<?php echo $_SESSION["email"] ?>" readonly>
        </div>
        <div ng-repeat="myProfile in arrayMyProfile">
        <div class="form-group">
          <label for="inptAmountWon">Amount won</label>
          <input type="text" class="form-control" id="inptAmountWon" value="{{myProfile.amount_won}}kn" readonly>
        </div>
        <div class="form-group">
          <label for="inptCounter">Counter</label>
          <input type="text" class="form-control" id="inptCounter" value="{{myProfile.counter}}" readonly>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-gray" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
}
?>

<script src="assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
</body>
</html>