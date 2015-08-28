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
                alert('Something went wrong, please try again!')
            });
    };
    

}]);

wgo.controller('CityController', ['$scope', '$http', '$routeParams', 'Events', 'City' , function($scope, $http, $routeParams, Events, City){

    $scope.city = $routeParams.city;

    

	Events.get($routeParams)
    .success(function(data) {
        console.log(data);
        $scope.events = data.events;
        $scope.cityImage = data.cityImage;
    }).error(function(err){
        console.log(err);
    });

    $scope.orderProp = 'date.date';

}]);

wgo.controller('CityEvent', ['$scope', '$http', '$routeParams', 'Event', function($scope, $http, $routeParams, Event){

    $scope.routeParams = $routeParams;

    Event.get($routeParams)
    .success(function(data) {
        $scope.event = data.event;
        $scope.tags = data.tags;
        console.log(data);
    }).error(function(err){
        console.log(err)
    });

}]);

wgo.controller('TagController', ['$scope', '$http', '$routeParams', 'Tag', 'Event', function($scope, $http, $routeParams, Tag, Event){

    $scope.city = $routeParams.city;
    $scope.tag = $routeParams.tag;
    $scope.hej = Event.routeParams;

   

    // Event.get($routeParams)
    //     .success(function(data){
    //         $scope.test = data;
    //     }).error(function(err){
    //         console.log(err)
    //     });

    Tag.get($routeParams)
    .success(function(data) {
        $scope.events = data;
        console.log(data);
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
        $scope.optional_categories = data.optional_categories;

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
            console.log(event_rage_regXp);   
        }

        var formData = $('#createForm').serialize();

        // save the event. pass in event data from the form
        // use the function we created in our service
        Create.save(formData + '&event_page=' + event_rage_regXp)
            .success(function(data) {
                console.log(data);
            }).error(function(data) {
                $('body').append(data);
        });

 //
  


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
        $scope.optional_categories = data.optional_categories;

        $scope.optional_informations = data.optional_informations;

        //Selected elements in the <select> tags.
        $scope.selected = { id : data.event.city_id };

        $scope.selectedValues = [];

        $scope.selected_tags = data.current_tags;

        angular.forEach(data.current_categories, function(a, b){
            $scope.selectedValues.push({ id : a});
        });

         angular.forEach($scope.cities,function(value,index){
            if($scope.event.city_id === value.id){
                $scope.cityName = value.name;
                return false;    
            }
        });

        $scope.selected_optional = [];
        
        angular.forEach(data.current_categories, function(a){
            $scope.selected_optional.push({id : a.pivot.optional_id, 'checked:' : ' true'});
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
                console.log(data);
            }).error(function(data) {
                $('body').append(data);
        });
    };

}]);

wgo.controller('UserEvent', ['$scope', function ($scope){
    $scope.userSubmitEvent = function(newItem){
        console.log(newItem);
        var link = "mailto:"+ 'wallof.kristofer@gmail.com'
             + "?subject=New%20email " + escape(newItem.title)
             + "&body=" + escape(newItem.body); 

    window.location.href = link;
    }
}]);