<?php
namespace domain\delivery\Token;

use Carbon\Carbon;

class Token extends \Eloquent
{
    protected $fillable = ['api_token', 'client', 'user_id', 'expires_on'];

    public function scopeValid()
    {
        return !Carbon::createFromTimeStamp(strtotime($this->expires_on))->isPast();
    }

    public function user()
    {
        return $this->belongsTo('domain\delivery\User\User', 'user_id');
    }
}