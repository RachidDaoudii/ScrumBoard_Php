<?php
$sql = "Select * From task";
$res = connection->query($sql);
if(!res){
    die("Invalid query : " . $connection->error);
}
?>