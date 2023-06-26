<?php

$server_host = "db-ads.c8bqy6anulng.sa-east-1.rds.amazonaws.com";
$server_user = "admin";
$server_password = " ";
$server_database = "base_ste";

$conn = new mysqli($server_host, $server_user, $server_password, $server_database);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}
?>
