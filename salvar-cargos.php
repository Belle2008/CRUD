<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>
<?php
// preencher vazio
$id = '';
$nome = '';
$tetoSalarial = '';
// teste para verificar se existe o id na url
if( isset($_GET['id'])){
  // pega o id
  $id = $_GET['id'];
  // montar o SQL para pegar os dados exclusivos do ID
  $sql = 'SELECT * FROM cargos WHERE CargoID = '.$id;
  // executa o sql e mostra o resultado
  $resultado = mysqli_query($conexao, $sql);
  // converte os dados no array
  $dados = mysqli_fetch_assoc($resultado);
  $nome = $dados['Nome'];
  $tetoSalarial = $dados['TetoSalarial'];
}

?>
       <!-- Telas CRUD -->
   <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="hidden" name="acao" value="salvar">
      
      <h2>Cadastro de Cargos</h2>
      <input type="text" placeholder="Nome do Cargo" name="nome" value="<?php echo $nome;?>">
      <input type="number" placeholder="Teto Salarial" name="teto_salarial"  value="<?php echo $tetoSalarial;?>">
      <button type="submit">Salvar</button>
    </form>
  </div>



   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
