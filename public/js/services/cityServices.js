wgo.factory('City', ['$http', function($http) {

    return {
        get : function() {
            return $http.get('api');
        }
    }

}]);

wgo.factory('Register', ['$http', function($http) {

    return {
        post : function(registerCredentials) {
            console.log(registerCredentials);
            return $http({
                method: 'POST',
                url: 'api/auth/register',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(registerCredentials)
            });
        }
    }

}]);

wgo.factory('Login', ['$http', function($http) {

    return {
        post : function(loginCredentials) {
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
        get : function(city) {
            return $http.get('api/' + city.city);
        }
    }

}]);

wgo.factory('MailTip', ['$http', function($http) {

    return {
        save : function(mailData) {
            console.log(mailData);
            return $http({
                method: 'POST',
                url: 'api/mailtip',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(mailData)
            });
        }
    }

}]);

wgo.factory('Event', ['$http', function($http) {

    return {
        get : function(route) {
            return $http.get('api/' + route.city + '/' + route.id);
        }
    }

}]);

wgo.factory('Tag', ['$http', function($http) {

    return {
        get : function(route) {
            return $http.get('api/' + route.city + '/tags/' + route.tag);
        }
    }

}]);

wgo.factory('Create', ['$http', function($http) {

    return {
        get : function(route) {
            return $http.get('api/events/create');
        },

        save : function(eventData) {
            return $http({
                method: 'POST',
                url: 'api/events',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: eventData
            });
        }
    }

}]);

wgo.factory('Edit', ['$http', function($http) {

    return {
        get : function(route) {
            return $http.get('api/events/' + route.id + '/edit');
        },

        save : function(eventData, route) {
            console.log(eventData);
            return $http({
                method: 'PUT',
                url: 'api/events/' + route.id,
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: eventData
            });
        }
    }

}]);