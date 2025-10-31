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
        // montar o SQL que exclui o registro PEGAR O ID
        $sql = 'DELETE FROM cargos WHERE CargoID ='.$id;
        // executar o SQL
        $resultado = mysqli_query($conexao, $sql);
        // redirecionar para pagina lista-cargos
        header("Location: ../lista-cargos.php");
        break;

    case 'salvar':
        $nome = $_POST['nome'];
        $teto_salarial = $_POST['teto_salarial'];

        // Remove os pontos (milhar) e substitui a vírgula por ponto (decimal)
        $teto_salarial = str_replace('.', '', $teto_salarial);
        $teto_salarial = str_replace(',', '.', $teto_salarial);
        $teto_salarial  = trim(str_replace('R$','',$teto_salarial));
      
        if (empty($id)) {
          // INSERT
          $sql = "INSERT INTO cargos (Nome, TetoSalarial) 
                  VALUES ('{$nome}', '{$teto_salarial}')";
      } else {
          // UPDATE
          $sql = "UPDATE cargos 
                     SET Nome = '{$nome}', 
                         TetoSalarial = '{$teto_salarial}' 
                   WHERE CargoID = $id";
                   
      }
      
       mysqli_query($conexao,$sql);
       //redirecionar a pagina
       header("Location: ../lista-cargos.php");
        break;
    default:
        # code...
        break;
}
?>