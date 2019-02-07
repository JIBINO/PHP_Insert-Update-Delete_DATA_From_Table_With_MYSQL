<?php


  $servername = 'localhost';
  $dbname = 'devoir4';
  $username = 'root';
  $password = '';
  $datepost = date("Y-m-d");
  // connection to database
  $db = mysqli_connect($servername,$username,$password,$dbname);

  if (!$db) {
    die('Database connexion failed : '.mysqli_connect_error());
  }

?>


<?php
/*      try
      {
      $db = new PDO('mysql:host=localhost; dbname=carinsurance', 'root', '');
      }
      catch (Exception $e)
      {
      die('Erreur : ' . $e->getMessage());
      }
*/
?>
