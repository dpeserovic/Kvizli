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

<div ng-init="getUsers()"></div>
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
</nav><br>
<p>Search: <input type="text" class="formSearch" ng-model="searchUser"></p>
<table class="table table-hover tableManageUsers">
  <thead>
    <tr>
      <th scope="col" ng-click="sortData('id')">ID<span ng-class="getSortClass('id')"></span></th>
      <th scope="col" ng-click="sortData('name')">Name<div ng-class="getSortClass('name')"></div></th>
      <th scope="col" ng-click="sortData('surname')">Surname<div ng-class="getSortClass('surname')"></div></th>
      <th scope="col" ng-click="sortData('nickname')">Nickname<div ng-class="getSortClass('nickname')"></div></th>
      <th scope="col" ng-click="sortData('email')">E-mail<div ng-class="getSortClass('email')"></div></th>
      <th scope="col">UPDATE</th>
      <th scope="col">DELETE</th>
      <th scope="col">PROMOTE</th>
    </tr>
  </thead>
  <tbody ng-repeat="user in arrayUsers | filter : searchUser | orderBy : sortColumn : reverseSort">
    <tr>
      <td scope="row" name="{{user.id}}" id="{{user.id}}" value="{{user.id}}">{{user.id}}</td>
      <td name="{{user.name}}" id="{{user.name}}" value="{{user.name}}">{{user.name}}</td>
      <td name="{{user.surname}}" id="{{user.surname}}" value="{{user.surname}}">{{user.surname}}</td>
      <td name="{{user.nickname}}" id="{{user.nickname}}" value="{{user.nickname}}">{{user.nickname}}</td>
      <td name="{{user.email}}" id="{{user.email}}" value="{{user.email}}">{{user.email}}</td>
      <td><button class="btn btn-block btn-blue" ng-click="getUser(user.id)" data-toggle="modal" data-target="#updateModal"><i class="material-icons">account_box</i></button></td>
      <td><button class="btn btn-block btn-red" ng-click="deleteUser(user.id)"><i class="material-icons">delete</i></button></td>
      <td><button class="btn btn-block btn-green" ng-click="promoteUser(user.id)"><i class="material-icons">supervisor_account</i></button></td>
    </tr>
  </tbody>
</table>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE {{nickname}} PROFILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inptEditId">ID</label>
          <input type="text" class="form-control" id="inptEditId" value="{{formUpdateUser.id}}" ng-model="formUpdateUser.id" readonly>
        </div>
          <div class="form-group">
          <label for="inptEditName">Name</label>
          <input type="text" class="form-control" id="inptEditName" value="{{formUpdateUser.name}}" ng-model="formUpdateUser.name">
        </div>
          <div class="form-group">
          <label for="inptEditSurname">Surname</label>
          <input type="text" class="form-control" id="inptEditSurname" value="{{formUpdateUser.surname}}" ng-model="formUpdateUser.surname">
        </div>
          <div class="form-group">
          <label for="inptEditNickname">Nickname</label>
          <input type="text" class="form-control" id="inptEditNickname" value="{{formUpdateUser.nickname}}" ng-model="formUpdateUser.nickname">
        </div>
        <div class="form-group">
          <label for="inptEditEmail">E-mail</label>
          <input type="email" class="form-control" id="inptEditEmail" value="{{formUpdateUser.email}}" ng-model="formUpdateUser.email">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-purple" data-dismiss="modal" ng-click="updateUser()">Update</button>
        <button class="btn btn-gray" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
}
?>