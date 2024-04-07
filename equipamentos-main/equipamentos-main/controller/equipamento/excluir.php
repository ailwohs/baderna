<?php
require_once('../../model/equipamento/equipamento.php');
require_once('../../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o ID do equipamento a ser excluído
    $equipamentoId = $_POST['equipamento_id'];
    $equipamento = Equipamento::obterPorId($equipamentoId);

    // Verifica se o equipamento foi encontrado
    if ($equipamento) {
        $equipamento->excluirNoBanco();

        // Redireciona para a página de visualização de equipamentos
        header('Location: ../../view/equipamento/vizualizar.php');
        exit();
    } else {
        exit();
    }
} else {
    exit();
}
