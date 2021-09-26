<?php 

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Vaga{
    // intentificador único da vaga
    public $id;

    // titulo da vaga
    public $titulo;

    // descição da vaga
    public $descricao;

    //define se a vaga está ativa
    // string(s/n)
    public $ativo;

    // data de publicação da vaga
    public $data;

    // metodo reponsael por cadastrar nova vaga
    //boolean
    public function cadastrar(){
        // definir a data
        $this->data = date('Y-m-d H:i:s');

        // inserir a vaga no bancdo
        $obDatabase = new Database('vagas');

        $this->id = $obDatabase->insert([
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'ativo'     => $this->ativo,
            'data'      => $this->data

        ]);

        echo "<pre>" ; 
        print_r($this); 
        echo "</pre>"; 
        //Atribuir o id da vaga na instacia

        // retornar sucesso
        return true;
    }
}