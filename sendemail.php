<!DOCTYPE html>
<html lang="pt">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Exemplo 1 - Formulário</title>
</head>
<body>

<?php

    $nome = @trim(stripslashes($_POST['nome']));
    $email = @trim(stripslashes($_POST['email']));
    $assunto = @trim(stripslashes($_POST['assunto']));
    $menssagem = @trim(stripslashes($_POST['menssagem']));
		$telefone = @trim(stripslashes($_POST['telefone']));

    $email_from = $email;
    $email_to = 'exemplo@exemplo.com.br';//replace with your email

    $body = 'Nome: ' . $nome . "\n\n" . 'Email: ' . $email . "\n\n" . 'Assunto: ' . $assunto . "\n\n" . 'Menssagem: ' . $menssagem . "\n\n" . 'Telefone: '  . $telefone ;

    $success = @mail($email_to, $assunto, $body, 'From: <'.$email_from.'>');
    echo "<script type='text/javascript'>window.alert('".$nome." Sua mensagem foi enviada com sucesso!');window.location.href='http://simposio.iev.org.br/';</script>";
    exit;
    die;
?>
