
        <!--PHP-->
      <?php

          include_once("config.php");

            $select = "DELETE from user where id='".$_GET['del_id']."'";
            $query = mysqli_query($db, $select) or die($select);
            header ("Location: backoffice.php");

       ?>
