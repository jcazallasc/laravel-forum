<?php

namespace App;

use App\User;
use App\Reply;
use App\BaseModel;
use App\Notifications\ReplyMarkedAsBestReply;

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

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id' => $reply->id,
        ]);

        if($reply->owner->id !== $this->author->id) {
            $reply->owner->notify(new ReplyMarkedAsBestReply($reply->discussion));
        }
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    public function scopeFilterByChannels($query)
    {
        $channel_slug = request()->query('channel');
        
        if(!$channel_slug) {
            return $query;
        }
        
        $channel = Channel::where('slug', $channel_slug)->firstOrFail();

        return $query->where('channel_id', $channel->id);
    }
}
