<?php

namespace App\DTO;

class Directors{
    public $id;
    public $name;

    public function __construct($name)
    {
        $this->id = $name;
        $this->name = $name;
    }

    public static function frmDirector($response){
        return new self(
            $response->id,
            $response->name
        );
    }

}
