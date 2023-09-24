<?php
include "conexao.php";
if (isset($_GET['codigo'])) {
    $sal_cod = $_GET['codigo'];
    $sal_sql = "SELECT * FROM instrumentos WHERE codigo = '$sal_cod' ";
    $sal_result = mysqli_query($sal_conn, $sal_sql);
    $sal_row = mysqli_fetch_assoc($sal_result);

    if ($sal_row['qtdestoque'] > 0) {
        $value = "";
    } elseif ($sal_row['qtdestoque'] == 0) {
        $value = "Fora De Estoque";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-danger bg-gradient">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
    <div class="imagemm d-flex justify-content-center">
        <img src="HEAVEN.png" class="img-fluid imagem mb-5 mx-auto" id="imagem">
    </div>
    <script>
        setTimeout(function() {
            var imagem = document.getElementById('imagem');
            imagem.classList.remove("imagem");
            imagem.style.width = '300px';

            imagem.style.transitionDuration = "1000ms";
        }, 1000);
    </script>
    <div class="container-fluid ">
        <form class="p-5" action="" method="POST">
            <h2 class="text-center text-white">Alterar Produto 🎸</h2>


            <div class="mb-3 d-flex flex-column align-content-center">
                <label for="" class="form-label text-white">Nome Do Produto</label>
                <input name="nome" class="form-control " type="text" value="<?php echo $sal_row['nome'] ?>" maxlength="30" required disabled>
            </div>
            <select name="marca" class="form-select mb-3" aria-label="Default select example" required disabled>
                <option selected><?php echo $sal_row['marca'] ?></option>
                <option value="Yamaha">Yamaha</option>
                <option value="Fender">Fender</option>
                <option value="Gibson">Gibson</option>
                <option value="Steinway & Sons">Steinway & Sons</option>
                <option value="Selmer">Selmer</option>
                <option value="Ludwig">Ludwig</option>
                <option value="Martin">Martin</option>
                <option value="Pearl">Pearl</option>
                <option value="Roland">Roland</option>
                <option value="Buffet Crampon">Buffet Crampon</option>
            </select>
            <select name="categoria" class="form-select mb-3" aria-label="Default select example" required disabled>
                <option selected><?php echo $sal_row['categoria'] ?></option>
                <option value="Piano">Piano</option>
                <option value="Violino">Violino</option>
                <option value="Guitarra">Guitarra</option>
                <option value="Flauta">Flauta</option>
                <option value="Saxofone">Saxofone</option>
                <option value="Bateria">Bateria</option>
                <option value="Violão">Violão</option>
            </select>
            <div class="mb-3">
                <label for="" class="form-label text-white">Valor Do Produto</label>
                <input name="valor" class="form-control " step="0.01" type="number" value="<?php echo $sal_row['valor'] ?>" required>

            </div>
            <div class="mb-3">
                <label for="" class="form-label text-white">Fornecedor Do Produto</label>
                <input name="fornecedor" class="form-control" maxlength="30" value="<?php echo $sal_row['fornecedor'] ?>" type="text" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label text-white">Data De Compra</label>
                <input name="dataCompra" min="2022-09-18" value="<?php echo $sal_row['datacompra'] ?>" max="<?php echo date('Y-m-d') ?>" class="form-control" type="date" required>
            </div>
            <div class="form-floating">
                <textarea name="descricao" class="form-control" placeholder="Descrição Do Produto *OPCIONAL*" id="" style="height: 100px" maxlength="100"><?php echo $sal_row['descricao'] ?></textarea>
                <label for="">Descrição Do Produto *OPCIONAL*</label>
            </div>
            <div class="mb-3">
                <label for="" class="form-label text-white">Valor De Compra</label>
                <input name="valorCompra" class="form-control " step="0.01" type="number" value="<?php echo $sal_row['valorcompra'] ?>" required>

            </div>

            <input class="btn btn-success" name="enviar" type="submit" value="Alterar O Produto">

            <a class="btn btn-warning" href="principal.php">Cancelar</a>
        </form>

        <?php
        if (isset($_POST['enviar'])) {
            $sal_novoValor = $_POST['valor'];
            $sal_novoFornecedor = $_POST['fornecedor'];
            $sal_novaDataCompra = $_POST['dataCompra'];

            $sal_novaDescricao = $_POST['descricao'];
            $sal_novaDescricaoAtu = filter_var($sal_novaDescricao, FILTER_SANITIZE_STRING);

            $sal_novoValorCompra = $_POST['valorCompra'];

            if ($sal_novoValor > 0 && $sal_novoValorCompra >= 0) {
                $sal_sql = "UPDATE instrumentos SET valor = '$sal_novoValor', fornecedor = '$sal_novoFornecedor', datacompra = '$sal_novaDataCompra', descricao = '$sal_novaDescricaoAtu', valorcompra = '$sal_novoValorCompra' WHERE codigo = '$sal_cod'";


                $sal_result = mysqli_query($sal_conn, $sal_sql);

                if ($sal_result) {
                    echo
                    '<script type="text/javascript">
                    var mensagem = "Produto Alterado Com Sucesso!"; 

                    alert(mensagem);

                    window.location.href = "principal.php";

                    </script>';
                } else {
                    echo "<h1>Erro no Update: " . mysqli_error($sal_conn) . "</h1>";
                }
            } elseif ($sal_novoValor <= 0) {
                echo
                '<script type="text/javascript">
                    var mensagem = "Digite um Valor Válido No Campo Valor de Venda"; 

                    alert(mensagem);

                    </script>';
            } elseif ($sal_novoValorCompra < 0) {
                echo
                '<script type="text/javascript">
                    var mensagem = "Digite um Valor Válido No Campo Valor de Compra"; 

                    alert(mensagem);

                    </script>';
            }
        }
        ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>