<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PsikologPiket extends Model {

	protected $table='psikolog_piket';

	public function psikolog()
	{
		return  $this->hasOne('App\Psikolog', 'id', 'psikolog_id');
	}
}
