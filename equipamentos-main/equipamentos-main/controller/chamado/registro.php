<?php
require_once('../../model/chamado/chamado.php');
require_once('../../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $equipamentoId = $_POST['equipamento_id'];
    $dataAbertura = $_POST['data_abertura'];

    // Cria um novo objeto Chamado
    $chamado = new Chamado();
    $chamado->setTitulo($titulo);
    $chamado->setDescricao($descricao);
    $chamado->setEquipamentoId($equipamentoId);
    $chamado->setDataAbertura($dataAbertura);

    // Salva o chamado no banco de dados
    $chamado->salvarNoBanco();

    header('Location: ../../view/chamado/vizualizar.php');
    exit();
}