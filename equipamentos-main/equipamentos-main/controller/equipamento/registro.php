<?php
require_once('../../model/equipamento/equipamento.php');
require_once('../../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $precoAquisicao = str_replace('R$ ', '', $_POST['preco_aquisicao']);
    $numeroSerie = $_POST['numero_serie'];
    $dataFabricacao = $_POST['data_fabricacao'];
    $fabricante = $_POST['fabricante'];

    // Cria um novo objeto Equipamento
    $equipamento = new Equipamento();
    $equipamento->setNome($nome);
    $equipamento->setPrecoAquisicao($precoAquisicao);
    $equipamento->setNumeroSerie($numeroSerie);
    $equipamento->setDataFabricacao($dataFabricacao);
    $equipamento->setFabricante($fabricante);

    // Salva o equipamento no banco de dados
    $equipamento->salvarNoBanco();

    header('Location: ../../view/equipamento/vizualizar.php');
    exit();
}
