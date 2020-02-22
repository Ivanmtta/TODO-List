<?php
  $serverName = "";
  $databaseUsername = "";
  $databasePassword = "";
  $databaseName = "";
  $connection = new mysqli($serverName, $databaseUsername, $databasePassword, $databaseName);
  if($connection->connect_error)
    die("<h4 class='text-center alert alert-danger'>Fatal Error</h4><br>");
  if(isset($_POST["note"]) && $_POST["note"] != ""){
    $note = $connection->real_escape_string($_POST["note"]);
    $statement = $connection->prepare("INSERT INTO Notes (NOTE, DONE) VALUES (?, ?)");
    $done = 0;
    $statement->bind_param("si", $note, $done);
    $statement->execute();
    $statement->close();
  }
  if(isset($_GET["id"]) && $_GET["id"] != ""){
    $id = $connection->real_escape_string($_GET["id"]);
    $value = $connection->real_escape_string($_GET["value"]);
    $statement = $connection->prepare("UPDATE Notes SET DONE=? WHERE ID=?");
    $statement->bind_param("ii", $value, $id);
    $statement->execute();
    $statement->close();
  }
  if(isset($_POST["clear"]) && $_POST["clear"] != ""){
    $query = "DELETE FROM Notes WHERE DONE=1";
    $connection->query($query);
  }
?>