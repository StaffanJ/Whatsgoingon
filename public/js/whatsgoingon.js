var wgo = angular.module('wgo', ['ngRoute']);

wgo.config(function($routeProvider, $locationProvider){
	

	$routeProvider
		.when('/', {
			controller: 'IndexController',
			templateUrl: 'js/views/home.html'
		})
		.when('/login', {
			controller : 'LoginController',
			templateUrl : 'js/views/login.html'
		})
		.when('/register', {
			controller : 'RegisterController',
			templateUrl : 'js/views/register.html'
		})
		.when('/create', {
			controller: 'CreateController',
			templateUrl: 'js/views/create.html'
		})
		.when('/:id/edit', {
			controller: 'EditController',
			templateUrl: 'js/views/edit.html'
		})
		.when('/:city', {
			controller: 'CityController',
			templateUrl: 'js/views/city.html'
		})
		.when('/:city/:id', {
			controller: 'CityEvent',
			templateUrl: 'js/views/event.html'
		})
		.when('/:city/tags/:tag', {
			controller: 'TagController',
			templateUrl: 'js/views/tag.html'
		})
		.otherwise({
			redirectTo:'/'
		});
});

wgo.filter('dateToISO', function() {
  return function(input) {
    return Date.parse(input);
  };
});