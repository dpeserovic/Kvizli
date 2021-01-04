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
<table class="table table-borderless tableDashboard">
  <thead>
    <tr>
      <td>ADMIN <?php echo $_SESSION["nickname"]; ?></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><button class="btn btn-purple" ng-click="addQuestionPage()">Add question</button></td>
    </tr>
    <tr>
      <td><button class="btn btn-purple" ng-click="manageUsersPage()">Manage users</button></td>
    </tr>
  </tbody>
</table>

<?php
}
?>