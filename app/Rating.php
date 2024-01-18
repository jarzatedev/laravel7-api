<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property mixed $rateable
 * @property mixed $qualifier
 */
class Rating extends Pivot
{
    public $incrementing = true;

    protected $table = 'ratings';

    public function rateable(): MorphTo
    {
        return $this->morphTo();
    }

    public function qualifier(): MorphTo
    {
        return $this->morphTo();
    }
}
