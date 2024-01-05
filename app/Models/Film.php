<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Director;

class Film extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function director(){
        return $this->belongsTo(Director::class);
    }

}
