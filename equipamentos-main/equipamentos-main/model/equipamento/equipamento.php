<?php

class Equipamento
{
    private $id;
    private $nome;
    private $precoAquisicao;
    private $numeroSerie;
    private $dataFabricacao;
    private $fabricante;

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getPrecoAquisicao()
    {
        return $this->precoAquisicao;
    }

    public function getNumeroSerie()
    {
        return $this->numeroSerie;
    }

    public function getDataFabricacao()
    {
        return $this->dataFabricacao;
    }

    public function getFabricante()
    {
        return $this->fabricante;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setPrecoAquisicao($precoAquisicao)
    {
        $this->precoAquisicao = $precoAquisicao;
    }

    public function setNumeroSerie($numeroSerie)
    {
        $this->numeroSerie = $numeroSerie;
    }

    public function setDataFabricacao($dataFabricacao)
    {
        $this->dataFabricacao = $dataFabricacao;
    }

    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;
    }

    public function salvarNoBanco()
    {
        $conn = conectarBancoDados();
        $stmt = $conn->prepare("INSERT INTO equipamentos (nome, preco_aquisicao, numero_serie, data_fabricacao, fabricante) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $this->nome, $this->precoAquisicao, $this->numeroSerie, $this->dataFabricacao, $this->fabricante);

        if ($stmt->execute()) {
            echo "Inserção bem-sucedida.";
        } else {
            echo "Erro durante a inserção: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    public function editarNoBanco($id)
    {
        $conn = conectarBancoDados();
        $stmt = $conn->prepare("UPDATE equipamentos SET nome=?, preco_aquisicao=?, numero_serie=?, data_fabricacao=?, fabricante=? WHERE id=?");
        $stmt->bind_param("sssssi", $this->nome, $this->precoAquisicao, $this->numeroSerie, $this->dataFabricacao, $this->fabricante, $id);

        if ($stmt->execute()) {
            echo "Edição bem-sucedida.";
        } else {
            echo "Erro durante a edição: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    public function excluirNoBanco()
    {
        $conn = conectarBancoDados();
        $stmt = $conn->prepare("DELETE FROM equipamentos WHERE id = ?");
        $stmt->bind_param("i", $this->id);

        if ($stmt->execute()) {
            echo "Exclusão bem-sucedida.";
        } else {
            echo "Erro durante a exclusão: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }


    public static function obterTodos()
    {
        $conn = conectarBancoDados();
        $result = $conn->query("SELECT * FROM equipamentos");
        $equipamentos = array();

        // Verifica se a consulta foi bem-sucedida
        if ($result) {
            // Itera sobre os resultados e cria objetos Equipamento
            while ($row = $result->fetch_assoc()) {
                $equipamento = new Equipamento();
                $equipamento->id = $row['id'];
                $equipamento->nome = $row['nome'];
                $equipamento->precoAquisicao = $row['preco_aquisicao'];
                $equipamento->numeroSerie = $row['numero_serie'];
                $equipamento->dataFabricacao = $row['data_fabricacao'];
                $equipamento->fabricante = $row['fabricante'];

                // Adiciona o equipamento ao array
                $equipamentos[] = $equipamento;
            }

            $result->close();
        }

        $conn->close();

        // Retorna o array de equipamentos
        return $equipamentos;
    }

    public static function obterPorId($id)
    {
        $conn = conectarBancoDados();
        $stmt = $conn->prepare("SELECT * FROM equipamentos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        // Verifica se a consulta foi bem-sucedida
        if ($result) {
            // Obtém a primeira linha (deveria haver apenas uma)
            $row = $result->fetch_assoc();

            // Cria um objeto Equipamento
            $equipamento = new Equipamento();
            $equipamento->id = $row['id'];
            $equipamento->nome = $row['nome'];
            $equipamento->precoAquisicao = $row['preco_aquisicao'];
            $equipamento->numeroSerie = $row['numero_serie'];
            $equipamento->dataFabricacao = $row['data_fabricacao'];
            $equipamento->fabricante = $row['fabricante'];

            $stmt->close();
            $conn->close();

            // Retorna o objeto Equipamento
            return $equipamento;
        } else {
            // Se a consulta falhou, retorna null
            $stmt->close();
            $conn->close();
            return null;
        }
    }
}
