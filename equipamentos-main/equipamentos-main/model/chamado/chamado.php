<?php

class Chamado
{
    private $id;
    private $titulo;
    private $descricao;
    private $equipamentoId;
    private $dataAbertura;
    public $nomeEquipamento;

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getEquipamentoId()
    {
        return $this->equipamentoId;
    }

    public function getDataAbertura()
    {
        return $this->dataAbertura;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setEquipamentoId($equipamentoId)
    {
        $this->equipamentoId = $equipamentoId;
    }

    public function setDataAbertura($dataAbertura)
    {
        $this->dataAbertura = $dataAbertura;
    }

    public function getNomeEquipamento()
    {
        return $this->nomeEquipamento;
    }

    public function setNomeEquipamento($nomeEquipamento)
    {
        $this->nomeEquipamento = $nomeEquipamento;
    }

    public function salvarNoBanco()
    {

        $conn = conectarBancoDados();
        $stmt = $conn->prepare("INSERT INTO chamados (titulo, descricao, equipamento_id, data_abertura) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $this->titulo, $this->descricao, $this->equipamentoId, $this->dataAbertura);

        if ($stmt->execute()) {
            echo "Inserção bem-sucedida.";
        } else {
            echo "Erro durante a inserção do chamado: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    public static function obterTodosChamados()
    {
        $conn = conectarBancoDados();
        $result = $conn->query("SELECT chamados.*, equipamentos.nome AS nome_equipamento FROM chamados JOIN equipamentos ON chamados.equipamento_id = equipamentos.id");
        $chamados = array();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $chamado = new Chamado();
                $chamado->id = $row['id'];
                $chamado->titulo = $row['titulo'];
                $chamado->descricao = $row['descricao'];
                $chamado->equipamentoId = $row['equipamento_id'];
                $chamado->dataAbertura = $row['data_abertura'];
                $chamado->nomeEquipamento = $row['nome_equipamento'];

                $chamados[] = $chamado;
            }
            $result->close();
        }

        $conn->close();
        return $chamados;
    }

    public static function obterPorId($id)
    {
        $conn = conectarBancoDados();
        $stmt = $conn->prepare("SELECT chamados.*, equipamentos.nome AS nome_equipamento FROM chamados JOIN equipamentos ON chamados.equipamento_id = equipamentos.id WHERE chamados.id = ?");
        $stmt->bind_param("i", $id);

        $chamado = null;

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $chamado = new Chamado();
                $chamado->id = $row['id'];
                $chamado->titulo = $row['titulo'];
                $chamado->descricao = $row['descricao'];
                $chamado->equipamentoId = $row['equipamento_id'];
                $chamado->dataAbertura = $row['data_abertura'];
                $chamado->nomeEquipamento = $row['nome_equipamento'];
            }

            $result->close();
        }

        $stmt->close();
        $conn->close();

        return $chamado;
    }

    public function editarChamado($id)
    {
        $conn = conectarBancoDados();

        $stmt = $conn->prepare("UPDATE chamados SET titulo = ?, descricao = ?, data_abertura = ? WHERE id = ?");
        $stmt->bind_param("sssi", $this->titulo, $this->descricao, $this->dataAbertura, $id);

        if ($stmt->execute()) {
            echo "Edição bem-sucedida.";
        } else {
            echo "Erro durante a edição do chamado: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    public function excluirChamado()
    {
        $conn = conectarBancoDados();
        $stmt = $conn->prepare("DELETE FROM chamados WHERE id = ?");
        $stmt->bind_param("i", $this->id);

        if ($stmt->execute()) {
            echo "Exclusão bem-sucedida.";
        } else {
            echo "Erro durante a exclusão do chamado: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    
}