<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>

  <div class="container">
      <h1>Lista de Produtos</h1>
      <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $sql = 'SELECT  pr.ProdutoID, pr.Nome AS NomeProduto, pr.Preco, c.Nome AS NomeCategoria FROM produtos AS pr INNER JOIN categorias AS c ON pr.CategoriaID = c.CategoriaID';
            $resultado = mysqli_query($conexao, $sql);

            while ($dados = mysqli_fetch_assoc($resultado)) {
              ?>
          <tr>
            <td><?php echo $dados['ProdutoID'];?></td>
            <td><?php echo $dados['NomeProduto'];?></td>
            <td><?php echo $dados['NomeCategoria'];?></td>
            <td>R$ <?php echo number_format($dados['Preco'],2,',','.');?></td>
            <td>
              <a href="salvar-produtos.php?id=<?php echo $dados['ProdutoID'];?>" class="btn btn-edit">Editar</a>
              <a href="./action/produtos.php?acao=excluir&id=<?php echo $dados['ProdutoID'];?>" class="btn btn-delete">Excluir</a>
            </td>
          </tr>
          <?php
            }
            ?>
        </tbody>
      </table>
    </div>

  <main>  
<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>