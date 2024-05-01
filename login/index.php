<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/default/StyleDefault.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
  <?php
    $cookiesEntra = $_COOKIE['NameCad'] ?? '';
    
    $cookiesId = $_COOKIE['IdCad'] ?? '';
    if($cookiesEntra == ''){

        echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/cadastro/">Cadastro</a>
              </li>
            
            </ul>
          </div>
        </div>
      </nav>';
    }else{
      echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
          <a class="navbar-brand" href="/">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Menu</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/cadastro/">Cadastro</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/profile/index.php?id='.$cookiesId.'"><i class="bi bi-person-circle"></i>Perfil</a>
              </li>
              </ul>
          </div>
          </div>
      </nav>';
    }
  
  
  ?>
  <?php 
    $nomeForm  = $_POST['nome'] ?? '';
    if(isset($_POST['empresa'])){
      $empresa = 1;
    }else{
      $empresa = 0;
    }
    $senhaForm  = $_POST['senha'] ?? '';
    
  ?>
  <div class="p-3 mb-2 bg-primary text-black p-2 border border border-primary" style="--bs-bg-opacity: .5;" id="divCadastr">
      <h1 class="text-center" class="text-break">Entrar na conta</h1>
      <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" name="nome">Nome</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome" name="nome" value="<?=$nomeForm?>" required>
        </div>
        
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" >Senha</label>
          <input type="password" class="form-control" id="inputPassword6" placeholder="Senha" name="senha" value="<?=$senhaForm ?>" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-success btn-lg">Entrar</button>
        </div>
          
      </form>
      <p class="text-center" class="text-break">Você não tem uma conta?<br><a href="/cadastro/" class="aDefault">Cadastrar-se</a></p>

  </div>
    <?php 
        function LoginSistem(){
            //pega o nome e senha do form
            $nomeForm = $_POST['nome'] ?? '';
            $senhaForm = $_POST['senha'] ?? '';
            //Se tiver eles
            if($nomeForm && $senhaForm){
                //criptografa else
                $nomeCript = md5($nomeForm);
                $senhaCript = md5($senhaForm);
                //variaveis para conseguir fazer o crud no mysql
                $hostname="127.0.0.1";
                $username="testegit";
                $password="testegit";
                $dbname="BDCliente";
                //inicia a conexão do banco de dados
                $conn = new mysqli($hostname,$username,$password,$dbname);
                if(!$conn){
                    die("Connect failed". mysqli_connect_error());
                }
                //comando do crud para pegar a lista das contas do banco de dados
                $query = "SELECT ID_Cadas FROM CadasTable where nomeCliente='$nomeCript' and senhaCliente='$senhaCript'";
                $databaseSearch = $conn->query($query);
                $result = $databaseSearch->fetch_all(MYSQLI_ASSOC);
                
                if(!$result){
                  echo "<div class='p-3 mb-2 bg-danger text-white border border-danger text-center' style='border-radius: 5px;'><p>nome ou senha não existe</p></div>";
                }else{
                  $id = $result[0]['ID_Cadas'];
                  setcookie("NameCad", $nomeForm, time()-864000,'/');
                  setcookie("NameCad", $nomeForm, time()+864000,'/');
                  
                  setcookie("IdCad", $id, time()-864000,'/');
                  setcookie("IdCad", $id, time()+864000,'/');
                  header("location:/profile/index.php?id=$id");
                  
                }
                
                
            }else{
                //se o botão Logar do formulario for clicado e nome e senha ser = a ''
                if(isset($_POST['Logar']) && $nomeForm == '' && $senhaForm == ''){
                    echo "<div id='divError'><p>Prencha todos os campos</p></div>";
                }
            }
        }
        //se você estiver com um cookie poderá usar a forma mais rapida
        if($_COOKIE['NameCad'] ?? 0){
            echo "<div class='bg-dark' style='border-radius: 5px; margin:5px; padding:5px;'><h1 class='text-center  text-white'>Verificamos o seu login, deseja ir direto a sua conta? <button class='btn btn-primary btn-lg' id='fastProfile'>Ir</button></h1></div>";
            //chamara a função LoginSistem
            LoginSistem();
        }else{
            //se não só chamara a função
            LoginSistem();
        }
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function(){        
            $("#fastProfile").click(function(){
                window.location.href = "/profile/index.php?id=<?=$cookiesId?>";
              
            
              });
        });
    </script>

</body>
</html>