wgo.controller('IndexController', ['$scope', '$http', 'City', function($scope, $http, City){

	City.get()
    .success(function(data) {
        $scope.cities = data;
    });

}]);

wgo.controller('CityController', ['$scope', '$http', '$routeParams', 'Events', 'City' , function($scope, $http, $routeParams, Events, City){

   /* City.get()
        .success(function(cityData){
            $scope.cities = cityData;
        });*/
    $scope.city = $routeParams.city;

	Events.get($routeParams)
    .success(function(data) {
        $scope.events = data;
    	//console.log(Date($scope.events[0].date.date).toISOString());
        //$scope.events.date.date =  Date.parse(scope.v.Dt)
    }).error(function(err){
        console.log(err)
    });

}]);

wgo.controller('CityEvents', ['$scope', '$http', '$routeParams', 'Event', function($scope, $http, $routeParams, Event){

    console.log($routeParams);

    Event.get($routeParams)
    .success(function(data) {
        $scope.event = data;
        console.log(data);
        //console.log(Date($scope.events[0].date.date).toISOString());
        //$scope.events.date.date =  Date.parse(scope.v.Dt)
    }).error(function(err){
        console.log(err)
    });

}]);