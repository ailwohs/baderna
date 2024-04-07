<?php
require_once('../../model/chamado/chamado.php');
require_once('../../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $dataAbertura = $_POST['data_abertura'];

    // Cria um novo objeto Chamado
    $chamado = new Chamado();
    $chamado->setTitulo($titulo);
    $chamado->setDescricao($descricao);
    $chamado->setDataAbertura($dataAbertura);

    // Edita o chamado no banco de dados
    $chamado->editarChamado($id);

    header('Location: ../../view/chamado/vizualizar.php');
    exit();
}
