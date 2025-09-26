<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

// validacao
switch ($acao) {
    case 'excluir':
      $sql = 'DELETE FROM producao WHERE ProducaoID ='.$id;
      $resultado = mysqli_query($conexao, $sql);
      header("Location: ../lista-producao.php");
      break;

      case 'salvar':
        $id = $_POST['id'];
        $FuncionarioID = $_POST['funcionarioID'];
        $ProdutoID = $_POST['produtoID'];
        $DataProducao = $_POST['DataProducao']; // dd/mm/yyyy
        $DataEntrega  = $_POST['DataEntrega'];  // dd/mm/yyyy
    
       
        if (empty($id)) {
            // INSERT
            $sql = "INSERT INTO producao (FuncionarioID, ProdutoID, DataProducao, DataEntrega) 
                    VALUES ('{$funcionarioID}', '{$produtoID}', '{$DataProducao}', '{$DataEntrega}')";
        } else {
            // UPDATE
            $sql = "UPDATE producao 
                       SET FuncionarioID = '{$funcionarioID}', 
                           ProdutoID = '{$produtoID}', 
                           DataProducao = '{$DataProducao}', 
                           DataEntrega = '{$DataEntrega}'
                     WHERE ProducaoID = $id";
        }
    
        if(mysqli_query($conexao, $sql)) {
          header("Location: ../salvar-producao.php"); // redireciona após salvar
          exit;
      } else {
          echo "Erro: " . mysqli_error($conexao);
      }
      break;

    default:
        # code...
        break;
}
?>
