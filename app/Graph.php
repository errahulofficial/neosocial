<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'graphs';
	protected $fillable = array(
		'fb_graph',
		'tw_graph',
		'in_graph',
		'gb_graph',
		'total_graph'
    );
}
