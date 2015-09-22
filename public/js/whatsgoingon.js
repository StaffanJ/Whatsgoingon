var wgo = angular.module('wgo', ['ngRoute', '720kb.socialshare']);

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
}]);

// wgo.run(['$routeParams', '$rootScope',function($routeParams, $rootScope){
// 	$rootScope.$on("$routeChangeSuccess", function(currentRoute, previousRoute){
// 		console.log($routeParams);
// 		if($routeParams.city){
// 		    $rootScope.title = $routeParams.city + '!';
// 		}else{
// 			$rootScope.title = 'no city';
// 		}

//     //Change page title, based on Route information
//    // $scope.routeParams = $routeParams;
//   });
// }]);


$(document).on("click", ".show-event-info", function() {
	console.log('ddsd');
	$('.event-info-container').toggleClass('mobile-event-info-display');
});
$(document).on("click", ".if-optional-price-exists", function() {
	$('.optional-price').toggleClass('display-optional-price');
});
