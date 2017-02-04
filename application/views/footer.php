
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
</head>
<body>
    <!-- for facebook account -->
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style>
#map {
        height: 400px;
        width: 100%;
       }
</style>
    <!-- for facebook account -->

    <div class="container-fluid footerAll">
        <div class="container">
            <center>
                <div class="footerLogo">
                    <img src=<?= base_url().'assets/footer-logo.png' ?> width="100%">
                </div>
            </center>
            <div class="col-sm-12 footerNav">
                <ul>
                    <li><a href="#">FIRMA</a></li>
                    <li><a href="#">KONTAKT</a></li>
                    <li><a href="#">WSPÓŁPRACA</a></li>
                </ul>
                <ul class="footerNavHigher">
                    <li><a href="#">GŁÓWNA</a></li>
                    <li><a href="#">OCHRANIACZE</a></li>
                    <li><a href="#">TRENING</a></li>
                    <li><a href="#">OBUWIE</a></li>
                    <li><a href="#">ODZIEŻ</a></li>
                </ul>
            </div>
            <div class="col-md-6 hidden-xs" style="text-align:center; margin-bottom:15px;">
               <div class="fb-page" data-href="https://www.facebook.com/TeamSESH-463554477010763/?fref=ts" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TeamSESH-463554477010763/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TeamSESH-463554477010763/?fref=ts">TeamSESH</a></blockquote></div>
            </div>
            <div class="col-md-6 hidden-sm hidden-lg" style="text-align:center; margin-bottom:15px;">
               <div class="fb-page" data-href="https://www.facebook.com/TeamSESH-463554477010763/?fref=ts" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TeamSESH-463554477010763/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TeamSESH-463554477010763/?fref=ts">TeamSESH</a></blockquote></div>
            </div>
            <div class="col-md-6 hidden-xs" style="text-align:center; margin-bottom:15px;">
                <div id="map"></div>
            </div>
            <div class="col-sm-3 footerSubMenu">
                <div class="footerHeader">
                    Przydatne linki
                </div>
            </div>
            <div class="col-sm-3 footerSubMenu">
                <div class="footerHeader">
                    Informacje
                </div>
                <ul>
                    <li>Pliki cookies</li>
                    <li>Regulamin</li>
                    <li>Regulamin</li>
                </ul>
            </div>
        </div>
    </div>
    <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src=<?= base_url().'/assets/script.js' ?>></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDE8mVY5jc7V-mLaxhqlPc8lEbOx9iibRU&callback=initMap">
    </script>
</body>
</html>