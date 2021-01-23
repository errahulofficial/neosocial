<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'image_gallery';
	protected $fillable = array(
		'image',
        'img_dir',
        'category',
        'user_id'
    );
    
	public function users() {
        return $this->belongsTo(User::class, 'id');
    }
}
