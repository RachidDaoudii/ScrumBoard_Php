<?php 
    require "Connection.php";

    // extract($_POST);

    $title = $_POST['Title'];
    $type = $_POST['Type'];
    $Proirity = $_POST['Priority'];
    $Status = $_POST['Status'];
    $date = $_POST['Date'];
    $description = $_POST['Description'];

    if(isset($title) && isset($type) && isset($Proirity) && isset($Status) && isset($date) && isset($description)){
        $commande ="INSERT INTO `task`(`Title`, `Type`, `Priority`, `Status`, `Date`, `Description`)
        VALUES ('$title','$type','$Proirity','$Status','$date','$description')";
        $resul = mysqli_query($connection,$commande);
    }


    header('location:index.php');
    

    
    // if (isset($commande)){
    //     echo "<h4>Insertion avec sucess</h4>";
    // }
    // else{
    //     echo "<h4>Errur Insertion</h4>";
    // }


?>