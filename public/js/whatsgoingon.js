var wgo = angular.module('wgo', ['ngRoute', '720kb.socialshare', 'ngSanitize']);

wgo.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider){
	

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
		.when('/:city/categories', {
			controller: 'CategoriesController',
			templateUrl: 'js/views/categories.html'
		})
		.when('/:city/:id', {
			controller: 'CityEvent',
			templateUrl: 'js/views/event.html'
		})
		.when('/:city/category/:tag', {
			controller: 'CategoryController',
			templateUrl: 'js/views/tag.html'
		})
		.otherwise({
			redirectTo:'/'
		});
}]);

$(document).on("click", ".show-event-info", function() {
	console.log('ddsd');
	$('.event-info-container').toggleClass('mobile-event-info-display');
});
$(document).on("click", ".if-optional-price-exists", function() {
	$('.optional-price').toggleClass('display-optional-price');
});
