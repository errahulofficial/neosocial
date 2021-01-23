<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'contact_name','contact_phone','company_name','company_address','company_city','company_state','company_country','website','company_phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function business() {
		return $this->hasMany(Business::class, 'user_id','id');
    }
    public function group() {
		return $this->hasMany(Group::class, 'user_id','id');
    }
    public function landingpage() {
		return $this->hasMany(LandingPage::class, 'user_id','id');
    }
    public function posts() {
		return $this->hasMany(Posts::class, 'user_id','id');
    }
    public function images() {
		return $this->hasMany(ImageGallery::class, 'user_id','id');
    }
    public function leadgencampaign() {
      return $this->hasMany(LeadgenCampaign::class, 'user_id', 'id');
  }
}
