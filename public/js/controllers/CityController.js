wgo.controller('IndexController', ['$scope', '$http', 'City', function($scope, $http, City){

    City.get()
    .success(function(data) {
        $scope.cities = data;
    });

}]);

wgo.controller('RegisterController', ['$scope', '$http', 'Register', function($scope, $http, Register){

    // function to handle submitting the form
    // Save an Event ================
    $scope.register = function() {
        console.log($scope.registerData);
    // save the event. pass in event data from the form
    // use the function we created in our service
        Register.post($scope.registerData)
            .success(function(data) {
                console.log(data);
            }).error(function(data) {
                console.log(data);
                $('body').append(data);
            });
        };

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
        $scope.date = new Date();
    }).error(function(err){
        console.log(err)
    });

    // function to handle submitting the form
    // Save an Event ================
    $scope.submitEvent = function() {

        /*--------------------------------------------------------------------------
        Göra så att time och date variablarna kommer in i databasen plus $scope.eventData
        ----------------------------------------------------------------------------*/

        var formData = $('#createForm').serialize();

        //eventData['time'].toLocaleString();

        // save the event. pass in event data from the form
        // use the function we created in our service
        Create.save(formData)
            .success(function(data) {
                console.log(data);
            }).error(function(data) {
                $('body').append(data);
        });
    };

}]);

wgo.controller('EditController', ['$scope', '$http', '$routeParams', 'Edit', function($scope, $http, $routeParams, Edit){

    Edit.get($routeParams)
    .success(function(data) {
        console.log(data);
        $scope.tags = data.tags;
        $scope.cities = data.cities;
        $scope.event = data.event;
        $scope.current_tags = data.current_tags;
    }).error(function(err){
        console.log(err)
    });

    // function to handle submitting the form
    // Save an Event ================
    $scope.submitEvent = function() {

        /*--------------------------------------------------------------------------
        Göra så att time och date variablarna kommer in i databasen plus $scope.eventData
        ----------------------------------------------------------------------------*/

        var formData = $('#editForm').serialize();

        //eventData['time'].toLocaleString();

        // save the event. pass in event data from the form
        // use the function we created in our service
        Edit.save(formData)
            .success(function(data) {
                console.log(data);
            }).error(function(data) {
                $('body').append(data);
        });
    };

}]);