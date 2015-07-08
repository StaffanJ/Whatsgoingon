<!doctype html> <html lang="sv"> <head> <meta charset="UTF-8"> 

<title>Laravel and Angular Comment System</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }
        .comment    { padding-bottom:20px; }
    </style>
    
    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="js/angular/angular.min.js"></script> <!-- load angular -->
    <script src="js/angular/angular-route/angular-route.min.js"></script>
    
    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
        <script src="js/whatsgoingon.js"></script> <!-- load our application -->
        <script src="js/controllers/CityController.js"></script> <!-- load our controller -->
        <script src="js/services/cityServices.js"></script> <!-- load our controller -->

        
    

</head> 
<!-- declare our angular app and controller --> 
<body class="container" ng-app="wgo">
<div ng-view></div>
</body> 
</html>