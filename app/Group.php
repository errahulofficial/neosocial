<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'groups';
	protected $fillable = array(
		'name',
		'color',
		'icon_link',
        'business',
        'user_id'
    );
    
	public function business() {
        return $this->belongsTo(User::class,'id');
    }
}
