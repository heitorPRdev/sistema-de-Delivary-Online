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

        $nomeEdt =  $_POST['nomeEdt'] ?? '';
        $senhaEdt = $_POST['senhaEdt'] ?? '';
        
        //Endereço
        $enderEdt = $_POST['enderEdt'] ?? '';
        $cepEdt = $_POST['cepEdt'] ?? '';
        $obsEndEdt = $_POST['obsEndEdt'] ?? '';
        


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
        $hostname="127.0.0.1";
        $username="testegit";
        $password="testegit";
        $dbname="BDCliente";
                
        $conn = new mysqli($hostname,$username,$password,$dbname);
        if(!$conn){
                die("Connect failed". mysqli_connect_error());
            }
        if(!$nomeEdt == ''){
            
            
            $query = "UPDATE CadasTable SET nomeCliente='".md5($nomeEdt)."' where ID_Cadas='$cookiesId'";
            $databaseSearch = $conn->query($query);
           
        }if(!$senhaEdt == ''){
            $query = "UPDATE CadasTable SET senhaCliente='".md5($senhaEdt)."' where ID_Cadas='$cookiesId'";
            $databaseSearch = $conn->query($query);
        }
        
        if(!$enderEdt == ''){
            $query = "SELECT idCliente from CadasEnd where idCliente='$cookiesId'";
            $databaseSearch = $conn->query($query);
            $result = $databaseSearch->fetch_all(MYSQLI_ASSOC);
            if($result){
                $query = "UPDATE CadasEnd SET EndeCliente='".$enderEdt."' where idCliente='$cookiesId'";
                $databaseSearch = $conn->query($query);
            }else{
                $query = "INSERT INTO CadasEnd (idCliente,EndeCliente) VALUES ('$cookiesId','$enderEdt')";
                $databaseSearch = $conn->query($query);
            }
        }if(!$cepEdt == ''){
            $query = "SELECT idCliente from CadasEnd where idCliente='$cookiesId'";
            $databaseSearch = $conn->query($query);
            $result = $databaseSearch->fetch_all(MYSQLI_ASSOC);
            if($result){
                $query = "UPDATE CadasEnd SET CEPCliente='".$cepEdt."' where idCliente='$cookiesId'";
                $databaseSearch = $conn->query($query);
            }else{
                $query = "INSERT INTO CadasEnd (idCliente,CEPCliente) VALUES ('$cookiesId','$cepEdt')";
                $databaseSearch = $conn->query($query);
            }
        }if(!$obsEndEdt == ''){
            $query = "SELECT idCliente from CadasEnd where idCliente='$cookiesId'";
            $databaseSearch = $conn->query($query);
            $result = $databaseSearch->fetch_all(MYSQLI_ASSOC);
            if($result){
                $query = "UPDATE CadasEnd SET OBSCliente='".$cepEdt."' where idCliente='$cookiesId'";
                $databaseSearch = $conn->query($query);
            }else{
                $query = "INSERT INTO CadasEnd (idCliente,OBSCliente) VALUES ('$cookiesId','$obsEndEdt')";
                $databaseSearch = $conn->query($query);
            }
        }
        
        
        
    ?>
    <div>
        <h1 class="text-center">Configurações</h1>
    </div>
    <div class="container-sm container text-left">
        <div class="row">
            
            <div class="col">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Editar nome</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome" name="nomeEdt">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Editar Senha</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Senha" name="senhaEdt">
                </div>
                
                <h2 style="padding-top: 10px;">Endereço</h2>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Editar endereço(Não coloque endereço real)</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Não coloque endereço real" name="enderEdt">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Editar CEP(Não coloque endereço CEP)</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Não coloque CEP real" name="cepEdt">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Editar OBS</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex: apartamento00" name="obsEndEdt">
                </div>
                <button type="submit" class="btn btn-success btn-lg">Salvar Alterações</button>
                </form>
            </div>

        </div>
</body>
</html>