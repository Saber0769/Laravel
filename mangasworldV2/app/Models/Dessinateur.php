<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dessinateur extends Model
{
//    use HasFactory;
    protected $table = 'dessinateur';
    public $timestamps = false;
    protected $primaryKey = 'id_dessinateur';
    protected $fillable = ['id_dessinateur','nom_dessinateur','prenom_dessinateur'];

    public function mangas() {
        return $this->his-> hasMany('App\Models\Manga','id_dessinateur', 'id_dessinateur');
    }
}
