<!doctype html> <html lang="sv" ng-app="wgo"> 
<head> 
<meta name="viewport" content="initial-scale=1">
<meta charset="UTF-8"> 
<meta name="fragment" content="!" /><!--Google search crawling-->


<title>What's Going On!</title>

    <!-- CSS -->
<!--     <link rel="stylesheet" type="text/css" href="css/bootstrap-3.3.5-dist/css/bootstrap.css">
 -->    
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/main.css">
    <!--Varför har vi detta?
    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }
        .comment    { padding-bottom:20px; }
    </style>
    -->
    
    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="js/angular/angular.min.js"></script> <!-- load angular -->
    <script src="js/angular/angular-route/angular-route.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    
    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
        <script src="js/whatsgoingon.js"></script> <!-- load our application -->
        <script src="js/controllers/CityController.js"></script> <!-- load our controller -->
        <script src="js/services/cityServices.js"></script> <!-- load our controller -->
        <script src="js/module/filters.js"></script> <!-- load our controller -->


        
    

</head> 
<!-- declare our angular app and controller --> 
<body><!--Tog bort -->
<div ng-view></div>

<div class="footer-top"></div>
<footer>
    <div class="container">
        <ul>
            <li>Random li</li>
            <li>Random li</li>
            <li>Random li</li>
            <li>Random li</li>
        </ul>
    </div>
</body> 
</html>