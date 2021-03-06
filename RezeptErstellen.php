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



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>VILKA</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</head>

<body>

  <script>
    function addZutat() {
      var amount = $("#RezeptAnzahl").val();
      var unit = $("#RezeptEinheit").val();
      var ingredient = $("#RezeptZutat").val();
      var connected = amount + ";" + unit + ";" + ingredient;
      if($("#addedIngredients").val() == "")
      {
        $("#addedIngredients").val(connected);
      }
      else
      {
        $("#addedIngredients").val($("#addedIngredients").val() + "|" + connected);
      }
      $.ajax({
           type: "POST",
           url: 'handler.php',
           data:{action:'addZutat', einheit:unit, number:amount,zutat:ingredient},
           success:function(data) {
             $("#KeineZutatPlatzhalter").hide();
             $("#ingredienttable").append(data);
           }
      });
    }
  </script>

  <!-- Marketing messaging and featurettes
      ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->
  <div class="container">
  <div class="row">
  <form method="post" action="RezeptErstellen.php">
  <div class="form-group">
    <label for="RezeptName">Name</label>
    <input type="text" class="form-control" name="RezeptName" id="RezeptName" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="RezeptBild">Bild</label>
    <input type="text" class="form-control" name="RezeptBild" id="RezeptBild" placeholder="Bildpfad">
  </div>
  <div class="form-group">
    <label for="RezeptBeschreibung">Beschreibung</label>
    <textarea class="form-control" rows="7" name="RezeptBeschreibung" id="RezeptBeschreibung" placeholder="Beschreibung"></textarea>
  </div>
  <div class="form-group">
    <label for="RezeptZubereitung">Zubereitung</label>
    <textarea class="form-control" rows="7" name="RezeptZubereitung" id="RezeptZubereitung" placeholder="Zubereitung"></textarea>
  </div>
  <div class="form-group">
    <label for="RezeptPhonetisch">Phonetisch</label>
    <input type="text" class="form-control" name="RezeptPhonetisch" id="RezeptPhonetisch" placeholder="Phonetisch">
  </div>
  <div class="form-group">
      <label for="RezeptAnlass">Anlass:</label>
      <select class="form-control" id="RezeptAnlass" name="RezeptAnlass">
        <option value="ft" label="Festtage">Festtage</option>
        <option value="cl" label="CandleLight">CandleLight</option>
        <option value="dp" label="Dinner Party">Dinner Party</option>
        <option value="pn" label="Picnic">Picnic</option>
        <option value="kf" label="Kochen im Freien">Kochen im Freien</option>
        <option value="sb" label="Sonntagsbrunch">Sonntagsbrunch</option>
      </select>
    </div>
    <div class="form-group">
      <label for="RezeptHerkunft">Herkunft:</label>
      <select class="form-control" id="RezeptHerkunft" name="RezeptHerkunft">
      <?php 
        $servername = "178.192.53.57:3306";
        $username = "selim_db";
        $password = "oggefuess2791";
        $dbname = "vilkadb";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $stmt = $conn->query("Select * from herkunft");
        while ($row = $stmt->fetch()) {
          echo "<option value='".$row['ID_Herkunft']."' label='".$row['Land']."'>".$row['Land']."</option>";
        }
      ?>
      </select>
    </div>
    
    <div class="form-row" style="border:1px black solid; padding:1em;">
    <div class="form-group col-md-3">
    <label for="RezeptAnzahl">Anzahl</label>
    <input type="text" class="form-control" name="RezeptAnzahl" id="RezeptAnzahl" placeholder="Anzahl">
  </div>
      <div class="form-group col-md-3">
        <label for="RezeptEinheit">Einheit</label>
        <select class="form-control" id="RezeptEinheit" name="RezeptEinheit">
        <?php 
          $servername = "178.192.53.57:3306";
          $username = "selim_db";
          $password = "oggefuess2791";
          $dbname = "vilkadb";
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $stmt = $conn->query("Select * from einheiten");
          while ($row = $stmt->fetch()) {
            echo "<option value='".$row['ID_Einheit']."' label='".$row['Einheit']."'>".$row['Einheit']."</option>";
          }
        ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="RezeptZutat">Zutat:</label>
        <select class="form-control" id="RezeptZutat" name="RezeptZutat">
        <?php 
          $servername = "178.192.53.57:3306";
          $username = "selim_db";
          $password = "oggefuess2791";
          $dbname = "vilkadb";
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $stmt = $conn->query("Select * from zutat");
          while ($row = $stmt->fetch()) {
            echo "<option value='".$row['ID_Zutat']."' label='".$row['Name']."'>".$row['Name']."</option>";
          }
        ?>
        </select>
      </div>
      <div class="form-group  col-md-3">
      <a class="btn btn-large btn-secondary" name="ZutatHinzufuegen" onClick="addZutat()" id="ZutatHinzufuegen" href="#">hinzufügen</a>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12" id="ingredienttable" style="border:1px black solid; padding:1em;">
        <input type="text" readonly class="form-control-plaintext" id="KeineZutatPlatzhalter" value="Es wurden noch keine Zutaten hinzugefügt.">
      </div>
    </div>
    <div class="form-group">
      <label for="RezeptZeit">Zeit (in Minuten)</label>
      <input type="number" class="form-control" name="RezeptZeit" id="RezeptZeit" placeholder="Zeit">
  </div>
  <div class="form-group">
      <label for="RezeptPortion">Portion</label>
      <input type="number" class="form-control" name="RezeptPortion" id="RezeptPortion" placeholder="Portion">
  </div>
  <div class="form-group">
      <label for="RezeptArt">Zubereitungsart:</label>
      <select class="form-control" id="RezeptArt" name="RezeptArt">
        <option>Gedämpft</option>
        <option>Gebraten</option>
        <option>Gebacken</option>
        <option>Frittiert</option>
        <option>Grilliert</option>
        <option>Gekocht</option>
      </select>
    </div>
    <input type="hidden" value="" name="addedIngredients" id="addedIngredients"/>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
      $name = $_POST['RezeptName'];
      $beschreibung = $_POST['RezeptBeschreibung'];
      $zubereitung = $_POST['RezeptZubereitung'];
      $phonetisch = $_POST['RezeptPhonetisch'];
      $bild = $_POST['RezeptBild'];
      $anlass = $_POST['RezeptAnlass'];
      $herkunft = $_POST['RezeptHerkunft'];
      $zeit = $_POST['RezeptZeit'];
      $art = $_POST['RezeptArt'];
      $portion = $_POST['RezeptPortion'];
      $sql = "INSERT INTO rezept (Herkunft_Id,Name,Bild,Beschreibung,Phonetisch,Anlass,Zeit,Zubereitung,Vorgang,Portionen) 
      VALUES (?,?,?,?,?,?,?,?,?,?)";
      $conn->prepare($sql)->execute([$herkunft,$name,$bild,$beschreibung,$phonetisch,$anlass,$zeit,$art,$zubereitung,$portion]);
      $id = $conn->lastInsertId();
      $ingr_strings = $_POST['addedIngredients'];
      $ingredientArray = explode("|", $ingr_strings);
      if(sizeof($ingredientArray) > 0)
      {
        foreach($ingredientArray as $ingr)
        {
          $id_array =explode(";",$ingr);
          $amount_ingredient = $id_array[0];
          $id_unit = $id_array[1]; 
          $id_ingredient = $id_array[2];
          $sql = "INSERT INTO rezept_zutat (Rezept_ID,Zutat_ID,Einheit_ID,Anzahl) VALUES (?,?,?,?)";
          $conn->prepare($sql)->execute([$id,$id_ingredient,$id_unit,$amount_ingredient]);
        }
      }
      $insertSuccess = true;
    }
catch(PDOException $e)
    {
      echo $e->getMessage();
      $insertSuccess = false;
    }
    $conn = null;
    return $insertSuccess;
}
function addZutat($amount,$unit,$ingredient)
{
  $servername = "178.192.53.57:3306";
    $username = "selim_db";
    $password = "oggefuess2791";
    $dbname = "vilkadb";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $stmt = $conn->prepare("SELECT Einheit FROM einheiten WHERE ID_Einheit=$unit LIMIT 1"); 
    $stmt->execute(); 
    $unit_Name = $stmt->fetch();
    $unit_Name = implode("",$unit_Name);
    
    $stmt = $conn->prepare("SELECT Name FROM zutat WHERE ID_Zutat=$ingredient LIMIT 1"); 
    $stmt->execute(); 
    $ingredient_Name = $stmt->fetch();
    $ingredient_Name = implode("",$ingredient_Name);
    return "<input type='text' readonly class='form-control-plaintext' value='".$amount." ".$unit_Name." ".$ingredient_Name."'>";
}
?>
</div>
  <!-- /.container -->
</body>

</html>
