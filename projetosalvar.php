<?php
include 'conexao.php';

if (isset($_POST['nome'], $_POST['valor'], $_POST['operacao'])) {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $operacao = $_POST['operacao'];

    switch ($operacao) {
        case 'inserir':
            $sql = "INSERT INTO aluno (nome, valor) VALUES (?, ?)";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ss", $nome, $valor);

                if ($stmt->execute()) {
                    header('Location: listagem.php');
                    exit;
                } else {
                    echo "Erro: " . $stmt->error;
                }
            } else {
                echo "Erro: " . $conn->error;
            }
            break;
        case 'atualizar':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                $sql = "UPDATE produto SET nome = ?, valor = ? WHERE id = ?";

                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("ssi", $nome, $valor, $id);

                    if ($stmt->execute()) {
                        header('Location: listagem.php');
                        exit;
                    } else {
                        echo "Erro: " . $stmt->error;
                    }
                } else {
                    echo "Erro: " . $conn->error;
                }
            } else {
                echo "ID do aluno não existe.";
            }
            break;
        default:
            echo "Operação inválida.";
            break;
    }
} else {
    header('Location: inclusao.php');
    exit;
}

// Feche a conexão
$conn->close();
?>
