<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    

    public static function Mensaje() 
    { 
        return " *********************************************************************************** "; 
    
    }

    
    
    protected $fillable = 
    ['nombre', 'email' ];   //'id', 

    public $timestamps = false; 

    public function publicado()
    {

        return $this->hasMany('App\Publicado');  
        /**Se llama igual a como se tiene el modelo */

    }





}


