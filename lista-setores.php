<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Setores</h1>
        <a href="./salvar-setores.php" class="btn btn-add">Incluir</a>
        
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Andar</th>
              <th>Cor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = 'SELECT * FROM setor';
            $resultado = mysqli_query($conexao, $sql);

            while ($dados = mysqli_fetch_assoc($resultado)) {
              ?>
              <tr>
              <td><?php echo $dados['SetorID'];?></td>
              <td><?php echo $dados['Nome'];?></td>
              <td><?php echo $dados['Andar'];?></td>
              <td><?php echo $dados['Cor'];?></td>
              <td>
                <a href="salvar-setores.php?id=<?php echo $dados['SetorID'];?>" class="btn btn-edit">Editar</a>
                <a href="./action/setores.php?acao=excluir&id=<?php echo $dados['SetorID'];?>" class="btn btn-delete">Excluir</a>
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