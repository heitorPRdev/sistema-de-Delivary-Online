<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/default/StyleDefault.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php
        $cookiesEntra = $_COOKIE['NameCad'] ?? '';
        $nomeCript = md5($cookiesEntra);
        $cookiesId = $_COOKIE['IdCad'];
        $idUrl = $_GET['id'];
        
        $hostname="127.0.0.1";
        $username="testegit";
        $password="testegit";
        $dbname="BDCliente";
                
        $conn = new mysqli($hostname,$username,$password,$dbname);
        if(!$conn){
            die("Connect failed". mysqli_connect_error());
        }
                //comando do crud para pegar a lista das contas do banco de dados
        $query = "SELECT empresaSON FROM CadasTable where nomeCliente='$cookiesEntra'";
        $databaseSearch = $conn->query($query);
        $result = $databaseSearch->fetch_all(MYSQLI_ASSOC);
        if($result[0]['empresaSON'] == 1){
            $empresa = NULL;
        }else{
            $empresa = 'Empresa';
        }
        
        
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
    
    <div class="container text-left">
        <div >
            <?php
                $hostname="127.0.0.1";
                $username="testegit";
                $password="testegit";
                $dbname="BDCliente";
                $conn = new mysqli($hostname,$username,$password,$dbname);
                if(!$conn){
                    die("Connect failed". mysqli_connect_error());
                }
                //faz o comando para o mysql e retorna a lista do banco de dados com nomes e senha criptografados
                $query = "SELECT nomeCliente FROM CadasTable where ID_Cadas=$idUrl";
                $databaseSearch = $conn->query($query);
                $nomePagina = $databaseSearch->fetch_all(MYSQLI_ASSOC);
            
            ?>
            <h1>Bem vindo,<?=$nomePagina[0]['nomeCliente']?></h1>

        </div>
        <?php
                if(!$empresa){
                    echo '';
                   
                }else{
                    echo '<div style="margin-left:15px;"><p class="fs-3"><i class="bi bi-building"></i> '. $empresa . "</p></div>";
                }
            
            ?>
    </div>
    <?php

        if($idUrl == $cookiesId){
            echo '
            <div class="container text-left">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-secondary" id="configBtn"><i class="bi bi-gear-fill"></i> Configurações</button>
                    </div>
                </div>
            </div>';
        }else{
            
        };
    
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="profileJs.js"></script>
</body>
</html>