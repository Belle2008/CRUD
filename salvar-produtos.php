<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  
  <main>
  <?php
    $id = $_GET['id']; 
    $sql = 'SELECT * FROM produtos WHERE ProdutoID = '.$id; 
     $resultado = mysqli_query($conexao, $sql);
     $dados = mysqli_fetch_assoc($resultado);
    ?>

    <div id="produtos" class="tela">
        <form class="crud-form" action="" method="post">
          <h2>Cadastro de Produtos</h2>
          <input type="text" placeholder="Nome do Produto"  value="<?php echo $dados['Nome'];?>">
          <input type="number" placeholder="Preço"  value="<?php echo $dados['Preco'];?>">
          <input type="number" placeholder="Peso (g)"  value="<?php echo $dados['Peso'];?>">
          <textarea placeholder="Descrição"><?php echo $dados['Descricao'];?></textarea>

          <?php
          $sql = 'SELECT* FROM categorias;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name="" id="">
          <option value=""> categorias</option>
          <?php
           while ($row = mysqli_fetch_assoc($resultado)) {
            $selecionado = '';
            if( $row['CategoriaID'] == $dados['CategoriaID']){
              $selecionado = 'selected';
            }
            echo '<option '.$selecionado.' value="'.$row['CategoriaID'].'">'.$row['Nome'].'</option>';
           }
          ?>
          </select>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>