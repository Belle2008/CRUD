<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

  
  <main>
    <?php
    $id = $_GET['id'];
        $sql = 'SELECT * FROM funcionarios WHERE FuncionarioID = '.$id;           
       $resultado = mysqli_query($conexao, $sql);
       $dados = mysqli_fetch_assoc($resultado);
    ?>

    <div id="funcionarios" class="tela">
        <form class="crud-form"  action="./action/funcionarios.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="hidden" name="acao" value="salvar">
>


          <h2>Cadastro de Funcionários</h2>
          <input type="text" name="Nome" placeholder="Nome" value="<?php echo $dados['Nome'];?>">
          <input type="date" name="DataNascimento" value="<?php echo $dados['DataNascimento'];?>">
          <input type="email" name="Email" value="<?php echo $dados['Email'];?>">
          <input type="number" name="Salario" value="<?php echo $dados['Salario'];?>">
     <select name="Sexo">
          <option value="">Sexo</option>
          <option value="M" <?php if ($dados['Sexo'] == "M") echo "selected"; ?>>Masculino</option>
         <option value="F" <?php if ($dados['Sexo'] == "F") echo "selected"; ?>>Feminino</option>
     </select>
         <input type="text" name="CPF" value="<?php echo $dados['CPF'];?>">
         <input type="text" name="RG" value="<?php echo $dados['RG'];?>">

          <?php
          $sql = 'SELECT* FROM cargos;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name="CargoID" id="">
          <option value=""> - Selecione - </option>
          <?php
           while ($row = mysqli_fetch_assoc($resultado)) {
            $selecionado = '';
            if( $row['CargoID'] == $dados['CargoID']){
              $selecionado = 'selected';
            }
            echo '<option '.$selecionado.' value="'.$row['CargoID'].'">'.$row['Nome'].'</option>';
           }
          ?>
          </select>

            <?php
          $sql = 'SELECT* FROM setor;';
          $resultado = mysqli_query($conexao,$sql);
          ?>
          <select name="SetorID" id="">
          <option value=""> - Selecione - </option>
          <?php
           while ($row = mysqli_fetch_assoc($resultado)) {
            $selecionado = '';
            if( $row['SetorID'] == $dados['SetorID']){
              $selecionado = 'selected';
            }
            echo '<option '.$selecionado.' value="'.$row['SetorID'].'">'.$row['Nome'].'</option>';
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
