<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/default/StyleDefault.css">
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
    $senhaForm  = $_POST['senha'] ?? '';
    
  ?>
  <div class="bg-success p-2 border border-success-subtle" style="--bs-bg-opacity: .5;" id="divCadastr">
      <h1 class="text-center" class="text-break">Criar úsuario</h1>
      <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" name="nome">Nome</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome" name="nome" value="<?=$nomeForm?>" required>
        </div>
        <div class="form-check"> 
          <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" name="empresa">
          <label class="form-check-label" for="flexCheckIndeterminate">
            Você é uma empresa?
          </label>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" >Senha</label>
          <input type="password" class="form-control" id="inputPassword6" placeholder="Senha" name="senha" value="<?=$senhaForm ?>" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-lg">Criar</button>
        </div>
          
      </form>
      <p class="text-center" class="text-break">Você já tem uma conta?<br><a href="/login/" class="aDefault">Logar-se</a></p>

  </div>
  <?php
    //se tiver nome e senha  executa isso
        if($nomeForm && $senhaForm){
            //criptografa o nome e senha do form
            $nomeCript = md5($nomeForm);
            $senhaCript = md5($senhaForm);
            //variaveis para conseguir fazer o crud no mysql
            $hostname="127.0.0.1";
            $username="testegit";
            $password="testegit";
            $dbname="BDCliente";
            $conn = new mysqli($hostname,$username,$password,$dbname);
            if(!$conn){
                die("Connect failed". mysqli_connect_error());
            }
            //faz o comando para o mysql e retorna a lista do banco de dados com nomes e senha criptografados
            $query = "SELECT nomeCliente,senhaCliente FROM CadasTable";
            $databaseSearch = $conn->query($query);
            $result = $databaseSearch->fetch_all(MYSQLI_ASSOC);
            $tam_result = sizeof($result) ?? 0;

            //Se o resultado for igual a NULL incere o nome e senha no banco de dados
            if($result == NULL){
                
                $query2 = "INSERT INTO CadasTable (nomeCliente,empresaSON,senhaCliente) VALUES ('$nomeCript',$empresa,'$senhaCript')";
                $conn->query($query2);
                mysqli_close($conn);
                setcookie("NameCad", $nomeForm, time()-864000,'/');
                setcookie("NameCad", $nomeForm, time()+864000,'/');
            }else{
                //Se não ele executa um for
                for($cont = 0; $cont < $tam_result; $cont++){
                    //verifica se há um nome igual já cadastrado
                    if($result[$cont]["nomeCliente"] == $nomeCript){
                     
                        echo '<div class="p-3 mb-2 bg-danger text-white border border-danger text-center" style="border-radius: 5px;"><p>Nome de usuario já existente</p></div>';
                        
                    }else{
                        //Se não tiver ele cadastra esse nome e incere um cookie
                        $query2 = "INSERT INTO CadasTable (nomeCliente,empresaSON,senhaCliente) VALUES ('$nomeCript',$empresa,'$senhaCript')";
                        $conn->query($query2);
                        //Exclui e depois cria um novo cookie
                        setcookie("NameCad", $nomeForm, time()-864000,'/');
                        setcookie("NameCad", $nomeForm, time()+864000,'/');
                        break;
                        
                    }
                }
                //fecha o banco de dados
                mysqli_close($conn);
            }
            
           
            
        }else{
            //se o botão Cadastrar do from for clicado e nome e senha for igual a uma string vazia
            if(isset($_POST['Cadastrar']) && $nomeForm == '' && $senhaForm == ''){
                echo "<div id='divError'><p>Prencha todos os campos</p></div>";
            }
        }
    
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>