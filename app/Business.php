<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'business';
	protected $fillable = array(
		'b_name',
		'b_type',
		'category',
		'phone',
		'address',
		'city',
		'state',
		'zip',
		'niche',
		'website',
		'contact_fname',
		'contact_lname',
		'contact_title',
		'contact_email',
		'contact_phone',
		'note',
		'fb_monthly_goals',
		'tw_monthly_goals',
		'in_monthly_goals',
		'gb_monthly_goals',
		'fb_posted_goals',
		'tw_posted_goals',
		'in_posted_goals',
		'gb_posted_goals',
		'daily_posted',
		'auto_schedule_days',
		'auto_schedule_time_start',
		'auto_schedule_time_end',
		'max_post',
		'time_zone',
		'user_id',
		'hasfb',
		'hastw',
		'hasinsta',
		'hasgb',
		'business_logo'
    );
    
	public function users() {
        return $this->belongsTo(User::class, 'id');
    }
	
	public function posts() {
        return $this->hasMany(Posts::class, 'business', 'id');
    }
	public function socialconnection() {
        return $this->hasMany(SocialConnection::class, 'business_id', 'id');
    }
}
