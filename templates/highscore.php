<style type="text/css">
body
{
  background-color: #46178f;
  font-weight: 700;
  counter-reset: section;
}
.navbar-custom
{
  background-color: #f2f2f2;
  color:#333333;
}
.count:before
{
  counter-increment: section;
  content: counter(section);
}
</style>

<?php
session_start();
if(!isset($_SESSION["nickname"]))
{
?>

<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" ng-click="landingPage()">Kvizli</a>
  <div class="collapse navbar-collapse navbar-custom" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item navbar-custom">
        <a class="nav-link" ng-click="loginPage()">Login</a>
      </li>
      <li class="nav-item navbar-custom">
        <a class="nav-link" ng-click="registerPage()">Register</a>
      </li>
      <li class="nav-item navbar-custom">
        <a class="nav-link" ng-click="aboutPage()">About</a>
      </li>
    </ul>
  </div>
</nav>
<div ng-init="loadGuestsHighscores()"></div>
<table class="table table-borderless tableHighscore">
  <thead>
    <tr>
      <th scope="col">Place</th>
      <th scope="col">Nickname</th>
      <th scope="col">Amount won</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="guestHighscore in arrayGuestsHighscores">
      <th scope="row" class="count">.</th>
      <td>{{guestHighscore.nickname}}</td>
      <td>{{guestHighscore.amount_won}}kn</td>
      <td>{{guestHighscore.date}}</td>
    </tr>
  </tbody>
</table>

<?php
}
elseif($_SESSION["isAdmin"]==1)
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
<div ng-init="loadUsersHighscores()"></div>
<table class="table table-borderless tableHighscore">
  <thead>
    <tr>
      <th scope="col">Place</th>
      <th scope="col">Nickname</th>
      <th scope="col">Amount won</th>
      <th scope="col">Counter</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="userHighscore in arrayUsersHighscores">
      <th scope="row" class="count">.</th>
      <td>{{userHighscore.nickname}}</td>
      <td>{{userHighscore.amount_won}}kn</td>
      <td>{{userHighscore.counter}}</td>
    </tr>
  </tbody>
</table>

<?php
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
        <a class="nav-link" ng-click="signOut()">Sign out</a>
      </li>
    </ul>
  </div>
</nav>
<div ng-init="loadUsersHighscores()"></div>
<table class="table table-borderless tableHighscore">
  <thead>
    <tr>
      <th scope="col">Place</th>
      <th scope="col">Nickanme</th>
      <th scope="col">Amount won</th>
      <th scope="col">Counter</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="userHighscore in arrayUsersHighscores">
      <th scope="row" class="count">.</th>
      <td>{{userHighscore.nickname}}</td>
      <td>{{userHighscore.amount_won}}kn</td>
      <td>{{userHighscore.counter}}</td>
    </tr>
  </tbody>
</table>

<?php
}
?>