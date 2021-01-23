<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetupMail extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'setup_mail';
	protected $fillable = array(
		'sendto',
		'ccto',
		'subject',
        'content',
        'fname',
        'lname',
        'business_id',
        'sent_on',
        'opened_on',
        'clicked_on',
    );
    
}
