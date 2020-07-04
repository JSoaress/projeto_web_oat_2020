<?php

    class Bebida{

        private $id;
        private $nome;
        private $descricao;
        private $url_image;

        function __construct($id=NULL, $nome="", $descricao="", $url_image=""){
            $this->id = $id;
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->url_image = $url_image;
        }

        function __get($atributo){
            return $this->$atributo;
        }

        function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        function __toString(){
            return $this->nome . " (" . $this->id . ")";
        }

        static function get_bebidas(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "SELECT * FROM bebidas;";

            $vBebidas = array();

            if( $stmt = $link->prepare($sql) ){

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('descricao', $descricao);
                $stmt->bindColumn('url_image', $url_image);

                while( $stmt->fetch(PDO::FETCH_BOUND) ){
                    $objBebida = new Bebida(
                        $id,
                        $nome,
                        $descricao,
                        $url_image
                    );
    
                    $vBebidas[] = $objBebida;
                }

                $stmt->closeCursor();
            }

            return $vBebidas;
        }

        static function get_bebidas_por_id($id){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "SELECT * FROM bebidas WHERE id = :id;";

            $vBebidas = [];

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('descricao', $descricao);
                $stmt->bindColumn('url_image', $url_image);

                while( $stmt->fetch(PDO::FETCH_BOUND) ){
                    $objBebida = new Bebida(
                        $id,
                        $nome,
                        $descricao,
                        $url_image
                    );
    
                    $vBebidas[] = $objBebida;
                }
                
                $stmt->closeCursor();
            }

            return $vBebidas;
        }

        static function get_bebidas_por_nome($nome){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "SELECT * FROM bebidas WHERE nome LIKE :nome;";            

            $vBebidas = [];

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('descricao', $descricao);
                $stmt->bindColumn('url_image', $url_image);

                while( $stmt->fetch(PDO::FETCH_BOUND) ){
                    $objBebida = new Bebida(
                        $id,
                        $nome,
                        $descricao,
                        $url_image
                    );
    
                    $vBebidas[] = $objBebida;
                }
                
                $stmt->closeCursor();
            }

            return $vBebidas;
        }

    }

?>