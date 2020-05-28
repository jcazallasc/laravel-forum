<?php

namespace App;

use App\BaseModel;

class Channel extends BaseModel
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
