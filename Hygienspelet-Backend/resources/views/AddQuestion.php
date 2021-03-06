<!doctype html>
<html lang="" xmlns:width="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hygienspelet-Skapa Fråga</title>

    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="http://www.hygienspelet.se/public/styles/question.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://www.hygienspelet.se/public/scripts/question.js"></script>

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



    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
</head>
<body>

<!-- Add your site or app content here -->
<div id="pagewrap">

    <div class="container-fluid">

        <!-- <form id="question-form" method="post" action="scripts/contact.php" role="form"> -->
<!--        <form id="question-form" method="post"  action="http://www.hygienspelet.se/public/scripts/question.php" role="form">-->
        <form id="question-form" method="POST"  action="admin/store" role="form">


        <div class="questions">

            <div class="questInputs">


                    <div class="col-md-6">
                        <label for="form_picture">Bild-URL*</label>
                        <input id="form_picture" type="text" name="picture" class="form-control" placeholder="Skriv in bildreferens... *" required="required">
                    </div>
                    <div class="col-md-12">
                        <label for="form_question">Frågebeskrivning *</label>
                        <textarea id="form_question" name="question" class="form-control" placeholder="Skriv in fråga... *" rows="4" required="required"></textarea>
                     </div>
                    <div class="col-md-6">
                        <label for="form_answer1">Svarsalternativ 1 *</label>
                        <input id="form_answer1" type="text"  name="answer1" class="form-control" placeholder="Skriv in Svar 1... *" required="required">
                    </div>
                    <div class="col-md-6">
                        <label for="form_answer2">Svarsalternativ 2 *</label>
                        <input id="form_answer2" type="text"  name="answer2" class="form-control" placeholder="Skriv in Svar 2... *" required="required">
                    </div>
                    <div class="col-md-6">
                        <label for="form_answer3">Svarsalternativ 3 *</label>
                        <input id="form_answer3" type="text"  name="answer3" class="form-control" placeholder="Skriv in Svar 3... *" required="required">
                    </div>
                    <div class="col-md-6">
                        <label for="form_answer4">Svarsalternativ 4 *</label>
                        <input id="form_answer4" type="text"  name="answer4" class="form-control" placeholder="Skriv in Svar 4...*" required="required">
                    </div>

                 <!-- Lägg in rätt svarsalternativ med knappar buttongroup-->
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

                    <label for="form_correct">Markera <strong>Rätt</strong> Svarsalternativ *</label>
                        <div class="btn-group" data-toggle="buttons" id="form_correct">

                            <label class="btn btn-primary active">
                                <input type="radio" name="correctAnswer" id="option1" autocomplete="off" checked value="1">Svarsalternativ 1
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="correctAnswer" id="option2" autocomplete="off" value="2">Svarsalternativ 2
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="correctAnswer" id="option3" autocomplete="off" value="3">Svarsalternativ 3
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="correctAnswer" id="option4" autocomplete="off" value="4">Svarsalternativ 4
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <input type="submit" class="btn btn-success btn-send" value="Spara fråga i databas">
                    </div>
                    <div class="col-md-12">
                        <p class="text-muted-question"><strong>*</strong> OBS:Obligatoriska fält.</p>
                    </div>
                </div>
            </div>

        </form>




    </div>










    </div>

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