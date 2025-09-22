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
        $sql = 'DELETE FROM categorias WHERE CategoriaID ='.$id;
        $resultado = mysqli_query($conexao, $sql);
        header("Location: ../lista-categorias.php");
        break;

        case 'salvar':
            $Nome = $_POST['Nome'];
            $Descricao = $_POST['Descricao'];
        
            if (empty($id)) {
                // INSERT
                $sql = "INSERT INTO categorias (Nome, Descricao) 
                        VALUES ('{$Nome}', '{$Descricao}')";
            } else {
                // UPDATE
                $sql = "UPDATE categorias 
                           SET Nome = '{$Nome}', 
                               Descricao = '{$Descricao}'
                         WHERE CategoriaID = $id";
            }
        
            mysqli_query($conexao, $sql);
        
            // redirecionar a pagina
            header("Location: ../lista-categorias.php");
            break;
        
        
    default:
        # code...
        break;
}
?>