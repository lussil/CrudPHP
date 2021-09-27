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
        //Atribuir o id da vaga na instacia

        // retornar sucesso
        return true;
    }

    // metodo responsavel por atualizar a vaga no banco
    public function atualizar(){
        return (new Database('vagas'))->update('id = '.$this->id,[
                                                                    'titulo'    => $this->titulo,
                                                                    'descricao' => $this->descricao,
                                                                    'ativo'     => $this->ativo,
                                                                    'data'      => $this->data
                                                                ]);
    }

    // metodo responsavel por obter as vagas do banco
    public static function getVagas($where = null, $order = null, $limit = null){
        return (new Database('vagas'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS, self::class);
    } 


    // metodo responsavel por buscar a vaga com base no ID
    public static function getVaga($id){
        return (new Database('vagas'))->select('id = '. $id)
                                    ->fetchObject(self::class);
    }




}