<?php

namespace App;

use App\User;
use App\Reply;
use App\BaseModel;

class Discussion extends BaseModel
{
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
