<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'landing_page';
	protected $fillable = array(
		'name',
		'views_counts',
		'leads',
        'landing_page_template_id',
        'user_id'
    );
    
	public function landingpagetemplate() {
        return $this->belongsTo(LandingPageTemplate::class,'id');
    }
	public function users() {
        return $this->belongsTo(User::class,'id');
    }
}
