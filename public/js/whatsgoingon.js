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
		.when('/:city', {
			controller: 'CityController',
			templateUrl: 'js/views/city.html'
		})
		.when('/events/create', {
			controller: 'CreateController',
			templateUrl: 'js/views/create.html'
		})
		.when('/:city/:id', {
			controller: 'CityEvents',
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
    input = new Date(input).toISOString();
  	console.log('This is the new date format: ' + input);
    return input;
  };
});