<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyFeeds extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'my_feeds';
	protected $fillable = array(
		'feed_category',
		'user_id'
    );
    
	public function contentsource() {
        return $this->hasMany(ContentSource::class,'my_feeds_id', 'id');
    }
}
