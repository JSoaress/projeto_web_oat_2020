<?php

    class Contato{

        private $id;
        private $nome;
        private $telefone;
        private $email;
        private $mensagem;

        function __construct($id=NULL, $nome="", $telefone="", $email="", $mensagem=""){
            $this->id = $id;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->email = $email;
            $this->mensagem = $mensagem;
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

        function salvar(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "INSERT INTO 
                    contatos (nome, telefone, email, mensagem) 
                    VALUES (:nome,:telefone,:email,:mensagem)";

                if( $stmt = $link->prepare($sql) ){
                    
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":mensagem", $this->mensagem, PDO::PARAM_STR);

                    $stmt->execute();
                    
                    $stmt->closeCursor();

                    $this->id = $link->lastInsertId();
                    
                    return TRUE;
                }
            
            return FALSE;
        }

    }

?>