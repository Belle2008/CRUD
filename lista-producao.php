<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Produções</h1>
        <a href="./salvar-producao.php" class="btn btn-add">Incluir</a> 
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Produto</th>
              <th>Quantidade</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql = 'SELECT  p.ProducaoID, pr.Nome AS NomeProduto, p.DataProducao,p.DataEntrega FROM producao AS p INNER JOIN produtos AS pr ON p.ProdutoID = pr.ProdutoID;';
              $resultado = mysqli_query($conexao, $sql);

              while ($dados = mysqli_fetch_assoc($resultado)) {
              ?>
            <tr>
              <td><?php echo $dados['ProducaoID'];?></td>
              <td><?php echo $dados['NomeProduto'];?></td>
              <td><?php echo date('d/m/Y', strtotime($dados['DataProducao'])); ?></td>
              <td><?php echo date('d/m/Y', strtotime($dados['DataEntrega'])); ?></td>

              <td>
                <a href="salvar-producao.php?id=<?php echo $dados['ProducaoID'];?>" class="btn btn-edit">Editar</a>
                <a href="./action/producao.php?acao=excluir&id=<?php echo $dados['ProducaoID'];?>" class="btn btn-delete">Excluir</a>
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