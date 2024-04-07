<?php
require_once('../../model/chamado/chamado.php');
require_once('../../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o ID do chamado a ser excluído
    $chamadoId = $_POST['chamado_id'];
    $chamado = Chamado::obterPorId($chamadoId);

    // Verifica se o chamado foi encontrado
    if ($chamado) {
        $chamado->excluirChamado();
        header('Location: ../../view/chamado/vizualizar.php');
        exit();
    } else {
        exit();
    }
} else {
    exit();
}
