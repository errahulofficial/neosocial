<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPageTemplate extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'landing_page_template';
	protected $fillable = array(
		'html_content',
		'images'
    );
    
	public function landingpage() {
        return $this->hasMany(LandingPage::class,'user_id','id');
    }
	
}
