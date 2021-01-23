<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialPlatform extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'social_platforms';
	protected $fillable = array(
		'name',
		'link'
    );
    
	public function socialconnection() {
        return $this->hasMany(SocialConnection::class,'social_platforms_id', 'id');
    }
}
