<?php

namespace App\Db;
use \PDO;
use \PDOException;

class Database{
    //host de conexão com banco de dados
    const HOST = 'localhost';

    //nome do banco de dado
    const NAME = 'localhost';

    //usuario do banco
    const USER = 'root';

    // senha de acesso do bando
    const PASS = '';

    //nome da tabela a ser manipulada
    private $table;

    // instacia de conexão com banco de dados / usando PDO
    private $connection;
    
    //metodo responsavel que define a tabela e instacia a conexão
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    // metodo responsavel por  criar uma conexão com banco de dados
    public function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' .$e->getMessage());
        }
    }

    // metodo responsavel por executar querys denttro do banco
    public function execute($query, $params = []){
try {
   $statement = $this->connection->prepare($query);
   $statement->execute($params);
   return $statement;
} catch (PDOException $e) {
    die('ERROR: ' .$e->getMessage());
}
    }


    // metodo responsavel por inserir dados no banco
    public function insert($values){
        // dados da query
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');
        
     

        // monta a querry
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields). ') VALUES ('.implode(',', $binds). ')';
        
        $this->execute($query, array_values($values));

        //retorna o Id inserido
        return $this->connection->lastInsertId();
       
    }
    // metodo responsavel por executar consulta ao banco
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //dados da query
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        //monta a query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
    
        // executa a query
        return $this->execute($query);
      }

      // metodo responsavel por executar a atualizaçã da vaga no banco
      public function update($where,$values){
        // dados da query
        $fields = array_keys($values);



        $query = 'UPDATE '. $this->table.' SET ' .implode('=?,',$fields).'=? WHERE ' .$where;
        return $this->execute($query,array_values($values));

      }

      // metodo responsavvel por excluir dados do banco
      public function delete($where){
        $query = 'DELETE FROM ' .$this->table.' WHERE '.$where;

        $this->execute($query);

        return true;
      }
}