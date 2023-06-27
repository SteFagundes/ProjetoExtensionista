<?php

$server_host = "localhost/3360";
$server_user = "admin";
$server_password = "123456";
$server_database = "base_ste";

$conn = new mysqli($server_host, $server_user, $server_password, $server_database);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}
?>
