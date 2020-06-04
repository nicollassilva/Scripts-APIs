<?php

class CEP {

    private $cep;
    private $startUrl;
    private $endUrl;

    function __construct($cep) {
        
        $this->cep = $cep;

        $this->startUrl = 'https://viacep.com.br/ws/';

        $this->endUrl = '/json/';

    }

    private function validateCEP() {

        $validate = !!preg_match("/^[0-9]{8}$/", $this->cep) ? true : false;

        return $validate;

    }

    private function getUrl() {
        
        return $this->startUrl.$this->cep.$this->endUrl;

    }

    public function getData() {
        
        if(self::validateCEP()) {

            $data = file_get_contents(self::getUrl());

            return json_decode($data, true);

        }

    }

    public function getOneInfo($info) {

        $chaves = ['cep', 'logradouro', 'bairro', 'localidade', 'uf', 'ibge', 'erro'];

        if(self::validateCEP()) {

            foreach($chaves as $chave) {

                if($info === $chave) {

                    $data = self::getData();

                    return isset($data[$info]) ? $data[$info] : 'CEP inexistente';

                    die();

                }

            }

            echo "Chave inexistente, disponíveis:"."<br><b>".implode(', ', $chaves)."<b>";

        } else {

            echo "CEP incorreto.";

        }

    }

    public function getMoreInfos(Array $info) {

        if(self::validateCEP()) {

            $data = self::getData();

            $dados = array();
            
            for($i = 0; $i < count($info); $i++) {

                $dados += [
                    $info[$i] => $data[$info[$i]]
                ];

            }

            return $dados;

        } else {

            echo "CEP incorreto";
            
        }

    }

}