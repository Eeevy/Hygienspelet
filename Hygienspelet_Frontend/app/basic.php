<?php
session_start();
if(isset($_REQUEST['department']))
    $_SESSION['department'] = $_GET['department'];
if(isset($_REQUEST['hiddenID']))
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
      <script type="text/javascript" src="scripts/menu.js"></script>

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
      <link rel="stylesheet" href="styles/menu.css">


    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

  </head>
  <body>
    <!-- Add your site or app content here -->
    <section class="hero">
        <div class="container-fluid" id = "headerContainer">
            <div class="row" id = "headerRow">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" id = "infocolumn">
                    <!-- Trigger the modal with a button -->
                    <a href="#" data-toggle="modal" data-target="#about">
                        <img src="http://whiteant.se/img/infoicon.png" class="img-responsive" id = "infoButton">
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="about" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Om Hygienspelet</h4>
                                </div>
                                <div class="modal-body">


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <h2>Hur fungerar Hygienspelet.se?</h2>
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="//www.youtube.com/embed/ePbKGoIGAXY"></iframe>
                                        </div>
                                    </div>

                                    <p>En Massa informationtext .</p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id ="logotype">

                </div>


                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" id = "highscorecolumn">
                    <a href="#" data-toggle="modal"  onclick="showHsList()" data-target="#highscore">
                        <img src="http://cdn.mysitemyway.com/etc-mysitemyway/icons/legacy-previews/icons/glossy-silver-icons-sports-hobbies/044613-glossy-silver-icon-sports-hobbies-cup-trophy.png" class="img-responsive" id ="highscoreButton">
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="highscore" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close"  data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Highscore</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="container-fluid">
                                        <div class="well well-sm" id="highscore_list">
                                            <ul id="myTab" class="nav nav-tabs">
                                                <li class="active"><a onclick="showHsList()" href="#top" data-toggle="tab" id ="depPoints">Avdelning: </a></li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div class="tab-pane fade active in" id="top">
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>



        <div class="container-fluid" id ="departmentContainer">
        <div class="row" id = "departmentRow">

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id = "departmentColumn">
                <div id="unit">
                    Inloggad på: <?php echo $_SESSION['department']?>
                    <input type="hidden" id="hiddenID" value="<?php echo $_SESSION['hiddenID']?>">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id = "logoutColumn">
                <div class="btn-group" id = "logoutButtonn">
                    <a type="button" class="btn btn-default" id ="logoutButton" href="http://www.hygienspelet.se">Logga Ut</a>
                </div>
            </div>


            </div>
            </div>

        <div class="container-fluid" id= "playchallangeContainer">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a type="button"  class="btn btn-default btn-lg btn-block"
                   href="http://www.hygienspelet.se/game/pr=<?php echo $_SESSION['hiddenID'];?>">Spela själv</a>
            </div>
        </div>


        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#utmana">Utmana</button>

            <!-- Modal -->
            <div class="modal fade" id="utmana" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Utmana</h4>
                        </div>
                        <div class="modal-body">

                            <div id="searchfield-challenge">
                                <h2>Sök efter den avdelning du vill utmana.</h2>
                                <form><input type="text" name="currency-challenge" class="biginput-challenge" id="autocomplete-challenge"></form>
                            </div><!-- @end #searchfield -->

                            <p id="outputcontent-challenge">Här kommer ditt val att visas.</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="container-fluid" id = "challangeContainer">
            <ul id="challenges" class="nav nav-tabs">
                <li class="active"><a onclick="showActiveChallengesList()" href="#actives" data-toggle="tab" id = "aktiva">Aktiva utmaningar</a></li>
                <li class=""><a onclick="showFinishedChallengesList()" href="#finished" data-toggle="tab" id ="avslutade">Avslutade utmaningar</a></li>
            </ul>
            <div id="challenges-content" class="tab-content">
                <div class="tab-pane fade active in" id="actives">
                </div>
                <div class="tab-pane fade" id="finished">
                </div>
            </div>
        </div>




        <div class="container-fluid" id = "footerContainer">
        <div class="row row-centered" id="footer">

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id ="facebook">
                <a href="https://www.facebook.com/Hygienspelet-268617866805285/">
                    <img src="http://100wattaren.se/sites/all/themes/hundra_wattaren/images/facebook-icon.svg" class="img-responsive">
                </a>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id = "mail">
                    <a data-toggle="modal" data-target="#sendMail">
                        <img src="http://static.wixstatic.com/media/132ad9_4efcfd76175f43e8b0e49ca430155970.png_srz_300_300_85_22_0.50_1.20_0.00_png_srz" class="img-responsive">
                    </a>

                <!-- Modal -->
                <div class="modal fade" id="sendMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Kontakta Hygienspelet</h4>
                            </div>
                            <div class="modal-body">
                                <form id="contact-form" method="post" action="http://www.hygienspelet.se/public/scripts/contact.php" role="form">

                                    <div class="messages"></div>

                                    <div class="controls">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="form_name">Surname *</label>
                                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="form_lastname">Lastname *</label>
                                                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="form_email">Email *</label>
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="form_phone">Phone</label>
                                                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="form_message">Message *</label>
                                                <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-success btn-send" value="Send message">
                                            </div>
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>*</strong> These fields are required.</p>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
                                <button type="button" class="btn btn-primary">Skicka</button>

                            </div>
                        </div>
                    </div>
                </div>


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