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
    $menssagem = @trim(stripslashes($_POST['mensagem']));

    $email_from = $email;
    $email_to = 'presidencia@atleticaunisal.com.br';

    $body = 'Nome: ' . $nome . "\n\n" . 'Email: ' . $email . "\n\n" . 'Assunto: ' . $assunto . "\n\n" . 'Menssagem: ' . $menssagem;

    $success = @mail($email_to, $assunto, $body, 'From: <'.$email_from.'>');
    exit;
    die;
?>

<script src="js/toasts.js"></script>
<script>
function click()
{
  Materialize.toast('Enviado com sucesso!', 4000,'')
}
</script>
 
</body>
</html>