<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Equipamento</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header">
                <h2 class="text-center">Registrar Equipamento</h2>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo '../../controller/equipamento/registro.php'; ?>">
                    
                    <div class="form-group">
                        <label for="nome">Nome (mínimo 6 caracteres): </label>
                        <input type="text" class="form-control" name="nome" id="nome" required minlength="6">
                    </div>

                    <div class="form-group">
                        <label for="preco_aquisicao">Preço de Aquisição: </label>
                        <input id="preco_aquisicao" type="text" class="form-control" name="preco_aquisicao" required>
                    </div>

                    <div class="form-group">
                        <label for="numero_serie">Número de Série: </label>
                        <input id="numero_serie" type="text" class="form-control" name="numero_serie" required>
                    </div>

                    <div class="form-group">
                        <label for="data_fabricacao">Data de Fabricação: </label>
                        <input id="data_fabricacao" type="date" class="form-control" name="data_fabricacao" required>
                    </div>

                    <div class="form-group">
                        <label for="fabricante">Fabricante: </label>
                        <input id="fabricante" type="text" class="form-control" name="fabricante" required>
                    </div>

                    <button type="submit" class="btn btn-primary mr-1">Registrar</button>
                    <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>

                </form>
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