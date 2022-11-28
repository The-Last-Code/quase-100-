<!-- 
      * Página Client *

          Funções:
            - Pega as informacoes do projeto para guardar na session para ser mostradas na home
-->

<?php

     include ('../Conection/Conn.php');

    class ClientModel extends Conn
    {
        private $tableProjeto;
        private $tableCientista;

        function __construct()
        {
            parent::__construct();
            $this->tableProjeto = 'projeto';
            $this->tableCientista = 'cientista';
            $this->tableFormacao = 'formacao';

        }

        
        function getNom($id)
        { 
            /*Query para pegar nome*/
            $sqlSelect = $this->pdo->query("SELECT nom_cientista FROM $this->tableCientista WHERE id_cientista = $id ");
            $sqlSelect ->execute();
            return $sqlSelect;        
        }    
        function getAll()
        { 
            /*Query para pegar todas publicações do banco*/
            $sqlSelect = $this->pdo->query("SELECT * FROM $this->tableProjeto");
            $sqlSelect ->execute();
            return $sqlSelect;        
        }     
          
        function getUser($id)
        {
            /*Pegar informaçoes do usuario */
            $sql = "SELECT * FROM $this->tableProjeto WHERE fk_id_cientista = $id";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            return $query;
        }

        function getModal($id)
        {
            /* Verifiar se o usuário ja cadastrou o perfil dele */

            $sql = "SELECT * FROM $this->tableFormacao WHERE fk_id_cientista = $id";
            $query = $this->pdo->prepare($sql);
            $query->execute();

            if($query->rowCount() > 0)
            {
                return 'true';
          
            }
            else
            {
                return 'false';
            }
        
        }
    }
    
?>