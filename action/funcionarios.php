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
              $sql = "DELETE FROM funcionarios WHERE FuncionarioID = $id";
              mysqli_query($conexao, $sql);
              header("Location: ../lista-funcionarios.php");
              break;
      
          case 'salvar':
              // pega os valores do formulário
              $nome           = $_POST['Nome'];
              $dataNascimento = $_POST['DataNascimento'];
              $email          = $_POST['Email'];
              $salario        = $_POST['Salario'];
              $sexo           = $_POST['Sexo'];
              $cpf            = $_POST['CPF'];
              $rg             = $_POST['RG'];
              $cargo          = $_POST['CargoID'];
              $setor          = $_POST['SetorID'];
      
              if (empty($id)) {
                  // INSERT
                  $sql = "INSERT INTO funcionarios 
                              (Nome, DataNascimento, Email, Salario, Sexo, CPF, RG, CargoID, SetorID) 
                          VALUES 
                              ('$nome', '$dataNascimento', '$email', '$salario', '$sexo', '$cpf', '$rg', '$cargo', '$setor')";
              } else {
                  // UPDATE
                  $sql = "UPDATE funcionarios 
                             SET Nome           = '$nome', 
                                 DataNascimento = '$dataNascimento',
                                 Email          = '$email',
                                 Salario        = '$salario',
                                 Sexo           = '$sexo',
                                 CPF            = '$cpf',
                                 RG             = '$rg',
                                 CargoID        = '$cargo',
                                 SetorID        = '$setor'
                           WHERE FuncionarioID = $id";
              }
      
              mysqli_query($conexao, $sql) or die("Erro no SQL: " . mysqli_error($conexao));
      
              // redireciona
              header("Location: ../lista-funcionarios.php");
              break;
      
          default:
              break;
      }
      ?>
      
      
       mysqli_query($conexao,$sql);
       //redirecionar a pagina
       header("Location: ../lista-funcionarios.php");
        break;

    default:
        # code...
        break;
}
?>