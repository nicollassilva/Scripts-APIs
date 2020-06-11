<?php

    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_ALL, 'portuguese', 'pt-BR');

class CRUD {

    private $host;
    private $user;
    private $pass;
    private $tableUsers;
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

    private function haveTable($table) {

        $sql = !!$this->connection->query("SHOW TABLES LIKE '$table'")->rowCount();

        if(!$sql) { echo "A tabela <b>$table</b> não existe nesse banco de dados!"; die(); }

    }

    public function selectAll($table, $where, $order = '', $limit = '') {

        self::haveTable($table);

        $limit = $limit != '' ? $limit = "LIMIT ".$limit : $limit = '';

        $where = $where != '' ? $where = "WHERE ".$where : $where = '';

        $order = $order != '' ? $order = "ORDER BY ".$order : $order = '';

        $sql = $this->connection->query("SELECT * FROM $table $where $order $limit");

        if($sql->rowCount() > 1) {

            $row = $sql->fetchAll(PDO::FETCH_ASSOC);

        } else {

            $row = $sql->fetch(PDO::FETCH_ASSOC);

        }

        return $row;

    }

    public function selectOneOrMore($table, String $params, $where, $order = '', $limit = '') {

        self::haveTable($table);

        $limit = $limit != '' ? $limit = "LIMIT ".$limit : $limit = '';

        $where = $where != '' ? $where = "WHERE ".$where : $where = '';

        $order = $order != '' ? $order = "ORDER BY ".$order : $order = '';

        $sql = $this->connection->query("SELECT $params FROM $table $where $order $limit");

        $sql->execute();

        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    public function update($table, String $params, Array $values, $where) {

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

            return true;

        } else {

            echo "Erro:". $sql->errorInfo();

        }

    }

    public function insert($table, String $params, Array $values) {

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

    public function delete($table, $where) {

        self::haveTable($table);

        $sql = $this->connection->prepare("DELETE FROM $table WHERE $where");
        if($sql->execute()) {

            return true;

        } else {

            echo "Erro: ". $sql->errorInfo();

        }

    }

    public function clearOne($table, $column, $where) {

        self::haveTable($table);

        $sql = $this->connection->query("UPDATE $table SET $column = '' WHERE $where");

        if($sql->execute()) {

            return true;

        } else {

            echo "Erro: ". $sql->errorInfo();

        }

    }

    public function clearMore($table, Array $columns, $where) {

        self::haveTable($table);

        $data = [];

        for($i = 0; $i < count($columns); $i++) {

            $data[$i] = $columns[$i]." = ''";

        }

        $data = implode(', ', $data);

        $sql = $this->connection->prepare("UPDATE $table SET $data WHERE $where");

        if($sql->execute()) {

            return true;

        } else {

            echo "Erro: ". $sql->errorInfo();

        }

    }

    public function clearAllTable($table) {

        self::haveTable($table);

        $sql = $this->connection->prepare("TRUNCATE TABLE $table");

        if($sql->execute()) {

            return true;

        } else {

            echo "Erro: ". $sql->errorInfo();

        }

    }

    public function deleteTable($table) {

        self::haveTable($table);

        $sql = $this->connection->prepare("DROP TABLE IF EXISTS $table");

        if($sql->execute()) {

            return true;

        } else {

            echo "Erro: ". $sql->errorInfo();

        }

    }

    public function user($table = "users") {

        $tableExists = $this->connection->query("SHOW TABLES LIKE '$table'")->rowCount();

        if(!$tableExists) {

            $createTable = "CREATE TABLE $table (
                id int NOT NULL auto_increment,
                name varchar (255) NOT NULL,
                email varchar (255) NOT NULL UNIQUE,
                password varchar (255) NOT NULL,
                birthday date NOT NULL,
                time_register timestamp DEFAULT CURRENT_TIMESTAMP,
                last_login varchar (255) DEFAULT NULL,
                ip_register varchar (20),
                last_ip varchar (20),
                PRIMARY KEY (id)
                )";

            $sql = $this->connection->query($createTable);
 
        } else {

            $this->tableUsers = $table;
            return $this;

        }

    }

    public function create(Array $datas) {
    
        $choices = ['cost' => 10];

        $datas['password'] = password_hash($datas['password'], PASSWORD_BCRYPT, $choices);
        $datas['ip_register'] = $_SERVER['REMOTE_ADDR'];
        $datas['last_ip'] = $_SERVER['REMOTE_ADDR'];

        $keys = array_keys($datas);
        $keys = implode(', ', $keys);
        
        $values = array_values($datas);

        if(!!self::selectOneOrMore($this->tableUsers, 'email', 'email = "'.$datas['email'].'"')) {

            echo "Cadastro já existente: <br>";
            print_r(self::selectAll($this->tableUsers, "email = '{$datas['email']}'"));

        } else {

            $sql = self::insert($this->tableUsers, $keys, $values);
            return true;

        }
    }

    public function find($id) {

        return self::selectAll($this->tableUsers, "id = $id");

    }

}