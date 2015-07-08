wgo.factory('City', ['$http', function($http) {

    return {
        // get all the cities
        get : function() {
            return $http.get('api');
        }
    }

}]);

wgo.factory('Events', ['$http', function($http) {

    return {
        // get all the cities
        get : function(city) {
            console.log(city.city);
            return $http.get('api/' + city.city);
        }
    }

    /*return $http.get('api/Stockholm')
    .success(function(data){
        return data;
    });*/

}]);
wgo.factory('Event', ['$http', function($http) {

    return {
        // get all the cities
        get : function(route) {
            console.log(route.city + '/' + route.id);
            return $http.get('api/' + route.city + '/' + route.id);
        }
    }

    /*return $http.get('api/Stockholm')
    .success(function(data){
        return data;
    });*/

}]);