<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    //
    // protected $table = 'cidades';

    protected $guarded = [
    	'created_at'
    ];

    protected $dates = [
    	'created_at'
    ];

    public $incrementing = false;

    public function scopeOrderByNome($query) {
		return $query->orderBy('nome');
	}

}
