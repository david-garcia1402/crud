<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Teste</title>
</head>
<body>
    <h2>TESTE SMARTNESS</h2>
    <?php 
    
    ?>
<form action="cad.php" method="GET" class="was-validated">        
  <div class="mb-3 mt-3">  
    <label for="name" class="form-label">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Insira seu nome" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">E-mail:</label>
    <input type="email" id="email" name="email" class="form-control" placeholder = "Insira seu e-mail"required>
  </div>
  <div class="mb-3 mt-3">
    <label for="datetime" class="form-date">Data de nascimento </label>
    <input type="date" id ="date" name="date" class="form-control" required>
  </div>
    <label for="message">* Mensagem:</label>
    <textarea id="message" name="message" ></textarea>

    <button type="submit">Enviar</button>
  <div>
  </div>  
</form> 
</body>

</html>