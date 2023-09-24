<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class=" bg-danger bg-gradient ">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

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
    <div class="container-fluid">

        <form class="p-5" action="" method="POST">

            <h2 class="text-center text-white">Adicionar Produto 🎸</h2>


            <div class="mb-3 d-flex flex-column align-content-center text-white">
                <label for="" class="form-label">Nome Produto</label>
                <input name="nome" class="form-control " type="text" maxlength="30" required>
            </div>
            <select name="marca" class="form-select mb-3 " aria-label="Default select example" required>
                <option selected>Marca</option>
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
            <select name="categoria" class=" form-select mb-3" aria-label="Default select example" required>
                <option selected>Categoria</option>
                <option value="Piano">Piano</option>
                <option value="Violino">Violino</option>
                <option value="Guitarra">Guitarra</option>
                <option value="Flauta">Flauta</option>
                <option value="Saxofone">Saxofone</option>
                <option value="Bateria">Bateria</option>
                <option value="Violão">Violão</option>
            </select>
            <div class="mb-3 text-white">
                <label for="" class="form-label">Valor De Venda </label>
                <input name="valor" class="form-control " step="0.01" type="number" required>

            </div>
            <div class="mb-3 text-white">
                <label for="" class="form-label">Fornecedor Do Produto</label>
                <input name="fornecedor" class="form-control" maxlength="30" type="text" required>
            </div>
            <div class="mb-3 text-white">
                <label for="" class="form-label">Data De Compra</label>
                <input name="dataCompra" min="2022-09-18" max="<?php echo date('Y-m-d') ?>" class="form-control" type="date" required>
            </div>
            <div class="mb-3 text-white">
                <label for="" class="form-label">Quantidade No Estoque</label>
                <input name="qtdestoque" class="form-control " type="number" required>
            </div>
            <div class="form-floating ">
                <textarea name="descricao" class="form-control text-black" placeholder="Descrição Do Produto *OPCIONAL*" id="" style="height: 100px" maxlength="100"></textarea>
                <label for="">Descrição Do Produto *OPCIONAL*</label>
            </div>
            <div class="mb-3 text-white">
                <label for="" class="form-label">Valor De Compra p/unidade</label>
                <input name="valorCompra" class="form-control" step="0.01" type="number" required>
            </div>

            <input class="btn btn-success" name="enviar" type="submit" value="Cadastrar Produto">

            <a class="btn btn-warning" href="principal.php">Cancelar</a>
        </form>

        <?php
        include "conexao.php";

        if (isset($_POST['enviar'])) {
            $sal_nome = $_POST['nome'];
            

            $sal_marca = $_POST['marca'];
            $sal_categoria = $_POST['categoria'];
            $sal_valor = $_POST['valor'];
            $sal_fornece = $_POST['fornecedor'];
            $sal_dataCompra = $_POST['dataCompra'];
            $sal_qtd = $_POST['qtdestoque'];

            $sal_descricao = $_POST['descricao'];
            $sal_descricaoAtu = filter_var($sal_descricao, FILTER_SANITIZE_STRING);

            $sal_valorCompra = $_POST['valorCompra'];

            /*Fazendo A Parte Do Código*/

            /*1 e 2 letra do nome ou sobrenome */
            $sal_nome_1l = substr($sal_nome, 0, 1);
            $sal_index = strpos($sal_nome, " ");
            $sal_nome_sl = substr($sal_nome, $sal_index + 1, 1);
            $sal_nome_1lsl = "" . $sal_nome_1l . $sal_nome_sl;

            /*1 e 2 letra da marca ou primeira letra do segundo nome*/
            $sal_marca_1l = substr($sal_marca, 0, 1);
            $sal_index = strpos($sal_marca, " ");
            $sal_marca_sl = substr($sal_marca, $sal_index + 1, 1);
            $sal_marca_1lsl = "" . $sal_marca_1l . $sal_marca_sl;

            /* 1 e 2 letra da categoria ou primeira letra do segundo nome */
            $sal_categoria_1l = substr($sal_categoria, 0, 1);
            $sal_index = strpos($sal_categoria, " ");
            $sal_categoria_sl = substr($sal_categoria, $sal_index + 1, 1);
            $sal_categoria_1lsl = "" . $sal_categoria_1l . $sal_categoria_sl;


            $sal_cdg = "" . $sal_nome_1lsl . $sal_marca_1lsl . "-" . $sal_categoria_1lsl;
            $sal_cdg = strtoupper($sal_cdg);

            $sal_checar_sql = "SELECT * FROM instrumentos WHERE codigo = '$sal_cdg' ";

            $sal_checar_result = mysqli_query($sal_conn, $sal_checar_sql);

            if (mysqli_num_rows($sal_checar_result) > 0) {
                echo "<h1>Este Produto Já Foi Cadastrado Anteriormente</h1>";
            } else {
                if ($sal_qtd > 0 && $sal_valor > 0 && $sal_valorCompra > 0) {
                    $sal_sql = "INSERT INTO instrumentos (codigo, nome, marca, categoria, valor, fornecedor, datacompra, qtdestoque, descricao, valorcompra) 
        VALUES('$sal_cdg','$sal_nome','$sal_marca','$sal_categoria','$sal_valor','$sal_fornece','$sal_dataCompra','$sal_qtd','$sal_descricaoAtu', '$sal_valorCompra')";

                    $sal_result = mysqli_query($sal_conn, $sal_sql);

                    if ($sal_result) {
                        echo
                        '<script type="text/javascript">
                    var mensagem = "Produto Cadastrado Com Sucesso!"; 

                    alert(mensagem);

                    window.location.href = "principal.php";

                    </script>';
                    } else {
                        echo "<h1>Erro na Inserção: " . mysqli_error($sal_conn) . "</h1>";
                    }
                } else {
                    echo "<h1>Digite Um Valor Válido!</h1>";
                }
            }
        }
        ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>