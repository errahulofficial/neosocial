<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'posts';
	protected $fillable = array(
		'check_posted',
		'post',
		'title',
		'type',
		'category',
		'element',
		'image',
		'image_link',
		'post_link',
		'article_link',
		'img_dir',
		'fb_share_active',
		'tw_share_active',
		'in_share_active',
		'gb_share_active',
		'logo_active',
		'logo_type',
		'logo_position',
		'posting_time',
		'schedule_status',
		'post_status',
		'business',
		'user_id',
		'post_package_id'
    );
    
	public function business() {
        return $this->belongsTo(Business::class, 'id');
    }
	public function postpackage() {
        return $this->belongsTo(PostPackage::class, 'id');
    }
	public function users() {
        return $this->belongsTo(User::class, 'id');
    }
}
