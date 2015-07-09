wgo.factory('City', ['$http', function($http) {

    return {
        // get all the cities
        get : function() {
            return $http.get('api');
        }
    }

}]);

wgo.factory('Login', ['$http', function($http) {

    return {
        // get all the cities
        poop : function(loginCredentials) {
            return $http({
                method: 'POST',
                url: 'api/auth/login',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(loginCredentials)
            });
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

}]);

wgo.factory('Event', ['$http', function($http) {

    return {
        // get all the cities
        get : function(route) {
            return $http.get('api/' + route.city + '/' + route.id);
        }
    }

}]);

wgo.factory('Tag', ['$http', function($http) {

    return {
        // get all the cities
        get : function(route) {
            return $http.get('api/' + route.city + '/tags/' + route.tag);
        }
    }

}]);

wgo.factory('Create', ['$http', function($http) {

    return {
        // get all the cities
        get : function(route) {
            return $http.get('api/events/create');
        },

        save : function(eventData) {
             return $http({
                method: 'POST',
                url: 'api/events',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(eventData)
            });
        }
    }

}]);