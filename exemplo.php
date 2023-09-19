<?php
// fazer conexao do php com banco de dados
$conexao = mysqli_connect('localhost','root','','empresa');

// comando SQL
$sql = "SELECT * FROM cargos WHERE CargoID = ".$_GET['id'];
echo $sql;
//http://localhost:8080/banco/index.php?id=3    

// executar o comando SQL
$dataSet = mysqli_query($conexao,$sql);
// converte o dataset em ...
$array = mysqli_fetch_array($dataSet);
// exibe o dado do banco de dados - key = nome do campo
echo '<h1>'.$array['Nome'].'</h1>';

// exemplo de exclusao de um registro
$sql = "DELETE FROM funcionarios WHERE FuncionarioID = ".$_GET['id'];
mysqli_query($sql);

// SQL de inclusao
$id = $_POST['id'];
$nome = $_POST['txtNome'];
$teto = $_POST['txtTeto'];
if( !empty($id) ){
    // update
    $sql = "UPDATE cargos SET Nome = '".$nome."', TetoSalarial=".$teto." WHERE CargoID = ".$id;
}else{
    $sql = "INSERT INTO cargos (Nome,TetoSalarial) VALUES('".$nome."',".$teto.");"
}
mysqli_query($sql)

// nova consulta SQL
$sql = "SELECT * FROM funcionarios";

// executa o comando sql
$dataSet = mysqli_query($conexao,$sql);
echo '<pre>'; print_r($dataSet);
// laco de repeticao de dados
echo '<ul>';
while ( $rows = mysqli_fetch_array($dataSet) ) {
    echo '<li>'.$rows['Nome'].'   -'.$rows['DataNascimento'].'  -'.$rows['Salario'].'  -'.$rows['CPF'].'  -'.$rows['Altura'].'</li>';
}
echo '</ul>';





?>