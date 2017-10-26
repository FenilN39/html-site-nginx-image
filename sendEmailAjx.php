<?php

$errors         = array();      
$data           = array();      

$nome = $_POST['nome'];
$email_user = $_POST['email'];
$text = $_POST['texto'];

$email_teste = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
$string_teste = "/^[A-Za-z .'-]+$/";

if (empty($_POST['nome']))
    $errors['name'] = 'Nome e necessario.<br>';

if (empty($_POST['email']))
    $errors['email'] = 'Email e necessario.<br>';

if (empty($_POST['texto']))
    $errors['text'] = 'Texto e necessario.<br>';

if(empty($_FILES['file']['name'])){
    $errors['file'] = 'Arquivo e necessario<br>';

}else{
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    
    $base = basename($file_name);
    $extension = substr($base, strrpos($base, '.') + 1);
    $allowed_file_ext = array("doc", "docx", "pdf");
    $max_file_size = 5000;
    $allowed_ext = false;
    
    for($i = 0; $i<sizeof($allowed_file_ext); $i++){
        if(strcasecmp($allowed_file_ext[$i],$extension) == 0){
            $allowed_ext = true;
    }
}
    
    if(!$allowed_ext){
        $errors['file'] = "Tipo de arquivo invalido! os tipos possiveis são: ".implode(',', $allowed_file_ext);
    }
}

if(!preg_match($email_teste, $email_user) && !empty($_POST['email'])){
    $errors['email'] = 'Email Invalido!<br>';
}
    
if(!preg_match($string_teste,$nome) && !empty($_POST['nome'])){
    $errors['name'] = "O nome deve conter apenas caracteres!<br>";
}

if(strlen($text) < 2 && !empty($_POST['texto'])){
    $errors['text'] = "Texto muito curto!<br>";
}

if ( ! empty($errors)) {

    $data['success'] = false;
    $data['errors']  = $errors;

}else{    
    //Variavel Normal
    $to = "email@servidor.com.br";
    $subject = $nome." - Assunto - Assunto, Assunto";
    
    $header = "From: ".$email_user.$eol;
    $header .= "MIME-Version: 1.0\r\n";
    
    //Email multiplo
    $header .= "Content-type:multipart/mixed; boundary=\"".$uid."\"";
    
    //Uso de Arquivo
    $file = $file_tmp;
    $content = chunk_split(base64_encode(file_get_contents($file)));
    $uid = md5(uniqid(time()));
    $eol = PHP_EOL;
    
    //Texto
    $message = "--".$uid.$eol;
    $message .= "Content-type:text/plain; charset=\"iso-8859-1\"".$eol;
    $message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
    $message .= $text.$eol;
    
    //Arquivo
    $message .= "--".$uid.$eol;
    $message .= "Content-Type:".$file_type."; name=\"".$file_name."\"".$eol;
    $message .= "Content-Transfer-Encoding: base64".$eol;
    $message .= "Content-Disposition: attachment; filename=\"".$file_name."\"".$eol.$eol;
    $message .= $content.$eol;
    $message .= "--".$uid."--";
    
    $message = wordwrap($message, 70);
    
    if(mail($to, $subject, $message, $header)){
        $data['success'] = true;
        $data['message'] = 'Seu Formulario foi enviado com successo!';
    }else{
        $data['success'] = false;
        $errors['mailerror'] = "Seu Formulario nao foi enviado com successo!";
        $data['errors']  = $errors;
    }

}

// Devolver todos os dados a uma chamada AJAX
echo json_encode($data);


?>