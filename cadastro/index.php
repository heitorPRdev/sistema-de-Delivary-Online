<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/default/StyleDefault.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Cadastro</a>
          </li>
        
        </ul>
      </div>
    </div>
  </nav>
  <?php 
    $nome = $_POST['nome'] ?? '';
    $empresa = $_POST['empresa'] ?? '';
    $senha = $_POST['senha'] ?? '';
  ?>
  <div class="bg-success p-2" style="--bs-bg-opacity: .5;" id="divCadastr">
      <h1 class="text-center" class="text-break">Criar úsuario</h1>
      <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" name="nome">Nome</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome" name="nome" value="<?=$nome?>">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" name="empresa">
          <label class="form-check-label" for="flexCheckIndeterminate">
            Você é uma empresa?
          </label>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" name="senha">Senha</label>
          <input type="password" class="form-control" id="inputPassword6" placeholder="Senha" value="<?=$senha?>">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-lg">Criar</button>
        </div>
          
      </form>
      <p class="text-center" class="text-break">Você já tem uma conta?<br><a href="/login/" class="aDefault">Logar-se</a></p>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>