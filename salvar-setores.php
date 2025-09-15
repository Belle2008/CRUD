<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  
  <main>
  <?php
// pega o id
$id = $_GET['id'];
// montar o SQL para pegar os dados exclusivos do ID
$sql = 'SELECT * FROM setor WHERE SetorID = '.$id;
// executa o sql e mostra o resultado
$resultado = mysqli_query($conexao, $sql);
// converte os dados no array
$dados = mysqli_fetch_assoc($resultado);
?>

    <div id="setores" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Setores</h2>
          <input type="text" placeholder="Nome do Setor" value="<?php echo $dados['Nome'];?>">
          <input type="text" placeholder="Andar"  value="<?php echo $dados['Andar'];?>">
          <input type="text" placeholder="Cor"  value="<?php echo $dados['Cor'];?>">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>