<?php
function ConnectToDB()
{
  $servername = "178.192.53.57:3306";
  $username = "selim_db";
  $password = "oggefuess2791";
  $dbname = "vilkadb";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  return $conn;
} 
$db = ConnectToDB();

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * from rezept";
$stmt = $db->query($sql);
$rows = $stmt->fetchAll();
$ingredientSource = [];
$ingredientString;
foreach($rows as $row)
{
    array_push($ingredientSource,"new Rezept(".$row["ID_Rezept"].",'".$row["Name"]."')");
}
$ingredientString = implode(",",$ingredientSource);
      
      ?><!doctype html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>VILKA</title>
  <script src="scripts/modal.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/Home.css">
  <link rel="stylesheet" href="css/modal.css">
  <script src="scripts/main.js"></script>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src="js/index.js"></script>


</head>

<body>

  <nav class="navbar sticky-top navbar-expand-lg navbar-dark ">



    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <div class="imgcontainer">
          <img class="main" src="img/fork1.png" height="35" alt="VILKA">
          <img class="glow" src="img/fork1.png" height="35">
        </div>
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="Kategorien.html" id="navbarDropdown">
              Rezepte
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="Kategorien/Nach_Art.html">Nach Zubereitungsart</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="+suche.html">Nach Zutaten</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="Kategorien/Aus_aller_Welt.html">Aus aller Welt</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="Kategorien/Für_besondere_Anlässe.html">Für besondere Anlässe</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="Kategorien/Ernährung_&_Allergien.html">Ernährung & Allergien</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="Kategorien/Drinks_&_Desserts.html">Drinks & Desserts</a>
            </div>
          </li>

          <a class="nav-link" href="#">About
            <span class="sr-only">(current)</span>
          </a>

          <!-- searchRecipe -->


          <li class="nav-item">
            <div class="container2">
              <div class="search-box">
                <form autocomplete="off" action="Rezeptdetail.html"></form>
                <input id="searchRecipe" type="text">
                <span></span>
                </form>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Slide -->

    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class=""></li>
      <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item">
        <div class="slideshow-wrapper">
          <div class="gradient">
            <img class="first-slide" src="img/FrontPage/ScallionPancake2.jpg" alt="First slide">
          </div>
        </div>
        <div class="container">
          <div class="carousel-caption text-left">
            <div class=a bstand>
              <h2>
                <span>葱油饼</span>
              </h2>
              <p>
                <span>In China werden Pfannkuchen meisstens salzig mit oder ohne Füllung als Beilage gegessen. Ich zeige euch wie der Klassiker gefüllt mit Frühlingswiebeln gemacht wird.</span>
              </p>
              <a class="btn btn-lg btn-primary" href="http://vilka.ch/RezeptDetailAdv.php?id=11" role="button">Zum Rezept</a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item active">
        <div class="slideshow-wrapper">
          <div class="gradient">
            <img class="first-slide" src="img/FrontPage/Plov2.jpg" alt="Second slide">
          </div>
        </div>
        <div class="container">
          <div class="carousel-caption">
            <div class=a bstand>
              <h2>
                <span>узбекский плов</span>
              </h2>
              <p>
                <span>[ʊzbʲˈekskʲɪj plˈof] - Plov wird in ganz Zentral Asien gegessen, die ursprüngliche Bezeichnung stammt wahrscheinlich aus Iran (persisch پلو / polow, auch pollo) - "Reis".  </span>
              </p>
              <a class="btn btn-lg btn-primary" href="#" role="button">Zum Rezept</a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="slideshow-wrapper">
          <div class="gradient">
            <img class="first-slide" src="img/FrontPage/Puttanesca2.jpg" alt="Third slide">
          </div>
        </div>
        <div class="container">
          <div class="carousel-caption text-right">
            <div class=a bstand>
              <h2>
                <span>Spaghetti alla puttanesca</span>
              </h2>
              <p>
                <span>Der Ursprung des Namens ist ungeklärt. Eine der Erklärungen soll er darauf zurückgehen, dass Prostituierte das Gericht schnell und einfach zwischen Besuchen ihrer Freier zubereiten konnten.</span>
              </p>
              <a class="btn btn-lg btn-primary" href="http://vilka.ch/RezeptDetailAdv.php?id=14" role="button">Zum Rezept</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Marketing messaging and featurettes
      ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- START THE FEATURETTES -->
    <h1 style="text-align:center">Willkommen bei Vilka</h1>
    <hr class="featurette-divider">
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">10 neue Rezepte für den Sommer.
          <span class="text-muted">Zeig Ihnen wer der Grillmeister ist!</span>
        </h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo
          cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        <p>
          <a class="btn btn-secondary" href="#" role="button">Zum Rezept &raquo;</a>
        </p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="img/Rezepte/1.gif" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Morgens Müde?
          <span class="text-muted">Maori Bread geht super schnell und passt perfekt zu Tee oder Kaffe.</span>
        </h2>
        <p class="lead"> Fritterter Teig ist in vielen Ländern Beliebt, zwar nicht gesund aber meiner Meinung nach, eines der besten Teegebäcke überhaupt.</p>
        <p>
          <a class="btn btn-secondary" href="#" role="button">Zum Rezept &raquo;</a>
        </p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" src="img/FrontPage/Baursak.jpg" alt="Maori Bread">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Abkühlung gefällig?
          <span class="text-muted"> Bald gibts neue Getränke und Desserts für den Frühling.</span>
        </h2>
        <p class="lead">Drinks & Desserts ist noch in bearbeitung, ihr könnt euch aber auf Erfrischende Rezepte freuen sobald ich die Zeit dazu gefunden habe. </p>
       
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="img/Rezepte/2.gif" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">
    <!-- /END THE FEATURETTES -->

    <h1 style="text-align:center">About Vilka</h2>

      <hr class="featurette-divider">

      <p>Vilka oder вилка (kyrillisch) bedeutet auf Russisch Gabel. Als Rezepteseite mit Erweiterter Suche hat Vilka das Ziel
        mir bei der Entscheidung zu helfen: «Was koche ich heute?». Ich interessiere mich für Essen aus aller Welt und habe mir mittlerweile über 120 Rezepte angesammelt. Diese aber wurden in meinem Kopf oder meiner riesigen Youtube Playlist gespeichert - viel zu unübersichtlich. Es musste bessere Lösung her, eine bei der man z.B. nach Zutaten suchen kann, die man noch Zuhause hat. Aus diesem Grund habe ich Vilka ins Leben gerufen, primär um mir und eventuell auch euch den Alltag ein kleines bisschen unkoplizierter zu machen.
      </p>
<br><br> <br>







  </div>
  <!-- /.container -->




  <!--Footer-->
  <footer class="page-footer">

    <hr class="featurette-divider">
    <div class="container">
      <!--Footer Links-->
      <div class="container-fluid text-center text-md-left">
        <div class="row">


            <div class="arrow">
              <a href="#">
                <i class="fas fa-angle-up"></i>
              </a>
            </div>

          </div>
          <!--/.First column-->

        </div>
      </div>
    </div>
    <!--/.Footer Links-->

  </footer>
  <!--/.Footer-->

  <script>
    function Rezept(id, title)
    {
      this.id = id;
      this.title = title;
    }
    var dbrezepte = [<?php echo $ingredientString ?>];
    
    autocomplete(document.getElementById("searchRecipe"), dbrezepte);

  </script>
</body>

</html>
