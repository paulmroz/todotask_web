<?php

namespace App;

class Photo extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
