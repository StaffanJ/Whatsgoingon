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
