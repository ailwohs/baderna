<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Chamado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header">
                <h2 class="text-center">Editar Chamado</h2>
            </div>
            <div class="card-body">
                <?php
                require_once('../../model/chamado/chamado.php');
                require_once('../../db_connection.php');

                // Verifica se o ID do chamado foi passado via GET
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    // Obtém o chamado pelo ID
                    $chamado = Chamado::obterPorId($id);

                    // Verifica se o chamado foi encontrado
                    if ($chamado) {
                        // Exibe o formulário de edição com os valores atuais
                        echo '<p>Equipamento: ' . $chamado->getNomeEquipamento() . '</p>';
                        echo '<form method="post" action="../../controller/chamado/edicao.php">';
                        echo '<input type="hidden" name="id" value="' . $chamado->getId() . '">';
                        echo '<div class="form-group">';
                        echo '<label for="titulo">Título: </label>';
                        echo '<input type="text" class="form-control" name="titulo" id="titulo" value="' . $chamado->getTitulo() . '" required>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="descricao">Descrição: </label>';
                        echo '<textarea class="form-control" name="descricao" id="descricao" required>' . $chamado->getDescricao() . '</textarea>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="data_abertura">Data de Abertura: </label>';
                        echo '<input type="date" class="form-control" name="data_abertura" id="data_abertura" value="' . $chamado->getDataAbertura() . '" required>';
                        echo '</div>';
                        echo '<button type="submit" class="btn btn-primary mr-1">Salvar</button>';
                        echo '<a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>';
                        echo '</form>';
                    } else {
                        echo 'Chamado não encontrado.';
                    }
                } else {
                    echo 'ID do chamado não fornecido.';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>