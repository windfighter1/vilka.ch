<?php
function getQueryString($queryName)
{
  //https://stackoverflow.com/a/6768831
  $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $parts = parse_url($url);
  parse_str($parts['query'], $query);
  return $query[$queryName];
}
$key = getQueryString("key");
if ($key != "w9e487epw")
{
  echo "<script>location.href='Home.html';</script>";
}
?>
<!doctype html>

<head>

<!-- Template Header -->
<script src="Templates/Header.js"></script>
<!-- end Template Header -->



  <meta charset="utf-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>VILKA</title>
  <!--<script src="scripts/modal.js"></script>-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <!--<link rel="stylesheet" href="css/Home.css">
  <link rel="stylesheet" href="css/modal.css">-->
  <!--<script src="scripts/main.js"></script>-->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <!--<script src="js/index.js"></script>-->


</head>

<body>
  <div class="container">
  <h1>Zutat erstellen</h1>
  <div class="row">
    <form id="primaryform" method="post" action="ZutatErstellen.php">
      <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" class="form-control"  name="ZutatName" id="ZutatName" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="NamePlural">Name (Mehrzahl)</label>
        <input type="text" class="form-control"  name="NamePlural" id="NamePlural" placeholder="Name">
      </div>
    <div class="form-group form-check">
      <input class="form-check-input" type="checkbox" name="IsMeat" id="IsMeat">
      <label class="form-check-label" for="IsMeat">
        Enthält Fleisch
      </label>
  </div>
  <div class="form-group form-check">
      <input class="form-check-input" type="checkbox" name="IsFish" id="IsFish">
      <label class="form-check-label" for="IsFish">
        Enthält Fisch
      </label>
  </div>
  <div class="form-group form-check">
      <input class="form-check-input" type="checkbox" name="IsVegetarian" id="IsVegetarian" >
      <label class="form-check-label" for="IsVegetarian">
        Ist vegetarisch
      </label>
  </div>
  <div class="form-group form-check">
      <input class="form-check-input" type="checkbox" name="IsNut" id="IsNut">
      <label class="form-check-label" for="IsNut">
        Enthält Nüsse
      </label>
  </div>
  <div class="form-group form-check">
      <input class="form-check-input" type="checkbox" name="IsGluten" id="IsGluten">
      <label class="form-check-label" for="IsGluten">
        Enthält Gluten
      </label>
  </div>
  <div class="form-group form-check">
      <input class="form-check-input" type="checkbox" name="IsVegan" id="IsVegan" >
      <label class="form-check-label" for="IsVegan">
        Ist vegan
      </label>
  </div>
  <div class="form-group form-check">
    <input class="form-check-input" type="checkbox" name="IsLactose" id="IsLactose">
    <label class="form-check-label" for="IsLactose">Enthält Laktose</label>
  </div>
  <button type="submit" id="submit" name="submit" style="margin-top: 2em;" class="btn btn-primary">Submit</button>
</form>
</div>
<?php
if(isset($_POST['submit']))
{
  $success = saveToDb();
  if($success)
  {
    echo "<script>location.href='admin.php?".$_SERVER['QUERY_STRING']."'</script>";
  }
}
function saveToDb()
{
  $servername = "178.192.53.57:3306";
  $username = "selim_db";
  $password = "oggefuess2791";
  $dbname = "vilkadb";
  
  
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $name = $_POST['ZutatName'];
      $namePlural = $_POST['NamePlural'];
      $IsFish = isset($_POST['IsFish']);
      $IsGluten = isset($_POST['IsGluten']);
      $IsLactose = isset($_POST['IsLactose']);
      $IsMeat = isset($_POST['IsMeat']);
      $IsNut = isset($_POST['IsNut']);
      $IsVegan = isset($_POST['IsVegan']);
      $IsVegetarian = isset($_POST['IsVegetarian']);
      $sql = "INSERT INTO zutat (Name, NamePlural, IsFish,IsMeat,IsNut,IsLactose,IsGluten,IsVegetarian,IsVegan) 
      VALUES (?,?,?,?,?,?,?,?,?)";
      $conn->prepare($sql)->execute([$name,$namePlural,$IsFish,$IsMeat,$IsNut,$IsLactose,$IsGluten,$IsVegetarian,$IsVegan]);
      $insertSuccess = true;
    }
catch(PDOException $e)
    {
      echo "<h1>" . $e->getMessage() . "</h1>";
      $insertSuccess = false;
    }
    $conn = null;
    return $insertSuccess;
}
?>
</div>
  <!-- /.container -->
</body>

</html>
