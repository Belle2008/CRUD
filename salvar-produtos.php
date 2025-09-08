<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  
  <main>

    <div id="produtos" class="tela">
        <form class="crud-form" action="" method="post">
          <h2>Cadastro de Produtos</h2>
          <input type="text" placeholder="Nome do Produto">
          <input type="number" placeholder="Preço">
          <input type="number" placeholder="Peso (g)">
          <textarea placeholder="Descrição"></textarea>

          <?php
          $sql = 'SELECT* FROM categorias;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name="" id="">
          <option value=""> categorias</option>
          <?php
           while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<option value="'.$row['CategoriaID'].'">'.$row['Nome'].'</option>';
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