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
        $nome = $_POST['Nome'];
        $andar = $_POST['Andar'];
        $cor = $_POST['Cor'];

        if (empty($id)) {
          // INSERT
          $sql = "INSERT INTO setor (Nome, Andar, Cor) 
                  VALUES ('{$nome}', '{$andar}', '{$cor}')";
      } else {
          // UPDATE
          $sql = "UPDATE setor 
                     SET Nome = '{$nome}', 
                         Andar = '{$andar}', 
                         Cor = '{$cor}'
                   WHERE SetorID = $id";
                   
      }
      
       mysqli_query($conexao,$sql);
       //redirecionar a pagina
       header("Location: ../lista-producao.php");
        break;

    default:
        # code...
        break;
}
?>