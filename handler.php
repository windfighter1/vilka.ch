<?php
if($_POST['action'] == 'addZutat') {
    $servername = "178.192.53.57:3306";
    $username = "selim_db";
    $password = "oggefuess2791";
    $dbname = "vilkadb";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $unit = $_POST['einheit'];
    $amount = $_POST['anzahl'];
    $ingredient = $_POST['zutat'];

    $stmt = $conn->prepare("SELECT Einheit FROM einheiten WHERE ID_Einheit=$unit LIMIT 1"); 
    $stmt->execute(); 
    $unit_Name = $stmt->fetch();

    $stmt = $conn->prepare("SELECT Name FROM zutat WHERE ID_Zutat=$ingredient LIMIT 1"); 
    $stmt->execute(); 
    $ingredient_Name = $stmt->fetch();

    return "<input type='text' readonly class='form-control-plaintext' value='".$amount." ".$unit_Name." ".$ingredient_Name."'>";
  }
?>