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
            $produto->getDescricao(), $produto->getPreco(),  $produto->getImagem(), $produto->getCategoria());
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
                    $row['id'],
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

    public function atualizarProduto(Produto $produto)
    {
        $imagem = $produto->getImagem();
        if (empty($imagem)) {
            // Prepara a declaração SQL
            $sql = "UPDATE produtos SET nome = ?, plataforma = ?,
            descricao = ?,  preco = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);


            // Extrai os atributos do objeto Produto
            $nome = $produto->getNome();
            $plataforma = $produto->getPlataforma();
            $descricao = $produto->getDescricao();
            $preco = $produto->getPreco();
            $id = $produto->getId();

            // Vincula os parâmetros
            $stmt->bind_param(
                'ssssi',
                $nome,
                $plataforma,
                $descricao,
                $preco,
                $id
            );
            // Executa a declaração preparada
            $resultado = $stmt->execute();


            // Fecha a declaração
            $stmt->close();


            return $resultado;
        } else {
            // Prepara a declaração SQL
            $sql = "UPDATE produtos SET nome = ?, plataforma = ?, 
            descricao = ?, preco = ?  imagem = ? WHERE id = ?";


            $stmt = $this->conn->prepare($sql);
            // Extrai os atributos do objeto Produto
            $nome = $produto->getNome();
            $plataforma = $produto->getPlataforma();
            $descricao = $produto->getDescricao();
            $preco = $produto->getPreco();
            $id = $produto->getId();


            // Vincula os parâmetros
            $stmt->bind_param(
                'ssssdi',
                $nome,
                $plataforma,
                $descricao,
                $imagem,
                $preco,
                $id
            );
            // Executa a declaração preparada
            $resultado = $stmt->execute();


            // Fecha a declaração
            $stmt->close();


            return $resultado;
        }
    }

    public function excluirProdutoPorId($id)
    {
        $sql = "DELETE FROM produtos WHERE  
             id = ?";


        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);


        // Vincula o parâmetro
        $stmt->bind_param('i', $id);


        // Executa a consulta preparada
        $success = $stmt->execute();


        // Fecha a declaração
        $stmt->close();


        return $success;
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM produtos ORDER BY categoria, plataforma, preco asc";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produto = new Produto(
                    $row['id'],
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

    public function listarJogoPorId($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = ? ORDER BY preco LIMIT 1";


        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);


        // Vincula o parâmetro
        $stmt->bind_param('i', $id);


        // Executa a consulta preparada
        $stmt->execute();


        // Obtém os resultados
        $result = $stmt->get_result();


        $produto = null;


        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $produto = new Produto(
                $row['id'],
                $row['nome'],
                $row['plataforma'],
                $row['descricao'],
                $row['preco'],
                $row['imagem'],
                $row['categoria']
               
            );
        }

        //Fecha a declaração
        $stmt->close();
        return $produto;
    }
    }
?>