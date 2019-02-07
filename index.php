<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ENREGISTREMENT</title>
  </head>
  <body>
<!--Formulaire-->
<center>
    <div class="formulaire">
      <form class="" action="" method="post">
        <h4>ENREGISTREMENT</h4>
        <label for="">Nom :</label> <br>
        <input type="text" name="nom" value="" required>  <br><br>
        <label for="">Prenom :</label> <br>
        <input type="text" name="prenom" value="" required>  <br><br>
        <label for="">Mot de passe :</label> <br>
        <input type="password" name="password" value="" required>  <br><br>
        <input type="radio" name="sexe" value="Homme" checked="checked"> <label for="sexe">Homme</label>
        <input type="radio" name="sexe" value="Femme"> <label for="sexe">Femme</label>   <br><br><br>

        <input type="submit" name="ajouter" value="AJOUTER">
      </form>
    </div>
</center>

        <!--PHP-->
      <?php
           include 'config.php';
           $nom = '';
           $prenom = '';
           $password = '';
           $sexe = '';

           // quand le formulaire est soumis
           if (isset($_POST['ajouter'])) {
             $nom = addslashes($_POST['nom']);
             $prenom = addslashes($_POST['prenom']);
             $password = $_POST['password'];
             $sexe = $_POST['sexe'];

             // verification si l'utlisateur a deja un compte
             // requete
             $user_check_query = "SELECT * FROM user WHERE nom='$nom' LIMIT 1";
             // execution de la requete
             $user_check_result = mysqli_query($db,$user_check_query);
             // recuperation du retour de la requete
             $user = mysqli_fetch_assoc($user_check_result);


               // si l'adresse est existe deja
               if ($user['nom']===$nom) {
                 echo "L'adresse email est deja utilise";
               }

               //cryptage du mot de passe
               $password = md5($password);

               // execution de la requete
               mysqli_query($db,"INSERT INTO user (nom,prenom,password,sexe,datepost) VALUES ('$nom','$prenom','$password','$sexe','$datepost')");


               // redirection de l'utilisateur
                echo '<script language="Javascript">';
                echo 'document.location.replace("backoffice.php")'; // -->
                echo ' </script>';

                // close database
                mysqli_close($db);
             }





       ?>
  </body>
</html>
