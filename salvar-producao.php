<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>
  <?php
    $id = '';
    $FuncionarioID = '';
    $ProdutoID = '';
    $DataProducao = '';
    $DataEntrega = '';
    if( isset($_GET['id'])){
        $id = $_GET['id'];
          $sql = 'SELECT * FROM producao WHERE ProducaoID='.$id;
           $resultado = mysqli_query($conexao, $sql);
           $dados = mysqli_fetch_assoc($resultado);
           $FuncionarioID =  $dados['FuncionarioID'];
           $ProdutoID = $dados['ProdutoID'];
           $DataProducao = $dados['DataProducao'];
           $DataEntrega =  $dados['DataEntrega'];
  }
    ?>
 
<div id="producao" class="tela">
    <form class="crud-form" action="./action/producao.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="acao" value="salvar">

        <h2>Cadastro de Produção de Produtos</h2>

        <?php
        // Select de funcionários
        $sql = 'SELECT * FROM funcionarios;';
        $resultado = mysqli_query($conexao, $sql);
        ?>
        <select name="funcionarioID" required>
            <option value="">Selecione um funcionário</option>
            <?php
            while ($row = mysqli_fetch_assoc($resultado)) {
                $selecionado = ($row['FuncionarioID'] == $FuncionarioID) ? 'selected' : '';
                echo '<option '.$selecionado.' value="'.$row['FuncionarioID'].'">'.$row['Nome'].'</option>';
            }
            ?>
        </select>

        <?php
        // Select de produtos
        $sql = 'SELECT * FROM produtos;';
        $resultado = mysqli_query($conexao, $sql);
        ?>
        <select name="produtoID" required>
            <option value="">Selecione um produto</option>
            <?php
            while ($row = mysqli_fetch_assoc($resultado)) {
                $selecionado = ($row['ProdutoID'] == $ProdutoID) ? 'selected' : '';
                echo '<option '.$selecionado.' value="'.$row['ProdutoID'].'">'.$row['Nome'].'</option>';
            }
            ?>
        </select>

        <label>Data de Produção:</label>
          <input type="text" name="DataProducao" 
       value="<?php echo isset($DataProducao) ? date('d/m/Y', strtotime($DataProducao)) : ''; ?>" 
       required 
       placeholder="dd/mm/aaaa">

      <label>Data de Entrega:</label>
      <input type="text" name="DataEntrega" 
       value="<?php echo isset($DataEntrega) ? date('d/m/Y', strtotime($DataEntrega)) : ''; ?>" 
       required 
       placeholder="dd/mm/aaaa">

        <button type="submit">Salvar</button>
    </form>
</div>
