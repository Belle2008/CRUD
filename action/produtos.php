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
      $sql = 'DELETE FROM produtos WHERE ProdutoID ='.$id;
      $resultado = mysqli_query($conexao, $sql);
      header("Location: ../lista-produtos.php");
      break;

      case 'salvar':
        $Nome = $_POST['Nome'];
        $Preco = $_POST['Preco'];
        $Peso = $_POST['Peso'];
        $Descricao = $_POST['Descricao'];
        $CategoriaID = $_POST['CategoriaID'];

        if (empty($id)) {
            // INSERT
            $sql = "INSERT INTO produtos (Nome, Preco, Peso, Descricao, CategoriaID) 
                    VALUES ('{$Nome}', '{$Preco}', '{$Peso}', '{$Descricao}', '{$CategoriaID}')";
        } else {
            // UPDATE
            $sql = "UPDATE produtos 
                       SET Nome = '{$Nome}', 
                           Preco = '{$Preco}', 
                           Peso = '{$Peso}', 
                           Descricao = '{$Descricao}', 
                           CategoriaID = '{$CategoriaID}'
                     WHERE ProdutoID = $id";
        }

        mysqli_query($conexao, $sql);
        header("Location: ../lista-produtos.php");
        break;
    
    default:
        # code...
        break;
}
?>