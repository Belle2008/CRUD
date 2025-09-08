<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Categorias</h1>
        <a href="./salvar-categorias.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = 'SELECT * FROM categorias';
            $resultado = mysqli_query($conexao, $sql);

            while ($dados = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
              <td><?php echo $dados['CategoriaID'];?></td>
              <td><?php echo $dados['Nome'];?></td>

              <td>
                <a href="#" class="btn btn-edit">Editar</a>
                <a href="./action/categorias.php?acao=excluir&id=<?php echo $dados['CategoriaID'];?>" class="btn btn-delete">Excluir</a>
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