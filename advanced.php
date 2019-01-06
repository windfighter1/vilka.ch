<!doctype html>
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
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/+suche.css">
  <script src="scripts/main.js"></script>


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/tokenfield-typeahead.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css">

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.1/typeahead.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

  <title>VILKA</title>


  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark ">



    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="Home.html">
        <div class="imgcontainer">
          <img class="main" src="img/fork1.png" height="35" alt="VILKA">
          <img class="glow" src="img/fork1.png" height="35">
        </div>
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Home.html">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="Kategorien.html" id="navbarDropdown">
              Rezepte
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="Kategorien/Nach_Art.html">Nach Art</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Nach Zutaten</a>
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
                <input id="searchRecipe" type="text">
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

      <h1>Erweiterte Suche</h1>

      <!--<form autocomplete="off" disable>
        <div class="input-group">
          <div class="input-group mb-3">
            <input type="text" id="tokenfield-typeahead" placeholder="Nach Zutaten suchen..." aria-describedby="button-addon2">
            <div class="input-group-append">
            </div>
          </div>
        </div>
      </form>-->

      <form id="primaryform" method="post" action="advanced.php">
      <input type="text" id="tokenfield-typeahead" placeholder="Nach Zutaten suchen..." aria-describedby="button-addon2">
        <div class="input-group">
            <div class="input-group mb-3">
              <input type="hidden" id="ChosenIngredients" name="ChosenIngredients"/>
              <button type="submit" name="SubmitForm" class="btn" id="button-addon2">Suchen</button>
            </div>
        </div>    
      </form>

    </div>
    <div class ="search_option_container">
        <ul class="nav">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Zubereitungsart</a>
              <div class="dropdown-menu">
                <ul>
                  <li>
                    <a href="#" class="small" data-value="test" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Test</a>
                  </li>
                  <div class="dropdown-divider"></div>
                </ul>
              </div>
            </li>
    
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Herkunft</a>
              <div class="dropdown-menu">
                <ul>
                  <li>
                    <a href="#" class="small" data-value="option7" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Afrika</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option8" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Asien</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option9" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Australien</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option10" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Europa</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option11" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Nordamerika</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option12" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Südamerika</a>
                  </li>
                </ul>
              </div>
            </li>
    
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ernährungsweise</a>
              <div class="dropdown-menu">
                <ul>
                  <li>
                    <a href="#" class="small" data-value="option13" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Vegan</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option14" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Vegetarisch</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option15" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Pescetarisch</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option16" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Ohne Nüsse</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option17" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Ohne Gluten</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option18" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Ohne Lactose</a>
                  </li>
                </ul>
              </div>
            </li>
    
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Zeitaufwand</a>
              <div class="dropdown-menu">
                <ul>
                  <li>
                    <a href="#" class="small" data-value="option19" tabIndex="-1">
                      <input type="checkbox" />&nbsp;
                      < 15min.</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option20" tabIndex="-1">
                      <input type="checkbox" />&nbsp;
                      < 30min.</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option21" tabIndex="-1">
                      <input type="checkbox" />&nbsp;
                      < 1h.</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option22" tabIndex="-1">
                      <input type="checkbox" />&nbsp;> 1h.</a>
                  </li>
                </ul>
              </div>
            </li>
    
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Anlass</a>
              <div class="dropdown-menu">
                <ul>
    
                  <li>
                    <a href="#" class="small" data-value="option23" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Festtage</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option24" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Candlelight</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option25" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Picnic</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option26" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Kochen im Freien</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li>
                    <a href="#" class="small" data-value="option27" tabIndex="-1">
                      <input type="checkbox" />&nbsp;Sonntags brunch</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>


    </div>
    <div class="result row">
     <?php 
     if(isset($_POST['SubmitForm']))
      {
        $IngredientIds = $_POST["ChosenIngredients"];
        $conn = ConnectToDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Rezept_ID from rezept_zutat WHERE Zutat_ID IN (".$IngredientIds.")";
        $stmt = $conn->query($sql);
        $recipes = $stmt->fetchAll();
        if($recipes == NULL)
        {
          echo "<p>Keine Gerichte gefunden</p>";
          exit;
        }
        $recipesList = [];
        foreach($recipes as $row)
        {
            array_push($recipesList,$row["Rezept_ID"]);
        }
        $recipesImploded = implode(",",$recipesList);
        $sql = "SELECT ID_Rezept,Name,Phonetisch,Herkunft_ID,Bild,Zeit,Portionen from rezept WHERE ID_Rezept IN (".$recipesImploded.")";
        $stmt = $conn->query($sql);
        $recipesFull = $stmt->fetchAll();

        if($recipesFull == NULL)
        {
          echo "<p>Keine Gerichte gefunden</p>";
          exit;
        }
        $length = count($recipesFull);
        echo "<div class='row'>";
        //for ($i = 0; $i < $length; $i++) {
        foreach($recipesFull as $recipeSingle)
        {
          $sql = "SELECT * from herkunft WHERE ID_Herkunft = ".$recipeSingle["ID_Rezept"];
          $stmt = $conn->query($sql);
          $row = $stmt->fetchObject();
          $Kuerzel = $row->Kuerzel;
          echo "<div class='column'><a href='RezeptDetailAdv.php?id=".$recipeSingle["ID_Rezept"]."'>";
          echo "<div class='img_container'><img src='img/Rezepte/RealRecipes/".$recipeSingle["Bild"]."'></div>";
          echo "<div class='teaser__inner'><h3>".$recipeSingle["Name"]."<i class='em ".$Kuerzel."'></i></h3><h6 class='thin'><i>".$recipeSingle["Phonetisch"]."</i></h6><br><h6><i class='fa fa-info-circle'></i>".$recipeSingle["Portionen"] ." Portionen</h6><h6><i class='fa fa-clock-o'></i> ".$recipeSingle["Zeit"]." min</h6></div>";
          echo "</a></div>";
        }
        echo "</div>";
      }
    ?>
      </div>
  </div>
  <?php
      $db = ConnectToDB();
      try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * from zutat";
        $stmt = $db->query($sql);
        $rows = $stmt->fetchAll();
        $ingredientSource = [];
        $ingredientString;
        foreach($rows as $row)
        {
          array_push($ingredientSource,"{value:'".$row["Name"]."',label:'".$row["ID_Zutat"]."'}");
        }
        $ingredientString = "[".implode(",",$ingredientSource)."]";
      }
      catch(PDOException $e)
      {

      }            
    ?>
   <script type="text/javascript">

    $(document).ready(function () {
      var engine = new Bloodhound({
        local: <?php echo $ingredientString ?>,
        datumTokenizer: function (d) {
          return Bloodhound.tokenizers.whitespace(d.value);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace
      });

      engine.initialize();

      $('#tokenfield-typeahead').tokenfield({
        typeahead: [null, {
          source:engine.ttAdapter()
        }]
      });

      $('#tokenfield-typeahead')
      //event, wird vor dem löschen eines tokens aufgerufen
      .on('tokenfield:createdtoken', function (e) {
        var id = e.relatedTarget.firstChild.innerHTML;
        var name = e.relatedTarget.getAttribute("data-value");
        e.relatedTarget.firstChild.innerHTML = name;
        e.relatedTarget.setAttribute("data-value",id);
        var hiddenValue = $("#ChosenIngredients").val();
        if(hiddenValue)
        {
          $("#ChosenIngredients").val(hiddenValue+","+id);
        } 
        else
        {
          $("#ChosenIngredients").val(id);
        }      
        });
        //event, wird vor dem löschen eines tokens aufgerufen
        $('#tokenfield-typeahead').on("tokenfield:removetoken",function (e){
          var id = e.relatedTarget.getAttribute("data-value");
          var allIngredientIds = $("#ChosenIngredients").val();
          var allIngredientArray = allIngredientIds.split(",");
          var deleteindex = allIngredientArray.indexOf(id);
          if (deleteindex !== -1) allIngredientArray.splice(deleteindex, 1);
          $("#ChosenIngredients").val(allIngredientArray.join(","));
        });
    });

    //<--Dropdown Checkbox -->
    var options = [];
    options = $("input[type='checkbox']:checked").map(function () {
      return $(this).parent('li').data('value')
    }).get();

    $('.dropdown-menu .small').on('click', function (event) {
      var $target = $(event.currentTarget),
        val = $target.attr('data-value'),
        $inp = $target.find('input'),
        idx;

      if ((idx = options.indexOf(val)) > -1) {
        options.splice(idx, 1);
        setTimeout(function () { $inp.prop('checked', false) }, 0);
      } else {
        options.push(val);
        setTimeout(function () { $inp.prop('checked', true) }, 0);
      }
      $(event.target).blur();

      console.log(options);
      return false;
    });


  </script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form">

            <ul class="tab-group">

              <li class="tab active">
                <a href="#signup">Sign Up</a>
              </li>
              <li class="tab">
                <a href="#login">Log In</a>
              </li>
            </ul>

            <div class="tab-content">
              <div id="signup">
                <h1>Sign Up for Free</h1>

                <form action="/" method="post">

                  <div class="top-row">
                    <div class="field-wrap">
                      <label>
                        First Name
                        <span class="req">*</span>
                      </label>
                      <input type="text" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                      <label>
                        Last Name
                        <span class="req">*</span>
                      </label>
                      <input type="text" required autocomplete="off" />
                    </div>
                  </div>

                  <div class="field-wrap">
                    <label>
                      Email Address
                      <span class="req">*</span>
                    </label>
                    <input type="email" required autocomplete="off" />
                  </div>

                  <div class="field-wrap">
                    <label>
                      Set A Password
                      <span class="req">*</span>
                    </label>
                    <input type="password" required autocomplete="off" />
                  </div>

                  <button type="submit" class="button button-block" />Get Started</button>

                </form>

              </div>

              <div id="login">
                <h1>Welcome Back!</h1>

                <form action="/" method="post">

                  <div class="field-wrap">
                    <label>
                      Email Address
                      <span class="req">*</span>
                    </label>
                    <input type="email" required autocomplete="off" />
                  </div>

                  <div class="field-wrap">
                    <label>
                      Password
                      <span class="req">*</span>
                    </label>
                    <input type="password" required autocomplete="off" />
                  </div>

                  <p class="forgot">
                    <a href="#">Forgot Password?</a>
                  </p>
                  <button class="button button-block" />Log In</button>
                </form>
              </div>
            </div>
            <!-- /form -->
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
    <!--/.Footer Links-->

  </footer>
  <!--/.Footer-->

  <script>

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
$('#btnLogin').on('click', function(e){
    var modalDialog = $('#myModal .modal-dialog');
    var yScrollOffset = window.pageYOffset;
    modalDialog.css('top', yScrollOffset);
  });

  /*modal*/
$('.form').find('input, textarea').on('keyup blur focus', function (e) {

var $this = $(this),
  label = $this.prev('label');

if (e.type === 'keyup') {
  if ($this.val() === '') {
    label.removeClass('active highlight');
  } else {
    label.addClass('active highlight');
  }
} else if (e.type === 'blur') {
  if ($this.val() === '') {
    label.removeClass('active highlight');
  } else {
    label.removeClass('highlight');
  }
} else if (e.type === 'focus') {

  if ($this.val() === '') {
    label.removeClass('highlight');
  }
  else if ($this.val() !== '') {
    label.addClass('highlight');
  }
}

});

$('.tab a').on('click', function (e) {

e.preventDefault();

$(this).parent().addClass('active');
$(this).parent().siblings().removeClass('active');

target = $(this).attr('href');

$('.tab-content > div').not(target).hide();

$(target).fadeIn(600);

});


    autocomplete(document.getElementById("searchRecipe"), rezepte);
  </script>
</body>

</html>