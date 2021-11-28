<?php
$servidor = "localhost";
$usuario = "univesp";
$senha = "univesp";
$dbname = "coffee_lover";

// Criar a Conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ('Não Conectado');