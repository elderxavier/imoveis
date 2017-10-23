<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imobiliariaModel extends Model
{
    protected $fillable = ['name','description'];
	protected $guarded = ['id', 'created_at', 'update_at'];
	protected $table = 'imobiliaria';
}
