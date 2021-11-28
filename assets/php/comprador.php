<?php
session_start();
include_once("Conexao.php");

$nome   = filter_input(INPUT_POST, 'nome_c', FILTER_SANITIZE_STRING);
$cpf    = filter_input(INPUT_POST, 'cpf_c', FILTER_SANITIZE_NUMBER_INT);
$end    = filter_input(INPUT_POST, 'endereco_c', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro_c', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade_c', FILTER_SANITIZE_STRING);
$uf     = filter_input(INPUT_POST, 'UF_c', FILTER_SANITIZE_STRING);
$cep    = filter_input(INPUT_POST, 'CEP_c', FILTER_SANITIZE_NUMBER_INT);
$tel    = filter_input(INPUT_POST, 'telefone_c', FILTER_SANITIZE_STRING);
$cel    = filter_input(INPUT_POST, 'celular_c', FILTER_SANITIZE_STRING);
$email  = filter_input(INPUT_POST, 'email_c', FILTER_SANITIZE_EMAIL);

$input_dados = "insert into comprador (nome_c, cpf_c, endereco_c, bairro_c, 
cidade_c, UF_c, CEP_c, telefone_c, celular_c, email_c ) values('$nome', '$cpf','$end',
'$bairro','$cidade','$uf','$cep','$tel','$cel','$email')";

$result = mysqli_query($conn, $input_dados); 

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green'>Comprador cadastrado com sucesso</p>";
    header("Location: readmore.html.php");

}else{
    $_SESSION['msg'] = "<p style='color:red'>Comprador não cadastrado! Tente novamente</p>";
    header("Location: readmore.php");
}
