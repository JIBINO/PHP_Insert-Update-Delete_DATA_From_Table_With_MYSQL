<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="assets/css/styleboss.css">
    <style >

          h2{
            border: 1px solid #dddddd;
            font-size: 30px;
            color: #000;
            margin-bottom: 50px;
            margin-left: 35%;
            margin-right: 35%;
          }

          table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 70%;
            margin-left: 15%;
          }

          th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 5px;
            background: #fff;
            height: 50px;
            color: #000;
            font-size: 15px;
          }

          td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 3px;
          }

          tr:nth-child(even) {
            background-color: #fff;
          }
    </style>
  </head>
  <body>


    <?php

      include 'config.php';

      // declaration des variables


      // quand le formulaire est soumis
        $users = mysqli_query($db, "SELECT * FROM user ");
        $rows = mysqli_num_rows($users);


        if($rows!=0){
          //Variable pour compteur d'utilisateur
          $ids = 0;
            ?>
            <h2>LISTE DES UTILISATEURS</h2>
                  <table>
                    <tr>
                      <th>N*</th>
                      <th>NOMS ET PRENOMS</th>
                      <th>MOT DE PASSE</th>
                      <th>SEXE</th>
                      <th>DATE D'ENREGISTREMENT</th>
                      <th>MODIFIER</th>
                      <th>EFFACER</th>
                    </tr>

            <?php

              while($array = mysqli_fetch_assoc($users)) {

              $id = $array['id'];
              $nom = $array['nom'];
              $prenom = $array['prenom'];
              $password = $array['password'];
              $sexe = $array['sexe'];
              $datepost = $array['datepost'];


              $ids++;  //incrementation du compteur d'utilisateur
            ?>
        <tr>
          <td><?php echo $ids; ?></td> <!-- Affichage du numero des UTILISATEURS -->
          <td><?php echo $nom." ".$prenom; ?></td>
          <td><?php echo $password ?></td>
          <td>
            <?php if ($sexe == 'Homme') {
                      echo "<img src='homme.png' alt='' width='50' height='50'>";
                    }elseif ($sexe == 'Femme') {
                      echo "<img src='femme.png' alt='' width='50' height='50'>";
                    }else {
                      echo "invalide";
                    }
             ?>
          </td>

          <td><?php echo $datepost; ?></td>

            <td><a href="update.php?edit_id=<?php echo $id; ?>" alt="edit" ><img src="update.png" alt="" width='40' height='40'></a></td>
            <td>
              <button type="button" onClick="deleteme(<?php echo $id; ?>)" name="supprimer" >
                <img src="delete.png" alt="" width='40' height='40'>
              </button>
          </td>
        </tr>
        <?php

          }
        ?>
      </table>
    <?php

        mysqli_close($db);
    }

    ?>


      <!-- Javascript function for deleting data -->
       <script language="javascript">
          function deleteme(delid){
            if(confirm("Voulez vous vraiment supprimer cet utilisateur ?")){
              window.location.href='delete.php?del_id=' +delid+'';
            return true;
          }
       }
       </script>


  </body>
</html>
