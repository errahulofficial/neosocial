<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HootsuitePosts extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'hootsuite_posts';
	protected $fillable = array(
		'hoot_id',
		'post_id',
    );
    
	public function posts() {
        return $this->belongsTo(Posts::class,'id');
    }
}