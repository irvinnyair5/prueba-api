<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;

class Director extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function films(){
        return $this->hasMany(Film::class);
    }
}
