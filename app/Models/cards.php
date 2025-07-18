<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\cardSocialLink;
use App\Models\cardDesign;

class cards extends Model
{
    protected $fillable = [
        'user_id',
        'name_on_card',
        'email_on_card',
        'phone_on_card',
        'status',
        'st_name',
        'state',
        'city',
        'profile_image',
        'background_color',
        'card_design_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function socialLinks() {
        return $this->hasMany(cardSocialLink::class);
    }

    public function design() {
        return $this->belongsTo(cardDesign::class, 'card_design_id');
    }
}
