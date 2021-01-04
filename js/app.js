var app = angular.module('kvizliApp', ['ngRoute']);

app.config(function($routeProvider)
{
	$routeProvider
	.when('/',
	{
		templateUrl: 'templates/landing.php'
	})
	.when('/login',
	{
		templateUrl: 'templates/login.php'
	})
	.when('/register',
	{
		templateUrl: 'templates/register.php'
	})
	.when('/about',
	{
		templateUrl: 'templates/about.php'
	})
	.when('/dashboard',
	{
		templateUrl: 'templates/dashboard.php'
	})
	.when('/addQuestion',
	{
		templateUrl: 'templates/addQuestion.php'
	})
	.when('/manageUsers',
	{
		templateUrl: 'templates/manageUsers.php'
	})
	.when('/signOut',
	{
		templateUrl: 'templates/signOut.php'
	})
	.when('/countdown',
	{
		templateUrl: 'templates/countdown.php'
	})
	.when('/kvizli',
	{
		templateUrl: 'templates/kvizli.php'
	})
	.when('/highscore',
	{
		templateUrl: 'templates/highscore.php'
	})
	.otherwise
	({
		redirectTo: '/'
	});
});

app.controller('kvizliController', function($location, $scope, $http, $window, $route, $timeout)
{
	$scope.landingPage = function()
	{
		$location.path('/');
	};
	$scope.loginPage = function()
	{
		$location.path('/login');
	};
	$scope.registerPage = function()
	{
		$location.path('/register');
	};
	$scope.aboutPage = function()
	{
		$location.path('/about');
	};
	$scope.dashboardPage = function()
	{
		$location.path('/dashboard');
	};
	$scope.addQuestionPage = function()
	{
		$location.path('/addQuestion');
	};
	$scope.manageUsersPage = function()
	{
		$location.path('/manageUsers');
	};
	$scope.signOut = function()
	{
		$location.path('/signOut');
		location.reload();
	};
	$scope.countdownPageGuest = function()
	{
		$location.path('/countdown')
		$timeout(function(){$scope.kvizliPageGuest();}, 4000);
	}
	$scope.kvizliPageGuest = function()
	{
		$scope.newGameGuest();
		$location.path('/kvizli');
	};
	$scope.countdownPageUser = function()
	{
		$location.path('/countdown')
		$timeout(function(){$scope.kvizliPageUser();}, 4000);
	}
	$scope.kvizliPageUser = function()
	{
		$scope.newGameUser();
		$location.path('/kvizli');
	}
	$scope.exit = function()
	{
		var confirmExit = confirm('Are you sure you want to leave this page? All data will be lost!');
		if(confirmExit)
		{
			$location.path('/');		
		}
	};
	$scope.refresh = function()
	{
		$window.location.reload();
	};
	$scope.highscorePage = function()
	{
		$location.path('/highscore');
	};

	$scope.formLogin = {};
  	$scope.logIn = function()
  	{
	  	$http({
	   	method:'POST',
	  	url:'login.php',
	  	data:$scope.formLogin
	  	}).then(function(success, data)
	  	{
		  	console.log(success);
		  	if(success.data.error != '')
		   	{
			    $scope.alertMsg = true;
			    $scope.alertClass = 'alert-danger';
			    $scope.alertMessage = success.data.error;
		    }
		    else
		    {
		    	location.reload();
		    }
	    });
    };

	$scope.formRegister = {};
	$scope.register = function()
	{
		$http({
		method:'POST',
		url:'register.php',
		data:$scope.formRegister
		}).then(function(success, data)
		{
			$scope.alertMsg = true;
			if(success.data.error != '')
			{
				$scope.alertClass = 'alert-danger';
				$scope.alertMessage = success.data.error;
			}
			else
			{
				$scope.alertClass = 'alert-success';
				$scope.alertMessage = success.data.message;
				$scope.formRegister.name = '';
				$scope.formRegister.surname = '';
				$scope.formRegister.nickname = '';
				$scope.formRegister.email = '';
				$scope.formRegister.password = '';
			}
		});
	};

	$scope.closeNotification = function()
	{
  		$scope.alertMsg = false;
	 };

	 var counter=1;
	 var amount=100;
	 var bank=0;
	 $scope.arrayQuestions = [];
	 $scope.arrayAskedQuestionIds = [];
	 $scope.arrayAskedQuestions = [];
	 $scope.loadQuestion = function()
	 {
		 if(counter>=1 && counter<=4){$scope.difficulty=1;}if(counter==5 || counter==6){$scope.difficulty=2;}if(counter==7 || counter==8){$scope.difficulty=3;}if(counter==9 || counter==10){$scope.difficulty=4;}if(counter==11 || counter==12){$scope.difficulty=5;}if(counter==13 || counter==14){$scope.difficulty=6;}if(counter==15){$scope.difficulty=7;}
		 if(counter==2){amount+=100;}if(counter==3){amount+=100;}if(counter==4){amount+=200;}if(counter==5){amount+=500;}if(counter==6){amount+=1000;bank+=1000;}if(counter==7){amount+=2000;}if(counter==8){amount+=4000;}if(counter==9){amount+=8000;}if(counter==10){amount+=16000;}if(counter==11){amount+=32000;bank+=31000;}if(counter==12){amount+=61000;}if(counter==13){amount+=125000;}if(counter==14){amount+=250000;}if(counter==15){amount+=500000;}
		 $http.get('json.php?json_id=loadQuestion&difficulty='+$scope.difficulty)
		 .then
		 (
			function (response) 
			{
				$scope.arrayQuestions = response.data;
				do
				{
					$scope.questionIndex = $scope.randomNumber($scope.arrayQuestions.length);
					$scope.question = $scope.arrayQuestions[$scope.questionIndex];
 
				}while($scope.arrayAskedQuestionIds.indexOf($scope.question.id)!=-1);
				$scope.arrayAskedQuestionIds.push($scope.question.id);
				$scope.loadAnswers($scope.question.id);
				$scope.shuffle();
				$scope.questionCounter = counter;
				$scope.questionAmount = amount;
				$scope.questionBank = bank;
				$scope.arrayAskedQuestions.push($scope.question.question);
			},
			function (e) 
			{
				console.log(e);
			}
		);			
	};

	$scope.randomNumber = function(n)
	{
		return Math.floor(Math.random() * n);
	};

	$scope.arrayAnswers = [];
	$scope.loadAnswers = function(question_id)
	{
		$http.get('json.php?json_id=loadAnswers&question_id='+question_id)
		.then
		(
			function (response) 
			{
				$scope.arrayAnswers = response.data;
				$scope.answers = $scope.arrayAnswers[0];
				console.log($scope.answers.correct_answer);
				return response.data;
			},
			function (e) 
			{
				console.log(e);
			}
		);			
	};

	$scope.shuffle = function()
	{
		var ul = document.querySelector('.tableKvizli tbody');
		for (var i = ul.children.length; i >= 0; i--)
		{
			ul.appendChild(ul.children[Math.random() * i | 0]);
		}
	};

	$scope.guestAnswer = {};
	$scope.lockGuestAnswer = function(element)
	{
		$scope.guestAnswer.answer = element.currentTarget.value;
		$scope.amount_won = bank;
		if($scope.answers.correct_answer==$scope.guestAnswer.answer)
		{
			counter++;
			if(counter<=15)
			{
				$scope.loadQuestion();
			}
			else
			{
				$scope.amount_won+=968000;
				$scope.congratulations = 'Congratulations! You won '+$scope.amount_won+'kn.';
				$scope.styleCongratulations = 
				{
					'font-weight' : '900'
				}		
				$scope.btnKvizliWinner = true;
				$scope.kvizli = true;
				confetti.start(5000);
			}
		}
		else
		{
			$scope.answerResult = 'Your answer is incorrect! Correct answer is: '+$scope.answers.correct_answer;
			$scope.styleAnswerResult =
			{
				'color' : '#e21b3c',
				'font-weight' : '700'
			}
			$scope.disableTbody = true;
			if($scope.amount_won==0)
			{
				$scope.newGame = 'Do you want to try again?';
				$scope.styleNewGame = 
				{
					'font-weight' : '700'
				}
				$scope.btnKvizliNewGame = true;
			}
			else
			{
				$scope.amountWon = 'Congratulations! You won '+$scope.amount_won+'kn. Save your result.';
				$scope.styleAmountWon = 
				{
					'font-weight' : '700'
				}
				$scope.btnKvizliAmountWon = true;		
			}
		}
	};

	$scope.speechGuest = function()
	{
		const btn = document.querySelector('.speech');
		const content = document.querySelector('.speechText');
		const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
		const recognition = new SpeechRecognition();
		recognition.start();
		$scope.tryAgain = '';
		recognition.onstart = function()
		{
			content.textContent = 'Listening';
			content.style.color = '#333333';

		};
		recognition.onresult = function(event)
		{
			var current = event.resultIndex;
			var transcript = event.results[current][0].transcript;
			content.textContent = transcript;
			$scope.correct_answer = $scope.answers.correct_answer;
			$scope.incorrect_answer1 = $scope.answers.incorrect_answer1;
			$scope.incorrect_answer2 = $scope.answers.incorrect_answer2;
			$scope.incorrect_answer3 = $scope.answers.incorrect_answer3;
			$scope.amount_won = bank;
			if(transcript == 'kilometara kvadratnih'){content.textContent = 'km2';transcript = 'km2';}
			if(transcript == 'jedan'){content.textContent = '1';transcript = '1';console.log(transcript);}if(transcript == 'dva'){content.textContent = '2';transcript = '2';console.log(transcript);}if(transcript == 'tri'){content.textContent = '3';transcript = '3';console.log(transcript);}if(transcript == 'četiri'){content.textContent = '4';transcript = '4';console.log(transcript);}if(transcript == 'pet'){content.textContent = '5';transcript = '5';console.log(transcript);}if(transcript == 'šest'){content.textContent = '6';transcript = '6';console.log(transcript);}if(transcript == 'sedam'){content.textContent = '7';transcript = '7';console.log(transcript);}if(transcript == 'osam'){content.textContent = '8';transcript = '8';console.log(transcript);}if(transcript == 'devet'){content.textContent = '9';transcript = '9';console.log(transcript);}
			if(transcript.toUpperCase() == $scope.correct_answer.toUpperCase())
			{
				content.style.color = '#26890c';
				counter++;
				if(counter<=15)
				{
					$scope.loadQuestion();
				}
				else
				{
					$scope.amount_won+=968000;
					$scope.congratulations = 'Congratulations! you won '+$scope.amount_won+'kn.';
					$scope.styleCongratulations = 
					{
						'font-weight' : '900'
					}		
					$scope.btnKvizliWinner = true;
					$scope.kvizli = true;
					confetti.start(5000);
				}
				$scope.$apply();
			}
			else if(transcript.toUpperCase() == $scope.incorrect_answer1.toUpperCase() || transcript.toUpperCase() == $scope.incorrect_answer2.toUpperCase() || transcript.toUpperCase() == $scope.incorrect_answer3.toUpperCase())
			{
				content.style.color = '#e21b3c';
				$scope.answerResult = 'Your answer is incorrect! Correct answer is: '+$scope.answers.correct_answer;
				$scope.styleAnswerResult =
				{
					'color' : '#e21b3c',
					'font-weight' : '700'
				}
				$scope.disableTbody = true;
				if($scope.amount_won==0)
				{
					$scope.newGame = 'Do you want to try again?';
					$scope.styleNewGame = 
					{
						'font-weight' : '700'
					}
					$scope.btnKvizliNewGame = true;
				}
				else
				{
					$scope.amountWon = 'Congratulations! You won '+$scope.amount_won+'kn. Save your result.';
					$scope.styleAmountWon = 
					{
						'font-weight' : '700'
					}
					$scope.btnKvizliAmountWon = true;	
				}
				$scope.$apply();
			}
			else
			{
				$scope.tryAgain = "I didin't recognize any of the answers, please try again.";
				content.style.color = '#333333';
				$scope.$apply();
			}
		};
	}

	$scope.guest = {};
	$scope.saveGuest = function()
	{
		$http.post('action.php', {'nickname': $scope.guest.nickname, 'amount_won': $scope.amount_won})
		.then(function(success)
		{
			$scope.guest.nickname = null;
			$location.path('/highscore');
		});
	};

	$scope.arrayGuestsHighscores = [];
	$scope.loadGuestsHighscores = function()
	{
		$http.get('json.php?json_id=loadGuestsHighscores')
		.then
		(
		    function (response) 
		    {
				$scope.arrayGuestsHighscores = response.data;
		    	console.log(response.data);
			},
			function (e) 
			{
			    console.log(e);
			}
		);			
	};

	$scope.newGameGuest = function()
	{
		$scope.arrayAskedQuestionIds = [];
		$scope.arrayAskedQuestions = [];
    	counter = 1;
    	amount = 100;
    	bank = 0;
    	$scope.congratulations = '';
		$scope.btnKvizliWinner = false;
		$scope.kvizli = false;
		$scope.answerResult = '';
		$scope.disableTbody = false;
		$scope.newGame = '';
		$scope.btnKvizliNewGame = false;
		$scope.amountWon = '';
		$scope.btnKvizliAmountWon = false;
		$scope.tryAgain = '';
	};

	$scope.userAnswer = {};
	$scope.lockUserAnswer = function(element)
	{
		$scope.userAnswer.answer = element.currentTarget.value;
		$scope.amount_won = bank;
		if($scope.answers.correct_answer==$scope.userAnswer.answer)
		{
			counter++;
			if(counter<=15)
			{
				$scope.loadQuestion();
			}
			else
			{
				$scope.amount_won+=968000;
				$scope.congratulations = 'Congratulations! You won '+$scope.amount_won+'kn.';
				$scope.styleCongratulations = 
				{
					'font-weight' : '900'
				}
				$scope.kvizli = true;
				confetti.start(5000);
				$scope.saveUser();
				$scope.gameCounter();
				$scope.btnKvizliWinner = true;
			}
		}
		else
		{
			$scope.answerResult = 'Your answer is incorrect! Correct answer is: '+$scope.answers.correct_answer;
			$scope.styleAnswerResult =
			{
				'color' : '#e21b3c',
				'font-weight' : '700'
			}
			$scope.disableTbody = true;
			$scope.loadUserHighscore($scope.amount_won);
		}
	};

	$scope.speechUser = function()
	{
		const btn = document.querySelector('.speech');
		const content = document.querySelector('.speechText');
		const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
		const recognition = new SpeechRecognition();
		recognition.start();
		$scope.tryAgain = '';
		recognition.onstart = function()
		{
			content.textContent = 'Listening';
			content.style.color = '#333333';
		};
		recognition.onresult = function(event)
		{
			var current = event.resultIndex;
			var transcript = event.results[current][0].transcript;
			content.textContent = transcript;
			$scope.correct_answer = $scope.answers.correct_answer;
			$scope.incorrect_answer1 = $scope.answers.incorrect_answer1;
			$scope.incorrect_answer2 = $scope.answers.incorrect_answer2;
			$scope.incorrect_answer3 = $scope.answers.incorrect_answer3;
			$scope.amount_won = bank;
			if(transcript == 'kilometara kvadratnih'){content.textContent = 'km2';transcript = 'km2';console.log(transcript);}
			if(transcript == 'jedan'){content.textContent = '1';transcript = '1';console.log(transcript);}if(transcript == 'dva'){content.textContent = '2';transcript = '2';console.log(transcript);}if(transcript == 'tri'){content.textContent = '3';transcript = '3';console.log(transcript);}if(transcript == 'četiri'){content.textContent = '4';transcript = '4';console.log(transcript);}if(transcript == 'pet'){content.textContent = '5';transcript = '5';console.log(transcript);}if(transcript == 'šest'){content.textContent = '6';transcript = '6';console.log(transcript);}if(transcript == 'sedam'){content.textContent = '7';transcript = '7';console.log(transcript);}if(transcript == 'osam'){content.textContent = '8';transcript = '8';console.log(transcript);}if(transcript == 'devet'){content.textContent = '9';transcript = '9';console.log(transcript);}
			if(transcript.toUpperCase() == $scope.correct_answer.toUpperCase())
			{
				content.style.color = '#26890c';
				counter++;
				if(counter<=15)
				{
					$scope.loadQuestion();
				}
				else
				{
					$scope.amount_won+=968000;
					$scope.congratulations = 'Congratulations! You won '+$scope.amount_won+'kn.';
					$scope.styleCongratulations = 
					{
						'font-weight' : '900'
					}
					$scope.kvizli = true;
					confetti.start(5000);
					$scope.saveUser();
					$scope.gameCounter();
					$scope.btnKvizliWinner = true;
				}
				$scope.$apply();
			}
			else if(transcript.toUpperCase() == $scope.incorrect_answer1.toUpperCase() || transcript.toUpperCase() == $scope.incorrect_answer2.toUpperCase() || transcript.toUpperCase() == $scope.incorrect_answer3.toUpperCase())
			{
				content.style.color = '#e21b3c';
				$scope.answerResult = 'Your answer is incorrect! Correct answer is: '+$scope.answers.correct_answer;
				$scope.styleAnswerResult =
				{
					'color' : '#e21b3c',
					'font-weight' : '700'
				}
				$scope.disableTbody = true;
				$scope.loadUserHighscore($scope.amount_won);
				$scope.$apply();
			}
			else
			{
				$scope.tryAgain = "I didin't recognize any of the answers, please try again.";
				$scope.$apply();
			}
		};
	}

	$scope.arrayUserHighscore = [];
	$scope.loadUserHighscore = function(amount_won)
	{
		$http.get('json.php?json_id=loadUserHighscore')
		.then
		(
		    function (response) 
		    {
		    	$scope.arrayUserHighscore = response.data;
		    	$scope.result = $scope.arrayUserHighscore[0];
		    	if(($scope.result==undefined) && (amount_won==0))
				{
					$scope.newGame = 'You failed to set your first score. Do you want to try again?';
					$scope.styleNewGame = 
					{
						'font-weight' : '700'
					}
					$scope.saveUser();
					$scope.gameCounter();
					$scope.btnKvizliNewGame = true;
				}
				else if(($scope.result==undefined) && (amount_won>0))
				{
					$scope.amountWon = 'Congratulations! You won '+amount_won+'kn and thus set your first score!';
					$scope.styleAmountWon = 
					{
						'font-weight' : '700'
					}
					$scope.saveUser();
					$scope.gameCounter();
					$scope.btnKvizliUsersHighscores = true;
				}
				else if (amount_won==0)
				{
					$scope.newGame = 'Do you want to try again?';
					$scope.styleNewGame = 
					{
						'font-weight' : '700'
					}
					$scope.gameCounter();
					$scope.btnKvizliNewGame = true;
				}
				else if(($scope.result!=undefined) && ($scope.result.amount_won>=amount_won))
				{
					$scope.newGame = 'You failed to beat your best score. Do you want to try again?';
					$scope.styleNewGame = 
					{
						'font-weight' : '700'
					}
					$scope.gameCounter();
					$scope.btnKvizliNewGame = true;
				}
				else
				{
					$scope.amountWon = 'Congratulations! You won '+amount_won+'kn and thus set your new score!';
					$scope.styleAmountWon = 
					{
						'font-weight' : '700'
					}
					$scope.saveUser();
					$scope.gameCounter();
					$scope.btnKvizliUsersHighscores = true;
				}
			},
			function (e) 
			{
			    console.log(e);
			}
		);			
	};

	$scope.saveUser = function()
	{
		$http.post('action.php', {'amount_won': $scope.amount_won})
		.then(function(success)
		{
		});
	};

	$scope.arrayGameCounter = [];
	$scope.gameCounter = function()
	{
		$http.get('json.php?json_id=loadUserHighscore')
		.then
		(
		    function (response) 
		    {
		    	$scope.arrayCounter = response.data;
		    	$scope.counter = $scope.arrayCounter[0];
		    	if($scope.counter==undefined)
		    	{
		    	}
		    	else
		    	{
			    	$scope.counter.counter++;
			    	$http.post('action.php', {'counter': $scope.counter.counter})
					.then(function(success)
					{
					});
				}
			},
			function (e) 
			{
			    console.log(e);
			}
		);	
	}

	$scope.arrayUsersHighscores = [];
	$scope.loadUsersHighscores = function()
	{
		$http.get('json.php?json_id=loadUsersHighscores')
		.then
		(
		    function (response) 
		    {
		    	$scope.arrayUsersHighscores = response.data;
			},
			function (e) 
			{
			    console.log(e);
			}
		);			
	};

	$scope.newGameUser = function()
	{
		$scope.arrayAskedQuestionIds = [];
		$scope.arrayAskedQuestions = [];
    	counter = 1;
    	amount = 100;
    	bank = 0;
    	$scope.congratulations = '';
    	$scope.kvizli = false;
    	$scope.btnKvizliWinner = false;
    	$scope.btnKvizliUsersHighscores = false;
    	$scope.answerResult = '';
		$scope.disableTbody = false;
    	$scope.newGame = '';
    	$scope.btnKvizliNewGame = false;
    	$scope.amountWon = '';
    	$scope.tryAgain = '';
	};

	$scope.arrayMyProfile = [];
	$scope.myProfile = function()
	{
		$http.get('json.php?json_id=loadUserHighscore')
		.then
		(
		    function (response) 
		    {
		    	$scope.arrayMyProfile = response.data;
			},
			function (e) 
			{
			    console.log(e);
			}
		);
	}

	$scope.formAddQuestion = {};
	$scope.addQuestion = function()
	{
		if($scope.formAddQuestion.question == null || $scope.formAddQuestion.difficulty == null || $scope.formAddQuestion.correct_answer == null || $scope.formAddQuestion.incorrect_answer1 == null || $scope.formAddQuestion.incorrect_answer2 == null || $scope.formAddQuestion.incorrect_answer3 == null)  
        {  
            alert('Fill every field!');
        }
        else if($scope.formAddQuestion.difficulty <= 0 || $scope.formAddQuestion.difficulty >= 8)
        {
        	alert('Invalid question difficulty!');
        }
        else
        {
	    	$http.post('action.php', {'question': $scope.formAddQuestion.question, 'difficulty': $scope.formAddQuestion.difficulty, 'correct_answer': $scope.formAddQuestion.correct_answer, 'incorrect_answer1': $scope.formAddQuestion.incorrect_answer1, 'incorrect_answer2': $scope.formAddQuestion.incorrect_answer2, 'incorrect_answer3': $scope.formAddQuestion.incorrect_answer3})
	    	.then(function(success)
	    	{
	            $scope.formAddQuestion.question = null;  
	            $scope.formAddQuestion.difficulty = null;
	            $scope.formAddQuestion.correct_answer = null;
	            $scope.formAddQuestion.incorrect_answer1 = null;
	            $scope.formAddQuestion.incorrect_answer2 = null;
	            $scope.formAddQuestion.incorrect_answer3 = null;
	        });
        }
    }

	$scope.arrayUsers = [];
	$scope.getUsers = function()
	{
		$http.get('json.php?json_id=getUsers')
		.then
		(
		    function (response) 
		    {
		    	$scope.arrayUsers = response.data;
			},
			function (e) 
			{
			    console.log(e);
			}
		);			
	};

	$scope.arrayUpdateUser = [];
	$scope.formUpdateUser = {};
	$scope.getUser = function(user_id)
	{
		$http.get('json.php?json_id=getUser&user_id='+user_id)
		.then
		(
		    function (response) 
		    {
		    	$scope.arrayUpdateUser = response.data;
		    	$scope.id = $scope.arrayUpdateUser[0].id;
		    	$scope.name = $scope.arrayUpdateUser[0].name;
		    	$scope.surname = $scope.arrayUpdateUser[0].surname;
		    	$scope.nickname = $scope.arrayUpdateUser[0].nickname;
		    	$scope.email = $scope.arrayUpdateUser[0].email;
		    	$scope.formUpdateUser.id = $scope.id;
				$scope.formUpdateUser.name = $scope.name;
				$scope.formUpdateUser.surname = $scope.surname;
				$scope.formUpdateUser.nickname = $scope.nickname;
				$scope.formUpdateUser.email = $scope.email;
			},
			function (e) 
			{
			    console.log(e);
			}
		);			
	};

	$scope.updateUser = function()
	{
		if($scope.formUpdateUser.name == '' || $scope.formUpdateUser.surname == '' || $scope.formUpdateUser.nickname == '' || $scope.formUpdateUser.email == '')  
        {  
            alert('Fill every field!');
        }
        else
        {
			$http.post('action.php', {'id': $scope.formUpdateUser.id, 'name': $scope.formUpdateUser.name, 'surname': $scope.formUpdateUser.surname, 'nickname': $scope.formUpdateUser.nickname, 'email': $scope.formUpdateUser.email})
			.then(function(success)
			{
			});
			$scope.getUsers();
		}
	}

	$scope.deleteUser = function(user_id)
	{
		$http.post('json.php?json_id=deleteUser&user_id='+user_id)
		.then(function(success)
		{
		});
		$scope.getUsers();
	}

	$scope.promoteUser = function(user_id)
	{
		$http.post('json.php?json_id=promoteUser&user_id='+user_id)
		.then(function(success)
		{
		});
		$scope.getUsers();
	}

	$scope.sortColumn = 'id';
	$scope.reverseSort = false;
	$scope.sortData = function(column)
	{
		$scope.reverseSort = ($scope.sortColumn == column) ? !$scope.reverseSort : false;
		$scope.sortColumn = column;
	}
	$scope.getSortClass = function(column)
	{
		if($scope.sortColumn == column)
		{
			return $scope.reverseSort ? 'arrow-down' : 'arrow-up'
		}
		return '';
	}
});