<?php
    class ProdutoRepositorio{
        private $conn; //conexão com o BD

        public function __construct($conn){
            $this->conn = $conn;
        }
        public function cadastrar(Produto $produto){
            $sql = "INSERT INTO produtos (nome, plataforma, descricao, preco, imagem, categoria) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssss", $produto->getNome(), $produto->getPlataforma(),
            $produto->getDescricao(), $produto->getPreco(),  $produto->getImagem(), $categoria->getCategoria());
            $stmt->execute();
            $stmt->close();
        }

        public function listarJogos()
    {
        $sql = "SELECT * FROM produtos ORDER BY preco";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produto = new Produto(
                    $row['nome'],
                    $row['plataforma'],
                    $row['descricao'],
                    $row['preco'],
                    $row['imagem'],
                    $row['categoria']
                );
                $produtos[] = $produto;
            }
        }

        return $produtos;
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM produtos ORDER BY categoria, plataforma, preco asc";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produto = new Produto(
                    $row['nome'],
                    $row['plataforma'],
                    $row['descricao'],
                    $row['preco'],
                    $row['imagem'],
                    $row['categoria'],
                );
                $produtos[] = $produto;
            }
        }

        return $produtos;
    }
    }
?>