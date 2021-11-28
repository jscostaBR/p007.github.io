<?php
session_start();
include_once("Conexao.php");

$nome   = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf    = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$end    = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$uf     = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$cep    = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
$tel    = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$cel    = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$email  = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$input_dados = "insert into comprador (nome, cpf, endereco, bairro, 
cidade, uf, cep, telefone, celular, email ) values('$nome', '$cpf','$end',
'$bairro','$cidade','$uf','$cep','$tel','$cel','$email')";

$result = mysqli_query($conn, $input_dados); 

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green'>Comprador cadastrado com sucesso</p>";
    header("Location: readmore.html.php");

}else{
    $_SESSION['msg'] = "<p style='color:red'>Comprador não cadastrado! Tente novamente</p>";
    header("Location: readmore.php");
}
