<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPackage extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'post_package';
	protected $fillable = array(
		'name',
		'type',
		'post_count',
		'description',
		'user_id'
    );
    
	public function posts() {
        return $this->hasMany(Posts::class,'post_package_id', 'id');
    }
}
