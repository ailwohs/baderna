<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Chamados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 800px;">
            <div class="card-header">
                <h2 class="text-center">Chamados Registrados</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Equipamento</th>
                            <th scope="col">Data de Abertura</th>
                            <th scope="col">Dias Aberto</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once('../../model/chamado/chamado.php');
                        require_once('../../db_connection.php');

                        $chamados = Chamado::obterTodosChamados();

                        // Itera sobre os chamados e exibe suas informações na tabela
                        foreach ($chamados as $chamado) {
                            echo '<tr>';
                            echo '<td>' . $chamado->getTitulo() . '</td>';
                            echo '<td>' . $chamado->nomeEquipamento . '</td>';
                            echo '<td>' . date('d/m/Y', strtotime($chamado->getDataAbertura())) . '</td>';
                            echo '<td>' . calcularDiasAberto($chamado->getDataAbertura()) . '</td>';
                            echo '<td>';
                            echo '<a href="' . '../../view/chamado/editar.php?id=' . $chamado->getId() . '" class="btn btn-primary btn-sm">Editar</a>';
                            echo '<form method="post" action="../../controller/chamado/excluir.php" onsubmit="return confirm(\'Tem certeza que deseja excluir o chamado?\')">';
                            echo '<input type="hidden" name="chamado_id" value="' . $chamado->getId() . '">';
                            echo '<button type="submit" class="btn btn-danger btn-sm mt-2">Excluir</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }

                        // Função para calcular o número de dias aberto
                        function calcularDiasAberto($dataAbertura)
                        {
                            $dataAtual = new DateTime();
                            $dataAbertura = new DateTime($dataAbertura);
                            $diferenca = $dataAtual->diff($dataAbertura);
                            return $diferenca->days;
                        }
                        ?>
                    </tbody>
                </table>
                <div class="mt-3">
                    <a href="../../view/chamado/registrar.php"  class="btn btn-success">Cadastrar Novo Chamado</a>
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