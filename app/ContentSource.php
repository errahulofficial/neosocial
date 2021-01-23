<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentSource extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'content_source';
	protected $fillable = array(
		'source_name',
		'rss_link',
		'my_feeds_id',
		'my_feeds_user_id'
    );
    
	public function myfeeds() {
        return $this->belongsTo(MyFeeds::class, 'id');
    }
}
