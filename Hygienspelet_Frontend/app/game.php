<?php
session_start();
$_SESSION['department'] = $_GET['department'];
$_SESSION['hiddenID'] = $_GET['hiddenID'];
?>


<!doctype html>
<html lang="" xmlns:width="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hygienspelet</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="scripts/game.js"></script>
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Web Application Manifest -->
    <link rel="manifest" href="manifest.json">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Web Starter Kit">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
    <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#2F3BA2">

    <!-- Color the status bar on mobile devices -->
    <meta name="theme-color" content="#2F3BA2">

    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="styles/game.css">


    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

</head>
<body>
<!-- Add your site or app content here -->

<section class="hero">
    <div class="container-fluid">
        <div class="row" id = "headerRow">

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" id = "home">
                <!-- Trigger the modal with a button -->
                <button type="button" id="homebtn" class="btn btn-default" onclick="home()">
                    <img src="http://codeitdown.com/media/Home_Icon.svg" id="homelogo" class="img-responsive"></button>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id ="logotype">

            </div>


            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" id = "sound">
               <button type="button" id="soundbtn" class="btn btn-default" onclick="toggleSound()">
                   <img src="soundOn6.png" id="soundlogo" class="img-responsive"></button>

            </div>
        </div>

    </div>

    <div class="container-fluid" id = "questioncontainer">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="progress" >
            <div  class="progress-bar progress-bar-success progress-bar-striped active" id="status-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                1/10
            </div>
        </div>


    	<div class="row">
    		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id = "question">
                <div class="well well-lg" id = "questionwell">Här ska frågan/bild in</div>
    		</div>
    	</div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >


                <div class="btn-group" data-toggle="buttons" id="answer-group">
                    <label class="btn btn-default btn-lg btn-block" onclick="selectSound()" id="btnAnsw1">
                        <input type="checkbox"  autocomplete="off" id="answer1" value="1"> <span>Checkbox 1</span>
                    </label>
                    <br>
                    <label class="btn btn-default btn-lg btn-block" onclick="selectSound()" id="btnAnsw2">
                        <input type="checkbox"  autocomplete="off"  id="answer2" value="2"> <span>Checkbox 2</span>
                    </label>
                    <br>
                    <label class="btn btn-default btn-lg btn-block"  onclick="selectSound()"  id="btnAnsw3">
                        <input type="checkbox" autocomplete="off" id="answer3" value="3"> <span>Checkbox 3</span>
                    </label>
                    <br>
                    <label class="btn btn-default btn-lg btn-block" onclick="selectSound()" id="btnAnsw4">
                        <input type="checkbox"  autocomplete="off" id="answer4" value="4"> <span>Checkbox 4</span>
                    </label>
                </div>

        	</div>
        </div>




        <div class="row">

            <button type="button" id="proceed-btn" class="btn btn-default btn-lg" onclick="proceed()">
                <img src="http://www.hygienspelet.se/public/forward.png" class="img-polaroid" id="proceed-img"></button>

        </div>

    </div>
</div>
</section>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
<!-- Built with love using Web Starter Kit -->
</body>
</html>
