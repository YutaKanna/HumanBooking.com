<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Talent extends Model
{
    protected $table = 'talents';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
