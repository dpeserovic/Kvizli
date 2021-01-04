<style type="text/css">
body
{
  background-color: #46178f;
}
.navbar-custom
{
  background-color: #f2f2f2;
  color: #333333;
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
<table class="table table-borderless tableHome">
  <thead>
    <tr>
      <th scope="col">KVIZLI</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" ng-click="countdownPageGuest()">New game - guest</th>
    </tr>
    <tr>
      <th scope="row" ng-click="highscorePage()">Highscore</th>
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
<table class="table table-borderless tableHome">
  <thead>
    <tr>
      <th scope="col">KVIZLI</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" ng-click="countdownPageUser()">New game - <?php echo $_SESSION["nickname"];?></th>
    </tr>
    <tr>
      <th scope="row" ng-click="highscorePage()">Highscore</th>
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
<table class="table table-borderless tableHome">
  <thead>
    <tr>
      <th scope="col">KVIZLI</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" ng-click="countdownPageUser()">New game - <?php echo $_SESSION["nickname"];?></th>
    </tr>
    <tr>
      <th scope="row" ng-click="highscorePage()">Highscore</th>
    </tr>
  </tbody>
</table>

<?php 
}
?>