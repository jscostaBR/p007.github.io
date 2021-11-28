<?php
session_start();
include_once("Conexao.php");

$nome   = filter_input(INPUT_POST, 'nome_f', FILTER_SANITIZE_STRING);
$resp   = filter_input(INPUT_POST, 'responsavel_f', FILTER_SANITIZE_STRING);
$cnpj   = filter_input(INPUT_POST, 'cnpj_f', FILTER_SANITIZE_NUMBER_INT);
$end    = filter_input(INPUT_POST, 'endereco_f', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro_f', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade_f', FILTER_SANITIZE_STRING);
$uf     = filter_input(INPUT_POST, 'UF_f', FILTER_SANITIZE_STRING);
$cep    = filter_input(INPUT_POST, 'CEP_f', FILTER_SANITIZE_NUMBER_INT);
$tel    = filter_input(INPUT_POST, 'telefone_f', FILTER_SANITIZE_STRING);
$cel    = filter_input(INPUT_POST, 'celular_f', FILTER_SANITIZE_STRING);
$email  = filter_input(INPUT_POST, 'email_f', FILTER_SANITIZE_EMAIL);
$web    = filter_input(INPUT_POST, 'website_f', FILTER_SANITIZE_URL);
$tipo   = filter_input(INPUT_POST, 'tipo_f', FILTER_SANITIZE_INT);

$input_dados = "insert into fornecedor (nome_f,responsavel_f,cnpj_f,
endereco_f,bairro_f,cidade_f,UF_f,CEP_f,telefone_f,celular_f,email_f,
website_f,tipo_f,cadastro_f) values('$nome','$resp','$cnpj','$end',
'$bairro','$cidade','$uf','$cep','$tel','$cel','$email','$web','$tipo',
now())";

$result = mysqli_query($conn, $input_dados); 

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green'>Fornecedor cadastrado com sucesso</p>";
    header("Location: IncluiProduto.php");
}else{
    $_SESSION['msg'] = "<p style='color:red'>Fornecedor não cadastrado! Tente novamente</p>";
    header("Location: ../index.php");
}
