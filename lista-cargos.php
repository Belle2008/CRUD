<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

?>
  <main>

    <div class="container">
        <h1>Lista de Cargos</h1>
        <a href="./salvar-cargos.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Teto Salarial</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = 'SELECT * FROM cargos';
            $resultado = mysqli_query($conexao, $sql);

            while ($dados = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
              <td><?php echo $dados['CargoID'];?></td>
              <td><?php echo $dados['Nome'];?></td>
              <td>R$ <?php echo number_format($dados['TetoSalarial'],2,',','.');?></td>
              <td>
                <a href="salvar-cargos.php?id=<?php echo $dados['CargoID'];?>" class="btn btn-edit">Editar</a>
                <a href="./action/cargos.php?acao=excluir&id=<?php echo $dados['CargoID'];?>" class="btn btn-delete">Excluir</a>
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