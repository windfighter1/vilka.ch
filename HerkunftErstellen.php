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
  <h1>Herkunft hinzufügen</h1>
  <div class="row">
    <form id="primaryform" method="post" action="HerkunftErstellen.php">
      <div class="form-group">
        <label for="LandName">Land</label>
        <input type="text" class="form-control"  name="LandName" id="LandName" placeholder="Land">
      </div>
      <div class="form-group">
        <label for="LandKuerzel">Kürzel</label>
        <input type="text" class="form-control"  name="LandKuerzel" id="LandKuerzel" placeholder="Kürzel">
      </div>
      <div class="form-group">
      <label for="LandKontinent">Kontinent:</label>
      <select class="form-control" id="LandKontinent" name="LandKontinent">
        <option value="eu" label="Europa">eu</option>
        <option value="as" label="Asien">as</option>
        <option value="na" label="Nordamerika">na</option>
        <option value="sa" label="Südamerika">sa</option>
        <option value="af" label="Afrika">af</option>
        <option value="au" label="Australia">au</option>
      </select>
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
    echo "<script>location.href='admin.html';</script>";
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
      $name = $_POST['LandName'];
      $kuerzel = $_POST['LandKuerzel'];
      $kontinent = $_POST['LandKontinent'];
      $sql = "INSERT INTO herkunft (Land, Kuerzel, Kontinent) 
      VALUES (?,?,?)";
      $conn->prepare($sql)->execute([$name,$kuerzel,$kontinent]);
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
