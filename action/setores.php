<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];
$id = $_GET['id'];

// validacao
switch ($acao) {
    case 'excluir':
        // montar o SQL que exclui o registro PEGAR O ID
        $sql = 'DELETE FROM setor WHERE SetorID ='.$id;
        // executar o SQL
       $resultado = mysqli_query($conexao, $sql);
        // redirecionar para pagina lista-cargos
        header("Location: ../lista-setores.php");
        break;  

    default:
        # code...
        break;
}
?>