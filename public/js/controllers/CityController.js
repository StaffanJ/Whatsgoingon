wgo.controller('IndexController', ['$scope', '$http', 'City', function($scope, $http, City){

	City.get()
    .success(function(data) {
        $scope.cities = data;
    });

}]);

wgo.controller('CityController', ['$scope', '$http', '$routeParams', 'Events', 'City' , function($scope, $http, $routeParams, Events, City){

    $scope.city = $routeParams.city;

	Events.get($routeParams)
    .success(function(data) {
        $scope.events = data;
    }).error(function(err){
        console.log(err);
    });

    $scope.orderProp = 'date';

}]);

wgo.controller('CityEvents', ['$scope', '$http', '$routeParams', 'Event', function($scope, $http, $routeParams, Event){

    $scope.routeParams = $routeParams;
    
    Event.get($routeParams)
    .success(function(data) {
        console.log(data);
        $scope.event = data.event;
        $scope.tags = data.tags
    }).error(function(err){
        console.log(err)
    });

}]);

wgo.controller('TagController', ['$scope', '$http', '$routeParams', 'Tag', function($scope, $http, $routeParams, Tag){

    $scope.city = $routeParams.city;

    Tag.get($routeParams)
    .success(function(data) {
        $scope.events = data;
        console.log(data);
    }).error(function(err){
        console.log(err)
    });

}]);

wgo.controller('CreateController', ['$scope', '$http', 'Create', function($scope, $http, Create){

    Create.get()
    .success(function(data) {
        $scope.form = data;
        console.log(data);
    }).error(function(err){
        console.log(err)
    });

}]);