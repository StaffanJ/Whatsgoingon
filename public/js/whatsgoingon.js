var wgo = angular.module('wgo', ['ngRoute']);

wgo.config(function($routeProvider, $locationProvider){
	
	$routeProvider
		.when('/', {
			controller: 'IndexController',
			templateUrl: 'js/views/home.html'
		})
		.when('/:city', {
			controller: 'CityController',
			templateUrl: 'js/views/city.html'
		})
		.when('/:city/:id', {
			controller: 'CityEvents',
			templateUrl: 'js/views/event.html'
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