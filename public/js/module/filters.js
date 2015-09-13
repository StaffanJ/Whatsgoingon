wgo.filter('costFilter',
	function(){
		return function(input){
			if(input === 0){
				return 'Gratis'
			}else{
				return input + ' kr'
			}
		};
	});

wgo.filter('ageFilter',
	function(){
		return function(input){
			if(input === 0){
				return 'Alla åldrar'
			}else{
				return input + ' år'
			}
		};
	});

wgo.filter('dateToISO', 
	function() {
  		return function(input) {
    		return Date.parse(input);
  		};
	});
wgo.filter('cut', function () {
        return function (value, wordwise, max, tail) {
            if (!value) return '';

            max = parseInt(max, 10);
            if (!max) return value;
            if (value.length <= max) return value;

            value = value.substr(0, max);
            if (wordwise) {
                var lastspace = value.lastIndexOf(' ');
                if (lastspace != -1) {
                    value = value.substr(0, lastspace);
                }
            }

            return value + (tail || ' …');
        };
    });