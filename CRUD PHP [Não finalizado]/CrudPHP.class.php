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

    /* 
    *
    * Verificar a existência de uma tabela
    * RETORNO: (Bool) true/false
    * 
    */

    private function haveTable($table) {

        $sql = !!$this->connection->query("SHOW TABLES LIKE '$table'")->rowCount();

        if(!$sql) { echo "A tabela <b>$table</b> não existe nesse banco de dados!"; die(); }

    }

    /* Selecionar todos os registros de uma tabela.
    * RETORNO: array
    * ------------/-------------/------------/----------------/----
    * $crud->selectAllQuery(tabela, where, ordenação = '', limite = '');
    * ------------/-----------------/----------------/-------------
    * EXEMPLO: $crud->selectAllQuery('usuarios', 'id = 1', 'nome ASC', '1');
    * ------------/-------------/------------/----------------/----
    */

    public function selectAll($table, $where, $order = '', $limit = '') {

        self::haveTable($table);

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
    *
    * UTILIZAÇÃO: $crud->selectAllQuery(tabela, where, ordenação = '', limite = '');
    * EXEMPLO: $crud->selectAllQuery('usuarios', 'id = 1', 'nome ASC', '1');
    *
    * ------------/-------------/------------/----------------/----
    */

    public function selectOneOrMore($params, $table, $where, $order = '', $limit = '') {

        self::haveTable($table);

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
    * RETORNOS: Bool true / Erro: <erro-info>
    * 
    * UTILIZAÇÃO: $crud->updateQuery(tabela, colunas, [valores], where);
    * EXEMPLO: $crud->updateQuery('noticias', 'titulo, descricao', [$titulo, $descricao], 'id = 9');
    * 
    */

    public function update($table, $params, Array $values, $where) {

        self::haveTable($table);

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

            echo true;

        } else {

            echo "Erro:". $sql->errorInfo();

        }

    }

    /* Inserção em uma tabela.
    * RETORNOS: Bool true / Erro: <erro-info>
    * 
    * UTILIZAÇÃO: $crud->insertQuery(tabela, parâmetros, [valores]);
    * EXEMPLO: $crud->insertQuery('usuarios', 'name, password, email', [$name, $password, $email]);
    * 
    */

    public function insert($table, $params, $values) {

        self::haveTable($table);

        $parameters = "(".$params.")";

        $params = explode(', ', $params);

        $data = [];

        for($i = 0; $i < count($params); $i++) {

            $data[$i] = ":".$params[$i][0].$params[$i][1].$params[$i][2].$i;
        
        }

        $valueBind = "(".implode(', ', $data).")";

        $sql = $this->connection->prepare("INSERT INTO $table $parameters VALUES $valueBind");

        for($i = 0; $i < count($params); $i++) {

            $sql->bindParam($data[$i], $values[$i]);

        }

        if($sql->execute()) {

            return true;

        } else {

            echo "Erro: ". $sql->errorInfo();

        }

    }

}