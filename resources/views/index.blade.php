<!DOCTYPE html> <html lang="sv" ng-app="wgo"> 
<head>
<meta name="viewport" content="initial-scale=1">
<meta charset="UTF-8"> 
<meta name="fragment" content="!" /><!--Google search crawling-->
<meta name="description" content="@{{meta}}">
<meta property="og:locale" content="sv_SE">
<meta property="og:image" content="@{{metaImg}}" />
<meta property="og:description" content="@{{metaDesc}}"/>
<title ng-bind="'Whats going on ' + $root.title">Whats going on!</title>
 
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/main.css">

    <!-- JS -->    
</head> 
<body>
<div ng-view autoscroll="true"></div>
<div class="footer-top"></div>

<footer ng-controller="UserEvent">
    <div class="container">

  <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title event-tips-header">Event Tips!</h4>
                </div>
                <div class="modal-body event-tips-body">
                    <p>Fyll i formulären för med information om eventet.</p>
                    <form ng-submit="userSubmitEvent(newUserEvent)" accept-charset="UTF-8" id="createForm">
                        <div class="form-group">
                            <label for="title">Titel:</label>
                            <input class="form-control" name="title" ng-model="newUserEvent.title" type="text" id="title">

                            <label for="body">Förklarande text om eventet:</label>
                            <textarea class="form-control" name="body" ng-model="newUserEvent.body" cols="50" rows="10" id="body"></textarea>

                            
                            <label for="event_page">Evenemangets webbplats:</label>
                            <input class="form-control" name="event_page" ng-model="newUserEvent.web" type="text" id="event_page">
                            <label for="city">Stad:</label>

                            <input class="form-control" name="city" ng-model="newUserEvent.city" type="text" id="city">
                            {!! Recaptcha::render() !!}
                            <input class="btn btn-success form-control" type="submit" value="Add Event">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <ul class="footer-ul">
        <li>Kontakta oss</li>
        <li>070-111 11 11</li>
        <li>Random li</li>
    </ul>
        <button type="button" class="module-btn" data-toggle="modal" data-target="#myModal">Föreslå ett event</button>
    </div>
</footer>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="js/angular/angular.min.js"></script> <!-- load angular -->
    <script src="js/angular/angular-route/angular-route.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.5/angular-sanitize.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!--bootstrap JS-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="js/node_modules/angular-socialshare/src/js/angular-socialshare.js"></script>
    
    <!-- ANGULAR -->
    <script src="js/whatsgoingon.js"></script> <!-- load our application -->
    <script src="js/controllers/CityController.js"></script> <!-- load our controller -->
    <script src="js/services/cityServices.js"></script> <!-- load our controller -->
    <script src="js/module/filters.js"></script> <!-- load our controller -->
    
    <script src="js/mainScript.js"></script>
</body>
</html>