<?php
session_start();
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

    <script type="text/javascript" src="http://www.hygienspelet.se/public/scripts/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://www.hygienspelet.se/public/scripts/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="http://www.hygienspelet.se/public/scripts/currency-autocomplete.js"></script>
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
    <link rel="stylesheet" href="styles/welcome.css">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->


</head>
<body>
<section class="hero">
    <div class="row intro">
        <div class="small-centered medium-centered medium-6 large-5 columns">
            <div class = "logotype"></div>
        </div>
        <div class="small-centered medium-centered medium-6 large-5 columns">
            <div class="tech-img">
                <div class="container-fluid">
                    <div class="row">

                        <h2 id ="search">Sök efter din avdelning.</h2>
                        <form method="get" action="basic.php">
                            <input type="text" name="department" class="biginput" id="autocomplete">
                            <input type="hidden" name ="hiddenID" value = "" id="hiddenID">
                            <br>
                            <input type="submit" name="Hello" value ="Logga in">
                        </form>
                        <h2 id="outputcontent"></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>