<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>
  <?php
          $id = $_GET['id'];
          $sql = 'SELECT * FROM producao WHERE ProducaoID='.$id;
           $resultado = mysqli_query($conexao, $sql);
           $dados = mysqli_fetch_assoc($resultado);

          ?>

    <div id="producao" class="tela" >
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Produção de Produtos</h2>

          <?php
          $sql = 'SELECT* FROM funcionarios;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name="" id="">
          <option  value="">funcionarios</option>
          <?php
           while ($row = mysqli_fetch_assoc($resultado)) {
            $selecionado = '';
            if( $row['FuncionarioID'] == $dados['FuncionarioID']){
              $selecionado = 'selected';
            }
            echo '<option '.$selecionado.' value="'.$row['FuncionarioID'].'">'.$row['Nome'].'</option>';
           }
          ?>
          </select>
          <?php
          $sql = 'SELECT* FROM produtos;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name="" id="">
          <option value="">Produtos</option>
          <?php
           while ($row = mysqli_fetch_assoc($resultado)) {
            $selecionado = '';
            if( $row['ProdutoID'] == $dados['ProdutoID']){
              $selecionado = 'selected';
            }
            echo '<option '.$selecionado.' value="'.$row['ProdutoID'].'">'.$row['Nome'].'</option>';

           }
          ?>
          </select>

          <label for="">Data de Produção e Entrega</label>
          <input type="date" placeholder="Data de Producao"  value="<?php echo $dados['DataProducao'];?>">
          <input type="date" placeholder="Data de Entrega" value="<?php echo $dados['DataEntrega'];?>">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>