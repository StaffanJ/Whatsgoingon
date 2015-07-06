wgo.controller('IndexController', ['$scope', '$http', 'City', function($scope, $http, City){


	City.get()
    .success(function(data) {
        $scope.cities = data;
    });

}]);

wgo.controller('CityController', ['$scope', '$http', '$routeParams', 'Events' , function($scope, $http, $routeParams, Events){


	Events.get($routeParams)
    .success(function(data) {
        $scope.events = data;
    	//console.log(Date($scope.events[0].date.date).toISOString());
        //$scope.events.date.date =  Date.parse(scope.v.Dt)
    });

}]);