<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenariste extends Model{
    
        //    use HasFactory;
        protected $table = 'scenariste';
        public $timestamps = false;
        protected $primaryKey = 'id_scenariste';
        protected $fillable = ['id_scenariste','nom_scenariste','prenom_scenariste'];

        public function scenariste() {
        return $this->his-> hasMany('App\Models\Manga','id_scenariste', 'id_scenariste');
    }
}
