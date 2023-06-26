<!DOCTYPE html>
<html>
<head>
  <title>Página de Alunos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script>
    function editarItem(id) {
      window.location.href = "editar.php?id=" + id;
    }
  </script>
</head>
<body>

<!--MODAL-->
<div class="modal fade" id="modal-info">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalhes</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>ID: <span id="alunoId"></span></p>
        <p>Nome: <span id="alunoName"></span></p>
        <p>Sobrenome: <span id="alunoSobrenome"></span>/span></p>
        <p>Email: <span id="emailEmail"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Esquecer</button>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <h2>Lista de Alunoss</h2>
  <div class="table-responsive">
    <a href="inclusao.php" class="btn btn-primary">
      <i class="fa fa-plus"></i> Incluir
    </a>

    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col" style="width:10%">ID</th>
        <th scope="col" style="width:50%">Nome</th>
        <th scope="col" style="width:20%">Valor</th>
        <th scope="col" style="width:5%">Visualizar</th>
        <th scope="col" style="width:5%">Editar</th>
        <th scope="col" style="width:5%">Excluir</th>
      </tr>
    </thead>
      <tbody>
        <?php
        include 'conexao.php';

        $sql = "SELECT * FROM aluno";

        $result = $conn->query($sql);
        if ($conn->error) {
          die("Erro na consulta: " . $conn->error);
        }
        ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td>R$ <?php echo number_format($row['valor'], 2, '.', ','); ?></td>
            <td style="cursor: pointer;"><i class="fa fa-eye" aria-hidden="true"></i></td>
            <td><a href="editar.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a></td>
            <td><a href="#" 
                   class="delete-btn" 
                   data-id="<?php echo $row['id']; ?>">
                  <i class="fa fa-trash"></i>
                </a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
<script>
$(document).ready(function(){
   $(".delete-btn").click(function(e){
    e.preventDefault();
        var alunoId = $(this).data('id'); 
        var userConfirmation = confirm('Tem certeza de que deseja fazer esta exclusão?');
    if(userConfirmation){
      window.location.href = "excluir.php?id=" + alunoId;
    }
  });

  $(".fa-eye").click(function(){
    var $row = $(this).closest("tr");
    var alunoId = $row.find("td:nth-child(1)").text();
    var alunoName = $row.find("td:nth-child(2)").text();
    var alunoValue = $row.find("td:nth-child(3)").text();

    $("#alunoId").text(alunoId);
    $("#alunoName").text(alunoName);
    $("#alunoValue").text(alunoValue);

    $("#modal-info").modal();
  });
});
</script>
</body>
</html>
