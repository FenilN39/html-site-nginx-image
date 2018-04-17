<!DOCTYPE html>
<html lang="pt">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Exemplo 1 - Formulário</title>
</head>
<body>

<h1>Exemplo 1</h1>
<h2>Formulário</h2>

<form action="exemplo1.php">
  <fieldset>

   <label for="nome">Nome</label>
   <input id="nome" name="nome" type="text">

   <label for="email">E-mail</label>
   <input id="email" name="email" type="mail">

   <label for="assunto">Assunto</label>
   <input id="assunto" name="assunto" type="text">

   <textarea id=name name="mensagem" rows="10" cols="30">
   Escreva aqui, por favor!
   </textarea> 

   <input type="submit" value="Enviar">
  
  </fieldset>
</form>

<script src="js/toasts.js"></script>
 
</body>
</html>