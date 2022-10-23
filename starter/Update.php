<?php

require "Connection.php";


if(isset($_POST['return'])){
    $id = $_POST['Id'];
    $sql = "SELECT * FROM `task` WHERE Id = $id LIMIT 1";
    $res = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($res);
}



?>