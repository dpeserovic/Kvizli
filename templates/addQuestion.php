<style type="text/css">
body
{
  background-color: #f2f2f2;
  color:#46178f;
  font-weight: 700;
}
.navbar-custom
{
  background-color: #333333;
  color:#f2f2f2;
}
</style>

<?php
session_start();
if(!isset($_SESSION["nickname"]))
{
header("location:landing.php");
}
else
{
?>

<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" ng-click="landingPage()">Kvizli</a>
  <span class="navbar-custom">Welcome <?php echo $_SESSION["nickname"]; ?></span>
  <div class="collapse navbar-collapse navbar-custom" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item navbar-custom">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal" ng-click=myProfile()>My profile</a>
      </li>
      <li class="nav-item navbar-custom">
        <a class="nav-link" ng-click="dashboardPage()">Dashboard</a>
      </li>
      <li class="nav-item navbar-custom">
        <a class="nav-link" ng-click="signOut()">Sign out</a>
      </li>
    </ul>
  </div>
</nav>
<form class="login-form" method="post" ng-submit="addQuestion()">
  <div class="form-group">
    <label for="question">Question</label>
    <input type="text" class="form-control" id="question" placeholder="Question" ng-model="formAddQuestion.question">
  </div>
  <div class="form-group">
    <label for="difficulty">Difficulty</label>
    <input type="number" class="form-control" id="difficulty" placeholder="Difficulty: 1 - 7" ng-model="formAddQuestion.difficulty">
  </div>
  <div class="form-group">
    <label for="correct_answer">Correct answer</label>
    <input type="text" class="form-control" id="correct_answer" placeholder="Correct answer" ng-model="formAddQuestion.correct_answer">
  </div>
  <div class="form-group">
    <label for="incorrect_answer1">1st incorrect answer</label>
    <input type="text" class="form-control" id="incorrect_answer1" placeholder="1st incorrect answer" ng-model="formAddQuestion.incorrect_answer1">
  </div>
  <div class="form-group">
    <label for="incorrect_answer2">2nd incorrect answer</label>
    <input type="text" class="form-control" id="incorrect_answer2" placeholder="2nd incorrect answer" ng-model="formAddQuestion.incorrect_answer2">
  </div>
  <div class="form-group">
    <label for="incorrect_answer3">3rd incorrect answer</label>
    <input type="text" class="form-control" id="incorrect_answer3" placeholder="3rd incorrect answer" ng-model="formAddQuestion.incorrect_answer3">
  </div>
  <button type="submit" class="btn btn-block btn-purple">Add question</button>
</form>

<?php
}
?>