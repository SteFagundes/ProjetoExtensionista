<?php
include 'conexao.php';

if (!isset($_GET['id'])) {
  die("Erro: ID não especificado.");
}

$id = $_GET['id'];

$sql = "DELETE FROM produto WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  header("Location: listagem.php");
} else {
  die("Erro ao excluir o produto: " . $conn->error);
}
?>
