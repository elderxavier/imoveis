<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImoveisModel extends Model
{	
	protected $fillable = ['type','description','adress'];
	protected $guarded = ['id', 'created_at', 'update_at'];
	protected $table = 'imoveis';

}
