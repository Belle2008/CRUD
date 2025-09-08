<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Produção de Produtos</h2>

          <?php
          $sql = 'SELECT* FROM funcionarios;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name="" id="">
          <option value=""> funcionarios</option>
          <?php
           while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<option value="'.$row['FuncionarioID'].'">'.$row['Nome'].'</option>';
           }
          ?>
          </select>

          <?php
          $sql = 'SELECT* FROM Produtos;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name="" id="">
          <option value="">Produtos</option>
          <?php
           while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<option value="'.$row['ProdutoID'].'">'.$row['Nome'].'</option>';
           }
          ?>
          </select>

          <label for="">Data da entrega</label>
          <input type="date" placeholder="Data da Entrega">
          <input type="number" placeholder="Quantidade Produzida">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>