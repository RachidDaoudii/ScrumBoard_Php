<?php 
    $title = $_POST['Title'];
    $type = $_POST['Type'];
    $Proirity = $_POST['Priority'];
    $Status = $_POST['Status'];
    $date = $_POST['Date'];
    $description = $_POST['Description'];
    require "Connection.php";

    $commande ="INSERT INTO `task`(`title`, `type`, `proirity`, `status`, `date`, `description`)
    VALUES ('$title','$type','$Proirity','$Status','$date','$description')";

    $resul = mysqli_query($connection,$commande);
    if (isset($commande)){
        echo "<h4>Insertion avec sucess</h4>";
    }
    else{
        echo "<h4>Errur Insertion</h4>";
    }


?>