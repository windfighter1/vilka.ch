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
    <input type="text" class="form-control" name="RezeptBeschreibung" id="RezeptBeschreibung" placeholder="Beschreibung">
  </div>
  <div class="form-group">
    <label for="RezeptPhonetisch">Phonetisch</label>
    <input type="text" class="form-control" name="RezeptPhonetisch" id="RezeptPhonetisch" placeholder="Phonetisch">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php
if(isset($_POST['submit']))
{
  echo "isclicked";
   $success = saveToDb();
   echo "<script>location.href='Admin.html';</script>";
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
      $phonetisch = $_POST['RezeptPhonetisch'];
      $bild = $_POST['RezeptBild'];
      $sql = "INSERT INTO rezept (Herkunft_ID,Name,Bild,Beschreibung,Phonetisch) 
      VALUES (?,?,?,?,?)";
      // $conn->prepare($sql)->execute([1,$name,$bild,$beschreibung,$phonetisch]);
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
?>
</div>
  <!-- /.container -->
</body>

</html>
