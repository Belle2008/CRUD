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
    $Preco = '';
    $Peso = '';
    $Descricao = '';
    $CategoriaID = '';
    if( isset($_GET['id'])){
        $id = $_GET['id']; 
        $sql = 'SELECT * FROM produtos WHERE ProdutoID = '.$id; 
         $resultado = mysqli_query($conexao, $sql);
         $dados = mysqli_fetch_assoc($resultado);
         $Nome = $dados['Nome'];
         $Preco = $dados['Preco'];
         $Peso = $dados['Peso'];
         $Descricao = $dados['Descricao'];
         $CategoriaID = $dados['CategoriaID'];
  }
    ?>


<div id="produtos" class="tela">
    <form class="crud-form" action="./action/produtos.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="acao" value="salvar">

        <h2>Cadastro de Produtos</h2>
        
        <input type="text" name="Nome" placeholder="Nome do Produto" value="<?php echo $Nome; ?>">
        <input type="text" name="Preco" placeholder="Preço"  value="<?php echo 'R$ '.number_format((float)$Preco, 2, ',', '.'); ?>">
        <input type="number" name="Peso" placeholder="Peso" value="<?php echo  $Peso * 1000; ?>"> 
        <textarea name="Descricao" placeholder="Descrição"><?php echo $Descricao; ?></textarea>

        <?php
        $sql = 'SELECT * FROM categorias;';
        $resultado = mysqli_query($conexao,$sql);
        ?>
        <select name="CategoriaID" id="">
            <option value="">Categorias</option>
            <?php
            while ($row = mysqli_fetch_assoc($resultado)) {
                $selecionado = '';
                if ($row['CategoriaID'] == $CategoriaID) {
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