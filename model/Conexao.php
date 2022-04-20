<?php
    class Conexao {
        public static function getConexao() {
            $host = "localhost";
            $dbname = "bd_usuarios";
            $username = "root";
            $password = "";

            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                // Teste Conexão com Banco de Dados
                /* if($conn) {
                    echo "Conectado ao Banco de Dados com Sucesso!";
                } */
                return $conn;
            } catch (PDOException $e) {
                echo "ERRO: " . $e->getMessage();
                return null;
            }
        }
    }

?>