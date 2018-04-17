<?php

// Verifique se há campos vazios
if(empty($_POST['name'])  	 ||
   empty($_POST['email']) 	 ||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
	 echo "Nenhum argumento fornecido!";
	 return false;
}
	
$name          = $_POST['name'];
$email_address = $_POST['email'];
$message       = $_POST['message'];
	
// Criando o e-mail e enviando a mensagem
$to = 'presidencia@atleticaunisal.com.br'; // Adicione seu endereço de e-mail entre o '' substituindo por seu nome@seudominio.com - Aqui é onde o formulário vai enviar uma mensagem para o seu e-mail.

$email_subject = "Formulario de contato do site enviado por:  $name";

$email_body = "Você recebeu uma nova mensagem do formulário de contato do seu site.\n\n"."Aqui estão os detalhes:\n\nNome: $name\n\nEmail: $email_address\n\nMenssagem:\n$message";

$headers = "From: presidencia@atleticaunisal.com.br\n"; // Este é o endereço de e-mail da qual a mensagem gerada será. Recomendado usar algo como no-reply@seudominio.com

$headers .= "Reply-To: $email_address";	

mail($to, $email_subject, $email_body, $headers);

return true;			

?>