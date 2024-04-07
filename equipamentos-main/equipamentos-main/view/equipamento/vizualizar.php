<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Equipamentos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 800px;">
            <div class="card-header">
                <h2 class="text-center">Equipamentos Registrados</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Número de Série</th>
                            <th scope="col">Fabricante</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once('../../model/equipamento/equipamento.php');
                        require_once('../../db_connection.php');

                        $equipamentos = Equipamento::obterTodos();

                        // Itera sobre os equipamentos e exibe suas informações na tabela
                        foreach ($equipamentos as $equipamento) {
                            echo '<tr>';
                            echo '<td>' . $equipamento->getNome() . '</td>';
                            echo '<td>' . $equipamento->getNumeroSerie() . '</td>';
                            echo '<td>' . $equipamento->getFabricante() . '</td>';
                            echo '<td>';
                            echo '<a href="../../view/equipamento/editar.php?id=' . $equipamento->getId() . '" class="btn btn-primary btn-sm">Editar</a>';
                            echo '<form method="post" action="../../controller/equipamento/excluir.php" onsubmit="return confirm(\'Tem certeza que deseja excluir este equipamento?\')">';
                            echo '<input type="hidden" name="equipamento_id" value="' . $equipamento->getId() . '">';
                            echo '<button type="submit" class="btn btn-danger btn-sm mt-2">Excluir</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="mt-3">
                    <a href="../../view/equipamento/registrar.php"  class="btn btn-success">Cadastrar Novo Equipamento</a>
                    <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>