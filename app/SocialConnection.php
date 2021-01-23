<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialConnection extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'social_connections';
	protected $fillable = array(
		'name',
		'token',
		'token_secret',
		'uid',
		'links',
		'business_id',
		'business_user_id',
		'social_platforms_id',
    );
    
	public function business() {
        return $this->belongsTo(Business::class, 'id');
    }
	public function socialplatform() {
        return $this->belongsTo(SocialPlatform::class, 'id');
    }
}
