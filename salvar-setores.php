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
     $Andar = '';
     $Cor = '';
  if(isset($_GET['id'])){
// pega o id
$id = $_GET['id'];
// montar o SQL para pegar os dados exclusivos do ID
$sql = 'SELECT * FROM setor WHERE SetorID = '.$id;
// executa o sql e mostra o resultado
$resultado = mysqli_query($conexao, $sql);
// converte os dados no array
$dados = mysqli_fetch_assoc($resultado);
    $Nome = $dados['Nome'];
    $Andar = $dados['Andar'];
    $Cor = $dados['Cor'];
  }
  ?>


    <div id="setores" class="tela">
        <form class="crud-form" action="./action/setores.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="hidden" name="acao" value="salvar">
>

          <h2>Cadastro de Setores</h2>
          <input type="text" name="Nome" placeholder="Nome do Setor" value="<?php echo $Nome;?>">
          <input type="text" name="Andar" placeholder="Andar"  value="<?php echo $Andar;?>">
          <input type="text" name="Cor" placeholder="Cor"  value="<?php echo $Cor;?>">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>