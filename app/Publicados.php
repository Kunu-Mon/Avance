<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicados extends Model
{
    //

   // protected $fillable = ['titulo', 'cuerpo'];

    protected $table = "publicaciones";
    protected $fillable = ['titulo', 'cuerpo'];
    public $timestamps = false;

    //Relacion con la tabla vehiculo

    public function usuarios()
    {

        return $this->belongsTo('App\Usuario');
    }




}
