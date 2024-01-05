<?php

namespace App\Repositories;

interface DirectorRepositoryInterface
{
    public function getAll();
    public function findById($id);
    // Otros métodos que tu repositorio debería implementar
}
