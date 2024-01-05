<?php

namespace App\Repositories;

use App\Models\Director;

class DirectorRepository implements DirectorRepositoryInterface
{
    /**
     * Obtiene todos los directores.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Director::all();
    }

    /**
     * Encuentra un director por su ID.
     *
     * @param  int  $id
     * @return Director|null
     */
    public function findById($id)
    {
        return Director::find($id);
    }

    // Aquí puedes agregar más métodos según tus necesidades,
    // como save, delete, update, etc.
}
