<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
//    use HasFactory;
    
        protected $table = 'genre';
        public $timestamps = false;
        protected $primaryKey = 'id_genre';
        protected $fillable = ['id_genre','lib_genre'];

        public function genre() {
        return $this->his-> hasMany('App\Models\Manga','id_genre', 'id_genre');
    }
}
