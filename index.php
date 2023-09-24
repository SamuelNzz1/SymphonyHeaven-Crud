<?php
include "conexao.php";


session_start();
$sal_primeiroNome = "";
$sal_ultimoNome = "";
$sal_email = "";
$sal_senha = "";


if (isset($_SESSION['primeironome'])) {
    $sal_primeiroNome = $_SESSION['primeironome'];
    
        $sal_primeiroNome =  preg_replace("/[0-9]/", "", $sal_primeiroNome);
         
        $sal_index1= strpos($sal_primeiroNome, " ");
        $sal_primeiroNomeLimpo = substr($sal_primeiroNome, 0,  $sal_index1 );
}
if (isset($_SESSION['ultimonome'])) {
    $sal_ultimoNome = $_SESSION['ultimonome'];
    $sal_ultimoNome =  preg_replace("/[0-9]/", "", $sal_ultimoNome);
         
        $sal_index2= strpos($sal_ultimoNome, " ");
        $sal_ultimoNomeLimpo = substr($sal_ultimoNome, 0,  $sal_index2 );
}
if (isset($_SESSION['email'])) {
    $sal_email = $_SESSION['email'];
}
if (isset($_SESSION['senha'])) {
    $sal_senha = $_SESSION['senha'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">

</head>

<body class="bg-secondary bg-gradient text-white">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <nav class="navbar  bg-danger bg-gradient rounded shadow p-3 mb-5">
        <div class="container-fluid d-flex justify-content-center">

            <img src="HEAVEN.png" class="img-fluid">

        </div>
    </nav>
    <div class="container-fluid d-flex flex-column justify-content-center">

        <img src="usu.png" id="usu" class="img-fluid mx-auto h-25">
        <h1 class="text-center mb-5">Login Como Funcionário</h1>
    </div>

    <form class="mb-3" action="" method="post">
        <div class="input-group mx-5">
            <span class="input-group-text">🎸</span>
            <input placeholder = "Primeiro Nome" name="primeironome" value="<?php
                                             
                                                if (isset($_SESSION['primeironome'])) {
                                                        if($sal_index1)
                                                        echo $sal_primeiroNomeLimpo;

                                                        else
                                                        echo $sal_primeiroNome;


                                                }
                                                else 
                                                echo "";  ?>" type="text" aria-label="First name" class="form-control w-25" required>
            <input placeholder = "Último Nome" name="ultimonome" value="<?php  if (isset($_SESSION['ultimonome'])) {
                                                        if($sal_index2)
                                                        echo $sal_ultimoNomeLimpo;

                                                        else
                                                        echo $sal_ultimoNome;


                                                }else 
                                                echo ""; ?>" type="text" aria-label="Last name" class="form-control w-25" required>
        </div>
        <div class="mb-3 mx-5">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input value = "<?php
                                                
                                                if (isset($_SESSION['email'])){
                                                    
                                                        echo $sal_email;
                                                     


                                                }
                                                else 
                                                echo "";  ?>" name = "email" type="email" class="form-control w-25" id="exampleFormControlInput1" placeholder="nome@exemplo.com">
        </div>
        <div class="mb-3 mx-5">
            <label for="exampleInputPassword1" class="form-label">Senha</label>
            <input placeholder = "Senha" id="senha" name="senha" value="<?php  if (isset($_SESSION['senha'])) {
                                                    
                                                        echo $sal_senha;
                                                    


                                                }else 
                                                echo ""; ?>" type="password" class="form-control w-25" id="exampleInputPassword1" required>

            <button class="btn btn-primary" type="button" id="mostrarSenha">Mostrar Senha</button>
        </div>
        <button name="enviar" type="submit" class="btn btn-primary mx-5">Login</button>
    </form>
    <p class="mx-5">Sem Conta? <a class="text-white" href="cadastrar.php">Cadastre-se</a></p>
    <script>
        document.getElementById('mostrarSenha').addEventListener('click', function() {
            var senhaInput = document.getElementById('senha');
            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                this.textContent = 'Ocultar';
            } else {
                senhaInput.type = 'password';
                this.textContent = 'Mostrar';
            }
        });
    </script>
    <?php
    


    if (isset($_POST['enviar'])) {
        $sal_primeiroNome = $_POST['primeironome'];
        $sal_primeiroNome =  preg_replace("/[0-9]/", "", $sal_primeiroNome);

        $sal_index1= strpos($sal_primeiroNome, " ");
        $sal_primeiroNomeLimpo = substr($sal_primeiroNome, 0,  $sal_index1 );
        $sal_email = $_POST['email'];

        $sal_ultimoNome = $_POST['ultimonome'];
        $sal_ultimoNome =  preg_replace("/[0-9]/", "", $sal_ultimoNome);

        $sal_index2= strpos($sal_ultimoNome, " ");
        
        $sal_ultimoNomeLimpo = substr($sal_ultimoNome, 0,  $sal_index2);
        
        $sal_senha = $_POST['senha'];
        

        if($sal_index1 == false || $sal_index2 == false)
                $sal_nome = $sal_primeiroNome . " " . $sal_ultimoNome;

                else
                $sal_nome = $sal_primeiroNomeLimpo . " " . $sal_ultimoNomeLimpo;
                

        $sal_checar_sql = "SELECT * FROM usuarios WHERE email = '$sal_email' AND senha = '$sal_senha' AND nomeCompleto = '$sal_nome'";
        $sal_checar_result = mysqli_query($sal_conn, $sal_checar_sql);


        if (mysqli_num_rows($sal_checar_result) > 0) {
            $_SESSION['nomecompleto'] = $sal_nome;
            $_SESSION['senha'] = $sal_senha;
            $_SESSION['email'] = $sal_email;
            $_SESSION['primeironome'] = $sal_primeiroNome;
            $_SESSION['ultimonome'] = $sal_ultimoNome;
           

            header("Location: principal.php");
        } else {
            echo
            "<script type ='text/javascript'> 
                            alert('Nome Ou Senha Incorretos, Tente Novamente');
            </script>";
        }
    }


    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>