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
            });
    };
    

}]);

wgo.controller('CityController', ['$scope', '$http', '$routeParams', '$location', 'Events', 'City' , function($scope, $http, $routeParams, $location, Events, City){

    $scope.city = $routeParams.city;

    

	Events.get($routeParams)
    .success(function(data) {
        $scope.events = data.events;
        $scope.cityImage = data.cityImage;

        $scope.currentPage = 0;
        $scope.pageSize = 9;

        $scope.numberOfPages=function(){
            return Math.ceil($scope.events.length/$scope.pageSize);                
        }

    }).error(function(err){
        $location.path("/");
    });

    $scope.orderProp = 'date.date';

}]);

wgo.controller('CityEvent', ['$scope', '$http', '$routeParams', '$location', 'Event', function($scope, $http, $routeParams, $location, Event){

    $scope.routeParams = $routeParams;

    Event.get($routeParams)
    .success(function(data) {
        $scope.event = data.event;
        $scope.tags = data.tags;
    }).error(function(err){
        $location.path("/");
    });

}]);

wgo.controller('TagController', ['$scope', '$http', '$routeParams', 'Tag', 'Event', function($scope, $http, $routeParams, Tag, Event){

    $scope.city = $routeParams.city;
    $scope.tag = $routeParams.tag;
    $scope.hej = Event.routeParams;

    Tag.get($routeParams)
    .success(function(data) {
        $scope.events = data;
    }).error(function(err){
        console.log(err)
    });

    $scope.orderProp = 'date.date';


}]);

wgo.controller('CreateController', ['$scope', '$http', 'Create', function($scope, $http, Create){

    Create.get()
    .success(function(data) {
        $scope.tags = data.tags;
        $scope.cities = data.cities;
        $scope.date = new Date();
        $scope.images = data.images;
        $scope.selected = data.cities[0].id;

    }).error(function(err){
        console.log(err)
    });

    

    // function to handle submitting the form
    // Save an Event ================
    $scope.submitEvent = function() {

        //eventData['time'].toLocaleString();

        var event_rage_regXp = $('#event_page').val();

        var email = new RegExp('^(http|https)://');

        if (!email.test(event_rage_regXp)) {
            event_rage_regXp = 'http://' + event_rage_regXp;  
        }

        var formData = $('#createForm').serialize();

        // save the event. pass in event data from the form
        // use the function we created in our service
        Create.save(formData + '&event_page=' + event_rage_regXp)
            .success(function(data) {

            }).error(function(data) {
        });
    };
}]);

wgo.controller('EditController', ['$scope', '$http', '$routeParams', 'Edit', function($scope, $http, $routeParams, Edit){

    Edit.get($routeParams)
    .success(function(data) {
        $scope.tags = data.tags;
        $scope.cities = data.cities;
        $scope.event = data.event;
        $scope.current_tags = data.current_tags;
        $scope.optional_categories = data.optional_categories;
        $scope.selected_optional = data.current_categories;
        $scope.images = data.images;
        $scope.currentImage = { id : data.event.img_id };

        //Selected elements in the <select> tags.
        $scope.selected = { id : data.event.city_id };

        $scope.selectedValues = [];

        $scope.selected_tags = data.current_tags;

        angular.forEach(data.current_tags, function(a, b){
            $scope.selectedValues.push({ id : a});
        });

         angular.forEach($scope.cities,function(value,index){
            if($scope.event.city_id === value.id){
                $scope.cityName = value.name;
                return false;    
            }
        });

    }).error(function(err){
        console.log(err)
    });


    

    // function to handle submitting the form
    // Save an Event ================
    $scope.submitEvent = function() {

        /*--------------------------------------------------------------------------
        Identifiera varför det blir ett number i de olika selects.
        ----------------------------------------------------------------------------*/

        var formData = $('#editForm').serialize();

        console.log(formData);

        //eventData['time'].toLocaleString();

        // save the event. pass in event data from the form
        // use the function we created in our service
        Edit.save(formData, $routeParams)
            .success(function(data) {

            }).error(function(data) {
                $('body').append(data);
        });
    };

}]);

wgo.controller('UserEvent', ['$scope', '$http', 'MailTip', function($scope, $http, MailTip){
    
    $scope.userSubmitEvent = function(newItem){

        MailTip.save(newItem)
            .success(function(data) {

            }).error(function(data) {
                $('body').append(data);
        });
    }
}]);