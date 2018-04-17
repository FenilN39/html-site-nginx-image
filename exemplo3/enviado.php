<?php

# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-60cb05f8d21eaff8dbfdb60599b231d3');
$domain   = "sandbox76f9fa2687b64037b4fe764c3e2855a9.mailgun.org";

$nome       = $_GET['nome'];
$deemail    = $_GET['email'];
$menssagem  = $_GET['mensagem'];

switch($_GET['assuntos'])
{
    case "dpf":
        $assunto = "Departamento Financeiro";
        $modalidade = "Diretor Financeiro";
        $paraemail = "gusbenedito@gmail.com";
        break;
    case "dpm":
        $assunto = "Candidato-me ao Basquete Masculino";
        $modalidade = "Basquete Masculino";
        $paraemail = "contato@atleticaunisal.com.br";
        break;
}

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => "$nome <$deemail>",
    'to'      => "$modalidade <$paraemail>",
    'subject' => "$assunto",
    'html'    => "$menssagem"
));

?>