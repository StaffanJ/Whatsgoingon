wgo.controller('IndexController', ['$scope', '$http', 'City', function($scope, $http, City){

    City.get()
    .success(function(data) {
        $scope.cities = data;
    });

}]);

wgo.controller('LoginController', ['$scope', '$http', 'Login', function($scope, $http, Login){

    // function to handle submitting the form
    // Save an Event ================
    $scope.login = function() {

        // save the event. pass in event data from the form
        // use the function we created in our service
        Login.post($scope.loginData)
            .success(function(data) {
                console.log(data);
            }).error(function(data) {
                $('body').append(data);
            });
    };

}]);

wgo.controller('CityController', ['$scope', '$http', '$routeParams', 'Events', 'City' , function($scope, $http, $routeParams, Events, City){

    $scope.city = $routeParams.city;

	Events.get($routeParams)
    .success(function(data) {
        $scope.events = data;
    }).error(function(err){
        console.log(err);
    });

    $scope.orderProp = 'date.date';

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
        $scope.tags = data.tags;
        $scope.cities = data.cities;
    }).error(function(err){
        console.log(err)
    });

    // function to handle submitting the form
    // Save an Event ================
    $scope.submitEvent = function() {

        $scope.eventData['date'] = $scope.eventData['date'].toLocaleString();
        $scope.eventData['time'] = $scope.eventData['time'].toLocaleString();
        
        // save the event. pass in event data from the form
        // use the function we created in our service
        Create.save($scope.eventData)
            .success(function(data) {
                console.log(data);
            }).error(function(data) {
                $('body').append(data);
            });
    };

}]);