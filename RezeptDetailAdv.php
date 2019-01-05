<?php
function getQueryString($queryName)
{
  //https://stackoverflow.com/a/6768831
  $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $parts = parse_url($url);
  parse_str($parts['query'], $query);
  return $query[$queryName];
}

function getValueByKey($InitialArray,$SearchKey,$SearchValue,$ReturnKey)
{
  echo"<p>Key:".$SearchKey." Value:".$SearchValue."</p>";
  foreach($InitialArray as $row){
    if ($row[$SearchKey] = $SearchValue);
    {
      //echo "<p><b> Return:".$row[$ReturnKey]."</b></p>";
      $match = $row[$ReturnKey];
    }
  }
  return $match;
  
}

$recipe_id = getQueryString("id");

  $servername = "178.192.53.57:3306";
  $username = "selim_db";
  $password = "oggefuess2791";
  $dbname = "vilkadb";
  
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * from rezept WHERE ID_Rezept =". $recipe_id;
      $stmt = $conn->query($sql); 
      $row =$stmt->fetchObject();
      $Name = $row->Name;
      $Bildpfad = $row->Bild;
      $Beschreibung = $row->Beschreibung;
      $Phonetisch = $row->Phonetisch;
      $Anlass = $row->Anlass;
      $Zeit = $row->Zeit;
      $Zubereitung = $row->Zubereitung;
      $Herkunft = $row->Herkunft_ID;

      $sql = "SELECT * from herkunft where ID_Herkunft =".$Herkunft;
      $stmt = $conn->query($sql); 
      $row =$stmt->fetchObject();
      $HerkunftName = $row->Land;
      $HerkunftKuerzel = $row->Kuerzel;

      $sql = "SELECT * from rezept_zutat where Rezept_ID =".$recipe_id;
      $stmt = $conn->query($sql); 
      $ingredientsResult =$stmt->fetchAll();

      $sql = "SELECT * from zutat";
      $stmt = $conn->query($sql); 
      $allIngredients =$stmt->fetchAll();
      print_r($allIngredients);

      $sql = "SELECT * from einheiten";
      $stmt = $conn->query($sql); 
      $allUnits =$stmt->fetchAll();
      
      $IngredientArray = [];
      foreach($ingredientsResult as $ingredientRow)
      {
        $existingEinheit = getValueByKey($allUnits,"ID_Einheit", $ingredientRow["Einheit_ID"] ,"Einheit");
        $ingredientRow["Einheit_ID"] = $existingEinheit;
        $existingIngredient = getValueByKey($allIngredients,"ID_Zutat", $ingredientRow["Zutat_ID"] ,"Name");
        $ingredientRow["Zutat_ID"] = $existingIngredient;
        array_push($IngredientArray,$ingredientRow);
      } 
    }
catch(PDOException $e)
    {
      echo "<p>" . $e->getMessage() . "</p>";
      $insertSuccess = false;
    }
  
?>
<!doctype html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/Detail.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

  <script src="scripts/main.js"></script>

  <title>VILKA</title>
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark ">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="container">
      <a class="navbar-brand" href="Home.html">
        <div class="imgcontainer">
          <img class="main" src="img/fork1.png" height="35" alt="VILKA">
          <img class="glow" src="img/fork1.png" height="35">
        </div>
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Home.html">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="Kategorien.html" id="navbarDropdown">
              Rezepte
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="Kategorien/Nach_Art.html">Nach Art</a>
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
            <span class="sr-only">(current)</span>
          </li>
          <li class="nav-item">
              <button id="btnLogin" data-toggle="modal" data-target="#myModal" type="button1" class="btn btn-sm btn-outline-light">Registrieren / Anmelden</button>
          </li>
          <li class="nav-item">
            <div class="container2">
              <div class="search-box">
                <input type="text">
                <span></span>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="content">
    <div class="container">
      <nav aria-label="breadcrumb-dark">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Rezepte</li>
        </ol>
      </nav>

      <div class="row">
        <div class="column">
          <img id="bild" src="<?php echo $Bildpfad ?>">
        </div>
        <div class="column2">
          <h1 id="title"><?php echo $Name?></h1>
          <h5 id="subtitle"><?php echo $Phonetisch?></h5>
          <hr class="featurette-divider">
          <p id="description"><?php echo $Beschreibung?></p>
          <hr class="featurette-divider">
          <h6>
            <i class="fa fa-info-circle"></i>
            <span id="info"></span>
          </h6>
          <h6>
            <i class="fa fa-globe"></i>
            <span id="origin"><?php echo $HerkunftName?></span>
          </h6>
          <h6>
            <i class="fa fa-clock-o"></i>
            <span id="time"><?php echo $Zeit ?> min</span>
          </h6>

          <hr class="featurette-divider">
          <h6>
            <i class="fa fa-tags"></i>
            <span id="tags"> </span>
          </h6>
        </div>

      </div>
      <hr class="featurette-divider">
      <div class="column1">
        <h2>Zutaten</h2>
        <?php
          foreach($IngredientArray as $ingredient) {
            echo"<p>".$ingredient["Anzahl"]." ".$ingredient["Einheit_ID"]." ".$ingredient["Zutat_ID"]."</p>";
          }
        ?>
      </div>
      <div class="column2">
        <h2>Zubereitung</h2>
      </div>
      <div class="row">

      </div>
    </div>
  </div>
  </div>
  </div>




  <!--Footer-->
  <footer class="page-footer">

    <hr class="featurette-divider">
    <div class="container">
      <!--Footer Links-->
      <div class="container-fluid text-center text-md-left">
        <div class="row">

          <!--First column-->
          <div class="col-md-6">
            <ul>
              <li>
                <a href="#">
                  <i class="fas fa-envelope"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fab fa-google-plus-g"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fab fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fab fa-paypal"></i>
                </a>
              </li>
            </ul>

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

    function SetTitle(rezept) {
      document.getElementById("title").innerHTML = rezept.title
    }

    function SetSubTitle(rezept) {
      document.getElementById("subtitle").innerHTML = rezept.subtitle
    }

    function SetDesc(rezept) {
      document.getElementById("description").innerHTML = rezept.description
    }

    function SetInfo(rezept) {
      document.getElementById("info").innerHTML = rezept.info
    }

    function SetOrigin(rezept) {
      document.getElementById("origin").innerHTML = rezept.origin
    }

    function SetTime(rezept) {
      document.getElementById("time").innerHTML = rezept.time
    }

    function SetTags(rezept) {
      document.getElementById("tags").innerHTML = rezept.tags
    }

    function SetImage(rezept) {
      document.getElementById("bild").src = "img\\Rezepte\\" + rezept.imagePath
    }

    function getQueryVariable(variable) {
      var query = window.location.search.substring(1);
      var vars = query.split("&");
      for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) { return pair[1]; }
      }
      return (false);
    }

    /*yscroll für modal*/
    $('#btnLogin').on('click', function (e) {
      var modalDialog = $('#myModal .modal-dialog');
      var yScrollOffset = window.pageYOffset;
      modalDialog.css('top', yScrollOffset);
    });



  </script>

</body>

</html>

