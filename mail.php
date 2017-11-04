<?php
    $nome = @trim(stripslashes($_POST['nome']));
    $email = @trim(stripslashes($_POST['email']));
    $assunto = @trim(stripslashes($_POST['assunto']));
    $menssagem = @trim(stripslashes($_POST['message']));

    $email_from = $email;
    $email_to = 'exemplo@exemplo.com.br';

    $body = 'Nome: ' . $nome . "\n\n" . 'Email: ' . $email . "\n\n" . 'Assunto: ' . $assunto . "\n\n" . 'Menssagem: ' . $menssagem;

    $success = @mail($email_to, $assunto, $body, 'From: <'.$email_from.'>');
    exit;
    die;
?>
<script>
function click(){
  Materialize.toast('Enviado com sucesso!', 4000,'')
}
</script>
