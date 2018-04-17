<!DOCTYPE html>
<html lang="pt">
<head>
 <link rel="stylesheet" href="exemplo 3/css/customizacao.css">
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Exemplo 1 - Formulário</title>
</head>
<body>

<h1>Exemplo 3</h1>
<h2>Formulário</h2>

<form action="exemplo 3/enviado.php" method="get">
  <fieldset>

    <div class="settings">
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text">

        <label for="email">E-mail</label>
        <input id="email" name="email" type="mail">

        <label for="assuntos">Assunto</label>
        <select name="assuntos" id="assuntos">
          <option value="dpf">Departamento Financeiro</option>
          <option value="dpm">Departamento de Marketing</option>
        </select>

        <label for="mensagem">Mensagem</label>
        <textarea id=mensagem name="mensagem" rows="10" cols="30">
        Escreva aqui, por favor!
        </textarea> 

        <input type="submit" value="Enviar">
    </div>
  
  </fieldset>
</form>
 
</body>
</html>