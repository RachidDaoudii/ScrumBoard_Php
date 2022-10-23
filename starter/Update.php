<?php

require "Connection.php";

    if(isset($_POST['update'])){
        $id = $_POST['Id'];
        $title = $_POST['Title'];
        $type = $_POST['Type'];
        $Proirity = $_POST['Priority'];
        $Status = $_POST['Status'];
        $date = $_POST['Date'];
        $description = $_POST['Description'];


        $commande = "UPDATE task SET Title='$title', Type='$type',Stuts='$Status',Date='$date',Description='$description' WHERE Id='$id'";
        $res = mysqli_query($connection,$commande);
    }

    

    if(isset($title) && isset($type) && isset($Proirity) && isset($Status) && isset($date) && isset($description)){
        $commande ="INSERT INTO `task`(`Title`, `Type`, `Priority`, `Status`, `Date`, `Description`)
        VALUES ('$title','$type','$Proirity','$Status','$date','$description')";
        $resul = mysqli_query($connection,$commande);
    }


?>