<?php

namespace App\DTO;

class Directors{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function frmDirector($response){
        return new self(
            $response->id,
            $response->name
        );
    }

}
