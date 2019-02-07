<?php
//Database Connection
include 'config.php';
//Get ID from Database
if(isset($_GET['edit_id'])){
 $sql = "SELECT * FROM user WHERE id =" .$_GET['edit_id'];
 $result = mysqli_query($db, $sql);
 $row = mysqli_fetch_array($result);
}
//Update Information
if(isset($_POST['modifier'])){
  $nom = addslashes($_POST['nom']);
  $prenom = addslashes($_POST['prenom']);
  if (empty($_POST['password'])) {
    $password = $row['password'];
  }else {
    $password = md5($_POST['password']);
  }

  if (!isset($_POST['sexe'])) {
    $sexe = $row['sexe'];
  }else {
    $sexe = $_POST['sexe'];
  }

  // ----Requete pour mettre a jour la base de donnees
 $update = "UPDATE user SET nom='$nom', prenom='$prenom',password='$password',sexe='$sexe' WHERE id=".$_GET['edit_id'];
 $up = mysqli_query($db, $update);
 if(!isset($sql)){
 die ("Error $sql" .mysqli_connect_error());
 }
 else
 {
   header("location: backoffice.php");
 }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MODIFICATION</title>
  </head>
  <body>
<!--Formulaire-->
    <div class="formulaire">
      <form class="" action="" method="post">
        <h4>MODIFICATION</h4>

        <label for="">Nom :</label> <br>
        <input type="text" name="nom" value="<?php echo $row['nom']; ?>" > <br><br>
        <label for="">Prenom :</label> <br>
        <input type="text" name="prenom" value="<?php echo $row['prenom']; ?>">  <br><br>
        <label for="">Mot de passe :</label> <br>
        <input type="password" name="password" value="">  <br><br>
         <input type="radio" name="sexe" value="Homme"><label for="sexe">Homme</label>
        <input type="radio" name="sexe" value="Femme"> <label for="sexe">Femme</label>  <br><br><br>
        <input type="submit" name="modifier" value="MODIFIER" onClick="update()">
        <a href="backoffice.php"><input type="button" name="annuler" value="ANNULER"></a>
      </form>
    </div>


    <!-- Alert for Updating -->
    <script>
    function update(){
     var x;
     if(confirm("Mise a jour effectuer avec succes !") == true){
     x= "update";
     }
    }
    </script>


  </body>
</html>
