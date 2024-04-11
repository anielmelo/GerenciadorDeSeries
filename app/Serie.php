<?php

namespace App;

use App\Models\Temporada;
use Illuminate\Database\Eloquent\Model;

Class Serie extends Model{
   
    public $timestamps = false;
    protected $fillable = ['name'];

    public function temporadas(){
        return $this->hasMany(Temporada::class);
    }
 

}

