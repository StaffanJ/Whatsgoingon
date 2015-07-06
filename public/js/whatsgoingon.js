var wgo = angular.module('wgo', ['ngRoute']);

wgo.config(function ($routeProvider){
	$routeProvider
		.when('/', {
			controller: 'IndexController',
			templateUrl: 'js/views/home.html'
		})
		.when('/:city', {
			controller: 'CityController',
			templateUrl: 'js/views/city.html'
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