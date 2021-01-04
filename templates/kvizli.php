<div ng-init="loadQuestion()"></div>

<style type="text/css">
body
{
	background-color:#f2f2f2;
	color:#333333;
}
.navbar-custom
{
  background-color: #46178f;
  color:#f2f2f2;
}
</style>

<?php
session_start();
if(!isset($_SESSION["nickname"]))
{
?>

<nav class="navbar navbar-expand-lg navbar-custom">
  <span class="navbar-brand">Kvizli</span>
  <span class="navbar-custom">Player: Guest</span>
  <div class="collapse navbar-collapse navbar-custom" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item navbar-custom">
        <a class="nav-link" ng-click="exit()">Exit</a>
      </li>
    </ul>
  </div>
</nav>
<ul class="listSpeech" ng-show="!kvizli">
  <li><button class="btn btn-block btn-speech speech" ng-click="speechGuest()">Speech<i class="material-icons">keyboard_voice</i></button></li>
  <li><span class="btn btn-block speechText"></span></li>
  <li><span class="btn btn-block tryAgain">{{tryAgain}}</span></li>
</ul>
<table id="tableHoverQuestions" class="table table-borderless tableAskedQuestions">
  <thead>
    <tr>
      <th>Asked questions</th>
    </tr>
  </thead>
  <tbody id="tbodyHideQuestions" ng-repeat="askedQuestion in arrayAskedQuestions">
    <tr>
      <td>{{askedQuestion}}</td>
    </tr>
  </tbody>
</table>
<table class="table table-borderless tableKvizli" ng-show="!kvizli">
  <thead>
    <tr>
      <th class="text-center">Question worth: {{questionAmount}}kn</th>
      <th class="text-center">In bank: {{questionBank}}kn</th>
    </tr>
    <tr>
      <th colspan="2" scope="col">{{questionCounter}}. {{question.question}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="2" scope="row">
        <button class="btn btn-block btn-answer" name="{{answers.correct_answer}}" id="{{answers.correct_answer}}" value="{{answers.correct_answer}}" ng-model="guestAnswer.answer" ng-click="lockGuestAnswer($event)" ng-disabled="disableTbody">
        {{answers.correct_answer}}
        </button>
      </td>
    </tr>
    <tr>
      <td colspan="2" scope="row">
        <button class="btn btn-block btn-answer" name="{{answers.incorrect_answer1}}" id="{{answers.incorrect_answer1}}" value="{{answers.incorrect_answer1}}" ng-model="guestAnswer.answer" ng-click="lockGuestAnswer($event)" ng-disabled="disableTbody">
          {{answers.incorrect_answer1}}
        </button>
      </td>
    </tr>
    <tr>
      <td colspan="2" scope="row">
        <button class="btn btn-block btn-answer" name="{{answers.incorrect_answer2}}" id="{{answers.incorrect_answer2}}" value="{{answers.incorrect_answer2}}" ng-model="guestAnswer.answer" ng-click="lockGuestAnswer($event)" ng-disabled="disableTbody">
          {{answers.incorrect_answer2}}
        </button>
      </td>
    </tr>
    <tr>
      <td colspan="2" scope="row">
        <button class="btn btn-block btn-answer" name="{{answers.incorrect_answer3}}" id="{{answers.incorrect_answer3}}" value="{{answers.incorrect_answer3}}" ng-model="guestAnswer.answer" ng-click="lockGuestAnswer($event)" ng-disabled="disableTbody">
          {{answers.incorrect_answer3}}
        </button>
      </td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2">
        <span ng-style="styleAnswerResult">{{answerResult}}</span>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <span class="newGame" ng-style="styleNewGame">{{newGame}}</span>
        <span ng-style="styleAmountWon">{{amountWon}}</span>
      </td>
    </tr>
    <tr>
      <td colspan="2">
          <button class="btn btn-green" ng-click="refresh()" ng-show="btnKvizliNewGame">Yes</button>
          <button class="btn btn-red" ng-click="landingPage()" ng-show="btnKvizliNewGame">No</button>
          <button class="btn btn-purple" data-toggle="modal" data-target="#exampleModal" ng-show="btnKvizliAmountWon">+</button>
      </td>
    </tr>
  </tfoot>
</table>
<table class="table table-borderless tableKvizliCongratulations">
  <thead>
    <tr>
      <th>
        <span ng-style="styleCongratulations">{{congratulations}}</span>
      </th>
    </tr>
    <tr>
      <th>
        <button class="btn btn-purple" data-toggle="modal" data-target="#exampleModal" ng-show="btnKvizliWinner">+</button>
      </th>
    </tr>
  </thead>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Congratulations!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inptNickname">Nickname:</label>
          <input type="text" class="form-control" id="inptNickname" ng-model="guest.nickname">
        </div>
        <div class="form-group">
          <label for="inptAmountWon">Amount won:</label>
          <input type="text" class="form-control" id="inptAmountWon" value="{{amount_won}}kn" readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-purple" data-dismiss="modal" ng-click="saveGuest()">Save</button>
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

<nav class="navbar navbar-expand-lg navbar-custom">
  <span class="navbar-brand">Kvizli</span>
  <span class="navbar-custom">Player <?php echo $_SESSION["nickname"]; ?></span>
  <div class="collapse navbar-collapse navbar-custom" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item navbar-custom">
        <a class="nav-link" ng-click="exit()">Exit</a>
      </li>
    </ul>
  </div>
</nav>
<ul class="listSpeech" ng-show="!kvizli">
  <li><button class="btn btn-block btn-speech speech" ng-click="speechUser()">Speech<i class="material-icons">keyboard_voice</i></button></li>
  <li><span class="btn btn-block speechText"></span></li>
  <li><span class="btn btn-block tryAgain">{{tryAgain}}</span></li>
</ul>
<table id="tableHoverQuestions" class="table table-borderless tableAskedQuestions">
  <thead>
    <tr>
      <th>Asked questions</th>
    </tr>
  </thead>
  <tbody id="tbodyHideQuestions" ng-repeat="askedQuestion in arrayAskedQuestions">
    <tr>
      <td>{{askedQuestion}}</td>
    </tr>
  </tbody>
</table>
<table class="table table-borderless tableKvizli" ng-show="!kvizli">
  <thead>
    <tr>
      <th class="text-center">Question worth: {{questionAmount}}kn</th>
      <th class="text-center">In bank: {{questionBank}}kn</th>
    </tr>
    <tr>
      <th colspan="2" scope="col">{{questionCounter}}. {{question.question}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="2" scope="row">
        <button class="btn btn-block btn-answer" name="{{answers.correct_answer}}" id="{{answers.correct_answer}}" value="{{answers.correct_answer}}" ng-model="userAnswer.answer" ng-click="lockUserAnswer($event)" ng-disabled="disableTbody">
          {{answers.correct_answer}}
        </button>
      </td>
    </tr>
    <tr>
      <td colspan="2" scope="row">
        <button class="btn btn-block btn-answer" name="{{answers.incorrect_answer1}}" id="{{answers.incorrect_answer1}}" value="{{answers.incorrect_answer1}}" ng-model="userAnswer.answer" ng-click="lockUserAnswer($event)" ng-disabled="disableTbody">
          {{answers.incorrect_answer1}}
        </button>
      </td>
    </tr>
    <tr>
      <td colspan="2" scope="row">
        <button class="btn btn-block btn-answer" name="{{answers.incorrect_answer2}}" id="{{answers.incorrect_answer2}}" value="{{answers.incorrect_answer2}}" ng-model="userAnswer.answer" ng-click="lockUserAnswer($event)" ng-disabled="disableTbody">
          {{answers.incorrect_answer2}}
        </button>
      </td>
    </tr>
    <tr>
      <td colspan="2" scope="row">
        <button class="btn btn-block btn-answer" name="{{answers.incorrect_answer3}}" id="{{answers.incorrect_answer3}}" value="{{answers.incorrect_answer3}}" ng-model="userAnswer.answer" ng-click="lockUserAnswer($event)" ng-disabled="disableTbody">
          {{answers.incorrect_answer3}}
        </button>
      </td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2">
        <span ng-style="styleAnswerResult">{{answerResult}}</span>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <span ng-style="styleNewGame">{{newGame}}</span>
        <span ng-style="styleAmountWon">{{amountWon}}</span>
      </td>
    </tr>
    <tr>
      <td colspan="2">
          <button class="btn btn-green" ng-click="refresh()" ng-show="btnKvizliNewGame">Yes</button>
          <button class="btn btn-red" ng-click="landingPage()" ng-show="btnKvizliNewGame">No</button>
          <button class="btn btn-purple" ng-click="highscorePage()" ng-show="btnKvizliUsersHighscores">Highscore</button>
      </td>
    </tr>
  </tfoot>
</table>
<table class="table table-borderless tableKvizliCongratulations">
  <thead>
    <tr>
      <th>
        <span ng-style="styleCongratulations">{{congratulations}}</span>
      </th>
    </tr>
    <tr>
      <th>
        <button class="btn btn-purple" ng-click="highscorePage()" ng-show="btnKvizliWinner">Highscore</button>
      </th>
    </tr>
  </thead>
</table>

<?php
}
?>