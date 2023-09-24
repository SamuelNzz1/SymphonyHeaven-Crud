<?php
include "conexao.php";
session_start();
$sal_sql = "SELECT * FROM instrumentos";
$sal_result = mysqli_query($sal_conn, $sal_sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heaven Symphony</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body class="bg-secondary bg-gradient">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <nav class="navbar  bg-danger bg-gradient rounded shadow p-3 mb-5">
        <div class="container-fluid d-flex justify-content-center">

            <img src="HEAVEN.png" id="imagem" class="img-fluid imagem">
            <script>
                setTimeout(function() {
                    var imagem = document.getElementById('imagem');
                    imagem.classList.remove("imagem");
                    imagem.style.width = '300px';

                    imagem.style.transitionDuration = "1000ms";
                }, 1000);
            </script>
        </div>
    </nav>

    <h1 class="text-center text-black mb-5">Controle De Estoque</h1>
    <a class="btn-mod btn btn-warning mb-5 mx-3" href="create.php">Adicionar Produto</a>
    <a href="index.php" class="btn btn-primary mb-5 mx-3">Voltar</a>
    <div class="table-responsive">
        <table class="table table-dark table-hover " style="max-width: 100%;">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th class= "d-none d-sm-table-cell">Valor</th>
                <th class="d-none d-md-table-cell">Fornecedor</th>
                <th class="d-none d-md-table-cell">Data De Compra</th>
                <th>Qtd No Estoque</th>
                <th>Operações</th>
            </tr>
            <?php while ($sal_row = mysqli_fetch_assoc($sal_result)) : ?>
                <tr>
                    <td><?php echo $sal_row['codigo']; ?></td>
                    <td><?php echo $sal_row['nome']; ?></td>
                    <td><?php echo $sal_row['marca']; ?></td>
                    <td><?php echo $sal_row['categoria']; ?></td>
                    <td class= "d-none d-sm-table-cell"><?php echo $sal_row['valor']; ?></td>
                    <td class="d-none d-md-table-cell"><?php echo $sal_row['fornecedor']; ?></td>
                    <td class="d-none d-md-table-cell"><?php
                        $dataFormatada = date('d/m/Y', strtotime($sal_row['datacompra']));
                        echo $dataFormatada; ?></td>
                    <td><?php
                        if ($sal_row['qtdestoque'] > 0)
                            echo $sal_row['qtdestoque'];
                        elseif ($sal_row['qtdestoque'] == 0) {
                            echo "<p>Fora De Estoque</p>";
                        }
                        ?></td>
                    <td >
                        <a class="btn btn-success" href="venda.php?codigo=<?php echo $sal_row['codigo']; ?>">Vender</a>
                        <a href="detalhes.php?codigo=<?php echo $sal_row['codigo']; ?>" class = "btn btn-light">Detalhes</a>
                        <a class="btn btn-info" href="add.php?codigo=<?php echo $sal_row['codigo']; ?>">Adicionar</a>
                        <a class="btn btn-warning" href="update.php?codigo=<?php echo $sal_row['codigo']; ?>">Alterar</a>
                        <a class="btn btn-danger" href="delete.php?codigo=<?php echo $sal_row['codigo']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>