<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSequence extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'email_sequence';
	protected $fillable = array(
		'email_template',
		'subject',
		'send_schedule',
		'active_status'
    );
    
	public function users() {
        return $this->belongsToMany(LeadgenCampaign::class);
    }
}
