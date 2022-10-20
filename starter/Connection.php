<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="tasks";

try {
  $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo "Connected successfully";
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <div class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><i class><i/></div>
    <strong>Data est Connecter </strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div> ";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>