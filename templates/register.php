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
<div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
 <a class="close" ng-click="closeNotification()" aria-label="close">&times;</a>
 {{alertMessage}}
</div>
<form class="login-form" method="post" ng-submit="register()">
  <h1 class="text-center">Register</h1>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name" ng-model="formRegister.name">
  </div>
  <div class="form-group">
    <label for="surname">Surname</label>
    <input type="text" class="form-control" id="surname" placeholder="Surname" ng-model="formRegister.surname">
  </div>
  <div class="form-group">
    <label for="nickname">Nickname</label>
    <input type="text" class="form-control" id="nickname" placeholder="Nickname" ng-model="formRegister.nickname">
  </div>
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email" placeholder="E-mail" ng-model="formRegister.email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" ng-model="formRegister.password">
  </div>
  <button type="submit" class="btn btn-block btn-purple">Register</button>
</form>