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

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>VILKA</title>
  <!--<script src="scripts/modal.js"></script>-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <!--<link rel="stylesheet" href="css/Home.css">
  <link rel="stylesheet" href="css/modal.css">
  <script src="scripts/main.js"></script>-->


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
        <h1>Adminbereich VILKA.CH</h1>
      <div class="row" style="margin-top:2em;">
        <a class="btn btn-large btn-info" href="RezeptErstellen.php?<?php echo $_SERVER['QUERY_STRING']?>">Neues Rezept</a>
      </div>
      <div class="row" style="margin-top:2em;">
        <a class="btn btn-large btn-info" href="ZutatErstellen.php?<?php echo $_SERVER['QUERY_STRING']?>">Neue Zutat</a>
    </div>
    <div class="row" style="margin-top:2em;">
            <a class="btn btn-large btn-info" href="HerkunftErstellen.php?<?php echo $_SERVER['QUERY_STRING']?>">Neue Herkunft</a>
    </div>
    </div>
  <!-- /.container -->
</body>

</html>