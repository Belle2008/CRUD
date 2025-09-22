<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>
    <?php
    $id = '';
    $Nome = '';
    $Descricao = '';
    if( isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = 'SELECT * FROM categorias WHERE CategoriaID='.$id;
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($resultado);
    $Nome = $dados['Nome'];
    $Descricao = $dados['Descricao'];
  }

   
    ?>

    <div id="categorias" class="tela">
        <form class="crud-form"  action="./action/categorias.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="hidden" name="acao" value="salvar">


          <h2>Cadastro de Categorias</h2>
          <input type="text" name="Nome" placeholder="Nome da Categoria"  value="<?php echo $Nome;?>">
          <textarea name="Descricao" placeholder="Descrição"><?php echo $Descricao?></textarea>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
