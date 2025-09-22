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
$Nome = '';
$DataNascimento = '';
$Email = '';
$Salario = '';
$Sexo = '';
$CPF = '';
$RG = '';
$CargoID = '';
$SetorID = '';

// teste para verificar se existe o id na url
if (isset($_GET['id'])) {
    // pega o id
    $id = $_GET['id'];

    // montar o SQL para pegar os dados exclusivos do ID
    $sql = 'SELECT * FROM funcionarios WHERE FuncionarioID = '.$id;
    
    // executa o sql e mostra o resultado
    $resultado = mysqli_query($conexao, $sql);

    // converte os dados no array
    $dados = mysqli_fetch_assoc($resultado);

    $Nome = $dados['Nome'];
    $DataNascimento = $dados['DataNascimento'];
    $Email = $dados['Email'];
    $Salario = $dados['Salario'];
    $Sexo = $dados['Sexo'];
    $CPF = $dados['CPF'];
    $RG = $dados['RG'];
    $CargoID = $dados['CargoID'];
    $SetorID = $dados['SetorID'];
}
?>

<!-- Telas CRUD -->
<div id="funcionarios" class="tela">
    <form class="crud-form" action="./action/funcionarios.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="acao" value="salvar">

        <h2>Cadastro de Funcionários</h2>
        <input type="text" name="Nome" placeholder="Nome" value="<?php echo $Nome; ?>">
        <input type="date" name="DataNascimento" value="<?php echo $DataNascimento; ?>">
        <input type="email" name="Email" value="<?php echo $Email; ?>">
        <input type="number" name="Salario" value="<?php echo $Salario; ?>">

        <select name="Sexo">
            <option value="">Sexo</option>
            <option value="M" <?php if ($Sexo == "M") echo "selected"; ?>>Masculino</option>
            <option value="F" <?php if ($Sexo == "F") echo "selected"; ?>>Feminino</option>
        </select>

        <input type="text" name="CPF" value="<?php echo $CPF; ?>">
        <input type="text" name="RG" value="<?php echo $RG; ?>">

        <?php
        $sql = 'SELECT * FROM cargos;';
        $resultado = mysqli_query($conexao, $sql);
        ?>
        <select name="CargoID" id="">
            <option value=""> - Selecione - </option>
            <?php
            while ($row = mysqli_fetch_assoc($resultado)) {
                $selecionado = '';
                if ($row['CargoID'] == $CargoID) {
                    $selecionado = 'selected';
                }
                echo '<option '.$selecionado.' value="'.$row['CargoID'].'">'.$row['Nome'].'</option>';
            }
            ?>
        </select>

        <?php
        $sql = 'SELECT * FROM setor;';
        $resultado = mysqli_query($conexao, $sql);
        ?>
        <select name="SetorID" id="">
            <option value=""> - Selecione - </option>
            <?php
            while ($row = mysqli_fetch_assoc($resultado)) {
                $selecionado = '';
                if ($row['SetorID'] == $SetorID) {
                    $selecionado = 'selected';
                }
                echo '<option '.$selecionado.' value="'.$row['SetorID'].'">'.$row['Nome'].'</option>';
            }
            ?>
        </select>

        <button type="submit">Salvar</button>
    </form>
</div>
</main>

<?php 
// include dos arquivox
include_once './include/footer.php';
?>
