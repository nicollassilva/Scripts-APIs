<?php

class CRUD {

    private $host;
    private $user;
    private $pass;
    private $db;
    public $connection;

    function __construct($host, $user, $pass, $db, $charset = 'utf8') {

        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->charset = $charset;

        self::getConnection();

    }

    private function getConnection() {

        try {

        $pdo = new \PDO('mysql:host='.$this->host.';charset='.$this->charset.';dbname='.$this->db, $this->user, $this->pass);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->connection = $pdo;

        } catch(PDOException $e) {

            echo "Erro ao conectar com o banco de dados: ". $e->getMessage();

        }

    }

    /* Selecionar todos os registros de uma tabela.
    * RETORNO: array
    * ------------/-------------/------------/----------------/----
    * $crud->selectAllQuery(tabela, where, ordenação, limite);
    * ------------/-----------------/----------------/-------------
    * EXEMPLO: $crud->selectAllQuery('usuarios', 'id = 1', 'nome ASC', '1');
    * ------------/-------------/------------/----------------/----
    */

    public function selectAllQuery($table, $where, $order, $limit = '') {

        $limit = $limit != '' ? $limit = "LIMIT ".$limit : $limit = '';

        $where = $where != '' ? $where = "WHERE ".$where : $where = '';

        $order = $order != '' ? $order = "ORDER BY ".$order : $order = '';

        $data = [];

        $sql = $this->connection->query("SELECT * FROM $table $where $order $limit");

        $row = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $row;

    }

    /* Selecionar uma ou mais colunas de uma tabela.
    * RETORNO: array
    * ------------/-------------/------------/----------------/----
    * $crud->selectAllQuery(tabela, where, ordenação, limite);
    * ------------/-----------------/----------------/-------------
    * EXEMPLO: $crud->selectAllQuery('usuarios', 'id = 1', 'nome ASC', '1');
    * ------------/-------------/------------/----------------/----
    */

    public function selectOneOrMoreQuery($params, $table, $where, $order = '', $limit = '') {

        $limit = $limit != '' ? $limit = "LIMIT ".$limit : $limit = '';

        $where = $where != '' ? $where = "WHERE ".$where : $where = '';

        $order = $order != '' ? $order = "ORDER BY ".$order : $order = '';

        $data = [];

        $sql = $this->connection->query("SELECT $params FROM $table $where $order $limit");

        $sql->execute();

        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    /* Fazer update em uma tabela.
    * RETORNOS: Valores atualizados/ Erro: <erro-info>
    * ------------/-------------/------------/----------------/----
    * $crud->updateQuery(tabela, colunas, [valores], where);
    * ------------/-----------------/----------------/-------------
    * EXEMPLO: $crud->updateQuery('noticias', 'titulo, descricao', [$titulo, $descricao], 'id = 9');
    * ------------/-------------/------------/----------------/----
    */

    public function updateQuery($table, $params, Array $values, $where) {

        $where = $where != '' ? $where = "WHERE ".$where : $where = '';

        $params = explode(', ', $params);

        $data = [];

        for($i = 0; $i < count($params); $i++) {

            $data[$i] = ":".$params[$i][0].$params[$i][1].$params[$i][2].", ";
        
        }

        $result = '';

        $final = array_map(null, $params, $data);

        foreach($final as $key => $vals) {

            foreach($vals as $chave => $val) {

                $result .= str_replace(':', ' = :', $val);

            }

        }

        $result = rtrim($result, ', ');

        $sql = $this->connection->prepare("UPDATE $table SET $result $where");
        
        for($i = 0; $i < count($params); $i++) {

            $data[$i] = ":".$params[$i][0].$params[$i][1].$params[$i][2];
        
        }

        for($i = 0; $i < count($data); $i++) {

            $sql->bindParam($data[$i], $values[$i]);

        }

        if($sql->execute()) {

            echo "Valores atualizados!";

        } else {

            echo "Erro:". $sql->errorInfo();

        }

    }

}

$crud = new CRUD('localhost', 'root', '', 'dbteste');

$titulo = 'Testando título';
$descricao = '';

$crud->updateQuery('noticias', 'titulo, descricao', [$titulo, $descricao], 'id = 9');
// retorno: Valores atualizados