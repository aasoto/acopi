<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticiasModel extends Model
{
	protected $table = 'noticias';
	
    /*==================================================
    =            Inner Join desde el Modulo            =
    ==================================================*/
    public function categorias(){
    	return $this->belongsTo('App\CategoriasModel', 'categoria', 'id_categoria');
    }
    
    /*=====  End of Inner Join desde el Modulo  ======*/
}
