<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadgenCampaign extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'leadgen_campaign';
	protected $fillable = array(
		'b_name',
		'b_type',
		'category',
		'phone',
		'address',
		'city',
		'state',
		'zip',
		'b_niche',
		'website',
		'contact_fname',
		'contact_lname',
		'contact_title',
		'contact_email',
		'contact_phone',
		'status',
		'fb_page',
		'clicks',
		'opens',
		'sent',
		'action_date',
		'experience_type',
		'experience_descp',
		'niche',
		'buyer_type',
		'email_sequence_id',
		'user_id'
    );
    
	public function emailsequence() {
        return $this->hasMany(EmailSequence::class);
    }
    public function users() {
        return $this->belongsTo(User::class, 'id');
    }
}