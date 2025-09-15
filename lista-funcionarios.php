<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>

  <div class="container">
      <h1>Lista de Funcionários</h1>
      <a href="./salvar-funcionarios.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Setor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $sql = 'SELECT  f.FuncionarioID,  f.Nome AS NomeFuncionario, c.Nome AS NomeCargo, s.Nome AS NomeSetor
FROM funcionarios AS f INNER JOIN cargos AS c ON f.CargoID = c.CargoID INNER JOIN setor AS s ON f.SetorID = s.SetorID;';
          
          $resultado = mysqli_query($conexao, $sql);

          while($dados = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
            <td><?php echo $dados['FuncionarioID'];?></td>
            <td><?php echo $dados['NomeFuncionario'];?></td>
            <td><?php echo $dados['NomeCargo'];?></td>
  
            <td><?php echo $dados['NomeSetor'];?></td>
            <td>
              <a href="salvar-funcionarios.php?id=<?php echo $dados['FuncionarioID'];?>" class="btn btn-edit">Editar</a>
              <a href="./action/funcionarios.php?acao=excluir&id=<?php echo $dados['FuncionarioID'];?>" class="btn btn-delete">Excluir</a>
            </td>
          </tr>
          <?php 
          }
        ?>
        </tbody>
      </table>
    </div>
    </main>
<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>