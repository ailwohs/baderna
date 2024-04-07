<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipamento</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header">
                <h2 class="text-center">Editar Equipamento</h2>
            </div>
            <div class="card-body">
                <?php
                require_once('../../model/equipamento/equipamento.php');
                require_once('../../db_connection.php');

                // Verifica se o ID do equipamento foi passado via GET
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    // Obtém o equipamento pelo ID
                    $equipamento = Equipamento::obterPorId($id);

                    // Verifica se o equipamento foi encontrado
                    if ($equipamento) {
                        // Exibe o formulário de edição com os valores atuais
                        echo '<form method="post" action="../../controller/equipamento/edicao.php">';
                        echo '<input type="hidden" name="id" value="' . $equipamento->getId() . '">';
                        echo '<div class="form-group">';
                        echo '<label for="nome">Nome (mínimo 6 caracteres): </label>';
                        echo '<input type="text" class="form-control" name="nome" id="nome" value="' . $equipamento->getNome() . '" required minlength="6">';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="preco_aquisicao">Preço de Aquisição: </label>';
                        echo '<input id="preco_aquisicao" type="text" class="form-control" name="preco_aquisicao" value="' . $equipamento->getPrecoAquisicao() . '" required>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="numero_serie">Número de Série: </label>';
                        echo '<input id="numero_serie" type="text" class="form-control" name="numero_serie" value="' . $equipamento->getNumeroSerie() . '" required>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="data_fabricacao">Data de Fabricação: </label>';
                        echo '<input id="data_fabricacao" type="date" class="form-control" name="data_fabricacao" value="' . $equipamento->getDataFabricacao() . '" required>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="fabricante">Fabricante: </label>';
                        echo '<input id="fabricante" type="text" class="form-control" name="fabricante" value="' . $equipamento->getFabricante() . '" required>';
                        echo '</div>';
                        echo '<button type="submit" class="btn btn-primary mr-1">Salvar</button>';
                        echo '<a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>';
                        echo '</form>';
                    } else {
                        echo 'Equipamento não encontrado.';
                    }
                } else {
                    echo 'ID do equipamento não fornecido.';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
    <script>
        $(document).ready(function(){
        $('#preco_aquisicao').inputmask('currency', {
            'alias': 'numeric',
            'prefix': 'R$ ',
            'digits': 2,
            'autoUnmask': true,
            'radixPoint': ',',
            'groupSeparator': '.',
        });
    });
    </script>

</body>

</html>