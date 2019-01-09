<!doctype html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/Rezepteseite.css">

  <title>VILKA</title>
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
          <a class="dropdown-item" style="pointer-events: none;cursor: default;opacity:0.5">Drinks & Desserts</a>
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



  <div class="content">
    <div class="container">
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
    function printRecipes($recipes)
    {
      if(count($recipes) < 1)
      {
        echo "<p>Keine Rezepte gefunden</p>";
        exit;
      }
      $conn = ConnectToDB();
      echo "<div class='row'>";
        //for ($i = 0; $i < $length; $i++) {
        foreach($recipes as $recipeSingle)
        {
          $sql = "SELECT * from herkunft WHERE ID_Herkunft = ".$recipeSingle["Herkunft_ID"];
          $stmt = $conn->query($sql);
          $row = $stmt->fetchObject();
          $Kuerzel = $row->Kuerzel;
          echo "<div class='column' style='margin-left: 0;'><a href='RezeptDetailAdv.php?id=".$recipeSingle["ID_Rezept"]."'>";
          echo "<div class='img_container'><img src='img/Rezepte/RealRecipes/".$recipeSingle["Bild"]."'></div>";
          echo "<div class='teaser__inner'><h3>".$recipeSingle["Name"]." <i class='em ".$Kuerzel."'></i></h3><h6 class='thin'><i>".$recipeSingle["phonetisch"]."</i></h6><br><h6><i class='fa fa-info-circle'></i>".$recipeSingle["Portionen"] ." Portionen</h6><h6><i class='fa fa-clock-o'></i> ".$recipeSingle["Zeit"]." min</h6></div>";
          echo "</a></div>";
        }
        echo "</div>";
    }
      $category = "";
      $value = "";
      $conn = ConnectToDB();
      $sql = "SELECT * from rezept";
      $stmt = $conn->query($sql);
      $recipes = $stmt->fetchAll();
      if(isset($_GET['value']))
      {
        $value = $_GET['value'];
      }
      if(isset($_GET['category']))
      {
        $category = $_GET['category'];
      }
      if($category == "" || $value == "")
      {
          printRecipes($recipes);
          exit;
      }
      switch ($category) {
        case "kontinent":
            $sql = "SELECT ID_Herkunft from herkunft WHERE Kontinent = '".$value."'";
            $stmt = $conn->query($sql);
            $validCountryList = $stmt->fetchAll();
            $validCountryArray = [];
            foreach($validCountryList as $country)
            {
              array_push($validCountryArray,$country["ID_Herkunft"]);
            }
            foreach($recipes as $recipeKey => $recipeValue){
              if(! in_array($recipeValue["Herkunft_ID"] , $validCountryArray))
              {
               unset($recipes[$recipeKey]);   
              }
            }
            break;
          case"anlass":
            $sql = "SELECT * from rezept WHERE Anlass = '".$value."'";
            $stmt = $conn->query($sql);
            $recipes = $stmt->fetchAll();
            break;
          case"zubereitung":
            $sql = "SELECT * from rezept WHERE Zubereitung = '".$value."'";
            $stmt = $conn->query($sql);
            $recipes = $stmt->fetchAll();
            break;
          case"allergie":
            foreach ($recipes as $recipeKey => $recipeValue)
            {
              $sql = "SELECT * from rezept_zutat WHERE Rezept_ID = ".$recipeValue["ID_Rezept"];
              $stmt = $conn->query($sql);
              $alleRezeptZutat = $stmt->fetchAll();
              $ingredientsOfRecipe = [];
              foreach($alleRezeptZutat as $RezeptZutat)
              {
                $sql = "SELECT * from zutat WHERE ID_Zutat = ".$RezeptZutat["Zutat_ID"];
                $stmt = $conn->query($sql);
                $ingredient = $stmt->fetchObject();
                array_push($ingredientsOfRecipe,(array)$ingredient);
              }
              $valid = true;
              $hasFish = false;
              $IsVegetarian = false;
              foreach($ingredientsOfRecipe as $ingredient)
              {
                if($value == "IsNut" || $value == "IsGluten" || $value == "IsLactose")
                {
                  if($ingredient[$value] == 1)
                  {
                    $valid = false;
                  }
                }
                else if($value == "IsVegan" || $value == "IsVegetarian")
                {
                  if($ingredient[$value] == 0)
                  {
                    $valid = false;
                  }
                }
                else
                {
                  if($ingredient["IsFish"] == 1)
                  {
                      $hasFish = true;
                  }
                  if($ingredient["IsVegetarian"] == 1)
                  {
                      $IsVegetarian = true;
                  }
                }
              }
              if($value == "IsPescetarian" && (!$hasFish || !$IsVegetarian))
              {
                  $valid = false;
              }
              if (!$valid)
              {
                unset($recipes[$recipeKey]);
              }
            }
            break;
    }
    printRecipes($recipes); 
    ?>
    </div>
  </div>




  <!--Footer-->
  <footer class="page-footer">

    <hr class="featurette-divider">
    <div class="container">
      <!--Footer Links-->
      <div class="row">

        <!--First column-->
        <div class="col-md-6">

          <div class="arrow">
            <a href="#">
              <i class="fas fa-angle-up"></i>
            </a>
          </div>

        </div>
        <!--/.First column-->

      </div>

    </div>
    <!--/.Footer Links-->

  </footer>
  <!--/.Footer-->


</body>

</html>