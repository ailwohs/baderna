<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Chamado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header">
                <h2 class="text-center">Registrar Chamado</h2>
            </div>
            <div class="card-body">
                <form method="post" action="../../controller/chamado/registro.php">
                    <div class="form-group">
                        <label for="titulo">Título: </label>
                        <input type="text" class="form-control" name="titulo" id="titulo" required>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição: </label>
                        <textarea class="form-control" name="descricao" id="descricao" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="equipamento_id">Equipamento: </label>
                        <select class="form-control" name="equipamento_id" id="equipamento_id" required>
                            <?php
                            require_once('../../model/equipamento/equipamento.php');
                            require_once('../../db_connection.php');

                            // Obtém todos os equipamentos do banco de dados
                            $equipamentos = Equipamento::obterTodos();

                            // Itera sobre os equipamentos e cria opções para o menu suspenso
                            foreach ($equipamentos as $equipamento) {
                                echo '<option value="' . $equipamento->getId() . '">' . $equipamento->getNome() . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="data_abertura">Data de Abertura: </label>
                        <input id="data_abertura" type="date" class="form-control" name="data_abertura" required>
                    </div>

                    <button type="submit" class="btn btn-primary mr-1">Registrar Chamado</button>
                    <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>