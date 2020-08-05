<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agency extends Authenticatable
{
    use Notifiable;

    protected $table = 'agencies';

    protected $fillable = ['name','email','password'];

   protected $hidden = ['password', ];

    /**
     * @return BelongsToMany
     */
    public function talents(): BelongsToMany
    {
        return $this->belongsToMany(
            Talent::class,
            'agency_talent',
            'agency_id',
            'talent_id',
        );
    }
}
